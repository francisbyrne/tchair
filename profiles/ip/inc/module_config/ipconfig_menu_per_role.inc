<?php

/**
 * @file
 *   1. Hide Configuration menu from admin and editor.
 *  
 */

function ipconfig_menu_per_role(){
	
	//1. Hide Configuration menu from admin and editor.
	
	module_load_include("inc", "menu", "menu.admin");
	$form_id = 'menu_edit_item';
	$form_state = array (
	  'values' => 
	  array (
	    'submit' => 'Save',
	    'link_title' => 'Configuration',
	    'link_path' => 'admin/config',
	    'mlid' => '8',
	    'module' => 'system',
	    'has_children' => '1',
	    'options' => 
	    array (
	      'attributes' => 
	      array (
	        'title' => 'Administer settings.',
	      ),
	      'alter' => true,
	    ),
	    'customized' => 1,
	    'original_item' => 
	    array (
	      'menu_name' => 'management',
	      'mlid' => '8',
	      'plid' => '1',
	      'link_path' => 'admin/config',
	      'router_path' => 'admin/config',
	      'link_title' => 'Configuration',
	      'options' => 
	      array (
	        'attributes' => 
	        array (
	          'title' => 'Administer settings.',
	        ),
	        'alter' => true,
	      ),
	      'module' => 'system',
	      'hidden' => '0',
	      'external' => '0',
	      'has_children' => '1',
	      'expanded' => '0',
	      'weight' => '0',
	      'depth' => '2',
	      'customized' => '1',
	      'p1' => '1',
	      'p2' => '8',
	      'p3' => '0',
	      'p4' => '0',
	      'p5' => '0',
	      'p6' => '0',
	      'p7' => '0',
	      'p8' => '0',
	      'p9' => '0',
	      'updated' => '0',
	      'path' => 'admin/config',
	      'load_functions' => '',
	      'to_arg_functions' => '',
	      'access_callback' => 'user_access',
	      'access_arguments' => 'a:1:{i:0;s:27:"access administration pages";}',
	      'page_callback' => 'system_admin_config_page',
	      'page_arguments' => 'a:0:{}',
	      'delivery_callback' => '',
	      'fit' => '3',
	      'number_parts' => '2',
	      'context' => '0',
	      'tab_parent' => '',
	      'tab_root' => 'admin/config',
	      'title' => 'Configuration',
	      'title_callback' => 't',
	      'title_arguments' => '',
	      'theme_callback' => '',
	      'theme_arguments' => 'a:0:{}',
	      'type' => '6',
	      'description' => 'Administer settings.',
	      'position' => '',
	      'include_file' => 'modules/system/system.admin.inc',
	      'link_weight' => '0',
	      'href' => 'admin/config',
	      'access' => true,
	      'localized_options' => 
	      array (
	        'attributes' => 
	        array (
	          'title' => 'Administer settings.',
	        ),
	        'alter' => true,
	      ),
	    ),
	    'description' => 'Administer settings.',
	    'enabled' => 1,
	    'expanded' => NULL,
	    'parent' => 'management:1',
	    'weight' => '0',
	    'form_build_id' => 'form-LU1x9ZaHjBNN4lI2xeQvJd9_-xe3PV5kZC6pLRmf4Yc',
	    'form_token' => '8XztjR-gONO3Asm3oVONRVWyWwRWQ7JQbBFgRRHITTg',
	    'form_id' => 'menu_edit_item',
	    'menu_per_role' => 
	    array (
	      'menu_per_role_roles' => 
	      array (
	        1 => NULL,
	        2 => NULL,
	        3 => NULL,
	        4 => NULL,
	        5 => NULL,
	      ),
	      'menu_per_role_hide_from_roles' => 
	      array (
	        4 => '4',
	        5 => '5',
	        1 => NULL,
	        2 => NULL,
	        3 => NULL,
	      ),
	    ),
	    'xmlsitemap' => 
	    array (
	      'status' => 'default',
	      'status_default' => NULL,
	      'status_override' => '0',
	      'priority' => 'default',
	      'priority_default' => 0.5,
	      'priority_override' => '0',
	    ),
	    'op' => 'Save',
	  ),
	);

	$arg0 = 'edit';

	$arg1 = array (
	  'menu_name' => 'management',
	  'mlid' => '8',
	  'plid' => '1',
	  'link_path' => 'admin/config',
	  'router_path' => 'admin/config',
	  'link_title' => 'Configuration',
	  'options' => 
	  array (
	    'attributes' => 
	    array (
	      'title' => 'Administer settings.',
	    ),
	    'alter' => true,
	  ),
	  'module' => 'system',
	  'hidden' => '0',
	  'external' => '0',
	  'has_children' => '1',
	  'expanded' => '0',
	  'weight' => '0',
	  'depth' => '2',
	  'customized' => '1',
	  'p1' => '1',
	  'p2' => '8',
	  'p3' => '0',
	  'p4' => '0',
	  'p5' => '0',
	  'p6' => '0',
	  'p7' => '0',
	  'p8' => '0',
	  'p9' => '0',
	  'updated' => '0',
	  'path' => 'admin/config',
	  'load_functions' => '',
	  'to_arg_functions' => '',
	  'access_callback' => 'user_access',
	  'access_arguments' => 'a:1:{i:0;s:27:"access administration pages";}',
	  'page_callback' => 'system_admin_config_page',
	  'page_arguments' => 'a:0:{}',
	  'delivery_callback' => '',
	  'fit' => '3',
	  'number_parts' => '2',
	  'context' => '0',
	  'tab_parent' => '',
	  'tab_root' => 'admin/config',
	  'title' => 'Configuration',
	  'title_callback' => 't',
	  'title_arguments' => '',
	  'theme_callback' => '',
	  'theme_arguments' => 'a:0:{}',
	  'type' => '6',
	  'description' => 'Administer settings.',
	  'position' => '',
	  'include_file' => 'modules/system/system.admin.inc',
	  'link_weight' => '0',
	  'href' => 'admin/config',
	  'access' => true,
	  'localized_options' => 
	  array (
	    'attributes' => 
	    array (
	      'title' => 'Administer settings.',
	    ),
	    'alter' => true,
	  ),
	);

	$arg2 = NULL;
	drupal_form_submit ($form_id, $form_state, $arg0, $arg1, $arg2);
	
}