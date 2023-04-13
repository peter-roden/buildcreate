<?php
	$block_name = "row-with-video";
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

	$video_location 	= get_field('row_with_video_location'); 
	if ($video_location == 'left') :
		$text_location = 'right';
	endif;
	if ($video_location == 'right') :
		$text_location = 'left';
	endif;
	$background 		= get_field('radio_button_backgrounds'); 
	if (get_field('row_with_video_corners')) :
		$video_corners		= 'video-corners';
	else :
		$video_corners		= '';
	endif;
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) .' row-with-video-theme-' . $background . '">'; 
		echo '<div class="wrapper">';

			echo '<div class="row-with-video-container ' . $video_location . '">';
					
				echo '<div class="video ' . $video_corners . '">';
					the_field('row_with_video_video');
				echo '</div>';
				echo '<div class="content">';
					if (get_field('row_with_video_title')) :
						echo '<div class="title">' . get_field('row_with_video_title') . '</div>';
					endif;
					if (get_field('row_with_video_headline')) :
						echo '<div class="headline">' . get_field('row_with_video_headline') . '</div>';
					endif;
					if (get_field('row_with_video_text')) :
						echo '<div class="text">' . get_field('row_with_video_text') . '</div>';
					endif;
					$link = get_field('row_with_video_button');
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