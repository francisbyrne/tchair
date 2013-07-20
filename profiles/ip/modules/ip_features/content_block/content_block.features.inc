<?php
/**
 * @file
 * content_block.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function content_block_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function content_block_node_info() {
  $items = array(
    'content_block' => array(
      'name' => t('Block'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
