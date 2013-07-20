<?php
// $Id: geolocation_proximity_field_distance.inc,v 1.3.2.3 2010/07/04 14:10:07 rooby Exp $

/**
 * General proximity filter for location latitude/longitude.
 */
class geolocation_proximity_geolocation_distance_handler extends views_handler_filter {
  // This is always single, because of the distance field's possible dependency
  // on it.
  var $no_single = TRUE;

  function option_definition() {
    $options = parent::option_definition();
    $options['operator'] = array('default' => 'mbr');

    $options['identifier'] = array('default' => 'dist');

    $options['origin'] = array('default' => 'user');

    $options['value'] = array(
      'default' => array(
        'latitude' => '',
        'longitude' => '',
        'search_distance' => 100,
        'search_units' => 'mile',
      ),
    );

    $options['expose']['gmap_macro'] = array('default' => '[gmap ]');
    $options['expose']['user_location_choose'] = array('default' => FALSE);

    return $options;
  }

  function admin_summary() {
    return '';
  }

  function operator_options() {
    return array(
      'dist' => t('Proximity (Circular)'),
    );
  }

  function expose_form_left(&$form, &$form_state) {
    parent::expose_form_left($form, $form_state);
    // @@@ Todo: autohide this.
    $form['expose']['gmap_macro'] = array(
      '#parents' => array('options', 'gmap_macro'),
      '#type' => 'textfield',
      '#title' => t('GMap macro'),
      '#description' => t('The macro to use for the Latitude / Longitude map, if applicable.'),
      '#default_value' => $this->options['gmap_macro'],
    );

    $form['expose']['user_location_choose'] = array(
      '#type' => 'checkbox',
      '#title' => t("Allow choice of user location"),
      '#default_value' => $this->options['expose']['user_location_choose'],
      '#description' => t("If checked and using a user location origin, the user will be able to choose which of their locations to use.  Otherwise their first location will be used."),
    );
  }

  function value_form(&$form, &$form_state) {
    $form['origin'] = array(
      '#type' => 'select',
      '#title' => t('Origin'),
      '#options' => array(
        'static' => t('Static  Latitude / Longitude'),
      ),
      '#description' => t('This will be the way the latitude/longitude of origin is determined.  If this filter is exposed, this will determine the default values. NOTE: The PHP code, nid argument and uid argument options will not be available when the filter is exposed and the use of map is only available when the filter is exposed.'),
      '#default_value' => $this->options['origin'] ? $this->options['origin'] : 'user',
    );

    // [11:44] <merlinofchaos> If you load the page from scratch, $input for your identifier will be empty.
    // [11:44] <merlinofchaos> So what's going on here is that for $_GET forms, there's no form id, no op button or anything, so they always appear to submit.
    // [11:45] <merlinofchaos> FAPI doesn't quite get along with that; sometimes it handles the input being empty right and sometimes it doesn't.
    // [11:45] <Bdragon> But if I set #default_value to a static string, it doesn't work either
    // [11:45] <merlinofchaos> Right, fapi thinks the empty input is actually input, thus it overrides the default value.
    // [11:45] <Bdragon> Ahh, hmm...
    // [11:46] <Bdragon> So where would I go to clean it up?
    // [11:55] <merlinofchaos> Bdragon: See views_handler_filter_string.inc line 174
    // [11:55] <merlinofchaos> Bdragon: That's how i address this problem.
    // [11:58] <Bdragon> Hmm, OK
    if (!empty($form_state['exposed'])) {
      $identifier = $this->options['expose']['identifier'];
      if (!isset($form_state['input'][$identifier])) {
        // We need to pretend the user already inputted the defaults, because
        // fapi will malfunction otherwise.
        $form_state['input'][$identifier] = $this->value;
      }
    }

    $form['value'] = array(
      '#tree' => TRUE,
    );

    $form['value']['latitude'] = array(
      '#type' => 'textfield',
      '#title' => t('Latitude'),
      '#default_value' => $this->value['latitude'],
      '#weight' => 1,
    );
    $form['value']['longitude'] = array(
      '#type' => 'textfield',
      '#title' => t('Longitude'),
      '#default_value' => $this->value['longitude'],
      '#weight' => 2,
    );
    $form['value']['search_distance'] = array(
      '#type' => 'textfield',
      '#title' => t('Max distance').' (km)',
      //'#description' => '('.t('in km').')',
      '#default_value' => $this->value['search_distance'],
      '#weight' => 3,
    );
  }

  function exposed_form(&$form, &$form_state) {
    parent::exposed_form($form, $form_state);
    $key = $this->options['expose']['identifier'];
    $origin = $this->options['origin'];
    if ($origin == 'latlon_gmap' && module_exists('gmap')) {
      // Bad things happen if we try to show a gmap in the views live preview.
      if ($form_state['post']['live_preview']) {
        $form[$key]['proximity_map'] = array(
          '#value' => t('Gmap location selection is not available during live preview.'),
          '#weight' => 0,
        );
      }
      else {
        $form[$key]['proximity_map'] = array(
          '#value' => gmap_set_location($this->options['gmap_macro'], $form[$key], array('latitude' => 'latitude', 'longitude' => 'longitude')),
          '#weight' => 0,
        );
      }
    }
    else if (($origin == 'user' || $origin == 'hybrid') && $this->options['expose']['user_location_choose']) {
      global $user;
      $user_locations = isset($user->locations) ? $user->locations : location_load_locations($user->uid, 'uid');
      $location_options = array();
      if (!empty($user_locations)) {
        foreach ($user_locations as $i => $location) {
          if (isset($location['latitude']) && isset($location['longitude'])) {
            if (!empty($location['name'])) {
              $location_options[$i] = t(check_plain($location['name']));
            }
            else {
              $location_options[$i] = t('Location #@num', array('@num' => $i + 1));
            }
          }
        }
      }

      $form[$key]['user_location_delta'] = array(
        '#type' => 'select',
        '#title' => t('Location'),
        '#options' => $location_options,
        '#description' => t('Select which of your locations to use.'),
        '#weight' => 0,
      );
    }

    // Remove unneeded fields when exposing the form.
    // It's shorter than redefining value_form.
    if ($origin != 'static' && $origin != 'latlon_gmap') {
      unset($form[$key]['latitude']);
      unset($form[$key]['longitude']);
    }
    if ($origin != 'postal' && $origin != 'postal_default') {
      unset($form[$key]['postal_code']);
    }
    if ($origin != 'postal') {
      unset($form[$key]['country']);
    }

    // And we definitely do not want to expose the php code option when exposing the filter
    unset($form[$key]['php_code']);
    // The nid/uid arg options are not useful on an exposed form.
    unset($form[$key]['nid_arg']);
    unset($form[$key]['nid_loc_field']);
    unset($form[$key]['uid_arg']);

    unset($form['origin']);
  }

  function query() {
    if (empty($this->value)) {
      return;
    }

    // We need to merge with $this->options['value'] for filter values
    // and $this->value for exposed filter values.
    $options = array_merge($this->options, $this->options['value'], $this->value);
	$lat = $options[0]['latitude'];
	$lon = $options[0]['longitude'];
	$distance = $options[0]['search_distance'];
	if(!(is_numeric($lat) && is_numeric($lon) && is_numeric($distance))){
		return;
	}

    $this->ensure_my_table();
	$distance_meters = $distance / 1.609;
    /*
	$distance_meters = _geolocation_proximity_convert_distance_to_meters($distance, $options['search_units']);
    $latrange = earth_latitude_range($lon, $lat, $distance_meters);
    $lonrange = earth_longitude_range($lon, $lat, $distance_meters);

	*/
	$fieldid = $options['field'];
	$fieldid = str_replace('_distance', '', $fieldid);
	$latcol = $fieldid.'_lat';
	$loncol = $fieldid.'_lng';
	
	
    // Add MBR check (always).
    // In case we go past the 180/-180 mark for longitude.
    //if ($lonrange[0] > $lonrange[1]) {
      //$where = "$this->table_alias.$latcol > ".$latrange[0]." AND $this->table_alias.$latcol < ".$latrange[1]." AND (($this->table_alias.$loncol < 180 AND $this->table_alias.$loncol > ".$lonrange[0].") OR ($this->table_alias.$loncol < ".$lonrange[1]." AND $this->table_alias.$loncol > -180))";
    //}
    //else {
      //$where = "$this->table_alias.$latcol > ".$latrange[0]." AND $this->table_alias.$latcol < ".$latrange[1]." AND $this->table_alias.$loncol > ".$lonrange[0]." AND $this->table_alias.$loncol < ".$lonrange[1];
    //}
	
	//$this->query->add_field(NULL, "((ACOS(SIN($lat * PI() / 180) * SIN($this->table_alias.$latcol * PI() / 180) + COS($lat * PI() / 180) * COS($this->table_alias.$latcol * PI() / 180) * COS(($lon - $this->table_alias.$loncol) * PI() / 180)) * 180 / PI()) * 60 * 1.1515)", $this->table_alias."_distance");
	$this->query->add_where_expression($this->options['group'], "((ACOS(SIN($lat * PI() / 180) * SIN($this->table_alias.$latcol * PI() / 180) + COS($lat * PI() / 180) * COS($this->table_alias.$latcol * PI() / 180) * COS(($lon - $this->table_alias.$loncol) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) < ".$distance_meters);
	
    //$this->query->add_where_expression($this->options['group'], $where);

    if ($this->operator == 'dist') {
      // Add radius check.
     // $this->query->add_where_expression($this->options['group'], earth_distance_sql($lon, $lat, $this->table_alias, $latcol, $loncol) .' < '.$distance_meters);
    }
  }
}
