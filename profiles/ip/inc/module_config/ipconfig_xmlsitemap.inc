<?php

/**
 * @file
 *   Enable xmlsitemap for basic page.
 *
 */

/**
 * Implementation of hook_drush_command().
 *
 * @return
 *   An associative array describing your command(s).
 */
function ipconfig_xmlsitemap_drush_command() {
  $items = array();
  $items['ipconfig_xmlsitemap']= array(
    'description' => "Enable xmlsitemap for basic page.",
	'callback' => 'ipconfig_xmlsitemap',
    'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_FULL,

  );
  return $items;
}

function ipconfig_xmlsitemap(){
	
	module_load_include("inc", "node", "content_types");
	$form_id = 'node_type_form';
	$form_state = array (
	  'values' => 
	  array (
	    'name' => 'Basic page',
	    'type' => 'page',
	    'description' => 'Use <em>basic pages</em> for your static content, such as an \'About us\' page.',
	    'additional_settings__active_tab' => 'edit-xmlsitemap',
	    'title_label' => 'Title',
	    'node_preview' => '1',
	    'help' => '',
	    'node_options' => 
	    array (
	      'status' => 'status',
	      'promote' => NULL,
	      'sticky' => NULL,
	      'revision' => NULL,
	    ),
	    'node_submitted' => NULL,
	    'old_type' => 'page',
	    'orig_type' => 'page',
	    'base' => 'node_content',
	    'custom' => '1',
	    'modified' => '1',
	    'locked' => '0',
	    'submit' => 'Save content type',
	    'delete' => 'Delete content type',
	    'form_build_id' => 'form-IIzlFKFL7Hx0VQH8hmTUHr9mGXMn_eN047Qr15H10Tw',
	    'form_token' => 'ukYKxCstQIvdyRTyngIKUJ3ao7Qk3aVPVCSgt-yseGw',
	    'form_id' => 'node_type_form',
	    'show_preview_changes' => 1,
	    'show_diff_inline' => NULL,
	    'enable_revisions_page' => 1,
	    'menu_options' => 
	    array (
	      'main-menu' => 'main-menu',
	      'devel' => NULL,
	      'management' => NULL,
	      'navigation' => NULL,
	      'user-menu' => NULL,
	    ),
	    'menu_parent' => 'main-menu:0',
	    'nodeblock' => '0',
	    'nodeblock_view_mode' => 'full',
	    'nodeblock_node_link' => '0',
	    'nodeblock_comment_link' => '0',
	    'page_title' => 
	    array (
	      'show_field' => 
	      array (
	        'show_field' => NULL,
	      ),
	      'pattern' => '',
	    ),
	    'xmlsitemap' => 
	    array (
	      'status' => '1',
	      'priority' => '0.5',
	    ),
	    'op' => 'Save content type',
	  ),
	);

	$arg0 = (object)(array(
	   'type' => 'page',
	   'name' => 'Basic page',
	   'base' => 'node_content',
	   'module' => 'node',
	   'description' => 'Use <em>basic pages</em> for your static content, such as an \'About us\' page.',
	   'help' => '',
	   'has_title' => '1',
	   'title_label' => 'Title',
	   'custom' => '1',
	   'modified' => '1',
	   'locked' => '0',
	   'disabled' => '0',
	   'orig_type' => 'page',
	   'disabled_changed' => false,
	));
	
	drupal_form_submit ($form_id, $form_state, $arg0);
}