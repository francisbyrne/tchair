<?php

function geolocation_proximity_views_data() {
	$data = array();
  foreach (field_info_fields() as $field) {
	if($field['type'] != 'geolocation_latlng'){
		continue;
	}
	
	$fieldname = 'field_data_'.$field['field_name'];
	$data[$fieldname][$field['field_name']]["filter"] = array(
		'handler' => 'geolocation_proximity_geolocation_distance_handler',
	);
  }
  
  return $data;
}
