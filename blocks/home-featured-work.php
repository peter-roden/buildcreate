<?php
	$block_name = "home-featured-work";
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
	
	if (get_field('home_featured_work_rounded')) :
		$corners = 'corners';
	else :
		$corners= '';
	endif;
	
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . '">'; 
			
		echo '<div class="wrapper">'; 	
			
			$featured_posts = get_field('home_featured_work');
			if( $featured_posts ): 
				foreach( $featured_posts as $featured_post ): 
					echo '<div class="column">';
						echo '<div class="image">' . '<img src="' . get_field('home_featured_work_image') . '" class="' . $corners . '">' . '</div>';
						echo '<div class="content">';
							echo '<div class="intro">' . get_field('home_featured_work_intro') . '</div>';
							echo '<div class="headline">' . get_field('home_featured_work_headline') . '</div>';
							echo '<div class="see-what">';
								echo  'See what we did for ' . get_the_title($featured_post) . '<i class="fa-solid fa-arrow-right-long"></i>';
							echo '</div>';
						echo '</div>';
						echo '<a class="rollover ' . $corners . '" href="' . get_the_permalink($featured_post) . '">';
							echo '<div class="eye"><i class="fa-solid fa-eye"></i></div>';
						echo '</a>';
					echo '</div>';
				endforeach;
			endif;
				
		echo '</div>';

	echo '</section>';
?>