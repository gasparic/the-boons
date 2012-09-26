<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 */

	get_header();
?>


<?php
	global $post;
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' , false );
?>

<div id="wrap">
<div id="main">
	<div id="content-villas">
		<?php get_template_part( 'content', 'villa' ); ?>
	</div><!-- end content-villas -->
	<div id="controls">
		<?php get_template_part( 'navigation' ); ?>
	</div>
<?php get_footer(); ?>