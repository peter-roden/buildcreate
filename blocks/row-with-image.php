<?php
	$block_name = "row-with-image";
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

	$image_location 	= get_field('row_with_image_location'); 
	if ($image_location == 'left') :
		$text_location = 'right';
	endif;
	if ($image_location == 'right') :
		$text_location = 'left';
	endif;
	$background 		= get_field('radio_button_backgrounds'); 
	if (get_field('row_with_image_full_length')) :
		$full_length		= 'full-length';
	else :
		$full_length		= 'no-full-length';
	endif;
	if (get_field('row_with_image_corners')) :
		$image_corners		= 'image-corners';
	else :
		$image_corners		= '';
	endif;
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) .' row-with-image-theme-' . $background . '">'; 
		echo '<div class="wrapper">';

			echo '<div class="row-with-image-container ' . $image_location . ' ' .  ' ' . $full_length . '">';
					
				echo '<div class="image">';
					echo '<img src="' . get_field('row_with_image_image') . '" class="' . $image_corners . '">';
				echo '</div>';
				echo '<div class="content">';
					if (get_field('row_with_image_title')) :
						echo '<div class="title">' . get_field('row_with_image_title') . '</div>';
					endif;
					if (get_field('row_with_image_headline')) :
						echo '<div class="headline">' . get_field('row_with_image_headline') . '</div>';
					endif;
					if (get_field('row_with_image_text')) :
						echo '<div class="text">' . get_field('row_with_image_text') . '</div>';
					endif;
					$link = get_field('row_with_image_button');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						echo '<div class="link">';
							echo '<a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) .'">' . esc_html( $link_title ) . '</a>';
						echo '</div>';
					endif;	
				echo '</div>';
							
			echo '</div>';

		echo '</div>';		
	echo '</section>';
?>