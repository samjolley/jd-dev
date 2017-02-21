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
		'call_to_action'   => is_active_sidebar( 'utility-call-to-action' ),
		'logos'   => is_active_sidebar( 'utility-logos' ),
		'hard_website'   => is_active_sidebar( 'utility-hard-website' ),
		'can_do_1'   => is_active_sidebar( 'utility-can-do-1' ),
		'home_why'   => is_active_sidebar( 'utility-home-why' ),
		'home_works_1'   => is_active_sidebar( 'utility-home-works-1' ),
		'home-testimonials'   => is_active_sidebar( 'utility-home-testimonials' ),
		'footer-cta'   => is_active_sidebar( 'utility-footer-cta' ),
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

		// Add call to action area if "Call to Action" widget area is active.
		if ( $home_sidebars['call_to_action'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_call_to_action' );
		}

		// Add home logos area if "Logos Section" widget area is active.
		if ( $home_sidebars['logos'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_logos' );
		}

		// Add hard website area if "Hard Website" widget area is active.
		if ( $home_sidebars['hard_website'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_hard_website' );
		}

		// Add Can Do widget area if "What I Can Do For You" widget area is active.
		if ( $home_sidebars['can_do_1'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_can_do_1' );
		}

		// Add why me website area if "Why Me" widget area is active.
		if ( $home_sidebars['home_why'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_home_why' );
		}

		// Add how it works widget area if "How it Works 1" widget area is active.
		if ( $home_sidebars['home_works_1'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_home_works_1' );
		}

		// Add home Testimonials area if "Home Testimonials" widget area is active.
		if ( $home_sidebars['home-testimonials'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_home_testimonials' );
		}

		// Add footer cta area if "Footer CTA" widget area is active.
		if ( $home_sidebars['footer-cta'] ) {
			add_action( 'genesis_after_header', 'utility_pro_add_footer_cta' );
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
 * Display content for the "Hard to Build a Website Section".
 *
 * @since 1.0.0
 */
function utility_pro_add_hard_website() {

	genesis_widget_area( 'utility-hard-website',
		array(
			'before' => '<div class="hard-website"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

/**
 * Display content for the "What I Can Do" section.
 *
 * @since 1.0.0
 */
function utility_pro_add_can_do_1() {

	printf( '<div %s>', genesis_attr( 'can-do' ) );
	genesis_structural_wrap( 'can-do');

	genesis_widget_area(
		'utility-can-do-1',
		array(
			'before' => '<div class="can-do-1 widget-area">',
			'after'  => '</div>',
		)
	);

	genesis_widget_area(
		'utility-can-do-2',
		array(
			'before' => '<div class="can-do-2 widget-area">',
			'after'  => '</div>',
		)
	);

	genesis_widget_area(
		'utility-can-do-3',
		array(
			'before' => '<div class="can-do-3 widget-area">',
			'after'  => '</div>',
		)
	);
	genesis_widget_area(
		'utility-can-do-4',
		array(
			'before' => '<div class="can-do-4 widget-area">',
			'after'  => '</div>',
		)
	);

	genesis_structural_wrap( 'can-do', 'close' );
	echo '</div>';
}

/**
 * Display content for the "Why Me" section.
 *
 * @since 1.0.0
 */
function utility_pro_add_home_why() {

	genesis_widget_area( 'utility-home-why',
		array(
			'before' => '<div class="home-why" id="why"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

/**
 * Display content for the "Home Works" section.
 *
 * @since 1.0.0
 */
function utility_pro_add_home_works_1() {

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
 * Display content for "Testimonials".
 *
 * @since 1.0.0
 */

function utility_pro_add_home_testimonials() {

	genesis_widget_area( 'utility-home-testimonials',
		array(
			'before' => '<div class="home-testimonials" id="home-testimonials"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

/**
 * Display content for "Footer CTA".
 *
 * @since 1.0.0
 */

function utility_pro_add_footer_cta() {

	genesis_widget_area( 'utility-footer-cta',
		array(
			'before' => '<div class="footer-cta" id="footer-cta"><div class="wrap">',
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