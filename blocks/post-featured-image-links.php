<?phpß
	$block_name = "post-featured-image-links";
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
	
	if (get_field('post-featured-image-links_rounded')) :
		$corners = 'corners';
	else :
		$corners= '';
	endif;
	
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . ' post-featured-image-links-'. get_field('radio_button_backgrounds') . '">'; 
			
		echo '<div class="wrapper">'; 	
		
			echo '<div class="headline">' . get_field('post-featured-image-links_headline') . '</div>';
			
			$featured_posts = get_field('post-featured-image-links');
			if( $featured_posts ): 
				echo '<div class="row">';
					foreach( $featured_posts as $featured_post ): 
						$permalink = get_permalink($featured_post);
						$featured_image = get_the_post_thumbnail_url( $featured_post, 'full' ); 
						echo '<div class="column">';
							echo '<div class="image">' . '<img src="' . $featured_image . '" class="' . $corners . '">' . '</div>';
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