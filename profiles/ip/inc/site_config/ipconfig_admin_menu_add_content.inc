<?php

/**
 * @file
 *   Add "Add content" menu to admin menu
 *   
 *
 */

function ipconfig_admin_menu_add_content(){
	module_load_include("inc", "menu", "menu.admin");
	$form_id = 'menu_edit_item';
	$form_state = array (
	  'values' => 
	  array (
	    'delete' => 'Delete',
	    'submit' => 'Save',
	    'link_title' => 'Add content',
	    'link_path' => 'node/add',
	    'mlid' => '428',
	    'module' => 'menu',
	    'has_children' => '0',
	    'options' => 
	    array (
	      'attributes' => 
	      array (
	        'title' => '',
	      ),
	      'alter' => true,
	    ),
	    'customized' => 1,
	    'original_item' => 
	    array (
	      'menu_name' => 'management',
	      'mlid' => '428',
	      'plid' => '1',
	      'link_path' => 'node/add',
	      'router_path' => 'node/add',
	      'link_title' => 'Add content',
	      'options' => 
	      array (
	        'attributes' => 
	        array (
	          'title' => '',
	        ),
	        'alter' => true,
	      ),
	      'module' => 'menu',
	      'hidden' => '0',
	      'external' => '0',
	      'has_children' => '0',
	      'expanded' => '0',
	      'weight' => '-50',
	      'depth' => '2',
	      'customized' => '1',
	      'p1' => '1',
	      'p2' => '428',
	      'p3' => '0',
	      'p4' => '0',
	      'p5' => '0',
	      'p6' => '0',
	      'p7' => '0',
	      'p8' => '0',
	      'p9' => '0',
	      'updated' => '0',
	      'path' => 'node/add',
	      'load_functions' => '',
	      'to_arg_functions' => '',
	      'access_callback' => '_node_add_access',
	      'access_arguments' => 'a:0:{}',
	      'page_callback' => 'node_add_page',
	      'page_arguments' => 'a:0:{}',
	      'delivery_callback' => '',
	      'fit' => '3',
	      'number_parts' => '2',
	      'context' => '0',
	      'tab_parent' => '',
	      'tab_root' => 'node/add',
	      'title' => 'Add content',
	      'title_callback' => 't',
	      'title_arguments' => '',
	      'theme_callback' => '',
	      'theme_arguments' => 'a:0:{}',
	      'type' => '6',
	      'description' => '',
	      'position' => '',
	      'include_file' => 'modules/node/node.pages.inc',
	      'link_weight' => '-50',
	      'href' => 'node/add',
	      'access' => true,
	      'localized_options' => 
	      array (
	        'attributes' => 
	        array (
	          'title' => '',
	        ),
	        'alter' => true,
	      ),
	    ),
	    'description' => '',
	    'enabled' => 1,
	    'expanded' => NULL,
	    'parent' => 'management:1',
	    'weight' => '-50',
	    'form_build_id' => 'form-5du6ZipUFDh012Bjv6uMvXUMaElpdstT1i0XXeUFdOI',
	    'form_token' => 'cNmaSMrDa2-xplSmRYJVUMYKgtZDOJt4tj632BeKmV8',
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
	        1 => NULL,
	        2 => NULL,
	        3 => NULL,
	        4 => NULL,
	        5 => NULL,
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
	  'mlid' => '428',
	  'plid' => '1',
	  'link_path' => 'node/add',
	  'router_path' => 'node/add',
	  'link_title' => 'Add content',
	  'options' => 
	  array (
	    'attributes' => 
	    array (
	      'title' => '',
	    ),
	    'alter' => true,
	  ),
	  'module' => 'menu',
	  'hidden' => '0',
	  'external' => '0',
	  'has_children' => '0',
	  'expanded' => '0',
	  'weight' => '-50',
	  'depth' => '2',
	  'customized' => '1',
	  'p1' => '1',
	  'p2' => '428',
	  'p3' => '0',
	  'p4' => '0',
	  'p5' => '0',
	  'p6' => '0',
	  'p7' => '0',
	  'p8' => '0',
	  'p9' => '0',
	  'updated' => '0',
	  'path' => 'node/add',
	  'load_functions' => '',
	  'to_arg_functions' => '',
	  'access_callback' => '_node_add_access',
	  'access_arguments' => 'a:0:{}',
	  'page_callback' => 'node_add_page',
	  'page_arguments' => 'a:0:{}',
	  'delivery_callback' => '',
	  'fit' => '3',
	  'number_parts' => '2',
	  'context' => '0',
	  'tab_parent' => '',
	  'tab_root' => 'node/add',
	  'title' => 'Add content',
	  'title_callback' => 't',
	  'title_arguments' => '',
	  'theme_callback' => '',
	  'theme_arguments' => 'a:0:{}',
	  'type' => '6',
	  'description' => '',
	  'position' => '',
	  'include_file' => 'modules/node/node.pages.inc',
	  'link_weight' => '-50',
	  'href' => 'node/add',
	  'access' => true,
	  'localized_options' => 
	  array (
	    'attributes' => 
	    array (
	      'title' => '',
	    ),
	    'alter' => true,
	  ),
	);

	$arg2 = NULL;
	drupal_form_submit ($form_id, $form_state, $arg0, $arg1, $arg2);
}