<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 */
?>

<div id="con">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<section <?php post_class('clearfix'); ?>>
						<h1 class="entry-title dark-side"><?php the_title(); ?></h1>
						<div class="the-content dark-side">
						<?php the_content(); ?>
						</div><!-- end #the-content-->
			</section>
		<?php
		endwhile;
	endif;
	?>
</div><!-- #accordion -->