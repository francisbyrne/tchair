<?php
/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can modify or override Drupal's theme
 *   functions, intercept or make additional variables available to your theme,
 *   and create custom PHP logic. For more information, please visit the Theme
 *   Developer's Guide on Drupal.org: http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to tchair_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: tchair_breadcrumb()
 *
 *   where tchair is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override either of the two theme functions used in Zen
 *   core, you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_node    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function */
function tchair_preprocess_html(&$variables, $hook) {
	
	drupal_add_js("http://maps.google.com/maps/api/js?libraries=places&sensor=false&region=AU", "external");
	drupal_add_js(path_to_theme()."/js/tchair.js");

	$inline_script = '
		<script type="text/javascript">var switchTo5x=true;</script>
		<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript">stLight.options({publisher:\'a958c671-f548-435e-93d6-4df300ef6521\'});</script>
	';
	
	$element = array(
      '#type' => 'markup',
      '#markup' => $inline_script,
    );

	drupal_add_html_head($element, 'sharethis');


	if (@$variables['page']['banner']) {
		$variables['classes_array'][] = "banner";
	}
	$query = drupal_get_query_parameters();	
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function */
function tchair_preprocess_page(&$variables, $hook) {
	global $user;
	
	$variables['scripts'] = drupal_get_js();
	
	if($variables['theme_hook_suggestions'][0] == 'page__user'){
		$variables['title'] = 'PROFILE';
	}
	
	if(arg(0) == "user" && !$user->uid && !arg(1)){
		$variables['title'] = 'Please log in';
	}
}
// */

function tchair_preprocess_user_profile(&$variables) {
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function */
function tchair_preprocess_node(&$variables, $hook) {

	$variables['title'] = NULL;


  // Optionally, run node-type-specific preprocess functions, like
  // tchair_preprocess_node_page() or tchair_preprocess_node_story().
  //$function = __FUNCTION__ . '_' . $variables['node']->type;
  //if (function_exists($function)) {
  //  $function($variables, $hook);
  //}
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function tchair_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function tchair_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function 
function tchair_preprocess_block(&$variables, $hook) {

}
// */

function tchair_preprocess_rate_template_emotion(&$variables) {

//dsm($variables);	
  $total_up = (int)$variables['results']['options']['1'];
  $total_down = (int)$variables['results']['options']['-1'];
  $total = ($total_up+$total_down);
  
  $query = drupal_get_query_parameters();
 

  //arg(0) == "node", make sure you are viewing the node
  if(@$query['action'] != 'review' && !$total && arg(0) == "node") {$variables['info']=NULL; $variables['buttons']=NULL; return;}
	
  //add button value and selected classes into the link
  foreach (@$variables[links] as $link) {

	//button value
	$additional_class = str_replace('/', '', check_plain($link['text']));
	
	//check if selected?
	$user_vote = @$variables[results][user_vote];
	if ($user_vote == $link['text']) $additional_class .= " selected";
		
	
    $button = theme('rate_button', array('text' => $link['text'], 'href' => $link['href'], 'class' => 'rate-emotion-btn '.$additional_class));
    $buttons[] = $button;
  }
  $variables['buttons'] = $buttons;

//dsm($total_up) ;
  
  if ($total) $variables['info'] = "<div class='percentage-bar'><div class='good' style='width:".(100*$total_up/$total)."%'></div></div>";
  else $variables['info'] = "<div class='percentage-bar empty'></div>";
  $variables['info'] = "<div class='result'>good (".$total_up.")&nbsp;".$variables['info'] ."&nbsp;bad: (".$total_down.")</div>";	
}