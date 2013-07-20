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

function ipconfig_imce(){
	
	//1. Set editor & admin to use Sample profile
	module_load_include("inc", "imce", "inc/imce.admin");
	$form_id = 'imce_admin_form';
	$form_state = array (
	  'values' => 
	  array (
	    'roles' => 
	    array (
	      5 => 
	      array (
	        'weight' => '0',
	        'public_pid' => '2',
	      ),
	      4 => 
	      array (
	        'weight' => '0',
	        'public_pid' => '2',
	      ),
	      3 => 
	      array (
	        'weight' => '0',
	        'public_pid' => NULL,
	      ),
	      2 => 
	      array (
	        'weight' => 11,
	        'public_pid' => NULL,
	      ),
	      1 => 
	      array (
	        'weight' => 12,
	        'public_pid' => NULL,
	      ),
	    ),
	    'textarea' => '',
	    'absurls' => NULL,
	    'replace' => '0',
	    'thumb_method' => 'scale_and_crop',
	    'disable_private' => 1,
	    'submit' => 'Save configuration',
	    'form_build_id' => 'form-MOUN_3JonOkjPOtmQhE97ExW-3RjDlBumwvvcZbc26Y',
	    'form_token' => 'XqfbOKAX0a3NxqjDJTFpTOEysSLddcQsodDwL_DZPM8',
	    'form_id' => 'imce_admin_form',
	    'op' => 'Save configuration',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);

	//	2. Sample profile setting
	$form_id = 'imce_profile_form';
	$form_state = array (
	  'values' => 
	  array (
	    'profile' => 
	    array (
	      'name' => 'Sample profile',
	      'usertab' => 1,
	      'filesize' => '1000',
	      'quota' => '2000',
	      'tuquota' => '0',
	      'extensions' => 'gif png jpg jpeg',
	      'dimensions' => '800x600',
	      'filenum' => '0',
	      'directories' => 
	      array (
	        0 => 
	        array (
	          'name' => 'images',
	          'subnav' => 1,
	          'browse' => 1,
	          'upload' => 1,
	          'thumb' => 1,
	          'delete' => 1,
	          'resize' => 1,
	          'crop' => 1,
	          'mkdir' => 1,
	          'rmdir' => 1,
	        ),
	        1 => 
	        array (
	          'name' => '',
	          'subnav' => NULL,
	          'browse' => NULL,
	          'upload' => NULL,
	          'thumb' => NULL,
	          'delete' => NULL,
	          'resize' => NULL,
	          'crop' => NULL,
	          'mkdir' => NULL,
	          'rmdir' => NULL,
	        ),
	        2 => 
	        array (
	          'name' => '',
	          'subnav' => NULL,
	          'browse' => NULL,
	          'upload' => NULL,
	          'thumb' => NULL,
	          'delete' => NULL,
	          'resize' => NULL,
	          'crop' => NULL,
	          'mkdir' => NULL,
	          'rmdir' => NULL,
	        ),
	      ),
	      'thumbnails' => 
	      array (
	        0 => 
	        array (
	          'name' => 'Thumb',
	          'dimensions' => '90x90',
	          'prefix' => 'thumb_',
	          'suffix' => '',
	        ),
	        1 => 
	        array (
	          'name' => '',
	          'dimensions' => '',
	          'prefix' => '',
	          'suffix' => '',
	        ),
	        2 => 
	        array (
	          'name' => '',
	          'dimensions' => '',
	          'prefix' => '',
	          'suffix' => '',
	        ),
	      ),
	      'mkdirnum' => '0',
	    ),
	    'pid' => '2',
	    'submit' => 'Save configuration',
	    'form_build_id' => 'form-PBx9abLkA4-2LDQER5aNCM63UEqEBQ1q8hNY4RiyiaQ',
	    'form_token' => 'Ad8ImcEiXH9eFHY36LDictfqZAxeDCQ94EGLt5RZ2Sw',
	    'form_id' => 'imce_profile_form',
	    'op' => 'Save configuration',
	  ),
	);

	$arg0 = '2';
	drupal_form_submit ($form_id, $form_state, $arg0);
}