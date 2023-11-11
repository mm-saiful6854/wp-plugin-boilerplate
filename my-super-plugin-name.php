<?php
/**
 * @package MySuperPluginName
 */


/**
 * Plugin Name: My super plugin name
 * Plugin URI: https://wordpress.org/plugins/my-super-plugin-name/
 * Description: my plugin description
 * Version: 1.0.0
 * Author: Md Saiful Islam
 * Author URI: https://knowinforms.com
 * Text Domain: sstd
 * Requires at least: 6.2
 * Requires PHP: 7.4
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://github.com/mm-saiful6854
 */



/*=============================================
ensure security
===============================================*/
defined('ABSPATH') or die('Hey, you can not access this file, you silly human!');


if (!class_exists('SuperPlugin')) {

  class SuperPlugin
  {
    // public : can be accessed everywhere

    // private : can be accessed only within the class itself.

    // protected : can be accessed only within the class itself and its subclass



    public $plugin;

    function __construct()
    {
      $this->plugin = plugin_basename(__FILE__);
    }

    function register()
    {
      add_action('admin_enqueue_scripts', array($this, 'enqueue'));

      add_action('admin_menu', array($this, 'add_admin_pages'));

      add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    public function settings_link($links)
    {
      $settings_link = '<a href="admin.php?page=my_super_plugin_name">Settings</a>';
      array_push($links, $settings_link);
      return $links;
    }

    public function add_admin_pages()
    {
      //add_menu_page is wp built-in method to add menu page.
      add_menu_page('Super Plugin Setting', 'Super Plugin Controller', 'manage_options', 'my_super_plugin_name', array($this, 'admin_index'), 'dashicons-store', 110);
    }

    public function admin_index()
    {
      require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }

    protected function create_post_type()
    {
      add_action('init', array($this, 'custom_post_type'));
    }

    function custom_post_type()
    {
      register_post_type('book', ['public' => true, 'label' => 'Books']);
    }

    function enqueue()
    {
      // enqueue all our scripts
      wp_enqueue_style('mypluginstyle', plugins_url('/assets/css/mystyle.css', __FILE__));
      wp_enqueue_script('mypluginscript', plugins_url('/assets/js/myscript.js', __FILE__));
    }

    function activate()
    {
      //Activate::activate();
      flush_rewrite_rules();
    }

    function deactivate()
    {
      flush_rewrite_rules();
    }
  }

  // initialize the instance of SuperPlugin class
  $superPlugin = new SuperPlugin();
  $superPlugin->register();

  // activation
  register_activation_hook(__FILE__, array($superPlugin, 'activate'));

  // deactivation
  //register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));

  register_deactivation_hook(__FILE__, array($superPlugin, 'deactivate'));

}