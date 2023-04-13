<?php
	$block_name = "work-featured-image-links";
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
	
	if (get_field('work-featured-image-links_rounded')) :
		$corners = 'corners';
	else :
		$corners= '';
	endif;
	
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . ' work-featured-image-links-'. get_field('radio_button_backgrounds') . '">'; 
			
		echo '<div class="wrapper">'; 	
		
			echo '<div class="headline">' . get_field('work-featured-image-links_headline') . '</div>';
			
			$featured_posts = get_field('work_post-featured-image-links');
			if( $featured_posts ): 
				echo '<div class="row">';
					foreach( $featured_posts as $featured_post ): 
						$permalink = get_permalink($featured_post);
						
						$post = get_post($featured_post);
						$blocks = parse_blocks($post->post_content);
						foreach ($blocks as $block) :
							if ($block['blockName'] == 'acf/work-index') :
								$work_index_image = $block['attrs']['data']['work_index_image'];
							endif;
						endforeach;
						
						echo '<div class="column">';
							echo '<div class="image">' . '<img src="' . wp_get_attachment_url($work_index_image) . '" class="' . $corners . '">' . '</div>';
							echo '<a class="rollover ' . $corners . '" href="' . $permalink . '">';
								echo '<div class="eye"><i class="fa-solid fa-eye"></i></div>';
							echo '</a>';
						echo '</div>';
					endforeach;
				echo '</div>';
			endif;
				
		echo '</div>';

	echo '</section>';
?>