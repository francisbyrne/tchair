<?php

$view = new view;
$view->name = 'admin_content_node';
$view->description = 'View, edit, and delete your site\'s content.';
$view->tag = 'admin';
$view->base_table = 'node';
$view->human_name = '';
$view->core = 0;
$view->api_version = '3.0-alpha1';
$view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

/* Display: Defaults */
$handler = $view->new_display('default', 'Defaults', 'default');
$handler->display->display_options['title'] = 'Content';
$handler->display->display_options['css_class'] = 'admin-views-view';
$handler->display->display_options['use_ajax'] = TRUE;
$handler->display->display_options['access']['type'] = 'perm';
$handler->display->display_options['access']['perm'] = 'administer nodes';
$handler->display->display_options['cache']['type'] = 'none';
$handler->display->display_options['query']['type'] = 'views_query';
$handler->display->display_options['exposed_form']['type'] = 'basic';
$handler->display->display_options['exposed_form']['options']['reset_button'] = TRUE;
$handler->display->display_options['exposed_form']['options']['autosubmit'] = 0;
$handler->display->display_options['exposed_form']['options']['autosubmit_hide'] = 1;
$handler->display->display_options['pager']['type'] = 'full';
$handler->display->display_options['pager']['options']['items_per_page'] = 50;
$handler->display->display_options['style_plugin'] = 'bulk';
$handler->display->display_options['style_options']['columns'] = array(
  'title' => 'title',
  'type' => 'type',
  'name' => 'name',
  'status' => 'status',
  'changed' => 'changed',
  'edit_node' => 'edit_node',
  'delete_node' => 'delete_node',
);
$handler->display->display_options['style_options']['default'] = 'changed';
$handler->display->display_options['style_options']['info'] = array(
  'title' => array(
    'sortable' => 1,
    'default_sort_order' => 'asc',
    'align' => '',
    'separator' => '',
  ),
  'type' => array(
    'sortable' => 1,
    'default_sort_order' => 'asc',
    'align' => '',
    'separator' => '',
  ),
  'name' => array(
    'sortable' => 1,
    'default_sort_order' => 'asc',
    'align' => '',
    'separator' => '',
  ),
  'status' => array(
    'sortable' => 1,
    'default_sort_order' => 'desc',
    'align' => '',
    'separator' => '',
  ),
  'changed' => array(
    'sortable' => 1,
    'default_sort_order' => 'asc',
    'align' => '',
    'separator' => '',
  ),
  'edit_node' => array(
    'align' => '',
    'separator' => '',
  ),
  'delete_node' => array(
    'align' => '',
    'separator' => '',
  ),
);
$handler->display->display_options['style_options']['override'] = 1;
$handler->display->display_options['style_options']['sticky'] = 1;
$handler->display->display_options['style_options']['order'] = 'desc';
$handler->display->display_options['style_options']['empty_table'] = 1;
$handler->display->display_options['style_options']['selected_operations'] = array(
  'node_assign_owner_action' => 'node_assign_owner_action',
  'views_bulk_operations_delete_node_action' => 'views_bulk_operations_delete_node_action',
  'views_bulk_operations_taxonomy_action' => 'views_bulk_operations_taxonomy_action',
  'node_publish_action' => 'node_publish_action',
  'node_unpublish_action' => 'node_unpublish_action',
  'node_mass_update:a27b9efabcd054685a549378b174ad11' => 0,
  'system_message_action' => 0,
  'views_bulk_operations_action' => 0,
  'views_bulk_operations_script_action' => 0,
  'node_make_sticky_action' => 0,
  'node_make_unsticky_action' => 0,
  'node_mass_update:8ce21b08bb8e773d10018b484fe4815e' => 0,
  'node_mass_update:c4d3b28efb86fd703619a50b74d43794' => 0,
  'views_bulk_operations_argument_selector_action' => 0,
  'node_promote_action' => 0,
  'node_mass_update:14de7d028b4bffdf2b4a266562ca18ac' => 0,
  'node_mass_update:9c585624b9b3af0b4687d5f97f35e047' => 0,
  'system_goto_action' => 0,
  'node_unpromote_action' => 0,
  'node_save_action' => 0,
  'system_send_email_action' => 0,
  'node_unpublish_by_keyword_action' => 0,
  'node_mass_update:0ccad85c1ebe4c9ceada1aa64293b080' => 0,
);
$handler->display->display_options['style_options']['execution_type'] = '2';
$handler->display->display_options['style_options']['display_type'] = '0';
$handler->display->display_options['style_options']['skip_confirmation'] = 0;
$handler->display->display_options['style_options']['display_result'] = 1;
$handler->display->display_options['style_options']['merge_single_action'] = 1;
$handler->display->display_options['style_options']['hide_select_all'] = 0;
/* No results behavior: Global: Text area */
$handler->display->display_options['empty']['area']['id'] = 'area';
$handler->display->display_options['empty']['area']['table'] = 'views';
$handler->display->display_options['empty']['area']['field'] = 'area';
$handler->display->display_options['empty']['area']['empty'] = FALSE;
/* Relationship: Content revision: User */
$handler->display->display_options['relationships']['uid_1']['id'] = 'uid_1';
$handler->display->display_options['relationships']['uid_1']['table'] = 'node_revision';
$handler->display->display_options['relationships']['uid_1']['field'] = 'uid';
$handler->display->display_options['relationships']['uid_1']['label'] = 'User';
$handler->display->display_options['relationships']['uid_1']['required'] = 1;
/* Relationship: Content: Taxonomy terms on node */
$handler->display->display_options['relationships']['term_node_tid']['id'] = 'term_node_tid';
$handler->display->display_options['relationships']['term_node_tid']['table'] = 'node';
$handler->display->display_options['relationships']['term_node_tid']['field'] = 'term_node_tid';
/* Field: Content: Title */
$handler->display->display_options['fields']['title']['id'] = 'title';
$handler->display->display_options['fields']['title']['table'] = 'node';
$handler->display->display_options['fields']['title']['field'] = 'title';
$handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['title']['alter']['trim'] = 0;
$handler->display->display_options['fields']['title']['alter']['word_boundary'] = 1;
$handler->display->display_options['fields']['title']['alter']['ellipsis'] = 1;
$handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['title']['alter']['html'] = 0;
$handler->display->display_options['fields']['title']['link_to_node'] = 1;
/* Field: Content: Type */
$handler->display->display_options['fields']['type']['id'] = 'type';
$handler->display->display_options['fields']['type']['table'] = 'node';
$handler->display->display_options['fields']['type']['field'] = 'type';
$handler->display->display_options['fields']['type']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['type']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['type']['alter']['trim'] = 0;
$handler->display->display_options['fields']['type']['alter']['word_boundary'] = 1;
$handler->display->display_options['fields']['type']['alter']['ellipsis'] = 1;
$handler->display->display_options['fields']['type']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['type']['alter']['html'] = 0;
$handler->display->display_options['fields']['type']['link_to_node'] = 0;
/* Field: User: Name */
$handler->display->display_options['fields']['name']['id'] = 'name';
$handler->display->display_options['fields']['name']['table'] = 'users';
$handler->display->display_options['fields']['name']['field'] = 'name';
$handler->display->display_options['fields']['name']['label'] = 'Author';
$handler->display->display_options['fields']['name']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['name']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['name']['alter']['trim'] = 0;
$handler->display->display_options['fields']['name']['alter']['word_boundary'] = 1;
$handler->display->display_options['fields']['name']['alter']['ellipsis'] = 1;
$handler->display->display_options['fields']['name']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['name']['alter']['html'] = 0;
$handler->display->display_options['fields']['name']['link_to_user'] = 1;
$handler->display->display_options['fields']['name']['overwrite_anonymous'] = 0;
/* Field: Content: Published */
$handler->display->display_options['fields']['status']['id'] = 'status';
$handler->display->display_options['fields']['status']['table'] = 'node';
$handler->display->display_options['fields']['status']['field'] = 'status';
$handler->display->display_options['fields']['status']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['status']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['status']['alter']['trim'] = 0;
$handler->display->display_options['fields']['status']['alter']['word_boundary'] = 1;
$handler->display->display_options['fields']['status']['alter']['ellipsis'] = 1;
$handler->display->display_options['fields']['status']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['status']['alter']['html'] = 0;
$handler->display->display_options['fields']['status']['not'] = 0;
/* Field: Content: Updated date */
$handler->display->display_options['fields']['changed']['id'] = 'changed';
$handler->display->display_options['fields']['changed']['table'] = 'node';
$handler->display->display_options['fields']['changed']['field'] = 'changed';
$handler->display->display_options['fields']['changed']['label'] = 'Updated';
$handler->display->display_options['fields']['changed']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['changed']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['changed']['alter']['absolute'] = 0;
$handler->display->display_options['fields']['changed']['alter']['external'] = 0;
$handler->display->display_options['fields']['changed']['alter']['replace_spaces'] = 0;
$handler->display->display_options['fields']['changed']['alter']['trim_whitespace'] = 0;
$handler->display->display_options['fields']['changed']['alter']['trim'] = 0;
$handler->display->display_options['fields']['changed']['alter']['nl2br'] = 0;
$handler->display->display_options['fields']['changed']['alter']['word_boundary'] = 1;
$handler->display->display_options['fields']['changed']['alter']['ellipsis'] = 1;
$handler->display->display_options['fields']['changed']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['changed']['alter']['html'] = 0;
$handler->display->display_options['fields']['changed']['element_label_colon'] = 1;
$handler->display->display_options['fields']['changed']['element_default_classes'] = 1;
$handler->display->display_options['fields']['changed']['hide_empty'] = 0;
$handler->display->display_options['fields']['changed']['empty_zero'] = 0;
$handler->display->display_options['fields']['changed']['date_format'] = 'short';
/* Field: Content: Edit link */
$handler->display->display_options['fields']['edit_node']['id'] = 'edit_node';
$handler->display->display_options['fields']['edit_node']['table'] = 'node';
$handler->display->display_options['fields']['edit_node']['field'] = 'edit_node';
$handler->display->display_options['fields']['edit_node']['label'] = '';
$handler->display->display_options['fields']['edit_node']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['trim'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['word_boundary'] = 1;
$handler->display->display_options['fields']['edit_node']['alter']['ellipsis'] = 1;
$handler->display->display_options['fields']['edit_node']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['html'] = 0;
$handler->display->display_options['fields']['edit_node']['hide_empty'] = 0;
$handler->display->display_options['fields']['edit_node']['empty_zero'] = 0;
/* Field: Content: Delete link */
$handler->display->display_options['fields']['delete_node']['id'] = 'delete_node';
$handler->display->display_options['fields']['delete_node']['table'] = 'node';
$handler->display->display_options['fields']['delete_node']['field'] = 'delete_node';
$handler->display->display_options['fields']['delete_node']['label'] = '';
$handler->display->display_options['fields']['delete_node']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['delete_node']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['delete_node']['alter']['trim'] = 0;
$handler->display->display_options['fields']['delete_node']['alter']['word_boundary'] = 1;
$handler->display->display_options['fields']['delete_node']['alter']['ellipsis'] = 1;
$handler->display->display_options['fields']['delete_node']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['delete_node']['alter']['html'] = 0;
$handler->display->display_options['fields']['delete_node']['hide_empty'] = 0;
$handler->display->display_options['fields']['delete_node']['empty_zero'] = 0;
/* Sort criterion: Content: Post date */
$handler->display->display_options['sorts']['created']['id'] = 'created';
$handler->display->display_options['sorts']['created']['table'] = 'node';
$handler->display->display_options['sorts']['created']['field'] = 'created';
$handler->display->display_options['sorts']['created']['order'] = 'DESC';
/* Filter criterion: Content: Title */
$handler->display->display_options['filters']['title']['id'] = 'title';
$handler->display->display_options['filters']['title']['table'] = 'node';
$handler->display->display_options['filters']['title']['field'] = 'title';
$handler->display->display_options['filters']['title']['operator'] = 'contains';
$handler->display->display_options['filters']['title']['exposed'] = TRUE;
$handler->display->display_options['filters']['title']['expose']['operator_id'] = 'title_op';
$handler->display->display_options['filters']['title']['expose']['label'] = 'Title';
$handler->display->display_options['filters']['title']['expose']['use_operator'] = FALSE;
$handler->display->display_options['filters']['title']['expose']['operator'] = 'title_op';
$handler->display->display_options['filters']['title']['expose']['identifier'] = 'title';
$handler->display->display_options['filters']['title']['expose']['remember'] = 1;
/* Filter criterion: Content: Type */
$handler->display->display_options['filters']['type']['id'] = 'type';
$handler->display->display_options['filters']['type']['table'] = 'node';
$handler->display->display_options['filters']['type']['field'] = 'type';
$handler->display->display_options['filters']['type']['exposed'] = TRUE;
$handler->display->display_options['filters']['type']['expose']['operator_id'] = 'type_op';
$handler->display->display_options['filters']['type']['expose']['label'] = 'Type';
$handler->display->display_options['filters']['type']['expose']['use_operator'] = FALSE;
$handler->display->display_options['filters']['type']['expose']['operator'] = 'type_op';
$handler->display->display_options['filters']['type']['expose']['identifier'] = 'type';
$handler->display->display_options['filters']['type']['expose']['remember'] = 1;
$handler->display->display_options['filters']['type']['expose']['reduce'] = 0;
/* Filter criterion: User: Name */
$handler->display->display_options['filters']['uid']['id'] = 'uid';
$handler->display->display_options['filters']['uid']['table'] = 'users';
$handler->display->display_options['filters']['uid']['field'] = 'uid';
$handler->display->display_options['filters']['uid']['relationship'] = 'uid_1';
$handler->display->display_options['filters']['uid']['value'] = '';
$handler->display->display_options['filters']['uid']['exposed'] = TRUE;
$handler->display->display_options['filters']['uid']['expose']['operator_id'] = 'uid_op';
$handler->display->display_options['filters']['uid']['expose']['label'] = 'Author';
$handler->display->display_options['filters']['uid']['expose']['use_operator'] = FALSE;
$handler->display->display_options['filters']['uid']['expose']['operator'] = 'uid_op';
$handler->display->display_options['filters']['uid']['expose']['identifier'] = 'name';
$handler->display->display_options['filters']['uid']['expose']['remember'] = 1;
$handler->display->display_options['filters']['uid']['expose']['reduce'] = 0;
/* Filter criterion: Content: Published */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'node';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = 'All';
$handler->display->display_options['filters']['status']['exposed'] = TRUE;
$handler->display->display_options['filters']['status']['expose']['operator_id'] = '';
$handler->display->display_options['filters']['status']['expose']['label'] = 'Published';
$handler->display->display_options['filters']['status']['expose']['use_operator'] = FALSE;
$handler->display->display_options['filters']['status']['expose']['operator'] = 'status_op';
$handler->display->display_options['filters']['status']['expose']['identifier'] = 'status';
$handler->display->display_options['filters']['status']['expose']['remember'] = 1;
$handler->display->display_options['filters']['status']['expose']['multiple'] = FALSE;
/* Filter criterion: Taxonomy term: Vocabulary */
$handler->display->display_options['filters']['vid']['id'] = 'vid';
$handler->display->display_options['filters']['vid']['table'] = 'taxonomy_term_data';
$handler->display->display_options['filters']['vid']['field'] = 'vid';
$handler->display->display_options['filters']['vid']['relationship'] = 'term_node_tid';
$handler->display->display_options['filters']['vid']['exposed'] = TRUE;
$handler->display->display_options['filters']['vid']['expose']['operator_id'] = 'vid_op';
$handler->display->display_options['filters']['vid']['expose']['label'] = 'Vocabulary';
$handler->display->display_options['filters']['vid']['expose']['use_operator'] = FALSE;
$handler->display->display_options['filters']['vid']['expose']['operator'] = 'vid_op';
$handler->display->display_options['filters']['vid']['expose']['identifier'] = 'vid';
$handler->display->display_options['filters']['vid']['expose']['remember'] = 1;
$handler->display->display_options['filters']['vid']['expose']['reduce'] = 0;

/* Display: System */
$handler = $view->new_display('system', 'System', 'system_1');
$handler->display->display_options['path'] = 'admin/content';
$translatables['admin_content_node'] = array(
  t('Defaults'),
  t('Content'),
  t('more'),
  t('Apply'),
  t('Reset'),
  t('Sort by'),
  t('Asc'),
  t('Desc'),
  t('Items per page'),
  t('- All -'),
  t('Offset'),
  t('User'),
  t('term'),
  t('Title'),
  t('Type'),
  t('Author'),
  t('Published'),
  t('Updated'),
  t('Vocabulary'),
  t('System'),
);
