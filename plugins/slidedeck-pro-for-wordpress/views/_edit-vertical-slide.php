<?php
/**
 * Vertical slide template
 * 
 * SlideDeck Pro for WordPress 1.4.5 - 2011-11-21
 * Copyright (c) 2011 digital-telepathy (http://www.dtelepathy.com)
 * 
 * BY USING THIS SOFTWARE, YOU AGREE TO THE TERMS OF THE SLIDEDECK 
 * LICENSE AGREEMENT FOUND AT http://www.slidedeck.com/license. 
 * IF YOU DO NOT AGREE TO THESE TERMS, DO NOT USE THE SOFTWARE.
 * 
 * More information on this project:
 * http://www.slidedeck.com/
 * 
 * Full Usage Documentation: http://www.slidedeck.com/usage-documentation 
 * 
 * @package SlideDeck
 * @subpackage SlideDeck Pro for WordPress
 * 
 * @author digital-telepathy
 * @version 1.4.5
 * 
 * @uses slidedeck_dir()
 */

$is_template = (boolean) !isset( $i );
if( $is_template ) {
    $is_vertical = false;
}
$editor_id = $is_template ? "" : ('slide_' . $count . '_content_vertical_' . ( $i + 1 ) . '_parent');
$content = !SLIDEDECK_IS_AJAX_REQUEST ? $vertical_content[$i] : "";
$title = !SLIDEDECK_IS_AJAX_REQUEST ? $vertical_titles[$i] : "";
?>

<h3 class="hndle vertical">
    <span class="name"><?php echo $is_template ? '&nbsp;' : ( empty( $slide['title'] ) ? "Slide " . $slide['slide_order'] : $slide['title'] ); ?></span>
     - 
    <span class="index"><?php echo $is_template ? '&nbsp;' : ( $i + 1 ); ?></span>
</h3>
<a class="slide-delete-vertical" href="#<?php echo $i + 1 ?>">Delete Slide</a>

<div class="vertical-editor-wrapper">
    <label>Slide Title: <input type="text" name="<?php echo !$is_template ? 'slide[' . $count . '][vertical_title][]' : ''; ?>" maxlength="255" size="40" class="vertical-slide-title" value="<?php echo empty( $title ) ? 'Vertical Slide ' . ( $i + 1 ) : $title; ?>" /></label>
    
    <?php if( SLIDEDECK_USE_OLD_TINYMCE_EDITOR ): ?>
        <span class="vertical-slide-media">
    	    <?php include( slidedeck_dir( '/views/_editor_media_buttons.php' ) ); ?>
        </span>
        
    	<div class="editor-container">
    		<textarea class="vertical slide-content" id="<?php echo $editor_id; ?>" name="<?php echo !$is_template ? 'slide[' . $count . '][vertical_content][]' : ''; ?>"><?php echo htmlspecialchars( slidedeck_process_slide_content( $content, true ), ENT_QUOTES ); ?></textarea>
    	</div>
	<?php else: ?>
        <?php
            wp_editor( slidedeck_process_slide_content( $content, true, $slidedeck['new_format'] ), $editor_id, array(
                'wpautop' => true,
                'media_buttons' => true,
                'textarea_name' => ( !$is_template ? 'slide[' . $count . '][vertical_content][]' : '' ),
                'textarea_rows' => 10,
                'editor_class' => "vertical slide-content",
                'teeny' => false,
                'dfw' => false,
                'tinymce' => true,
                'quicktags' => true
            ) );
        ?>
    <?php endif; ?>
</div>