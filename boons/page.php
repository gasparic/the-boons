<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 */

	get_header();

?>


<?php
	global $post;
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false );
?>

<div id="wrap" style="background-image: url(<?php echo $src[0]; ?>);">
<div id="main">

	<div id="content">
		<?php get_template_part( 'content', 'page' ); ?>
	</div><!-- end content -->
	<div id="controls">
		<?php get_template_part( 'navigation' ); ?>
	</div>
<?php get_footer(); ?>