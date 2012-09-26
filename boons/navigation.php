<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 */
?>


<div id="branding">
	<div class="gradient"></div>
	<div id="language-selector">
		<?php echo qtrans_generateLanguageSelectCode('image'); ?>
	</div><!-- #language-selector -->
	<img id="logo" src="<?php bloginfo('stylesheet_directory'); ?>/images/BV-logo.png" width="60" height="141" />
</div><!-- #branding.gradient -->
<div id="navigation">
	<div class="gradient"></div>
 	<div id="access">
 		<?php $primary_args = array(
			'theme_location'  => 'primary',
			'menu'            => '',
			'container'       => 'div',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		); ?>
  		<?php wp_nav_menu($primary_args); ?>
	</div><!-- #access -->

	<div id="cta">
	 	<div id="cta-access">
	 		<?php $cta_args = array(
				'theme_location'  => 'contact',
				'menu'            => '',
				'container'       => 'div',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			); ?>
	  		<?php wp_nav_menu($cta_args); ?>
		</div><!-- #access -->

	</div><!-- #cta -->

	<div id="properties-menu">
	 	<div id="properties-access">
	 		<?php $cta_args = array(
				'theme_location'  => 'properties',
				'menu'            => '',
				'container'       => 'div',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			); ?>
	  		<?php wp_nav_menu($cta_args); ?>
		</div><!-- #access -->

	</div><!-- #properties-menu -->
</div><!-- #navigation -->