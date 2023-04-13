<?php
	$block_name = "job-submission";
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

			echo '<div class="job-submission-container">';
				
				echo '<div class="left content">';
					echo '<div class="headline">' . strip_tags(get_field ('job_submission_headline')) . '</div>';
					echo '<div class="text">' . get_field ('job_submission_text') . '</div>';
				echo '</div>';
				
				echo '<div class="right">';
					echo do_shortcode('[gravityform id="6" title="false" description="false" ajax="true"]');
				echo '</div>';
			
			echo '</div>';

		echo '</div>';		
	echo '</section>';
	
?>