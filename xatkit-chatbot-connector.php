<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wordpress.org/plugins/xatkit-chatbot-connector/
 * @since             1.0.0
 * @package           Xatkit_Chatbot_Connector
 *
 * @wordpress-plugin
 * Plugin Name:       Xatkit Chatbot Connector
 * Plugin URI:        https://wordpress.org/plugins/xatkit-chatbot-connector
 * Description:       Plugin to integrate Xatkit chatbots in WordPress
 * Version:           3.0.1
 * Author:            Xatkit
 * Author URI:        https://xatkit.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       xatkit-chatbot-connector
 * Domain Path:       /languages
 *
 * This plugin is distributed under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or  any later version.
 *
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'XATKIT_CHATBOT_CONNECTOR', '3.0.1' );

add_action('plugins_loaded', 'xatkit_chatbot_connector_translate');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-xatkit-chatbot-connector.php
 */
function activate_xatkit_chatbot_connector() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-xatkit-chatbot-connector-activator.php';
    Xatkit_Chatbot_Connector_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-xatkit-chatbot-connector-deactivator.php
 */
function deactivate_xatkit_chatbot_connector() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-xatkit-chatbot-connector-deactivator.php';
    Xatkit_Chatbot_Connector_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_xatkit_chatbot_connector' );
register_deactivation_hook( __FILE__, 'deactivate_xatkit_chatbot_connector' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-xatkit-chatbot-connector.php';

/**
 * Internacionalitzation.
 */
function xatkit_chatbot_connector_translate() {
	$text_domain = 'xatkitcom';
	$path_languages = basename(dirname(__FILE__)) . '/languages/';
	load_plugin_textdomain($text_domain, FALSE, $path_languages);
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_xatkit_chatbot_connector() {

    $plugin = new Xatkit_Chatbot_Connector();
    $plugin->run();
}



run_xatkit_chatbot_connector();








