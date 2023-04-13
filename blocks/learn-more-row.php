<?php
	$block_name = "learn-more-row";
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

	$image_location 	= get_field('learn_more_row_location'); 
	if ($image_location == 'left') :
		$text_location = 'right';
	endif;
	if ($image_location == 'right') :
		$text_location = 'left';
	endif;
	$background 		= get_field('learn_more_row_background'); 
	if (get_field('learn_more_row_corners')) :
		$image_corners		= 'image-corners';
	else :
		$image_corners		= '';
	endif;
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) .' learn-more-' . $background . '">'; 
		echo '<div class="wrapper">';

			echo '<div class="theme">';
					
				echo '<div class="image-location ' . $image_location . '">';
					echo '<div class="background-image"><img src="' . get_field('learn_more_row_image') . '" class="' . $image_corners . '"></div>';
				echo '</div>';
				echo '<div class="text-location ' . $text_location . ' text-' . $type . '">';
					echo '<div class="headline">' . get_field('learn_more_row_headline') . '</div>';
					echo '<div class="text">' . get_field('learn_more_row_text') . '</div>';
					$link = get_field('learn_more_row_button');
					if( $link ): 
						$link_url 		= $link['url'];
						$link_title 	= $link['title'];
						$link_target 	= $link['target'] ? $link['target'] : '_self';
						echo '<div class="button">';
							echo '<a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '<i class="fa-light fa-arrow-right-long"></i></a>';
						echo '</div>';
					endif;
				echo '</div>';
							
			echo '</div>';

		echo '</div>';		
	echo '</section>';
?>