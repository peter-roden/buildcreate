<?php
	$block_name = "industry-work-example";
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

	$image_location 	= get_field('industry_work_example_image_location'); 
	if ($image_location == 'left') :
		$text_location = 'right';
	endif;
	if ($image_location == 'right') :
		$text_location = 'left';
	endif;
	$background 		= get_field('radio_button_backgrounds'); 

	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . ' industry-work-example-' . $background . '">'; 
		echo '<div class="wrapper">';

			echo '<div class="theme">';
					
				echo '<div class="image-location ' . $image_location . '">';
					echo '<div class="image"><img src="' . get_field('industry_work_example_image') . '"></div>';
				echo '</div>';
				echo '<div class="text-location ' . $text_location . ' text-' . $type . '">';
					if (get_field('industry_work_example_case_study')) :
						echo '<div class="case-study">CASE STUDY</div>';
					endif;
					echo '<div class="headline">' . get_field('industry_work_example_headline') . '</div>';
					echo '<div class="text">' . get_field('industry_work_example_text') . '</div>';
					if( have_rows('industry_work_example_skills') ):
						$columns=0;
						while( have_rows('industry_work_example_skills') ) : the_row();
							$columns++;
							if ($columns % 2 != 0) :
								echo '<div class="columns">';
							endif;
							echo '<div class="column column-' . $columns . '">';
								echo '<ul class="fa-ul">';
									echo '<li class="skill"><span class="fa-li"><i class="fa-solid ' .  get_sub_field('icon') .'"></i></span>' . get_sub_field('skill') . '</li>';
								echo '</ul>';
							echo '</div>';
							if ($columns % 2 == 0) :
								echo '</div>';
								$columns = 0;
							endif;
						endwhile;
					endif;
					$link = get_field('industry_work_example_button');
					if( $link ): 
						$link_url 		= $link['url'];
						$link_title 	= $link['title'];
						$link_target 	= $link['target'] ? $link['target'] : '_self';
					endif;
					echo '<div class="button">';
						echo '<a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '<i class="fa-light fa-arrow-right-long"></i></a>';
					echo '</div>';
				echo '</div>';
							
			echo '</div>';

		echo '</div>';		
	echo '</section>';
?>