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

			<?php // Does permalink of the post contain 'sole-agency'?
				$villa_permalink = preg_match( '~sole\-agency~', get_permalink( $post->ID ) );
				echo get_permalink( $post->ID );
				echo $villa_permalink;

			$term = get_term_by( 'slug', get_query_var( '700-900-sole-agency' ), get_query_var( 'villa_categories' ) );
			if ( $term -> parent > 0 ) {echo 'sole-taxonomy';}
			echo $term->parent;

				if ( is_tax('villa_categories','sole-agency') === true ) {echo 'sole';} else { echo 'joint';}


				if ( $villa_permalink === 0 ) { // if not, do as normal
			?>

				<div id="text-content">
						<h1 class="entry-title acc-header"><span class="dark-side"><?php the_title(); ?></span></h1>
						<div class="the-content">
						<?php
							$excerpt = get_the_excerpt();
						?>
						<p><span class="dark-side"><?php _e( $excerpt, 'boons' ); ?></span></p>

						<?php
							} else { // Permalink does contain sole-agency -> display logo
						?>
				<div id="text-content sole-agency">
								<h1 class="entry-title acc-header"><span class="dark-side"><?php the_title(); ?></span></h1>
								<div class="the-content">
								<?php
									$excerpt = get_the_excerpt();
								?>
								<p><span class="dark-side"><?php _e( $excerpt, 'boons' ); ?></span></p>
						<?php
							} //end of if-else permalink
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