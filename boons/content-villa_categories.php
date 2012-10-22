<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 */
?>

<div id="con">

	<?php
	global $wp_query;
	$args = array_merge( $wp_query->query_vars, array( 'post_type' => 'villa', 'posts_per_page' => 1 ) );
	query_posts( $args );
	?>
	<?php
	/* Start the loop */
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>

			<?php
				global $post;
				$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' , false );
			?>

			<section <?php post_class('clearfix'); ?> style="background-image: url(<?php echo $src[0]; ?>);">


				<div id="text-content">

						<div id="sole-agency-logo">
							<div class="sa-wrap">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/sa-badge.png" alt="Boon Villas - sole agency logo" width="29px" height="34px" />
							</div> <!-- #sa-wrap -->
						</div> <!-- end #sole-agency-logo -->
						<h1 class="entry-title acc-header dark-side"><span><?php the_title(); ?></span></h1>
						<div class="the-content">
						<p class="dark-side"><span><?php echo get_the_excerpt(); ?></span></p>
						</div><!-- end #the-content-->
				</div><!-- #text-content -->
			</section>
		<?php
		endwhile; ?>
				<div id="details">
					<div id="details-control">

						<?php /* Display navigation to next/previous pages when applicable */ ?>
							<nav id="nav-villas">
								<div id="nav-previous">
									<?php
									$placeholder = get_bloginfo('stylesheet_directory').'/images/details-nav-previous.png';
									next_posts_link('<img src='.$placeholder.' width="50" height="32" />'); ?>
								</div>
								<div id="nav-label">
									<?php _e('Properties', 'boons'); ?>
								</div>
								<div id="nav-next">
									<?php
									$placeholder = get_bloginfo('stylesheet_directory').'/images/details-nav-next.png';
									previous_posts_link('<img src='.$placeholder.' width="50" height="32" />'); ?>
								</div>
							</nav><!-- end nav-below -->

						<button href="#details-window" id="detail-on" class="nav-toggle"><?php _e('Show Details', 'boons'); ?></button> <!-- show/hide details -->
					</div><!-- #details-control -->
					<div id="details-window" class="dark-side" style="display: none;">
						<?php the_content(); ?>
					</div><!-- #details-window-->
				</div><!-- #details -->
	<?php endif;
	/* End of the Loop */
	?>
</div><!-- #accordion -->