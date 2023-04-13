<?php
	$block_name = "big-feature-intro";
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
	
	$background = get_field('radio_button_backgrounds');
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) .' big-feature-intro-' . $background . '">'; 

		

		echo '<div class="desktop-theme">';
			echo '<div class="wrapper">';
				echo '<div class="headline">' . get_field('big_feature_with_intro_headline') . '</div>';
				echo '<div class="desktop-image"><img src="' . get_field('big_feature_with_intro_desktop_image') . '"></div>';
			echo '</div>';
		echo '</div>';
		echo '<div class="mobile-theme">';
			echo '<div class="headline">' . get_field('big_feature_with_intro_headline') . '</div>';
			echo '<div class="mobile-image"><img src="' . get_field('big_feature_with_intro_mobile_image') . '"></div>';
		echo '</div>';
						
		echo '</div>';
		
	echo '</section>';
?>