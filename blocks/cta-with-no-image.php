<?php
	$block_name = "cta-with-no-image";
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

	$background 		= get_field('cta_with_image_no_background'); 
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) .' cta-with-no-image-theme-' . $background . '">'; 

		echo '<div class="wrapper">';
		
			echo '<div class="container">';
				
				echo '<div class="headline">' . get_field('cta_with_image_no_headline') . '</div>';
				echo '<div class="text">' . get_field('cta_with_image_no_text') . '</div>';
				$link = get_field('cta_with_image_no_button');
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