<?php

/**
 * @file
 *   Set "Open external links in a new window".
 *   Exclude links for (.doc|.pdf|.xls).
 *
 */

function ipconfig_extlink(){
	
	module_load_include("module", "extlink", "extlink");
	
	$form_id = 'extlink_admin_settings';
	$form_state = array (
	  'values' => 
	  array (
	    'extlink_class' => 'ext',
	    'extlink_mailto_class' => 'mailto',
	    'extlink_subdomains' => 1,
	    'extlink_target' => '_blank',
	    'extlink_alert' => NULL,
	    'extlink_alert_text' => 'This link will take you to an external web site. We are not responsible for their content.',
	    'extlink_exclude' => '(.doc|.pdf|.xls)',
	    'extlink_include' => '',
	    'submit' => 'Save configuration',
	    'form_build_id' => 'form-qA-5RykBeaRyaP8R1UaBFVInAZ41e2opYydukLBveDY',
	    'form_token' => 'dOhHaQtN8ux2AyACtqlGCCgG4hN2WByz9tIZM4dc6iY',
	    'form_id' => 'extlink_admin_settings',
	    'op' => 'Save configuration',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
}