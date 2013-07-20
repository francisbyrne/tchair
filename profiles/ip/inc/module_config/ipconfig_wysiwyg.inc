<?php

/**
 * @file
 *   1. set tinymce for rich text and normal format
 *   
 *   2. configure tinymce for rich text
 *   
 *   3.  configure tinymce for normal
 *
 */

function ipconfig_wysiwyg(){
	
	//1. set tinymce for rich text and normal format
	module_load_include("inc", "wysiwyg", "wysiwyg.admin");
	$form_id = 'wysiwyg_profile_overview';
	$form_state = array (
	  'values' => 
	  array (
	    'formats' => 
	    array (
	      'rich_text' => 
	      array (
	        'editor' => 'tinymce',
	      ),
	      'normal' => 
	      array (
	        'editor' => 'tinymce',
	      ),
	      'full_html' => 
	      array (
	        'editor' => '',
	      ),
	      'php_code' => 
	      array (
	        'editor' => '',
	      ),
	      'plain_text' => 
	      array (
	        'editor' => '',
	      ),
	    ),
	    'submit' => 'Save',
	    'form_build_id' => 'form-PBBZua3WqGBmE6V6FW9nU0Kjdco5qUMXu3MhOjzgWuY',
	    'form_token' => 'UNEvag9BOY3YI-SMN8gAQFlb4hdOQKEQKKp6HLM_630',
	    'form_id' => 'wysiwyg_profile_overview',
	    'op' => 'Save',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
	
	
	//2. configure tinymce for rich text
	module_load_include("inc", "wysiwyg", "wysiwyg.admin");
	$form_id = 'wysiwyg_profile_form';
	$form_state = array (
	  'values' => 
	  array (
	    'format' => 'rich_text',
	    'input_format' => 'Rich Text',
	    'editor' => 'tinymce',
	    'default' => 1,
	    'user_choose' => NULL,
	    'show_toggle' => 1,
	    'theme' => 'advanced',
	    'language' => 'en',
	    'buttons' => 
	    array (
	      'default' => 
	      array (
	        'bold' => 1,
	        'italic' => 1,
	        'underline' => NULL,
	        'strikethrough' => 1,
	        'justifyleft' => 1,
	        'justifycenter' => 1,
	        'justifyright' => 1,
	        'justifyfull' => 1,
	        'bullist' => 1,
	        'numlist' => 1,
	        'outdent' => 1,
	        'indent' => 1,
	        'undo' => 1,
	        'redo' => 1,
	        'link' => 1,
	        'unlink' => 1,
	        'anchor' => 1,
	        'image' => 1,
	        'cleanup' => 1,
	        'forecolor' => 1,
	        'backcolor' => 1,
	        'sup' => 1,
	        'sub' => NULL,
	        'blockquote' => NULL,
	        'code' => NULL,
	        'hr' => 1,
	        'cut' => 1,
	        'copy' => NULL,
	        'paste' => NULL,
	        'visualaid' => NULL,
	        'removeformat' => 1,
	        'charmap' => 1,
	        'help' => NULL,
	      ),
	      'advhr' => 
	      array (
	        'advhr' => NULL,
	      ),
	      'advimage' => 
	      array (
	        'advimage' => NULL,
	      ),
	      'advlink' => 
	      array (
	        'advlink' => NULL,
	      ),
	      'autosave' => 
	      array (
	        'autosave' => NULL,
	      ),
	      'contextmenu' => 
	      array (
	        'contextmenu' => NULL,
	      ),
	      'directionality' => 
	      array (
	        'ltr' => NULL,
	        'rtl' => NULL,
	      ),
	      'emotions' => 
	      array (
	        'emotions' => NULL,
	      ),
	      'font' => 
	      array (
	        'formatselect' => 1,
	        'fontselect' => NULL,
	        'fontsizeselect' => NULL,
	        'styleselect' => 1,
	      ),
	      'fullscreen' => 
	      array (
	        'fullscreen' => NULL,
	      ),
	      'inlinepopups' => 
	      array (
	        'inlinepopups' => NULL,
	      ),
	      'insertdatetime' => 
	      array (
	        'insertdate' => NULL,
	        'inserttime' => NULL,
	      ),
	      'layer' => 
	      array (
	        'insertlayer' => NULL,
	        'moveforward' => NULL,
	        'movebackward' => NULL,
	        'absolute' => NULL,
	      ),
	      'paste' => 
	      array (
	        'pastetext' => NULL,
	        'pasteword' => 1,
	        'selectall' => NULL,
	      ),
	      'preview' => 
	      array (
	        'preview' => NULL,
	      ),
	      'print' => 
	      array (
	        'print' => NULL,
	      ),
	      'searchreplace' => 
	      array (
	        'search' => NULL,
	        'replace' => NULL,
	      ),
	      'style' => 
	      array (
	        'styleprops' => NULL,
	      ),
	      'table' => 
	      array (
	        'tablecontrols' => NULL,
	      ),
	      'media' => 
	      array (
	        'media' => 1,
	      ),
	      'xhtmlxtras' => 
	      array (
	        'cite' => NULL,
	        'del' => 1,
	        'abbr' => NULL,
	        'acronym' => NULL,
	        'ins' => NULL,
	        'attribs' => NULL,
	      ),
	      'bbcode' => 
	      array (
	        'bbcode' => NULL,
	      ),
	      'autoresize' => 
	      array (
	        'autoresize' => NULL,
	      ),
	      'advlist' => 
	      array (
	        'advlist' => NULL,
	      ),
	      'wordcount' => 
	      array (
	        'wordcount' => NULL,
	      ),
	      'imce' => 
	      array (
	        'imce' => 1,
	      ),
	      'drupal' => 
	      array (
	        'break' => 1,
	      ),
	    ),
	    'toolbar_loc' => 'top',
	    'toolbar_align' => 'left',
	    'path_loc' => 'bottom',
	    'resizing' => 1,
	    'verify_html' => 1,
	    'preformatted' => NULL,
	    'convert_fonts_to_spans' => 1,
	    'remove_linebreaks' => 1,
	    'apply_source_formatting' => NULL,
	    'paste_auto_cleanup_on_paste' => 1,
	    'block_formats' => 'p,h2,h3,h4,h5,h6',
	    'css_setting' => 'theme',
	    'css_path' => '',
	    'css_classes' => '',
	    'submit' => 'Save',
	    'form_build_id' => 'form-1uajkQLRfJMTCJLWFq0kaPvb68whji-zudwNf9PbPsg',
	    'form_token' => 'gARPriGsPmDdsTlJ8d3Lh_8wO6-8RNOWwJsv2EV_hpM',
	    'form_id' => 'wysiwyg_profile_form',
	    'op' => 'Save',
	  ),
	);

	$arg0 = (object)(array(
	   'format' => 'rich_text',
	   'editor' => 'tinymce',
	   'settings' => 
	  array (
	    'default' => 1,
	    'user_choose' => 0,
	    'show_toggle' => 1,
	    'theme' => 'advanced',
	    'language' => 'en',
	    'buttons' => 
	    array (
	      'default' => 
	      array (
	        'bold' => 1,
	        'italic' => 1,
	        'strikethrough' => 1,
	        'justifyleft' => 1,
	        'justifycenter' => 1,
	        'justifyright' => 1,
	        'justifyfull' => 1,
	        'bullist' => 1,
	        'numlist' => 1,
	        'outdent' => 1,
	        'indent' => 1,
	        'undo' => 1,
	        'redo' => 1,
	        'link' => 1,
	        'unlink' => 1,
	        'anchor' => 1,
	        'image' => 1,
	        'cleanup' => 1,
	        'forecolor' => 1,
	        'backcolor' => 1,
	        'sup' => 1,
	        'hr' => 1,
	        'cut' => 1,
	        'removeformat' => 1,
	        'charmap' => 1,
	      ),
	      'font' => 
	      array (
	        'formatselect' => 1,
	        'styleselect' => 1,
	      ),
	      'paste' => 
	      array (
	        'pasteword' => 1,
	      ),
	      'media' => 
	      array (
	        'media' => 1,
	      ),
	      'xhtmlxtras' => 
	      array (
	        'del' => 1,
	      ),
	      'imce' => 
	      array (
	        'imce' => 1,
	      ),
	      'drupal' => 
	      array (
	        'break' => 1,
	      ),
	    ),
	    'toolbar_loc' => 'top',
	    'toolbar_align' => 'left',
	    'path_loc' => 'bottom',
	    'resizing' => 1,
	    'verify_html' => 1,
	    'preformatted' => 0,
	    'convert_fonts_to_spans' => 1,
	    'remove_linebreaks' => 1,
	    'apply_source_formatting' => 0,
	    'paste_auto_cleanup_on_paste' => 1,
	    'block_formats' => 'p,h2,h3,h4,h5,h6,div',
	    'css_setting' => 'theme',
	    'css_path' => '',
	    'css_classes' => '',
	  ),
	   'rdf_mapping' => 
	  array (
	  ),
	));
	drupal_form_submit ($form_id, $form_state, $arg0);
	
	//3.  configure tinymce for normal
	$form_id = 'wysiwyg_profile_form';
	$form_state = array (
	  'values' => 
	  array (
	    'format' => 'normal',
	    'input_format' => 'normal',
	    'editor' => 'tinymce',
	    'default' => 1,
	    'user_choose' => NULL,
	    'show_toggle' => 1,
	    'theme' => 'advanced',
	    'language' => 'en',
	    'buttons' => 
	    array (
	      'default' => 
	      array (
	        'bold' => 1,
	        'italic' => 1,
	        'underline' => NULL,
	        'strikethrough' => 1,
	        'justifyleft' => 1,
	        'justifycenter' => 1,
	        'justifyright' => 1,
	        'justifyfull' => 1,
	        'bullist' => 1,
	        'numlist' => 1,
	        'outdent' => NULL,
	        'indent' => NULL,
	        'undo' => NULL,
	        'redo' => NULL,
	        'link' => NULL,
	        'unlink' => NULL,
	        'anchor' => NULL,
	        'image' => NULL,
	        'cleanup' => NULL,
	        'forecolor' => NULL,
	        'backcolor' => NULL,
	        'sup' => NULL,
	        'sub' => NULL,
	        'blockquote' => NULL,
	        'code' => NULL,
	        'hr' => NULL,
	        'cut' => NULL,
	        'copy' => NULL,
	        'paste' => NULL,
	        'visualaid' => NULL,
	        'removeformat' => NULL,
	        'charmap' => NULL,
	        'help' => NULL,
	      ),
	      'advhr' => 
	      array (
	        'advhr' => NULL,
	      ),
	      'advimage' => 
	      array (
	        'advimage' => NULL,
	      ),
	      'advlink' => 
	      array (
	        'advlink' => NULL,
	      ),
	      'autosave' => 
	      array (
	        'autosave' => NULL,
	      ),
	      'contextmenu' => 
	      array (
	        'contextmenu' => NULL,
	      ),
	      'directionality' => 
	      array (
	        'ltr' => NULL,
	        'rtl' => NULL,
	      ),
	      'emotions' => 
	      array (
	        'emotions' => NULL,
	      ),
	      'font' => 
	      array (
	        'formatselect' => NULL,
	        'fontselect' => NULL,
	        'fontsizeselect' => NULL,
	        'styleselect' => NULL,
	      ),
	      'fullscreen' => 
	      array (
	        'fullscreen' => NULL,
	      ),
	      'inlinepopups' => 
	      array (
	        'inlinepopups' => NULL,
	      ),
	      'insertdatetime' => 
	      array (
	        'insertdate' => NULL,
	        'inserttime' => NULL,
	      ),
	      'layer' => 
	      array (
	        'insertlayer' => NULL,
	        'moveforward' => NULL,
	        'movebackward' => NULL,
	        'absolute' => NULL,
	      ),
	      'paste' => 
	      array (
	        'pastetext' => NULL,
	        'pasteword' => NULL,
	        'selectall' => NULL,
	      ),
	      'preview' => 
	      array (
	        'preview' => NULL,
	      ),
	      'print' => 
	      array (
	        'print' => NULL,
	      ),
	      'searchreplace' => 
	      array (
	        'search' => NULL,
	        'replace' => NULL,
	      ),
	      'style' => 
	      array (
	        'styleprops' => NULL,
	      ),
	      'table' => 
	      array (
	        'tablecontrols' => NULL,
	      ),
	      'media' => 
	      array (
	        'media' => NULL,
	      ),
	      'xhtmlxtras' => 
	      array (
	        'cite' => NULL,
	        'del' => NULL,
	        'abbr' => NULL,
	        'acronym' => NULL,
	        'ins' => NULL,
	        'attribs' => NULL,
	      ),
	      'bbcode' => 
	      array (
	        'bbcode' => NULL,
	      ),
	      'autoresize' => 
	      array (
	        'autoresize' => NULL,
	      ),
	      'advlist' => 
	      array (
	        'advlist' => NULL,
	      ),
	      'wordcount' => 
	      array (
	        'wordcount' => NULL,
	      ),
	      'imce' => 
	      array (
	        'imce' => NULL,
	      ),
	      'drupal' => 
	      array (
	        'break' => NULL,
	      ),
	    ),
	    'toolbar_loc' => 'top',
	    'toolbar_align' => 'left',
	    'path_loc' => 'bottom',
	    'resizing' => 1,
	    'verify_html' => 1,
	    'preformatted' => NULL,
	    'convert_fonts_to_spans' => 1,
	    'remove_linebreaks' => 1,
	    'apply_source_formatting' => NULL,
	    'paste_auto_cleanup_on_paste' => 1,
	    'block_formats' => 'p,address,pre,h2,h3,h4,h5,h6,div',
	    'css_setting' => 'theme',
	    'css_path' => '',
	    'css_classes' => '',
	    'submit' => 'Save',
	    'form_build_id' => 'form-DW53oofO1u8iV8iPH_L1sENu3HTtvoPvM6PmrD7ZMrY',
	    'form_token' => 'Bn8yUn3EUACvK2Yc5UuzeHWNl0KIiFXhqg4_jdcUg-s',
	    'form_id' => 'wysiwyg_profile_form',
	    'op' => 'Save',
	  ),
	);

	$arg0 = (object)(array(
	   'format' => 'normal',
	   'editor' => 'tinymce',
	   'settings' => false,
	   'rdf_mapping' => 
	  array (
	  ),
	));
	drupal_form_submit ($form_id, $form_state, $arg0);
}