<?php
$block_name = "newsletter-popup";
$id = $block_name . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
$className = $block_name;
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>

<style>
	#<?php echo esc_attr($id); ?>  {
		background:url("<?php echo get_field('newsletter_popup_background_image','options'); ?>") center center no-repeat;
		background-size:cover
	}
</style>

<?php 

if (get_field('show_newsletter_popup')) :
	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . '" style="display:none;">'; 
		echo '<div class="heading">' . get_field('newsletter_popup_heading','options') . '</div>';
		echo '<div class="form-container">';
			echo '<div class="intro">' . get_field('newsletter_popup_form_intro','options') . '</div>';
			echo do_shortcode('[gravityform id="7" title="false" description="false" ajax="true"]');
		echo '</div>';
	echo '</section>';
	
	echo '<script>';
		echo '$(document).ready(function() {';
			
			echo 'if ( window.screen.width > 999 ) {';

				echo 'setTimeout(function(){';
					echo '$("#' . $id . '").dialog({';
						echo 'closeText: "X",';
						echo 'effect: "fade",';
						echo 'duration: 800,';
				  		echo 'draggable: false,';
				  		echo 'modal: true,';
				  		echo 'height: dialogHeight,';
				  		echo 'width: dialogWidth,';
					  	echo 'open: function(event, ui) {';
							echo 'if(isDesktop) {';
					  			echo 'disableScroll();';
					    	echo '}';
				    	echo '}';
					echo '});';
				echo '}, 2000)';
			
			echo '}';
			
		echo '});';
	echo '</script>';

endif; 

?>
