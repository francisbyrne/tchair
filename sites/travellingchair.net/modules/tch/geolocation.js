(function ($) {
		   
		var map;
		var marker;
		   
		Drupal.behaviors.tch = {
		attach: function(context, settings) {
			
			//cck fields
			nameField = $('#edit-title'); addrField = $('#edit-field-address-und-0-value');
			cityField = $('#edit-field-city-und-0-value'); stateField = $('#edit-field-state-und-0-value');		
			postcodeField = $('#edit-field-postcode-und-0-value'); countryField = $('#edit-field-country-und');	
			latField = $('#edit-field-latitude-und-0-value'); logField = $('#edit-field-longitude-und-0-value');
		
			//Location fields
			locNameField = $('#edit-locations-0-name'); locAddrField = $('#edit-locations-0-street');
			locCityField = $('#edit-locations-0-city'); locStateField = $('#edit-locations-0-province');		
			locPostcodeField = $('#edit-locations-0-postal-code'); locCountryField = $('#edit-locations-0-country');	
			locLatField = $('#edit-locations-0-locpick-user-latitude'); locLogField = $('#edit-locations-0-locpick-user-longitude');

			//if(navigator.geolocation) navigator.geolocation.getCurrentPosition(Drupal.geolocHandler);
			//else Drupal.geolocHandler();
			Drupal.geolocHandler();
			
			if (addrField.val()) Drupal.updateMap(map, marker);
			
			$('#current-address').click(function(){
				
				if(navigator.geolocation) navigator.geolocation.getCurrentPosition(Drupal.geolocHandler, function(){$('#current-address').html('Current address not found, please enter the address.');});
				else $(this).html('Current address not found, please enter the address below.');
				return false;
			});
			
			


		}	//attach: function(context, settings) 
		
	};	//Drupal.behaviors.tch
	

	Drupal.geolocHandler = function(loc){
		Drupal.setValue(loc);
		Drupal.showMap(loc);
	}


	/**
	 * Prefill values for /node/add/location 
	 */
	Drupal.setValue = function(loc){


		//Don't update map with current location when editing a location
		if ($('body').hasClass('page-node-edit')) return;

		if (!loc) {
			$('#edit-field-country-und').val('AU');
			$('#edit-locations-0-country').val('au');
			return;
		}

		
		//Create LatLng from browser's geolocation
		var currentPosition = new google.maps.LatLng(loc.coords.latitude, loc.coords.longitude);
		
		//Prefill values by geocoder
		var geocoder = new google.maps.Geocoder(); 
		geocoder.geocode( { 'location': currentPosition}, function(results, status) {	

			if (status == google.maps.GeocoderStatus.OK && results[0]) {

				addrField.val(results[0].formatted_address.split(',')[0]);
				address = results[0].address_components;
				
				//address
				if (results[0].formatted_address)		
				
				for (i in address){
										
					//city
					if (Drupal.inArray("locality", address[i].types)) cityField.val(address[i].long_name);

					//state
					if (Drupal.inArray("administrative_area_level_1", address[i].types)) stateField.val(address[i].long_name);				
					
					//post code
					if (Drupal.inArray("postal_code", address[i].types)) 	postcodeField.val(address[i].long_name);	
				
					//country code
					if (Drupal.inArray("country", address[i].types)) countryField.val(address[i].short_name);

					//Latitude
					latField.val(loc.coords.latitude);
					
					//Longitude
					logField.val(loc.coords.longitude);
					
					//Update location values
					Drupal.updateValues();
					
	
				}	//	for (i in address)
			}	//	if (status == google.maps.GeocoderStatus.OK && results[0])
		});		// 	geocoder.geocode	

				
	};	//   Drupal.setValue = function(loc)


	/**
	 * Equivalent to in_array() in php 
	 */ 
	 Drupal.showMap = function(loc){
		 
		//Create map
		var mapDiv = document.getElementById('create-location-map');
		var currentPosition;
		
		if(loc) {
			currentPosition = new google.maps.LatLng(loc.coords.latitude, loc.coords.longitude);		 
			zoomLevel = Math.floor(21 - Math.log(loc.coords.accuracy/9) / Math.log(2))+2; 
		} else {
			currentPosition = new google.maps.LatLng(-25.324167, 135.703125);		 
			zoomLevel = 3;
		}

		
		var mapOptions = {
			zoom: zoomLevel,
			center: currentPosition,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: false,
			streetViewControl: false,
			panControl: false
		}	
		
		map = new google.maps.Map(mapDiv, mapOptions);


		//Marker 
		marker = new google.maps.Marker({
			map: map,
			position: currentPosition,
			draggable: true
		});			

		//marker events on dragend
		google.maps.event.addListener(marker, 'dragend', function(){
			var markerPosition = marker.getPosition();											
			map.setCenter(markerPosition);	

			latField.val(markerPosition.lat());
			logField.val(markerPosition.lng());	

			locLatField.val(markerPosition.lat());
			locLogField.val(markerPosition.lng());	
		});

		//Update map and values when address change	
		nameField.focusout(function() {Drupal.updateValues()});
		addrField.focusout(function() {Drupal.updateMap(map, marker); Drupal.updateValues()});
		cityField.focusout(function() {Drupal.updateMap(map, marker); Drupal.updateValues()});
		stateField.focusout(function() {Drupal.updateMap(map, marker); Drupal.updateValues()});
		postcodeField.focusout(function() {Drupal.updateMap(map, marker); Drupal.updateValues()});
		countryField.change(function() {Drupal.updateMap(map, marker); Drupal.updateValues()});
	 }

	/**
	 * Update map and latitude/logitude vaues when address change 
	 */ 
	Drupal.updateMap = function(map, marker) {
	
		var address = addrField.val()+' '+cityField.val()+' '+stateField.val()+' '+postcodeField.val()+' '+countryField.val(); 
		
		var geocoder = new google.maps.Geocoder(); 
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK && results[0]) {

				map.setCenter(results[0].geometry.location);
				map.fitBounds(results[0].geometry.viewport);
					
				marker.setOptions({
					map: map,
					position: map.getCenter()
				});
				
				latField.val(map.getCenter().lat());
				logField.val(map.getCenter().lng());
			}														   
		});
	}
	
	/**
	 * Update location values when address change
	 */
	Drupal.updateValues = function(){
		locNameField.val(nameField.val());
		locAddrField.val(addrField.val());
		locCityField.val(cityField.val());
		//locStateField.val(stateField.val());		
		locPostcodeField.val(postcodeField.val());
		locCountryField.val(countryField.val().toLowerCase());	
		locLatField.val(latField.val());
		locLogField.val(logField.val());	
	}

	/**
	 * Equivalent to in_array() in php 
	 */ 
	Drupal.inArray = function (needle, haystack) {
		var length = haystack.length;
		for(var i = 0; i < length; i++) {
			if(haystack[i] == needle) return true;
		}
		return false;
	};
	
}(jQuery));


