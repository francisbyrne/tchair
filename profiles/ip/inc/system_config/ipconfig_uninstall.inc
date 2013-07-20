<?php

/**
 * @file
 *   Uninstall Color, Comment, Help, Overlay, Search, Toolbar.
 *
 */

function ipconfig_uninstall(){

	module_load_include("inc", "system", "system.admin");
	$form_id = 'system_modules_uninstall';
	$form_state = array (
	  'values' => 
	  array (
	    'uninstall' => 
	    array (
	      'color' => 1,
	      'comment' => 1,
	      'help' => 1,
	      'overlay' => 1,
	      'search' => 1,
	      'toolbar' => 1,
	    ),
	    'submit' => 'Uninstall',
	    'form_build_id' => 'form-gWMIPRxI8-qGIGoP-opLVxT5XwsRE-oaJx6_KLIYh-A',
	    'form_token' => 'Kz1sJHe-s7fEOnzkonSV8_WSR5b7CzAlW7P-pNn_2pg',
	    'form_id' => 'system_modules_uninstall',
	    'op' => 'Uninstall',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
	
}