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


/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/



// If this file is called directly, abort!!!
defined('ABSPATH') or die('Hey, you can not access this file, you silly human!');


// Define CONSTANTS
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));



// import other classes
require_once PLUGIN_PATH . 'inc/Init.php';
require_once PLUGIN_PATH . 'inc/Base/Activate.php';
require_once PLUGIN_PATH . 'inc/Base/Deactivate.php';

// activation
register_activation_hook(__FILE__, array('Activate', 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));


/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('Init')) {
	Init::register_services();
}



// if (class_exists('SuperPlugin')) {
//   class SuperPlugin
//   {
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
// }