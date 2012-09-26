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
						<h1 class="entry-title acc-header dark-side"><a href="#" ><?php the_title(); ?></a></h1>
						<div class="the-content dark-side">
						<?php
							$page_ID = $page -> ID;
							the_excerpt();
						?>
						</div><!-- end #the-content-->
				</div><!-- #text-content -->
			</section>
		<?php
		endwhile; ?>
				<div id="details">
					<div id="details-control">

						<?php /* Display navigation to next/previous pages when applicable */ ?>
							<nav id="nav-villas">
								<div class="nav-previous">
									<?php previous_post_link(); ?>
								</div>
								<div class="nav-next">
									<?php next_post_link(); ?>
								</div>
							</nav><!-- end nav-below -->

						<button id="detail-on">Details</button> <!-- show/hide details -->
					</div><!-- #details-control -->
					<div id="details-window" class="dark-side">
						<?php the_content(); ?>
					</div><!-- #details-window-->
				</div><!-- #details -->
	<?php endif;
	/* End of the Loop */
	?>
</div><!-- #accordion -->