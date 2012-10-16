<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title><?php wp_title(''); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie8-and-down.css" />
<![endif]-->

<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php 	wp_enqueue_script("jquery");
		wp_enqueue_script("jquery-ui-accordion");
		wp_enqueue_script("jquery-ui-tabs");
	 	wp_enqueue_script("slides-jquery",
						get_template_directory_uri() . '/js/slides.min.jquery.js',
						array('jquery')
					);
	 	/* wp_enqueue_script("slides-jquery",
						get_template_directory_uri() . '/js/slides.js',
						array('jquery')
					); */
		wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="xpage" class="clearfix">
