(function ($) {

	// return a jQuery button object
	Drupal.theme.prototype.button = function (name, value) {
	  return $('<button type="button" name="' + name + '" value="' + value + '">' + name + '</button>');
	};

	// convert a select option into a jQuery button
	Drupal.theme.prototype.optionButton = function (selector) {
		var option = $(selector);
		return Drupal.theme.button( option.text(), option.val() );
	};

	Drupal.theme.isMobile = function() {

	};

	Drupal.behaviors.tchair = {
		attach: function (context, settings) {

			/**
			 * Mobile Menu
			 */
			$('#block-block-5 select').change(function(){
				window.location = '/'+$(this).val()+'?page='+$(this).val();
			});

			$('#mob-menu').click(function(e) {
				e.preventDefault();
				$('.l-region--header').toggle();
			})

			/**
			 * Alter user profile form 
			 */
			var userCity = $("#edit-field-user-city-und-0-value");
			if (!userCity.val()){			
				Drupal.profileSetLoc(userCity);
			}	
			
			$("a#loc_update").click(function(){
				Drupal.profileSetLoc(userCity);
				return false;
			});
			
			/**
			 * Alter search profile form
			 */			
			var searchProfile = $("#views-exposed-form-search-profiles-page");	
			
			searchProfile.find(".views-exposed-widget.views-submit-button").after(
				'<div id="user-loacation-serach-type" ><input type="checkbox" name="user_loacation_serach_type" value="1" /> Show me only the people in my area.</div>'
//			'<select id="user-loacation-serach-type" name="user_loacation_serach_type" class="form-select">'+
//				'<option value="0">Search people in my area</option>'+
//				'<option value="1">Search all</option>'+				
//			'</select>'
			);
			
			if (Drupal.getUrlVars()['user_loacation_serach_type']) $('#user-loacation-serach-type input').attr('checked', true);
			
			
			// */	
//			var distanceFilter = searchProfile.find("#edit-field-user-location-wrapper");
			//Add Near field
/*			
			distanceFilter.before(
				'<div id="filter-location-wrapper" class="views-exposed-widget views-widget-filter-location_value">'+
				'<label for="filter-location">near</label>'+
				'<input type="text" id="filter-location-value" name="filter_location_value" value="'+filterLoc+'" size="30" maxlength="128" class="form-text">'+
				'</div>'
			);				

			/**
			 * Alter create review form 
			 */
//			var createView = $("#views-exposed-form-search-page-2");
			var latField = $("#edit-distance-latitude");
			var lngField = $("#edit-distance-longitude");
			var distanceFilter = $("#views-exposed-form-search-page #edit-distance-wrapper, #views-exposed-form-search-page-2 #edit-distance-wrapper");

			filterLoc = decodeURI(Drupal.getUrlVars()['filter_location_value']).replace(/\+/i, ' ' );
			filterLoc = filterLoc.replace('undefined', '');
			//Add Near field
			distanceFilter.before(
				'<div id="filter-location-wrapper" class="views-exposed-widget views-widget-filter-location_value">'+
				'<label for="filter-location">Closest Town/Suburb</label>'+
				'<input type="text" id="filter-location-value" name="filter_location_value" value="'+filterLoc+'" size="30" maxlength="128" class="form-text">'+
				'</div>'
			);		
			

			$('#filter-location-value').focusout(function(){
				Drupal.addr2latlng($(this).val(), latField, lngField);
			});

			//No enter key allowed on the Near field
			$('#filter-location-value').keypress(function(e){
				if(e.charCode == 13) {return false; }
			});
			$('#edit-submit-search').hide();
			$('#edit-submit-search').attr("disabled",true);
			$('#edit-submit-search').before("<a id='submit' class='button' href='#'>Search</a>");

			$('#submit').click(function(){		

				form = $(this).parents().filter('form');
				Drupal.addr2latlng($('#filter-location-value').val(), latField, lngField, form);
				
				return false;
			});		
			

		//	Drupal.addr2latlng($('#filter-location-value').val(), latField, lngField);	
		//			    	$('form#views-exposed-form-search-page-2').submit();	

//			if (latField.val() && lngField.val()){							
				//Drupal.latLng2addr(latField.val(), lngField.val());
				
//			} else {
			

			//Detect value for Near field from latlng if value is not predefined
			errorMsg = 'Location cannot be detected. Please change your location if you want to search outside Melbourne';
			if (!Drupal.getUrlVars()['filter_location_value']){			
				//Set Latitdue and Longitude values
				if(navigator.geolocation) navigator.geolocation.getCurrentPosition(function(loc){
					latField.val(loc.coords.latitude);
					lngField.val(loc.coords.longitude);
					
					Drupal.latLng2addr($('#filter-location-value'), 'short', latField.val(), lngField.val());
				},
				function(){
					Drupal.noLocError($('#filter-location-value'), errorMsg, latField, lngField);
				}
					
				); else Drupal.noLocError($('#filter-location-value'), errorMsg, latField, lngField);
			}
			

			
				
			/**
			 * Alter search review form 
			 */
			var searchView = $("#views-exposed-form-search-page");
		
			//show 2nd level Category 
			var categoryList = searchView.find("#edit-field-category-tid-wrapper select");
			
			var allSubcategory = searchView.find(".views-exposed-widget:has(label:contains('Subcategory'))");
			
			// disabed Select
			var disabledSelect = searchView.find(".views-widget-filter-field_place_to_eat_value_1");
			disabledSelect.find("select").attr('disabled', 'disabled');
			

			//Hide all Subcategory filter initially, but show disabled select
			allSubcategory.hide(); 

			var subcategory = {};
			subcategory[1] = 'field_place_to_eat_value';
			subcategory[4] = 'field_evening_out_value';
			subcategory[15] = 'field_retail_outlets_value';
			subcategory[7] = 'field_entertainment_value';
			subcategory[16] = 'field_sports_leisure_value';
			subcategory[8] = 'field_health_medical_value';
			subcategory[9] = 'field_accommodation_tourism_value';
			subcategory[11] = 'field_other_value';
			subcategory[12] = 'field_transport_value';
			subcategory[13] = 'field_event_hire_venues_value';
			subcategory[10] = 'field_education_childcare_value';
			subcategory[14] = 'field_general_shopping_value';

			if(Drupal.getUrlVars()['field_category_tid'] && Drupal.getUrlVars()['field_category_tid'] != 'All'){
				searchView.find(".views-widget-filter-"+subcategory[Drupal.getUrlVars()['field_category_tid']]).show();
			} else {
				disabledSelect.show();
			}
			
			
			
			categoryList.change(function(){
				if($(this).val() == "All") { allSubcategory.hide(); allSubcategory.find('select').val('All'); disabledSelect.show();}
				else { 
					allSubcategory.hide(); 
					allSubcategory.find('select').val('All');
					//console.log(searchView.find(".views-widget-filter-"+subcategory[$(this).val()]));
					searchView.find(".views-widget-filter-"+subcategory[$(this).val()]).show();
				}
			})			


			visualWidgets = [1, 2, 3];
			hearingWidgets = [4];
			mobilityWidgets = [5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
			
			// change all widgets form text fields to check boxes.
			for (i=1; i<=14; i++){
				widget=$('#edit-field-widget'+i+'-value-wrapper');
				widgetValue = Drupal.getUrlVars()['field_widget'+i+'_value'];
				checked = ''; if (widgetValue == 0.5) checked = "checked";
				classes = '';
				if (jQuery.inArray(i, visualWidgets) >= 0) {widget.addClass('filter-visual'); }
				if (jQuery.inArray(i, hearingWidgets) >= 0) widget.addClass('filter-hearing');
				if (jQuery.inArray(i, mobilityWidgets) >= 0) widget.addClass('filter-mobility');
												
				widget.html('<input type="checkbox" id="edit-field-widget'+i+'-value" name="field_widget'+i+'_value" value="0.5" class="form-text" '+checked+'>'+widget.find("label").text());
				widget.show();
			}
	
			//add h6 title
			$('#edit-field-widget1-value-wrapper').before('<h6 class="filter-visual title">Filter by visual</h6>');
			$('#edit-field-widget4-value-wrapper').before('<h6 class="filter-hearing title">Filter by hearing</h6>');
			$('#edit-field-widget5-value-wrapper').before('<h6 class="filter-mobility title">Filter by mobility</h6>');			
			//$('#edit-field-widget1-value-wrapper').before('<a class="filter-visual title" href="#">Filter by visual</a>');
			//$('#edit-field-widget4-value-wrapper').before('<a class="filter-hearing title" href="#">Filter by hearing</a>');
			//$('#edit-field-widget5-value-wrapper').before('<a class="filter-mobility title" href="#">Filter by mobility</a>');			
			
			//Wrap filters
			$('.filter-visual').wrapAll('<div class="checkboxFilter visual" />');
			$('.filter-hearing').wrapAll('<div class="checkboxFilter hearing" />');
			$('.filter-mobility').wrapAll('<div class="checkboxFilter mobility" />');
			
			/* expand collapse
			$('.checkboxFilter a').click(function() {
				$(this).parent().find('.views-exposed-widget').toggle();
			});
			// */
			
			/**
			 * Rate Widgets
			 */
			var rateWidget = $(".rate-widget .item-list");
			var rateInfo = $(".rate-info");
			var reviewNow = $("#review-now");
			var location = $(".node-location .group_location");
			
			//Show results or buttons
			if(Drupal.getUrlVars()["action"] == "review"){
				rateInfo.hide();
				rateWidget.show();	

				//hide location info in review mode
				location.hide();
			} else {
				rateWidget.hide();
				rateInfo.show();
				
				location.show();
			} 
			//add css classes so that color changes response instantly 
			rateWidget.find(".rate-button").click(function() {
				$(this).parents(".item-list").find(".rate-button").removeClass("selected");
				$(this).addClass("active");	

			})
			
			//hide field groups with empty result
			var fieldGroups = $(".node-location .group_visual, .node-location .group_hearing, .node-location .group_mobility");
			fieldGroups.hide();
			//show field groups only if rate-field-label is found
			fieldGroups.find(".rate-field-label").parents(".field-group-format").show();
						
			//shade alternate rate field that has div.clearfix (i.e. not empty)
			fieldGroups.find(".field-type-number-float:has(div.clearfix):odd").addClass('shade');			
			
		}
	}
	Drupal.testfunction = function () {
		return 1;
	}
	Drupal.latLng2addr = function(locField, type, lat, lng){
		
		var latLng = new google.maps.LatLng(lat, lng);
		//console.log(currentPosition);
		var geocoder = new google.maps.Geocoder(); 
		geocoder.geocode( { 'location': latLng}, function(results, status) {	
			if (status == google.maps.GeocoderStatus.OK && results[0]) {
//console.log(results[0]);				
				locField.val(results[0].address_components[2].long_name);
				if (type == "long") locField.val(results[0].address_components[2].long_name+", "+results[0].address_components[4].long_name);
			}
		});		
	}
	
	Drupal.addr2latlng = function(addr, latField, lngField, from){
		
//		var latLng = new google.maps.LatLng(lat, lng);
		//console.log(currentPosition);
		var geocoder = new google.maps.Geocoder(); 
		geocoder.geocode( { 'address': addr}, function(results, status) {	
			if (status == google.maps.GeocoderStatus.OK && results[0]) {

				latField.val(results[0].geometry.location.lat());
				lngField.val(results[0].geometry.location.lng());
				
				if(form) form.trigger('submit');
			}
		});		
	}
	
	
	Drupal.getUrlVars = function() {
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars;
	}
	
	Drupal.noLocError = function(locField, errorMsg, latField, lngField) {
		if(latField) latField.val('-37.809574989464465');
		if(lngField) lngField.val('144.96518600000002');

		Drupal.latLng2addr(locField, 'short', '-37.809574989464465', '144.96518600000002');
		
		locField.addClass('error').after('<div class="descriptions error">'+errorMsg+'</div>');
	}
	
	Drupal.profileSetLoc = function(userCity) {
		//Set Latitdue and Longitude values
		if(navigator.geolocation) navigator.geolocation.getCurrentPosition(function(loc){
			
			Drupal.latLng2addr(userCity, 'long', loc.coords.latitude, loc.coords.longitude);
			$("#edit-locations-0-locpick-user-latitude").val(loc.coords.latitude);
			$("#edit-locations-0-locpick-user-longitude").val(loc.coords.longitude);
		},
		function(){
			Drupal.noLocError(userCity, 'Location cannot be detected. Please change your location if you are not in Melbourne');
		}
		
		); else Drupal.noLocError(userCity, 'Location cannot be detected. Please change your location if you are not in Melbourne');	
	}	
	
	
}(jQuery));

