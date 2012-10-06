<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'boons', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );


/**
 * Set the content width based on the theme's design and stylesheet.
 */
 if ( ! isset( $content_width ) )
 	$content_width = 960;

 /** Tell Wordpress to run boons() when the 'after_setup_theme' hook is run.
  */
 add_action( 'after_setup_theme', 'boons' );
 if ( ! function_exists( 'boons' ) ):


 	/**
 	 * Sets up theme defaults and registers support for Wordpress features.
 	 */
 	function boons() {
 		//This theme styles the visual editor with editor-style.css to match the theme style.
 		add_editor_style();

 		if ( function_exists( 'add_theme_support' ) ) {
 			//This theme uses post thumbnails
 		 	add_theme_support( 'post-thumbnails' );

 			// Add default posts and comments RSS feed links to head
 			add_theme_support( 'automatic-feed-links' );
		}

 		//This theme uses wp_nav_menu() in one location
 		register_nav_menus( array(
 			'primary' => 'Primary Navigation',
 			'contact' => 'Contact Menu',
 			'properties' => 'Properties For Sale'
 			)
 		);
 	}
 endif;

/**
 * Get wp_nav_menu() fall back, wp_page_menu, to show home link
 */

  function boons_page_menu_args ( $args ) {
  	$args['show_home'] = true;
 	return $args;
  }
  add_filter( 'wp_page_menu_args', 'boons_page_menu_args' );



/****************************************
 * Add custom taxonomy for Villas *
 ****************************************/

	add_action('init', 'villa_categories_register');

	function villa_categories_register() {
	$labels = array(
	    'name'                          => 'Villas Brackets',
	    'singular_name'                 => 'Villas Bracket',
	    'search_items'                  => 'Search Villas Brackets',
	    'popular_items'                 => 'Popular Villas Brackets',
	    'all_items'                     => 'All Villas Brackets',
	    'parent_item'                   => 'Parent Villas Bracket',
	    'edit_item'                     => 'Edit Villas Bracket',
	    'update_item'                   => 'Update Villas Bracket',
	    'add_new_item'                  => 'Add New Villas Bracket',
	    'new_item_name'                 => 'New Villas Bracket',
	    'separate_items_with_commas'    => 'Separate villas brackets with commas',
	    'add_or_remove_items'           => 'Add or remove villas brackets',
	    'choose_from_most_used'         => 'Choose from most used villas brackets'
	    );

	$args = array(
	    'label'                         => 'Villas Brackets',
	    'labels'                        => $labels,
	    'public'                        => true,
	    'hierarchical'                  => true,
	    'show_ui'                       => true,
	    'show_in_nav_menus'             => true,
	    'args'                          => array( 'orderby' => 'term_order' ),
	    'rewrite'                       => array( 'slug' => 'villas', 'with_front' => true, 'hierarchical' => true ),
	    'query_var'                     => true
	);

	register_taxonomy( 'villa_categories', 'villa', $args );
	}

/*****************************************
 * Add custom post type for Villas *
 *****************************************/

	add_action('init', 'villa_register');

	function villa_register() {

		$labels = array(
			'name' => 'Villas',
			'singular_name' => 'Villa',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Villa',
			'edit_item' => 'Edit Villa',
			'new_item' => 'New Villa',
			'view_item' => 'View Villa',
			'search_items' => 'Search Villas',
			'not_found' =>  'Nothing found',
			'not_found_in_trash' => 'Nothing found in Trash',
			'parent_item_colon' => ''
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'villas', 'with_front' => true ),
			'capability_type' => 'post',
			'menu_position' => 6,
			'supports' => array('title', 'excerpt', 'editor','thumbnail')
		  );

		register_post_type( 'villa' , $args );
	}

/**
 * Styling the icons for testimonials in back-end
 **/

	add_action('admin_head', 'plugin_header_property');
	function plugin_header_property() {
		global $post_type;
		?>
		<style>
		<?php if (($_GET['post_type'] == 'property') || ($post_type == 'property')) : ?>
		#icon-edit {
			/* icon next to title */
			background:transparent url("<?php bloginfo( 'stylesheet_directory' ); ?>/images/property-gray.png") no-repeat; }
		<?php endif; ?>
		#adminmenu #menu-posts-property div.wp-menu-image{
			/* icon in left menu */
			background:transparent url("<?php bloginfo( 'stylesheet_directory' ); ?>/images/property-gray16.png") no-repeat center center;}
		#adminmenu #menu-posts-testimonial:hover div.wp-menu-image,#adminmenu #menu-posts-testimonial.wp-has-current-submenu div.wp-menu-image{
			/* icon in left menu hover */
			background:transparent url("<?php bloginfo( 'stylesheet_directory' );?>/images/testimonial-hover16.png") no-repeat center center;\
			}
	</style>
	<?php
	}

/** qTranslate for menu **/
 add_filter('walker_nav_menu_start_el', 'qtrans_in_nav_el', 10, 4);
	function qtrans_in_nav_el($item_output, $item, $depth, $args){
	    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

	   // Determine integration with qTranslate Plugin
	   if (function_exists('qtrans_convertURL')) {
	      $attributes .= ! empty( $item->url ) ? ' href="' . qtrans_convertURL(esc_attr( $item->url )) .'"' : '';
	   } else {
	      $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
	   }

	   $item_output = $args->before;
	   $item_output .= '<a'. $attributes .'>';
	   $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	   $item_output .= '</a>';
	   $item_output .= $args->after;

	   return $item_output;
	}
?>