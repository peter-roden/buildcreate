<?php
	$block_name = "show-jobs";
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

	if (get_field('show_jobs')) :

		echo '<div class="clearfix"></div>';	
		echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . '">'; 
		
			$args = array(
				'post_type'         => 'jobs',
				'posts_per_page'    => -1,
				'post_status' 		=> 'publish',
				'orderby'           => 'title',
				'order'             => 'ASC'
			);
			$query = new WP_Query($args);
			if ($query->have_posts()) :
				
				echo '<div class="wrapper">';
				
					echo '<div class="heading">Available Positions</div>';
					
					echo '<div class="jobs-container">';
						echo '<ul class="fa-ul">';
							while ($query->have_posts()) : $query->the_post();
								$post_id = get_the_ID();
								echo '<li><span class="fa-li"><i class="fa-regular fa-chevron-right"></i></span>' . '<a href="' . get_permalink ($post_id) . '">' . get_the_title($post_id) . '</a>' . '</li>';
							endwhile;
						echo '</ul>';
					echo '</div>';
				
				echo '</div>';
				
			endif;	
		
		echo '</section>';
		
	endif;

?>