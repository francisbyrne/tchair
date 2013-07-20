<?php

/**
 * @file
 *   Delete article content type.
 *
 */

function ipconfig_content_type(){

	module_load_include("inc", "node", "content_types");
	$form_id = 'node_type_delete_confirm';
	$form_state = array (
	  'values' => 
	  array (
	    'type' => 'article',
	    'name' => 'Article',
	    'confirm' => 1,
	    'submit' => 'Delete',
	    'form_build_id' => 'form-Ex1ZzLg_4gc7CeUyBY4zrQ8DN39ab9eT1gfQxRpi6gU',
	    'form_token' => 'M40ftAinAFpamYZXOw5OYWjumniGYW-jZJdAXvAzsj8',
	    'form_id' => 'node_type_delete_confirm',
	    'op' => 'Delete',
	  ),
	);

	$arg0 = (object)(array(
	   'type' => 'article',
	   'name' => 'Article',
	   'base' => 'node_content',
	   'module' => 'node',
	   'description' => 'Use <em>articles</em> for time-sensitive content like news, press releases or blog posts.',
	   'help' => '',
	   'has_title' => '1',
	   'title_label' => 'Title',
	   'custom' => '1',
	   'modified' => '1',
	   'locked' => '0',
	   'disabled' => '0',
	   'orig_type' => 'article',
	   'disabled_changed' => false,
	));
	drupal_form_submit ($form_id, $form_state, $arg0);
	
}