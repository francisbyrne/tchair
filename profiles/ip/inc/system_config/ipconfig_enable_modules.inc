<?php

/**
 * @file
 *   Enable modules
 *
 *   #Core modules disabled
 *   color
 *   comment
 *   search
 *   help
 *   toolbar
 *
 * 
 *   #Optional core modules enabled
 *   php
 *   syslog
 * 
 *   #Contribution modules
 *   See ip.info
 *
 */

function ipconfig_enable_modules(){

	module_load_include("inc", "system", "system.admin");
	$form_id = 'system_modules';
	$form_state = array (
	  'values' => 
	  array (
	    'modules' => 
	    array (
	      'Access control' => 
	      array (
	        'menu_per_role' => 
	        array (
	          'enable' => 1,
	        ),
	      ),
	      'Administration' => 
	      array (
	        'admin_menu_alter' => 
	        array (
	          'enable' => 1,
	        ),
	        'admin_devel' => 
	        array (
	          'enable' => NULL,
	        ),
	        'admin_menu' => 
	        array (
	          'enable' => true,
	        ),
	        'admin_menu_toolbar' => 
	        array (
	          'enable' => NULL,
	        ),
	        'admin_views' => 
	        array (
	          'enable' => false,
	        ),
	        'menu_admin_per_menu' => 
	        array (
	          'enable' => 1,
	        ),
	      ),
	      'Chaos tool suite' => 
	      array (
	        'bulk_export' => 
	        array (
	          'enable' => NULL,
	        ),
	        'ctools' => 
	        array (
	          'enable' => true,
	        ),
	        'ctools_ajax_sample' => 
	        array (
	          'enable' => NULL,
	        ),
	        'ctools_plugin_example' => 
	        array (
	          'enable' => false,
	        ),
	        'ctools_custom_content' => 
	        array (
	          'enable' => NULL,
	        ),
	        'ctools_access_ruleset' => 
	        array (
	          'enable' => NULL,
	        ),
	        'page_manager' => 
	        array (
	          'enable' => NULL,
	        ),
	        'stylizer' => 
	        array (
	          'enable' => NULL,
	        ),
	        'views_content' => 
	        array (
	          'enable' => NULL,
	        ),
	      ),
	      'Core' => 
	      array (
	        'aggregator' => 
	        array (
	          'enable' => NULL,
	        ),
	        'block' => 
	        array (
	          'enable' => true,
	        ),
	        'blog' => 
	        array (
	          'enable' => NULL,
	        ),
	        'book' => 
	        array (
	          'enable' => NULL,
	        ),
	        'color' => 
	        array (
	          'enable' => NULL,
	        ),
	        'comment' => 
	        array (
	          'enable' => NULL,
	        ),
	        'contact' => 
	        array (
	          'enable' => NULL,
	        ),
	        'translation' => 
	        array (
	          'enable' => NULL,
	        ),
	        'contextual' => 
	        array (
	          'enable' => 1,
	        ),
	        'dashboard' => 
	        array (
	          'enable' => 1,
	        ),
	        'dblog' => 
	        array (
	          'enable' => 1,
	        ),
	        'field' => 
	        array (
	          'enable' => true,
	        ),
	        'field_sql_storage' => 
	        array (
	          'enable' => true,
	        ),
	        'field_ui' => 
	        array (
	          'enable' => 1,
	        ),
	        'file' => 
	        array (
	          'enable' => true,
	        ),
	        'filter' => 
	        array (
	          'enable' => true,
	        ),
	        'forum' => 
	        array (
	          'enable' => NULL,
	        ),
	        'help' => 
	        array (
	          'enable' => NULL,
	        ),
	        'image' => 
	        array (
	          'enable' => 1,
	        ),
	        'list' => 
	        array (
	          'enable' => 1,
	        ),
	        'locale' => 
	        array (
	          'enable' => NULL,
	        ),
	        'menu' => 
	        array (
	          'enable' => true,
	        ),
	        'node' => 
	        array (
	          'enable' => true,
	        ),
	        'number' => 
	        array (
	          'enable' => 1,
	        ),
	        'openid' => 
	        array (
	          'enable' => NULL,
	        ),
	        'options' => 
	        array (
	          'enable' => true,
	        ),
	        'overlay' => 
	        array (
	          'enable' => NULL,
	        ),
	        'path' => 
	        array (
	          'enable' => true,
	        ),
	        'php' => 
	        array (
	          'enable' => 1,
	        ),
	        'poll' => 
	        array (
	          'enable' => NULL,
	        ),
	        'rdf' => 
	        array (
	          'enable' => 1,
	        ),
	        'search' => 
	        array (
	          'enable' => NULL,
	        ),
	        'shortcut' => 
	        array (
	          'enable' => 1,
	        ),
	        'statistics' => 
	        array (
	          'enable' => NULL,
	        ),
	        'syslog' => 
	        array (
	          'enable' => 1,
	        ),
	        'system' => 
	        array (
	          'enable' => true,
	        ),
	        'taxonomy' => 
	        array (
	          'enable' => true,
	        ),
	        'simpletest' => 
	        array (
	          'enable' => NULL,
	        ),
	        'text' => 
	        array (
	          'enable' => true,
	        ),
	        'toolbar' => 
	        array (
	          'enable' => NULL,
	        ),
	        'tracker' => 
	        array (
	          'enable' => NULL,
	        ),
	        'trigger' => 
	        array (
	          'enable' => NULL,
	        ),
	        'update' => 
	        array (
	          'enable' => 1,
	        ),
	        'user' => 
	        array (
	          'enable' => true,
	        ),
	      ),
	      'Development' => 
	      array (
	        'devel' => 
	        array (
	          'enable' => true,
	        ),
	        'devel_generate' => 
	        array (
	          'enable' => NULL,
	        ),
	        'devel_node_access' => 
	        array (
	          'enable' => NULL,
	        ),
	        'module_builder' => 
	        array (
	          'enable' => 1,
	        ),
	        'zenophile' => 
	        array (
	          'enable' => true,
	        ),
	        'zenophile_midnight' => 
	        array (
	          'enable' => NULL,
	        ),
	        'zenophile_sidebars' => 
	        array (
	          'enable' => 1,
	        ),
	      ),
	      'Display suite' => 
	      array (
	        'ds' => 
	        array (
	          'enable' => true,
	        ),
	        'ds_extras' => 
	        array (
	          'enable' => 1,
	        ),
	        'ds_forms' => 
	        array (
	          'enable' => 1,
	        ),
	        'ds_search' => 
	        array (
	          'enable' => 1,
	        ),
	      ),
	      'Features' => 
	      array (
	        'content_block' => 
	        array (
	          'enable' => 1,
	        ),
	        'features' => 
	        array (
	          'enable' => true,
	        ),
	      ),
	      'Fields' => 
	      array (
	        'custom_formatters' => 
	        array (
	          'enable' => 1,
	        ),
	        'field_group' => 
	        array (
	          'enable' => NULL,
	        ),
	        'filefield_sources' => 
	        array (
	          'enable' => 1,
	        ),
	        'link' => 
	        array (
	          'enable' => NULL,
	        ),
	      ),
	      'Media' => 
	      array (
	        'imce' => 
	        array (
	          'enable' => true,
	        ),
	        'imce_crop' => 
	        array (
	          'enable' => 1,
	        ),
	        'imce_mkdir' => 
	        array (
	          'enable' => 1,
	        ),
	      ),
	      'Other' => 
	      array (
	        'navigation404' => 
	        array (
	          'enable' => 1,
	        ),
	        'block_titlelink' => 
	        array (
	          'enable' => 1,
	        ),
	        'diff' => 
	        array (
	          'enable' => 1,
	        ),
	        'globalredirect' => 
	        array (
	          'enable' => 1,
	        ),
	        'iconizer' => 
	        array (
	          'enable' => 1,
	        ),
	        'image_caption' => 
	        array (
	          'enable' => 1,
	        ),
	        'image_caption_filter' => 
	        array (
	          'enable' => 1,
	        ),
	        'invisimail' => 
	        array (
	          'enable' => 1,
	        ),
	        'masquerade' => 
	        array (
	          'enable' => 1,
	        ),
	        'nodeblock' => 
	        array (
	          'enable' => 1,
	        ),
	        'pathauto' => 
	        array (
	          'enable' => 1,
	        ),
	        'strongarm' => 
	        array (
	          'enable' => true,
	        ),
	        'token' => 
	        array (
	          'enable' => true,
	        ),
	      ),
	      'SEO' => 
	      array (
	        'page_title' => 
	        array (
	          'enable' => 1,
	        ),
	      ),
	      'Statistics' => 
	      array (
	        'googleanalytics' => 
	        array (
	          'enable' => NULL,
	        ),
	      ),
	      'Testing' => 
	      array (
	        'features_test' => 
	        array (
	          'enable' => NULL,
	        ),
	      ),
	      'User interface' => 
	      array (
	        'extlink' => 
	        array (
	          'enable' => 1,
	        ),
	        'imce_wysiwyg' => 
	        array (
	          'enable' => 1,
	        ),
	        'wysiwyg' => 
	        array (
	          'enable' => true,
	        ),
	      ),
	      'Views' => 
	      array (
	        'views' => 
	        array (
	          'enable' => true,
	        ),
	        'views_ui' => 
	        array (
	          'enable' => 1,
	        ),
	      ),
	      'XML sitemap' => 
	      array (
	        'xmlsitemap' => 
	        array (
	          'enable' => true,
	        ),
	        'xmlsitemap_custom' => 
	        array (
	          'enable' => 1,
	        ),
	        'xmlsitemap_engines' => 
	        array (
	          'enable' => 1,
	        ),
	        'xmlsitemap_i18n' => 
	        array (
	          'enable' => false,
	        ),
	        'xmlsitemap_menu' => 
	        array (
	          'enable' => 1,
	        ),
	        'xmlsitemap_node' => 
	        array (
	          'enable' => 1,
	        ),
	        'xmlsitemap_taxonomy' => 
	        array (
	          'enable' => 1,
	        ),
	        'xmlsitemap_user' => 
	        array (
	          'enable' => NULL,
	        ),
	      ),
	    ),
	    'submit' => 'Save configuration',
	    'form_build_id' => 'form-SF-UMsk50h2QDz-1AHSc7dAIG8rfnRqlmDCztaywIR8',
	    'form_token' => '5AfEsYXJjMiDxkKCUEfE-oetM7tf5WsOdSFOxP-I8rU',
	    'form_id' => 'system_modules',
	    'op' => 'Save configuration',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
	
}