<?php

/**
 * @file
 *   1. Set "Keep menu at top of page".
 */

function ipconfig_admin_menu(){
	
	//1. Set "Keep menu at top of page".
	module_load_include("inc", "admin_menu", "admin_menu");
	$form_id = 'admin_menu_theme_settings';
	$form_state = array (
	  'values' => 
	  array (
	    'admin_menu_margin_top' => 1,
	    'admin_menu_position_fixed' => 1,
	    'admin_menu_tweak_modules' => NULL,
	    'admin_menu_tweak_permissions' => NULL,
	    'admin_menu_tweak_tabs' => NULL,
	    'admin_menu_devel_modules_skip' => 
	    array (
	      'admin_devel' => NULL,
	      'devel' => NULL,
	      'devel_node_access' => NULL,
	      'field_ui' => NULL,
	      'views_ui' => NULL,
	    ),
	    'submit' => 'Save configuration',
	    'form_build_id' => 'form-PqYPV8ryGpkWK5a0K9IYoPH2rtZKrkBktHHnGhjtDg0',
	    'form_token' => 'mxv3RWHXQgRKA8yBV3WLAgsyyYrp4c-MmLfsRefZepA',
	    'form_id' => 'admin_menu_theme_settings',
	    'op' => 'Save configuration',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
	

}