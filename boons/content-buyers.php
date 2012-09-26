<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 */
?>

<div id="accordion">

	<?php
		$mypages = get_pages( array(
			'child_of' => $post->ID,
			'sort_column' => 'menu_order',
			'sort_order' => 'asc'
			) );


		foreach( $mypages as $page ) {
			// $page_ID = $page -> ID;
			$content = $page->post_content;
			if ( ! $content ) // Check for empty page
				continue;
			$content = apply_filters( 'the_content', $content );
		?>
		<section <?php post_class('clearfix'); ?>>
				<h1 class="entry-title acc-header dark-side"><a href="#<?php echo $page_ID;?>" id="<?php echo $page_ID;?>"><?php _e( $page->post_title, 'boons'); ?></a></h1>
				<div class="the-content dark-side">
					<?php _e( $content, 'boons'); ?>
				</div><!-- .the-content -->
		</section>

	<?php
		} // foreach end
	?>


</div><!-- #accordion -->