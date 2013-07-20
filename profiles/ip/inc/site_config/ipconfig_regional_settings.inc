<?php

/**
 * @file
 *   Default country = Australia
 *   Set First day of week = Monday; 
 *   Uncheck "Users may set their own time zone".
 *
 */
function ipconfig_regional_settings(){
	
	module_load_include("inc", "system", "system.admin");
	$form_id = 'system_regional_settings';
	$form_state = array (
	  'values' => 
	  array (
	    'site_default_country' => 'AU',
	    'date_first_day' => '1',
	    'date_default_timezone' => 'Australia/Melbourne',
	    'configurable_timezones' => NULL,
	    'empty_timezone_message' => NULL,
	    'user_default_timezone' => '0',
	    'submit' => 'Save configuration',
	    'form_build_id' => 'form-Umz_JmcIg4Ph2VcUC7i0f5nekhrZcQYluPFbGp-QquY',
	    'form_token' => 'Q_gYToTTozJeWWP7RGwCY7nY3uUdH0EqnppOkjqDeQ4',
	    'form_id' => 'system_regional_settings',
	    'op' => 'Save configuration',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
}