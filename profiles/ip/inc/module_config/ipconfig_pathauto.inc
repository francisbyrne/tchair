<?php

/**
 * @file
 *   Pathauto for basic page:
 *   [node:menu-link:parent]/[node:title]
 *
 */

function ipconfig_pathauto(){
	
	module_load_include("inc", "pathauto", "pathauto.admin");
	$form_id = 'pathauto_patterns_form';
	$form_state = array (
	  'values' => 
	  array (
	    'pathauto_node_pattern' => 'content/[node:title]',
	    'pathauto_node_page_pattern' => '[node:menu-link:parent]/[node:title]',
	    'pathauto_taxonomy_term_pattern' => '[term:vocabulary]/[term:name]',
	    'pathauto_taxonomy_term_tags_pattern' => '',
	    'pathauto_user_pattern' => 'users/[user:name]',
	    'submit' => 'Save configuration',
	    'form_build_id' => 'form-N3lA5SPjtnji1dZkEaA5Eb9MruCg_iQOnF4L1vENPqE',
	    'form_token' => 'GXnXFQKrceZDRMSK2WSnUMuiXbnuJJc1C3_GOvRkMfI',
	    'form_id' => 'pathauto_patterns_form',
	    'op' => 'Save configuration',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
}