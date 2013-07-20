<?php

/**
 * @file
 *   1. Create admin role.
 *	 2. Create editor role.
 *
 */

function ipconfig_user_role(){

	module_load_include('inc', 'user', 'user.admin');
	
	
	//1. Create admin role
	module_load_include("inc", "user", "user.admin");
	$form_id = 'user_admin_roles';
	$form_state = array (
	  'values' => 
	  array (
	    'roles' => 
	    array (
	      1 => 
	      array (
	        'weight' => '0',
	      ),
	      2 => 
	      array (
	        'weight' => '1',
	      ),
	      3 => 
	      array (
	        'weight' => '2',
	      ),
	    ),
	    'name' => 'admin',
	    'add' => 'Add role',
	    'submit' => 'Save order',
	    'form_build_id' => 'form-WvWCeeYmqzq_NhpK7p0L24CdBfC-30el8v_S0dOcZPg',
	    'form_token' => 'uCIpOPPnysPaXMLwSdJT3TYxig9A0lQ0kqwLhjdJDFc',
	    'form_id' => 'user_admin_roles',
	    'op' => 'Add role',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
	
	//2. Create editor role.
	module_load_include("inc", "user", "user.admin");
	$form_id = 'user_admin_roles';
	$form_state = array (
	  'values' => 
	  array (
	    'roles' => 
	    array (
	      1 => 
	      array (
	        'weight' => '0',
	      ),
	      2 => 
	      array (
	        'weight' => '1',
	      ),
	      3 => 
	      array (
	        'weight' => '2',
	      ),
	      4 => 
	      array (
	        'weight' => '3',
	      ),
	    ),
	    'name' => 'editor',
	    'add' => 'Add role',
	    'submit' => 'Save order',
	    'form_build_id' => 'form-fxvmZCgnbuOA-lRrzs_vKlcjka2XKnF0FiSX8gLpBMk',
	    'form_token' => 'uCIpOPPnysPaXMLwSdJT3TYxig9A0lQ0kqwLhjdJDFc',
	    'form_id' => 'user_admin_roles',
	    'op' => 'Add role',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
	
}