<?php
/**
 *	@package Wordpress
 * 	@subpackage boons
 */
?>


		</div><!-- end main -->
	</div><!-- end wrap -->
</div><!-- end xpage -->

<footer id="colophon" class="clearfix">
	<div class="pattern">

	</div><!-- #pattern -->
</footer>

<?php wp_footer(); ?>
<script type="text/javascript">
	(function($) {
		// $() will work as an alias for jQuery() inside of this function

		// Accordion within content
		// Accordion Options & Accordion open on certain tab deppending on string in URL
		var tabID = <?php if ( !$_GET['id']) { echo 0;} else {echo $_GET['id'];} ?>;

		var accOpt = {
			    active: false,
			    header: '.acc-header',
			    navigation: true,
			    event: 'click',
			    fillSpace: false,
			    animated: 'easeslide',
			    collapsible: true,
			    allwayOpen: false
			};
		$('#accordion').accordion( accOpt );
		if ( tabID && tabID > 0 ) { $("#accordion").accordion( 'activate', tabID ); }

		// Toggle Details window
 		$('.nav-toggle').click(function(){
			//get collapse content selector
			var collapse_content_selector = $(this).attr('href');

			//make the collapse content to be shown or hide
			var toggle_switch = $(this);
			$(collapse_content_selector).toggle(function(){
			  if($(this).css('display')=='none'){
                                //change the button label to be 'Show'
				toggle_switch.html('Show Details');
			  }else{
                                //change the button label to be 'Hide'
				toggle_switch.html('Hide Details');
			  }
			});
		});

		// Simple Slider for details window

		$('#details-window').slides();


	})(jQuery);
</script>
</body>
</html>