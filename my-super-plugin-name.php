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

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once PLUGIN_PATH .'inc/Init.php';


if ( class_exists( 'Init' ) ) {
	Init::register_services();
}



// if (!class_exists('SuperPlugin')) {

//   class SuperPlugin
//   {
//     // public : can be accessed everywhere

//     // private : can be accessed only within the class itself.

//     // protected : can be accessed only within the class itself and its subclass



//     public $plugin;

//     function __construct()
//     {
//       $this->plugin = plugin_basename(__FILE__);
//     }

//     function register()
//     {

//       add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
//     }

//     public function settings_link($links)
//     {
//       $settings_link = '<a href="admin.php?page=my_super_plugin_name">Settings</a>';
//       array_push($links, $settings_link);
//       return $links;
//     }


//     protected function create_post_type()
//     {
//       add_action('init', array($this, 'custom_post_type'));
//     }

//     function custom_post_type()
//     {
//       register_post_type('book', ['public' => true, 'label' => 'Books']);
//     }


//     function activate()
//     {
//       Activate::activate();
//     }
//   }

//   // initialize the instance of SuperPlugin class
//   $superPlugin = new SuperPlugin();
//   $superPlugin->register();

//   // activation
//   register_activation_hook(__FILE__, array($superPlugin, 'activate'));

//   // deactivation
//   register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));

// }