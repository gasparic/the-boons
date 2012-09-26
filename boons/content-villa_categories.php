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
						<h1 class="entry-title acc-header"><span class="dark-side"><?php the_title(); ?></span></h1>
						<div class="the-content">
						<? /*php
							$page_ID = $page -> ID;
							 $before = '<p><span class="price dark-side">Price bracket: ';
							 $sep = ', ';
							 $after = '</span></p>';
							 $ters_a = get_the_term_list( $post->ID, 'villa_categories', $before, $sep, $after );
							$terms_as_text = strip_tags ($ters_a, '<p><span>');
							_e( $terms_as_text, 'boons');*/
							$excerpt = get_the_excerpt();
						?>
						<p><span class="dark-side"><?php _e( $excerpt, 'boons' ); ?></span></p>
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
								<div id="nav-next">
									<?php
									$placeholder = get_bloginfo('stylesheet_directory').'/images/details-nav-next.png';
									previous_posts_link('<img src='.$placeholder.' width="50" height="32" />'); ?>
								</div>
							</nav><!-- end nav-below -->

						<button href="#details-window" id="detail-on" class="nav-toggle">Show Details</button> <!-- show/hide details -->
					</div><!-- #details-control -->
					<div id="details-window" class="dark-side" style="display: none;">
						<?php the_content(); ?>
					</div><!-- #details-window-->
				</div><!-- #details -->
	<?php endif;
	/* End of the Loop */
	?>
</div><!-- #accordion -->