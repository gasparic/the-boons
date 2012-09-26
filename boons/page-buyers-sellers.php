<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 * Template Name: Buyers-Sellers
 */

	get_header();
?>


<?php
	global $post;
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' , false );
?>

<div id="wrap" style="background-image: url(<?php echo $src[0]; ?>);">
<div id="main">

	<div id="content">
		<?php get_template_part( 'content', 'buyers' ); ?>
	</div><!-- end content -->
	<div id="controls">
		<?php get_template_part( 'navigation' ); ?>
	</div>
<?php get_footer(); ?>