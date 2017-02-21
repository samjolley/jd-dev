<?php
/**
 * Utility Pro.
 *
 * @package      Utility_Pro
 * @link         http://www.carriedils.com/utility-pro
 * @author       Carrie Dils
 * @copyright    Copyright (c) 2015, Carrie Dils
 * @license      GPL-2.0+
 */

/**
 * Register the widget areas enabled by default in Utility.
 *
 * @since  1.0.0
 */
function utility_pro_register_widget_areas() {

	$widget_areas = array(
		array(
			'id'          => 'utility-bar',
			'name'        => __( 'Utility Bar', 'utility-pro' ),
			'description' => __( 'This is the utility bar across the top of page.', 'utility-pro' ),
		),
		array(
			'id'          => 'utility-home-welcome',
			'name'        => __( 'Home Welcome', 'utility-pro' ),
			'description' => __( 'This is the welcome section at the top of the home page.', 'utility-pro' ),
		),
		array(
			'id'          => 'utility-hard-website',
			'name'        => __( 'Hard Website', 'utility-pro' ),
			'description' => __( 'This is the hard-to-build-a-website section on the home page.', 'utility-pro' ),
		),
		array(
			'id'          => 'utility-call-to-action',
			'name'        => __( 'Call to Action', 'utility-pro' ),
			'description' => __( 'This is the Call to Action section on the home page.', 'utility-pro' ),
		),
		array(
			'id'          => 'utility-logos',
			'name'        => __( 'Logos Section', 'utility-pro' ),
			'description' => __( 'This is the Logos section on the home page.', 'utility-pro' ),
		),
		array(
			'id'          => 'utility-can-do-1',
			'name'        => sprintf( _x( 'What I Can Do %d', 'Group of What I Can Do widget areas', 'utility-pro' ), 1 ),
			'description' => sprintf( _x( 'What I Can Do %d widget area on home page.', 'Description of widget area', 'utility-pro' ), 1 ),
		),
		array(
			'id'          => 'utility-can-do-2',
			'name'        => sprintf( _x( 'What I Can Do %d', 'Group of What I Can Do widget areas', 'utility-pro' ), 2 ),
			'description' => sprintf( _x( 'What I Can Do %d widget area on home page.', 'Description of widget area', 'utility-pro' ), 2 ),
		),
		array(
			'id'          => 'utility-can-do-3',
			'name'        => sprintf( _x( 'What I Can Do %d', 'Group of What I Can Do widget areas', 'utility-pro' ), 3 ),
			'description' => sprintf( _x( 'What I Can Do %d widget area on home page.', 'Description of widget area', 'utility-pro' ), 3 ),
		),
		array(
			'id'          => 'utility-can-do-4',
			'name'        => sprintf( _x( 'What I Can Do %d', 'Group of What I Can Do widget areas', 'utility-pro' ), 4 ),
			'description' => sprintf( _x( 'What I Can Do %d widget area on home page.', 'Description of widget area', 'utility-pro' ), 4 ),
		),
		array(
			'id'          => 'utility-home-why',
			'name'        => __( 'Why Me', 'utility-pro' ),
			'description' => __( 'This is the Why Me section on the home page.', 'utility-pro' ),
		),
		array(
			'id'          => 'utility-home-works-1',
			'name'        => sprintf( _x( 'How it Works %d', 'Group of How it Works widget areas', 'utility-pro' ), 1 ),
			'description' => sprintf( _x( 'How it Works %d widget area on home page.', 'Description of widget area', 'utility-pro' ), 1 ),
		),
		array(
			'id'          => 'utility-home-works-2',
			'name'        => sprintf( _x( 'How it Works %d', 'Group of How it Works widget areas', 'utility-pro' ), 2 ),
			'description' => sprintf( _x( 'How it Works %d widget area on home page.', 'Description of widget area', 'utility-pro' ), 2 ),
		),
		array(
			'id'          => 'utility-home-works-3',
			'name'        => sprintf( _x( 'How it Works %d', 'Group of How it Works widget areas', 'utility-pro' ), 3 ),
			'description' => sprintf( _x( 'How it Works %d widget area on home page.', 'Description of widget area', 'utility-pro' ), 3 ),
		),
		array(
			'id'          => 'utility-home-works-4',
			'name'        => sprintf( _x( 'How it Works %d', 'Group of How it Works widget areas', 'utility-pro' ), 4 ),
			'description' => sprintf( _x( 'How it Works %d widget area on home page.', 'Description of widget area', 'utility-pro' ), 4 ),
		),
		array(
			'id'          => 'utility-section-1',
			'name'        => __( 'Section 1', 'utility-pro' ),
			'description' => __( 'This is the Section 1 area on the home page.', 'utility-pro' ),
		),
	);

	$widget_areas = apply_filters( 'utility_pro_default_widget_areas', $widget_areas );

	foreach ( $widget_areas as $widget_area ) {
		genesis_register_sidebar( $widget_area );
	}
}