<?php

/**
 * @file
 *   Hide System help, Navigation, User login & Powered by Drupal
 *   
 *
 */

function ipconfig_block(){
	
	module_load_include("inc", "block", "block.admin");
	$form_id = 'block_admin_display_form';
	$form_state = array (
	  'values' => 
	  array (
	    'edited_theme' => 'bartik',
	    'block_regions' => 
	    array (
	      'header' => 'Header',
	      'help' => 'Help',
	      'highlighted' => 'Highlighted',
	      'featured' => 'Featured',
	      'content' => 'Content',
	      'sidebar_first' => 'Sidebar first',
	      'sidebar_second' => 'Sidebar second',
	      'triptych_first' => 'Triptych first',
	      'triptych_middle' => 'Triptych middle',
	      'triptych_last' => 'Triptych last',
	      'footer_firstcolumn' => 'Footer first column',
	      'footer_secondcolumn' => 'Footer second column',
	      'footer_thirdcolumn' => 'Footer third column',
	      'footer_fourthcolumn' => 'Footer fourth column',
	      'footer' => 'Footer',
	      -1 => -1,
	    ),
	    'blocks' => 
	    array (
	      'system_help' => 
	      array (
	        'module' => 'system',
	        'delta' => 'help',
	        'theme' => 'bartik',
	        'weight' => '-7',
	        'region' => -1,
	      ),
	      'system_main' => 
	      array (
	        'module' => 'system',
	        'delta' => 'main',
	        'theme' => 'bartik',
	        'weight' => '0',
	        'region' => 'content',
	      ),
	      'system_navigation' => 
	      array (
	        'module' => 'system',
	        'delta' => 'navigation',
	        'theme' => 'bartik',
	        'weight' => '-8',
	        'region' => -1,
	      ),
	      'user_login' => 
	      array (
	        'module' => 'user',
	        'delta' => 'login',
	        'theme' => 'bartik',
	        'weight' => '-9',
	        'region' => -1,
	      ),
	      'system_powered-by' => 
	      array (
	        'module' => 'system',
	        'delta' => 'powered-by',
	        'theme' => 'bartik',
	        'weight' => '-9',
	        'region' => -1,
	      ),
	      'menu_devel' => 
	      array (
	        'module' => 'menu',
	        'delta' => 'devel',
	        'theme' => 'bartik',
	        'weight' => '-6',
	        'region' => -1,
	      ),
	      'devel_execute_php' => 
	      array (
	        'module' => 'devel',
	        'delta' => 'execute_php',
	        'theme' => 'bartik',
	        'weight' => '-5',
	        'region' => -1,
	      ),
	      'diff_inline' => 
	      array (
	        'module' => 'diff',
	        'delta' => 'inline',
	        'theme' => 'bartik',
	        'weight' => '-4',
	        'region' => -1,
	      ),
	      'system_main-menu' => 
	      array (
	        'module' => 'system',
	        'delta' => 'main-menu',
	        'theme' => 'bartik',
	        'weight' => '-3',
	        'region' => -1,
	      ),
	      'system_management' => 
	      array (
	        'module' => 'system',
	        'delta' => 'management',
	        'theme' => 'bartik',
	        'weight' => '-2',
	        'region' => -1,
	      ),
	      'masquerade_masquerade' => 
	      array (
	        'module' => 'masquerade',
	        'delta' => 'masquerade',
	        'theme' => 'bartik',
	        'weight' => '-1',
	        'region' => -1,
	      ),
	      'node_recent' => 
	      array (
	        'module' => 'node',
	        'delta' => 'recent',
	        'theme' => 'bartik',
	        'weight' => '0',
	        'region' => -1,
	      ),
	      'shortcut_shortcuts' => 
	      array (
	        'module' => 'shortcut',
	        'delta' => 'shortcuts',
	        'theme' => 'bartik',
	        'weight' => '1',
	        'region' => -1,
	      ),
	      'devel_switch_user' => 
	      array (
	        'module' => 'devel',
	        'delta' => 'switch_user',
	        'theme' => 'bartik',
	        'weight' => '2',
	        'region' => -1,
	      ),
	      'node_syndicate' => 
	      array (
	        'module' => 'node',
	        'delta' => 'syndicate',
	        'theme' => 'bartik',
	        'weight' => '3',
	        'region' => -1,
	      ),
	      'system_user-menu' => 
	      array (
	        'module' => 'system',
	        'delta' => 'user-menu',
	        'theme' => 'bartik',
	        'weight' => '4',
	        'region' => -1,
	      ),
	      'user_new' => 
	      array (
	        'module' => 'user',
	        'delta' => 'new',
	        'theme' => 'bartik',
	        'weight' => '5',
	        'region' => -1,
	      ),
	      'user_online' => 
	      array (
	        'module' => 'user',
	        'delta' => 'online',
	        'theme' => 'bartik',
	        'weight' => '6',
	        'region' => -1,
	      ),
	    ),
	    'submit' => 'Save blocks',
	    'form_build_id' => 'form-XjgsA4e2x-oq_uIz8o6T6WUcctCPad64diiBhpVCMcE',
	    'form_token' => 'joHw-NR05UngMiPVyivep1CwqaGVQHEvwOTH12Jp1Co',
	    'form_id' => 'block_admin_display_form',
	    'op' => 'Save blocks',
	  ),
	);

	$arg0 = array (
	  0 => 
	  array (
	    'bid' => '7',
	    'module' => 'system',
	    'delta' => 'help',
	    'theme' => 'bartik',
	    'status' => '1',
	    'weight' => '0',
	    'region' => 'help',
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'System help',
	  ),
	  1 => 
	  array (
	    'bid' => '1',
	    'module' => 'system',
	    'delta' => 'main',
	    'theme' => 'bartik',
	    'status' => '1',
	    'weight' => '0',
	    'region' => 'content',
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Main page content',
	  ),
	  2 => 
	  array (
	    'bid' => '5',
	    'module' => 'system',
	    'delta' => 'navigation',
	    'theme' => 'bartik',
	    'status' => '1',
	    'weight' => '0',
	    'region' => 'sidebar_first',
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Navigation',
	  ),
	  3 => 
	  array (
	    'bid' => '4',
	    'module' => 'user',
	    'delta' => 'login',
	    'theme' => 'bartik',
	    'status' => '1',
	    'weight' => '0',
	    'region' => 'sidebar_first',
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'User login',
	  ),
	  4 => 
	  array (
	    'bid' => '6',
	    'module' => 'system',
	    'delta' => 'powered-by',
	    'theme' => 'bartik',
	    'status' => '1',
	    'weight' => '10',
	    'region' => 'footer',
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Powered by Drupal',
	  ),
	  5 => 
	  array (
	    'bid' => '33',
	    'module' => 'menu',
	    'delta' => 'devel',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Development',
	  ),
	  6 => 
	  array (
	    'bid' => '34',
	    'module' => 'devel',
	    'delta' => 'execute_php',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Execute PHP',
	  ),
	  7 => 
	  array (
	    'bid' => '32',
	    'module' => 'diff',
	    'delta' => 'inline',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => '1',
	    'info' => 'Inline diff',
	  ),
	  8 => 
	  array (
	    'bid' => '19',
	    'module' => 'system',
	    'delta' => 'main-menu',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Main menu',
	  ),
	  9 => 
	  array (
	    'bid' => '17',
	    'module' => 'system',
	    'delta' => 'management',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Management',
	  ),
	  10 => 
	  array (
	    'bid' => '31',
	    'module' => 'masquerade',
	    'delta' => 'masquerade',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Masquerade',
	  ),
	  11 => 
	  array (
	    'bid' => '15',
	    'module' => 'node',
	    'delta' => 'recent',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => '1',
	    'info' => 'Recent content',
	  ),
	  12 => 
	  array (
	    'bid' => '16',
	    'module' => 'shortcut',
	    'delta' => 'shortcuts',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Shortcuts',
	  ),
	  13 => 
	  array (
	    'bid' => '35',
	    'module' => 'devel',
	    'delta' => 'switch_user',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Switch user',
	  ),
	  14 => 
	  array (
	    'bid' => '14',
	    'module' => 'node',
	    'delta' => 'syndicate',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Syndicate',
	  ),
	  15 => 
	  array (
	    'bid' => '18',
	    'module' => 'system',
	    'delta' => 'user-menu',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'User menu',
	  ),
	  16 => 
	  array (
	    'bid' => '20',
	    'module' => 'user',
	    'delta' => 'new',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => '1',
	    'info' => 'Who\'s new',
	  ),
	  17 => 
	  array (
	    'bid' => '21',
	    'module' => 'user',
	    'delta' => 'online',
	    'theme' => 'bartik',
	    'status' => 0,
	    'weight' => '0',
	    'region' => -1,
	    'custom' => '0',
	    'visibility' => '0',
	    'pages' => '',
	    'title' => '',
	    'cache' => -1,
	    'info' => 'Who\'s online',
	  ),
	);

	$arg1 = 'bartik';
	drupal_form_submit ($form_id, $form_state, $arg0, $arg1);
}