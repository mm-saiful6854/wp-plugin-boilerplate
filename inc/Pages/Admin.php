<?php

/**
 * @package  MySuperPluginName
 */

require_once PLUGIN_PATH . 'inc/Api/SettingsApi.php';


class Admin
{

	public $settings;

	public $pages = array();
	public $subpages = array();

	public function __construct()
	{
		$this->settings = new SettingsApi();

		$this->pages = array(
			array(
				'page_title' => 'Super Plugin Setting',
				'menu_title' => 'SMS Gateway Settings',
				'capability' => 'manage_options',
				'menu_slug' => 'my_super_plugin_name',
				'callback' => function() {require_once PLUGIN_PATH . 'templates/settings.php';},
				'icon_url' => 'dashicons-store',
				'position' => 110
			)
		);

		$this->subpages = array(
			array(
				'parent_slug' => 'my_super_plugin_name', 
				'page_title' => 'submenu 1', 
				'menu_title' => 'submenu 1', 
				'capability' => 'manage_options', 
				'menu_slug' => 'submenu_1', 
				'callback' => function() { echo '<h1>submenu 1</h1>'; }
			),
			array(
				'parent_slug' => 'my_super_plugin_name', 
				'page_title' => 'Custom Taxonomies', 
				'menu_title' => 'submenu 2', 
				'capability' => 'manage_options', 
				'menu_slug' => 'submenu_2', 
				'callback' => function() { echo '<h1>submenu 2</h1>'; }
			)
		);
	}

	public function register()
	{
		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
	}
}
