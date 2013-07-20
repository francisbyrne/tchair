<?php

/**
 * @file
 *   Only administrators can register accounts.
 *
 */

function ipconfig_account_settings(){
	
	module_load_include("inc", "user", "user.admin");
	$form_id = 'user_admin_settings';
	$form_state = array (
	  'values' => 
	  array (
	    'anonymous' => 'Anonymous',
	    'user_admin_role' => '3',
	    'user_register' => '0',
	    'user_email_verification' => 1,
	    'user_cancel_method' => 'user_cancel_block',
	    'user_signatures' => NULL,
	    'user_pictures' => 1,
	    'user_picture_path' => 'pictures',
	    'user_picture_default' => '',
	    'user_picture_style' => 'thumbnail',
	    'user_picture_dimensions' => '1024x1024',
	    'user_picture_file_size' => '800',
	    'user_picture_guidelines' => '',
	    'email__active_tab' => 'edit-email-admin-created',
	    'user_mail_register_admin_created_subject' => 'An administrator created an account for you at [site:name]',
	    'user_mail_register_admin_created_body' => '[user:name],

	A site administrator at [site:name] has created an account for you. You may now log in by clicking this link or copying and pasting it to your browser:

	[user:one-time-login-url]

	This link can only be used once to log in and will lead you to a page where you can set your password.

	After setting your password, you will be able to log in at [site:login-url] in the future using:

	username: [user:name]
	password: Your password

	--  [site:name] team',
	    'user_mail_register_pending_approval_subject' => 'Account details for [user:name] at [site:name] (pending admin approval)',
	    'user_mail_register_pending_approval_body' => '[user:name],

	Thank you for registering at [site:name]. Your application for an account is currently pending approval. Once it has been approved, you will receive another e-mail containing information about how to log in, set your password, and other details.


	--  [site:name] team',
	    'user_mail_register_no_approval_required_subject' => 'Account details for [user:name] at [site:name]',
	    'user_mail_register_no_approval_required_body' => '[user:name],

	Thank you for registering at [site:name]. You may now log in by clicking this link or copying and pasting it to your browser:

	[user:one-time-login-url]

	This link can only be used once to log in and will lead you to a page where you can set your password.

	After setting your password, you will be able to log in at [site:login-url] in the future using:

	username: [user:name]
	password: Your password

	--  [site:name] team',
	    'user_mail_password_reset_subject' => 'Replacement login information for [user:name] at [site:name]',
	    'user_mail_password_reset_body' => '[user:name],

	A request to reset the password for your account has been made at [site:name].

	You may now log in by clicking this link or copying and pasting it to your browser:

	[user:one-time-login-url]

	This link can only be used once to log in and will lead you to a page where you can set your password. It expires after one day and nothing will happen if it\'s not used.

	--  [site:name] team',
	    'user_mail_status_activated_notify' => 1,
	    'user_mail_status_activated_subject' => 'Account details for [user:name] at [site:name] (approved)',
	    'user_mail_status_activated_body' => '[user:name],

	Your account at [site:name] has been activated.

	You may now log in by clicking this link or copying and pasting it into your browser:

	[user:one-time-login-url]

	This link can only be used once to log in and will lead you to a page where you can set your password.

	After setting your password, you will be able to log in at [site:login-url] in the future using:

	username: [user:name]
	password: Your password

	--  [site:name] team',
	    'user_mail_status_blocked_notify' => NULL,
	    'user_mail_status_blocked_subject' => 'Account details for [user:name] at [site:name] (blocked)',
	    'user_mail_status_blocked_body' => '[user:name],

	Your account on [site:name] has been blocked.

	--  [site:name] team',
	    'user_mail_cancel_confirm_subject' => 'Account cancellation request for [user:name] at [site:name]',
	    'user_mail_cancel_confirm_body' => '[user:name],

	A request to cancel your account has been made at [site:name].

	You may now cancel your account on [site:url-brief] by clicking this link or copying and pasting it into your browser:

	[user:cancel-url]

	NOTE: The cancellation of your account is not reversible.

	This link expires in one day and nothing will happen if it is not used.

	--  [site:name] team',
	    'user_mail_status_canceled_notify' => NULL,
	    'user_mail_status_canceled_subject' => 'Account details for [user:name] at [site:name] (canceled)',
	    'user_mail_status_canceled_body' => '[user:name],

	Your account on [site:name] has been canceled.

	--  [site:name] team',
	    'submit' => 'Save configuration',
	    'form_build_id' => 'form-QerVefbO-Oopa2apBuwfU6iGJt1tkFf9SYcreTvx4V4',
	    'form_token' => 'CMDewt-4AJtqNAZn0wI8BqqlJw3eUa3YBdOPK09ZQtI',
	    'form_id' => 'user_admin_settings',
	    'op' => 'Save configuration',
	  ),
	);
	drupal_form_submit ($form_id, $form_state);
}