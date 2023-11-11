<?php

/**
 * @package  MySuperPluginName
 */



class Admin
{
	public function register()
	{
		add_action('admin_menu', array($this, 'add_admin_pages'));
	}

	public function add_admin_pages()
	{
		//add_menu_page is wp built-in method to add menu page.
		add_menu_page('Super Plugin Setting', 'Super Plugin Controller', 'manage_options', 'my_super_plugin_name', array($this, 'admin_index'), 'dashicons-store', 110);
	}

	public function admin_index()
	{
		require_once PLUGIN_PATH . 'templates/admin.php';
	}
}
