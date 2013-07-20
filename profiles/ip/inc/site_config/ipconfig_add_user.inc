<?php

/**
 * @file
 *   1. Add INadmin & INeditor
 *   
 *
 */


function ipconfig_add_user(){
	module_load_include("module", "user", "user");
	
	$form_id = 'user_register_form';
	$form_state = array (
	  'values' => 
	  array (
	    'name' => 'INadmin',
	    'mail' => 'admin@insights.net.au',
	    'pass' => '1234',
	    'status' => '1',
	    'roles' => 
	    array (
	      4 => '4',
	      3 => NULL,
	      5 => NULL,
	    ),
	    'notify' => NULL,
	    'signature' => '',
	    'picture' => NULL,
	    'picture_delete' => NULL,
	    'picture_upload' => '',
	    'submit' => 'Create new account',
	    'form_build_id' => 'form-7ZvjrhYVfgidzUzgUVSY8y9MiTwA5suJF_ANDdl8YdY',
	    'form_token' => 'uJxFpqjaGEZXg9E0j0mfCV-uxMeczE2Ojk1WJNqR5Ls',
	    'form_id' => 'user_register_form',
	    'op' => 'Create new account',
	    'signature_format' => 'rich_text',
	  ),
	);
	
	drupal_form_submit ($form_id, $form_state);
	
	$form_id = 'user_register_form';
	$form_state = array (
	  'values' => 
	  array (
	    'name' => 'INeditor',
	    'mail' => 'editor@insights.net.au',
	    'pass' => '1234',
	    'status' => '1',
	    'roles' => 
	    array (
	      5 => '5',	
	      3 => NULL,		
	      4 => NULL,
	    ),
	    'notify' => NULL,
	    'signature' => '',
	    'picture' => NULL,
	    'picture_delete' => NULL,
	    'picture_upload' => '',
	    'submit' => 'Create new account',
	    'form_build_id' => 'form-7ZvjrhYVfgidzUzgUVSY8y9MiTwA5suJF_ANDdl8YdY',
	    'form_token' => 'uJxFpqjaGEZXg9E0j0mfCV-uxMeczE2Ojk1WJNqR5Ls',
	    'form_id' => 'user_register_form',
	    'op' => 'Create new account',
	    'signature_format' => 'rich_text',
	  ),
	);	
	
	drupal_form_submit ($form_id, $form_state);
}