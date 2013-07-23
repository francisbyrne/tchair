<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * Ohm theme.
 */

/**
 * Check if a block is a menu block or not.
 *
 * @param $block
 *  A block object.
 * @return bool
 *  Given block is a menu block.
 */
function _ohm_is_menu_block($block) {
  return in_array($block->module, array('menu', 'menu_block')) || ($block->module == 'system' && !in_array($block->delta, array('help', 'powered-by', 'main')));
}


/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function */
function tchair_ohm_preprocess_html(&$variables, $hook) {
  
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


/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function */
function tchair_ohm_preprocess_page(&$variables, $hook) {
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

function tchair_ohm_preprocess_user_profile(&$variables) {
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
function tchair_ohm_preprocess_node(&$variables, $hook) {

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

function tchair_ohm_preprocess_rate_template_emotion(&$variables) {

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