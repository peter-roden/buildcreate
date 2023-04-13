<?php
	$block_name = "work-index";
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
	
		echo '<div class="work-index-container">';
	
			echo '<div class="image">' . '<img src="' . get_field('work_index_image') . '">' . '</div>';
		
			echo '<div class="rollover">';
				echo '<div class="rollover-container">';
					echo '<a class="heading" href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
					if( have_rows('work_index_skills') ):
						$columns=0;
						while( have_rows('work_index_skills') ) : the_row();
							$columns++;
							if ($columns % 2 != 0) :
								echo '<div class="columns">';
							endif;
							echo '<div class="column">';
									echo '<div class="text">' . get_sub_field('icon') . get_sub_field('text') . '</div>';
							echo '</div>';
							if ($columns % 2 == 0) :
								echo '</div>';
								$columns = 0;
							endif;
						endwhile;
					endif;
					if (count(get_field('work_index_skills')) % 2 != 0) :
						echo '</div>';
					endif;
					echo '<div class="link">';
				 		echo '<a href="' . get_the_permalink() . '">' . get_field('work_index_link_text') . '<i class="fa-regular fa-arrow-right-long"></i>' . '</a>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';		
		
	echo '</section>';

?>