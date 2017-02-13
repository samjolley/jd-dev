<?php
/**
 * Front page for the Utility Pro theme
 *
 * @package Utility_Pro
 * @author  Carrie Dils
 * @license GPL-2.0+
 */

add_action( 'genesis_meta', 'utility_pro_homepage_setup' );
/**
 * Set up the homepage layout by conditionally loading sections when widgets
 * are active.
 *
 * @since 1.0.0
 */
function utility_pro_homepage_setup() {

	$home_sidebars = array(
		'home_welcome' 	   => is_active_sidebar( 'utility-home-welcome' ),
		'home_gallery_1'   => is_active_sidebar( 'utility-home-gallery-1' ),
		'call_to_action'   => is_active_sidebar( 'utility-call-to-action' ),
		'logos'   => is_active_sidebar( 'utility-logos' ),
		'home_works_1'   => is_active_sidebar( 'utility-home-works-1' ),
		'section-1'   => is_active_sidebar( 'utility-section-1' ),
	);

	// Return early if no sidebars are active.
	if ( ! in_array( true, $home_sidebars ) ) {
		return;
	}

	// Get static home page number.
	$page = ( get_query_var( 'page' ) ) ? (int) get_query_var( 'page' ) : 1;

	// Only show home page widgets on page 1.
	if ( 1 === $page ) {

		// Add home welcome area if "Home Welcome" widget area is active.
		if ( $home_sidebars['home_welcome'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_home_welcome' );
		}

		// Add home gallery area if "Home Gallery 1" widget area is active.
		if ( $home_sidebars['home_gallery_1'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_home_gallery' );
		}

		// Add call to action area if "Call to Action" widget area is active.
		if ( $home_sidebars['call_to_action'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_call_to_action' );
		}

		// Add home logos area if "Logos Section" widget area is active.
		if ( $home_sidebars['logos'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_logos' );
		}

		// Add how it works widget area if "How it Works 1" widget area is active.
		if ( $home_sidebars['home_works_1'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_home_works' );
		}

		// Add home Section 1 area if "Section 1" widget area is active.
		if ( $home_sidebars['section-1'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_section_1' );
		}
	}



	// Full width layout.
	// Uncomment the filter below if you'd like a full-width layout on the front page.
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Filter site title markup to include an h1.
	add_filter( 'genesis_site_title_wrap', 'utility_pro_return_h1' );

	// Remove standard loop and replace with loop showing Posts, not Page content.
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	// We've already removed the loop. We don't want to add this custom one in.
	// add_action ( 'genesis_loop', 'utility_pro_front_loop' );
}

/**
 * Use h1 for site title on a static front page.
 *
 * Hat tip to Bill Erickson for the suggestion.
 *
 * @see http://www.billerickson.net/genesis-h1-front-page/
 *
 * @since 1.2.0
 */
function utility_pro_return_h1( $wrap ) {
	return 'h1';
}

/**
 * Display content for the "Home Welcome" section.
 *
 * @since 1.0.0
 */
function utility_pro_add_home_welcome() {

	genesis_widget_area( 'utility-home-welcome',
		array(
			'before' => '<div class="home-welcome"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

/**
 * Display content for the "Home Gallery" section.
 *
 * @since 1.0.0
 */
function utility_pro_add_home_gallery() {

	printf( '<div %s>', genesis_attr( 'home-gallery' ) );
	genesis_structural_wrap( 'home-gallery' );

	genesis_widget_area(
		'utility-home-gallery-1',
		array(
			'before' => '<div class="home-gallery-1 widget-area">',
			'after'  => '</div>',
		)
	);

	genesis_widget_area(
		'utility-home-gallery-2',
		array(
			'before' => '<div class="home-gallery-2 widget-area">',
			'after'  => '</div>',
		)
	);

	genesis_widget_area(
		'utility-home-gallery-3',
		array(
			'before' => '<div class="home-gallery-3 widget-area">',
			'after'  => '</div>',
		)
	);
	genesis_widget_area(
		'utility-home-gallery-4',
		array(
			'before' => '<div class="home-gallery-4 widget-area">',
			'after'  => '</div>',
		)
	);

	genesis_structural_wrap( 'home-gallery', 'close' );
	echo '</div>';
}

/**
 * Display content for the "Call to action" section.
 *
 * @since 1.0.0
 */
function utility_pro_add_call_to_action() {

	genesis_widget_area(
		'utility-call-to-action',
		array(
			'before' => '<div class="call-to-action-bar"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

/**
 * Display content for the "Logos Section".
 *
 * @since 1.0.0
 */
function utility_pro_add_logos() {

	genesis_widget_area( 'utility-logos',
		array(
			'before' => '<div class="logos"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

/**
 * Display content for the "Home Gallery" section.
 *
 * @since 1.0.0
 */
function utility_pro_add_home_works() {

	printf( '<div %s>', genesis_attr( 'home-works' ) );
	genesis_structural_wrap( 'home-works' );

	genesis_widget_area(
		'utility-home-works-1',
		array(
			'before' => '<div class="home-works-1 widget-area">',
			'after'  => '</div>',
		)
	);

	genesis_widget_area(
		'utility-home-works-2',
		array(
			'before' => '<div class="home-works-2 widget-area">',
			'after'  => '</div>',
		)
	);

	genesis_widget_area(
		'utility-home-works-3',
		array(
			'before' => '<div class="home-works-3 widget-area">',
			'after'  => '</div>',
		)
	);
	genesis_widget_area(
		'utility-home-works-4',
		array(
			'before' => '<div class="home-works-4 widget-area">',
			'after'  => '</div>',
		)
	);

	genesis_structural_wrap( 'home-works', 'close' );
	echo '</div>';
}

/**
 * Display content for "Section 1".
 *
 * @since 1.0.0
 */
function utility_pro_add_section_1() {

	genesis_widget_area( 'utility-section-1',
		array(
			'before' => '<div class="section-1"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}


/**
 * Display latest posts instead of static page.
 *
 * @since 1.0.0
 */
function utility_pro_front_loop() {
	global $query_args;
	genesis_custom_loop( wp_parse_args( $query_args, array( 'post_type' => 'post', 'paged' => get_query_var( 'page' ) ) ) );
}

genesis();