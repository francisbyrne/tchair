a:45:{s:10:"admin_menu";a:2:{i:0;a:7:{s:4:"name";s:19:"hook_admin_menu_map";s:10:"definition";s:30:"function hook_admin_menu_map()";s:11:"description";s:51:"Provide expansion arguments for dynamic menu items.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"admin_menu";s:9:"file_path";s:33:"public://hooks/admin_menu.api.php";s:4:"body";s:633:"
  // Expand content types below Structure > Content types.
  // The key denotes the dynamic path to expand to multiple menu items.
  $map['admin/structure/types/manage/%node_type'] = array(
    // Link generated items directly to the "Content types" item.
    'parent' => 'admin/structure/types',
    // Hide the "List" item, as this expansion will expose all available
    // options.
    'hide' => 'admin/structure/types/list',
    // Create expansion arguments for the '%node_type' placeholder.
    'arguments' => array(
      array(
        '%node_type' => array_keys(node_type_get_types()),
      ),
    ),
  );
  return $map;
";}i:1;a:7:{s:4:"name";s:28:"hook_admin_menu_output_alter";s:10:"definition";s:48:"function hook_admin_menu_output_alter(&$content)";s:11:"description";s:63:"Alter content in Administration menu bar before it is rendered.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"admin_menu";s:9:"file_path";s:33:"public://hooks/admin_menu.api.php";s:4:"body";s:744:"
  // Add new top-level item.
  $content['menu']['myitem'] = array(
    '#title' => t('My item'),
    // #attributes are used for list items (LI).
    '#attributes' => array('class' => array('mymodule-myitem')),
    '#href' => 'mymodule/path',
    // #options are passed to l(). Note that you can apply 'attributes' for
    // links (A) here.
    '#options' => array(
      'query' => drupal_get_destination(),
    ),
    // #weight controls the order of links in the resulting item list.
    '#weight' => 50,
  );
  // Add link to manually run cron.
  $content['menu']['myitem']['cron'] = array(
    '#title' => t('Run cron'),
    '#access' => user_access('administer site configuration'),
    '#href' => 'admin/reports/status/run-cron',
  );
";}}s:10:"aggregator";a:7:{i:0;a:7:{s:4:"name";s:21:"hook_aggregator_fetch";s:10:"definition";s:37:"function hook_aggregator_fetch($feed)";s:11:"description";s:75:"Implement this hook to create an alternative fetcher for aggregator module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"aggregator";s:9:"file_path";s:33:"public://hooks/aggregator.api.php";s:4:"body";s:54:"
  $feed->source_string = mymodule_fetch($feed->url);
";}i:1;a:7:{s:4:"name";s:26:"hook_aggregator_fetch_info";s:10:"definition";s:37:"function hook_aggregator_fetch_info()";s:11:"description";s:71:"Implement this hook to expose the title and a short description of your";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"aggregator";s:9:"file_path";s:33:"public://hooks/aggregator.api.php";s:4:"body";s:134:"
  return array(
    'title' => t('Default fetcher'),
    'description' => t('Default fetcher for resources available by URL.'),
  );
";}i:2;a:7:{s:4:"name";s:21:"hook_aggregator_parse";s:10:"definition";s:37:"function hook_aggregator_parse($feed)";s:11:"description";s:74:"Implement this hook to create an alternative parser for aggregator module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"aggregator";s:9:"file_path";s:33:"public://hooks/aggregator.api.php";s:4:"body";s:120:"
  if ($items = mymodule_parse($feed->source_string)) {
    $feed->items = $items;
    return TRUE;
  }
  return FALSE;
";}i:3;a:7:{s:4:"name";s:26:"hook_aggregator_parse_info";s:10:"definition";s:37:"function hook_aggregator_parse_info()";s:11:"description";s:71:"Implement this hook to expose the title and a short description of your";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"aggregator";s:9:"file_path";s:33:"public://hooks/aggregator.api.php";s:4:"body";s:129:"
  return array(
    'title' => t('Default parser'),
    'description' => t('Default parser for RSS, Atom and RDF feeds.'),
  );
";}i:4;a:7:{s:4:"name";s:23:"hook_aggregator_process";s:10:"definition";s:39:"function hook_aggregator_process($feed)";s:11:"description";s:64:"Implement this hook to create a processor for aggregator module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"aggregator";s:9:"file_path";s:33:"public://hooks/aggregator.api.php";s:4:"body";s:67:"
  foreach ($feed->items as $item) {
    mymodule_save($item);
  }
";}i:5;a:7:{s:4:"name";s:28:"hook_aggregator_process_info";s:10:"definition";s:44:"function hook_aggregator_process_info($feed)";s:11:"description";s:71:"Implement this hook to expose the title and a short description of your";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"aggregator";s:9:"file_path";s:33:"public://hooks/aggregator.api.php";s:4:"body";s:131:"
  return array(
    'title' => t('Default processor'),
    'description' => t('Creates lightweight records of feed items.'),
  );
";}i:6;a:7:{s:4:"name";s:22:"hook_aggregator_remove";s:10:"definition";s:38:"function hook_aggregator_remove($feed)";s:11:"description";s:73:"Implement this hook to remove stored data if a feed is being deleted or a";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"aggregator";s:9:"file_path";s:33:"public://hooks/aggregator.api.php";s:4:"body";s:38:"
  mymodule_remove_items($feed->fid);
";}}s:5:"block";a:8:{i:0;a:7:{s:4:"name";s:15:"hook_block_info";s:10:"definition";s:26:"function hook_block_info()";s:11:"description";s:41:"Define all blocks provided by the module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"block";s:9:"file_path";s:28:"public://hooks/block.api.php";s:4:"body";s:276:"
  // This example comes from node.module.
  $blocks['syndicate'] = array(
    'info' => t('Syndicate'),
    'cache' => DRUPAL_NO_CACHE
  );

  $blocks['recent'] = array(
    'info' => t('Recent content'),
    // DRUPAL_CACHE_PER_ROLE will be assumed.
  );

  return $blocks;
";}i:1;a:7:{s:4:"name";s:21:"hook_block_info_alter";s:10:"definition";s:62:"function hook_block_info_alter(&$blocks, $theme, $code_blocks)";s:11:"description";s:54:"Change block definition before saving to the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"block";s:9:"file_path";s:28:"public://hooks/block.api.php";s:4:"body";s:73:"
  // Disable the login block.
  $blocks['user']['login']['status'] = 0;
";}i:2;a:7:{s:4:"name";s:20:"hook_block_configure";s:10:"definition";s:42:"function hook_block_configure($delta = '')";s:11:"description";s:40:"Define a configuration form for a block.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"block";s:9:"file_path";s:28:"public://hooks/block.api.php";s:4:"body";s:448:"
  // This example comes from node.module.
  $form = array();
  if ($delta == 'recent') {
    $form['node_recent_block_count'] = array(
      '#type' => 'select',
      '#title' => t('Number of recent content items to display'),
      '#default_value' => variable_get('node_recent_block_count', 10),
      '#options' => drupal_map_assoc(array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 25, 30)),
    );
  }
  return $form;
";}i:3;a:7:{s:4:"name";s:15:"hook_block_save";s:10:"definition";s:54:"function hook_block_save($delta = '', $edit = array())";s:11:"description";s:59:"Save the configuration options from hook_block_configure().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"block";s:9:"file_path";s:28:"public://hooks/block.api.php";s:4:"body";s:154:"
  // This example comes from node.module.
  if ($delta == 'recent') {
    variable_set('node_recent_block_count', $edit['node_recent_block_count']);
  }
";}i:4;a:7:{s:4:"name";s:15:"hook_block_view";s:10:"definition";s:37:"function hook_block_view($delta = '')";s:11:"description";s:48:"Return a rendered or renderable view of a block.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"block";s:9:"file_path";s:28:"public://hooks/block.api.php";s:4:"body";s:757:"
  // This example is adapted from node.module.
  $block = array();

  switch ($delta) {
    case 'syndicate':
      $block['subject'] = t('Syndicate');
      $block['content'] = array(
        '#theme' => 'feed_icon',
        '#url' => 'rss.xml',
        '#title' => t('Syndicate'),
      );
      break;

    case 'recent':
      if (user_access('access content')) {
        $block['subject'] = t('Recent content');
        if ($nodes = node_get_recent(variable_get('node_recent_block_count', 10))) {
          $block['content'] = array(
            '#theme' => 'node_recent_block',
            '#nodes' => $nodes,
          );
        } else {
          $block['content'] = t('No content available.');
        }
      }
      break;
  }
  return $block;
";}i:5;a:7:{s:4:"name";s:21:"hook_block_view_alter";s:10:"definition";s:46:"function hook_block_view_alter(&$data, $block)";s:11:"description";s:46:"Perform alterations to the content of a block.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"block";s:9:"file_path";s:28:"public://hooks/block.api.php";s:4:"body";s:469:"
  // Remove the contextual links on all blocks that provide them.
  if (is_array($data['content']) && isset($data['content']['#contextual_links'])) {
    unset($data['content']['#contextual_links']);
  }
  // Add a theme wrapper function defined by the current module to all blocks
  // provided by the "somemodule" module.
  if (is_array($data['content']) && $block->module == 'somemodule') {
    $data['content']['#theme_wrappers'][] = 'mymodule_special_block';
  }
";}i:6;a:7:{s:4:"name";s:34:"hook_block_view_MODULE_DELTA_alter";s:10:"definition";s:59:"function hook_block_view_MODULE_DELTA_alter(&$data, $block)";s:11:"description";s:40:"Perform alterations to a specific block.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"block";s:9:"file_path";s:28:"public://hooks/block.api.php";s:4:"body";s:377:"
  // This code will only run for a specific block. For example, if MODULE_DELTA
  // in the function definition above is set to "mymodule_somedelta", the code
  // will only run on the "somedelta" block provided by the "mymodule" module.

  // Change the title of the "somedelta" block provided by the "mymodule"
  // module.
  $data['subject'] = t('New title of the block');
";}i:7;a:7:{s:4:"name";s:21:"hook_block_list_alter";s:10:"definition";s:40:"function hook_block_list_alter(&$blocks)";s:11:"description";s:33:"Act on blocks prior to rendering.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"block";s:9:"file_path";s:28:"public://hooks/block.api.php";s:4:"body";s:1102:"
  global $language, $theme_key;

  // This example shows how to achieve language specific visibility setting for
  // blocks.

  $result = db_query('SELECT module, delta, language FROM {my_table}');
  $block_languages = array();
  foreach ($result as $record) {
    $block_languages[$record->module][$record->delta][$record->language] = TRUE;
  }

  foreach ($blocks as $key => $block) {
    // Any module using this alter should inspect the data before changing it,
    // to ensure it is what they expect.
    if (!isset($block->theme) || !isset($block->status) || $block->theme != $theme_key || $block->status != 1) {
      // This block was added by a contrib module, leave it in the list.
      continue;
    }

    if (!isset($block_languages[$block->module][$block->delta])) {
      // No language setting for this block, leave it in the list.
      continue;
    }

    if (!isset($block_languages[$block->module][$block->delta][$language->language])) {
      // This block should not be displayed with the active language, remove
      // from the list.
      unset($blocks[$key]);
    }
  }
";}}s:7:"comment";a:9:{i:0;a:7:{s:4:"name";s:20:"hook_comment_presave";s:10:"definition";s:39:"function hook_comment_presave($comment)";s:11:"description";s:55:"The comment passed validation and is about to be saved.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"comment";s:9:"file_path";s:30:"public://hooks/comment.api.php";s:4:"body";s:112:"
  // Remove leading & trailing spaces from the comment subject.
  $comment->subject = trim($comment->subject);
";}i:1;a:7:{s:4:"name";s:19:"hook_comment_insert";s:10:"definition";s:38:"function hook_comment_insert($comment)";s:11:"description";s:30:"The comment is being inserted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"comment";s:9:"file_path";s:30:"public://hooks/comment.api.php";s:4:"body";s:84:"
  // Reindex the node when comments are added.
  search_touch_node($comment->nid);
";}i:2;a:7:{s:4:"name";s:19:"hook_comment_update";s:10:"definition";s:38:"function hook_comment_update($comment)";s:11:"description";s:29:"The comment is being updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"comment";s:9:"file_path";s:30:"public://hooks/comment.api.php";s:4:"body";s:86:"
  // Reindex the node when comments are updated.
  search_touch_node($comment->nid);
";}i:3;a:7:{s:4:"name";s:17:"hook_comment_load";s:10:"definition";s:37:"function hook_comment_load($comments)";s:11:"description";s:44:"Comments are being loaded from the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"comment";s:9:"file_path";s:30:"public://hooks/comment.api.php";s:4:"body";s:205:"
  $result = db_query('SELECT cid, foo FROM {mytable} WHERE cid IN (:cids)', array(':cids' => array_keys($comments)));
  foreach ($result as $record) {
    $comments[$record->cid]->foo = $record->foo;
  }
";}i:4;a:7:{s:4:"name";s:17:"hook_comment_view";s:10:"definition";s:59:"function hook_comment_view($comment, $view_mode, $langcode)";s:11:"description";s:104:"The comment is being viewed. This hook can be used to add additional data to the comment before theming.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"comment";s:9:"file_path";s:30:"public://hooks/comment.api.php";s:4:"body";s:80:"
  // how old is the comment
  $comment->time_ago = time() - $comment->changed;
";}i:5;a:7:{s:4:"name";s:23:"hook_comment_view_alter";s:10:"definition";s:41:"function hook_comment_view_alter(&$build)";s:11:"description";s:68:"The comment was built; the module may modify the structured content.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"comment";s:9:"file_path";s:30:"public://hooks/comment.api.php";s:4:"body";s:368:"
  // Check for the existence of a field added by another module.
  if ($build['#view_mode'] == 'full' && isset($build['an_additional_field'])) {
    // Change its weight.
    $build['an_additional_field']['#weight'] = -10;
  }

  // Add a #post_render callback to act on the rendered HTML of the comment.
  $build['#post_render'][] = 'my_module_comment_post_render';
";}i:6;a:7:{s:4:"name";s:20:"hook_comment_publish";s:10:"definition";s:39:"function hook_comment_publish($comment)";s:11:"description";s:48:"The comment is being published by the moderator.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"comment";s:9:"file_path";s:30:"public://hooks/comment.api.php";s:4:"body";s:106:"
  drupal_set_message(t('Comment: @subject has been published', array('@subject' => $comment->subject)));
";}i:7;a:7:{s:4:"name";s:22:"hook_comment_unpublish";s:10:"definition";s:41:"function hook_comment_unpublish($comment)";s:11:"description";s:50:"The comment is being unpublished by the moderator.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"comment";s:9:"file_path";s:30:"public://hooks/comment.api.php";s:4:"body";s:108:"
  drupal_set_message(t('Comment: @subject has been unpublished', array('@subject' => $comment->subject)));
";}i:8;a:7:{s:4:"name";s:19:"hook_comment_delete";s:10:"definition";s:38:"function hook_comment_delete($comment)";s:11:"description";s:46:"The comment is being deleted by the moderator.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"comment";s:9:"file_path";s:30:"public://hooks/comment.api.php";s:4:"body";s:104:"
  drupal_set_message(t('Comment: @subject has been deleted', array('@subject' => $comment->subject)));
";}}s:3:"cck";a:3:{i:0;a:7:{s:4:"name";s:32:"hook_content_migrate_field_alter";s:10:"definition";s:73:"function hook_content_migrate_field_alter(&$field_value, $instance_value)";s:11:"description";s:74:"Implement this hook to alter the field definition of the migrated content.";s:11:"destination";s:14:"%module.module";s:5:"group";s:3:"cck";s:9:"file_path";s:38:"public://hooks/content_migrate.api.php";s:4:"body";s:206:"
  switch ($instance_value['widget']['module']) {
    case 'filefield':
      // Module names and types changed.
      $field_value['module'] = 'file';
      $field_value['type'] = 'file';
      break;
  }
";}i:1;a:7:{s:4:"name";s:35:"hook_content_migrate_instance_alter";s:10:"definition";s:76:"function hook_content_migrate_instance_alter(&$instance_value, $field_value)";s:11:"description";s:78:"Implements this hook to alter the instance definition of the migrated content.";s:11:"destination";s:14:"%module.module";s:5:"group";s:3:"cck";s:9:"file_path";s:38:"public://hooks/content_migrate.api.php";s:4:"body";s:314:"
  switch ($instance_value['widget']['module']) {
    case 'text':
      // The formatter names changed, all are prefixed with 'text_'.
      foreach ($instance_value['display'] as $context => $settings) {
        $instance_value['display'][$context]['type'] = 'text_'. $settings['type'];
      }
      break;
  }
";}i:2;a:7:{s:4:"name";s:38:"hook_content_migrate_data_record_alter";s:10:"definition";s:76:"function hook_content_migrate_data_record_alter(&$record, $field, $instance)";s:11:"description";s:74:"Implement this hook to alter individual data records as they are migrated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:3:"cck";s:9:"file_path";s:38:"public://hooks/content_migrate.api.php";s:4:"body";s:592:"
  switch($field['type']) {
    case 'file':
      // Map D6 filefield field columns to D7 file field columns. Note the data
      // which was previously in the 'data' column is read into the
      // 'description' column since the data column no longer exists.
      if (!empty($record[$field['field_name'] . '_description']) && ($data = unserialize($record[$field['field_name'] . '_description']))) {
        $record[$field['field_name'] . '_description'] = $data['description'];
      }
      else {
        unset($record[$field['field_name'] . '_description']);
      }
      break;
  }
";}}s:7:"context";a:7:{i:0;a:7:{s:4:"name";s:20:"hook_context_plugins";s:10:"definition";s:31:"function hook_context_plugins()";s:11:"description";s:63:"CTools plugin API hook for Context. Note that a proper entry in";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"context";s:9:"file_path";s:30:"public://hooks/context.api.php";s:4:"body";s:600:"
  $plugins = array();
  $plugins['foo_context_condition_bar'] = array(
    'handler' => array(
      'path' => drupal_get_path('module', 'foo') .'/plugins',
      'file' => 'foo_context_condition_bar.inc',
      'class' => 'foo_context_condition_bar',
      'parent' => 'context_condition',
    ),
  );
  $plugins['foo_context_reaction_baz'] = array(
    'handler' => array(
      'path' => drupal_get_path('module', 'foo') .'/plugins',
      'file' => 'foo_context_reaction_baz.inc',
      'class' => 'foo_context_reaction_baz',
      'parent' => 'context_reaction',
    ),
  );
  return $plugins;
";}i:1;a:7:{s:4:"name";s:21:"hook_context_registry";s:10:"definition";s:32:"function hook_context_registry()";s:11:"description";s:41:"Registry hook for conditions & reactions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"context";s:9:"file_path";s:30:"public://hooks/context.api.php";s:4:"body";s:345:"
  return array(
    'conditions' => array(
      'bar' => array(
        'title' => t('Name of condition "bar"'),
        'plugin' => 'foo_context_condition_bar',
      ),
    ),
    'reactions' => array(
      'baz' => array(
        'title' => t('Name of reaction "baz"'),
        'plugin' => 'foo_context_reaction_baz',
      ),
    ),
  );
";}i:2;a:7:{s:4:"name";s:27:"hook_context_page_condition";s:10:"definition";s:38:"function hook_context_page_condition()";s:11:"description";s:31:"Execute Context page conditions";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"context";s:9:"file_path";s:30:"public://hooks/context.api.php";s:4:"body";s:87:"
  if ($plugin = context_get_plugin('condition', 'bar')) {
    $plugin->execute();
  }
";}i:3;a:7:{s:4:"name";s:26:"hook_context_page_reaction";s:10:"definition";s:37:"function hook_context_page_reaction()";s:11:"description";s:30:"Execute Context page reactions";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"context";s:9:"file_path";s:30:"public://hooks/context.api.php";s:4:"body";s:86:"
  if ($plugin = context_get_plugin('reaction', 'baz')) {
    $plugin->execute();
  }
";}i:4;a:7:{s:4:"name";s:27:"hook_context_registry_alter";s:10:"definition";s:48:"function hook_context_registry_alter(&$registry)";s:11:"description";s:19:"Alter the registry.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"context";s:9:"file_path";s:30:"public://hooks/context.api.php";s:4:"body";s:128:"
  if (isset($registry['reactions']['baz'])) {
    $registry['reactions']['baz']['plugin'] = 'custom_context_reaction_baz';
  }
";}i:5;a:7:{s:4:"name";s:33:"hook_context_node_condition_alter";s:10:"definition";s:55:"function hook_context_node_condition_alter(&$node, $op)";s:11:"description";s:46:"Alter/add a condition to a node-related event.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"context";s:9:"file_path";s:30:"public://hooks/context.api.php";s:4:"body";s:97:"
  if ($plugin = context_get_plugin('condition', 'bar')) {
    $plugin->execute($node, $op);
  }
";}i:6;a:7:{s:4:"name";s:23:"hook_context_load_alter";s:10:"definition";s:43:"function hook_context_load_alter(&$context)";s:11:"description";s:74:"Alter a context directly after it has been loaded. Allows modules to alter";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"context";s:9:"file_path";s:30:"public://hooks/context.api.php";s:4:"body";s:250:"
  if ($context->name === 'foo' && isset($context->reactions['block'])) {
    $context->reactions['block']['blocks']['locale-0'] = array(
      'module' => 'locale',
      'delta' => '0',
      'region' => 'header',
      'weight' => '2',
    );
  }
";}}s:10:"contextual";a:1:{i:0;a:7:{s:4:"name";s:32:"hook_contextual_links_view_alter";s:10:"definition";s:60:"function hook_contextual_links_view_alter(&$element, $items)";s:11:"description";s:55:"Alter a contextual links element before it is rendered.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"contextual";s:9:"file_path";s:33:"public://hooks/contextual.api.php";s:4:"body";s:143:"
  // Add another class to all contextual link lists to facilitate custom
  // styling.
  $element['#attributes']['class'][] = 'custom-class';
";}}s:6:"ctools";a:4:{i:0;a:7:{s:4:"name";s:28:"hook_ctools_plugin_directory";s:10:"definition";s:59:"function hook_ctools_plugin_directory($owner, $plugin_type)";s:11:"description";s:76:"This hook is used to inform the CTools plugin system about the location of a";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"ctools";s:9:"file_path";s:29:"public://hooks/ctools.api.php";s:4:"body";s:1256:"
  // Form 1 - for a module implementing only the 'content_types' plugin owned
  // by CTools, this would cause the plugin system to search the
  // <moduleroot>/plugins/content_types directory for .inc plugin files.
  if ($owner == 'ctools' && $plugin_type == 'content_types') {
    return 'plugins/content_types';
  }

  // Form 2 - if your module implements only Panels plugins, and has 'layouts'
  // and 'styles' plugins but no 'cache' or 'display_renderers', it is OK to be
  // lazy and return a directory for a plugin you don't actually implement (so
  // long as that directory doesn't exist). This lets you avoid ugly in_array()
  // logic in your conditional, and also makes it easy to add plugins of those
  // types later without having to change this hook implementation.
  if ($owner == 'panels') {
    return "plugins/$plugin_type";
  }

  // Form 3 - CTools makes no assumptions about where your plugins are located,
  // so you still have to implement this hook even for plugins created by your
  // own module.
  if ($owner == 'mymodule') {
    // Yes, this is exactly like Form 2 - just a different reasoning for it.
    return "plugins/$plugin_type";
  }
  // Finally, if nothing matches, it's safe to return nothing at all (or NULL).
";}i:1;a:7:{s:4:"name";s:28:"hook_ctools_plugin_pre_alter";s:10:"definition";s:55:"function hook_ctools_plugin_pre_alter(&$plugin, &$info)";s:11:"description";s:44:"Alter a plugin before it has been processed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"ctools";s:9:"file_path";s:29:"public://hooks/ctools.api.php";s:4:"body";s:127:"
  // Override a function defined by the plugin.
  if ($info['type'] == 'my_type') {
    $plugin['my_flag'] = 'new_value';
  }
";}i:2;a:7:{s:4:"name";s:29:"hook_ctools_plugin_post_alter";s:10:"definition";s:56:"function hook_ctools_plugin_post_alter(&$plugin, &$info)";s:11:"description";s:43:"Alter a plugin after it has been processed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"ctools";s:9:"file_path";s:29:"public://hooks/ctools.api.php";s:4:"body";s:134:"
  // Override a function defined by the plugin.
  if ($info['type'] == 'my_type') {
    $plugin['my_function'] = 'new_function';
  }
";}i:3;a:7:{s:4:"name";s:43:"hook_ctools_math_expression_functions_alter";s:10:"definition";s:65:"function hook_ctools_math_expression_functions_alter(&$functions)";s:11:"description";s:71:"Alter the available functions to be used in ctools math expression api.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"ctools";s:9:"file_path";s:29:"public://hooks/ctools.api.php";s:4:"body";s:76:"
  // Allow to convert from degrees to radiant.
  $functions[] = 'deg2rad';
";}}s:8:"_patches";a:2:{i:0;a:7:{s:4:"name";s:34:"hook_custom_formatters_engine_info";s:10:"definition";s:45:"function hook_custom_formatters_engine_info()";s:11:"description";s:43:"Implements hook_custom_formatters_engine().";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"_patches";s:9:"file_path";s:40:"public://hooks/custom_formatters.api.php";s:4:"body";s:327:"
  $engines = array();

  $engines['MY_MODULE'] = array(
    'label' => t('MY_MODULE'),
    'callbacks' => array(
      'settings form' => 'MYMODULE_engine_settings_form',
      'render' => 'MYMODULE_engine_render',
    ),
    'file' => drupal_get_path('module', 'MYMODULE') . '/engines/MYMODULE.inc',
  );

  return $engines;
";}i:1;a:7:{s:4:"name";s:31:"hook_custom_formatters_defaults";s:10:"definition";s:42:"function hook_custom_formatters_defaults()";s:11:"description";s:45:"Implements hook_custom_formatters_defaults().";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"_patches";s:9:"file_path";s:40:"public://hooks/custom_formatters.api.php";s:4:"body";s:793:"
  $formatters = array();

  $formatter = new stdClass;
  $formatter->disabled = FALSE; /* Edit this to true to make a default formatter disabled initially */
  $formatter->api_version = 2;
  $formatter->name = 'MYMODULE';
  $formatter->label = 'MYMODULE';
  $formatter->description = 'A PHP example formatter; Display a Thumbnail image linked to a Large image.';
  $formatter->mode = 'php';
  $formatter->field_types = 'image';
  $formatter->code = 'foreach (element_children($variables[\'#items\']) as $delta) {
  $item = $variables[\'#items\'][$delta];
  $thumbnail = theme(\'image_style\', array(\'style_name\' => \'thumbnail\', \'path\' => $item[\'uri\']));
  $large = image_style_path(\'large\', $item[\'uri\']);

  print l($thumbnail, file_create_url($large), array(\'html\' => TRUE));
";}}s:9:"dashboard";a:2:{i:0;a:7:{s:4:"name";s:22:"hook_dashboard_regions";s:10:"definition";s:33:"function hook_dashboard_regions()";s:11:"description";s:30:"Adds regions to the dashboard.";s:11:"destination";s:14:"%module.module";s:5:"group";s:9:"dashboard";s:9:"file_path";s:32:"public://hooks/dashboard.api.php";s:4:"body";s:257:"
  // Define a new dashboard region. Your module can also then define
  // theme_mymodule_dashboard_region() as a theme wrapper function to control
  // the region's appearance.
  return array('mymodule_dashboard_region' => "My module's dashboard region");
";}i:1;a:7:{s:4:"name";s:28:"hook_dashboard_regions_alter";s:10:"definition";s:47:"function hook_dashboard_regions_alter($regions)";s:11:"description";s:44:"Alter dashboard regions provided by modules.";s:11:"destination";s:14:"%module.module";s:5:"group";s:9:"dashboard";s:9:"file_path";s:32:"public://hooks/dashboard.api.php";s:4:"body";s:110:"
  // Remove the sidebar region defined by the core dashboard module.
  unset($regions['dashboard_sidebar']);
";}}s:5:"devel";a:2:{i:0;a:7:{s:4:"name";s:24:"hook_node_access_explain";s:10:"definition";s:39:"function hook_node_access_explain($row)";s:11:"description";s:48:"Explain your records in the {node_access} table.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"devel";s:9:"file_path";s:40:"public://hooks/devel_node_access.api.php";s:4:"body";s:248:"
  if ($row->realm == 'mymodule_myrealm') {
    if ($row->grant_view) {
      $role = user_role_load($row->gid);
      return 'Role ' . drupal_placeholder($role->name) . ' may view this node.';
    }
    else {
      return 'No access.';
    }
  }
";}i:1;a:7:{s:4:"name";s:28:"hook_node_access_acknowledge";s:10:"definition";s:45:"function hook_node_access_acknowledge($grant)";s:11:"description";s:47:"Acknowledge ownership of 'alien' grant records.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"devel";s:9:"file_path";s:40:"public://hooks/devel_node_access.api.php";s:4:"body";s:87:"
  if ($grant['realm'] == 'mymodule_all' && $grant['nid'] == 0) {
    return TRUE;
  }
";}}s:2:"ds";a:19:{i:0;a:7:{s:4:"name";s:27:"hook_test_ctools_plugin_api";s:10:"definition";s:51:"function hook_test_ctools_plugin_api($module, $api)";s:11:"description";s:36:"Implements hook_ctools_plugin_api().";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:133:"
  if (($module == 'ds' && $api == 'ds') || ($module == 'ds_extras' && $api == 'ds_extras')) {
    return array('version' => 1);
  }
";}i:1;a:7:{s:4:"name";s:27:"hook_ds_field_settings_info";s:10:"definition";s:38:"function hook_ds_field_settings_info()";s:11:"description";s:36:"Expose Display suite field settings.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:858:"
  $ds_fieldsettings = array();

  $ds_fieldsetting = new stdClass;
  $dsfieldsetting->disabled = FALSE; /* Edit this to true to make a default dsfieldsetting disabled initially */
  $dsfieldsetting->api_version = 1;
  $dsfieldsetting->id = 'node|article|default';
  $dsfieldsetting->entity_type = 'node';
  $dsfieldsetting->bundle = 'article';
  $dsfieldsetting->view_mode = 'default';
  $dsfieldsetting->settings = array(
    'title' => array(
      'weight' => '0',
      'label' => 'hidden',
      'format' => 'default',
      'formatter_settings' => array(
        'link' => '1',
        'wrapper' => 'h3',
        'class' => '',
      ),
    ),
    'node_link' => array(
      'weight' => '1',
      'label' => 'hidden',
      'format' => 'default',
    ),
  );
  $dsfieldsettings['node|article|default'] = $dsfieldsetting;

  return $dsfieldsettings;
";}i:2;a:7:{s:4:"name";s:28:"hook_ds_layout_settings_info";s:10:"definition";s:39:"function hook_ds_layout_settings_info()";s:11:"description";s:36:"Expose default layout settings info.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:803:"
  $dslayouts = array();

  $dslayout = new stdClass;
  $dslayout->disabled = FALSE; /* Edit this to true to make a default dslayout disabled initially */
  $dslayout->api_version = 1;
  $dslayout->id = 'node|article|default';
  $dslayout->entity_type = 'node';
  $dslayout->bundle = 'article';
  $dslayout->view_mode = 'default';
  $dslayout->layout = 'ds_2col';
  $dslayout->settings = array(
    'hide_empty_regions' => 0,
    'regions' => array(
      'left' => array(
        0 => 'title',
        1 => 'node_link',
      ),
      'right' => array(
        0 => 'body',
      ),
    ),
    'fields' => array(
      'title' => 'left',
      'node_link' => 'left',
      'body' => 'right',
    ),
    'classes' => array(),
  );
  $dslayouts['node|article|default'] = $dslayout;

  return $dslayouts;
";}i:3;a:7:{s:4:"name";s:23:"hook_ds_view_modes_info";s:10:"definition";s:34:"function hook_ds_view_modes_info()";s:11:"description";s:26:"Expose default view modes.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:441:"
  $ds_view_modes = array();

  $ds_view_mode = new stdClass;
  $ds_view_mode->disabled = FALSE; /* Edit this to true to make a default ds_view_mode disabled initially */
  $ds_view_mode->api_version = 1;
  $ds_view_mode->view_mode = 'test_exportables';
  $ds_view_mode->label = 'Test exportables';
  $ds_view_mode->entities = array(
    'node' => 'node',
  );
  $ds_view_modes['test_exportables'] = $ds_view_mode;

  return $ds_view_modes;
";}i:4;a:7:{s:4:"name";s:19:"hook_ds_fields_info";s:10:"definition";s:42:"function hook_ds_fields_info($entity_type)";s:11:"description";s:70:"Define fields. These fields are not overridable through the interface.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:2876:"
  $fields = array();

  $fields['title'] = array(

    // title: title of the field
    'title' => t('Title'),

    // type: type of field
    // - DS_FIELD_TYPE_THEME      : calls a theming function.
    // - DS_FIELD_TYPE_FUNCTION   : calls a custom function.
    // - DS_FIELD_TYPE_CODE       : calls ds_render_code_field().
    // - DS_FIELD_TYPE_BLOCK      : calls ds_render_block_field().
    // - DS_FIELD_TYPE_PREPROCESS : calls nothing, just takes a key from the
    //                              variable field that is passed on.
    // - DS_FIELD_TYPE_IGNORE     : calls nothing, use this if you simple want
    //                              to drag and drop. The field itself will have
    //                              a theme function.
    'field_type' => DS_FIELD_TYPE_FUNCTION,

    // ui_limit : only used for the manage display screen so
    // you can limit fields to show based on bundles or view modes
    // the values are always in the form of $bundle|$view_mode
    // You may use * to select all.
    // Make sure you use the machine name.
    'ui_limit' => array('article|full', '*|search_index'),

    // file: an optional file in which the function resides.
    // Only for DS_FIELD_TYPE_FUNCTION.
    'file' => 'optional_filename',

    // function: only for DS_FIELD_TYPE_FUNCTION.
    'function' => 'theme_ds_title_field',

    // properties: can have different keys.
    'properties' => array(

      // formatters: optional if a function is used.
      // In case the field_type is DS_FIELD_TYPE_THEME, you also
      // need to register these formatters as a theming function
      // since the key will be called with theme('function').
      // The value is the caption used in the selection config on Field UI.
      'formatters' => array(
        'node_title_nolink_h1' => t('H1 title'),
        'node_title_link_h1' => t('H1 title, linked to node'),
      ),

      // settings & default: optional if you have a settings form for your field.
      'settings' => array(
        'wrapper' => array('type' => 'textfield', 'description' => t('Eg: h1, h2, p')),
        'link' => array('type' => 'select', 'options' => array('yes', 'no')),
      ),
      'default' => array('wrapper' => 'h2', 'link' => 0),

      // code: optional, only for code field.
      'code' => 'my code here',

      // use_token: optional, only for code field.
      'use_token' => TRUE, // or FALSE,

      // block: the module and delta of the block, only for block fields.
      'block' => 'user-menu',

      // block_render: block render type, only for block fields.
      // - DS_BLOCK_CONTENT       : render through block template file.
      // - DS_BLOCK_TITLE_CONTENT : render only title and content.
      // - DS_BLOCK_CONTENT       : render only content.
      'block_render' => DS_BLOCK_CONTENT,
    )
  );

  return array('node' => $fields);

";}i:5;a:7:{s:4:"name";s:26:"hook_ds_custom_fields_info";s:10:"definition";s:37:"function hook_ds_custom_fields_info()";s:11:"description";s:69:"Define custom fields which can be overridden through the UI and which";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:647:"
  $ds_fields = array();

  $ds_field = new stdClass;
  $ds_field->api_version = 1;
  $ds_field->field = 'custom_field';
  $ds_field->label = 'Custom field';

  // Field type: either block or code
  // DS_FIELD_TYPE_CODE: 5
  // DS_FIELD_TYPE_BLOCK: 6
  $ds_field->field_type = 5;

  // Collection of entities on which this custom field can work on.
  $ds_field->entities = array(
    'node' => 'node',
  );
  $ds_field->properties = array(
    'code' => array(
      'value' => '<? print "this is a custom field"; ?>',
      'format' => 'ds_code',
    ),
    'use_token' => 0,
  );
  $ds_fields['custom_field'] = $ds_field;

  return $ds_fields;
";}i:6;a:7:{s:4:"name";s:15:"hook_ds_vd_info";s:10:"definition";s:26:"function hook_ds_vd_info()";s:11:"description";s:33:"Expose Views layouts definitions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:212:"
  $ds_vds = array();

  $ds_vd = new stdClass;
  $ds_vd->api_version = 1;
  $ds_vd->vd = 'frontpage-page';
  $ds_vd->label = 'Frontpage: Views displays';
  $ds_vds['frontpage-page'] = $ds_vd;

  return $ds_vds;
";}i:7;a:7:{s:4:"name";s:25:"hook_ds_fields_info_alter";s:10:"definition";s:58:"function hook_ds_fields_info_alter(&$fields, $entity_type)";s:11:"description";s:37:"Alter fields defined by Display Suite";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:85:"
  if (isset($fields['title'])) {
    $fields['title']['title'] = t('My title');
  }
";}i:8;a:7:{s:4:"name";s:23:"hook_ds_fields_ui_alter";s:10:"definition";s:52:"function hook_ds_fields_ui_alter(&$fields, $context)";s:11:"description";s:58:"Alter fields defined by Display Suite just before they get";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:40:"
  $fields['title'] = t('Extra title');
";}i:9;a:7:{s:4:"name";s:34:"hook_ds_field_theme_functions_info";s:10:"definition";s:45:"function hook_ds_field_theme_functions_info()";s:11:"description";s:34:"Define theme functions for fields.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:60:"
  return array('theme_ds_field_mine' => t('Theme field'));
";}i:10;a:7:{s:4:"name";s:28:"hook_ds_field_format_summary";s:10:"definition";s:45:"function hook_ds_field_format_summary($field)";s:11:"description";s:50:"Return configuration summary for the field format.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:27:"
  return 'Field summary';
";}i:11;a:7:{s:4:"name";s:27:"hook_ds_field_settings_form";s:10:"definition";s:44:"function hook_ds_field_settings_form($field)";s:11:"description";s:49:"Return a settings form for a Display Suite field.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:317:"

  // Saved formatter settings are on $field['formatter_settings'];
  $settings = isset($field['formatter_settings']) ? $field['formatter_settings'] : $field['properties']['default'];

  $form['label'] = array(
    '#type' => 'textfield',
    '#title' => t('Label'),
    '#default_value' => $settings['label'],
  );
";}i:12;a:7:{s:4:"name";s:29:"hook_ds_layout_settings_alter";s:10:"definition";s:60:"function hook_ds_layout_settings_alter($record, $form_state)";s:11:"description";s:54:"Modify the layout settings just before they get saved.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:48:"
  $record->settings['hide_page_title'] = TRUE;
";}i:13;a:7:{s:4:"name";s:28:"hook_ds_field_settings_alter";s:10:"definition";s:75:"function hook_ds_field_settings_alter(&$field_settings, $form, $form_state)";s:11:"description";s:48:"Modify the field settings before they get saved.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:48:"
  $field_settings['title']['region'] = 'left';
";}i:14;a:7:{s:4:"name";s:19:"hook_ds_layout_info";s:10:"definition";s:30:"function hook_ds_layout_info()";s:11:"description";s:25:"Define layouts from code.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:388:"
  $path = drupal_get_path('module', 'foo');

  $layouts = array(
    'foo_1col' => array(
      'label' => t('Foo one column'),
      'path' => $path . '/layouts/foo_1col',
      'regions' => array(
        'foo_content' => t('Content'),
      ),
      'css' => TRUE,
      // optional, form only applies to node form at this point.
      'form' => TRUE,
    ),
  );

  return $layouts;
";}i:15;a:7:{s:4:"name";s:25:"hook_ds_layout_info_alter";s:10:"definition";s:45:"function hook_ds_layout_info_alter(&$layouts)";s:11:"description";s:37:"Alter layouts found by Display Suite.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:31:"
  unset($layouts['ds_2col']);
";}i:16;a:7:{s:4:"name";s:27:"hook_ds_layout_region_alter";s:10:"definition";s:61:"function hook_ds_layout_region_alter($context, &$region_info)";s:11:"description";s:48:"Alter the region options in the field UI screen.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:230:"
  $region_info['region_options'][$block_key] = $block['title'];
  $region_info['table_regions'][$block_key] = array(
    'title' => check_plain($block['title']),
    'message' => t('No fields are displayed in this region'),
  );
";}i:17;a:7:{s:4:"name";s:27:"hook_ds_label_options_alter";s:10:"definition";s:59:"function hook_ds_label_options_alter(&$field_label_options)";s:11:"description";s:56:"Alter the field label options. Note that you will either";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:65:"
  $field_label_options['label_after'] = t('Label after field');
";}i:18;a:7:{s:4:"name";s:29:"hook_ds_panels_default_fields";s:10:"definition";s:73:"function hook_ds_panels_default_fields($entity_type, $bundle, $view_mode)";s:11:"description";s:77:"Return fields to be added when creating a new display with the panels editor.";s:11:"destination";s:14:"%module.module";s:5:"group";s:2:"ds";s:9:"file_path";s:25:"public://hooks/ds.api.php";s:4:"body";s:112:"
  // Get the fields from Field API.
  $fields = field_info_instances($entity_type, $bundle);
  return $fields;
";}}s:6:"entity";a:3:{i:0;a:7:{s:4:"name";s:25:"hook_entity_property_info";s:10:"definition";s:36:"function hook_entity_property_info()";s:11:"description";s:57:"Allow modules to define metadata about entity properties.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"entity";s:9:"file_path";s:29:"public://hooks/entity.api.php";s:4:"body";s:225:"
  $info = array();
  $properties = &$info['node']['properties'];

  $properties['nid'] = array(
    'label' => t("Content ID"),
    'type' => 'integer',
    'description' => t("The unique content ID."),
  );
  return $info;
";}i:1;a:7:{s:4:"name";s:31:"hook_entity_property_info_alter";s:10:"definition";s:48:"function hook_entity_property_info_alter(&$info)";s:11:"description";s:56:"Allow modules to alter metadata about entity properties.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"entity";s:9:"file_path";s:29:"public://hooks/entity.api.php";s:4:"body";s:318:"
  $properties = &$info['node']['bundles']['poll']['properties'];

  $properties['poll-votes'] = array(
    'label' => t("Poll votes"),
    'description' => t("The number of votes that have been cast on a poll node."),
    'type' => 'integer',
    'getter callback' => 'entity_property_poll_node_get_properties',
  );
";}i:2;a:7:{s:4:"name";s:38:"hook_entity_views_field_handlers_alter";s:10:"definition";s:71:"function hook_entity_views_field_handlers_alter(array &$field_handlers)";s:11:"description";s:77:"Alter the handlers used by the data selection tables provided by this module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"entity";s:9:"file_path";s:29:"public://hooks/entity.api.php";s:4:"body";s:113:"
  $field_handlers['duration'] = 'example_duration_handler';
  $field_handlers['node'] = 'example_node_handler';
";}}s:5:"field";a:81:{i:0;a:7:{s:4:"name";s:23:"hook_field_extra_fields";s:10:"definition";s:34:"function hook_field_extra_fields()";s:11:"description";s:56:"Exposes "pseudo-field" components on fieldable entities.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:708:"
  $extra['node']['poll'] = array(
    'form' => array(
      'choice_wrapper' => array(
        'label' => t('Poll choices'),
        'description' => t('Poll choices'),
        'weight' => -4,
      ),
      'settings' => array(
        'label' => t('Poll settings'),
        'description' => t('Poll module settings'),
        'weight' => -3,
      ),
    ),
    'display' => array(
      'poll_view_voting' => array(
        'label' => t('Poll vote'),
        'description' => t('Poll vote'),
        'weight' => 0,
      ),
      'poll_view_results' => array(
        'label' => t('Poll results'),
        'description' => t('Poll results'),
        'weight' => 0,
      ),
    )
  );

  return $extra;
";}i:1;a:7:{s:4:"name";s:29:"hook_field_extra_fields_alter";s:10:"definition";s:46:"function hook_field_extra_fields_alter(&$info)";s:11:"description";s:54:"Alter "pseudo-field" components on fieldable entities.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:245:"
  // Force node title to always be at the top of the list by default.
  foreach (node_type_get_types() as $bundle) {
    if (isset($info['node'][$bundle->type]['title'])) {
      $info['node'][$bundle->type]['title']['weight'] = -20;
    }
  }
";}i:2;a:7:{s:4:"name";s:15:"hook_field_info";s:10:"definition";s:26:"function hook_field_info()";s:11:"description";s:29:"Define Field API field types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:1123:"
  return array(
    'text' => array(
      'label' => t('Text'),
      'description' => t('This field stores varchar text in the database.'),
      'settings' => array('max_length' => 255),
      'instance_settings' => array('text_processing' => 0),
      'default_widget' => 'text_textfield',
      'default_formatter' => 'text_default',
    ),
    'text_long' => array(
      'label' => t('Long text'),
      'description' => t('This field stores long text in the database.'),
      'settings' => array('max_length' => ''),
      'instance_settings' => array('text_processing' => 0),
      'default_widget' => 'text_textarea',
      'default_formatter' => 'text_default',
    ),
    'text_with_summary' => array(
      'label' => t('Long text and summary'),
      'description' => t('This field stores long text in the database along with optional summary text.'),
      'settings' => array('max_length' => ''),
      'instance_settings' => array('text_processing' => 1, 'display_summary' => 0),
      'default_widget' => 'text_textarea_with_summary',
      'default_formatter' => 'text_summary_or_trimmed',
    ),
  );
";}i:3;a:7:{s:4:"name";s:21:"hook_field_info_alter";s:10:"definition";s:38:"function hook_field_info_alter(&$info)";s:11:"description";s:45:"Perform alterations on Field API field types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:354:"
  // Add a setting to all field types.
  foreach ($info as $field_type => $field_type_info) {
    $info[$field_type]['settings'] += array(
      'mymodule_additional_setting' => 'default value',
    );
  }

  // Change the default widget for fields of type 'foo'.
  if (isset($info['foo'])) {
    $info['foo']['default widget'] = 'mymodule_widget';
  }
";}i:4;a:7:{s:4:"name";s:17:"hook_field_schema";s:10:"definition";s:34:"function hook_field_schema($field)";s:11:"description";s:50:"Define the Field API schema for a field structure.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:776:"
  if ($field['type'] == 'text_long') {
    $columns = array(
      'value' => array(
        'type' => 'text',
        'size' => 'big',
        'not null' => FALSE,
      ),
    );
  }
  else {
    $columns = array(
      'value' => array(
        'type' => 'varchar',
        'length' => $field['settings']['max_length'],
        'not null' => FALSE,
      ),
    );
  }
  $columns += array(
    'format' => array(
      'type' => 'varchar',
      'length' => 255,
      'not null' => FALSE,
    ),
  );
  return array(
    'columns' => $columns,
    'indexes' => array(
      'format' => array('format'),
    ),
    'foreign keys' => array(
      'format' => array(
        'table' => 'filter_format',
        'columns' => array('format' => 'format'),
      ),
    ),
  );
";}i:5;a:7:{s:4:"name";s:15:"hook_field_load";s:10:"definition";s:95:"function hook_field_load($entity_type, $entities, $field, $instances, $langcode, &$items, $age)";s:11:"description";s:58:"Define custom load behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:777:"
  // Sample code from text.module: precompute sanitized strings so they are
  // stored in the field cache.
  foreach ($entities as $id => $entity) {
    foreach ($items[$id] as $delta => $item) {
      // Only process items with a cacheable format, the rest will be handled
      // by formatters if needed.
      if (empty($instances[$id]['settings']['text_processing']) || filter_format_allowcache($item['format'])) {
        $items[$id][$delta]['safe_value'] = isset($item['value']) ? _text_sanitize($instances[$id], $langcode, $item, 'value') : '';
        if ($field['type'] == 'text_with_summary') {
          $items[$id][$delta]['safe_summary'] = isset($item['summary']) ? _text_sanitize($instances[$id], $langcode, $item, 'summary') : '';
        }
      }
    }
  }
";}i:6;a:7:{s:4:"name";s:23:"hook_field_prepare_view";s:10:"definition";s:97:"function hook_field_prepare_view($entity_type, $entities, $field, $instances, $langcode, &$items)";s:11:"description";s:38:"Prepare field values prior to display.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:442:"
  // Sample code from image.module: if there are no images specified at all,
  // use the default image.
  foreach ($entities as $id => $entity) {
    if (empty($items[$id]) && $field['settings']['default_image']) {
      if ($file = file_load($field['settings']['default_image'])) {
        $items[$id][0] = (array) $file + array(
          'is_default' => TRUE,
          'alt' => '',
          'title' => '',
        );
      }
    }
  }
";}i:7;a:7:{s:4:"name";s:19:"hook_field_validate";s:10:"definition";s:99:"function hook_field_validate($entity_type, $entity, $field, $instance, $langcode, $items, &$errors)";s:11:"description";s:34:"Validate this module's field data.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:502:"
  foreach ($items as $delta => $item) {
    if (!empty($item['value'])) {
      if (!empty($field['settings']['max_length']) && drupal_strlen($item['value']) > $field['settings']['max_length']) {
        $errors[$field['field_name']][$langcode][$delta][] = array(
          'error' => 'text_max_length',
          'message' => t('%name: the value may not be longer than %max characters.', array('%name' => $instance['label'], '%max' => $field['settings']['max_length'])),
        );
      }
    }
  }
";}i:8;a:7:{s:4:"name";s:18:"hook_field_presave";s:10:"definition";s:89:"function hook_field_presave($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:61:"Define custom presave behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:319:"
  if ($field['type'] == 'number_decimal') {
    // Let PHP round the value to ensure consistent behavior across storage
    // backends.
    foreach ($items as $delta => $item) {
      if (isset($item['value'])) {
        $items[$delta]['value'] = round($item['value'], $field['settings']['scale']);
      }
    }
  }
";}i:9;a:7:{s:4:"name";s:17:"hook_field_insert";s:10:"definition";s:88:"function hook_field_insert($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:60:"Define custom insert behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:494:"
  if (variable_get('taxonomy_maintain_index_table', TRUE) && $field['storage']['type'] == 'field_sql_storage' && $entity_type == 'node' && $entity->status) {
    $query = db_insert('taxonomy_index')->fields(array('nid', 'tid', 'sticky', 'created', ));
    foreach ($items as $item) {
      $query->values(array(
        'nid' => $entity->nid,
        'tid' => $item['tid'],
        'sticky' => $entity->sticky,
        'created' => $entity->created,
      ));
    }
    $query->execute();
  }
";}i:10;a:7:{s:4:"name";s:17:"hook_field_update";s:10:"definition";s:88:"function hook_field_update($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:60:"Define custom update behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:1008:"
  if (variable_get('taxonomy_maintain_index_table', TRUE) && $field['storage']['type'] == 'field_sql_storage' && $entity_type == 'node') {
    $first_call = &drupal_static(__FUNCTION__, array());

    // We don't maintain data for old revisions, so clear all previous values
    // from the table. Since this hook runs once per field, per object, make
    // sure we only wipe values once.
    if (!isset($first_call[$entity->nid])) {
      $first_call[$entity->nid] = FALSE;
      db_delete('taxonomy_index')->condition('nid', $entity->nid)->execute();
    }
    // Only save data to the table if the node is published.
    if ($entity->status) {
      $query = db_insert('taxonomy_index')->fields(array('nid', 'tid', 'sticky', 'created'));
      foreach ($items as $item) {
        $query->values(array(
          'nid' => $entity->nid,
          'tid' => $item['tid'],
          'sticky' => $entity->sticky,
          'created' => $entity->created,
        ));
      }
      $query->execute();
    }
  }
";}i:11;a:7:{s:4:"name";s:31:"hook_field_storage_update_field";s:10:"definition";s:73:"function hook_field_storage_update_field($field, $prior_field, $has_data)";s:11:"description";s:43:"Update the storage information for a field.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:609:"
  if (!$has_data) {
    // There is no data. Re-create the tables completely.
    $prior_schema = _field_sql_storage_schema($prior_field);
    foreach ($prior_schema as $name => $table) {
      db_drop_table($name, $table);
    }
    $schema = _field_sql_storage_schema($field);
    foreach ($schema as $name => $table) {
      db_create_table($name, $table);
    }
  }
  else {
    // There is data. See field_sql_storage_field_storage_update_field() for
    // an example of what to do to modify the schema in place, preserving the
    // old data as much as possible.
  }
  drupal_get_schema(NULL, TRUE);
";}i:12;a:7:{s:4:"name";s:17:"hook_field_delete";s:10:"definition";s:88:"function hook_field_delete($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:60:"Define custom delete behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:489:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);
  foreach ($items as $delta => $item) {
    // For hook_file_references(), remember that this is being deleted.
    $item['file_field_name'] = $field['field_name'];
    // Pass in the ID of the object that is being removed so all references can
    // be counted in hook_file_references().
    $item['file_field_type'] = $entity_type;
    $item['file_field_id'] = $id;
    file_field_delete_file($item, $field);
  }
";}i:13;a:7:{s:4:"name";s:26:"hook_field_delete_revision";s:10:"definition";s:97:"function hook_field_delete_revision($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:69:"Define custom revision delete behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:257:"
  foreach ($items as $delta => $item) {
    // For hook_file_references, remember that this file is being deleted.
    $item['file_field_name'] = $field['field_name'];
    if (file_field_delete_file($item, $field)) {
      $items[$delta] = NULL;
    }
  }
";}i:14;a:7:{s:4:"name";s:30:"hook_field_prepare_translation";s:10:"definition";s:135:"function hook_field_prepare_translation($entity_type, $entity, $field, $instance, $langcode, &$items, $source_entity, $source_langcode)";s:11:"description";s:73:"Define custom prepare_translation behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:341:"
  // If the translating user is not permitted to use the assigned text format,
  // we must not expose the source values.
  $field_name = $field['field_name'];
  $formats = filter_formats();
  $format_id = $source_entity->{$field_name}[$source_langcode][0]['format'];
  if (!filter_access($formats[$format_id])) {
    $items = array();
  }
";}i:15;a:7:{s:4:"name";s:19:"hook_field_is_empty";s:10:"definition";s:43:"function hook_field_is_empty($item, $field)";s:11:"description";s:55:"Define what constitutes an empty item for a field type.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:104:"
  if (empty($item['value']) && (string) $item['value'] !== '0') {
    return TRUE;
  }
  return FALSE;
";}i:16;a:7:{s:4:"name";s:22:"hook_field_widget_info";s:10:"definition";s:33:"function hook_field_widget_info()";s:11:"description";s:30:"Expose Field API widget types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:978:"
    return array(
    'text_textfield' => array(
      'label' => t('Text field'),
      'field types' => array('text'),
      'settings' => array('size' => 60),
      'behaviors' => array(
        'multiple values' => FIELD_BEHAVIOR_DEFAULT,
        'default value' => FIELD_BEHAVIOR_DEFAULT,
      ),
    ),
    'text_textarea' => array(
      'label' => t('Text area (multiple rows)'),
      'field types' => array('text_long'),
      'settings' => array('rows' => 5),
      'behaviors' => array(
        'multiple values' => FIELD_BEHAVIOR_DEFAULT,
        'default value' => FIELD_BEHAVIOR_DEFAULT,
      ),
    ),
    'text_textarea_with_summary' => array(
      'label' => t('Text area with a summary'),
      'field types' => array('text_with_summary'),
      'settings' => array('rows' => 20, 'summary_rows' => 5),
      'behaviors' => array(
        'multiple values' => FIELD_BEHAVIOR_DEFAULT,
        'default value' => FIELD_BEHAVIOR_DEFAULT,
      ),
    ),
  );
";}i:17;a:7:{s:4:"name";s:28:"hook_field_widget_info_alter";s:10:"definition";s:45:"function hook_field_widget_info_alter(&$info)";s:11:"description";s:46:"Perform alterations on Field API widget types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:261:"
  // Add a setting to a widget type.
  $info['text_textfield']['settings'] += array(
    'mymodule_additional_setting' => 'default value',
  );

  // Let a new field type re-use an existing widget.
  $info['options_select']['field types'][] = 'my_field_type';
";}i:18;a:7:{s:4:"name";s:22:"hook_field_widget_form";s:10:"definition";s:109:"function hook_field_widget_form(&$form, &$form_state, $field, $instance, $langcode, $items, $delta, $element)";s:11:"description";s:42:"Return the form for a single field widget.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:159:"
  $element += array(
    '#type' => $instance['widget']['type'],
    '#default_value' => isset($items[$delta]) ? $items[$delta] : '',
  );
  return $element;
";}i:19;a:7:{s:4:"name";s:28:"hook_field_widget_form_alter";s:10:"definition";s:72:"function hook_field_widget_form_alter(&$element, &$form_state, $context)";s:11:"description";s:56:"Alter forms for field widgets provided by other modules.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:233:"
  // Add a css class to widget form elements for all fields of type mytype.
  if ($context['field']['type'] == 'mytype') {
    // Be sure not to overwrite existing attributes.
    $element['#attributes']['class'][] = 'myclass';
  }
";}i:20;a:7:{s:4:"name";s:40:"hook_field_widget_WIDGET_TYPE_form_alter";s:10:"definition";s:84:"function hook_field_widget_WIDGET_TYPE_form_alter(&$element, &$form_state, $context)";s:11:"description";s:68:"Alter widget forms for a specific widget provided by another module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:262:"
  // Code here will only act on widgets of type WIDGET_TYPE.  For example,
  // hook_field_widget_mymodule_autocomplete_form_alter() will only act on
  // widgets of type 'mymodule_autocomplete'.
  $element['#autocomplete_path'] = 'mymodule/autocomplete_path';
";}i:21;a:7:{s:4:"name";s:23:"hook_field_widget_error";s:10:"definition";s:71:"function hook_field_widget_error($element, $error, $form, &$form_state)";s:11:"description";s:36:"Flag a field-level validation error.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:53:"
  form_error($element['value'], $error['message']);
";}i:22;a:7:{s:4:"name";s:25:"hook_field_formatter_info";s:10:"definition";s:36:"function hook_field_formatter_info()";s:11:"description";s:33:"Expose Field API formatter types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:1123:"
  return array(
    'text_default' => array(
      'label' => t('Default'),
      'field types' => array('text', 'text_long', 'text_with_summary'),
    ),
    'text_plain' => array(
      'label' => t('Plain text'),
      'field types' => array('text', 'text_long', 'text_with_summary'),
    ),

    // The text_trimmed formatter displays the trimmed version of the
    // full element of the field. It is intended to be used with text
    // and text_long fields. It also works with text_with_summary
    // fields though the text_summary_or_trimmed formatter makes more
    // sense for that field type.
    'text_trimmed' => array(
      'label' => t('Trimmed'),
      'field types' => array('text', 'text_long', 'text_with_summary'),
    ),

    // The 'summary or trimmed' field formatter for text_with_summary
    // fields displays returns the summary element of the field or, if
    // the summary is empty, the trimmed version of the full element
    // of the field.
    'text_summary_or_trimmed' => array(
      'label' => t('Summary or trimmed'),
      'field types' => array('text_with_summary'),
    ),
  );
";}i:23;a:7:{s:4:"name";s:31:"hook_field_formatter_info_alter";s:10:"definition";s:48:"function hook_field_formatter_info_alter(&$info)";s:11:"description";s:49:"Perform alterations on Field API formatter types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:263:"
  // Add a setting to a formatter type.
  $info['text_default']['settings'] += array(
    'mymodule_additional_setting' => 'default value',
  );

  // Let a new field type re-use an existing formatter.
  $info['text_default']['field types'][] = 'my_field_type';
";}i:24;a:7:{s:4:"name";s:33:"hook_field_formatter_prepare_view";s:10:"definition";s:118:"function hook_field_formatter_prepare_view($entity_type, $entities, $field, $instances, $langcode, &$items, $displays)";s:11:"description";s:70:"Allow formatters to load information for field values being displayed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:1125:"
  $tids = array();

  // Collect every possible term attached to any of the fieldable entities.
  foreach ($entities as $id => $entity) {
    foreach ($items[$id] as $delta => $item) {
      // Force the array key to prevent duplicates.
      $tids[$item['tid']] = $item['tid'];
    }
  }

  if ($tids) {
    $terms = taxonomy_term_load_multiple($tids);

    // Iterate through the fieldable entities again to attach the loaded term
    // data.
    foreach ($entities as $id => $entity) {
      $rekey = FALSE;

      foreach ($items[$id] as $delta => $item) {
        // Check whether the taxonomy term field instance value could be loaded.
        if (isset($terms[$item['tid']])) {
          // Replace the instance value with the term data.
          $items[$id][$delta]['taxonomy_term'] = $terms[$item['tid']];
        }
        // Otherwise, unset the instance value, since the term does not exist.
        else {
          unset($items[$id][$delta]);
          $rekey = TRUE;
        }
      }

      if ($rekey) {
        // Rekey the items array.
        $items[$id] = array_values($items[$id]);
      }
    }
  }
";}i:25;a:7:{s:4:"name";s:25:"hook_field_formatter_view";s:10:"definition";s:105:"function hook_field_formatter_view($entity_type, $entity, $field, $instance, $langcode, $items, $display)";s:11:"description";s:43:"Build a renderable array for a field value.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:1338:"
  $element = array();
  $settings = $display['settings'];

  switch ($display['type']) {
    case 'sample_field_formatter_simple':
      // Common case: each value is displayed individually in a sub-element
      // keyed by delta. The field.tpl.php template specifies the markup
      // wrapping each value.
      foreach ($items as $delta => $item) {
        $element[$delta] = array('#markup' => $settings['some_setting'] . $item['value']);
      }
      break;

    case 'sample_field_formatter_themeable':
      // More elaborate formatters can defer to a theme function for easier
      // customization.
      foreach ($items as $delta => $item) {
        $element[$delta] = array(
          '#theme' => 'mymodule_theme_sample_field_formatter_themeable',
          '#data' => $item['value'],
          '#some_setting' => $settings['some_setting'],
        );
      }
      break;

    case 'sample_field_formatter_combined':
      // Some formatters might need to display all values within a single piece
      // of markup.
      $rows = array();
      foreach ($items as $delta => $item) {
        $rows[] = array($delta, $item['value']);
      }
      $element[0] = array(
        '#theme' => 'table',
        '#header' => array(t('Delta'), t('Value')),
        '#rows' => $rows,
      );
      break;
  }

  return $element;
";}i:26;a:7:{s:4:"name";s:22:"hook_field_attach_form";s:10:"definition";s:87:"function hook_field_attach_form($entity_type, $entity, &$form, &$form_state, $langcode)";s:11:"description";s:27:"Act on field_attach_form().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:252:"
  // Add a checkbox allowing a given field to be emptied.
  // See hook_field_attach_submit() for the corresponding processing code.
  $form['empty_field_foo'] = array(
    '#type' => 'checkbox',
    '#title' => t("Empty the 'field_foo' field"),
  );
";}i:27;a:7:{s:4:"name";s:22:"hook_field_attach_load";s:10:"definition";s:72:"function hook_field_attach_load($entity_type, $entities, $age, $options)";s:11:"description";s:27:"Act on field_attach_load().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:28;a:7:{s:4:"name";s:26:"hook_field_attach_validate";s:10:"definition";s:68:"function hook_field_attach_validate($entity_type, $entity, &$errors)";s:11:"description";s:31:"Act on field_attach_validate().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:29;a:7:{s:4:"name";s:24:"hook_field_attach_submit";s:10:"definition";s:77:"function hook_field_attach_submit($entity_type, $entity, $form, &$form_state)";s:11:"description";s:29:"Act on field_attach_submit().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:277:"
  // Sample case of an 'Empty the field' checkbox added on the form, allowing
  // a given field to be emptied.
  $values = drupal_array_get_nested_value($form_state['values'], $form['#parents']);
  if (!empty($values['empty_field_foo'])) {
    unset($entity->field_foo);
  }
";}i:30;a:7:{s:4:"name";s:25:"hook_field_attach_presave";s:10:"definition";s:57:"function hook_field_attach_presave($entity_type, $entity)";s:11:"description";s:30:"Act on field_attach_presave().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:31;a:7:{s:4:"name";s:24:"hook_field_attach_insert";s:10:"definition";s:56:"function hook_field_attach_insert($entity_type, $entity)";s:11:"description";s:29:"Act on field_attach_insert().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:32;a:7:{s:4:"name";s:24:"hook_field_attach_update";s:10:"definition";s:56:"function hook_field_attach_update($entity_type, $entity)";s:11:"description";s:29:"Act on field_attach_update().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:33;a:7:{s:4:"name";s:34:"hook_field_attach_preprocess_alter";s:10:"definition";s:66:"function hook_field_attach_preprocess_alter(&$variables, $context)";s:11:"description";s:42:"Alter field_attach_preprocess() variables.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:34;a:7:{s:4:"name";s:24:"hook_field_attach_delete";s:10:"definition";s:56:"function hook_field_attach_delete($entity_type, $entity)";s:11:"description";s:29:"Act on field_attach_delete().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:35;a:7:{s:4:"name";s:33:"hook_field_attach_delete_revision";s:10:"definition";s:65:"function hook_field_attach_delete_revision($entity_type, $entity)";s:11:"description";s:38:"Act on field_attach_delete_revision().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:36;a:7:{s:4:"name";s:23:"hook_field_attach_purge";s:10:"definition";s:74:"function hook_field_attach_purge($entity_type, $entity, $field, $instance)";s:11:"description";s:26:"Act on field_purge_data().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:178:"
  // find the corresponding data in mymodule and purge it
  if ($entity_type == 'node' && $field->field_name == 'my_field_name') {
    mymodule_remove_mydata($entity->nid);
  }
";}i:37;a:7:{s:4:"name";s:28:"hook_field_attach_view_alter";s:10:"definition";s:57:"function hook_field_attach_view_alter(&$output, $context)";s:11:"description";s:65:"Perform alterations on field_attach_view() or field_view_field().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:733:"
  // Append RDF term mappings on displayed taxonomy links.
  foreach (element_children($output) as $field_name) {
    $element = &$output[$field_name];
    if ($element['#field_type'] == 'taxonomy_term_reference' && $element['#formatter'] == 'taxonomy_term_reference_link') {
      foreach ($element['#items'] as $delta => $item) {
        $term = $item['taxonomy_term'];
        if (!empty($term->rdf_mapping['rdftype'])) {
          $element[$delta]['#options']['attributes']['typeof'] = $term->rdf_mapping['rdftype'];
        }
        if (!empty($term->rdf_mapping['name']['predicates'])) {
          $element[$delta]['#options']['attributes']['property'] = $term->rdf_mapping['name']['predicates'];
        }
      }
    }
  }
";}i:38;a:7:{s:4:"name";s:43:"hook_field_attach_prepare_translation_alter";s:10:"definition";s:72:"function hook_field_attach_prepare_translation_alter(&$entity, $context)";s:11:"description";s:58:"Perform alterations on field_attach_prepare_translation().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:131:"
  if ($context['entity_type'] == 'custom_entity_type') {
    $entity->custom_field = $context['source_entity']->custom_field;
  }
";}i:39;a:7:{s:4:"name";s:25:"hook_field_language_alter";s:10:"definition";s:64:"function hook_field_language_alter(&$display_language, $context)";s:11:"description";s:47:"Perform alterations on field_language() values.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:362:"
  // Do not apply core language fallback rules if they are disabled or if Locale
  // is not registered as a translation handler.
  if (variable_get('locale_field_language_fallback', TRUE) && field_has_translation_handler($context['entity_type'], 'locale')) {
    locale_field_language_fallback($display_language, $context['entity'], $context['language']);
  }
";}i:40;a:7:{s:4:"name";s:36:"hook_field_available_languages_alter";s:10:"definition";s:68:"function hook_field_available_languages_alter(&$languages, $context)";s:11:"description";s:41:"Alter field_available_languages() values.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:166:"
  // Add an unavailable language.
  $languages[] = 'xx';

  // Remove an available language.
  $index = array_search('yy', $languages);
  unset($languages[$index]);
";}i:41;a:7:{s:4:"name";s:31:"hook_field_attach_create_bundle";s:10:"definition";s:63:"function hook_field_attach_create_bundle($entity_type, $bundle)";s:11:"description";s:36:"Act on field_attach_create_bundle().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:151:"
  // When a new bundle is created, the menu needs to be rebuilt to add the
  // Field UI menu item tabs.
  variable_set('menu_rebuild_needed', TRUE);
";}i:42;a:7:{s:4:"name";s:31:"hook_field_attach_rename_bundle";s:10:"definition";s:80:"function hook_field_attach_rename_bundle($entity_type, $bundle_old, $bundle_new)";s:11:"description";s:36:"Act on field_attach_rename_bundle().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:435:"
  // Update the extra weights variable with new information.
  if ($bundle_old !== $bundle_new) {
    $extra_weights = variable_get('field_extra_weights', array());
    if (isset($info[$entity_type][$bundle_old])) {
      $extra_weights[$entity_type][$bundle_new] = $extra_weights[$entity_type][$bundle_old];
      unset($extra_weights[$entity_type][$bundle_old]);
      variable_set('field_extra_weights', $extra_weights);
    }
  }
";}i:43;a:7:{s:4:"name";s:31:"hook_field_attach_delete_bundle";s:10:"definition";s:75:"function hook_field_attach_delete_bundle($entity_type, $bundle, $instances)";s:11:"description";s:34:"Act on field_attach_delete_bundle.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:299:"
  // Remove the extra weights variable information for this bundle.
  $extra_weights = variable_get('field_extra_weights', array());
  if (isset($extra_weights[$entity_type][$bundle])) {
    unset($extra_weights[$entity_type][$bundle]);
    variable_set('field_extra_weights', $extra_weights);
  }
";}i:44;a:7:{s:4:"name";s:23:"hook_field_storage_info";s:10:"definition";s:34:"function hook_field_storage_info()";s:11:"description";s:34:"Expose Field API storage backends.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:229:"
  return array(
    'field_sql_storage' => array(
      'label' => t('Default SQL storage'),
      'description' => t('Stores fields in the local SQL database, using per-field tables.'),
      'settings' => array(),
    ),
  );
";}i:45;a:7:{s:4:"name";s:29:"hook_field_storage_info_alter";s:10:"definition";s:46:"function hook_field_storage_info_alter(&$info)";s:11:"description";s:47:"Perform alterations on Field API storage types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:149:"
  // Add a setting to a storage type.
  $info['field_sql_storage']['settings'] += array(
    'mymodule_additional_setting' => 'default value',
  );
";}i:46;a:7:{s:4:"name";s:26:"hook_field_storage_details";s:10:"definition";s:43:"function hook_field_storage_details($field)";s:11:"description";s:58:"Reveal the internal details about the storage for a field.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:510:"
  $details = array();

  // Add field columns.
  foreach ((array) $field['columns'] as $column_name => $attributes) {
    $real_name = _field_sql_storage_columnname($field['field_name'], $column_name);
    $columns[$column_name] = $real_name;
  }
  return array(
    'sql' => array(
      FIELD_LOAD_CURRENT => array(
        _field_sql_storage_tablename($field) => $columns,
      ),
      FIELD_LOAD_REVISION => array(
        _field_sql_storage_revision_tablename($field) => $columns,
      ),
    ),
  );
";}i:47;a:7:{s:4:"name";s:32:"hook_field_storage_details_alter";s:10:"definition";s:60:"function hook_field_storage_details_alter(&$details, $field)";s:11:"description";s:49:"Perform alterations on Field API storage details.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:400:"
  if ($field['field_name'] == 'field_of_interest') {
    $columns = array();
    foreach ((array) $field['columns'] as $column_name => $attributes) {
      $columns[$column_name] = $column_name;
    }
    $details['drupal_variables'] = array(
      FIELD_LOAD_CURRENT => array(
        'moon' => $columns,
      ),
      FIELD_LOAD_REVISION => array(
        'mars' => $columns,
      ),
    );
  }
";}i:48;a:7:{s:4:"name";s:23:"hook_field_storage_load";s:10:"definition";s:82:"function hook_field_storage_load($entity_type, $entities, $age, $fields, $options)";s:11:"description";s:38:"Load field data for a set of entities.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:1622:"
  $field_info = field_info_field_by_ids();
  $load_current = $age == FIELD_LOAD_CURRENT;

  foreach ($fields as $field_id => $ids) {
    $field = $field_info[$field_id];
    $field_name = $field['field_name'];
    $table = $load_current ? _field_sql_storage_tablename($field) : _field_sql_storage_revision_tablename($field);

    $query = db_select($table, 't')
      ->fields('t')
      ->condition('entity_type', $entity_type)
      ->condition($load_current ? 'entity_id' : 'revision_id', $ids, 'IN')
      ->condition('language', field_available_languages($entity_type, $field), 'IN')
      ->orderBy('delta');

    if (empty($options['deleted'])) {
      $query->condition('deleted', 0);
    }

    $results = $query->execute();

    $delta_count = array();
    foreach ($results as $row) {
      if (!isset($delta_count[$row->entity_id][$row->language])) {
        $delta_count[$row->entity_id][$row->language] = 0;
      }

      if ($field['cardinality'] == FIELD_CARDINALITY_UNLIMITED || $delta_count[$row->entity_id][$row->language] < $field['cardinality']) {
        $item = array();
        // For each column declared by the field, populate the item
        // from the prefixed database column.
        foreach ($field['columns'] as $column => $attributes) {
          $column_name = _field_sql_storage_columnname($field_name, $column);
          $item[$column] = $row->$column_name;
        }

        // Add the item to the field values for the entity.
        $entities[$row->entity_id]->{$field_name}[$row->language][] = $item;
        $delta_count[$row->entity_id][$row->language]++;
      }
    }
  }
";}i:49;a:7:{s:4:"name";s:24:"hook_field_storage_write";s:10:"definition";s:70:"function hook_field_storage_write($entity_type, $entity, $op, $fields)";s:11:"description";s:31:"Write field data for an entity.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:2857:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);
  if (!isset($vid)) {
    $vid = $id;
  }

  foreach ($fields as $field_id) {
    $field = field_info_field_by_id($field_id);
    $field_name = $field['field_name'];
    $table_name = _field_sql_storage_tablename($field);
    $revision_name = _field_sql_storage_revision_tablename($field);

    $all_languages = field_available_languages($entity_type, $field);
    $field_languages = array_intersect($all_languages, array_keys((array) $entity->$field_name));

    // Delete and insert, rather than update, in case a value was added.
    if ($op == FIELD_STORAGE_UPDATE) {
      // Delete languages present in the incoming $entity->$field_name.
      // Delete all languages if $entity->$field_name is empty.
      $languages = !empty($entity->$field_name) ? $field_languages : $all_languages;
      if ($languages) {
        db_delete($table_name)
          ->condition('entity_type', $entity_type)
          ->condition('entity_id', $id)
          ->condition('language', $languages, 'IN')
          ->execute();
        db_delete($revision_name)
          ->condition('entity_type', $entity_type)
          ->condition('entity_id', $id)
          ->condition('revision_id', $vid)
          ->condition('language', $languages, 'IN')
          ->execute();
      }
    }

    // Prepare the multi-insert query.
    $do_insert = FALSE;
    $columns = array('entity_type', 'entity_id', 'revision_id', 'bundle', 'delta', 'language');
    foreach ($field['columns'] as $column => $attributes) {
      $columns[] = _field_sql_storage_columnname($field_name, $column);
    }
    $query = db_insert($table_name)->fields($columns);
    $revision_query = db_insert($revision_name)->fields($columns);

    foreach ($field_languages as $langcode) {
      $items = (array) $entity->{$field_name}[$langcode];
      $delta_count = 0;
      foreach ($items as $delta => $item) {
        // We now know we have someting to insert.
        $do_insert = TRUE;
        $record = array(
          'entity_type' => $entity_type,
          'entity_id' => $id,
          'revision_id' => $vid,
          'bundle' => $bundle,
          'delta' => $delta,
          'language' => $langcode,
        );
        foreach ($field['columns'] as $column => $attributes) {
          $record[_field_sql_storage_columnname($field_name, $column)] = isset($item[$column]) ? $item[$column] : NULL;
        }
        $query->values($record);
        if (isset($vid)) {
          $revision_query->values($record);
        }

        if ($field['cardinality'] != FIELD_CARDINALITY_UNLIMITED && ++$delta_count == $field['cardinality']) {
          break;
        }
      }
    }

    // Execute the query if we have values to insert.
    if ($do_insert) {
      $query->execute();
      $revision_query->execute();
    }
  }
";}i:50;a:7:{s:4:"name";s:25:"hook_field_storage_delete";s:10:"definition";s:66:"function hook_field_storage_delete($entity_type, $entity, $fields)";s:11:"description";s:36:"Delete all field data for an entity.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:353:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);

  foreach (field_info_instances($entity_type, $bundle) as $instance) {
    if (isset($fields[$instance['field_id']])) {
      $field = field_info_field_by_id($instance['field_id']);
      field_sql_storage_field_storage_purge($entity_type, $entity, $field, $instance);
    }
  }
";}i:51;a:7:{s:4:"name";s:34:"hook_field_storage_delete_revision";s:10:"definition";s:75:"function hook_field_storage_delete_revision($entity_type, $entity, $fields)";s:11:"description";s:53:"Delete a single revision of field data for an entity.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:443:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);

  if (isset($vid)) {
    foreach ($fields as $field_id) {
      $field = field_info_field_by_id($field_id);
      $revision_name = _field_sql_storage_revision_tablename($field);
      db_delete($revision_name)
        ->condition('entity_type', $entity_type)
        ->condition('entity_id', $id)
        ->condition('revision_id', $vid)
        ->execute();
    }
  }
";}i:52;a:7:{s:4:"name";s:24:"hook_field_storage_query";s:10:"definition";s:41:"function hook_field_storage_query($query)";s:11:"description";s:28:"Execute an EntityFieldQuery.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:3911:"
  $groups = array();
  if ($query->age == FIELD_LOAD_CURRENT) {
    $tablename_function = '_field_sql_storage_tablename';
    $id_key = 'entity_id';
  }
  else {
    $tablename_function = '_field_sql_storage_revision_tablename';
    $id_key = 'revision_id';
  }
  $table_aliases = array();
  // Add tables for the fields used.
  foreach ($query->fields as $key => $field) {
    $tablename = $tablename_function($field);
    // Every field needs a new table.
    $table_alias = $tablename . $key;
    $table_aliases[$key] = $table_alias;
    if ($key) {
      $select_query->join($tablename, $table_alias, "$table_alias.entity_type = $field_base_table.entity_type AND $table_alias.$id_key = $field_base_table.$id_key");
    }
    else {
      $select_query = db_select($tablename, $table_alias);
      $select_query->addTag('entity_field_access');
      $select_query->addMetaData('base_table', $tablename);
      $select_query->fields($table_alias, array('entity_type', 'entity_id', 'revision_id', 'bundle'));
      $field_base_table = $table_alias;
    }
    if ($field['cardinality'] != 1) {
      $select_query->distinct();
    }
  }

  // Add field conditions.
  foreach ($query->fieldConditions as $key => $condition) {
    $table_alias = $table_aliases[$key];
    $field = $condition['field'];
    // Add the specified condition.
    $sql_field = "$table_alias." . _field_sql_storage_columnname($field['field_name'], $condition['column']);
    $query->addCondition($select_query, $sql_field, $condition);
    // Add delta / language group conditions.
    foreach (array('delta', 'language') as $column) {
      if (isset($condition[$column . '_group'])) {
        $group_name = $condition[$column . '_group'];
        if (!isset($groups[$column][$group_name])) {
          $groups[$column][$group_name] = $table_alias;
        }
        else {
          $select_query->where("$table_alias.$column = " . $groups[$column][$group_name] . ".$column");
        }
      }
    }
  }

  if (isset($query->deleted)) {
    $select_query->condition("$field_base_table.deleted", (int) $query->deleted);
  }

  // Is there a need to sort the query by property?
  $has_property_order = FALSE;
  foreach ($query->order as $order) {
    if ($order['type'] == 'property') {
      $has_property_order = TRUE;
    }
  }

  if ($query->propertyConditions || $has_property_order) {
    if (empty($query->entityConditions['entity_type']['value'])) {
      throw new EntityFieldQueryException('Property conditions and orders must have an entity type defined.');
    }
    $entity_type = $query->entityConditions['entity_type']['value'];
    $entity_base_table = _field_sql_storage_query_join_entity($select_query, $entity_type, $field_base_table);
    $query->entityConditions['entity_type']['operator'] = '=';
    foreach ($query->propertyConditions as $property_condition) {
      $query->addCondition($select_query, "$entity_base_table." . $property_condition['column'], $property_condition);
    }
  }
  foreach ($query->entityConditions as $key => $condition) {
    $query->addCondition($select_query, "$field_base_table.$key", $condition);
  }

  // Order the query.
  foreach ($query->order as $order) {
    if ($order['type'] == 'entity') {
      $key = $order['specifier'];
      $select_query->orderBy("$field_base_table.$key", $order['direction']);
    }
    elseif ($order['type'] == 'field') {
      $specifier = $order['specifier'];
      $field = $specifier['field'];
      $table_alias = $table_aliases[$specifier['index']];
      $sql_field = "$table_alias." . _field_sql_storage_columnname($field['field_name'], $specifier['column']);
      $select_query->orderBy($sql_field, $order['direction']);
    }
    elseif ($order['type'] == 'property') {
      $select_query->orderBy("$entity_base_table." . $order['specifier'], $order['direction']);
    }
  }

  return $query->finishQuery($select_query, $id_key);
";}i:53;a:7:{s:4:"name";s:31:"hook_field_storage_create_field";s:10:"definition";s:48:"function hook_field_storage_create_field($field)";s:11:"description";s:31:"Act on creation of a new field.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:162:"
  $schema = _field_sql_storage_schema($field);
  foreach ($schema as $name => $table) {
    db_create_table($name, $table);
  }
  drupal_get_schema(NULL, TRUE);
";}i:54;a:7:{s:4:"name";s:31:"hook_field_storage_delete_field";s:10:"definition";s:48:"function hook_field_storage_delete_field($field)";s:11:"description";s:27:"Act on deletion of a field.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:634:"
  // Mark all data associated with the field for deletion.
  $field['deleted'] = 0;
  $table = _field_sql_storage_tablename($field);
  $revision_table = _field_sql_storage_revision_tablename($field);
  db_update($table)
    ->fields(array('deleted' => 1))
    ->execute();

  // Move the table to a unique name while the table contents are being deleted.
  $field['deleted'] = 1;
  $new_table = _field_sql_storage_tablename($field);
  $revision_new_table = _field_sql_storage_revision_tablename($field);
  db_rename_table($table, $new_table);
  db_rename_table($revision_table, $revision_new_table);
  drupal_get_schema(NULL, TRUE);
";}i:55;a:7:{s:4:"name";s:34:"hook_field_storage_delete_instance";s:10:"definition";s:54:"function hook_field_storage_delete_instance($instance)";s:11:"description";s:36:"Act on deletion of a field instance.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:542:"
  $field = field_info_field($instance['field_name']);
  $table_name = _field_sql_storage_tablename($field);
  $revision_name = _field_sql_storage_revision_tablename($field);
  db_update($table_name)
    ->fields(array('deleted' => 1))
    ->condition('entity_type', $instance['entity_type'])
    ->condition('bundle', $instance['bundle'])
    ->execute();
  db_update($revision_name)
    ->fields(array('deleted' => 1))
    ->condition('entity_type', $instance['entity_type'])
    ->condition('bundle', $instance['bundle'])
    ->execute();
";}i:56;a:7:{s:4:"name";s:27:"hook_field_storage_pre_load";s:10:"definition";s:92:"function hook_field_storage_pre_load($entity_type, $entities, $age, &$skip_fields, $options)";s:11:"description";s:48:"Act before the storage backends load field data.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:57;a:7:{s:4:"name";s:29:"hook_field_storage_pre_insert";s:10:"definition";s:76:"function hook_field_storage_pre_insert($entity_type, $entity, &$skip_fields)";s:11:"description";s:50:"Act before the storage backends insert field data.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:682:"
  if ($entity_type == 'node' && $entity->status && _forum_node_check_node_type($entity)) {
    $query = db_insert('forum_index')->fields(array('nid', 'title', 'tid', 'sticky', 'created', 'comment_count', 'last_comment_timestamp'));
    foreach ($entity->taxonomy_forums as $language) {
      foreach ($language as $delta) {
        $query->values(array(
          'nid' => $entity->nid,
          'title' => $entity->title,
          'tid' => $delta['value'],
          'sticky' => $entity->sticky,
          'created' => $entity->created,
          'comment_count' => 0,
          'last_comment_timestamp' => $entity->created,
        ));
      }
    }
    $query->execute();
  }
";}i:58;a:7:{s:4:"name";s:29:"hook_field_storage_pre_update";s:10:"definition";s:76:"function hook_field_storage_pre_update($entity_type, $entity, &$skip_fields)";s:11:"description";s:50:"Act before the storage backends update field data.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:1392:"
  $first_call = &drupal_static(__FUNCTION__, array());

  if ($entity_type == 'node' && $entity->status && _forum_node_check_node_type($entity)) {
    // We don't maintain data for old revisions, so clear all previous values
    // from the table. Since this hook runs once per field, per entity, make
    // sure we only wipe values once.
    if (!isset($first_call[$entity->nid])) {
      $first_call[$entity->nid] = FALSE;
      db_delete('forum_index')->condition('nid', $entity->nid)->execute();
    }
    // Only save data to the table if the node is published.
    if ($entity->status) {
      $query = db_insert('forum_index')->fields(array('nid', 'title', 'tid', 'sticky', 'created', 'comment_count', 'last_comment_timestamp'));
      foreach ($entity->taxonomy_forums as $language) {
        foreach ($language as $delta) {
          $query->values(array(
            'nid' => $entity->nid,
            'title' => $entity->title,
            'tid' => $delta['value'],
            'sticky' => $entity->sticky,
            'created' => $entity->created,
            'comment_count' => 0,
            'last_comment_timestamp' => $entity->created,
          ));
        }
      }
      $query->execute();
      // The logic for determining last_comment_count is fairly complex, so
      // call _forum_update_forum_index() too.
      _forum_update_forum_index($entity->nid);
    }
  }
";}i:59;a:7:{s:4:"name";s:26:"hook_field_info_max_weight";s:10:"definition";s:68:"function hook_field_info_max_weight($entity_type, $bundle, $context)";s:11:"description";s:75:"Returns the maximum weight for the entity components handled by the module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:196:"
  $weights = array();

  foreach (my_module_entity_additions($entity_type, $bundle, $context) as $addition) {
    $weights[] = $addition['weight'];
  }

  return $weights ? max($weights) : NULL;
";}i:60;a:7:{s:4:"name";s:24:"hook_field_display_alter";s:10:"definition";s:54:"function hook_field_display_alter(&$display, $context)";s:11:"description";s:64:"Alters the display settings of a field before it gets displayed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:416:"
  // Leave field labels out of the search index.
  // Note: The check against $context['entity_type'] == 'node' could be avoided
  // by using hook_field_display_node_alter() instead of
  // hook_field_display_alter(), resulting in less function calls when
  // rendering non-node entities.
  if ($context['entity_type'] == 'node' && $context['view_mode'] == 'search_index') {
    $display['label'] = 'hidden';
  }
";}i:61;a:7:{s:4:"name";s:36:"hook_field_display_ENTITY_TYPE_alter";s:10:"definition";s:66:"function hook_field_display_ENTITY_TYPE_alter(&$display, $context)";s:11:"description";s:87:"Alters the display settings of a field on a given entity type before it gets displayed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:137:"
  // Leave field labels out of the search index.
  if ($context['view_mode'] == 'search_index') {
    $display['label'] = 'hidden';
  }
";}i:62;a:7:{s:4:"name";s:37:"hook_field_extra_fields_display_alter";s:10:"definition";s:68:"function hook_field_extra_fields_display_alter(&$displays, $context)";s:11:"description";s:75:"Alters the display settings of pseudo-fields before an entity is displayed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:141:"
  if ($context['entity_type'] == 'taxonomy_term' && $context['view_mode'] == 'full') {
    $displays['description']['visible'] = FALSE;
  }
";}i:63;a:7:{s:4:"name";s:34:"hook_field_widget_properties_alter";s:10:"definition";s:63:"function hook_field_widget_properties_alter(&$widget, $context)";s:11:"description";s:74:"Alters the widget properties of a field instance before it gets displayed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:260:"
  // Change a widget's type according to the time of day.
  $field = $context['field'];
  if ($context['entity_type'] == 'node' && $field['field_name'] == 'field_foo') {
    $time = date('H');
    $widget['type'] = $time < 12 ? 'widget_am' : 'widget_pm';
  }
";}i:64;a:7:{s:4:"name";s:46:"hook_field_widget_properties_ENTITY_TYPE_alter";s:10:"definition";s:75:"function hook_field_widget_properties_ENTITY_TYPE_alter(&$widget, $context)";s:11:"description";s:71:"Alters the widget properties of a field instance on a given entity type";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:223:"
  // Change a widget's type according to the time of day.
  $field = $context['field'];
  if ($field['field_name'] == 'field_foo') {
    $time = date('H');
    $widget['type'] = $time < 12 ? 'widget_am' : 'widget_pm';
  }
";}i:65;a:7:{s:4:"name";s:23:"hook_field_create_field";s:10:"definition";s:40:"function hook_field_create_field($field)";s:11:"description";s:29:"Act on a field being created.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:66;a:7:{s:4:"name";s:26:"hook_field_create_instance";s:10:"definition";s:46:"function hook_field_create_instance($instance)";s:11:"description";s:38:"Act on a field instance being created.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:67;a:7:{s:4:"name";s:24:"hook_field_update_forbid";s:10:"definition";s:66:"function hook_field_update_forbid($field, $prior_field, $has_data)";s:11:"description";s:37:"Forbid a field update from occurring.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:907:"
  // A 'list' field stores integer keys mapped to display values. If
  // the new field will have fewer values, and any data exists for the
  // abandoned keys, the field will have no way to display them. So,
  // forbid such an update.
  if ($has_data && count($field['settings']['allowed_values']) < count($prior_field['settings']['allowed_values'])) {
    // Identify the keys that will be lost.
    $lost_keys = array_diff(array_keys($field['settings']['allowed_values']), array_keys($prior_field['settings']['allowed_values']));
    // If any data exist for those keys, forbid the update.
    $query = new EntityFieldQuery();
    $found = $query
      ->fieldCondition($prior_field['field_name'], 'value', $lost_keys)
      ->range(0, 1)
      ->execute();
    if ($found) {
      throw new FieldUpdateForbiddenException("Cannot update a list field not to include keys with existing data");
    }
  }
";}i:68;a:7:{s:4:"name";s:23:"hook_field_update_field";s:10:"definition";s:65:"function hook_field_update_field($field, $prior_field, $has_data)";s:11:"description";s:29:"Act on a field being updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:127:"
  // Reset the static value that keeps track of allowed values for list fields.
  drupal_static_reset('list_allowed_values');
";}i:69;a:7:{s:4:"name";s:23:"hook_field_delete_field";s:10:"definition";s:40:"function hook_field_delete_field($field)";s:11:"description";s:29:"Act on a field being deleted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:70;a:7:{s:4:"name";s:26:"hook_field_update_instance";s:10:"definition";s:63:"function hook_field_update_instance($instance, $prior_instance)";s:11:"description";s:38:"Act on a field instance being updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:71;a:7:{s:4:"name";s:26:"hook_field_delete_instance";s:10:"definition";s:46:"function hook_field_delete_instance($instance)";s:11:"description";s:38:"Act on a field instance being deleted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:72;a:7:{s:4:"name";s:21:"hook_field_read_field";s:10:"definition";s:38:"function hook_field_read_field($field)";s:11:"description";s:50:"Act on field records being read from the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:73;a:7:{s:4:"name";s:24:"hook_field_read_instance";s:10:"definition";s:44:"function hook_field_read_instance($instance)";s:11:"description";s:51:"Act on a field record being read from the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}i:74;a:7:{s:4:"name";s:22:"hook_field_purge_field";s:10:"definition";s:39:"function hook_field_purge_field($field)";s:11:"description";s:41:"Acts when a field record is being purged.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:90:"
  db_delete('my_module_field_info')
    ->condition('id', $field['id'])
    ->execute();
";}i:75;a:7:{s:4:"name";s:25:"hook_field_purge_instance";s:10:"definition";s:45:"function hook_field_purge_instance($instance)";s:11:"description";s:43:"Acts when a field instance is being purged.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:102:"
  db_delete('my_module_field_instance_info')
    ->condition('id', $instance['id'])
    ->execute();
";}i:76;a:7:{s:4:"name";s:30:"hook_field_storage_purge_field";s:10:"definition";s:47:"function hook_field_storage_purge_field($field)";s:11:"description";s:63:"Remove field storage information when a field record is purged.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:184:"
  $table_name = _field_sql_storage_tablename($field);
  $revision_name = _field_sql_storage_revision_tablename($field);
  db_drop_table($table_name);
  db_drop_table($revision_name);
";}i:77;a:7:{s:4:"name";s:39:"hook_field_storage_purge_field_instance";s:10:"definition";s:59:"function hook_field_storage_purge_field_instance($instance)";s:11:"description";s:65:"Remove field storage information when a field instance is purged.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:102:"
  db_delete('my_module_field_instance_info')
    ->condition('id', $instance['id'])
    ->execute();
";}i:78;a:7:{s:4:"name";s:24:"hook_field_storage_purge";s:10:"definition";s:75:"function hook_field_storage_purge($entity_type, $entity, $field, $instance)";s:11:"description";s:59:"Remove field storage information when field data is purged.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:439:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);

  $table_name = _field_sql_storage_tablename($field);
  $revision_name = _field_sql_storage_revision_tablename($field);
  db_delete($table_name)
    ->condition('entity_type', $entity_type)
    ->condition('entity_id', $id)
    ->execute();
  db_delete($revision_name)
    ->condition('entity_type', $entity_type)
    ->condition('entity_id', $id)
    ->execute();
";}i:79;a:7:{s:4:"name";s:17:"hook_field_access";s:10:"definition";s:72:"function hook_field_access($op, $field, $entity_type, $entity, $account)";s:11:"description";s:55:"Determine whether the user has access to a given field.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:28:"public://hooks/field.api.php";s:4:"body";s:150:"
  if ($field['field_name'] == 'field_of_interest' && $op == 'edit') {
    return user_access('edit field of interest', $account);
  }
  return TRUE;
";}i:80;a:7:{s:4:"name";s:17:"hook_options_list";s:10:"definition";s:52:"function hook_options_list($field, $instance = NULL)";s:11:"description";s:56:"Returns the list of options to be displayed for a field.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"field";s:9:"file_path";s:30:"public://hooks/options.api.php";s:4:"body";s:946:"
  // Sample structure.
  $options = array(
    0 => t('Zero'),
    1 => t('One'),
    2 => t('Two'),
    3 => t('Three'),
  );

  // Sample structure with groups. Only one level of nesting is allowed. This
  // is only supported by the 'options_select' widget. Other widgets will
  // flatten the array.
  $options = array(
    t('First group') => array(
      0 => t('Zero'),
    ),
    t('Second group') => array(
      1 => t('One'),
      2 => t('Two'),
    ),
    3 => t('Three'),
  );

  // In actual implementations, the array of options will most probably depend
  // on properties of the field. Example from taxonomy.module:
  $options = array();
  foreach ($field['settings']['allowed_values'] as $tree) {
    $terms = taxonomy_get_tree($tree['vid'], $tree['parent']);
    if ($terms) {
      foreach ($terms as $term) {
        $options[$term->tid] = str_repeat('-', $term->depth) . $term->name;
      }
    }
  }

  return $options;
";}}s:11:"field_group";a:10:{i:0;a:7:{s:4:"name";s:32:"hook_field_group_format_settings";s:10:"definition";s:49:"function hook_field_group_format_settings($group)";s:11:"description";s:46:"Implements hook_field_group_format_settings().";s:11:"destination";s:14:"%module.module";s:5:"group";s:11:"field_group";s:9:"file_path";s:34:"public://hooks/field_group.api.php";s:4:"body";s:3882:"
  // Add a wrapper for extra settings to use by others.
  $form = array(
    'instance_settings' => array(
      '#tree' => TRUE,
      '#weight' => 2,
    ),
  );

  $field_group_types = field_group_formatter_info();
  $mode = $group->mode == 'form' ? 'form' : 'display';
  $formatter = $field_group_types[$mode][$group->format_type];

  // Add the required formatter type selector.
  if (isset($formatter['format_types'])) {
    $form['formatter'] = array(
      '#title' => t('Fieldgroup settings'),
      '#type' => 'select',
      '#options' => drupal_map_assoc($formatter['format_types']),
      '#default_value' => isset($group->format_settings['formatter']) ? $group->format_settings['formatter'] : $formatter['default_formatter'],
      '#weight' => 1,
    );
  }
  if ($mode == 'form') {
    $form['instance_settings']['required_fields'] = array(
      '#type' => 'checkbox',
      '#title' => t('Mark group for required fields.'),
      '#default_value' => isset($group->format_settings['instance_settings']['required_fields']) ? $group->format_settings['instance_settings']['required_fields'] : (isset($formatter['instance_settings']['required_fields']) ? $formatter['instance_settings']['required_fields'] : ''),
      '#weight' => 2,
    );
  }
  $form['instance_settings']['classes'] = array(
    '#title' => t('Extra CSS classes'),
    '#type' => 'textfield',
    '#default_value' => isset($group->format_settings['instance_settings']['classes']) ? $group->format_settings['instance_settings']['classes'] : (isset($formatter['instance_settings']['classes']) ? $formatter['instance_settings']['classes'] : ''),
    '#weight' => 3,
    '#element_validate' => array('field_group_validate_css_class'),
  );
  $form['instance_settings']['description'] = array(
    '#title' => t('Description'),
    '#type' => 'textarea',
    '#default_value' => isset($group->format_settings['instance_settings']['description']) ? $group->format_settings['instance_settings']['description'] : (isset($formatter['instance_settings']['description']) ? $formatter['instance_settings']['description'] : ''),
    '#weight' => 0,
  );

  // Add optional instance_settings.
  switch ($group->format_type) {
    case 'div':
      $form['instance_settings']['effect'] = array(
        '#title' => t('Effect'),
        '#type' => 'select',
        '#options' => array('none' => t('None'), 'blind' => t('Blind')),
        '#default_value' => isset($group->format_settings['instance_settings']['effect']) ? $group->format_settings['instance_settings']['effect'] : $formatter['instance_settings']['effect'],
        '#weight' => 2,
      );
      $form['instance_settings']['speed'] = array(
        '#title' => t('Speed'),
        '#type' => 'select',
        '#options' => array('none' => t('None'), 'slow' => t('Slow'), 'fast' => t('Fast')),
        '#default_value' => isset($group->format_settings['instance_settings']['speed']) ? $group->format_settings['instance_settings']['speed'] : $formatter['instance_settings']['speed'],
        '#weight' => 3,
      );
      break;
    case 'fieldset':
      $form['instance_settings']['classes'] = array(
        '#title' => t('Extra CSS classes'),
        '#type' => 'textfield',
        '#default_value' => isset($group->format_settings['instance_settings']['classes']) ? $group->format_settings['instance_settings']['classes'] : $formatter['instance_settings']['classes'],
        '#weight' => 3,
        '#element_validate' => array('field_group_validate_css_class'),
      );
      break;
    case 'tabs':
    case 'htabs':
    case 'accordion':
      unset($form['instance_settings']['description']);
      if (isset($form['instance_settings']['required_fields'])) {
        unset($form['instance_settings']['required_fields']);
      }
      break;
    case 'tab':
    case 'htab':
    case 'accordion-item':
    default:
  }

  return $form;
";}i:1;a:7:{s:4:"name";s:27:"hook_field_group_pre_render";s:10:"definition";s:65:"function hook_field_group_pre_render(& $element, $group, & $form)";s:11:"description";s:41:"Implements hook_field_group_pre_render().";s:11:"destination";s:14:"%module.module";s:5:"group";s:11:"field_group";s:9:"file_path";s:34:"public://hooks/field_group.api.php";s:4:"body";s:1646:"

  // You can prepare some variables to use in the logic.
  $view_mode = isset($form['#view_mode']) ? $form['#view_mode'] : 'form';
  $id = $form['#entity_type'] . '_' . $form['#bundle'] . '_' . $view_mode . '_' . $group->group_name;

  // Each formatter type can have whole different set of element properties.
  switch ($group->format_type) {

    // Normal or collapsible div.
    case 'div':
      $effect = isset($group->format_settings['instance_settings']['effect']) ? $group->format_settings['instance_settings']['effect'] : 'none';
      $speed = isset($group->format_settings['instance_settings']['speed']) ? $group->format_settings['instance_settings']['speed'] : 'none';
      $add = array(
        '#type' => 'markup',
        '#weight' => $group->weight,
        '#id' => $id,
      );
      $classes .= " speed-$speed effect-$effect";
      if ($group->format_settings['formatter'] != 'open') {
        $add['#prefix'] = '<div class="field-group-format ' . $classes . '">
          <span class="field-group-format-toggler">' . check_plain(t($group->label)) . '</span>
          <div class="field-group-format-wrapper" style="display: none;">';
        $add['#suffix'] = '</div></div>';
      }
      else {
        $add['#prefix'] = '<div class="field-group-format ' . $group->group_name . ' ' . $classes . '">';
        $add['#suffix'] = '</div>';
      }
      if (!empty($description)) {
        $add['#prefix'] .= '<div class="description">' . $description . '</div>';
      }
      $element += $add;

      if ($effect == 'blind') {
        drupal_add_library('system', 'effects.blind');
      }

      break;
    break;
  }
";}i:2;a:7:{s:4:"name";s:33:"hook_field_group_pre_render_alter";s:10:"definition";s:70:"function hook_field_group_pre_render_alter(&$element, $group, & $form)";s:11:"description";s:41:"Implements hook_field_group_pre_render().";s:11:"destination";s:14:"%module.module";s:5:"group";s:11:"field_group";s:9:"file_path";s:34:"public://hooks/field_group.api.php";s:4:"body";s:108:"

  if ($group->format_type == 'htab') {
    $element['#theme_wrappers'] = array('my_horizontal_tab');
  }

";}i:3;a:7:{s:4:"name";s:39:"hook_field_group_build_pre_render_alter";s:10:"definition";s:60:"function hook_field_group_build_pre_render_alter(& $element)";s:11:"description";s:53:"Implements hook_field_group_build_pre_render_alter().";s:11:"destination";s:14:"%module.module";s:5:"group";s:11:"field_group";s:9:"file_path";s:34:"public://hooks/field_group.api.php";s:4:"body";s:686:"

  // Prepare variables.
  $display = isset($element['#view_mode']);
  $groups = array_keys($element['#groups']);

  // Example from field_group itself to unset empty elements.
  if ($display) {
    foreach (element_children($element) as $name) {
      if (in_array($name, $groups)) {
        if (field_group_field_group_is_empty($element[$name], $groups)) {
          unset($element[$name]);
        }
      }
    }
  }

  // You might include additional javascript files and stylesheets.
  $element['#attached']['js'][] = drupal_get_path('module', 'field_group') . '/field_group.js';
  $element['#attached']['css'][] = drupal_get_path('module', 'field_group') . '/field_group.css';

";}i:4;a:7:{s:4:"name";s:31:"hook_field_group_format_summary";s:10:"definition";s:48:"function hook_field_group_format_summary($group)";s:11:"description";s:45:"Implements hook_field_group_format_summary().";s:11:"destination";s:14:"%module.module";s:5:"group";s:11:"field_group";s:9:"file_path";s:34:"public://hooks/field_group.api.php";s:4:"body";s:97:"
  $output = '';
  // Create additional summary or change the default setting.
  return $output;
";}i:5;a:7:{s:4:"name";s:22:"hook_ctools_plugin_api";s:10:"definition";s:46:"function hook_ctools_plugin_api($module, $api)";s:11:"description";s:35:"Implement hook_ctools_plugin_api().";s:11:"destination";s:14:"%module.module";s:5:"group";s:11:"field_group";s:9:"file_path";s:34:"public://hooks/field_group.api.php";s:4:"body";s:98:"
  if ($module == 'field_group' && $api == 'field_group') {
    return array('version' => 1);
  }
";}i:6;a:7:{s:4:"name";s:21:"hook_field_group_info";s:10:"definition";s:32:"function hook_field_group_info()";s:11:"description";s:35:"Implements hook_field_group_info().";s:11:"destination";s:14:"%module.module";s:5:"group";s:11:"field_group";s:9:"file_path";s:34:"public://hooks/field_group.api.php";s:4:"body";s:2:"

";}i:7;a:7:{s:4:"name";s:35:"hook_field_group_update_field_group";s:10:"definition";s:52:"function hook_field_group_update_field_group($group)";s:11:"description";s:49:"Implements hook_field_group_update_field_group().";s:11:"destination";s:14:"%module.module";s:5:"group";s:11:"field_group";s:9:"file_path";s:34:"public://hooks/field_group.api.php";s:4:"body";s:48:"
  // Delete extra data depending on the group.
";}i:8;a:7:{s:4:"name";s:35:"hook_field_group_delete_field_group";s:10:"definition";s:52:"function hook_field_group_delete_field_group($group)";s:11:"description";s:49:"Implements hook_field_group_delete_field_group().";s:11:"destination";s:14:"%module.module";s:5:"group";s:11:"field_group";s:9:"file_path";s:34:"public://hooks/field_group.api.php";s:4:"body";s:48:"
  // Delete extra data depending on the group.
";}i:9;a:7:{s:4:"name";s:35:"hook_field_group_create_field_group";s:10:"definition";s:52:"function hook_field_group_create_field_group($group)";s:11:"description";s:49:"Implements hook_field_group_create_field_group().";s:11:"destination";s:14:"%module.module";s:5:"group";s:11:"field_group";s:9:"file_path";s:34:"public://hooks/field_group.api.php";s:4:"body";s:48:"
  // Create extra data depending on the group.
";}}s:8:"field_ui";a:5:{i:0;a:7:{s:4:"name";s:24:"hook_field_settings_form";s:10:"definition";s:63:"function hook_field_settings_form($field, $instance, $has_data)";s:11:"description";s:38:"Add settings to a field settings form.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"field_ui";s:9:"file_path";s:31:"public://hooks/field_ui.api.php";s:4:"body";s:408:"
  $settings = $field['settings'];
  $form['max_length'] = array(
    '#type' => 'textfield',
    '#title' => t('Maximum length'),
    '#default_value' => $settings['max_length'],
    '#required' => FALSE,
    '#element_validate' => array('element_validate_integer_positive'),
    '#description' => t('The maximum length of the field in characters. Leave blank for an unlimited size.'),
  );
  return $form;
";}i:1;a:7:{s:4:"name";s:33:"hook_field_instance_settings_form";s:10:"definition";s:61:"function hook_field_instance_settings_form($field, $instance)";s:11:"description";s:48:"Add settings to an instance field settings form.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"field_ui";s:9:"file_path";s:31:"public://hooks/field_ui.api.php";s:4:"body";s:835:"
  $settings = $instance['settings'];

  $form['text_processing'] = array(
    '#type' => 'radios',
    '#title' => t('Text processing'),
    '#default_value' => $settings['text_processing'],
    '#options' => array(
      t('Plain text'),
      t('Filtered text (user selects text format)'),
    ),
  );
  if ($field['type'] == 'text_with_summary') {
    $form['display_summary'] = array(
      '#type' => 'select',
      '#title' => t('Display summary'),
      '#options' => array(
        t('No'),
        t('Yes'),
      ),
      '#description' => t('Display the summary to allow the user to input a summary value. Hide the summary to automatically fill it with a trimmed portion from the main post.'),
      '#default_value' => !empty($settings['display_summary']) ? $settings['display_summary'] :  0,
    );
  }

  return $form;
";}i:2;a:7:{s:4:"name";s:31:"hook_field_widget_settings_form";s:10:"definition";s:59:"function hook_field_widget_settings_form($field, $instance)";s:11:"description";s:39:"Add settings to a widget settings form.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"field_ui";s:9:"file_path";s:31:"public://hooks/field_ui.api.php";s:4:"body";s:638:"
  $widget = $instance['widget'];
  $settings = $widget['settings'];

  if ($widget['type'] == 'text_textfield') {
    $form['size'] = array(
      '#type' => 'textfield',
      '#title' => t('Size of textfield'),
      '#default_value' => $settings['size'],
      '#element_validate' => array('element_validate_integer_positive'),
      '#required' => TRUE,
    );
  }
  else {
    $form['rows'] = array(
      '#type' => 'textfield',
      '#title' => t('Rows'),
      '#default_value' => $settings['rows'],
      '#element_validate' => array('element_validate_integer_positive'),
      '#required' => TRUE,
    );
  }

  return $form;
";}i:3;a:7:{s:4:"name";s:34:"hook_field_formatter_settings_form";s:10:"definition";s:95:"function hook_field_formatter_settings_form($field, $instance, $view_mode, $form, &$form_state)";s:11:"description";s:49:"Returns form elements for a formatter's settings.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"field_ui";s:9:"file_path";s:31:"public://hooks/field_ui.api.php";s:4:"body";s:504:"
  $display = $instance['display'][$view_mode];
  $settings = $display['settings'];

  $element = array();

  if ($display['type'] == 'text_trimmed' || $display['type'] == 'text_summary_or_trimmed') {
    $element['trim_length'] = array(
      '#title' => t('Length'),
      '#type' => 'textfield',
      '#size' => 20,
      '#default_value' => $settings['trim_length'],
      '#element_validate' => array('element_validate_integer_positive'),
      '#required' => TRUE,
    );
  }

  return $element;

";}i:4;a:7:{s:4:"name";s:37:"hook_field_formatter_settings_summary";s:10:"definition";s:77:"function hook_field_formatter_settings_summary($field, $instance, $view_mode)";s:11:"description";s:74:"Returns a short summary for the current formatter settings of an instance.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"field_ui";s:9:"file_path";s:31:"public://hooks/field_ui.api.php";s:4:"body";s:307:"
  $display = $instance['display'][$view_mode];
  $settings = $display['settings'];

  $summary = '';

  if ($display['type'] == 'text_trimmed' || $display['type'] == 'text_summary_or_trimmed') {
    $summary = t('Length: @chars chars', array('@chars' => $settings['trim_length']));
  }

  return $summary;
";}}s:4:"file";a:2:{i:0;a:7:{s:4:"name";s:25:"hook_file_download_access";s:10:"definition";s:65:"function hook_file_download_access($field, $entity_type, $entity)";s:11:"description";s:33:"Control download access to files.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"file";s:9:"file_path";s:27:"public://hooks/file.api.php";s:4:"body";s:78:"
  if ($entity_type == 'node') {
    return node_access('view', $entity);
  }
";}i:1;a:7:{s:4:"name";s:31:"hook_file_download_access_alter";s:10:"definition";s:81:"function hook_file_download_access_alter(&$grants, $field, $entity_type, $entity)";s:11:"description";s:50:"Alter the access rules applied to a file download.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"file";s:9:"file_path";s:27:"public://hooks/file.api.php";s:4:"body";s:162:"
  // For our example module, we always enforce the rules set by node module.
  if (isset($grants['node'])) {
    $grants = array('node' => $grants['node']);
  }
";}}s:17:"filefield_sources";a:2:{i:0;a:7:{s:4:"name";s:30:"hook_filefield_sources_widgets";s:10:"definition";s:41:"function hook_filefield_sources_widgets()";s:11:"description";s:69:"Returns a list of widgets that are compatible with FileField Sources.";s:11:"destination";s:14:"%module.module";s:5:"group";s:17:"filefield_sources";s:9:"file_path";s:40:"public://hooks/filefield_sources.api.php";s:4:"body";s:98:"
  // Add any widgets that your module supports here.
  return array('mymodule_file_widgetname');
";}i:1;a:7:{s:4:"name";s:27:"hook_filefield_sources_info";s:10:"definition";s:38:"function hook_filefield_sources_info()";s:11:"description";s:66:"Return a list of available sources that FileField Sources can use.";s:11:"destination";s:14:"%module.module";s:5:"group";s:17:"filefield_sources";s:9:"file_path";s:40:"public://hooks/filefield_sources.api.php";s:4:"body";s:755:"
  $sources = array();

  // Provide a potential Flickr source to import Flickr photos.
  $sources['flickr'] = array(
    'name' => t('File attach from Flickr'),
    'label' => t('Flickr'),
    'description' => t('Select a file from Flickr.'),
    // This callback function does all the heavy-work of creating a form element
    // to choose a Flickr photo and populate a field. For an example, see
    // filefield_source_remote_process().
    'process' => 'mymodule_filefield_source_flickr_process',
    // This callback function then takes the value of that field and saves the
    // file locally. For an example, see filefield_source_remote_value().
    'value' => 'mymodule_filefield_source_flickr_value',
    'weight' => 3,
  );
  return $sources;
";}}s:6:"filter";a:9:{i:0;a:7:{s:4:"name";s:16:"hook_filter_info";s:10:"definition";s:27:"function hook_filter_info()";s:11:"description";s:23:"Define content filters.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"filter";s:9:"file_path";s:29:"public://hooks/filter.api.php";s:4:"body";s:931:"
  $filters['filter_html'] = array(
    'title' => t('Limit allowed HTML tags'),
    'description' => t('Allows you to restrict the HTML tags the user can use. It will also remove harmful content such as JavaScript events, JavaScript URLs and CSS styles from those tags that are not removed.'),
    'process callback' => '_filter_html',
    'settings callback' => '_filter_html_settings',
    'default settings' => array(
      'allowed_html' => '<a> <em> <strong> <cite> <blockquote> <code> <ul> <ol> <li> <dl> <dt> <dd>',
      'filter_html_help' => 1,
      'filter_html_nofollow' => 0,
    ),
    'tips callback' => '_filter_html_tips',
  );
  $filters['filter_autop'] = array(
    'title' => t('Convert line breaks'),
    'description' => t('Converts line breaks into HTML (i.e. &lt;br&gt; and &lt;p&gt;) tags.'),
    'process callback' => '_filter_autop',
    'tips callback' => '_filter_autop_tips',
  );
  return $filters;
";}i:1;a:7:{s:4:"name";s:22:"hook_filter_info_alter";s:10:"definition";s:39:"function hook_filter_info_alter(&$info)";s:11:"description";s:42:"Perform alterations on filter definitions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"filter";s:9:"file_path";s:29:"public://hooks/filter.api.php";s:4:"body";s:333:"
  // Replace the PHP evaluator process callback with an improved
  // PHP evaluator provided by a module.
  $info['php_code']['process callback'] = 'my_module_php_evaluator';

  // Alter the default settings of the URL filter provided by core.
  $info['filter_url']['default settings'] = array(
    'filter_url_length' => 100,
  );
";}i:2;a:7:{s:4:"name";s:27:"hook_filter_FILTER_settings";s:10:"definition";s:96:"function hook_filter_FILTER_settings($form, &$form_state, $filter, $format, $defaults, $filters)";s:11:"description";s:41:"Settings callback for hook_filter_info().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"filter";s:9:"file_path";s:29:"public://hooks/filter.api.php";s:4:"body";s:253:"
  $filter->settings += $defaults;

  $elements = array();
  $elements['nofollow'] = array(
    '#type' => 'checkbox',
    '#title' => t('Add rel="nofollow" to all links'),
    '#default_value' => $filter->settings['nofollow'],
  );
  return $elements;
";}i:3;a:7:{s:4:"name";s:26:"hook_filter_FILTER_prepare";s:10:"definition";s:90:"function hook_filter_FILTER_prepare($text, $filter, $format, $langcode, $cache, $cache_id)";s:11:"description";s:40:"Prepare callback for hook_filter_info().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"filter";s:9:"file_path";s:29:"public://hooks/filter.api.php";s:4:"body";s:152:"
  // Escape <code> and </code> tags.
  $text = preg_replace('|<code>(.+?)</code>|se', "[codefilter_code]$1[/codefilter_code]", $text);
  return $text;
";}i:4;a:7:{s:4:"name";s:26:"hook_filter_FILTER_process";s:10:"definition";s:90:"function hook_filter_FILTER_process($text, $filter, $format, $langcode, $cache, $cache_id)";s:11:"description";s:40:"Process callback for hook_filter_info().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"filter";s:9:"file_path";s:29:"public://hooks/filter.api.php";s:4:"body";s:118:"
  $text = preg_replace('|\[codefilter_code\](.+?)\[/codefilter_code\]|se', "<pre>$1</pre>", $text);

  return $text;
";}i:5;a:7:{s:4:"name";s:23:"hook_filter_FILTER_tips";s:10:"definition";s:57:"function hook_filter_FILTER_tips($filter, $format, $long)";s:11:"description";s:37:"Tips callback for hook_filter_info().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"filter";s:9:"file_path";s:29:"public://hooks/filter.api.php";s:4:"body";s:338:"
 if ($long) {
    return t('Lines and paragraphs are automatically recognized. The &lt;br /&gt; line break, &lt;p&gt; paragraph and &lt;/p&gt; close paragraph tags are inserted automatically. If paragraphs are not recognized simply add a couple blank lines.');
  }
  else {
    return t('Lines and paragraphs break automatically.');
  }
";}i:6;a:7:{s:4:"name";s:25:"hook_filter_format_insert";s:10:"definition";s:43:"function hook_filter_format_insert($format)";s:11:"description";s:56:"Perform actions when a new text format has been created.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"filter";s:9:"file_path";s:29:"public://hooks/filter.api.php";s:4:"body";s:29:"
  mymodule_cache_rebuild();
";}i:7;a:7:{s:4:"name";s:25:"hook_filter_format_update";s:10:"definition";s:43:"function hook_filter_format_update($format)";s:11:"description";s:52:"Perform actions when a text format has been updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"filter";s:9:"file_path";s:29:"public://hooks/filter.api.php";s:4:"body";s:29:"
  mymodule_cache_rebuild();
";}i:8;a:7:{s:4:"name";s:26:"hook_filter_format_disable";s:10:"definition";s:44:"function hook_filter_format_disable($format)";s:11:"description";s:53:"Perform actions when a text format has been disabled.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"filter";s:9:"file_path";s:29:"public://hooks/filter.api.php";s:4:"body";s:29:"
  mymodule_cache_rebuild();
";}}s:8:"fivestar";a:3:{i:0;a:7:{s:4:"name";s:21:"hook_fivestar_widgets";s:10:"definition";s:32:"function hook_fivestar_widgets()";s:11:"description";s:42:"Implementation of hook_fivestar_widgets().";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"fivestar";s:9:"file_path";s:31:"public://hooks/fivestar.api.php";s:4:"body";s:224:"
  // Letting fivestar know about my Cool and Awesome Stars.
  $widgets = array(
    'path/to/my/awesome/fivestar/css.css' => 'Awesome Stars',
    'path/to/my/cool/fivestar/css.css' => 'Cool Stars',
  );

  return $widgets;
";}i:1;a:7:{s:4:"name";s:20:"hook_fivestar_access";s:10:"definition";s:60:"function hook_fivestar_access($entity_type, $id, $tag, $uid)";s:11:"description";s:41:"Implementation of hook_fivestar_access().";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"fivestar";s:9:"file_path";s:31:"public://hooks/fivestar.api.php";s:4:"body";s:114:"
  if ($uid == 1) {
    // We are never going to allow the admin user case a fivestar vote.
    return FALSE;
  }
";}i:2;a:7:{s:4:"name";s:25:"hook_fivestar_target_info";s:10:"definition";s:53:"function hook_fivestar_target_info($field, $instance)";s:11:"description";s:41:"Implementation of hook_fivestar_access().";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"fivestar";s:9:"file_path";s:31:"public://hooks/fivestar.api.php";s:4:"body";s:416:"
  $entity_type = $instance['entity_type'];
  $bundle = $instance['bundle'];

  $options = array(
    // Declase a new Target Type.
    // This will allow users to vote on a Node and have the vote cast against the
    // node's author instead of the actual node.
    'example_node_author' => array(
      'title' => t('Node Author'),
      'callback' => '_example_target_node_author'
    ),
  );

  return $options;
";}}s:4:"help";a:1:{i:0;a:7:{s:4:"name";s:9:"hook_help";s:10:"definition";s:31:"function hook_help($path, $arg)";s:11:"description";s:25:"Provide online user help.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"help";s:9:"file_path";s:27:"public://hooks/help.api.php";s:4:"body";s:1141:"
  switch ($path) {
    // Main module help for the block module
    case 'admin/help#block':
      return '<p>' . t('Blocks are boxes of content rendered into an area, or region, of a web page. The default theme Bartik, for example, implements the regions "Sidebar first", "Sidebar second", "Featured", "Content", "Header", "Footer", etc., and a block may appear in any one of these areas. The <a href="@blocks">blocks administration page</a> provides a drag-and-drop interface for assigning a block to a region, and for controlling the order of blocks within regions.', array('@blocks' => url('admin/structure/block'))) . '</p>';

    // Help for another path in the block module
    case 'admin/structure/block':
      return '<p>' . t('This page provides a drag-and-drop interface for assigning a block to a region, and for controlling the order of blocks within regions. Since not all themes implement the same regions, or display regions in the same way, blocks are positioned on a per-theme basis. Remember that your changes will not be saved until you click the <em>Save blocks</em> button at the bottom of the page.') . '</p>';
  }
";}}s:5:"image";a:7:{i:0;a:7:{s:4:"name";s:22:"hook_image_effect_info";s:10:"definition";s:33:"function hook_image_effect_info()";s:11:"description";s:60:"Define information about image effects provided by a module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"image";s:9:"file_path";s:28:"public://hooks/image.api.php";s:4:"body";s:413:"
  $effects = array();

  $effects['mymodule_resize'] = array(
    'label' => t('Resize'),
    'help' => t('Resize an image to an exact set of dimensions, ignoring aspect ratio.'),
    'effect callback' => 'mymodule_resize_effect',
    'dimensions callback' => 'mymodule_resize_dimensions',
    'form callback' => 'mymodule_resize_form',
    'summary theme' => 'mymodule_resize_summary',
  );

  return $effects;
";}i:1;a:7:{s:4:"name";s:28:"hook_image_effect_info_alter";s:10:"definition";s:48:"function hook_image_effect_info_alter(&$effects)";s:11:"description";s:59:"Alter the information provided in hook_image_effect_info().";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"image";s:9:"file_path";s:28:"public://hooks/image.api.php";s:4:"body";s:279:"
  // Override the Image module's crop effect with more options.
  $effects['image_crop']['effect callback'] = 'mymodule_crop_effect';
  $effects['image_crop']['dimensions callback'] = 'mymodule_crop_dimensions';
  $effects['image_crop']['form callback'] = 'mymodule_crop_form';
";}i:2;a:7:{s:4:"name";s:21:"hook_image_style_save";s:10:"definition";s:38:"function hook_image_style_save($style)";s:11:"description";s:32:"Respond to image style updating.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"image";s:9:"file_path";s:28:"public://hooks/image.api.php";s:4:"body";s:302:"
  // If a module defines an image style and that style is renamed by the user
  // the module should update any references to that style.
  if (isset($style['old_name']) && $style['old_name'] == variable_get('mymodule_image_style', '')) {
    variable_set('mymodule_image_style', $style['name']);
  }
";}i:3;a:7:{s:4:"name";s:23:"hook_image_style_delete";s:10:"definition";s:40:"function hook_image_style_delete($style)";s:11:"description";s:32:"Respond to image style deletion.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"image";s:9:"file_path";s:28:"public://hooks/image.api.php";s:4:"body";s:292:"
  // Administrators can choose an optional replacement style when deleting.
  // Update the modules style variable accordingly.
  if (isset($style['old_name']) && $style['old_name'] == variable_get('mymodule_image_style', '')) {
    variable_set('mymodule_image_style', $style['name']);
  }
";}i:4;a:7:{s:4:"name";s:22:"hook_image_style_flush";s:10:"definition";s:39:"function hook_image_style_flush($style)";s:11:"description";s:32:"Respond to image style flushing.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"image";s:9:"file_path";s:28:"public://hooks/image.api.php";s:4:"body";s:115:"
  // Empty cached data that contains information about the style.
  cache_clear_all('*', 'cache_mymodule', TRUE);
";}i:5;a:7:{s:4:"name";s:23:"hook_image_styles_alter";s:10:"definition";s:42:"function hook_image_styles_alter(&$styles)";s:11:"description";s:62:"Modify any image styles provided by other modules or the user.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"image";s:9:"file_path";s:28:"public://hooks/image.api.php";s:4:"body";s:365:"
  // Check that we only affect a default style.
  if ($styles['thumbnail']['storage'] == IMAGE_STORAGE_DEFAULT) {
    // Add an additional effect to the thumbnail style.
    $styles['thumbnail']['effects'][] = array(
      'name' => 'image_desaturate',
      'data' => array(),
      'weight' => 1,
      'effect callback' => 'image_desaturate_effect',
    );
  }
";}i:6;a:7:{s:4:"name";s:25:"hook_image_default_styles";s:10:"definition";s:36:"function hook_image_default_styles()";s:11:"description";s:62:"Provide module-based image styles for reuse throughout Drupal.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"image";s:9:"file_path";s:28:"public://hooks/image.api.php";s:4:"body";s:379:"
  $styles = array();

  $styles['mymodule_preview'] = array(
    'effects' => array(
      array(
        'name' => 'image_scale',
        'data' => array('width' => 400, 'height' => 400, 'upscale' => 1),
        'weight' => 0,
      ),
      array(
        'name' => 'image_desaturate',
        'data' => array(),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
";}}s:10:"invisimail";a:2:{i:0;a:7:{s:4:"name";s:28:"hook_invisimail_encoder_info";s:10:"definition";s:39:"function hook_invisimail_encoder_info()";s:11:"description";s:71:"Defines encoders available to invisimail to get turned into formatters.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"invisimail";s:9:"file_path";s:33:"public://hooks/invisimail.api.php";s:4:"body";s:2:"

";}i:1;a:7:{s:4:"name";s:34:"hook_invisimail_encoder_info_alter";s:10:"definition";s:55:"function hook_invisimail_encoder_info_alter(&$encoders)";s:11:"description";s:74:"Allows modules to alter the encoder definitions provided by other modules.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"invisimail";s:9:"file_path";s:33:"public://hooks/invisimail.api.php";s:4:"body";s:2:"

";}}s:6:"locale";a:9:{i:0;a:7:{s:4:"name";s:11:"hook_locale";s:10:"definition";s:36:"function hook_locale($op = 'groups')";s:11:"description";s:70:"Allows modules to define their own text groups that can be translated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"locale";s:9:"file_path";s:29:"public://hooks/locale.api.php";s:4:"body";s:86:"
  switch ($op) {
    case 'groups':
      return array('custom' => t('Custom'));
  }
";}i:1;a:7:{s:4:"name";s:18:"hook_language_init";s:10:"definition";s:29:"function hook_language_init()";s:11:"description";s:71:"Allows modules to act after language initialization has been performed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"locale";s:9:"file_path";s:29:"public://hooks/locale.api.php";s:4:"body";s:218:"
  global $language, $conf;

  switch ($language->language) {
    case 'it':
      $conf['site_name'] = 'Il mio sito Drupal';
      break;

    case 'fr':
      $conf['site_name'] = 'Mon site Drupal';
      break;
  }
";}i:2;a:7:{s:4:"name";s:32:"hook_language_switch_links_alter";s:10:"definition";s:70:"function hook_language_switch_links_alter(array &$links, $type, $path)";s:11:"description";s:47:"Perform alterations on language switcher links.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"locale";s:9:"file_path";s:29:"public://hooks/locale.api.php";s:4:"body";s:221:"
  global $language;

  if ($type == LANGUAGE_TYPE_CONTENT && isset($links[$language->language])) {
    foreach ($links[$language->language] as $link) {
      $link['attributes']['class'][] = 'active-language';
    }
  }
";}i:3;a:7:{s:4:"name";s:24:"hook_language_types_info";s:10:"definition";s:35:"function hook_language_types_info()";s:11:"description";s:49:"Allow modules to define their own language types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"locale";s:9:"file_path";s:29:"public://hooks/locale.api.php";s:4:"body";s:259:"
  return array(
    'custom_language_type' => array(
      'name' => t('Custom language'),
      'description' => t('A custom language type.'),
    ),
    'fixed_custom_language_type' => array(
      'fixed' => array('custom_language_provider'),
    ),
  );
";}i:4;a:7:{s:4:"name";s:30:"hook_language_types_info_alter";s:10:"definition";s:63:"function hook_language_types_info_alter(array &$language_types)";s:11:"description";s:38:"Perform alterations on language types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"locale";s:9:"file_path";s:29:"public://hooks/locale.api.php";s:4:"body";s:161:"
  if (isset($language_types['custom_language_type'])) {
    $language_types['custom_language_type_custom']['description'] = t('A far better description.');
  }
";}i:5;a:7:{s:4:"name";s:30:"hook_language_negotiation_info";s:10:"definition";s:41:"function hook_language_negotiation_info()";s:11:"description";s:53:"Allow modules to define their own language providers.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"locale";s:9:"file_path";s:29:"public://hooks/locale.api.php";s:4:"body";s:564:"
  return array(
    'custom_language_provider' => array(
      'callbacks' => array(
        'language' => 'custom_language_provider_callback',
        'switcher' => 'custom_language_switcher_callback',
        'url_rewrite' => 'custom_language_url_rewrite_callback',
      ),
      'file' => drupal_get_path('module', 'custom') . '/custom.module',
      'weight' => -4,
      'types' => array('custom_language_type'),
      'name' => t('Custom language provider'),
      'description' => t('This is a custom language provider.'),
      'cache' => 0,
    ),
  );
";}i:6;a:7:{s:4:"name";s:36:"hook_language_negotiation_info_alter";s:10:"definition";s:73:"function hook_language_negotiation_info_alter(array &$language_providers)";s:11:"description";s:42:"Perform alterations on language providers.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"locale";s:9:"file_path";s:29:"public://hooks/locale.api.php";s:4:"body";s:202:"
  if (isset($language_providers['custom_language_provider'])) {
    $language_providers['custom_language_provider']['config'] = 'admin/config/regional/language/configure/custom-language-provider';
  }
";}i:7;a:7:{s:4:"name";s:34:"hook_multilingual_settings_changed";s:10:"definition";s:45:"function hook_multilingual_settings_changed()";s:11:"description";s:52:"Allow modules to react to language settings changes.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"locale";s:9:"file_path";s:29:"public://hooks/locale.api.php";s:4:"body";s:29:"
  field_info_cache_clear();
";}i:8;a:7:{s:4:"name";s:39:"hook_language_fallback_candidates_alter";s:10:"definition";s:77:"function hook_language_fallback_candidates_alter(array &$fallback_candidates)";s:11:"description";s:56:"Perform alterations on the language fallback candidates.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"locale";s:9:"file_path";s:29:"public://hooks/locale.api.php";s:4:"body";s:63:"
  $fallback_candidates = array_reverse($fallback_candidates);
";}}s:4:"menu";a:3:{i:0;a:7:{s:4:"name";s:16:"hook_menu_insert";s:10:"definition";s:32:"function hook_menu_insert($menu)";s:11:"description";s:47:"Informs modules that a custom menu was created.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"menu";s:9:"file_path";s:27:"public://hooks/menu.api.php";s:4:"body";s:215:"
  // For example, we track available menus in a variable.
  $my_menus = variable_get('my_module_menus', array());
  $my_menus[$menu['menu_name']] = $menu['menu_name'];
  variable_set('my_module_menus', $my_menus);
";}i:1;a:7:{s:4:"name";s:16:"hook_menu_update";s:10:"definition";s:32:"function hook_menu_update($menu)";s:11:"description";s:47:"Informs modules that a custom menu was updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"menu";s:9:"file_path";s:27:"public://hooks/menu.api.php";s:4:"body";s:215:"
  // For example, we track available menus in a variable.
  $my_menus = variable_get('my_module_menus', array());
  $my_menus[$menu['menu_name']] = $menu['menu_name'];
  variable_set('my_module_menus', $my_menus);
";}i:2;a:7:{s:4:"name";s:16:"hook_menu_delete";s:10:"definition";s:32:"function hook_menu_delete($menu)";s:11:"description";s:47:"Informs modules that a custom menu was deleted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"menu";s:9:"file_path";s:27:"public://hooks/menu.api.php";s:4:"body";s:185:"
  // Delete the record from our variable.
  $my_menus = variable_get('my_module_menus', array());
  unset($my_menus[$menu['menu_name']]);
  variable_set('my_module_menus', $my_menus);
";}}s:4:"node";a:32:{i:0;a:7:{s:4:"name";s:16:"hook_node_grants";s:10:"definition";s:40:"function hook_node_grants($account, $op)";s:11:"description";s:60:"Inform the node access system what permissions the user has.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:166:"
  if (user_access('access private content', $account)) {
    $grants['example'] = array(1);
  }
  $grants['example_owner'] = array($account->uid);
  return $grants;
";}i:1;a:7:{s:4:"name";s:24:"hook_node_access_records";s:10:"definition";s:40:"function hook_node_access_records($node)";s:11:"description";s:57:"Set permissions for a node to be written to the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:1017:"
  // We only care about the node if it has been marked private. If not, it is
  // treated just like any other node and we completely ignore it.
  if ($node->private) {
    $grants = array();
    // Only published nodes should be viewable to all users. If we allow access
    // blindly here, then all users could view an unpublished node.
    if ($node->status) {
      $grants[] = array(
        'realm' => 'example',
        'gid' => 1,
        'grant_view' => 1,
        'grant_update' => 0,
        'grant_delete' => 0,
        'priority' => 0,
      );
    }
    // For the example_author array, the GID is equivalent to a UID, which
    // means there are many groups of just 1 user.
    // Note that an author can always view his or her nodes, even if they
    // have status unpublished.
    $grants[] = array(
      'realm' => 'example_author',
      'gid' => $node->uid,
      'grant_view' => 1,
      'grant_update' => 1,
      'grant_delete' => 1,
      'priority' => 0,
    );

    return $grants;
  }
";}i:2;a:7:{s:4:"name";s:30:"hook_node_access_records_alter";s:10:"definition";s:56:"function hook_node_access_records_alter(&$grants, $node)";s:11:"description";s:66:"Alter permissions for a node before it is written to the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:526:"
  // Our module allows editors to mark specific articles with the 'is_preview'
  // field. If the node being saved has a TRUE value for that field, then only
  // our grants are retained, and other grants are removed. Doing so ensures
  // that our rules are enforced no matter what priority other grants are given.
  if ($node->is_preview) {
    // Our module grants are set in $grants['example'].
    $temp = $grants['example'];
    // Now remove all module grants but our own.
    $grants = array('example' => $temp);
  }
";}i:3;a:7:{s:4:"name";s:22:"hook_node_grants_alter";s:10:"definition";s:56:"function hook_node_grants_alter(&$grants, $account, $op)";s:11:"description";s:67:"Alter user access rules when trying to view, edit or delete a node.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:611:"
  // Our sample module never allows certain roles to edit or delete
  // content. Since some other node access modules might allow this
  // permission, we expressly remove it by returning an empty $grants
  // array for roles specified in our variable setting.

  // Get our list of banned roles.
  $restricted = variable_get('example_restricted_roles', array());

  if ($op != 'view' && !empty($restricted)) {
    // Now check the roles for this account against the restrictions.
    foreach ($restricted as $role_id) {
      if (isset($user->roles[$role_id])) {
        $grants = array();
      }
    }
  }
";}i:4;a:7:{s:4:"name";s:20:"hook_node_operations";s:10:"definition";s:31:"function hook_node_operations()";s:11:"description";s:25:"Add mass node operations.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:1484:"
  $operations = array(
    'publish' => array(
      'label' => t('Publish selected content'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('status' => NODE_PUBLISHED)),
    ),
    'unpublish' => array(
      'label' => t('Unpublish selected content'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('status' => NODE_NOT_PUBLISHED)),
    ),
    'promote' => array(
      'label' => t('Promote selected content to front page'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('status' => NODE_PUBLISHED, 'promote' => NODE_PROMOTED)),
    ),
    'demote' => array(
      'label' => t('Demote selected content from front page'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('promote' => NODE_NOT_PROMOTED)),
    ),
    'sticky' => array(
      'label' => t('Make selected content sticky'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('status' => NODE_PUBLISHED, 'sticky' => NODE_STICKY)),
    ),
    'unsticky' => array(
      'label' => t('Make selected content not sticky'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('sticky' => NODE_NOT_STICKY)),
    ),
    'delete' => array(
      'label' => t('Delete selected content'),
      'callback' => NULL,
    ),
  );
  return $operations;
";}i:5;a:7:{s:4:"name";s:16:"hook_node_delete";s:10:"definition";s:32:"function hook_node_delete($node)";s:11:"description";s:25:"Respond to node deletion.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:76:"
  db_delete('mytable')
    ->condition('nid', $node->nid)
    ->execute();
";}i:6;a:7:{s:4:"name";s:25:"hook_node_revision_delete";s:10:"definition";s:41:"function hook_node_revision_delete($node)";s:11:"description";s:39:"Respond to deletion of a node revision.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:76:"
  db_delete('mytable')
    ->condition('vid', $node->vid)
    ->execute();
";}i:7;a:7:{s:4:"name";s:16:"hook_node_insert";s:10:"definition";s:32:"function hook_node_insert($node)";s:11:"description";s:34:"Respond to creation of a new node.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:126:"
  db_insert('mytable')
    ->fields(array(
      'nid' => $node->nid,
      'extra' => $node->extra,
    ))
    ->execute();
";}i:8;a:7:{s:4:"name";s:14:"hook_node_load";s:10:"definition";s:39:"function hook_node_load($nodes, $types)";s:11:"description";s:44:"Act on nodes being loaded from the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:198:"
  $result = db_query('SELECT nid, foo FROM {mytable} WHERE nid IN(:nids)', array(':nids' => array_keys($nodes)));
  foreach ($result as $record) {
    $nodes[$record->nid]->foo = $record->foo;
  }
";}i:9;a:7:{s:4:"name";s:16:"hook_node_access";s:10:"definition";s:47:"function hook_node_access($node, $op, $account)";s:11:"description";s:25:"Control access to a node.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:826:"
  $type = is_string($node) ? $node : $node->type;

  if (in_array($type, node_permissions_get_configured_types())) {
    if ($op == 'create' && user_access('create ' . $type . ' content', $account)) {
      return NODE_ACCESS_ALLOW;
    }

    if ($op == 'update') {
      if (user_access('edit any ' . $type . ' content', $account) || (user_access('edit own ' . $type . ' content', $account) && ($account->uid == $node->uid))) {
        return NODE_ACCESS_ALLOW;
      }
    }

    if ($op == 'delete') {
      if (user_access('delete any ' . $type . ' content', $account) || (user_access('delete own ' . $type . ' content', $account) && ($account->uid == $node->uid))) {
        return NODE_ACCESS_ALLOW;
      }
    }
  }

  // Returning nothing from this function would have the same effect.
  return NODE_ACCESS_IGNORE;
";}i:10;a:7:{s:4:"name";s:17:"hook_node_prepare";s:10:"definition";s:33:"function hook_node_prepare($node)";s:11:"description";s:60:"Act on a node object about to be shown on the add/edit form.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:114:"
  if (!isset($node->comment)) {
    $node->comment = variable_get("comment_$node->type", COMMENT_NODE_OPEN);
  }
";}i:11;a:7:{s:4:"name";s:23:"hook_node_search_result";s:10:"definition";s:39:"function hook_node_search_result($node)";s:11:"description";s:49:"Act on a node being displayed as a search result.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:226:"
  $comments = db_query('SELECT comment_count FROM {node_comment_statistics} WHERE nid = :nid', array('nid' => $node->nid))->fetchField();
  return array('comment' => format_plural($comments, '1 comment', '@count comments'));
";}i:12;a:7:{s:4:"name";s:17:"hook_node_presave";s:10:"definition";s:33:"function hook_node_presave($node)";s:11:"description";s:40:"Act on a node being inserted or updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:152:"
  if ($node->nid && $node->moderate) {
    // Reset votes when node is updated:
    $node->score = 0;
    $node->users = '';
    $node->votes = 0;
  }
";}i:13;a:7:{s:4:"name";s:16:"hook_node_update";s:10:"definition";s:32:"function hook_node_update($node)";s:11:"description";s:29:"Respond to updates to a node.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:121:"
  db_update('mytable')
    ->fields(array('extra' => $node->extra))
    ->condition('nid', $node->nid)
    ->execute();
";}i:14;a:7:{s:4:"name";s:22:"hook_node_update_index";s:10:"definition";s:38:"function hook_node_update_index($node)";s:11:"description";s:42:"Act on a node being indexed for searching.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:370:"
  $text = '';
  $comments = db_query('SELECT subject, comment, format FROM {comment} WHERE nid = :nid AND status = :status', array(':nid' => $node->nid, ':status' => COMMENT_PUBLISHED));
  foreach ($comments as $comment) {
    $text .= '<h2>' . check_plain($comment->subject) . '</h2>' . check_markup($comment->comment, $comment->format, '', TRUE);
  }
  return $text;
";}i:15;a:7:{s:4:"name";s:18:"hook_node_validate";s:10:"definition";s:55:"function hook_node_validate($node, $form, &$form_state)";s:11:"description";s:60:"Perform node validation before a node is created or updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:173:"
  if (isset($node->end) && isset($node->start)) {
    if ($node->start > $node->end) {
      form_set_error('time', t('An event may not end before it starts.'));
    }
  }
";}i:16;a:7:{s:4:"name";s:16:"hook_node_submit";s:10:"definition";s:53:"function hook_node_submit($node, $form, &$form_state)";s:11:"description";s:65:"Act on a node after validated form values have been copied to it.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:310:"
  // Decompose the selected menu parent option into 'menu_name' and 'plid', if
  // the form used the default parent selection widget.
  if (!empty($form_state['values']['menu']['parent'])) {
    list($node->menu['menu_name'], $node->menu['plid']) = explode(':', $form_state['values']['menu']['parent']);
  }
";}i:17;a:7:{s:4:"name";s:14:"hook_node_view";s:10:"definition";s:53:"function hook_node_view($node, $view_mode, $langcode)";s:11:"description";s:55:"Act on a node that is being assembled before rendering.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:160:"
  $node->content['my_additional_field'] = array(
    '#markup' => $additional_field,
    '#weight' => 10,
    '#theme' => 'mymodule_my_additional_field',
  );
";}i:18;a:7:{s:4:"name";s:20:"hook_node_view_alter";s:10:"definition";s:38:"function hook_node_view_alter(&$build)";s:11:"description";s:33:"Alter the results of node_view().";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:297:"
  if ($build['#view_mode'] == 'full' && isset($build['an_additional_field'])) {
    // Change its weight.
    $build['an_additional_field']['#weight'] = -10;
  }

  // Add a #post_render callback to act on the rendered HTML of the node.
  $build['#post_render'][] = 'my_module_node_post_render';
";}i:19;a:7:{s:4:"name";s:14:"hook_node_info";s:10:"definition";s:25:"function hook_node_info()";s:11:"description";s:34:"Define module-provided node types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:194:"
  return array(
    'blog' => array(
      'name' => t('Blog entry'),
      'base' => 'blog',
      'description' => t('Use for multi-user blogs. Every user gets a personal blog.'),
    )
  );
";}i:20;a:7:{s:4:"name";s:12:"hook_ranking";s:10:"definition";s:23:"function hook_ranking()";s:11:"description";s:72:"Provide additional methods of scoring for core search results for nodes.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:754:"
  // If voting is disabled, we can avoid returning the array, no hard feelings.
  if (variable_get('vote_node_enabled', TRUE)) {
    return array(
      'vote_average' => array(
        'title' => t('Average vote'),
        // Note that we use i.sid, the search index's search item id, rather than
        // n.nid.
        'join' => 'LEFT JOIN {vote_node_data} vote_node_data ON vote_node_data.nid = i.sid',
        // The highest possible score should be 1, and the lowest possible score,
        // always 0, should be 0.
        'score' => 'vote_node_data.average / CAST(%f AS DECIMAL)',
        // Pass in the highest possible voting score as a decimal argument.
        'arguments' => array(variable_get('vote_score_max', 5)),
      ),
    );
  }
";}i:21;a:7:{s:4:"name";s:21:"hook_node_type_insert";s:10:"definition";s:37:"function hook_node_type_insert($info)";s:11:"description";s:30:"Respond to node type creation.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:1:"
";}i:22;a:7:{s:4:"name";s:21:"hook_node_type_update";s:10:"definition";s:37:"function hook_node_type_update($info)";s:11:"description";s:29:"Respond to node type updates.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:252:"
  if (!empty($info->old_type) && $info->old_type != $info->type) {
    $setting = variable_get('comment_' . $info->old_type, COMMENT_NODE_OPEN);
    variable_del('comment_' . $info->old_type);
    variable_set('comment_' . $info->type, $setting);
  }
";}i:23;a:7:{s:4:"name";s:21:"hook_node_type_delete";s:10:"definition";s:37:"function hook_node_type_delete($info)";s:11:"description";s:30:"Respond to node type deletion.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:43:"
  variable_del('comment_' . $info->type);
";}i:24;a:7:{s:4:"name";s:11:"hook_delete";s:10:"definition";s:27:"function hook_delete($node)";s:11:"description";s:25:"Respond to node deletion.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:76:"
  db_delete('mytable')
    ->condition('nid', $node->nid)
    ->execute();
";}i:25;a:7:{s:4:"name";s:12:"hook_prepare";s:10:"definition";s:28:"function hook_prepare($node)";s:11:"description";s:60:"Act on a node object about to be shown on the add/edit form.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:455:"
  if ($file = file_check_upload($field_name)) {
    $file = file_save_upload($field_name, _image_filename($file->filename, NULL, TRUE));
    if ($file) {
      if (!image_get_info($file->uri)) {
        form_set_error($field_name, t('Uploaded file is not a valid image'));
        return;
      }
    }
    else {
      return;
    }
    $node->images['_original'] = $file->uri;
    _image_build_derivatives($node, TRUE);
    $node->new_file = TRUE;
  }
";}i:26;a:7:{s:4:"name";s:9:"hook_form";s:10:"definition";s:39:"function hook_form($node, &$form_state)";s:11:"description";s:28:"Display a node editing form.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:713:"
  $type = node_type_get_type($node);

  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => check_plain($type->title_label),
    '#default_value' => !empty($node->title) ? $node->title : '',
    '#required' => TRUE, '#weight' => -5
  );

  $form['field1'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom field'),
    '#default_value' => $node->field1,
    '#maxlength' => 127,
  );
  $form['selectbox'] = array(
    '#type' => 'select',
    '#title' => t('Select box'),
    '#default_value' => $node->selectbox,
    '#options' => array(
      1 => 'Option A',
      2 => 'Option B',
      3 => 'Option C',
    ),
    '#description' => t('Choose an option.'),
  );

  return $form;
";}i:27;a:7:{s:4:"name";s:11:"hook_insert";s:10:"definition";s:27:"function hook_insert($node)";s:11:"description";s:34:"Respond to creation of a new node.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:126:"
  db_insert('mytable')
    ->fields(array(
      'nid' => $node->nid,
      'extra' => $node->extra,
    ))
    ->execute();
";}i:28;a:7:{s:4:"name";s:9:"hook_load";s:10:"definition";s:26:"function hook_load($nodes)";s:11:"description";s:44:"Act on nodes being loaded from the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:199:"
  $result = db_query('SELECT nid, foo FROM {mytable} WHERE nid IN (:nids)', array(':nids' => array_keys($nodes)));
  foreach ($result as $record) {
    $nodes[$record->nid]->foo = $record->foo;
  }
";}i:29;a:7:{s:4:"name";s:11:"hook_update";s:10:"definition";s:27:"function hook_update($node)";s:11:"description";s:29:"Respond to updates to a node.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:121:"
  db_update('mytable')
    ->fields(array('extra' => $node->extra))
    ->condition('nid', $node->nid)
    ->execute();
";}i:30;a:7:{s:4:"name";s:13:"hook_validate";s:10:"definition";s:50:"function hook_validate($node, $form, &$form_state)";s:11:"description";s:60:"Perform node validation before a node is created or updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:173:"
  if (isset($node->end) && isset($node->start)) {
    if ($node->start > $node->end) {
      form_set_error('time', t('An event may not end before it starts.'));
    }
  }
";}i:31;a:7:{s:4:"name";s:9:"hook_view";s:10:"definition";s:37:"function hook_view($node, $view_mode)";s:11:"description";s:15:"Display a node.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"node";s:9:"file_path";s:27:"public://hooks/node.api.php";s:4:"body";s:419:"
  if ($view_mode == 'full' && node_is_page($node)) {
    $breadcrumb = array();
    $breadcrumb[] = l(t('Home'), NULL);
    $breadcrumb[] = l(t('Example'), 'example');
    $breadcrumb[] = l($node->field1, 'example/' . $node->field1);
    drupal_set_breadcrumb($breadcrumb);
  }

  $node->content['myfield'] = array(
    '#markup' => theme('mymodule_myfield', $node->myfield),
    '#weight' => 1,
  );

  return $node;
";}}s:6:"openid";a:6:{i:0;a:7:{s:4:"name";s:11:"hook_openid";s:10:"definition";s:35:"function hook_openid($op, $request)";s:11:"description";s:54:"Allow modules to modify the OpenID request parameters.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"openid";s:9:"file_path";s:29:"public://hooks/openid.api.php";s:4:"body";s:115:"
  if ($op == 'request') {
    $request['openid.identity'] = 'http://myname.myopenid.com/';
  }
  return $request;
";}i:1;a:7:{s:4:"name";s:20:"hook_openid_response";s:10:"definition";s:50:"function hook_openid_response($response, $account)";s:11:"description";s:52:"Allow modules to act upon a successful OpenID login.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"openid";s:9:"file_path";s:29:"public://hooks/openid.api.php";s:4:"body";s:99:"
  if (isset($response['openid.ns.ax'])) {
    _mymodule_store_ax_fields($response, $account);
  }
";}i:2;a:7:{s:4:"name";s:33:"hook_openid_discovery_method_info";s:10:"definition";s:44:"function hook_openid_discovery_method_info()";s:11:"description";s:50:"Allow modules to declare OpenID discovery methods.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"openid";s:9:"file_path";s:29:"public://hooks/openid.api.php";s:4:"body";s:74:"
  return array(
    'new_discovery_idea' => '_my_discovery_method',
  );
";}i:3;a:7:{s:4:"name";s:39:"hook_openid_discovery_method_info_alter";s:10:"definition";s:59:"function hook_openid_discovery_method_info_alter(&$methods)";s:11:"description";s:41:"Allow modules to alter discovery methods.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"openid";s:9:"file_path";s:29:"public://hooks/openid.api.php";s:4:"body";s:61:"
  // Remove XRI discovery scheme.
  unset($methods['xri']);
";}i:4;a:7:{s:4:"name";s:37:"hook_openid_normalization_method_info";s:10:"definition";s:48:"function hook_openid_normalization_method_info()";s:11:"description";s:54:"Allow modules to declare OpenID normalization methods.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"openid";s:9:"file_path";s:29:"public://hooks/openid.api.php";s:4:"body";s:82:"
  return array(
    'new_normalization_idea' => '_my_normalization_method',
  );
";}i:5;a:7:{s:4:"name";s:43:"hook_openid_normalization_method_info_alter";s:10:"definition";s:63:"function hook_openid_normalization_method_info_alter(&$methods)";s:11:"description";s:45:"Allow modules to alter normalization methods.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"openid";s:9:"file_path";s:29:"public://hooks/openid.api.php";s:4:"body";s:72:"
  // Remove Google IDP normalization.
  unset($methods['google_idp']);
";}}s:7:"overlay";a:2:{i:0;a:7:{s:4:"name";s:30:"hook_overlay_parent_initialize";s:10:"definition";s:41:"function hook_overlay_parent_initialize()";s:11:"description";s:66:"Allow modules to act when an overlay parent window is initialized.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"overlay";s:9:"file_path";s:30:"public://hooks/overlay.api.php";s:4:"body";s:106:"
  // Add our custom JavaScript.
  drupal_add_js(drupal_get_path('module', 'hook') . '/hook-overlay.js');
";}i:1;a:7:{s:4:"name";s:29:"hook_overlay_child_initialize";s:10:"definition";s:40:"function hook_overlay_child_initialize()";s:11:"description";s:65:"Allow modules to act when an overlay child window is initialized.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"overlay";s:9:"file_path";s:30:"public://hooks/overlay.api.php";s:4:"body";s:112:"
  // Add our custom JavaScript.
  drupal_add_js(drupal_get_path('module', 'hook') . '/hook-overlay-child.js');
";}}s:4:"path";a:3:{i:0;a:7:{s:4:"name";s:16:"hook_path_insert";s:10:"definition";s:32:"function hook_path_insert($path)";s:11:"description";s:50:"Allow modules to respond to a path being inserted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"path";s:9:"file_path";s:27:"public://hooks/path.api.php";s:4:"body";s:130:"
  db_insert('mytable')
    ->fields(array(
      'alias' => $path['alias'],
      'pid' => $path['pid'],
    ))
    ->execute();
";}i:1;a:7:{s:4:"name";s:16:"hook_path_update";s:10:"definition";s:32:"function hook_path_update($path)";s:11:"description";s:49:"Allow modules to respond to a path being updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"path";s:9:"file_path";s:27:"public://hooks/path.api.php";s:4:"body";s:125:"
  db_update('mytable')
    ->fields(array('alias' => $path['alias']))
    ->condition('pid', $path['pid'])
    ->execute();
";}i:2;a:7:{s:4:"name";s:16:"hook_path_delete";s:10:"definition";s:32:"function hook_path_delete($path)";s:11:"description";s:49:"Allow modules to respond to a path being deleted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"path";s:9:"file_path";s:27:"public://hooks/path.api.php";s:4:"body";s:78:"
  db_delete('mytable')
    ->condition('pid', $path['pid'])
    ->execute();
";}}s:8:"pathauto";a:2:{i:0;a:7:{s:4:"name";s:25:"hook_pathauto_alias_alter";s:10:"definition";s:60:"function hook_pathauto_alias_alter(&$alias, array &$context)";s:11:"description";s:47:"Alter Pathauto-generated aliases before saving.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"pathauto";s:9:"file_path";s:31:"public://hooks/pathauto.api.php";s:4:"body";s:194:"
  // Add a suffix so that all aliases get saved as 'content/my-title.html'
  $alias .= '.html';

  // Force all aliases to be saved as language neutral.
  $context['language'] = LANGUAGE_NONE;
";}i:1;a:7:{s:4:"name";s:37:"hook_pathauto_punctuation_chars_alter";s:10:"definition";s:67:"function hook_pathauto_punctuation_chars_alter(array &$punctuation)";s:11:"description";s:62:"Alter the list of punctuation characters for Pathauto control.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"pathauto";s:9:"file_path";s:31:"public://hooks/pathauto.api.php";s:4:"body";s:183:"
  // Add the trademark symbol.
  $punctuation['trademark'] = array('value' => '™', 'name' => t('Trademark symbol'));

  // Remove the dollar sign.
  unset($punctuation['dollar']);
";}}s:3:"rdf";a:2:{i:0;a:7:{s:4:"name";s:16:"hook_rdf_mapping";s:10:"definition";s:27:"function hook_rdf_mapping()";s:11:"description";s:55:"Allow modules to define RDF mappings for field bundles.";s:11:"destination";s:14:"%module.module";s:5:"group";s:3:"rdf";s:9:"file_path";s:26:"public://hooks/rdf.api.php";s:4:"body";s:713:"
  return array(
    array(
      'type' => 'node',
      'bundle' => 'blog',
      'mapping' => array(
        'rdftype' => array('sioct:Weblog'),
        'title' => array(
          'predicates' => array('dc:title'),
        ),
        'created' => array(
          'predicates' => array('dc:date', 'dc:created'),
          'datatype' => 'xsd:dateTime',
          'callback' => 'date_iso8601',
        ),
        'body' => array(
          'predicates' => array('content:encoded'),
        ),
        'uid' => array(
          'predicates' => array('sioc:has_creator'),
          'type' => 'rel',
        ),
        'name' => array(
          'predicates' => array('foaf:name'),
        ),
      ),
    ),
  );
";}i:1;a:7:{s:4:"name";s:19:"hook_rdf_namespaces";s:10:"definition";s:30:"function hook_rdf_namespaces()";s:11:"description";s:52:"Allow modules to define namespaces for RDF mappings.";s:11:"destination";s:14:"%module.module";s:5:"group";s:3:"rdf";s:9:"file_path";s:26:"public://hooks/rdf.api.php";s:4:"body";s:485:"
  return array(
    'content'  => 'http://purl.org/rss/1.0/modules/content/',
    'dc'       => 'http://purl.org/dc/terms/',
    'foaf'     => 'http://xmlns.com/foaf/0.1/',
    'og'       => 'http://ogp.me/ns#',
    'rdfs'     => 'http://www.w3.org/2000/01/rdf-schema#',
    'sioc'     => 'http://rdfs.org/sioc/ns#',
    'sioct'    => 'http://rdfs.org/sioc/types#',
    'skos'     => 'http://www.w3.org/2004/02/skos/core#',
    'xsd'      => 'http://www.w3.org/2001/XMLSchema#',
  );
";}}s:5:"rules";a:28:{i:0;a:7:{s:4:"name";s:22:"hook_rules_action_info";s:10:"definition";s:33:"function hook_rules_action_info()";s:11:"description";s:32:"Define rules compatible actions.";s:11:"destination";s:17:"%module.rules.inc";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:409:"
  return array(
    'mail_user' => array(
      'label' => t('Send a mail to a user'),
      'parameter' => array(
        'user' => array('type' => 'user', 'label' => t('Recipient')),
      ),
      'group' => t('System'),
      'base' => 'rules_action_mail_user',
      'callbacks' => array(
        'validate' => 'rules_action_custom_validation',
        'help' => 'rules_mail_help',
      ),
    ),
  );
";}i:1;a:7:{s:4:"name";s:20:"hook_rules_file_info";s:10:"definition";s:31:"function hook_rules_file_info()";s:11:"description";s:48:"Specify files containing rules integration code.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:42:"
  return array('yourmodule.rules-eval');
";}i:2;a:7:{s:4:"name";s:25:"hook_rules_condition_info";s:10:"definition";s:36:"function hook_rules_condition_info()";s:11:"description";s:24:"Define rules conditions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:318:"
  return array(
    'rules_condition_text_compare' => array(
      'label' => t('Textual comparison'),
      'parameter' => array(
        'text1' => array('label' => t('Text 1'), 'type' => 'text'),
        'text2' => array('label' => t('Text 2'), 'type' => 'text'),
      ),
      'group' => t('Rules'),
    ),
  );
";}i:3;a:7:{s:4:"name";s:21:"hook_rules_event_info";s:10:"definition";s:32:"function hook_rules_event_info()";s:11:"description";s:20:"Define rules events.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:1192:"
  $items = array(
    'node_insert' => array(
      'label' => t('After saving new content'),
      'group' => t('Node'),
      'variables' => rules_events_node_variables(t('created content')),
    ),
    'node_update' => array(
      'label' => t('After updating existing content'),
      'group' => t('Node'),
      'variables' => rules_events_node_variables(t('updated content'), TRUE),
    ),
    'node_presave' => array(
      'label' => t('Content is going to be saved'),
      'group' => t('Node'),
      'variables' => rules_events_node_variables(t('saved content'), TRUE),
    ),
    'node_view' => array(
      'label' => t('Content is going to be viewed'),
      'group' => t('Node'),
      'variables' => rules_events_node_variables(t('viewed content')) + array(
        'view_mode' => array('type' => 'text', 'label' => t('view mode')),
      ),
    ),
    'node_delete' => array(
      'label' => t('After deleting content'),
      'group' => t('Node'),
      'variables' => rules_events_node_variables(t('deleted content')),
    ),
  );
  // Specify that on presave the node is saved anyway.
  $items['node_presave']['variables']['node']['skip save'] = TRUE;
  return $items;
";}i:4;a:7:{s:4:"name";s:20:"hook_rules_data_info";s:10:"definition";s:31:"function hook_rules_data_info()";s:11:"description";s:24:"Define rules data types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:428:"
  return array(
    'node' => array(
      'label' => t('content'),
      'parent' => 'entity',
      'group' => t('Node'),
    ),
    // Formatted text as used by in hook_entity_property_info() for text fields.
    'text_formatted' => array(
      'label' => t('formatted text'),
      'ui class' => 'RulesDataUITextFormatted',
      'wrap' => TRUE,
      'property info' => entity_property_text_formatted_info(),
    ),
  );
";}i:5;a:7:{s:4:"name";s:22:"hook_rules_plugin_info";s:10:"definition";s:33:"function hook_rules_plugin_info()";s:11:"description";s:22:"Defines rules plugins.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:595:"
  return array(
    'or' => array(
      'label' => t('Condition set (OR)'),
      'class' => 'RulesOr',
      'embeddable' => 'RulesConditionContainer',
      'component' => TRUE,
      'extenders' => array(
        'RulesPluginUIInterface' => array(
          'class' => 'RulesConditionContainerUI',
        ),
      ),
    ),
    'rule' => array(
      'class' => 'Rule',
      'embeddable' => 'RulesRuleSet',
      'extenders' => array(
        'RulesPluginUIInterface' => array(
          'class' => 'RulesRuleUI',
        ),
      ),
      'import keys' => array('DO', 'IF'),
    ),
  );
";}i:6;a:7:{s:4:"name";s:25:"hook_rules_evaluator_info";s:10:"definition";s:36:"function hook_rules_evaluator_info()";s:11:"description";s:40:"Declare provided rules input evaluators.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:151:"
  return array(
    'token' => array(
      'class' => 'RulesTokenEvaluator',
      'type' => array('text', 'uri'),
      'weight' => 0,
     ),
  );
";}i:7;a:7:{s:4:"name";s:30:"hook_rules_data_processor_info";s:10:"definition";s:41:"function hook_rules_data_processor_info()";s:11:"description";s:39:"Declare provided rules data processors.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:149:"
  return array(
    'date_offset' => array(
      'class' => 'RulesDateOffsetProcessor',
      'type' => 'date',
      'weight' => -2,
     ),
  );
";}i:8;a:7:{s:4:"name";s:28:"hook_rules_action_info_alter";s:10:"definition";s:48:"function hook_rules_action_info_alter(&$actions)";s:11:"description";s:31:"Alter rules compatible actions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:232:"
  // The rules action is more powerful, so hide the core action
  unset($actions['rules_core_node_assign_owner_action']);
  // We prefer handling saving by rules - not by the user.
  unset($actions['rules_core_node_save_action']);
";}i:9;a:7:{s:4:"name";s:31:"hook_rules_condition_info_alter";s:10:"definition";s:54:"function hook_rules_condition_info_alter(&$conditions)";s:11:"description";s:23:"Alter rules conditions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:25:"
  // Change conditions.
";}i:10;a:7:{s:4:"name";s:27:"hook_rules_event_info_alter";s:10:"definition";s:46:"function hook_rules_event_info_alter(&$events)";s:11:"description";s:19:"Alter rules events.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:21:"
  // Change events.
";}i:11;a:7:{s:4:"name";s:26:"hook_rules_data_info_alter";s:10:"definition";s:48:"function hook_rules_data_info_alter(&$data_info)";s:11:"description";s:23:"Alter rules data types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:25:"
  // Change data types.
";}i:12;a:7:{s:4:"name";s:28:"hook_rules_plugin_info_alter";s:10:"definition";s:52:"function hook_rules_plugin_info_alter(&$plugin_info)";s:11:"description";s:24:"Alter rules plugin info.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:26:"
  // Change plugin info.
";}i:13;a:7:{s:4:"name";s:31:"hook_rules_evaluator_info_alter";s:10:"definition";s:58:"function hook_rules_evaluator_info_alter(&$evaluator_info)";s:11:"description";s:33:"Alter rules input evaluator info.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:29:"
  // Change evaluator info.
";}i:14;a:7:{s:4:"name";s:36:"hook_rules_data_processor_info_alter";s:10:"definition";s:63:"function hook_rules_data_processor_info_alter(&$processor_info)";s:11:"description";s:32:"Alter rules data_processor info.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:29:"
  // Change processor info.
";}i:15;a:7:{s:4:"name";s:22:"hook_rules_config_load";s:10:"definition";s:41:"function hook_rules_config_load($configs)";s:11:"description";s:58:"Act on rules configuration being loaded from the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:197:"
  $result = db_query('SELECT id, foo FROM {mytable} WHERE id IN(:ids)', array(':ids' => array_keys($configs)));
  foreach ($result as $record) {
    $configs[$record->id]->foo = $record->foo;
  }
";}i:16;a:7:{s:4:"name";s:24:"hook_rules_config_insert";s:10:"definition";s:42:"function hook_rules_config_insert($config)";s:11:"description";s:49:"Respond to creation of a new rules configuration.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:131:"
  db_insert('mytable')
    ->fields(array(
      'nid' => $config->id,
      'plugin' => $config->plugin,
    ))
    ->execute();
";}i:17;a:7:{s:4:"name";s:25:"hook_rules_config_presave";s:10:"definition";s:43:"function hook_rules_config_presave($config)";s:11:"description";s:55:"Act on a rules configuration being inserted or updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:130:"
  if ($config->id && $config->module == 'yours') {
    // Add custom condition.
    $config->conditon(/* Your condition */);
  }
";}i:18;a:7:{s:4:"name";s:24:"hook_rules_config_update";s:10:"definition";s:42:"function hook_rules_config_update($config)";s:11:"description";s:44:"Respond to updates to a rules configuration.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:125:"
  db_update('mytable')
    ->fields(array('plugin' => $config->plugin))
    ->condition('id', $config->id)
    ->execute();
";}i:19;a:7:{s:4:"name";s:24:"hook_rules_config_delete";s:10:"definition";s:42:"function hook_rules_config_delete($config)";s:11:"description";s:40:"Respond to rules configuration deletion.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:76:"
  db_delete('mytable')
    ->condition('id', $config->id)
    ->execute();
";}i:20;a:7:{s:4:"name";s:25:"hook_rules_config_execute";s:10:"definition";s:43:"function hook_rules_config_execute($config)";s:11:"description";s:41:"Respond to rules configuration execution.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:2:"

";}i:21;a:7:{s:4:"name";s:32:"hook_default_rules_configuration";s:10:"definition";s:43:"function hook_default_rules_configuration()";s:11:"description";s:36:"Define default rules configurations.";s:11:"destination";s:25:"%module.rules_default.inc";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:475:"
  $rule = rules_reaction_rule();
  $rule->label = 'example default rule';
  $rule->active = FALSE;
  $rule->event('node_update')
       ->condition(rules_condition('data_is', array('data:select' => 'node:status', 'value' => TRUE))->negate())
       ->condition('data_is', array('data:select' => 'node:type', 'value' => 'page'))
       ->action('drupal_message', array('message' => 'A node has been updated.'));

  $configs['rules_test_default_1'] = $rule;
  return $config;
";}i:22;a:7:{s:4:"name";s:38:"hook_default_rules_configuration_alter";s:10:"definition";s:58:"function hook_default_rules_configuration_alter(&$configs)";s:11:"description";s:35:"Alter default rules configurations.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:65:"
  // Add custom condition.
  $configs['foo']->condition('bar');
";}i:23;a:7:{s:4:"name";s:26:"hook_rules_component_alter";s:10:"definition";s:68:"function hook_rules_component_alter($plugin, RulesPlugin $component)";s:11:"description";s:40:"Alter rules components before execution.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:2:"

";}i:24;a:7:{s:4:"name";s:26:"hook_rules_event_set_alter";s:10:"definition";s:74:"function hook_rules_event_set_alter($event_name, RulesEventSet $event_set)";s:11:"description";s:18:"Alters event sets.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:2:"

";}i:25;a:7:{s:4:"name";s:39:"hook_rules_action_base_upgrade_map_name";s:10:"definition";s:58:"function hook_rules_action_base_upgrade_map_name($element)";s:11:"description";s:70:"D6 to D7 upgrade procedure hook for mapping action or condition names.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:22:"
  return 'data_set';
";}i:26;a:7:{s:4:"name";s:30:"hook_rules_action_base_upgrade";s:10:"definition";s:70:"function hook_rules_action_base_upgrade($element, RulesPlugin $target)";s:11:"description";s:78:"D6 to D7 upgrade procedure hook for mapping action or condition configuration.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:160:"
  $target->settings['data:select'] = $element['#settings']['#argument map']['node'] . ':title';
  $target->settings['value'] = $element['#settings']['title'];
";}i:27;a:7:{s:4:"name";s:32:"hook_rules_element_upgrade_alter";s:10:"definition";s:60:"function hook_rules_element_upgrade_alter($element, $target)";s:11:"description";s:78:"D6 to D7 upgrade procedure hook for mapping action or condition configuration.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"rules";s:9:"file_path";s:28:"public://hooks/rules.api.php";s:4:"body";s:2:"

";}}s:6:"search";a:9:{i:0;a:7:{s:4:"name";s:16:"hook_search_info";s:10:"definition";s:27:"function hook_search_info()";s:11:"description";s:28:"Define a custom search type.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"search";s:9:"file_path";s:29:"public://hooks/search.api.php";s:4:"body";s:136:"
  return array(
    'title' => 'Content',
    'path' => 'node',
    'conditions_callback' => 'sample_search_conditions_callback',
  );
";}i:1;a:7:{s:4:"name";s:18:"hook_search_access";s:10:"definition";s:29:"function hook_search_access()";s:11:"description";s:41:"Define access to a custom search routine.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"search";s:9:"file_path";s:29:"public://hooks/search.api.php";s:4:"body";s:41:"
  return user_access('access content');
";}i:2;a:7:{s:4:"name";s:17:"hook_search_reset";s:10:"definition";s:28:"function hook_search_reset()";s:11:"description";s:57:"Take action when the search index is going to be rebuilt.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"search";s:9:"file_path";s:29:"public://hooks/search.api.php";s:4:"body";s:127:"
  db_update('search_dataset')
    ->fields(array('reindex' => REQUEST_TIME))
    ->condition('type', 'node')
    ->execute();
";}i:3;a:7:{s:4:"name";s:18:"hook_search_status";s:10:"definition";s:29:"function hook_search_status()";s:11:"description";s:30:"Report the status of indexing.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"search";s:9:"file_path";s:29:"public://hooks/search.api.php";s:4:"body";s:339:"
  $total = db_query('SELECT COUNT(*) FROM {node} WHERE status = 1')->fetchField();
  $remaining = db_query("SELECT COUNT(*) FROM {node} n LEFT JOIN {search_dataset} d ON d.type = 'node' AND d.sid = n.nid WHERE n.status = 1 AND d.sid IS NULL OR d.reindex <> 0")->fetchField();
  return array('remaining' => $remaining, 'total' => $total);
";}i:4;a:7:{s:4:"name";s:17:"hook_search_admin";s:10:"definition";s:28:"function hook_search_admin()";s:11:"description";s:41:"Add elements to the search settings form.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"search";s:9:"file_path";s:29:"public://hooks/search.api.php";s:4:"body";s:1020:"
  // Output form for defining rank factor weights.
  $form['content_ranking'] = array(
    '#type' => 'fieldset',
    '#title' => t('Content ranking'),
  );
  $form['content_ranking']['#theme'] = 'node_search_admin';
  $form['content_ranking']['info'] = array(
    '#value' => '<em>' . t('The following numbers control which properties the content search should favor when ordering the results. Higher numbers mean more influence, zero means the property is ignored. Changing these numbers does not require the search index to be rebuilt. Changes take effect immediately.') . '</em>'
  );

  // Note: reversed to reflect that higher number = higher ranking.
  $options = drupal_map_assoc(range(0, 10));
  foreach (module_invoke_all('ranking') as $var => $values) {
    $form['content_ranking']['factors']['node_rank_' . $var] = array(
      '#title' => $values['title'],
      '#type' => 'select',
      '#options' => $options,
      '#default_value' => variable_get('node_rank_' . $var, 0),
    );
  }
  return $form;
";}i:5;a:7:{s:4:"name";s:19:"hook_search_execute";s:10:"definition";s:62:"function hook_search_execute($keys = NULL, $conditions = NULL)";s:11:"description";s:40:"Execute a search for a set of key words.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"search";s:9:"file_path";s:29:"public://hooks/search.api.php";s:4:"body";s:1732:"
  // Build matching conditions
  $query = db_select('search_index', 'i', array('target' => 'slave'))->extend('SearchQuery')->extend('PagerDefault');
  $query->join('node', 'n', 'n.nid = i.sid');
  $query
    ->condition('n.status', 1)
    ->addTag('node_access')
    ->searchExpression($keys, 'node');

  // Insert special keywords.
  $query->setOption('type', 'n.type');
  $query->setOption('language', 'n.language');
  if ($query->setOption('term', 'ti.tid')) {
    $query->join('taxonomy_index', 'ti', 'n.nid = ti.nid');
  }
  // Only continue if the first pass query matches.
  if (!$query->executeFirstPass()) {
    return array();
  }

  // Add the ranking expressions.
  _node_rankings($query);

  // Load results.
  $find = $query
    ->limit(10)
    ->execute();
  $results = array();
  foreach ($find as $item) {
    // Build the node body.
    $node = node_load($item->sid);
    node_build_content($node, 'search_result');
    $node->body = drupal_render($node->content);

    // Fetch comments for snippet.
    $node->rendered .= ' ' . module_invoke('comment', 'node_update_index', $node);
    // Fetch terms for snippet.
    $node->rendered .= ' ' . module_invoke('taxonomy', 'node_update_index', $node);

    $extra = module_invoke_all('node_search_result', $node);

    $results[] = array(
      'link' => url('node/' . $item->sid, array('absolute' => TRUE)),
      'type' => check_plain(node_type_get_name($node)),
      'title' => $node->title,
      'user' => theme('username', array('account' => $node)),
      'date' => $node->changed,
      'node' => $node,
      'extra' => $extra,
      'score' => $item->calculated_score,
      'snippet' => search_excerpt($keys, $node->body),
    );
  }
  return $results;
";}i:6;a:7:{s:4:"name";s:16:"hook_search_page";s:10:"definition";s:35:"function hook_search_page($results)";s:11:"description";s:41:"Override the rendering of search results.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"search";s:9:"file_path";s:29:"public://hooks/search.api.php";s:4:"body";s:310:"
  $output['prefix']['#markup'] = '<ol class="search-results">';

  foreach ($results as $entry) {
    $output[] = array(
      '#theme' => 'search_result',
      '#result' => $entry,
      '#module' => 'my_module_name',
    );
  }
  $output['suffix']['#markup'] = '</ol>' . theme('pager');

  return $output;
";}i:7;a:7:{s:4:"name";s:22:"hook_search_preprocess";s:10:"definition";s:38:"function hook_search_preprocess($text)";s:11:"description";s:27:"Preprocess text for search.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"search";s:9:"file_path";s:29:"public://hooks/search.api.php";s:4:"body";s:45:"
  // Do processing on $text
  return $text;
";}i:8;a:7:{s:4:"name";s:17:"hook_update_index";s:10:"definition";s:28:"function hook_update_index()";s:11:"description";s:40:"Update the search index for this module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"search";s:9:"file_path";s:29:"public://hooks/search.api.php";s:4:"body";s:932:"
  $limit = (int)variable_get('search_cron_limit', 100);

  $result = db_query_range("SELECT n.nid FROM {node} n LEFT JOIN {search_dataset} d ON d.type = 'node' AND d.sid = n.nid WHERE d.sid IS NULL OR d.reindex <> 0 ORDER BY d.reindex ASC, n.nid ASC", 0, $limit);

  foreach ($result as $node) {
    $node = node_load($node->nid);

    // Save the changed time of the most recent indexed node, for the search
    // results half-life calculation.
    variable_set('node_cron_last', $node->changed);

    // Render the node.
    node_build_content($node, 'search_index');
    $node->rendered = drupal_render($node->content);

    $text = '<h1>' . check_plain($node->title) . '</h1>' . $node->rendered;

    // Fetch extra data normally not visible
    $extra = module_invoke_all('node_update_index', $node);
    foreach ($extra as $t) {
      $text .= $t;
    }

    // Update index
    search_index($node->nid, 'node', $text);
  }
";}}s:8:"shortcut";a:1:{i:0;a:7:{s:4:"name";s:25:"hook_shortcut_default_set";s:10:"definition";s:44:"function hook_shortcut_default_set($account)";s:11:"description";s:72:"Return the name of a default shortcut set for the provided user account.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"shortcut";s:9:"file_path";s:31:"public://hooks/shortcut.api.php";s:4:"body";s:209:"
  // Use a special set of default shortcuts for administrators only.
  if (in_array(variable_get('user_admin_role', 0), $account->roles)) {
    return variable_get('mymodule_shortcut_admin_default_set');
  }
";}}s:10:"simpletest";a:4:{i:0;a:7:{s:4:"name";s:21:"hook_simpletest_alter";s:10:"definition";s:40:"function hook_simpletest_alter(&$groups)";s:11:"description";s:24:"Alter the list of tests.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"simpletest";s:9:"file_path";s:33:"public://hooks/simpletest.api.php";s:4:"body";s:220:"
  // An alternative session handler module would not want to run the original
  // Session https handling test because it checks the sessions table in the
  // database.
  unset($groups['Session']['testHttpsSession']);
";}i:1;a:7:{s:4:"name";s:23:"hook_test_group_started";s:10:"definition";s:34:"function hook_test_group_started()";s:11:"description";s:25:"A test group has started.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"simpletest";s:9:"file_path";s:33:"public://hooks/simpletest.api.php";s:4:"body";s:1:"
";}i:2;a:7:{s:4:"name";s:24:"hook_test_group_finished";s:10:"definition";s:35:"function hook_test_group_finished()";s:11:"description";s:26:"A test group has finished.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"simpletest";s:9:"file_path";s:33:"public://hooks/simpletest.api.php";s:4:"body";s:1:"
";}i:3;a:7:{s:4:"name";s:18:"hook_test_finished";s:10:"definition";s:37:"function hook_test_finished($results)";s:11:"description";s:32:"An individual test has finished.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"simpletest";s:9:"file_path";s:33:"public://hooks/simpletest.api.php";s:4:"body";s:1:"
";}}s:6:"system";a:124:{i:0;a:7:{s:4:"name";s:14:"hook_hook_info";s:10:"definition";s:25:"function hook_hook_info()";s:11:"description";s:55:"Defines one or more hooks that are exposed by a module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:138:"
  $hooks['token_info'] = array(
    'group' => 'tokens',
  );
  $hooks['tokens'] = array(
    'group' => 'tokens',
  );
  return $hooks;
";}i:1;a:7:{s:4:"name";s:20:"hook_hook_info_alter";s:10:"definition";s:38:"function hook_hook_info_alter(&$hooks)";s:11:"description";s:40:"Alter information from hook_hook_info().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:205:"
  // Our module wants to completely override the core tokens, so make
  // sure the core token hooks are not found.
  $hooks['token_info']['group'] = 'mytokens';
  $hooks['tokens']['group'] = 'mytokens';
";}i:2;a:7:{s:4:"name";s:16:"hook_entity_info";s:10:"definition";s:27:"function hook_entity_info()";s:11:"description";s:72:"Inform the base system and the Field API about one or more entity types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1939:"
  $return = array(
    'node' => array(
      'label' => t('Node'),
      'controller class' => 'NodeController',
      'base table' => 'node',
      'revision table' => 'node_revision',
      'uri callback' => 'node_uri',
      'fieldable' => TRUE,
      'translation' => array(
        'locale' => TRUE,
      ),
      'entity keys' => array(
        'id' => 'nid',
        'revision' => 'vid',
        'bundle' => 'type',
      ),
      'bundle keys' => array(
        'bundle' => 'type',
      ),
      'bundles' => array(),
      'view modes' => array(
        'full' => array(
          'label' => t('Full content'),
          'custom settings' => FALSE,
        ),
        'teaser' => array(
          'label' => t('Teaser'),
          'custom settings' => TRUE,
        ),
        'rss' => array(
          'label' => t('RSS'),
          'custom settings' => FALSE,
        ),
      ),
    ),
  );

  // Search integration is provided by node.module, so search-related
  // view modes for nodes are defined here and not in search.module.
  if (module_exists('search')) {
    $return['node']['view modes'] += array(
      'search_index' => array(
        'label' => t('Search index'),
        'custom settings' => FALSE,
      ),
      'search_result' => array(
        'label' => t('Search result'),
        'custom settings' => FALSE,
      ),
    );
  }

  // Bundles must provide a human readable name so we can create help and error
  // messages, and the path to attach Field admin pages to.
  foreach (node_type_get_names() as $type => $name) {
    $return['node']['bundles'][$type] = array(
      'label' => $name,
      'admin' => array(
        'path' => 'admin/structure/types/manage/%node_type',
        'real path' => 'admin/structure/types/manage/' . str_replace('_', '-', $type),
        'bundle argument' => 4,
        'access arguments' => array('administer content types'),
      ),
    );
  }

  return $return;
";}i:3;a:7:{s:4:"name";s:22:"hook_entity_info_alter";s:10:"definition";s:46:"function hook_entity_info_alter(&$entity_info)";s:11:"description";s:22:"Alter the entity info.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:189:"
  // Set the controller class for nodes to an alternate implementation of the
  // DrupalEntityController interface.
  $entity_info['node']['controller class'] = 'MyCustomNodeController';
";}i:4;a:7:{s:4:"name";s:16:"hook_entity_load";s:10:"definition";s:43:"function hook_entity_load($entities, $type)";s:11:"description";s:28:"Act on entities when loaded.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:99:"
  foreach ($entities as $entity) {
    $entity->foo = mymodule_add_something($entity, $type);
  }
";}i:5;a:7:{s:4:"name";s:19:"hook_entity_presave";s:10:"definition";s:44:"function hook_entity_presave($entity, $type)";s:11:"description";s:61:"Act on an entity before it is about to be created or updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:36:"
  $entity->changed = REQUEST_TIME;
";}i:6;a:7:{s:4:"name";s:18:"hook_entity_insert";s:10:"definition";s:43:"function hook_entity_insert($entity, $type)";s:11:"description";s:30:"Act on entities when inserted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:334:"
  // Insert the new entity into a fictional table of all entities.
  $info = entity_get_info($type);
  list($id) = entity_extract_ids($type, $entity);
  db_insert('example_entity')
    ->fields(array(
      'type' => $type,
      'id' => $id,
      'created' => REQUEST_TIME,
      'updated' => REQUEST_TIME,
    ))
    ->execute();
";}i:7;a:7:{s:4:"name";s:18:"hook_entity_update";s:10:"definition";s:43:"function hook_entity_update($entity, $type)";s:11:"description";s:29:"Act on entities when updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:319:"
  // Update the entity's entry in a fictional table of all entities.
  $info = entity_get_info($type);
  list($id) = entity_extract_ids($type, $entity);
  db_update('example_entity')
    ->fields(array(
      'updated' => REQUEST_TIME,
    ))
    ->condition('type', $type)
    ->condition('id', $id)
    ->execute();
";}i:8;a:7:{s:4:"name";s:18:"hook_entity_delete";s:10:"definition";s:43:"function hook_entity_delete($entity, $type)";s:11:"description";s:29:"Act on entities when deleted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:261:"
  // Delete the entity's entry from a fictional table of all entities.
  $info = entity_get_info($type);
  list($id) = entity_extract_ids($type, $entity);
  db_delete('example_entity')
    ->condition('type', $type)
    ->condition('id', $id)
    ->execute();
";}i:9;a:7:{s:4:"name";s:23:"hook_entity_query_alter";s:10:"definition";s:40:"function hook_entity_query_alter($query)";s:11:"description";s:37:"Alter or execute an EntityFieldQuery.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:57:"
  $query->executeCallback = 'my_module_query_callback';
";}i:10;a:7:{s:4:"name";s:16:"hook_entity_view";s:10:"definition";s:64:"function hook_entity_view($entity, $type, $view_mode, $langcode)";s:11:"description";s:49:"Act on entities being assembled before rendering.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:162:"
  $entity->content['my_additional_field'] = array(
    '#markup' => $additional_field,
    '#weight' => 10,
    '#theme' => 'mymodule_my_additional_field',
  );
";}i:11;a:7:{s:4:"name";s:22:"hook_entity_view_alter";s:10:"definition";s:47:"function hook_entity_view_alter(&$build, $type)";s:11:"description";s:35:"Alter the results of ENTITY_view().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:303:"
  if ($build['#view_mode'] == 'full' && isset($build['an_additional_field'])) {
    // Change its weight.
    $build['an_additional_field']['#weight'] = -10;

    // Add a #post_render callback to act on the rendered HTML of the entity.
    $build['#post_render'][] = 'my_module_node_post_render';
  }
";}i:12;a:7:{s:4:"name";s:16:"hook_admin_paths";s:10:"definition";s:27:"function hook_admin_paths()";s:11:"description";s:28:"Define administrative paths.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:102:"
  $paths = array(
    'mymodule/*/add' => TRUE,
    'mymodule/*/edit' => TRUE,
  );
  return $paths;
";}i:13;a:7:{s:4:"name";s:22:"hook_admin_paths_alter";s:10:"definition";s:40:"function hook_admin_paths_alter(&$paths)";s:11:"description";s:55:"Redefine administrative paths defined by other modules.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:201:"
  // Treat all user pages as administrative.
  $paths['user'] = TRUE;
  $paths['user/*'] = TRUE;
  // Treat the forum topic node form as a non-administrative page.
  $paths['node/add/forum'] = FALSE;
";}i:14;a:7:{s:4:"name";s:24:"hook_entity_prepare_view";s:10:"definition";s:62:"function hook_entity_prepare_view($entities, $type, $langcode)";s:11:"description";s:52:"Act on entities as they are being prepared for view.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:249:"
  // Load a specific node into the user object for later theming.
  if ($type == 'user') {
    $nodes = mymodule_get_user_nodes(array_keys($entities));
    foreach ($entities as $uid => $entity) {
      $entity->user_node = $nodes[$uid];
    }
  }
";}i:15;a:7:{s:4:"name";s:9:"hook_cron";s:10:"definition";s:20:"function hook_cron()";s:11:"description";s:25:"Perform periodic actions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:728:"
  // Short-running operation example, not using a queue:
  // Delete all expired records since the last cron run.
  $expires = variable_get('mymodule_cron_last_run', REQUEST_TIME);
  db_delete('mymodule_table')
    ->condition('expires', $expires, '>=')
    ->execute();
  variable_set('mymodule_cron_last_run', REQUEST_TIME);

  // Long-running operation example, leveraging a queue:
  // Fetch feeds from other sites.
  $result = db_query('SELECT * FROM {aggregator_feed} WHERE checked + refresh < :time AND refresh <> :never', array(
    ':time' => REQUEST_TIME,
    ':never' => AGGREGATOR_CLEAR_NEVER,
  ));
  $queue = DrupalQueue::get('aggregator_feeds');
  foreach ($result as $feed) {
    $queue->createItem($feed);
  }
";}i:16;a:7:{s:4:"name";s:20:"hook_cron_queue_info";s:10:"definition";s:31:"function hook_cron_queue_info()";s:11:"description";s:62:"Declare queues holding items that need to be run periodically.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:128:"
  $queues['aggregator_feeds'] = array(
    'worker callback' => 'aggregator_refresh',
    'time' => 60,
  );
  return $queues;
";}i:17;a:7:{s:4:"name";s:26:"hook_cron_queue_info_alter";s:10:"definition";s:45:"function hook_cron_queue_info_alter(&$queues)";s:11:"description";s:46:"Alter cron queue information before cron runs.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:165:"
  // This site has many feeds so let's spend 90 seconds on each cron run
  // updating feeds instead of the default 60.
  $queues['aggregator_feeds']['time'] = 90;
";}i:18;a:7:{s:4:"name";s:17:"hook_element_info";s:10:"definition";s:28:"function hook_element_info()";s:11:"description";s:77:"Allows modules to declare their own Forms API element types and specify their";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:80:"
  $types['filter_format'] = array(
    '#input' => TRUE,
  );
  return $types;
";}i:19;a:7:{s:4:"name";s:23:"hook_element_info_alter";s:10:"definition";s:40:"function hook_element_info_alter(&$type)";s:11:"description";s:57:"Alter the element type information returned from modules.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:133:"
  // Decrease the default size of textfields.
  if (isset($type['textfield']['#size'])) {
    $type['textfield']['#size'] = 40;
  }
";}i:20;a:7:{s:4:"name";s:9:"hook_exit";s:10:"definition";s:39:"function hook_exit($destination = NULL)";s:11:"description";s:22:"Perform cleanup tasks.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:105:"
  db_update('counter')
    ->expression('hits', 'hits + 1')
    ->condition('type', 1)
    ->execute();
";}i:21;a:7:{s:4:"name";s:13:"hook_js_alter";s:10:"definition";s:36:"function hook_js_alter(&$javascript)";s:11:"description";s:73:"Perform necessary alterations to the JavaScript before it is presented on";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:165:"
  // Swap out jQuery to use an updated version of the library.
  $javascript['misc/jquery.js']['data'] = drupal_get_path('module', 'jquery_update') . '/jquery.js';
";}i:22;a:7:{s:4:"name";s:12:"hook_library";s:10:"definition";s:23:"function hook_library()";s:11:"description";s:60:"Registers JavaScript/CSS libraries associated with a module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1057:"
  // Library One.
  $libraries['library-1'] = array(
    'title' => 'Library One',
    'website' => 'http://example.com/library-1',
    'version' => '1.2',
    'js' => array(
      drupal_get_path('module', 'my_module') . '/library-1.js' => array(),
    ),
    'css' => array(
      drupal_get_path('module', 'my_module') . '/library-2.css' => array(
        'type' => 'file',
        'media' => 'screen',
      ),
    ),
  );
  // Library Two.
  $libraries['library-2'] = array(
    'title' => 'Library Two',
    'website' => 'http://example.com/library-2',
    'version' => '3.1-beta1',
    'js' => array(
      // JavaScript settings may use the 'data' key.
      array(
        'type' => 'setting',
        'data' => array('library2' => TRUE),
      ),
    ),
    'dependencies' => array(
      // Require jQuery UI core by System module.
      array('system', 'ui'),
      // Require our other library.
      array('my_module', 'library-1'),
      // Require another library.
      array('other_module', 'library-3'),
    ),
  );
  return $libraries;
";}i:23;a:7:{s:4:"name";s:18:"hook_library_alter";s:10:"definition";s:49:"function hook_library_alter(&$libraries, $module)";s:11:"description";s:43:"Alters the JavaScript/CSS library registry.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:515:"
  // Update Farbtastic to version 2.0.
  if ($module == 'system' && isset($libraries['farbtastic'])) {
    // Verify existing version is older than the one we are updating to.
    if (version_compare($libraries['farbtastic']['version'], '2.0', '<')) {
      // Update the existing Farbtastic to version 2.0.
      $libraries['farbtastic']['version'] = '2.0';
      $libraries['farbtastic']['js'] = array(
        drupal_get_path('module', 'farbtastic_update') . '/farbtastic-2.0.js' => array(),
      );
    }
  }
";}i:24;a:7:{s:4:"name";s:14:"hook_css_alter";s:10:"definition";s:30:"function hook_css_alter(&$css)";s:11:"description";s:51:"Alter CSS files before they are output on the page.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:102:"
  // Remove defaults.css file.
  unset($css[drupal_get_path('module', 'system') . '/defaults.css']);
";}i:25;a:7:{s:4:"name";s:22:"hook_ajax_render_alter";s:10:"definition";s:42:"function hook_ajax_render_alter($commands)";s:11:"description";s:72:"Alter the commands that are sent to the user through the Ajax framework.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:155:"
  // Inject any new status messages into the content area.
  $commands[] = ajax_command_prepend('#block-system-main .content', theme('status_messages'));
";}i:26;a:7:{s:4:"name";s:15:"hook_page_build";s:10:"definition";s:32:"function hook_page_build(&$page)";s:11:"description";s:45:"Add elements to a page before it is rendered.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:304:"
  if (menu_get_object('node', 1)) {
    // We are on a node detail page. Append a standard disclaimer to the
    // content region.
    $page['content']['disclaimer'] = array(
      '#markup' => t('Acme, Inc. is not responsible for the contents of this sample code.'),
      '#weight' => 25,
    );
  }
";}i:27;a:7:{s:4:"name";s:24:"hook_menu_get_item_alter";s:10:"definition";s:70:"function hook_menu_get_item_alter(&$router_item, $path, $original_map)";s:11:"description";s:86:"Alter a menu router item right after it has been retrieved from the database or cache.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:197:"
  // When retrieving the router item for the current path...
  if ($path == $_GET['q']) {
    // ...call a function that prepares something for this request.
    mymodule_prepare_something();
  }
";}i:28;a:7:{s:4:"name";s:9:"hook_menu";s:10:"definition";s:20:"function hook_menu()";s:11:"description";s:37:"Define menu items and page callbacks.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:375:"
  $items['blog'] = array(
    'title' => 'blogs',
    'page callback' => 'blog_page',
    'access arguments' => array('access content'),
    'type' => MENU_SUGGESTED_ITEM,
  );
  $items['blog/feed'] = array(
    'title' => 'RSS feed',
    'page callback' => 'blog_feed',
    'access arguments' => array('access content'),
    'type' => MENU_CALLBACK,
  );

  return $items;
";}i:29;a:7:{s:4:"name";s:15:"hook_menu_alter";s:10:"definition";s:33:"function hook_menu_alter(&$items)";s:11:"description";s:81:"Alter the data being saved to the {menu_router} table after hook_menu is invoked.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:94:"
  // Example - disable the page at node/add
  $items['node/add']['access callback'] = FALSE;
";}i:30;a:7:{s:4:"name";s:20:"hook_menu_link_alter";s:10:"definition";s:37:"function hook_menu_link_alter(&$item)";s:11:"description";s:73:"Alter the data being saved to the {menu_links} table by menu_link_save().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:660:"
  // Make all new admin links hidden (a.k.a disabled).
  if (strpos($item['link_path'], 'admin') === 0 && empty($item['mlid'])) {
    $item['hidden'] = 1;
  }
  // Flag a link to be altered by hook_translated_menu_link_alter().
  if ($item['link_path'] == 'devel/cache/clear') {
    $item['options']['alter'] = TRUE;
  }
  // Flag a link to be altered by hook_translated_menu_link_alter(), but only
  // if it is derived from a menu router item; i.e., do not alter a custom
  // menu link pointing to the same path that has been created by a user.
  if ($item['link_path'] == 'user' && $item['module'] == 'system') {
    $item['options']['alter'] = TRUE;
  }
";}i:31;a:7:{s:4:"name";s:31:"hook_translated_menu_link_alter";s:10:"definition";s:54:"function hook_translated_menu_link_alter(&$item, $map)";s:11:"description";s:73:"Alter a menu link after it has been translated and before it is rendered.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:119:"
  if ($item['href'] == 'devel/cache/clear') {
    $item['localized_options']['query'] = drupal_get_destination();
  }
";}i:32;a:7:{s:4:"name";s:21:"hook_menu_link_insert";s:10:"definition";s:37:"function hook_menu_link_insert($link)";s:11:"description";s:49:"Inform modules that a menu link has been created.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:288:"
  // In our sample case, we track menu items as editing sections
  // of the site. These are stored in our table as 'disabled' items.
  $record['mlid'] = $link['mlid'];
  $record['menu_name'] = $link['menu_name'];
  $record['status'] = 0;
  drupal_write_record('menu_example', $record);
";}i:33;a:7:{s:4:"name";s:21:"hook_menu_link_update";s:10:"definition";s:37:"function hook_menu_link_update($link)";s:11:"description";s:49:"Inform modules that a menu link has been updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:381:"
  // If the parent menu has changed, update our record.
  $menu_name = db_query("SELECT menu_name FROM {menu_example} WHERE mlid = :mlid", array(':mlid' => $link['mlid']))->fetchField();
  if ($menu_name != $link['menu_name']) {
    db_update('menu_example')
      ->fields(array('menu_name' => $link['menu_name']))
      ->condition('mlid', $link['mlid'])
      ->execute();
  }
";}i:34;a:7:{s:4:"name";s:21:"hook_menu_link_delete";s:10:"definition";s:37:"function hook_menu_link_delete($link)";s:11:"description";s:49:"Inform modules that a menu link has been deleted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:124:"
  // Delete the record from our table.
  db_delete('menu_example')
    ->condition('mlid', $link['mlid'])
    ->execute();
";}i:35;a:7:{s:4:"name";s:27:"hook_menu_local_tasks_alter";s:10:"definition";s:70:"function hook_menu_local_tasks_alter(&$data, $router_item, $root_path)";s:11:"description";s:70:"Alter tabs and actions displayed on the page before they are rendered.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:925:"
  // Add an action linking to node/add to all pages.
  $data['actions']['output'][] = array(
    '#theme' => 'menu_local_task',
    '#link' => array(
      'title' => t('Add new content'),
      'href' => 'node/add',
      'localized_options' => array(
        'attributes' => array(
          'title' => t('Add new content'),
        ),
      ),
    ),
  );

  // Add a tab linking to node/add to all pages.
  $data['tabs'][0]['output'][] = array(
    '#theme' => 'menu_local_task',
    '#link' => array(
      'title' => t('Example tab'),
      'href' => 'node/add',
      'localized_options' => array(
        'attributes' => array(
          'title' => t('Add new content'),
        ),
      ),
    ),
    // Define whether this link is active. This can be omitted for
    // implementations that add links to pages outside of the current page
    // context.
    '#active' => ($router_item['path'] == $root_path),
  );
";}i:36;a:7:{s:4:"name";s:26:"hook_menu_breadcrumb_alter";s:10:"definition";s:58:"function hook_menu_breadcrumb_alter(&$active_trail, $item)";s:11:"description";s:72:"Alter links in the active trail before it is rendered as the breadcrumb.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:407:"
  // Always display a link to the current page by duplicating the last link in
  // the active trail. This means that menu_get_active_breadcrumb() will remove
  // the last link (for the current page), but since it is added once more here,
  // it will appear.
  if (!drupal_is_front_page()) {
    $end = end($active_trail);
    if ($item['href'] == $end['href']) {
      $active_trail[] = $end;
    }
  }
";}i:37;a:7:{s:4:"name";s:32:"hook_menu_contextual_links_alter";s:10:"definition";s:76:"function hook_menu_contextual_links_alter(&$links, $router_item, $root_path)";s:11:"description";s:48:"Alter contextual links before they are rendered.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:285:"
  // Add a link to all contextual links for nodes.
  if ($root_path == 'node/%') {
    $links['foo'] = array(
      'title' => t('Do fu'),
      'href' => 'foo/do',
      'localized_options' => array(
        'query' => array(
          'foo' => 'bar',
        ),
      ),
    );
  }
";}i:38;a:7:{s:4:"name";s:15:"hook_page_alter";s:10:"definition";s:32:"function hook_page_alter(&$page)";s:11:"description";s:46:"Perform alterations before a page is rendered.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:214:"
  // Add help text to the user login block.
  $page['sidebar_first']['user_login']['help'] = array(
    '#weight' => -10,
    '#markup' => t('To post comments or add new content, you first have to log in.'),
  );
";}i:39;a:7:{s:4:"name";s:15:"hook_form_alter";s:10:"definition";s:56:"function hook_form_alter(&$form, &$form_state, $form_id)";s:11:"description";s:46:"Perform alterations before a form is rendered.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:367:"
  if (isset($form['type']) && $form['type']['#value'] . '_node_settings' == $form_id) {
    $form['workflow']['upload_' . $form['type']['#value']] = array(
      '#type' => 'radios',
      '#title' => t('Attachments'),
      '#default_value' => variable_get('upload_' . $form['type']['#value'], 1),
      '#options' => array(t('Disabled'), t('Enabled')),
    );
  }
";}i:40;a:7:{s:4:"name";s:23:"hook_form_FORM_ID_alter";s:10:"definition";s:64:"function hook_form_FORM_ID_alter(&$form, &$form_state, $form_id)";s:11:"description";s:75:"Provide a form-specific alteration instead of the global hook_form_alter().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:415:"
  // Modification for the form with the given form ID goes here. For example, if
  // FORM_ID is "user_register_form" this code would run only on the user
  // registration form.

  // Add a checkbox to registration form about agreeing to terms of use.
  $form['terms_of_use'] = array(
    '#type' => 'checkbox',
    '#title' => t("I agree with the website's terms and conditions."),
    '#required' => TRUE,
  );
";}i:41;a:7:{s:4:"name";s:28:"hook_form_BASE_FORM_ID_alter";s:10:"definition";s:69:"function hook_form_BASE_FORM_ID_alter(&$form, &$form_state, $form_id)";s:11:"description";s:52:"Provide a form-specific alteration for shared forms.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:422:"
  // Modification for the form with the given BASE_FORM_ID goes here. For
  // example, if BASE_FORM_ID is "node_form", this code would run on every
  // node form, regardless of node type.

  // Add a checkbox to the node form about agreeing to terms of use.
  $form['terms_of_use'] = array(
    '#type' => 'checkbox',
    '#title' => t("I agree with the website's terms and conditions."),
    '#required' => TRUE,
  );
";}i:42;a:7:{s:4:"name";s:10:"hook_forms";s:10:"definition";s:36:"function hook_forms($form_id, $args)";s:11:"description";s:39:"Map form_ids to form builder functions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:837:"
  // Simply reroute the (non-existing) $form_id 'mymodule_first_form' to
  // 'mymodule_main_form'.
  $forms['mymodule_first_form'] = array(
    'callback' => 'mymodule_main_form',
  );

  // Reroute the $form_id and prepend an additional argument that gets passed to
  // the 'mymodule_main_form' form builder function.
  $forms['mymodule_second_form'] = array(
    'callback' => 'mymodule_main_form',
    'callback arguments' => array('some parameter'),
  );

  // Reroute the $form_id, but invoke the form builder function
  // 'mymodule_main_form_wrapper' first, so we can prepopulate the $form array
  // that is passed to the actual form builder 'mymodule_main_form'.
  $forms['mymodule_wrapped_form'] = array(
    'callback' => 'mymodule_main_form',
    'wrapper_callback' => 'mymodule_main_form_wrapper',
  );

  return $forms;
";}i:43;a:7:{s:4:"name";s:9:"hook_boot";s:10:"definition";s:20:"function hook_boot()";s:11:"description";s:42:"Perform setup tasks for all page requests.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:168:"
  // We need user_access() in the shutdown function. Make sure it gets loaded.
  drupal_load('module', 'user');
  drupal_register_shutdown_function('devel_shutdown');
";}i:44;a:7:{s:4:"name";s:9:"hook_init";s:10:"definition";s:20:"function hook_init()";s:11:"description";s:49:"Perform setup tasks for non-cached page requests.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:211:"
  // Since this file should only be loaded on the front page, it cannot be
  // declared in the info file.
  if (drupal_is_front_page()) {
    drupal_add_css(drupal_get_path('module', 'foo') . '/foo.css');
  }
";}i:45;a:7:{s:4:"name";s:19:"hook_image_toolkits";s:10:"definition";s:30:"function hook_image_toolkits()";s:11:"description";s:46:"Define image toolkits provided by this module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:257:"
  return array(
    'working' => array(
      'title' => t('A toolkit that works.'),
      'available' => TRUE,
    ),
    'broken' => array(
      'title' => t('A toolkit that is "broken" and will not be listed.'),
      'available' => FALSE,
    ),
  );
";}i:46;a:7:{s:4:"name";s:15:"hook_mail_alter";s:10:"definition";s:35:"function hook_mail_alter(&$message)";s:11:"description";s:63:"Alter an email message created with the drupal_mail() function.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:148:"
  if ($message['id'] == 'modulename_messagekey') {
    $message['body'][] = "--\nMail sent out from " . variable_get('sitename', t('Drupal'));
  }
";}i:47;a:7:{s:4:"name";s:28:"hook_module_implements_alter";s:10:"definition";s:63:"function hook_module_implements_alter(&$implementations, $hook)";s:11:"description";s:50:"Alter the registry of modules implementing a hook.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:455:"
  if ($hook == 'rdf_mapping') {
    // Move my_module_rdf_mapping() to the end of the list. module_implements()
    // iterates through $implementations with a foreach loop which PHP iterates
    // in the order that the items were added, so to move an item to the end of
    // the array, we remove it and then add it.
    $group = $implementations['my_module'];
    unset($implementations['my_module']);
    $implementations['my_module'] = $group;
  }
";}i:48;a:7:{s:4:"name";s:22:"hook_system_info_alter";s:10:"definition";s:53:"function hook_system_info_alter(&$info, $file, $type)";s:11:"description";s:62:"Alter the information parsed from module and theme .info files";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:165:"
  // Only fill this in if the .info file does not define a 'datestamp'.
  if (empty($info['datestamp'])) {
    $info['datestamp'] = filemtime($file->filename);
  }
";}i:49;a:7:{s:4:"name";s:15:"hook_permission";s:10:"definition";s:26:"function hook_permission()";s:11:"description";s:24:"Define user permissions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:184:"
  return array(
    'administer my module' =>  array(
      'title' => t('Administer my module'),
      'description' => t('Perform administration tasks for my module.'),
    ),
  );
";}i:50;a:7:{s:4:"name";s:10:"hook_theme";s:10:"definition";s:52:"function hook_theme($existing, $type, $theme, $path)";s:11:"description";s:53:"Register a module (or theme's) theme implementations.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:831:"
  return array(
    'forum_display' => array(
      'variables' => array('forums' => NULL, 'topics' => NULL, 'parents' => NULL, 'tid' => NULL, 'sortby' => NULL, 'forum_per_page' => NULL),
    ),
    'forum_list' => array(
      'variables' => array('forums' => NULL, 'parents' => NULL, 'tid' => NULL),
    ),
    'forum_topic_list' => array(
      'variables' => array('tid' => NULL, 'topics' => NULL, 'sortby' => NULL, 'forum_per_page' => NULL),
    ),
    'forum_icon' => array(
      'variables' => array('new_posts' => NULL, 'num_posts' => 0, 'comment_mode' => 0, 'sticky' => 0),
    ),
    'status_report' => array(
      'render element' => 'requirements',
      'file' => 'system.admin.inc',
    ),
    'system_date_time_settings' => array(
      'render element' => 'form',
      'file' => 'system.admin.inc',
    ),
  );
";}i:51;a:7:{s:4:"name";s:25:"hook_theme_registry_alter";s:10:"definition";s:52:"function hook_theme_registry_alter(&$theme_registry)";s:11:"description";s:64:"Alter the theme registry information returned from hook_theme().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:319:"
  // Kill the next/previous forum topic navigation links.
  foreach ($theme_registry['forum_topic_navigation']['preprocess functions'] as $key => $value) {
    if ($value == 'template_preprocess_forum_topic_navigation') {
      unset($theme_registry['forum_topic_navigation']['preprocess functions'][$key]);
    }
  }
";}i:52;a:7:{s:4:"name";s:17:"hook_custom_theme";s:10:"definition";s:28:"function hook_custom_theme()";s:11:"description";s:74:"Return the machine-readable name of the theme to use for the current page.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:136:"
  // Allow the user to request a particular theme via a query parameter.
  if (isset($_GET['theme'])) {
    return $_GET['theme'];
  }
";}i:53;a:7:{s:4:"name";s:11:"hook_xmlrpc";s:10:"definition";s:22:"function hook_xmlrpc()";s:11:"description";s:27:"Register XML-RPC callbacks.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:236:"
  return array(
    'drupal.login' => 'drupal_login',
    array(
      'drupal.site.ping',
      'drupal_directory_ping',
      array('boolean', 'string', 'string', 'string', 'string', 'string'),
      t('Handling ping request'))
  );
";}i:54;a:7:{s:4:"name";s:17:"hook_xmlrpc_alter";s:10:"definition";s:37:"function hook_xmlrpc_alter(&$methods)";s:11:"description";s:64:"Alters the definition of XML-RPC methods before they are called.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:388:"
  // Directly change a simple method.
  $methods['drupal.login'] = 'mymodule_login';

  // Alter complex definitions.
  foreach ($methods as $key => &$method) {
    // Skip simple method definitions.
    if (!is_int($key)) {
      continue;
    }
    // Perform the wanted manipulation.
    if ($method[0] == 'drupal.site.ping') {
      $method[1] = 'mymodule_directory_ping';
    }
  }
";}i:55;a:7:{s:4:"name";s:13:"hook_watchdog";s:10:"definition";s:40:"function hook_watchdog(array $log_entry)";s:11:"description";s:20:"Log an event message";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1921:"
  global $base_url, $language;

  $severity_list = array(
    WATCHDOG_EMERGENCY => t('Emergency'),
    WATCHDOG_ALERT     => t('Alert'),
    WATCHDOG_CRITICAL  => t('Critical'),
    WATCHDOG_ERROR     => t('Error'),
    WATCHDOG_WARNING   => t('Warning'),
    WATCHDOG_NOTICE    => t('Notice'),
    WATCHDOG_INFO      => t('Info'),
    WATCHDOG_DEBUG     => t('Debug'),
  );

  $to = 'someone@example.com';
  $params = array();
  $params['subject'] = t('[@site_name] @severity_desc: Alert from your web site', array(
    '@site_name' => variable_get('site_name', 'Drupal'),
    '@severity_desc' => $severity_list[$log_entry['severity']],
  ));

  $params['message']  = "\nSite:         @base_url";
  $params['message'] .= "\nSeverity:     (@severity) @severity_desc";
  $params['message'] .= "\nTimestamp:    @timestamp";
  $params['message'] .= "\nType:         @type";
  $params['message'] .= "\nIP Address:   @ip";
  $params['message'] .= "\nRequest URI:  @request_uri";
  $params['message'] .= "\nReferrer URI: @referer_uri";
  $params['message'] .= "\nUser:         (@uid) @name";
  $params['message'] .= "\nLink:         @link";
  $params['message'] .= "\nMessage:      \n\n@message";

  $params['message'] = t($params['message'], array(
    '@base_url'      => $base_url,
    '@severity'      => $log_entry['severity'],
    '@severity_desc' => $severity_list[$log_entry['severity']],
    '@timestamp'     => format_date($log_entry['timestamp']),
    '@type'          => $log_entry['type'],
    '@ip'            => $log_entry['ip'],
    '@request_uri'   => $log_entry['request_uri'],
    '@referer_uri'   => $log_entry['referer'],
    '@uid'           => $log_entry['user']->uid,
    '@name'          => $log_entry['user']->name,
    '@link'          => strip_tags($log_entry['link']),
    '@message'       => strip_tags($log_entry['message']),
  ));

  drupal_mail('emaillog', 'entry', $to, $language, $params);
";}i:56;a:7:{s:4:"name";s:9:"hook_mail";s:10:"definition";s:44:"function hook_mail($key, &$message, $params)";s:11:"description";s:65:"Prepare a message based on parameters; called from drupal_mail().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1283:"
  $account = $params['account'];
  $context = $params['context'];
  $variables = array(
    '%site_name' => variable_get('site_name', 'Drupal'),
    '%username' => format_username($account),
  );
  if ($context['hook'] == 'taxonomy') {
    $entity = $params['entity'];
    $vocabulary = taxonomy_vocabulary_load($entity->vid);
    $variables += array(
      '%term_name' => $entity->name,
      '%term_description' => $entity->description,
      '%term_id' => $entity->tid,
      '%vocabulary_name' => $vocabulary->name,
      '%vocabulary_description' => $vocabulary->description,
      '%vocabulary_id' => $vocabulary->vid,
    );
  }

  // Node-based variable translation is only available if we have a node.
  if (isset($params['node'])) {
    $node = $params['node'];
    $variables += array(
      '%uid' => $node->uid,
      '%node_url' => url('node/' . $node->nid, array('absolute' => TRUE)),
      '%node_type' => node_type_get_name($node),
      '%title' => $node->title,
      '%teaser' => $node->teaser,
      '%body' => $node->body,
    );
  }
  $subject = strtr($context['subject'], $variables);
  $body = strtr($context['message'], $variables);
  $message['subject'] .= str_replace(array("\r", "\n"), '', $subject);
  $message['body'][] = drupal_html_to_text($body);
";}i:57;a:7:{s:4:"name";s:17:"hook_flush_caches";s:10:"definition";s:28:"function hook_flush_caches()";s:11:"description";s:41:"Add a list of cache tables to be cleared.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:34:"
  return array('cache_example');
";}i:58;a:7:{s:4:"name";s:22:"hook_modules_installed";s:10:"definition";s:41:"function hook_modules_installed($modules)";s:11:"description";s:54:"Perform necessary actions after modules are installed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:111:"
  if (in_array('lousy_module', $modules)) {
    variable_set('lousy_module_conflicting_variable', FALSE);
  }
";}i:59;a:7:{s:4:"name";s:20:"hook_modules_enabled";s:10:"definition";s:39:"function hook_modules_enabled($modules)";s:11:"description";s:52:"Perform necessary actions after modules are enabled.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:171:"
  if (in_array('lousy_module', $modules)) {
    drupal_set_message(t('mymodule is not compatible with lousy_module'), 'error');
    mymodule_disable_functionality();
  }
";}i:60;a:7:{s:4:"name";s:21:"hook_modules_disabled";s:10:"definition";s:40:"function hook_modules_disabled($modules)";s:11:"description";s:53:"Perform necessary actions after modules are disabled.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:86:"
  if (in_array('lousy_module', $modules)) {
    mymodule_enable_functionality();
  }
";}i:61;a:7:{s:4:"name";s:24:"hook_modules_uninstalled";s:10:"definition";s:43:"function hook_modules_uninstalled($modules)";s:11:"description";s:56:"Perform necessary actions after modules are uninstalled.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:155:"
  foreach ($modules as $module) {
    db_delete('mymodule_table')
      ->condition('module', $module)
      ->execute();
  }
  mymodule_cache_rebuild();
";}i:62;a:7:{s:4:"name";s:20:"hook_stream_wrappers";s:10:"definition";s:31:"function hook_stream_wrappers()";s:11:"description";s:70:"Registers PHP stream wrapper implementations associated with a module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1424:"
  return array(
    'public' => array(
      'name' => t('Public files'),
      'class' => 'DrupalPublicStreamWrapper',
      'description' => t('Public local files served by the webserver.'),
      'type' => STREAM_WRAPPERS_LOCAL_NORMAL,
    ),
    'private' => array(
      'name' => t('Private files'),
      'class' => 'DrupalPrivateStreamWrapper',
      'description' => t('Private local files served by Drupal.'),
      'type' => STREAM_WRAPPERS_LOCAL_NORMAL,
    ),
    'temp' => array(
      'name' => t('Temporary files'),
      'class' => 'DrupalTempStreamWrapper',
      'description' => t('Temporary local files for upload and previews.'),
      'type' => STREAM_WRAPPERS_LOCAL_HIDDEN,
    ),
    'cdn' => array(
      'name' => t('Content delivery network files'),
      'class' => 'MyModuleCDNStreamWrapper',
      'description' => t('Files served by a content delivery network.'),
      // 'type' can be omitted to use the default of STREAM_WRAPPERS_NORMAL
    ),
    'youtube' => array(
      'name' => t('YouTube video'),
      'class' => 'MyModuleYouTubeStreamWrapper',
      'description' => t('Video streamed from YouTube.'),
      // A module implementing YouTube integration may decide to support using
      // the YouTube API for uploading video, but here, we assume that this
      // particular module only supports playing YouTube video.
      'type' => STREAM_WRAPPERS_READ_VISIBLE,
    ),
  );
";}i:63;a:7:{s:4:"name";s:26:"hook_stream_wrappers_alter";s:10:"definition";s:47:"function hook_stream_wrappers_alter(&$wrappers)";s:11:"description";s:54:"Alters the list of PHP stream wrapper implementations.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:117:"
  // Change the name of private files to reflect the performance.
  $wrappers['private']['name'] = t('Slow files');
";}i:64;a:7:{s:4:"name";s:14:"hook_file_load";s:10:"definition";s:31:"function hook_file_load($files)";s:11:"description";s:46:"Load additional information into file objects.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:326:"
  // Add the upload specific data into the file object.
  $result = db_query('SELECT * FROM {upload} u WHERE u.fid IN (:fids)', array(':fids' => array_keys($files)))->fetchAll(PDO::FETCH_ASSOC);
  foreach ($result as $record) {
    foreach ($record as $key => $value) {
      $files[$record['fid']]->$key = $value;
    }
  }
";}i:65;a:7:{s:4:"name";s:18:"hook_file_validate";s:10:"definition";s:34:"function hook_file_validate($file)";s:11:"description";s:39:"Check that files meet a given criteria.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:311:"
  $errors = array();

  if (empty($file->filename)) {
    $errors[] = t("The file's name is empty. Please give a name to the file.");
  }
  if (strlen($file->filename) > 255) {
    $errors[] = t("The file's name exceeds the 255 characters limit. Please rename the file and try again.");
  }

  return $errors;
";}i:66;a:7:{s:4:"name";s:17:"hook_file_presave";s:10:"definition";s:33:"function hook_file_presave($file)";s:11:"description";s:40:"Act on a file being inserted or updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:78:"
  // Change the file timestamp to an hour prior.
  $file->timestamp -= 3600;
";}i:67;a:7:{s:4:"name";s:16:"hook_file_insert";s:10:"definition";s:32:"function hook_file_insert($file)";s:11:"description";s:30:"Respond to a file being added.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:184:"
  // Add a message to the log, if the file is a jpg
  $validate = file_validate_extensions($file, 'jpg');
  if (empty($validate)) {
    watchdog('file', 'A jpg has been added.');
  }
";}i:68;a:7:{s:4:"name";s:16:"hook_file_update";s:10:"definition";s:32:"function hook_file_update($file)";s:11:"description";s:32:"Respond to a file being updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:2:"

";}i:69;a:7:{s:4:"name";s:14:"hook_file_copy";s:10:"definition";s:39:"function hook_file_copy($file, $source)";s:11:"description";s:39:"Respond to a file that has been copied.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:2:"

";}i:70;a:7:{s:4:"name";s:14:"hook_file_move";s:10:"definition";s:39:"function hook_file_move($file, $source)";s:11:"description";s:38:"Respond to a file that has been moved.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:2:"

";}i:71;a:7:{s:4:"name";s:16:"hook_file_delete";s:10:"definition";s:32:"function hook_file_delete($file)";s:11:"description";s:32:"Respond to a file being deleted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:119:"
  // Delete all information associated with the file.
  db_delete('upload')->condition('fid', $file->fid)->execute();
";}i:72;a:7:{s:4:"name";s:18:"hook_file_download";s:10:"definition";s:33:"function hook_file_download($uri)";s:11:"description";s:66:"Control access to private file downloads and specify HTTP headers.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:453:"
  // Check if the file is controlled by the current module.
  if (!file_prepare_directory($uri)) {
    $uri = FALSE;
  }
  if (strpos(file_uri_target($uri), variable_get('user_picture_path', 'pictures') . '/picture-') === 0) {
    if (!user_access('access user profiles')) {
      // Access to the file is denied.
      return -1;
    }
    else {
      $info = image_get_info($uri);
      return array('Content-Type' => $info['mime_type']);
    }
  }
";}i:73;a:7:{s:4:"name";s:19:"hook_file_url_alter";s:10:"definition";s:35:"function hook_file_url_alter(&$uri)";s:11:"description";s:24:"Alter the URL to a file.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1221:"
  global $user;

  // User 1 will always see the local file in this example.
  if ($user->uid == 1) {
    return;
  }

  $cdn1 = 'http://cdn1.example.com';
  $cdn2 = 'http://cdn2.example.com';
  $cdn_extensions = array('css', 'js', 'gif', 'jpg', 'jpeg', 'png');

  // Most CDNs don't support private file transfers without a lot of hassle,
  // so don't support this in the common case.
  $schemes = array('public');

  $scheme = file_uri_scheme($uri);

  // Only serve shipped files and public created files from the CDN.
  if (!$scheme || in_array($scheme, $schemes)) {
    // Shipped files.
    if (!$scheme) {
      $path = $uri;
    }
    // Public created files.
    else {
      $wrapper = file_stream_wrapper_get_instance_by_scheme($scheme);
      $path = $wrapper->getDirectoryPath() . '/' . file_uri_target($uri);
    }

    // Clean up Windows paths.
    $path = str_replace('\\', '/', $path);

    // Serve files with one of the CDN extensions from CDN 1, all others from
    // CDN 2.
    $pathinfo = pathinfo($path);
    if (isset($pathinfo['extension']) && in_array($pathinfo['extension'], $cdn_extensions)) {
      $uri = $cdn1 . '/' . $path;
    }
    else {
      $uri = $cdn2 . '/' . $path;
    }
  }
";}i:74;a:7:{s:4:"name";s:17:"hook_requirements";s:10:"definition";s:34:"function hook_requirements($phase)";s:11:"description";s:56:"Check installation requirements and do status reporting.";s:11:"destination";s:15:"%module.install";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1644:"
  $requirements = array();
  // Ensure translations don't break at install time
  $t = get_t();

  // Report Drupal version
  if ($phase == 'runtime') {
    $requirements['drupal'] = array(
      'title' => $t('Drupal'),
      'value' => VERSION,
      'severity' => REQUIREMENT_INFO
    );
  }

  // Test PHP version
  $requirements['php'] = array(
    'title' => $t('PHP'),
    'value' => ($phase == 'runtime') ? l(phpversion(), 'admin/logs/status/php') : phpversion(),
  );
  if (version_compare(phpversion(), DRUPAL_MINIMUM_PHP) < 0) {
    $requirements['php']['description'] = $t('Your PHP installation is too old. Drupal requires at least PHP %version.', array('%version' => DRUPAL_MINIMUM_PHP));
    $requirements['php']['severity'] = REQUIREMENT_ERROR;
  }

  // Report cron status
  if ($phase == 'runtime') {
    $cron_last = variable_get('cron_last');

    if (is_numeric($cron_last)) {
      $requirements['cron']['value'] = $t('Last run !time ago', array('!time' => format_interval(REQUEST_TIME - $cron_last)));
    }
    else {
      $requirements['cron'] = array(
        'description' => $t('Cron has not run. It appears cron jobs have not been setup on your system. Check the help pages for <a href="@url">configuring cron jobs</a>.', array('@url' => 'http://drupal.org/cron')),
        'severity' => REQUIREMENT_ERROR,
        'value' => $t('Never run'),
      );
    }

    $requirements['cron']['description'] .= ' ' . $t('You can <a href="@cron">run cron manually</a>.', array('@cron' => url('admin/logs/status/run-cron')));

    $requirements['cron']['title'] = $t('Cron maintenance tasks');
  }

  return $requirements;
";}i:75;a:7:{s:4:"name";s:11:"hook_schema";s:10:"definition";s:22:"function hook_schema()";s:11:"description";s:50:"Define the current version of the database schema.";s:11:"destination";s:15:"%module.install";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1529:"
  $schema['node'] = array(
    // example (partial) specification for table "node"
    'description' => 'The base table for nodes.',
    'fields' => array(
      'nid' => array(
        'description' => 'The primary identifier for a node.',
        'type' => 'serial',
        'unsigned' => TRUE,
        'not null' => TRUE),
      'vid' => array(
        'description' => 'The current {node_revision}.vid version identifier.',
        'type' => 'int',
        'unsigned' => TRUE,
        'not null' => TRUE,
        'default' => 0),
      'type' => array(
        'description' => 'The {node_type} of this node.',
        'type' => 'varchar',
        'length' => 32,
        'not null' => TRUE,
        'default' => ''),
      'title' => array(
        'description' => 'The title of this node, always treated as non-markup plain text.',
        'type' => 'varchar',
        'length' => 255,
        'not null' => TRUE,
        'default' => ''),
      ),
    'indexes' => array(
      'node_changed'        => array('changed'),
      'node_created'        => array('created'),
      ),
    'unique keys' => array(
      'nid_vid' => array('nid', 'vid'),
      'vid'     => array('vid')
      ),
    'foreign keys' => array(
      'node_revision' => array(
        'table' => 'node_revision',
        'columns' => array('vid' => 'vid'),
        ),
      'node_author' => array(
        'table' => 'users',
        'columns' => array('uid' => 'uid')
        ),
       ),
    'primary key' => array('nid'),
  );
  return $schema;
";}i:76;a:7:{s:4:"name";s:17:"hook_schema_alter";s:10:"definition";s:36:"function hook_schema_alter(&$schema)";s:11:"description";s:49:"Perform alterations to existing database schemas.";s:11:"destination";s:15:"%module.install";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:216:"
  // Add field to existing schema.
  $schema['users']['fields']['timezone_id'] = array(
    'type' => 'int',
    'not null' => TRUE,
    'default' => 0,
    'description' => 'Per-user timezone configuration.',
  );
";}i:77;a:7:{s:4:"name";s:16:"hook_query_alter";s:10:"definition";s:57:"function hook_query_alter(QueryAlterableInterface $query)";s:11:"description";s:42:"Perform alterations to a structured query.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:69:"
  if ($query->hasTag('micro_limit')) {
    $query->range(0, 2);
  }
";}i:78;a:7:{s:4:"name";s:20:"hook_query_TAG_alter";s:10:"definition";s:61:"function hook_query_TAG_alter(QueryAlterableInterface $query)";s:11:"description";s:58:"Perform alterations to a structured query for a given tag.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1174:"
  // Skip the extra expensive alterations if site has no node access control modules.
  if (!node_access_view_all_nodes()) {
    // Prevent duplicates records.
    $query->distinct();
    // The recognized operations are 'view', 'update', 'delete'.
    if (!$op = $query->getMetaData('op')) {
      $op = 'view';
    }
    // Skip the extra joins and conditions for node admins.
    if (!user_access('bypass node access')) {
      // The node_access table has the access grants for any given node.
      $access_alias = $query->join('node_access', 'na', '%alias.nid = n.nid');
      $or = db_or();
      // If any grant exists for the specified user, then user has access to the node for the specified operation.
      foreach (node_access_grants($op, $query->getMetaData('account')) as $realm => $gids) {
        foreach ($gids as $gid) {
          $or->condition(db_and()
            ->condition($access_alias . '.gid', $gid)
            ->condition($access_alias . '.realm', $realm)
          );
        }
      }

      if (count($or->conditions())) {
        $query->condition($or);
      }

      $query->condition($access_alias . 'grant_' . $op, 1, '>=');
    }
  }
";}i:79;a:7:{s:4:"name";s:12:"hook_install";s:10:"definition";s:23:"function hook_install()";s:11:"description";s:49:"Perform setup tasks when the module is installed.";s:11:"destination";s:15:"%module.install";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:259:"
  // Populate the default {node_access} record.
  db_insert('node_access')
    ->fields(array(
      'nid' => 0,
      'gid' => 0,
      'realm' => 'all',
      'grant_view' => 1,
      'grant_update' => 0,
      'grant_delete' => 0,
    ))
    ->execute();
";}i:80;a:7:{s:4:"name";s:13:"hook_update_N";s:10:"definition";s:33:"function hook_update_N(&$sandbox)";s:11:"description";s:24:"Perform a single update.";s:11:"destination";s:15:"%module.install";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1716:"
  // For non-multipass updates, the signature can simply be;
  // function hook_update_N() {

  // For most updates, the following is sufficient.
  db_add_field('mytable1', 'newcol', array('type' => 'int', 'not null' => TRUE, 'description' => 'My new integer column.'));

  // However, for more complex operations that may take a long time,
  // you may hook into Batch API as in the following example.

  // Update 3 users at a time to have an exclamation point after their names.
  // (They're really happy that we can do batch API in this hook!)
  if (!isset($sandbox['progress'])) {
    $sandbox['progress'] = 0;
    $sandbox['current_uid'] = 0;
    // We'll -1 to disregard the uid 0...
    $sandbox['max'] = db_query('SELECT COUNT(DISTINCT uid) FROM {users}')->fetchField() - 1;
  }

  $users = db_select('users', 'u')
    ->fields('u', array('uid', 'name'))
    ->condition('uid', $sandbox['current_uid'], '>')
    ->range(0, 3)
    ->orderBy('uid', 'ASC')
    ->execute();

  foreach ($users as $user) {
    $user->name .= '!';
    db_update('users')
      ->fields(array('name' => $user->name))
      ->condition('uid', $user->uid)
      ->execute();

    $sandbox['progress']++;
    $sandbox['current_uid'] = $user->uid;
  }

  $sandbox['#finished'] = empty($sandbox['max']) ? 1 : ($sandbox['progress'] / $sandbox['max']);

  // To display a message to the user when the update is completed, return it.
  // If you do not want to display a completion message, simply return nothing.
  return t('The update did what it was supposed to do.');

  // In case of an error, simply throw an exception with an error message.
  throw new DrupalUpdateException('Something went wrong; here is what you should do.');
";}i:81;a:7:{s:4:"name";s:24:"hook_update_dependencies";s:10:"definition";s:35:"function hook_update_dependencies()";s:11:"description";s:64:"Return an array of information about module update dependencies.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:919:"
  // Indicate that the mymodule_update_7000() function provided by this module
  // must run after the another_module_update_7002() function provided by the
  // 'another_module' module.
  $dependencies['mymodule'][7000] = array(
    'another_module' => 7002,
  );
  // Indicate that the mymodule_update_7001() function provided by this module
  // must run before the yet_another_module_update_7004() function provided by
  // the 'yet_another_module' module. (Note that declaring dependencies in this
  // direction should be done only in rare situations, since it can lead to the
  // following problem: If a site has already run the yet_another_module
  // module's database updates before it updates its codebase to pick up the
  // newest mymodule code, then the dependency declared here will be ignored.)
  $dependencies['yet_another_module'][7004] = array(
    'mymodule' => 7001,
  );
  return $dependencies;
";}i:82;a:7:{s:4:"name";s:24:"hook_update_last_removed";s:10:"definition";s:35:"function hook_update_last_removed()";s:11:"description";s:64:"Return a number which is no longer available as hook_update_N().";s:11:"destination";s:15:"%module.install";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:153:"
  // We've removed the 5.x-1.x version of mymodule, including database updates.
  // The next update function is mymodule_update_5200().
  return 5103;
";}i:83;a:7:{s:4:"name";s:14:"hook_uninstall";s:10:"definition";s:25:"function hook_uninstall()";s:11:"description";s:44:"Remove any information that the module sets.";s:11:"destination";s:15:"%module.install";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:38:"
  variable_del('upload_file_types');
";}i:84;a:7:{s:4:"name";s:11:"hook_enable";s:10:"definition";s:22:"function hook_enable()";s:11:"description";s:50:"Perform necessary actions after module is enabled.";s:11:"destination";s:15:"%module.install";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:29:"
  mymodule_cache_rebuild();
";}i:85;a:7:{s:4:"name";s:12:"hook_disable";s:10:"definition";s:23:"function hook_disable()";s:11:"description";s:52:"Perform necessary actions before module is disabled.";s:11:"destination";s:15:"%module.install";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:29:"
  mymodule_cache_rebuild();
";}i:86;a:7:{s:4:"name";s:25:"hook_registry_files_alter";s:10:"definition";s:53:"function hook_registry_files_alter(&$files, $modules)";s:11:"description";s:74:"Perform necessary alterations to the list of files parsed by the registry.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:435:"
  foreach ($modules as $module) {
    // Only add test files for disabled modules, as enabled modules should
    // already include any test files they provide.
    if (!$module->status) {
      $dir = $module->dir;
      foreach ($module->info['files'] as $file) {
        if (substr($file, -5) == '.test') {
          $files["$dir/$file"] = array('module' => $module->name, 'weight' => $module->weight);
        }
      }
    }
  }
";}i:87;a:7:{s:4:"name";s:18:"hook_install_tasks";s:10:"definition";s:29:"function hook_install_tasks()";s:11:"description";s:68:"Return an array of tasks to be performed by an installation profile.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:3468:"
  // Here, we define a variable to allow tasks to indicate that a particular,
  // processor-intensive batch process needs to be triggered later on in the
  // installation.
  $myprofile_needs_batch_processing = variable_get('myprofile_needs_batch_processing', FALSE);
  $tasks = array(
    // This is an example of a task that defines a form which the user who is
    // installing the site will be asked to fill out. To implement this task,
    // your profile would define a function named myprofile_data_import_form()
    // as a normal form API callback function, with associated validation and
    // submit handlers. In the submit handler, in addition to saving whatever
    // other data you have collected from the user, you might also call
    // variable_set('myprofile_needs_batch_processing', TRUE) if the user has
    // entered data which requires that batch processing will need to occur
    // later on.
    'myprofile_data_import_form' => array(
      'display_name' => st('Data import options'),
      'type' => 'form',
    ),
    // Similarly, to implement this task, your profile would define a function
    // named myprofile_settings_form() with associated validation and submit
    // handlers. This form might be used to collect and save additional
    // information from the user that your profile needs. There are no extra
    // steps required for your profile to act as an "installation wizard"; you
    // can simply define as many tasks of type 'form' as you wish to execute,
    // and the forms will be presented to the user, one after another.
    'myprofile_settings_form' => array(
      'display_name' => st('Additional options'),
      'type' => 'form',
    ),
    // This is an example of a task that performs batch operations. To
    // implement this task, your profile would define a function named
    // myprofile_batch_processing() which returns a batch API array definition
    // that the installer will use to execute your batch operations. Due to the
    // 'myprofile_needs_batch_processing' variable used here, this task will be
    // hidden and skipped unless your profile set it to TRUE in one of the
    // previous tasks.
    'myprofile_batch_processing' => array(
      'display_name' => st('Import additional data'),
      'display' => $myprofile_needs_batch_processing,
      'type' => 'batch',
      'run' => $myprofile_needs_batch_processing ? INSTALL_TASK_RUN_IF_NOT_COMPLETED : INSTALL_TASK_SKIP,
    ),
    // This is an example of a task that will not be displayed in the list that
    // the user sees. To implement this task, your profile would define a
    // function named myprofile_final_site_setup(), in which additional,
    // automated site setup operations would be performed. Since this is the
    // last task defined by your profile, you should also use this function to
    // call variable_del('myprofile_needs_batch_processing') and clean up the
    // variable that was used above. If you want the user to pass to the final
    // Drupal installation tasks uninterrupted, return no output from this
    // function. Otherwise, return themed output that the user will see (for
    // example, a confirmation page explaining that your profile's tasks are
    // complete, with a link to reload the current page and therefore pass on
    // to the final Drupal installation tasks when the user is ready to do so).
    'myprofile_final_site_setup' => array(
    ),
  );
  return $tasks;
";}i:88;a:7:{s:4:"name";s:22:"hook_drupal_goto_alter";s:10:"definition";s:72:"function hook_drupal_goto_alter(&$path, &$options, &$http_response_code)";s:11:"description";s:53:"Change the page the user is sent to by drupal_goto().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:69:"
  // A good addition to misery module.
  $http_response_code = 500;
";}i:89;a:7:{s:4:"name";s:20:"hook_html_head_alter";s:10:"definition";s:46:"function hook_html_head_alter(&$head_elements)";s:11:"description";s:73:"Alter XHTML HEAD tags before they are rendered by drupal_get_html_head().";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:276:"
  foreach ($head_elements as $key => $element) {
    if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'canonical') {
      // I want a custom canonical url.
      $head_elements[$key]['#attributes']['href'] = mymodule_canonical_url();
    }
  }
";}i:90;a:7:{s:4:"name";s:24:"hook_install_tasks_alter";s:10:"definition";s:58:"function hook_install_tasks_alter(&$tasks, $install_state)";s:11:"description";s:42:"Alter the full list of installation tasks.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:231:"
  // Replace the "Choose language" installation task provided by Drupal core
  // with a custom callback function defined by this installation profile.
  $tasks['install_select_locale']['function'] = 'myprofile_locale_selection';
";}i:91;a:7:{s:4:"name";s:32:"hook_file_mimetype_mapping_alter";s:10:"definition";s:52:"function hook_file_mimetype_mapping_alter(&$mapping)";s:11:"description";s:75:"Alter MIME type mappings used to determine MIME type from a file extension.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:319:"
  // Add new MIME type 'drupal/info'.
  $mapping['mimetypes']['example_info'] = 'drupal/info';
  // Add new extension '.info' and map it to the 'drupal/info' MIME type.
  $mapping['extensions']['info'] = 'example_info';
  // Override existing extension mapping for '.ogg' files.
  $mapping['extensions']['ogg'] = 189;
";}i:92;a:7:{s:4:"name";s:16:"hook_action_info";s:10:"definition";s:27:"function hook_action_info()";s:11:"description";s:35:"Declares information about actions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:806:"
  return array(
    'comment_unpublish_action' => array(
      'type' => 'comment',
      'label' => t('Unpublish comment'),
      'configurable' => FALSE,
      'behavior' => array('changes_property'),
      'triggers' => array('comment_presave', 'comment_insert', 'comment_update'),
    ),
    'comment_unpublish_by_keyword_action' => array(
      'type' => 'comment',
      'label' => t('Unpublish comment containing keyword(s)'),
      'configurable' => TRUE,
      'behavior' => array('changes_property'),
      'triggers' => array('comment_presave', 'comment_insert', 'comment_update'),
    ),
    'comment_save_action' => array(
      'type' => 'comment',
      'label' => t('Save comment'),
      'configurable' => FALSE,
      'triggers' => array('comment_insert', 'comment_update'),
    ),
  );
";}i:93;a:7:{s:4:"name";s:19:"hook_actions_delete";s:10:"definition";s:34:"function hook_actions_delete($aid)";s:11:"description";s:41:"Executes code after an action is deleted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:82:"
  db_delete('actions_assignments')
    ->condition('aid', $aid)
    ->execute();
";}i:94;a:7:{s:4:"name";s:22:"hook_action_info_alter";s:10:"definition";s:42:"function hook_action_info_alter(&$actions)";s:11:"description";s:46:"Alters the actions declared by another module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:93:"
  $actions['node_unpublish_action']['label'] = t('Unpublish and remove from public view.');
";}i:95;a:7:{s:4:"name";s:18:"hook_archiver_info";s:10:"definition";s:29:"function hook_archiver_info()";s:11:"description";s:32:"Declare archivers to the system.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:138:"
  return array(
    'tar' => array(
      'class' => 'ArchiverTar',
      'extensions' => array('tar', 'tar.gz', 'tar.bz2'),
    ),
  );
";}i:96;a:7:{s:4:"name";s:24:"hook_archiver_info_alter";s:10:"definition";s:41:"function hook_archiver_info_alter(&$info)";s:11:"description";s:53:"Alter archiver information declared by other modules.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:41:"
  $info['tar']['extensions'][] = 'tgz';
";}i:97;a:7:{s:4:"name";s:22:"hook_date_format_types";s:10:"definition";s:33:"function hook_date_format_types()";s:11:"description";s:29:"Define additional date types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:143:"
  // Define the core date format types.
  return array(
    'long' => t('Long'),
    'medium' => t('Medium'),
    'short' => t('Short'),
  );
";}i:98;a:7:{s:4:"name";s:28:"hook_date_format_types_alter";s:10:"definition";s:46:"function hook_date_format_types_alter(&$types)";s:11:"description";s:27:"Modify existing date types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:77:"
  foreach ($types as $name => $type) {
    $types[$name]['locked'] = 1;
  }
";}i:99;a:7:{s:4:"name";s:17:"hook_date_formats";s:10:"definition";s:28:"function hook_date_formats()";s:11:"description";s:31:"Define additional date formats.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:383:"
  return array(
    array(
      'type' => 'mymodule_extra_long',
      'format' => 'l jS F Y H:i:s e',
      'locales' => array('en-ie'),
    ),
    array(
      'type' => 'mymodule_extra_long',
      'format' => 'l jS F Y h:i:sa',
      'locales' => array('en', 'en-us'),
    ),
    array(
      'type' => 'short',
      'format' => 'F Y',
      'locales' => array(),
    ),
  );
";}i:100;a:7:{s:4:"name";s:23:"hook_date_formats_alter";s:10:"definition";s:43:"function hook_date_formats_alter(&$formats)";s:11:"description";s:46:"Alter date formats declared by another module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:88:"
  foreach ($formats as $id => $format) {
    $formats[$id]['locales'][] = 'en-ca';
  }
";}i:101;a:7:{s:4:"name";s:33:"hook_page_delivery_callback_alter";s:10:"definition";s:54:"function hook_page_delivery_callback_alter(&$callback)";s:11:"description";s:89:"Alters the delivery callback used to send the result of the page callback to the browser.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:391:"
  // jQuery sets a HTTP_X_REQUESTED_WITH header of 'XMLHttpRequest'.
  // If a page would normally be delivered as an html page, and it is called
  // from jQuery, deliver it instead as an Ajax response.
  if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' && $callback == 'drupal_deliver_html_page') {
    $callback = 'ajax_deliver';
  }
";}i:102;a:7:{s:4:"name";s:29:"hook_system_themes_page_alter";s:10:"definition";s:54:"function hook_system_themes_page_alter(&$theme_groups)";s:11:"description";s:29:"Alters theme operation links.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:333:"
  foreach ($theme_groups as $state => &$group) {
    foreach ($theme_groups[$state] as &$theme) {
      // Add a foo link to each list of theme operations.
      $theme->operations[] = array(
        'title' => t('Foo'),
        'href' => 'admin/appearance/foo',
        'query' => array('theme' => $theme->name)
      );
    }
  }
";}i:103;a:7:{s:4:"name";s:22:"hook_url_inbound_alter";s:10:"definition";s:71:"function hook_url_inbound_alter(&$path, $original_path, $path_language)";s:11:"description";s:28:"Alters inbound URL requests.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:221:"
  // Create the path user/me/edit, which allows a user to edit their account.
  if (preg_match('|^user/me/edit(/.*)?|', $path, $matches)) {
    global $user;
    $path = 'user/' . $user->uid . '/edit' . $matches[1];
  }
";}i:104;a:7:{s:4:"name";s:23:"hook_url_outbound_alter";s:10:"definition";s:67:"function hook_url_outbound_alter(&$path, &$options, $original_path)";s:11:"description";s:21:"Alters outbound URLs.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:412:"
  // Use an external RSS feed rather than the Drupal one.
  if ($path == 'rss.xml') {
    $path = 'http://example.com/rss.xml';
    $options['external'] = TRUE;
  }

  // Instead of pointing to user/[uid]/edit, point to user/me/edit.
  if (preg_match('|^user/([0-9]*)/edit(/.*)?|', $path, $matches)) {
    global $user;
    if ($user->uid == $matches[1]) {
      $path = 'user/me/edit' . $matches[2];
    }
  }
";}i:105;a:7:{s:4:"name";s:19:"hook_username_alter";s:10:"definition";s:46:"function hook_username_alter(&$name, $account)";s:11:"description";s:48:"Alter the username that is displayed for a user.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:140:"
  // Display the user's uid instead of name.
  if (isset($account->uid)) {
    $name = t('User !uid', array('!uid' => $account->uid));
  }
";}i:106;a:7:{s:4:"name";s:11:"hook_tokens";s:10:"definition";s:85:"function hook_tokens($type, $tokens, array $data = array(), array $options = array())";s:11:"description";s:50:"Provide replacement values for placeholder tokens.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:1706:"
  $url_options = array('absolute' => TRUE);
  if (isset($options['language'])) {
    $url_options['language'] = $options['language'];
    $language_code = $options['language']->language;
  }
  else {
    $language_code = NULL;
  }
  $sanitize = !empty($options['sanitize']);

  $replacements = array();

  if ($type == 'node' && !empty($data['node'])) {
    $node = $data['node'];

    foreach ($tokens as $name => $original) {
      switch ($name) {
        // Simple key values on the node.
        case 'nid':
          $replacements[$original] = $node->nid;
          break;

        case 'title':
          $replacements[$original] = $sanitize ? check_plain($node->title) : $node->title;
          break;

        case 'edit-url':
          $replacements[$original] = url('node/' . $node->nid . '/edit', $url_options);
          break;

        // Default values for the chained tokens handled below.
        case 'author':
          $name = ($node->uid == 0) ? variable_get('anonymous', t('Anonymous')) : $node->name;
          $replacements[$original] = $sanitize ? filter_xss($name) : $name;
          break;

        case 'created':
          $replacements[$original] = format_date($node->created, 'medium', '', NULL, $language_code);
          break;
      }
    }

    if ($author_tokens = token_find_with_prefix($tokens, 'author')) {
      $author = user_load($node->uid);
      $replacements += token_generate('user', $author_tokens, array('user' => $author), $options);
    }

    if ($created_tokens = token_find_with_prefix($tokens, 'created')) {
      $replacements += token_generate('date', $created_tokens, array('date' => $node->created), $options);
    }
  }

  return $replacements;
";}i:107;a:7:{s:4:"name";s:17:"hook_tokens_alter";s:10:"definition";s:64:"function hook_tokens_alter(array &$replacements, array $context)";s:11:"description";s:48:"Alter replacement values for placeholder tokens.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:710:"
  $options = $context['options'];

  if (isset($options['language'])) {
    $url_options['language'] = $options['language'];
    $language_code = $options['language']->language;
  }
  else {
    $language_code = NULL;
  }
  $sanitize = !empty($options['sanitize']);

  if ($context['type'] == 'node' && !empty($context['data']['node'])) {
    $node = $context['data']['node'];

    // Alter the [node:title] token, and replace it with the rendered content
    // of a field (field_title).
    if (isset($context['tokens']['title'])) {
      $title = field_view_field('node', $node, 'field_title', 'default', $language_code);
      $replacements[$context['tokens']['title']] = drupal_render($title);
    }
  }
";}i:108;a:7:{s:4:"name";s:15:"hook_token_info";s:10:"definition";s:26:"function hook_token_info()";s:11:"description";s:71:"Provide information about available placeholder tokens and token types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:920:"
  $type = array(
    'name' => t('Nodes'),
    'description' => t('Tokens related to individual nodes.'),
    'needs-data' => 'node',
  );

  // Core tokens for nodes.
  $node['nid'] = array(
    'name' => t("Node ID"),
    'description' => t("The unique ID of the node."),
  );
  $node['title'] = array(
    'name' => t("Title"),
    'description' => t("The title of the node."),
  );
  $node['edit-url'] = array(
    'name' => t("Edit URL"),
    'description' => t("The URL of the node's edit page."),
  );

  // Chained tokens for nodes.
  $node['created'] = array(
    'name' => t("Date created"),
    'description' => t("The date the node was posted."),
    'type' => 'date',
  );
  $node['author'] = array(
    'name' => t("Author"),
    'description' => t("The author of the node."),
    'type' => 'user',
  );

  return array(
    'types' => array('node' => $type),
    'tokens' => array('node' => $node),
  );
";}i:109;a:7:{s:4:"name";s:21:"hook_token_info_alter";s:10:"definition";s:38:"function hook_token_info_alter(&$data)";s:11:"description";s:70:"Alter the metadata about available placeholder tokens and token types.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:512:"
  // Modify description of node tokens for our site.
  $data['tokens']['node']['nid'] = array(
    'name' => t("Node ID"),
    'description' => t("The unique ID of the article."),
  );
  $data['tokens']['node']['title'] = array(
    'name' => t("Title"),
    'description' => t("The title of the article."),
  );

  // Chained tokens for nodes.
  $data['tokens']['node']['created'] = array(
    'name' => t("Date created"),
    'description' => t("The date the article was posted."),
    'type' => 'date',
  );
";}i:110;a:7:{s:4:"name";s:16:"hook_batch_alter";s:10:"definition";s:34:"function hook_batch_alter(&$batch)";s:11:"description";s:52:"Alter batch information before a batch is processed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:404:"
  // If the current page request is inside the overlay, add ?render=overlay to
  // the success callback URL, so that it appears correctly within the overlay.
  if (overlay_get_mode() == 'child') {
    if (isset($batch['url_options']['query'])) {
      $batch['url_options']['query']['render'] = 'overlay';
    }
    else {
      $batch['url_options']['query'] = array('render' => 'overlay');
    }
  }
";}i:111;a:7:{s:4:"name";s:17:"hook_updater_info";s:10:"definition";s:28:"function hook_updater_info()";s:11:"description";s:65:"Provide information on Updaters (classes that can update Drupal).";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:263:"
  return array(
    'module' => array(
      'class' => 'ModuleUpdater',
      'name' => t('Update modules'),
      'weight' => 0,
    ),
    'theme' => array(
      'class' => 'ThemeUpdater',
      'name' => t('Update themes'),
      'weight' => 0,
    ),
  );
";}i:112;a:7:{s:4:"name";s:23:"hook_updater_info_alter";s:10:"definition";s:44:"function hook_updater_info_alter(&$updaters)";s:11:"description";s:36:"Alter the Updater information array.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:156:"
  // Adjust weight so that the theme Updater gets a chance to handle a given
  // update task before module updaters.
  $updaters['theme']['weight'] = -1;
";}i:113;a:7:{s:4:"name";s:20:"hook_countries_alter";s:10:"definition";s:42:"function hook_countries_alter(&$countries)";s:11:"description";s:31:"Alter the default country list.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:97:"
  // Elbonia is now independent, so add it to the country list.
  $countries['EB'] = 'Elbonia';
";}i:114;a:7:{s:4:"name";s:27:"hook_menu_site_status_alter";s:10:"definition";s:63:"function hook_menu_site_status_alter(&$menu_site_status, $path)";s:11:"description";s:44:"Control site status before menu dispatching.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:236:"
  // Allow access to my_module/authentication even if site is in offline mode.
  if ($menu_site_status == MENU_SITE_OFFLINE && user_is_anonymous() && $path == 'my_module/authentication') {
    $menu_site_status = MENU_SITE_ONLINE;
  }
";}i:115;a:7:{s:4:"name";s:22:"hook_filetransfer_info";s:10:"definition";s:33:"function hook_filetransfer_info()";s:11:"description";s:69:"Register information about FileTransfer classes provided by a module.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:180:"
  $info['sftp'] = array(
    'title' => t('SFTP (Secure FTP)'),
    'file' => 'sftp.filetransfer.inc',
    'class' => 'FileTransferSFTP',
    'weight' => 10,
  );
  return $info;
";}i:116;a:7:{s:4:"name";s:28:"hook_filetransfer_info_alter";s:10:"definition";s:58:"function hook_filetransfer_info_alter(&$filetransfer_info)";s:11:"description";s:38:"Alter the FileTransfer class registry.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"system";s:9:"file_path";s:29:"public://hooks/system.api.php";s:4:"body";s:219:"
  if (variable_get('paranoia', FALSE)) {
    // Remove the FTP option entirely.
    unset($filetransfer_info['ftp']);
    // Make sure the SSH option is listed first.
    $filetransfer_info['ssh']['weight'] = -10;
  }
";}i:117;a:7:{s:4:"name";s:37:"hook_form_system_theme_settings_alter";s:10:"definition";s:68:"function hook_form_system_theme_settings_alter(&$form, &$form_state)";s:11:"description";s:55:"Allow themes to alter the theme-specific settings form.";s:11:"destination";s:12:"template.php";s:5:"group";s:6:"system";s:9:"file_path";s:28:"public://hooks/theme.api.php";s:4:"body";s:323:"
  // Add a checkbox to toggle the breadcrumb trail.
  $form['toggle_breadcrumb'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display the breadcrumb'),
    '#default_value' => theme_get_setting('toggle_breadcrumb'),
    '#description'   => t('Show a trail of links from the homepage to the current page.'),
  );
";}i:118;a:7:{s:4:"name";s:15:"hook_preprocess";s:10:"definition";s:44:"function hook_preprocess(&$variables, $hook)";s:11:"description";s:27:"Preprocess theme variables.";s:11:"destination";s:12:"template.php";s:5:"group";s:6:"system";s:9:"file_path";s:28:"public://hooks/theme.api.php";s:4:"body";s:837:"
 static $hooks;

  // Add contextual links to the variables, if the user has permission.

  if (!user_access('access contextual links')) {
    return;
  }

  if (!isset($hooks)) {
    $hooks = theme_get_registry();
  }

  // Determine the primary theme function argument.
  if (isset($hooks[$hook]['variables'])) {
    $keys = array_keys($hooks[$hook]['variables']);
    $key = $keys[0];
  }
  else {
    $key = $hooks[$hook]['render element'];
  }

  if (isset($variables[$key])) {
    $element = $variables[$key];
  }

  if (isset($element) && is_array($element) && !empty($element['#contextual_links'])) {
    $variables['title_suffix']['contextual_links'] = contextual_links_view($element);
    if (!empty($variables['title_suffix']['contextual_links'])) {
      $variables['classes_array'][] = 'contextual-links-region';
    }
  }
";}i:119;a:7:{s:4:"name";s:20:"hook_preprocess_HOOK";s:10:"definition";s:42:"function hook_preprocess_HOOK(&$variables)";s:11:"description";s:53:"Preprocess theme variables for a specific theme hook.";s:11:"destination";s:12:"template.php";s:5:"group";s:6:"system";s:9:"file_path";s:28:"public://hooks/theme.api.php";s:4:"body";s:172:"
  // This example is from rdf_preprocess_image(). It adds an RDF attribute
  // to the image hook's variables.
  $variables['attributes']['typeof'] = array('foaf:Image');
";}i:120;a:7:{s:4:"name";s:12:"hook_process";s:10:"definition";s:41:"function hook_process(&$variables, $hook)";s:11:"description";s:24:"Process theme variables.";s:11:"destination";s:12:"template.php";s:5:"group";s:6:"system";s:9:"file_path";s:28:"public://hooks/theme.api.php";s:4:"body";s:532:"
  // Wraps variables in RDF wrappers.
  if (!empty($variables['rdf_template_variable_attributes_array'])) {
    foreach ($variables['rdf_template_variable_attributes_array'] as $variable_name => $attributes) {
      $context = array(
        'hook' => $hook,
        'variable_name' => $variable_name,
        'variables' => $variables,
      );
      $variables[$variable_name] = theme('rdf_template_variable_wrapper', array('content' => $variables[$variable_name], 'attributes' => $attributes, 'context' => $context));
    }
  }
";}i:121;a:7:{s:4:"name";s:17:"hook_process_HOOK";s:10:"definition";s:39:"function hook_process_HOOK(&$variables)";s:11:"description";s:50:"Process theme variables for a specific theme hook.";s:11:"destination";s:12:"template.php";s:5:"group";s:6:"system";s:9:"file_path";s:28:"public://hooks/theme.api.php";s:4:"body";s:47:"
  $variables['classes'] .= ' my_added_class';
";}i:122;a:7:{s:4:"name";s:19:"hook_themes_enabled";s:10:"definition";s:41:"function hook_themes_enabled($theme_list)";s:11:"description";s:32:"Respond to themes being enabled.";s:11:"destination";s:12:"template.php";s:5:"group";s:6:"system";s:9:"file_path";s:28:"public://hooks/theme.api.php";s:4:"body";s:77:"
  foreach ($theme_list as $theme) {
    block_theme_initialize($theme);
  }
";}i:123;a:7:{s:4:"name";s:20:"hook_themes_disabled";s:10:"definition";s:42:"function hook_themes_disabled($theme_list)";s:11:"description";s:33:"Respond to themes being disabled.";s:11:"destination";s:12:"template.php";s:5:"group";s:6:"system";s:9:"file_path";s:28:"public://hooks/theme.api.php";s:4:"body";s:62:"
 // Clear all update module caches.
  _update_cache_clear();
";}}s:8:"taxonomy";a:11:{i:0;a:7:{s:4:"name";s:29:"hook_taxonomy_vocabulary_load";s:10:"definition";s:53:"function hook_taxonomy_vocabulary_load($vocabularies)";s:11:"description";s:41:"Act on taxonomy vocabularies when loaded.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:143:"
  foreach ($vocabularies as $vocabulary) {
    $vocabulary->synonyms = variable_get('taxonomy_' . $vocabulary->vid . '_synonyms', FALSE);
  }
";}i:1;a:7:{s:4:"name";s:32:"hook_taxonomy_vocabulary_presave";s:10:"definition";s:54:"function hook_taxonomy_vocabulary_presave($vocabulary)";s:11:"description";s:51:"Act on taxonomy vocabularies before they are saved.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:29:"
  $vocabulary->foo = 'bar';
";}i:2;a:7:{s:4:"name";s:31:"hook_taxonomy_vocabulary_insert";s:10:"definition";s:53:"function hook_taxonomy_vocabulary_insert($vocabulary)";s:11:"description";s:43:"Act on taxonomy vocabularies when inserted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:106:"
  if ($vocabulary->synonyms) {
    variable_set('taxonomy_' . $vocabulary->vid . '_synonyms', TRUE);
  }
";}i:3;a:7:{s:4:"name";s:31:"hook_taxonomy_vocabulary_update";s:10:"definition";s:53:"function hook_taxonomy_vocabulary_update($vocabulary)";s:11:"description";s:42:"Act on taxonomy vocabularies when updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:159:"
  $status = $vocabulary->synonyms ? TRUE : FALSE;
  if ($vocabulary->synonyms) {
    variable_set('taxonomy_' . $vocabulary->vid . '_synonyms', $status);
  }
";}i:4;a:7:{s:4:"name";s:31:"hook_taxonomy_vocabulary_delete";s:10:"definition";s:53:"function hook_taxonomy_vocabulary_delete($vocabulary)";s:11:"description";s:49:"Respond to the deletion of taxonomy vocabularies.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:144:"
  if (variable_get('taxonomy_' . $vocabulary->vid . '_synonyms', FALSE)) {
    variable_del('taxonomy_' . $vocabulary->vid . '_synonyms');
  }
";}i:5;a:7:{s:4:"name";s:23:"hook_taxonomy_term_load";s:10:"definition";s:40:"function hook_taxonomy_term_load($terms)";s:11:"description";s:34:"Act on taxonomy terms when loaded.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:199:"
  $result = db_query('SELECT tid, foo FROM {mytable} WHERE tid IN (:tids)', array(':tids' => array_keys($terms)));
  foreach ($result as $record) {
    $terms[$record->tid]->foo = $record->foo;
  }
";}i:6;a:7:{s:4:"name";s:26:"hook_taxonomy_term_presave";s:10:"definition";s:42:"function hook_taxonomy_term_presave($term)";s:11:"description";s:44:"Act on taxonomy terms before they are saved.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:23:"
  $term->foo = 'bar';
";}i:7;a:7:{s:4:"name";s:25:"hook_taxonomy_term_insert";s:10:"definition";s:41:"function hook_taxonomy_term_insert($term)";s:11:"description";s:36:"Act on taxonomy terms when inserted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:324:"
  if (!empty($term->synonyms)) {
    foreach (explode ("\n", str_replace("\r", '', $term->synonyms)) as $synonym) {
      if ($synonym) {
        db_insert('taxonomy_term_synonym')
        ->fields(array(
          'tid' => $term->tid,
          'name' => rtrim($synonym),
        ))
        ->execute();
      }
    }
  }
";}i:8;a:7:{s:4:"name";s:25:"hook_taxonomy_term_update";s:10:"definition";s:41:"function hook_taxonomy_term_update($term)";s:11:"description";s:35:"Act on taxonomy terms when updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:360:"
  hook_taxonomy_term_delete($term);
  if (!empty($term->synonyms)) {
    foreach (explode ("\n", str_replace("\r", '', $term->synonyms)) as $synonym) {
      if ($synonym) {
        db_insert('taxonomy_term_synonym')
        ->fields(array(
          'tid' => $term->tid,
          'name' => rtrim($synonym),
        ))
        ->execute();
      }
    }
  }
";}i:9;a:7:{s:4:"name";s:25:"hook_taxonomy_term_delete";s:10:"definition";s:41:"function hook_taxonomy_term_delete($term)";s:11:"description";s:42:"Respond to the deletion of taxonomy terms.";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:71:"
  db_delete('term_synoynm')->condition('tid', $term->tid)->execute();
";}i:10;a:7:{s:4:"name";s:29:"hook_taxonomy_term_view_alter";s:10:"definition";s:47:"function hook_taxonomy_term_view_alter(&$build)";s:11:"description";s:42:"Alter the results of taxonomy_term_view().";s:11:"destination";s:14:"%module.module";s:5:"group";s:8:"taxonomy";s:9:"file_path";s:31:"public://hooks/taxonomy.api.php";s:4:"body";s:297:"
  if ($build['#view_mode'] == 'full' && isset($build['an_additional_field'])) {
    // Change its weight.
    $build['an_additional_field']['#weight'] = -10;
  }

  // Add a #post_render callback to act on the rendered HTML of the term.
  $build['#post_render'][] = 'my_module_node_post_render';
";}}s:7:"trigger";a:2:{i:0;a:7:{s:4:"name";s:17:"hook_trigger_info";s:10:"definition";s:28:"function hook_trigger_info()";s:11:"description";s:57:"Declare triggers (events) for users to assign actions to.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"trigger";s:9:"file_path";s:30:"public://hooks/trigger.api.php";s:4:"body";s:554:"
  return array(
    'node' => array(
      'node_presave' => array(
        'label' => t('When either saving new content or updating existing content'),
      ),
      'node_insert' => array(
        'label' => t('After saving new content'),
      ),
      'node_update' => array(
        'label' => t('After saving updated content'),
      ),
      'node_delete' => array(
        'label' => t('After deleting content'),
      ),
      'node_view' => array(
        'label' => t('When content is viewed by an authenticated user'),
      ),
    ),
  );
";}i:1;a:7:{s:4:"name";s:23:"hook_trigger_info_alter";s:10:"definition";s:44:"function hook_trigger_info_alter(&$triggers)";s:11:"description";s:47:"Alter triggers declared by hook_trigger_info().";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"trigger";s:9:"file_path";s:30:"public://hooks/trigger.api.php";s:4:"body";s:75:"
  $triggers['node']['node_insert']['label'] = t('When content is saved');
";}}s:6:"update";a:3:{i:0;a:7:{s:4:"name";s:26:"hook_update_projects_alter";s:10:"definition";s:47:"function hook_update_projects_alter(&$projects)";s:11:"description";s:71:"Alter the list of projects before fetching data and comparing versions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"update";s:9:"file_path";s:29:"public://hooks/update.api.php";s:4:"body";s:1801:"
  // Hide a site-specific module from the list.
  unset($projects['site_specific_module']);

  // Add a disabled module to the list.
  // The key for the array should be the machine-readable project "short name".
  $projects['disabled_project_name'] = array(
    // Machine-readable project short name (same as the array key above).
    'name' => 'disabled_project_name',
    // Array of values from the main .info file for this project.
    'info' => array(
      'name' => 'Some disabled module',
      'description' => 'A module not enabled on the site that you want to see in the available updates report.',
      'version' => '7.x-1.0',
      'core' => '7.x',
      // The maximum file change time (the "ctime" returned by the filectime()
      // PHP method) for all of the .info files included in this project.
      '_info_file_ctime' => 1243888165,
    ),
    // The date stamp when the project was released, if known. If the disabled
    // project was an officially packaged release from drupal.org, this will
    // be included in the .info file as the 'datestamp' field. This only
    // really matters for development snapshot releases that are regenerated,
    // so it can be left undefined or set to 0 in most cases.
    'datestamp' => 1243888185,
    // Any modules (or themes) included in this project. Keyed by machine-
    // readable "short name", value is the human-readable project name printed
    // in the UI.
    'includes' => array(
      'disabled_project' => 'Disabled module',
      'disabled_project_helper' => 'Disabled module helper module',
      'disabled_project_foo' => 'Disabled module foo add-on module',
    ),
    // Does this project contain a 'module', 'theme', 'disabled-module', or
    // 'disabled-theme'?
    'project_type' => 'disabled-module',
  );
";}i:1;a:7:{s:4:"name";s:24:"hook_update_status_alter";s:10:"definition";s:45:"function hook_update_status_alter(&$projects)";s:11:"description";s:59:"Alter the information about available updates for projects.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"update";s:9:"file_path";s:29:"public://hooks/update.api.php";s:4:"body";s:774:"
  $settings = variable_get('update_advanced_project_settings', array());
  foreach ($projects as $project => $project_info) {
    if (isset($settings[$project]) && isset($settings[$project]['check']) &&
        ($settings[$project]['check'] == 'never' ||
          (isset($project_info['recommended']) &&
            $settings[$project]['check'] === $project_info['recommended']))) {
      $projects[$project]['status'] = UPDATE_NOT_CHECKED;
      $projects[$project]['reason'] = t('Ignored from settings');
      if (!empty($settings[$project]['notes'])) {
        $projects[$project]['extra'][] = array(
          'class' => array('admin-note'),
          'label' => t('Administrator note'),
          'data' => $settings[$project]['notes'],
        );
      }
    }
  }
";}i:2;a:7:{s:4:"name";s:26:"hook_verify_update_archive";s:10:"definition";s:72:"function hook_verify_update_archive($project, $archive_file, $directory)";s:11:"description";s:61:"Verify an archive after it has been downloaded and extracted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:6:"update";s:9:"file_path";s:29:"public://hooks/update.api.php";s:4:"body";s:219:"
  $errors = array();
  if (!file_exists($directory)) {
    $errors[] = t('The %directory does not exist.', array('%directory' => $directory));
  }
  // Add other checks on the archive integrity here.
  return $errors;
";}}s:4:"user";a:17:{i:0;a:7:{s:4:"name";s:14:"hook_user_load";s:10:"definition";s:31:"function hook_user_load($users)";s:11:"description";s:50:"Act on user objects when loaded from the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:200:"
  $result = db_query('SELECT uid, foo FROM {my_table} WHERE uid IN (:uids)', array(':uids' => array_keys($users)));
  foreach ($result as $record) {
    $users[$record->uid]->foo = $record->foo;
  }
";}i:1;a:7:{s:4:"name";s:16:"hook_user_delete";s:10:"definition";s:35:"function hook_user_delete($account)";s:11:"description";s:25:"Respond to user deletion.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:79:"
  db_delete('mytable')
    ->condition('uid', $account->uid)
    ->execute();
";}i:2;a:7:{s:4:"name";s:16:"hook_user_cancel";s:10:"definition";s:51:"function hook_user_cancel($edit, $account, $method)";s:11:"description";s:34:"Act on user account cancellations.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:1031:"
  switch ($method) {
    case 'user_cancel_block_unpublish':
      // Unpublish nodes (current revisions).
      module_load_include('inc', 'node', 'node.admin');
      $nodes = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->condition('uid', $account->uid)
        ->execute()
        ->fetchCol();
      node_mass_update($nodes, array('status' => 0));
      break;

    case 'user_cancel_reassign':
      // Anonymize nodes (current revisions).
      module_load_include('inc', 'node', 'node.admin');
      $nodes = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->condition('uid', $account->uid)
        ->execute()
        ->fetchCol();
      node_mass_update($nodes, array('uid' => 0));
      // Anonymize old revisions.
      db_update('node_revision')
        ->fields(array('uid' => 0))
        ->condition('uid', $account->uid)
        ->execute();
      // Clean history.
      db_delete('history')
        ->condition('uid', $account->uid)
        ->execute();
      break;
  }
";}i:3;a:7:{s:4:"name";s:30:"hook_user_cancel_methods_alter";s:10:"definition";s:50:"function hook_user_cancel_methods_alter(&$methods)";s:11:"description";s:36:"Modify account cancellation methods.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:620:"
  // Limit access to disable account and unpublish content method.
  $methods['user_cancel_block_unpublish']['access'] = user_access('administer site configuration');

  // Remove the content re-assigning method.
  unset($methods['user_cancel_reassign']);

  // Add a custom zero-out method.
  $methods['mymodule_zero_out'] = array(
    'title' => t('Delete the account and remove all content.'),
    'description' => t('All your content will be replaced by empty strings.'),
    // access should be used for administrative methods only.
    'access' => user_access('access zero-out account cancellation method'),
  );
";}i:4;a:7:{s:4:"name";s:20:"hook_user_operations";s:10:"definition";s:31:"function hook_user_operations()";s:11:"description";s:25:"Add mass user operations.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:398:"
  $operations = array(
    'unblock' => array(
      'label' => t('Unblock the selected users'),
      'callback' => 'user_user_operations_unblock',
    ),
    'block' => array(
      'label' => t('Block the selected users'),
      'callback' => 'user_user_operations_block',
    ),
    'cancel' => array(
      'label' => t('Cancel the selected user accounts'),
    ),
  );
  return $operations;
";}i:5;a:7:{s:4:"name";s:20:"hook_user_categories";s:10:"definition";s:31:"function hook_user_categories()";s:11:"description";s:66:"Retrieve a list of user setting or profile information categories.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:111:"
  return array(array(
    'name' => 'account',
    'title' => t('Account settings'),
    'weight' => 1,
  ));
";}i:6;a:7:{s:4:"name";s:17:"hook_user_presave";s:10:"definition";s:55:"function hook_user_presave(&$edit, $account, $category)";s:11:"description";s:49:"A user account is about to be created or updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:183:"
  // Make sure that our form value 'mymodule_foo' is stored as 'mymodule_bar'.
  if (isset($edit['mymodule_foo'])) {
    $edit['data']['my_module_foo'] = $edit['my_module_foo'];
  }
";}i:7;a:7:{s:4:"name";s:16:"hook_user_insert";s:10:"definition";s:54:"function hook_user_insert(&$edit, $account, $category)";s:11:"description";s:27:"A user account was created.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:135:"
  db_insert('mytable')
    ->fields(array(
      'myfield' => $edit['myfield'],
      'uid' => $account->uid,
    ))
    ->execute();
";}i:8;a:7:{s:4:"name";s:16:"hook_user_update";s:10:"definition";s:54:"function hook_user_update(&$edit, $account, $category)";s:11:"description";s:27:"A user account was updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:130:"
  db_insert('user_changes')
    ->fields(array(
      'uid' => $account->uid,
      'changed' => time(),
    ))
    ->execute();
";}i:9;a:7:{s:4:"name";s:15:"hook_user_login";s:10:"definition";s:42:"function hook_user_login(&$edit, $account)";s:11:"description";s:24:"The user just logged in.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:422:"
  // If the user has a NULL time zone, notify them to set a time zone.
  if (!$account->timezone && variable_get('configurable_timezones', 1) && variable_get('empty_timezone_message', 0)) {
    drupal_set_message(t('Configure your <a href="@user-edit">account time zone setting</a>.', array('@user-edit' => url("user/$account->uid/edit", array('query' => drupal_get_destination(), 'fragment' => 'edit-timezone')))));
  }
";}i:10;a:7:{s:4:"name";s:16:"hook_user_logout";s:10:"definition";s:35:"function hook_user_logout($account)";s:11:"description";s:25:"The user just logged out.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:122:"
  db_insert('logouts')
    ->fields(array(
      'uid' => $account->uid,
      'time' => time(),
    ))
    ->execute();
";}i:11;a:7:{s:4:"name";s:14:"hook_user_view";s:10:"definition";s:56:"function hook_user_view($account, $view_mode, $langcode)";s:11:"description";s:50:"The user's account information is being displayed.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:449:"
  if (user_access('create blog content', $account)) {
    $account->content['summary']['blog'] =  array(
      '#type' => 'user_profile_item',
      '#title' => t('Blog'),
      '#markup' => l(t('View recent blog entries'), "blog/$account->uid", array('attributes' => array('title' => t("Read !username's latest blog entries.", array('!username' => format_username($account)))))),
      '#attributes' => array('class' => array('blog')),
    );
  }
";}i:12;a:7:{s:4:"name";s:20:"hook_user_view_alter";s:10:"definition";s:38:"function hook_user_view_alter(&$build)";s:11:"description";s:65:"The user was built; the module may modify the structured content.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:328:"
  // Check for the existence of a field added by another module.
  if (isset($build['an_additional_field'])) {
    // Change its weight.
    $build['an_additional_field']['#weight'] = -10;
  }

  // Add a #post_render callback to act on the rendered HTML of the user.
  $build['#post_render'][] = 'my_module_user_post_render';
";}i:13;a:7:{s:4:"name";s:22:"hook_user_role_presave";s:10:"definition";s:38:"function hook_user_role_presave($role)";s:11:"description";s:59:"Inform other modules that a user role is about to be saved.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:126:"
  // Set a UUID for the user role if it doesn't already exist
  if (empty($role->uuid)) {
    $role->uuid = uuid_uuid();
  }
";}i:14;a:7:{s:4:"name";s:21:"hook_user_role_insert";s:10:"definition";s:37:"function hook_user_role_insert($role)";s:11:"description";s:53:"Inform other modules that a user role has been added.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:212:"
  // Save extra fields provided by the module to user roles.
  db_insert('my_module_table')
    ->fields(array(
      'rid' => $role->rid,
      'role_description' => $role->description,
    ))
    ->execute();
";}i:15;a:7:{s:4:"name";s:21:"hook_user_role_update";s:10:"definition";s:37:"function hook_user_role_update($role)";s:11:"description";s:55:"Inform other modules that a user role has been updated.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:221:"
  // Save extra fields provided by the module to user roles.
  db_merge('my_module_table')
    ->key(array('rid' => $role->rid))
    ->fields(array(
      'role_description' => $role->description
    ))
    ->execute();
";}i:16;a:7:{s:4:"name";s:21:"hook_user_role_delete";s:10:"definition";s:37:"function hook_user_role_delete($role)";s:11:"description";s:55:"Inform other modules that a user role has been deleted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:4:"user";s:9:"file_path";s:27:"public://hooks/user.api.php";s:4:"body";s:136:"
  // Delete existing instances of the deleted role.
  db_delete('my_module_table')
    ->condition('rid', $role->rid)
    ->execute();
";}}s:5:"views";a:21:{i:0;a:7:{s:4:"name";s:15:"hook_views_data";s:10:"definition";s:26:"function hook_views_data()";s:11:"description";s:34:"Describe table structure to Views.";s:11:"destination";s:17:"%module.views.inc";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:4436:"
  // This example describes how to write hook_views_data() for the following
  // table:
  //
  // CREATE TABLE example_table (
  //   nid INT(11) NOT NULL         COMMENT 'Primary key; refers to {node}.nid.',
  //   plain_text_field VARCHAR(32) COMMENT 'Just a plain text field.',
  //   numeric_field INT(11)        COMMENT 'Just a numeric field.',
  //   boolean_field INT(1)         COMMENT 'Just an on/off field.',
  //   timestamp_field INT(8)       COMMENT 'Just a timestamp field.',
  //   PRIMARY KEY(nid)
  // );

  // The 'group' index will be used as a prefix in the UI for any of this
  // table's fields, sort criteria, etc. so it's easy to tell where they came
  // from.
  $data['example_table']['table']['group'] = t('Example table');

  // Define this as a base table. In reality this is not very useful for
  // this table, as it isn't really a distinct object of its own, but
  // it makes a good example.
  $data['example_table']['table']['base'] = array(
    'field' => 'nid',
    'title' => t('Example table'),
    'help' => t("Example table contains example content and can be related to nodes."),
    'weight' => -10,
  );

  // This table references the {node} table.
  // This creates an 'implicit' relationship to the node table, so that when 'Node'
  // is the base table, the fields are automatically available.
  $data['example_table']['table']['join'] = array(
    // Index this array by the table name to which this table refers.
    // 'left_field' is the primary key in the referenced table.
    // 'field' is the foreign key in this table.
    'node' => array(
      'left_field' => 'nid',
      'field' => 'nid',
    ),
  );

  // Next, describe each of the individual fields in this table to Views. For
  // each field, you may define what field, sort, argument, and/or filter
  // handlers it supports. This will determine where in the Views interface you
  // may use the field.

  // Node ID field.
  $data['example_table']['nid'] = array(
    'title' => t('Example content'),
    'help' => t('Some example content that references a node.'),
    // Because this is a foreign key to the {node} table. This allows us to
    // have, when the view is configured with this relationship, all the fields
    // for the related node available.
    'relationship' => array(
      'base' => 'node',
      'field' => 'nid',
      'handler' => 'views_handler_relationship',
      'label' => t('Example node'),
    ),
  );

  // Example plain text field.
  $data['example_table']['plain_text_field'] = array(
    'title' => t('Plain text field'),
    'help' => t('Just a plain text field.'),
    'field' => array(
      'handler' => 'views_handler_field',
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_string',
    ),
  );

  // Example numeric text field.
  $data['example_table']['numeric_field'] = array(
    'title' => t('Numeric field'),
    'help' => t('Just a numeric field.'),
    'field' => array(
      'handler' => 'views_handler_field_numeric',
      'click sortable' => TRUE,
     ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );

  // Example boolean field.
  $data['example_table']['boolean_field'] = array(
    'title' => t('Boolean field'),
    'help' => t('Just an on/off field.'),
    'field' => array(
      'handler' => 'views_handler_field_boolean',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_boolean_operator',
      'label' => t('Published'),
      'type' => 'yes-no',
      // use boolean_field = 1 instead of boolean_field <> 0 in WHERE statment
      'use equal' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );

  // Example timestamp field.
  $data['example_table']['timestamp_field'] = array(
    'title' => t('Timestamp field'),
    'help' => t('Just a timestamp field.'),
    'field' => array(
      'handler' => 'views_handler_field_date',
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort_date',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_date',
    ),
  );

  return $data;
";}i:1;a:7:{s:4:"name";s:21:"hook_views_data_alter";s:10:"definition";s:38:"function hook_views_data_alter(&$data)";s:11:"description";s:22:"Alter table structure.";s:11:"destination";s:17:"%module.views.inc";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:625:"
  // This example alters the title of the node: nid field for the admin.
  $data['node']['nid']['title'] = t('Node-Nid');

  // This example adds a example field to the users table
  $data['users']['example_field'] = array(
    'title' => t('Example field'),
    'help' => t('Some examüple content that references a user'),
    'handler' => 'hook_handlers_field_example_field',
  );

  // This example changes the handler of the node title field.
  // In this handler you could do stuff, like preview of the node, when clicking the node title.

  $data['node']['title']['handler'] = 'modulename_handlers_field_node_title';
";}i:2;a:7:{s:4:"name";s:18:"hook_views_plugins";s:10:"definition";s:29:"function hook_views_plugins()";s:11:"description";s:65:"The full documentation for this hook is now in the advanced help.";s:11:"destination";s:17:"%module.views.inc";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:3;a:7:{s:4:"name";s:24:"hook_views_plugins_alter";s:10:"definition";s:44:"function hook_views_plugins_alter(&$plugins)";s:11:"description";s:48:"Alter existing plugins data, defined by modules.";s:11:"destination";s:17:"%module.views.inc";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:109:"
  // Add apachesolr to the base of the node row plugin.
  $plugins['row']['node']['base'][] = 'apachesolr';
";}i:4;a:7:{s:4:"name";s:14:"hook_views_api";s:10:"definition";s:25:"function hook_views_api()";s:11:"description";s:71:"Register View API information. This is required for your module to have";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:182:"
  return array(
    'api' => 2,
    'path' => drupal_get_path('module', 'example') . '/includes/views',
    'template path' => drupal_get_path('module', 'example') . 'themes',
  );
";}i:5;a:7:{s:4:"name";s:24:"hook_views_default_views";s:10:"definition";s:35:"function hook_views_default_views()";s:11:"description";s:76:"This hook allows modules to provide their own views which can either be used";s:11:"destination";s:25:"%module.views_default.inc";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:5548:"
  // Begin copy and paste of output from the Export tab of a view.
  $view = new view;
  $view->name = 'frontpage';
  $view->description = t('Emulates the default Drupal front page; you may set the default home page path to this view to make it your front page.');
  $view->tag = t('default');
  $view->base_table = 'node';
  $view->api_version = 2;
  $view->disabled = FALSE; // Edit this to true to make a default view disabled initially
  $view->display = array();
    $display = new views_display;
    $display->id = 'default';
    $display->display_title = t('Master');
    $display->display_plugin = 'default';
    $display->position = '1';
    $display->display_options = array (
    'style_plugin' => 'default',
    'style_options' =>
    array (
    ),
    'row_plugin' => 'node',
    'row_options' =>
    array (
      'teaser' => 1,
      'links' => 1,
    ),
    'relationships' =>
    array (
    ),
    'fields' =>
    array (
    ),
    'sorts' =>
    array (
      'sticky' =>
      array (
        'id' => 'sticky',
        'table' => 'node',
        'field' => 'sticky',
        'order' => 'ASC',
      ),
      'created' =>
      array (
        'id' => 'created',
        'table' => 'node',
        'field' => 'created',
        'order' => 'ASC',
        'relationship' => 'none',
        'granularity' => 'second',
      ),
    ),
    'arguments' =>
    array (
    ),
    'filters' =>
    array (
      'promote' =>
      array (
        'id' => 'promote',
        'table' => 'node',
        'field' => 'promote',
        'operator' => '=',
        'value' => '1',
        'group' => 0,
        'exposed' => false,
        'expose' =>
        array (
          'operator' => false,
          'label' => '',
        ),
      ),
      'status' =>
      array (
        'id' => 'status',
        'table' => 'node',
        'field' => 'status',
        'operator' => '=',
        'value' => '1',
        'group' => 0,
        'exposed' => false,
        'expose' =>
        array (
          'operator' => false,
          'label' => '',
        ),
      ),
    ),
    'items_per_page' => 10,
    'use_pager' => '1',
    'pager_element' => 0,
    'title' => '',
    'header' => '',
    'header_format' => '1',
    'footer' => '',
    'footer_format' => '1',
    'empty' => '',
    'empty_format' => '1',
  );
  $view->display['default'] = $display;
    $display = new views_display;
    $display->id = 'page';
    $display->display_title = t('Page');
    $display->display_plugin = 'page';
    $display->position = '2';
    $display->display_options = array (
    'defaults' =>
    array (
      'access' => true,
      'title' => true,
      'header' => true,
      'header_format' => true,
      'header_empty' => true,
      'footer' => true,
      'footer_format' => true,
      'footer_empty' => true,
      'empty' => true,
      'empty_format' => true,
      'items_per_page' => true,
      'offset' => true,
      'use_pager' => true,
      'pager_element' => true,
      'link_display' => true,
      'php_arg_code' => true,
      'exposed_options' => true,
      'style_plugin' => true,
      'style_options' => true,
      'row_plugin' => true,
      'row_options' => true,
      'relationships' => true,
      'fields' => true,
      'sorts' => true,
      'arguments' => true,
      'filters' => true,
      'use_ajax' => true,
      'distinct' => true,
    ),
    'relationships' =>
    array (
    ),
    'fields' =>
    array (
    ),
    'sorts' =>
    array (
    ),
    'arguments' =>
    array (
    ),
    'filters' =>
    array (
    ),
    'path' => 'frontpage',
  );
  $view->display['page'] = $display;
    $display = new views_display;
    $display->id = 'feed';
    $display->display_title = t('Feed');
    $display->display_plugin = 'feed';
    $display->position = '3';
    $display->display_options = array (
    'defaults' =>
    array (
      'access' => true,
      'title' => false,
      'header' => true,
      'header_format' => true,
      'header_empty' => true,
      'footer' => true,
      'footer_format' => true,
      'footer_empty' => true,
      'empty' => true,
      'empty_format' => true,
      'use_ajax' => true,
      'items_per_page' => true,
      'offset' => true,
      'use_pager' => true,
      'pager_element' => true,
      'use_more' => true,
      'distinct' => true,
      'link_display' => true,
      'php_arg_code' => true,
      'exposed_options' => true,
      'style_plugin' => false,
      'style_options' => false,
      'row_plugin' => false,
      'row_options' => false,
      'relationships' => true,
      'fields' => true,
      'sorts' => true,
      'arguments' => true,
      'filters' => true,
    ),
    'relationships' =>
    array (
    ),
    'fields' =>
    array (
    ),
    'sorts' =>
    array (
    ),
    'arguments' =>
    array (
    ),
    'filters' =>
    array (
    ),
    'displays' =>
    array (
      'default' => 'default',
      'page' => 'page',
    ),
    'style_plugin' => 'rss',
    'style_options' =>
    array (
      'description' => '',
    ),
    'row_plugin' => 'node_rss',
    'row_options' =>
    array (
      'item_length' => 'default',
    ),
    'path' => 'rss.xml',
    'title' => t('Front page feed'),
  );
  $view->display['feed'] = $display;
  // End copy and paste of Export tab output.

  // Add view to list of views to provide.
  $views[$view->name] = $view;

  // ...Repeat all of the above for each view the module should provide.

  // At the end, return array of default views.
  return $views;
";}i:6;a:7:{s:4:"name";s:30:"hook_views_default_views_alter";s:10:"definition";s:48:"function hook_views_default_views_alter(&$views)";s:11:"description";s:68:"This hook is called right before all default views are cached to the";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:135:"
  if (isset($views['taxonomy_term'])) {
    $views['taxonomy_term']->display['default']->display_options['title'] = 'Categories';
  }
";}i:7;a:7:{s:4:"name";s:30:"hook_views_query_substitutions";s:10:"definition";s:41:"function hook_views_query_substitutions()";s:11:"description";s:23:"Stub hook documentation";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:8;a:7:{s:4:"name";s:29:"hook_views_form_substitutions";s:10:"definition";s:40:"function hook_views_form_substitutions()";s:11:"description";s:74:"This hook is called to get a list of placeholders and their substitutions,";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:95:"
  return array(
    '<!--views-form-example-substitutions-->' => 'Example Substitution',
  );
";}i:9;a:7:{s:4:"name";s:24:"hook_views_form_validate";s:10:"definition";s:54:"function hook_views_form_validate($form, &$form_state)";s:11:"description";s:54:"Views form (View with form elements) validate handler.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:10;a:7:{s:4:"name";s:22:"hook_views_form_submit";s:10:"definition";s:52:"function hook_views_form_submit($form, &$form_state)";s:11:"description";s:52:"Views form (View with form elements) submit handler.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:11;a:7:{s:4:"name";s:19:"hook_views_pre_view";s:10:"definition";s:58:"function hook_views_pre_view(&$view, &$display_id, &$args)";s:11:"description";s:62:"This hook is called at the very beginning of views processing,";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:12;a:7:{s:4:"name";s:20:"hook_views_pre_build";s:10:"definition";s:37:"function hook_views_pre_build(&$view)";s:11:"description";s:70:"This hook is called right before the build process, but after displays";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:13;a:7:{s:4:"name";s:21:"hook_views_post_build";s:10:"definition";s:38:"function hook_views_post_build(&$view)";s:11:"description";s:63:"This hook is called right after the build process. The query is";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:14;a:7:{s:4:"name";s:22:"hook_views_pre_execute";s:10:"definition";s:39:"function hook_views_pre_execute(&$view)";s:11:"description";s:66:"This hook is called right before the execute process. The query is";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:15;a:7:{s:4:"name";s:23:"hook_views_post_execute";s:10:"definition";s:40:"function hook_views_post_execute(&$view)";s:11:"description";s:66:"This hook is called right after the execute process. The query has";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:16;a:7:{s:4:"name";s:21:"hook_views_pre_render";s:10:"definition";s:38:"function hook_views_pre_render(&$view)";s:11:"description";s:66:"This hook is called right before the render process. The query has";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:17;a:7:{s:4:"name";s:22:"hook_views_post_render";s:10:"definition";s:58:"function hook_views_post_render(&$view, &$output, &$cache)";s:11:"description";s:31:"Post process any rendered data.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:2:"

";}i:18;a:7:{s:4:"name";s:22:"hook_views_query_alter";s:10:"definition";s:48:"function hook_views_query_alter(&$view, &$query)";s:11:"description";s:23:"Stub hook documentation";s:11:"destination";s:17:"%module.views.inc";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:19;a:7:{s:4:"name";s:29:"hook_views_preview_info_alter";s:10:"definition";s:53:"function hook_views_preview_info_alter(&$rows, $view)";s:11:"description";s:78:"This hook should be placed in MODULENAME.views.inc and it will be auto-loaded.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}i:20;a:7:{s:4:"name";s:37:"hook_views_ui_display_top_links_alter";s:10:"definition";s:75:"function hook_views_ui_display_top_links_alter(&$links, $view, $display_id)";s:11:"description";s:70:"This hooks allows to alter the links at the top of the view edit form.";s:11:"destination";s:14:"%module.module";s:5:"group";s:5:"views";s:9:"file_path";s:28:"public://hooks/views.api.php";s:4:"body";s:24:"
  // example code here
";}}s:9:"votingapi";a:8:{i:0;a:7:{s:4:"name";s:28:"hook_votingapi_results_alter";s:10:"definition";s:81:"function hook_votingapi_results_alter(&$vote_results, $content_type, $content_id)";s:11:"description";s:70:"Adds to or changes the calculated vote results for a piece of content.";s:11:"destination";s:14:"%module.module";s:5:"group";s:9:"votingapi";s:9:"file_path";s:32:"public://hooks/votingapi.api.php";s:4:"body";s:735:"
  // We're using a MySQLism (STDDEV isn't ANSI SQL), but it's OK because this is
  // an example. And no one would ever base real code on sample code. Ever. Never.

  $sql  = "SELECT v.tag, STDDEV(v.value) as standard_deviation ";
  $sql .= "FROM {votingapi_vote} v ";
  $sql .= "WHERE v.content_type = '%s' AND v.content_id = %d AND v.value_type = 'percent' ";
  $sql .= "GROUP BY v.tag";

  $aggregates = db_query($sql, $content_type, $content_id);

  // VotingAPI wants the data in the following format:
  // $vote_results[$tag][$value_type][$aggregate_function] = $value;

  while ($aggregate = db_fetch_array($aggregates)) {
    $vote_results[$result['tag']]['percent']['standard_deviation'] = $result['standard_deviation'];
  }
";}i:1;a:7:{s:4:"name";s:29:"hook_votingapi_metadata_alter";s:10:"definition";s:46:"function hook_votingapi_metadata_alter(&$data)";s:11:"description";s:78:"Adds to or alters metadata describing Voting tags, value_types, and functions.";s:11:"destination";s:14:"%module.module";s:5:"group";s:9:"votingapi";s:9:"file_path";s:32:"public://hooks/votingapi.api.php";s:4:"body";s:1043:"
  // Document several custom tags for rating restaurants and meals.
  $data['tags']['bread'] = array(
    'name' => t('Bread'),
    'description' => t('The quality of the food at a restaurant.'),
    'module' => 'mymodule', // This is optional; we can add it for our own purposes.
  );
  $data['tags']['circuses'] = array(
    'name' => t('Circuses'),
    'description' => t('The quality of the presentation and atmosphere at a restaurant.'),
    'module' => 'mymodule',
  );

  // Document two custom aggregate function.
  $data['functions']['standard_deviation'] = array(
    'name' => t('Standard deviation'),
    'description' => t('The standard deviation of all votes cast on a given piece of content. Use this to find controversial content.'),
    'module' => 'mymodule',
  );
  $data['functions']['median'] = array(
    'name' => t('Median vote'),
    'description' => t('The median vote value cast on a given piece of content. More accurate than a pure average when there are a few outlying votes.'),
    'module' => 'mymodule',
  );
";}i:2;a:7:{s:4:"name";s:28:"hook_votingapi_relationships";s:10:"definition";s:39:"function hook_votingapi_relationships()";s:11:"description";s:65:"Return metadata used to build Views relationships on voting data.";s:11:"destination";s:14:"%module.module";s:5:"group";s:9:"votingapi";s:9:"file_path";s:32:"public://hooks/votingapi.api.php";s:4:"body";s:1108:"
  $relationships[] = array(
    // 'description' is used to construct the field description in the Views UI.
    'description' => t('users'),

    // 'content_type' contain the value that your module stores in the voting
    // api 'content_type' column. 'node', 'comment', etc.
    'content_type' => 'user',

    // 'base_table' contain the name of the Views base table that stores the
    // data your votes apply to.
    'base_table' => 'user',

    // 'content_id_column' contains the name of the views field that represents
    // your base_table's primary key. This column will be joined against the
    // voting api 'content_id' column.
    'content_id_column' => 'uid',

    // VotingAPI constructs pseudo-tables so that multiple relationships can
    // point to the same base table (normal and translation-based votes nodes
    // for example. These two columns allow you to override the names of the
    // pseudo-tables. You probably don't need to change this part unless you're
    // nedjo.
    'pseudo_vote' => 'votingapi_vote_special',
    'pseudo_cache' => 'votingapi_cache_special',
  );
";}i:3;a:7:{s:4:"name";s:31:"hook_votingapi_views_formatters";s:10:"definition";s:48:"function hook_votingapi_views_formatters($field)";s:11:"description";s:78:"Returns callback functions and descriptions to format a VotingAPI Views field.";s:11:"destination";s:14:"%module.module";s:5:"group";s:9:"votingapi";s:9:"file_path";s:32:"public://hooks/votingapi.api.php";s:4:"body";s:226:"
  if ($field->field == 'value') {
    return array('mymodule_funky_formatter' => t('MyModule value formatter'));
  }
  if ($field->field == 'tag') {
    return array('mymodule_funky_tags' => t('MyModule tag formatter'));
  }
";}i:4;a:7:{s:4:"name";s:31:"hook_votingapi_storage_add_vote";s:10:"definition";s:48:"function hook_votingapi_storage_add_vote(&$vote)";s:11:"description";s:28:"Save a vote in the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:9:"votingapi";s:9:"file_path";s:32:"public://hooks/votingapi.api.php";s:4:"body";s:102:"
  _mongodb_votingapi_prepare_vote($criteria);
  mongodb_collection('votingapi_vote')->insert($vote);
";}i:5;a:7:{s:4:"name";s:35:"hook_votingapi_storage_delete_votes";s:10:"definition";s:59:"function hook_votingapi_storage_delete_votes($votes, $vids)";s:11:"description";s:31:"Delete votes from the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:9:"votingapi";s:9:"file_path";s:32:"public://hooks/votingapi.api.php";s:4:"body";s:113:"
  mongodb_collection('votingapi_vote')->delete(array('vote_id' => array('$in' => array_map('intval', $vids))));
";}i:6;a:7:{s:4:"name";s:35:"hook_votingapi_storage_select_votes";s:10:"definition";s:63:"function hook_votingapi_storage_select_votes($criteria, $limit)";s:11:"description";s:42:"Select individual votes from the database.";s:11:"destination";s:14:"%module.module";s:5:"group";s:9:"votingapi";s:9:"file_path";s:32:"public://hooks/votingapi.api.php";s:4:"body";s:395:"
  _mongodb_votingapi_prepare_vote($criteria);
  $find = array();
  foreach ($criteria as $key => $value) {
    $find[$key] = is_array($value) ? array('$in' => $value) : $value;
  }
  $cursor = mongodb_collection('votingapi_vote')->find($find);
  if (!empty($limit)) {
    $cursor->limit($limit);
  }
  $votes = array();
  foreach ($cursor as $vote) {
    $votes[] = $vote;
  }
  return $votes;
";}i:7;a:7:{s:4:"name";s:39:"hook_votingapi_storage_standard_results";s:10:"definition";s:69:"function hook_votingapi_storage_standard_results($entity_id, $entity)";s:11:"description";s:4:"TODO";s:11:"destination";s:14:"%module.module";s:5:"group";s:9:"votingapi";s:9:"file_path";s:32:"public://hooks/votingapi.api.php";s:4:"body";s:11:"
  // TODO
";}}s:12:"vote_up_down";a:2:{i:0;a:7:{s:4:"name";s:29:"hook_vud_widget_message_codes";s:10:"definition";s:62:"function hook_vud_widget_message_codes(&$widget_message_codes)";s:11:"description";s:34:"Modify the array of know messages.";s:11:"destination";s:14:"%module.module";s:5:"group";s:12:"vote_up_down";s:9:"file_path";s:26:"public://hooks/vud.api.php";s:4:"body";s:462:"
  // Add a new message code with its description, take a look to the
  // constant definition for more information
  // This is a dummy message to notify voting is posponed. It make sense
  // on a new vud_<entity> module since we only can include new messages
  // while we are doing a real vote work.
  $widget_message_codes[VUD_NEWENTITY_WIDGET_MESSAGE_POSTPONED] = t('The voting on this is postponed, please wait a while. we will be open the voting soon');
";}i:1;a:7:{s:4:"name";s:14:"hook_vud_votes";s:10:"definition";s:32:"function hook_vud_votes(&$votes)";s:11:"description";s:41:"Modify the vote just before it is casted.";s:11:"destination";s:14:"%module.module";s:5:"group";s:12:"vote_up_down";s:9:"file_path";s:26:"public://hooks/vud.api.php";s:4:"body";s:153:"
  // let's add a new vote at the same time with an own vote tag
  $new_vote = $votes[0];
  $new_vote['tag'] = 'our_custom_tag';
  $votes[] = $new_vote;
";}}s:7:"wysiwyg";a:4:{i:0;a:7:{s:4:"name";s:19:"hook_wysiwyg_plugin";s:10:"definition";s:47:"function hook_wysiwyg_plugin($editor, $version)";s:11:"description";s:41:"Return an array of native editor plugins.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"wysiwyg";s:9:"file_path";s:30:"public://hooks/wysiwyg.api.php";s:4:"body";s:2627:"
  switch ($editor) {
    case 'tinymce':
      if ($version > 3) {
        return array(
          'myplugin' => array(
            // A URL to the plugin's homepage.
            'url' => 'http://drupal.org/project/img_assist',
            // The full path to the native editor plugin, no trailing slash.
            // Ignored when 'internal' is set to TRUE below.
            'path' => drupal_get_path('module', 'img_assist') . '/drupalimage',
            // The name of the plugin's main JavaScript file.
            // Ignored when 'internal' is set to TRUE below.
            // Default value depends on which editor the plugin is for.
            'filename' => 'editor_plugin.js',
            // A list of buttons provided by this native plugin. The key has to
            // match the corresponding JavaScript implementation. The value is
            // is displayed on the editor configuration form only.
            'buttons' => array(
              'img_assist' => t('Image Assist'),
            ),
            // A list of editor extensions provided by this native plugin.
            // Extensions are not displayed as buttons and touch the editor's
            // internals, so you should know what you are doing.
            'extensions' => array(
              'imce' => t('IMCE'),
            ),
            // A list of global, native editor configuration settings to
            // override. To be used rarely and only when required.
            'options' => array(
              'file_browser_callback' => 'imceImageBrowser',
              'inline_styles' => TRUE,
            ),
            // Boolean whether the editor needs to load this plugin. When TRUE,
            // the editor will automatically load the plugin based on the 'path'
            // variable provided. If FALSE, the plugin either does not need to
            // be loaded or is already loaded by something else on the page.
            // Most plugins should define TRUE here.
            'load' => TRUE,
            // Boolean whether this plugin is a native plugin, i.e. shipped with
            // the editor. Definition must be ommitted for plugins provided by
            // other modules. TRUE means 'path' and 'filename' above are ignored
            // and the plugin is instead loaded from the editor's plugin folder.
            'internal' => TRUE,
            // TinyMCE-specific: Additional HTML elements to allow in the markup.
            'extended_valid_elements' => array(
              'img[class|src|border=0|alt|title|width|height|align|name|style]',
            ),
          ),
        );
      }
      break;
  }
";}i:1;a:7:{s:4:"name";s:30:"hook_wysiwyg_include_directory";s:10:"definition";s:46:"function hook_wysiwyg_include_directory($type)";s:11:"description";s:48:"Register a directory containing Wysiwyg plugins.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"wysiwyg";s:9:"file_path";s:30:"public://hooks/wysiwyg.api.php";s:4:"body";s:181:"
  switch ($type) {
    case 'plugins':
      // You can just return $type, if you place your Wysiwyg plugins into a
      // sub-directory named 'plugins'.
      return $type;
  }
";}i:2;a:7:{s:4:"name";s:19:"hook_INCLUDE_plugin";s:10:"definition";s:30:"function hook_INCLUDE_plugin()";s:11:"description";s:24:"Define a Wysiwyg plugin.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"wysiwyg";s:9:"file_path";s:30:"public://hooks/wysiwyg.api.php";s:4:"body";s:1630:"
  $plugins['awesome'] = array(
    // The plugin's title; defaulting to its internal name ('awesome').
    'title' => t('Awesome plugin'),
    // The (vendor) homepage of this plugin; defaults to ''.
    'vendor url' => 'http://drupal.org/project/wysiwyg',
    // The path to the button's icon; defaults to
    // '/[path-to-module]/[plugins-directory]/[plugin-name]/images'.
    'icon path' => 'path to icon',
    // The button image filename; defaults to '[plugin-name].png'.
    'icon file' => 'name of the icon file with extension',
    // The button title to display on hover.
    'icon title' => t('Do something'),
    // An alternative path to the integration JavaScript; defaults to
    // '[path-to-module]/[plugins-directory]/[plugin-name]'.
    'js path' => drupal_get_path('module', 'mymodule') . '/awesomeness',
    // An alternative filename of the integration JavaScript; defaults to
    // '[plugin-name].js'.
    'js file' => 'awesome.js',
    // An alternative path to the integration stylesheet; defaults to
    // '[path-to-module]/[plugins-directory]/[plugin-name]'.
    'css path' => drupal_get_path('module', 'mymodule') . '/awesomeness',
    // An alternative filename of the integration stylesheet; defaults to
    // '[plugin-name].css'.
    'css file' => 'awesome.css',
    // An array of settings for this button. Required, but API is still in flux.
    'settings' => array(
    ),
    // TinyMCE-specific: Additional HTML elements to allow in the markup.
    'extended_valid_elements' => array(
      'tag1[attribute1|attribute2]',
      'tag2[attribute3|attribute4]',
    ),
  );
  return $plugins;
";}i:3;a:7:{s:4:"name";s:34:"hook_wysiwyg_editor_settings_alter";s:10:"definition";s:65:"function hook_wysiwyg_editor_settings_alter(&$settings, $context)";s:11:"description";s:31:"Act on editor profile settings.";s:11:"destination";s:14:"%module.module";s:5:"group";s:7:"wysiwyg";s:9:"file_path";s:30:"public://hooks/wysiwyg.api.php";s:4:"body";s:321:"
  // Each editor has its own collection of native settings that may be extended
  // or overridden. Please consult the respective official vendor documentation
  // for details.
  if ($context['profile']->editor == 'tinymce') {
    // Supported values to JSON data types.
    $settings['cleanup_on_startup'] = TRUE;
  }
";}}s:10:"xmlsitemap";a:14:{i:0;a:7:{s:4:"name";s:25:"hook_xmlsitemap_link_info";s:10:"definition";s:36:"function hook_xmlsitemap_link_info()";s:11:"description";s:62:"Provide information on the type of links this module provides.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:1205:"
  return array(
    'mymodule' => array(
      'label' => 'My module',
      'base table' => 'mymodule',
      'entity keys' => array(
        // Primary ID key on {base table}
        'id' => 'myid',
        // Subtype key on {base table}
        'bundle' => 'mysubtype',
      ),
      'path callback' => 'mymodule_path',
      'bundle label' => t('Subtype name'),
      'bundles' => array(
        'mysubtype1' => array(
          'label' => t('My subtype 1'),
          'admin' => array(
            'real path' => 'admin/settings/mymodule/mysubtype1/edit',
            'access arguments' => array('administer mymodule'),
          ),
          'xmlsitemap' => array(
            'status' => XMLSITEMAP_STATUS_DEFAULT,
            'priority' => XMLSITEMAP_PRIORITY_DEFAULT,
          ),
        ),
      ),
      'xmlsitemap' => array(
        // Callback function to take an array of IDs and save them as sitemap
        // links.
        'process callback' => '',
        // Callback function used in batch API for rebuilding all links.
        'rebuild callback' => '',
        // Callback function called from the XML sitemap settings page.
        'settings callback' => '',
      )
    ),
  );
";}i:1;a:7:{s:4:"name";s:26:"hook_xmlsitemap_link_alter";s:10:"definition";s:43:"function hook_xmlsitemap_link_alter(&$link)";s:11:"description";s:58:"Alter the data of a sitemap link before the link is saved.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:72:"
  if ($link['type'] == 'mymodule') {
    $link['priority'] += 0.5;
  }
";}i:2;a:7:{s:4:"name";s:27:"hook_xmlsitemap_index_links";s:10:"definition";s:44:"function hook_xmlsitemap_index_links($limit)";s:11:"description";s:33:"Index links for the XML sitemaps.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:1:"
";}i:3;a:7:{s:4:"name";s:28:"hook_xmlsitemap_context_info";s:10:"definition";s:39:"function hook_xmlsitemap_context_info()";s:11:"description";s:60:"Provide information about contexts available to XML sitemap.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:181:"
  $info['vocabulary'] = array(
    'label' => t('Vocabulary'),
    'summary callback' => 'mymodule_xmlsitemap_vocabulary_context_summary',
    'default' => 0,
  );
  return $info;
";}i:4;a:7:{s:4:"name";s:34:"hook_xmlsitemap_context_info_alter";s:10:"definition";s:51:"function hook_xmlsitemap_context_info_alter(&$info)";s:11:"description";s:31:"Alter XML sitemap context info.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:58:"
  $info['vocabulary']['label'] = t('Site vocabularies');
";}i:5;a:7:{s:4:"name";s:23:"hook_xmlsitemap_context";s:10:"definition";s:34:"function hook_xmlsitemap_context()";s:11:"description";s:58:"Provide information about the current context on the site.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:131:"
  $context = array();
  if ($vid = mymodule_get_current_vocabulary()) {
    $context['vocabulary'] = $vid;
  }
  return $context;
";}i:6;a:7:{s:4:"name";s:29:"hook_xmlsitemap_context_alter";s:10:"definition";s:49:"function hook_xmlsitemap_context_alter(&$context)";s:11:"description";s:38:"Alter the current context information.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:84:"
  if (user_access('administer taxonomy')) {
    unset($context['vocabulary']);
  }
";}i:7;a:7:{s:4:"name";s:35:"hook_xmlsitemap_context_url_options";s:10:"definition";s:60:"function hook_xmlsitemap_context_url_options(array $context)";s:11:"description";s:71:"Provide options for the url() function based on an XML sitemap context.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:1:"
";}i:8;a:7:{s:4:"name";s:41:"hook_xmlsitemap_context_url_options_alter";s:10:"definition";s:83:"function hook_xmlsitemap_context_url_options_alter(array &$options, array $context)";s:11:"description";s:56:"Alter the url() options based on an XML sitemap context.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:1:"
";}i:9;a:7:{s:4:"name";s:36:"hook_query_xmlsitemap_generate_alter";s:10:"definition";s:77:"function hook_query_xmlsitemap_generate_alter(QueryAlterableInterface $query)";s:11:"description";s:75:"Alter the query selecting data from {xmlsitemap} during sitemap generation.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:514:"
  $sitemap = $query->getMetaData('sitemap');
  if (!empty($sitemap->context['vocabulary'])) {
    $node_condition = db_and();
    $node_condition->condition('type', 'taxonomy_term');
    $node_condition->condition('subtype', $sitemap->context['vocabulary']);
    $normal_condition = db_and();
    $normal_condition->condition('type', 'taxonomy_term', '<>');
    $condition = db_or();
    $condition->condition($node_condition);
    $condition->condition($normal_condition);
    $query->condition($condition);
  }
";}i:10;a:7:{s:4:"name";s:34:"hook_xmlsitemap_sitemap_operations";s:10:"definition";s:45:"function hook_xmlsitemap_sitemap_operations()";s:11:"description";s:54:"Provide information about XML sitemap bulk operations.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:1:"
";}i:11;a:7:{s:4:"name";s:30:"hook_xmlsitemap_sitemap_delete";s:10:"definition";s:58:"function hook_xmlsitemap_sitemap_delete(stdClass $sitemap)";s:11:"description";s:32:"Respond to XML sitemap deletion.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:33:"public://hooks/xmlsitemap.api.php";s:4:"body";s:72:"
  db_query("DELETE FROM {mytable} WHERE smid = '%s'", $sitemap->smid);
";}i:12;a:7:{s:4:"name";s:27:"hook_xmlsitemap_engine_info";s:10:"definition";s:38:"function hook_xmlsitemap_engine_info()";s:11:"description";s:44:"Provide a list of supported sitemap engines.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:41:"public://hooks/xmlsitemap_engines.api.php";s:4:"body";s:155:"
  $engines['example'] = array(
    'name' => t('Example search engine'),
    'url' => 'http://example.com/ping?sitemap=[sitemap]'
  );
  return $engines;
";}i:13;a:7:{s:4:"name";s:33:"hook_xmlsitemap_engine_info_alter";s:10:"definition";s:53:"function hook_xmlsitemap_engine_info_alter(&$engines)";s:11:"description";s:34:"Alter the list of sitemap engines.";s:11:"destination";s:14:"%module.module";s:5:"group";s:10:"xmlsitemap";s:9:"file_path";s:41:"public://hooks/xmlsitemap_engines.api.php";s:4:"body";s:129:"
  $engines['example']['name'] = t('Kitten Search');
  $engines['example']['url'] = 'http://kittens.com/ping?sitemap=[sitemap]';
";}}}