<?php

/**
 * Registers the Custom Post Type hooks.
 * @since 1.0.0
 * @uses add_action()
 */

add_action( 'init' ,'register_tax_team');

/**
 * Creates a custom taxonomy team
 * @since 1.0.0
 * @uses register_post_type()
 */

function register_tax_team() {

	$cpt = array(
		'team-member'
	);
	
	$labels = array(
		'name' => _x( 'Teams', 'taxonomy general name', 'cgranby-cc' ),
		'singular_name' => _x( 'Team', 'taxonomy singular name', 'cgranby-cc' ),
		'search_items' =>  __( 'Search for a team', 'cgranby-cc' ),
		'all_items' => __( 'All Teams', 'cgranby-cc' ),
		'parent_item' => __( 'Parent Team', 'cgranby-cc' ),
		'parent_item_colon' => __( 'Parent team:', 'cgranby-cc' ),
		'edit_item' => __( 'Edit Team', 'cgranby-cc' ), 
		'update_item' => __( 'Update Team', 'cgranby-cc' ),
		'add_new_item' => __( 'Add a new Team', 'cgranby-cc' ),
		'new_item_name' => __( 'New Team', 'cgranby-cc' ),
		'menu_name' => __( 'Teams', 'cgranby-cc' )
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => false,
		//'rewrite' => array( 'slug' => 'my-slug' ),
	);

	register_taxonomy('team', $cpt , $args);
}