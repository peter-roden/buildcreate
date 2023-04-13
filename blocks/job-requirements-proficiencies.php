<?php
	$block_name = "job-requirements-proficiencies";
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
		
			echo '<div class="job-requirements-proficiencies-container">';
			
				echo '<div class="requirements">';
					if( have_rows('job_requirements')) :
						$s=0;
						echo '<div class="heading">Requirements</div>';
						echo '<div class="requirements-container">';
							echo '<ul class="fa-ul requirements-ul">';
								while (have_rows('job_requirements')) : the_row();
									echo '<li><span class="fa-li"><i class="fa-regular fa-chevron-right"></i></span>' . get_sub_field('requirement') . '</li>';
								endwhile;
							echo '</ul>';
						echo '</div>';
					endif;
				echo '</div>';
				
				echo '<div class="proficiencies">';
					if( have_rows('job_proficiencies')) :
						echo '<div class="heading">Proficiencies</div>';
							echo '<ul class="fa-ul">';
								while( have_rows('job_proficiencies') ): the_row();
									echo '<li><span class="fa-li"><i class="fa-regular fa-chevron-right"></i></span>' . get_sub_field('proficiency') . '</li>';
								endwhile;
							echo '</ul>';
					endif;
				echo '</div>';
			
			echo '</div>';	
			
		echo '</div>';		
	echo '</section>';
?>