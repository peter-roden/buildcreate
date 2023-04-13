<?php
	$block_name = "image-with-text";
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

	$image_location 	= get_field('image_with_text_location'); 
	if ($image_location == 'left') :
		$text_location = 'right';
	endif;
	if ($image_location == 'right') :
		$text_location = 'left';
	endif;
	$image_placement 	= get_field('image_with_text_placement'); 
	$background 		= get_field('radio_button_backgrounds'); 
	if (get_field('image_with_text_image_corners')) :
		$image_corners		= 'image-corners';
	else :
		$image_corners		= '';
	endif;
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . ' image-with-text-' . $background . '">'; 
		echo '<div class="wrapper">';

			echo '<div class="theme' . ' image-' . $image_placement . ' image-' . $image_location . '">';
					
				echo '<div class="image-location ' . $image_location . '">';
					echo '<div class="background-image"><img src="' . get_field('image_with_text_image') . '" class="' . $image_corners . '"></div>';
				echo '</div>';
				echo '<div class="text-location ' . $text_location . '">';
					echo '<div class="headline">' . get_field('image_with_text_headline') . '</div>';
					echo '<div class="text">' . get_field('image_with_text_text') . '</div>';
				echo '</div>';
							
			echo '</div>';

		echo '</div>';		
	echo '</section>';
?>