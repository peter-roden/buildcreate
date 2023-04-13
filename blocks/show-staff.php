<?php
	$block_name = "show-staff";
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

	if (get_field('show_staff')) :

		echo '<div class="clearfix"></div>';	
		echo '<section id="' . esc_attr($id). '" class="hero-image ' . esc_attr($className) . '">'; 
		
			$args = array(
				'post_type'         => 'staff',
				'posts_per_page'    => -1,
				'post_status' 		=> 'publish',
				'meta_key'          => 'staff_last_name',
				'orderby'           => 'meta_value',
				'order'             => 'ASC'
			);
			$query = new WP_Query($args);
			if ($query->have_posts()) :
				
				echo '<div class="wrapper">';
				
					echo '<div class="people">Our People</div>';
				
					$i=0;
					$ii=0;
					$iii=0;
					while ($query->have_posts()) : $query->the_post();
								
							$i++;
							$ii=0;
							$iii++;
							$post_id = get_the_id();
							
							if ($i==1) :
								echo '<div class="staff-container">';
							endif;
							
								echo '<div class="staff">';
								
									echo '<div class="image-container">';
										echo '<div class="image">';
											echo  '<img src="' . get_field ('staff_image',$post_id) . '">';
										echo '</div>';
									    echo '<div id="rollover-' . $iii . '" class="rollover">';
											echo '<div class="name-title">';
												echo '<a class="name" href="' . get_the_permalink($post_id) . '">';
													 echo get_field('staff_first_name',$post_id) . ' ';
													 echo '<span>' . get_field('staff_last_name',$post_id) . '</span>';
												echo '</a>';
												echo '<div class="title">' . get_field('staff_title',$post_id) . '</div>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
									
									echo '<script>';
										echo 'jQuery(document).ready(function($){';
											echo '$("#rollover-' . $iii .'").click(function(){';
												echo 'window.location.href = "' . get_the_permalink($post_id) .'";';
											echo '});';
										echo '});';
									echo '</script>';
									
								echo '</div>';
							
							if (($i==3) && ($ii != $query->found_posts)) :
								$i=0;
								echo '</div>';
							endif;
							
							if (($i != 3) && ($ii == $query->found_posts)) :
								echo '</div>';
							endif;
						
					endwhile;
				
				echo '</div>';
				
			endif;	
		
		echo '</section>';
		
	endif;

?>