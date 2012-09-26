<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 */
?>

<div id="con">
	<?php
	$args_villa = array(
		'post_type' => 'villa',
		'posts_per_page' => 1
	);
	$villa_query = new WP_Query ( $args_villa );
	/* Start the loop */
	if ( $villa_query -> have_posts() ) :
		while ( $villa_query -> have_posts() ) : $villa_query -> the_post(); ?>

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
					<nav id="details-control">

						<?php /* Display navigation to next/previous pages when applicable */ ?>
						<?php if (  $villa_query->max_num_pages > 1 ) : ?>
							<nav id="nav-villas">
								<div class="nav-previous">
									<?php posts_nav_link('','','&lt;'); ?>
								</div>
								<div class="nav-next">
									<?php posts_nav_link('', '&gt;', ''); ?>
								</div>
							</nav><!-- end nav-below -->
						<?php endif; ?>

						<button id="detail-on">Details</button> <!-- show/hide details -->
					</nav><!-- #details-control -->
					<div id="details-window" class="dark-side">
						<?php the_content(); ?>
					</div><!-- #details-window-->
				</div><!-- #details -->
	<?php endif;
	/* End of the Loop */
	?>
</div><!-- #accordion -->