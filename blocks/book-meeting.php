<?php
	$block_name = "book-meeting";
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
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . '">'; 
		echo '<div class="wrapper">';
					
			echo '<div class="headline">' . get_field('book_meeting_headline') . '</div>';
			echo '<div class="text">' . get_field('book_meeting_text') . '</div>';
			$link = get_field('book_meeting_link');
			if( $link ): 
				$link_url 		= $link['url'];
				$link_title 	= $link['title'];
				$link_target 	= $link['target'] ? $link['target'] : '_self';
			endif;
			echo '<div class="link"><a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '</a></div>';
			
		echo '</div>';		
	echo '</section>';
?>