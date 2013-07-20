<?php

/**
 * @file
 *   1. Set editor & admin to use Sample profile
 *   
 *   2. Sample profile setting
 *   Maximum file size per upload = 1000 ; Directory quota = 2000; Maximum number of files per operation = 0; Maximum number of subdirectories = 0;
 *   Directories = images; check Delete, Resize, Crop, Add subdirectories, Remove subdirectories, including subdirectories
 *
 */

function ipconfig_iconizer(){
	
	module_load_include("inc", "iconizer", "iconizer.admin");
	$form_id = 'iconizer_admin_form';
	$form_state = array (
	  'values' => 
	  array (
	    'iconizer_admin_icons' => 1,
	    'iconizer_override_file_icon_directory' => 1,
	    'iconizer_files_icons' => 1,
	    'iconizer_file_icons_visibility' => '0',
	    'iconizer_file_icons_visibility_pages' => '',
	    'iconizer_proto_icons' => NULL,
	    'submit' => 'Save configuration',
	    'form_build_id' => 'form-91iB5y0ZgrBKEXomFMkFGuZ7-V83_9qVYJ4gZzE2Ax8',
	    'form_token' => 'JnNjTA1meDPPV9Vnx4t8NUfklud4vY75iwSvy3bhIvY',
	    'form_id' => 'iconizer_admin_form',
	    'op' => 'Save configuration',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
}