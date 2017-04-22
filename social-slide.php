<?php
/**
 *
 * @link              http://wonkasoft.com
 * @since             1.0.0
 * @package           Social_Slide
 *
 * @wordpress-plugin
 * Plugin Name:       Social Slide
 * Plugin URI:        git@github.com:llister15/socialslide.git
 * Description:       This plugin is design to use the Facebook / Twitter API to show a well designed social feed
 * Version:           1.0.0
 * Author:            Wonkasoft
 * Author URI:        http://wonkasoft.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       social-slide
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


// Add Settings links
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );

function add_action_links ( $links ) {
     $mylinks = array(
     '<a href="' . admin_url( 'admin.php?page=/admin/index.php' ) . '">Settings</a>',
     );
    return array_merge( $links, $mylinks );
 }

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-social-slide-activator.php
 */
function activate_social_slide() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-social-slide-activator.php';
	Social_Slide_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-social-slide-deactivator.php
 */
function deactivate_social_slide() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-social-slide-deactivator.php';
	Social_Slide_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_social_slide' );
register_deactivation_hook( __FILE__, 'deactivate_social_slide' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-social-slide.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_social_slide() {

	$plugin = new Social_Slide();
	$plugin->run();

}
run_social_slide();
