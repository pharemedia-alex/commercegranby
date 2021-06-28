<?php

/**
 * @link              https://commercegranby.com
 * @since             1.0.0
 * @package           commerceGranby_Cpt
 * @wordpress-plugin
 * Plugin Name:       Commerce Granby website custom content
 * Plugin URI:        https://commercegranby.com
 * Description:       custom post types, custom taxonomies, custom options and custom roles for Commerce Granby website
 * Version:           1.0.0
 * Author:            Alex Bussiere
 * Author URI:        https://pharemedia.com
 * Domain			  cgranby-cc
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WP_CPT_VERSION', '1.0.0' );

/**
 * Includes the files containing Custom Post Types code.
 * @since 1.0.0
 * @uses require_once()
 */

require_once( dirname( __FILE__ ) . '/inc/cpt/cpt_collaboration.php' );
require_once( dirname( __FILE__ ) . '/inc/cpt/cpt_document.php' );
require_once( dirname( __FILE__ ) . '/inc/cpt/cpt_event.php' );
require_once( dirname( __FILE__ ) . '/inc/cpt/cpt_press.php' );

/**
 * Includes the files containing Custom Taxonomies code.
 * @since 1.0.0
 * @uses require_once()
 */

//require_once( dirname( __FILE__ ) . '/inc/taxonomies/tax_team.php' );

/**
 * Includes the files containing Custom Options
 * @since 1.0.0
 * @uses require_once()
 */

require_once( dirname( __FILE__ ) . '/inc/options/general.php' );

/**
 * Includes the files containing Custom Role code.
 * @since 1.0.0
 * @uses require_once()
 */

require_once( dirname( __FILE__ ) . '/inc/user_roles/user_roles.php' );

//Flush rewrite rules
function rewrite_flush() {
    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'rewrite_flush' );
