<?php
	$block_name = "cta-with-image";
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

	$image_location 	= get_field('cta_with_image_location'); 
	if ($image_location == 'left') :
		$text_location = 'right';
	endif;
	if ($image_location == 'right') :
		$text_location = 'left';
	endif;
	$background 		= get_field('cta_with_image_background'); 
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) .' row-with-image-theme-' . $background . '">'; 

		echo '<div class="theme">';
				
			echo '<div class="image-location ' . $image_location . '">';
				echo '<div class="background-image"><img src="' . get_field('cta_with_image_image') . '"></div>';
			echo '</div>';
			echo '<div class="text-location ' . $text_location . '">';
				echo '<div class="headline">' . get_field('cta_with_image_headline') . '</div>';
				echo '<div class="text">' . get_field('cta_with_image_text') . '</div>';
				$link = get_field('cta_with_image_button');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					echo '<div class="button">';
						echo '<a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) .'">' . esc_html( $link_title ) . '</a>';
					echo '</div>';
				endif;	
			echo '</div>';
						
		echo '</div>';
		
	echo '</section>';
?>