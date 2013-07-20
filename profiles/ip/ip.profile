<?php

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * Allows the profile to alter the site configuration form.
 */
function ip_form_install_configure_form_alter(&$form, $form_state) {
  // Pre-populate the site name with the server name.
  $form['site_information']['site_name']['#default_value'] = $_SERVER['SERVER_NAME'];
}

/**
 * Implements hook_install_tasks() 
 *
 * 
 */
function ip_install_tasks() {
	
	//System config
	include_once 'inc/system_config/ipconfig_enable_modules.inc';
	include_once 'inc/system_config/ipconfig_uninstall.inc';

	//Module config
	include_once 'inc/module_config/ipconfig_admin_menu.inc';			
	include_once 'inc/module_config/ipconfig_extlink.inc';
	include_once 'inc/module_config/ipconfig_iconizer.inc';
	include_once 'inc/module_config/ipconfig_imce.inc';
	include_once 'inc/module_config/ipconfig_menu_per_role.inc';	
	include_once 'inc/module_config/ipconfig_pathauto.inc';
	include_once 'inc/module_config/ipconfig_wysiwyg.inc';
	include_once 'inc/module_config/ipconfig_xmlsitemap.inc';


	//Site_config:	
	include_once 'inc/site_config/ipconfig_account_settings.inc';
	include_once 'inc/site_config/ipconfig_block.inc';
	include_once 'inc/site_config/ipconfig_content_type.inc';
	include_once 'inc/site_config/ipconfig_regional_settings.inc';
	include_once 'inc/site_config/ipconfig_text_formats.inc';
	include_once 'inc/site_config/ipconfig_user_permission.inc';
	include_once 'inc/site_config/ipconfig_user_role.inc';	
	include_once 'inc/site_config/ipconfig_add_user.inc';	
	include_once 'inc/site_config/ipconfig_admin_menu_add_content.inc';

	$tasks['ipconfig_enable_modules'] = array(
	  'display_name' => st('Enable modules'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_uninstall'] = array(
	  'display_name' => st('Uninstall modules'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_content_type'] = array(
	  'display_name' => st('Content type settings'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);

	$tasks['ipconfig_block'] = array(
	  'display_name' => st('Block settings'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);

	$tasks['ipconfig_account_settings'] = array(
	  'display_name' => st('Account settings'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_user_role'] = array(
	  'display_name' => st('Use role settings'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
		
	$tasks['ipconfig_add_user'] = array(
	  'display_name' => st('Add user'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_regional_settings'] = array(
	  'display_name' => st('Regional settings'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_text_formats'] = array(
	  'display_name' => st('Text Format settings'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_admin_menu'] = array(
	  'display_name' => st('Module: Admin menu'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_extlink'] = array(
	  'display_name' => st('Module: External Link'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_imce'] = array(
	  'display_name' => st('Module: IMCE'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_iconizer'] = array(
	  'display_name' => st('Module: Iconizer'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_wysiwyg'] = array(
	  'display_name' => st('Module: WYSIWYG'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_xmlsitemap'] = array(
	  'display_name' => st('Module: XML sitemap'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_pathauto'] = array(
	  'display_name' => st('Module: Pathauto'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_menu_per_role'] = array(
	  'display_name' => st('Module: Menu per role'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_admin_menu_add_content'] = array(
	  'display_name' => st('Module: Menu per role'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);
	
	$tasks['ipconfig_user_permission'] = array(
	  'display_name' => st('User permssion'),
	  'display' => TRUE,
	  'type' => 'normal',
	  'run' => INSTALL_TASK_RUN_IF_REACHED,
	);

	
	return $tasks;

}