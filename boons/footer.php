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
			    animated: 'easesslide',
			    collapsible: true,
			    allwayOpen: false
			};
		$('#accordion').accordion( accOpt );
		if ( tabID && tabID > 0 ) { $("#accordion").accordion( 'activate', tabID ); }

		updateContainer();

		// Simple Slider for details window

		$('.ngg-clear').remove(); //get rid off the clearing div from NGG

		var slidesOptions = { // configure options for SlidesJS
			container: "ngg-galleryoverview",
			preload: true,
			preloadImage: '<?php bloginfo('stylesheet_directory'); ?>/images/loading.gif',
			play: 0,
			pause: 2500,
			hoverPause: true,
			autoHeight: true,
			generateNextPrev: true
		}

		// Toggle Details window
 		$('.nav-toggle').click(function(){
			//get collapse content selector
			var collapse_content_selector = $(this).attr('href');

			//make the collapse content to be shown or hiden
			var toggle_switch = $(this);
			$(collapse_content_selector).toggle(function(){
			  if($(this).css('display')=='none'){
                                //change the button label to be 'Show'
				toggle_switch.html("<?php _e('Show Details', 'boons'); ?>");
			  }else{
                                //change the button label to be 'Hide'
				toggle_switch.html("<?php _e('Hide Details', 'boons'); ?>");
				// updateContainer();
				if ( $('.slides_control').length === 0 ) {
					$('ngg-galleryoverview img').css('display', 'none');
					$('#details-window').slides(slidesOptions);
					$('#details-window .ngg-galleryoverview').css('visibility', 'visible');
				}
				updateContainer();
			  }
			} );
		});






		// resize Details images

	    $(window).resize(function() {
	        updateContainer();
	    });

		function updateContainer() {


				var aspectRatio = 706 / 397;
			    var newWidth = $('#details-window').width();
			    var	newHeight = Math.round(newWidth / aspectRatio);
			    var newNext = newWidth + 10;


			    //$('#details-window .slides_control').css( 'left', newWidth );
			    $('#details-window .ngg-galleryoverview').css( 'width', newWidth );
			    $('#details-window .ngg-gallery-thumbnail-box').css( 'width', newWidth );
			    $('#details-window a.next').css( 'left', newNext );
			}


		// jQuery UI Tabs for Properties For Sale page
		$( '#tabs' ).tabs();

		// Sole Agency badge
		var sole_string = $('body').attr('class');
		//console.log (sole_string);
		if ( sole_string.indexOf('sole-agency') !== -1 ) { // if body class contains 'sole-agency'
			$('#sole-agency-logo').css('display', 'block');
			$('#text-content h1.entry-title, #text-content .the-content').css('margin-left', '29px' );
		}

		// Prevent NextGEN gallery to show full size image on click of a thumbnail
		$('.ngg-gallery-thumbnail a').click(function(event) {
			event.preventDefault();
		});


	})(jQuery);
</script>
</body>
</html>