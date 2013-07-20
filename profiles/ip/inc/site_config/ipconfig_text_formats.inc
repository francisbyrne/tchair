<?php

/**
 * @file
 *   1. Create Rich Text for admins and editors
 *   Name: Rich Text
 *   
 *   Roles: administrator, admin, editor
 *   
 *   Enabled filters: 
 *   Image caption filter
 *   Encode email addresses: Javascript-wrapped HTML entities 
 *   Encode email addresses: HTML entities 
 *   Convert URLs into links 
 *   Convert line breaks into HTML (i.e. <br> and <p>) 
 *   Correct faulty and chopped off HTML 
 *   
 *   Encode email addresses: Javascript-wrapped HTML entities:
 *   Automatically create links from email addresses.
 *   Break up text for filtering 
 *   
 *   Encode email addresses: HTML entities:
 *   Automatically create links from email addresses.
 *   Break up text for filtering 
 *   
 *   Filter processing order:
 *   Convert line breaks into HTML (i.e. <br> and <p>)
 *   Convert URLs into links
 *   Encode email addresses: Javascript-wrapped HTML entities
 *   Encode email addresses: HTML entities
 *   Correct faulty and chopped off HTML
 *   Image caption filter
 *   
 *   2. Create normal formats
 *   Name: normal
 *   
 *   Roles: anonymous user, authenticated user, administrator, admin, editor
 *   
 *   Enabled filters: 
 *   Encode email addresses: Javascript-wrapped HTML entities 
 *   Encode email addresses: HTML entities
 *   Convert URLs into links 
 *   Convert line breaks into HTML (i.e. <br> and <p>) 
 *   Correct faulty and chopped off HTML 
 *   
 *   Encode email addresses: Javascript-wrapped HTML entities:
 *   Automatically create links from email addresses.
 *   Break up text for filtering 
 *   
 *   Encode email addresses: HTML entities:
 *   Automatically create links from email addresses.
 *   Break up text for filtering 
 *   
 *   Filter processing order:
 *   Convert URLs into links
 *   Convert line breaks into HTML (i.e. <br> and <p>)
 *   Encode email addresses: Javascript-wrapped HTML entities
 *   Encode email addresses: HTML entities
 *   Correct faulty and chopped off HTML
 *   
 *   3. Disable Filtered HTML
 *   
 *   4. Reorder text formats
 *
 */

function ipconfig_text_formats(){
	

	module_load_include("inc", "filter", "filter.admin");
	
	//1. Create Rich Text for admins and editors
	$form_id = 'filter_admin_format_form';
	$form_state = array (
	  'values' => 
	  array (
	    'name' => 'Rich Text',
	    'format' => 'rich_text',
	    'roles' => 
	    array (
	      3 => '3',
	      4 => '4',
	      5 => '5',
	      1 => NULL,
	      2 => NULL,
	    ),
	    'filters' => 
	    array (
	      'filter_url' => 
	      array (
	        'status' => 1,
	        'weight' => '-8',
	        'settings' => 
	        array (
	          'filter_url_length' => '72',
	        ),
	      ),
	      'filter_autop' => 
	      array (
	        'status' => 1,
	        'weight' => '-9',
	      ),
	      'filter_htmlcorrector' => 
	      array (
	        'status' => 1,
	        'weight' => '-5',
	      ),
	      'filter_html_escape' => 
	      array (
	        'status' => NULL,
	        'weight' => '-10',
	      ),
	      'invisimail_encode_html_entities' => 
	      array (
	        'status' => 1,
	        'weight' => '-6',
	        'settings' => 
	        array (
	          'chunk' => 1,
	          'link' => 1,
	        ),
	      ),
	      'invisimail_encode_js_entities' => 
	      array (
	        'status' => 1,
	        'weight' => '-7',
	        'settings' => 
	        array (
	          'chunk' => 1,
	          'link' => 1,
	        ),
	      ),
	      'filter_image_caption' => 
	      array (
	        'status' => 1,
	        'weight' => '-4',
	        'settings' => 
	        array (
	          'classes' => 'image-left image-right standalone-image',
	        ),
	      ),
	      'filter_html' => 
	      array (
	        'status' => NULL,
	        'weight' => '-10',
	        'settings' => 
	        array (
	          'allowed_html' => '<a> <em> <strong> <cite> <blockquote> <code> <ul> <ol> <li> <dl> <dt> <dd>',
	          'filter_html_help' => 1,
	          'filter_html_nofollow' => NULL,
	        ),
	      ),
	      'php_code' => 
	      array (
	        'status' => NULL,
	        'weight' => '0',
	      ),
	    ),
	    'filter_settings' => 
	    array (
	      'filter_settings__active_tab' => 'edit-filters-invisimail-encode-html-entities-settings',
	    ),
	    'actions' => 
	    array (
	      'submit' => 'Save configuration',
	    ),
	    'form_build_id' => 'form-l6AkDOa3SZfJRK9aprWRDsBa3zR3IIEAfgxHTJI6zM0',
	    'form_token' => '-ZAAgGKcY7cnrPaOHhALujB_gnjiRd7edZCf2jvRc78',
	    'form_id' => 'filter_admin_format_form',
	    'op' => 'Save configuration',
	  ),
	);

	$arg0 = (object)(array(
	   'format' => NULL,
	   'name' => '',
	));
	drupal_form_submit ($form_id, $form_state, $arg0);
		
		
	//2. Create normal formats
	$form_id = 'filter_admin_format_form';
	$form_state = array (
	  'values' => 
	  array (
	    'name' => 'normal',
	    'format' => 'normal',
	    'roles' => 
	    array (
	      1 => '1',
	      2 => '2',
	      3 => '3',
	      4 => '4',
	      5 => '5',
	    ),
	    'filters' => 
	    array (
	      'filter_url' => 
	      array (
	        'status' => 1,
	        'weight' => '-11',
	        'settings' => 
	        array (
	          'filter_url_length' => '72',
	        ),
	      ),
	      'filter_autop' => 
	      array (
	        'status' => 1,
	        'weight' => '-9',
	      ),
	      'filter_htmlcorrector' => 
	      array (
	        'status' => 1,
	        'weight' => '-5',
	      ),
	      'filter_html_escape' => 
	      array (
	        'status' => NULL,
	        'weight' => '-10',
	      ),
	      'invisimail_encode_html_entities' => 
	      array (
	        'status' => 1,
	        'weight' => '-6',
	        'settings' => 
	        array (
	          'chunk' => 1,
	          'link' => 1,
	        ),
	      ),
	      'invisimail_encode_js_entities' => 
	      array (
	        'status' => 1,
	        'weight' => '-7',
	        'settings' => 
	        array (
	          'chunk' => 1,
	          'link' => 1,
	        ),
	      ),
	      'filter_image_caption' => 
	      array (
	        'status' => NULL,
	        'weight' => '0',
	        'settings' => 
	        array (
	          'classes' => 'image-left image-right standalone-image',
	        ),
	      ),
	      'filter_html' => 
	      array (
	        'status' => 1,
	        'weight' => '-10',
	        'settings' => 
	        array (
	          'allowed_html' => '<a> <em> <strong> <cite> <blockquote> <code> <ul> <ol> <li> <dl> <dt> <dd>',
	          'filter_html_help' => 1,
	          'filter_html_nofollow' => NULL,
	        ),
	      ),
	      'php_code' => 
	      array (
	        'status' => NULL,
	        'weight' => '0',
	      ),
	    ),
	    'filter_settings' => 
	    array (
	      'filter_settings__active_tab' => 'edit-filters-invisimail-encode-html-entities-settings',
	    ),
	    'actions' => 
	    array (
	      'submit' => 'Save configuration',
	    ),
	    'form_build_id' => 'form-AXYoZgrPGofLLp1aMX92qRYgIm2C_ZEBsQRsv3uuGXU',
	    'form_token' => '-ZAAgGKcY7cnrPaOHhALujB_gnjiRd7edZCf2jvRc78',
	    'form_id' => 'filter_admin_format_form',
	    'op' => 'Save configuration',
	  ),
	);

	$arg0 = (object)(array(
	   'format' => NULL,
	   'name' => '',
	));
	drupal_form_submit ($form_id, $form_state, $arg0);
		
		
	//3. Disable Filtered HTML
	$form_id = 'filter_admin_disable';
	$form_state = array (
	  'values' => 
	  array (
	    'confirm' => 1,
	    'submit' => 'Disable',
	    'form_build_id' => 'form-ZWhayCsmoFwMIMxXdqy3gd9GI3cfA89B1xnxUlj1F7U',
	    'form_token' => 'NBk7fZnfsE-YTv7Bb8EdVR5FYOL3J9DHZvL_pGhbu0s',
	    'form_id' => 'filter_admin_disable',
	    'op' => 'Disable',
	  ),
	);

	$arg0 = (object)(array(
	   'format' => 'filtered_html',
	   'name' => 'Filtered HTML',
	   'cache' => '1',
	   'status' => '1',
	   'weight' => '0',
	));
	drupal_form_submit ($form_id, $form_state, $arg0);
	
			
	//4. Reorder text formats		
	$form_id = 'filter_admin_overview';
	$form_state = array (
	  'values' => 
	  array (
	    'formats' => 
	    array (
	      'normal' => 
	      array (
	        'weight' => '-1',
	      ),
	      'rich_text' => 
	      array (
	        'weight' => '-2',
	      ),
	      'full_html' => 
	      array (
	        'weight' => '1',
	      ),
	      'plain_text' => 
	      array (
	        'weight' => '10',
	      ),
	      'php_code' => 
	      array (
	        'weight' => '10',
	      ),
	    ),
	    'actions' => 
	    array (
	      'submit' => 'Save changes',
	    ),
	    'form_build_id' => 'form-fW97cAamxPUo49MCOq2NvH8bVGjmDKLCTdMYhJsVGYk',
	    'form_token' => 'mHwMCueL2b15SmA0PmBrupARGRUPOzGvuw6rEipcWxg',
	    'form_id' => 'filter_admin_overview',
	    'op' => 'Save changes',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
		
}