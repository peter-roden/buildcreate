<?php
	$block_name = "case-study";
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
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . ' case-study-' . get_field('radio_button_backgrounds') . '">'; 
		echo '<div class="wrapper">';

			$case_study_post = get_field('case_study');
			if ($case_study_post) :
				foreach ($case_study_post as $post): 
					setup_postdata($post); 
					
					echo '<div class="case-study-content">';
					
						echo '<div class="left">';
							echo '<div class="left-container">';
								echo '<div class="thumbnail"><img src="' . get_field('case_study_thumbnail',$post->ID) . '"></div>';
								echo '<div class="content">';
									echo '<div class="headline">' . get_field('case_study_headline',$post->ID) . '</div>';
									echo '<div class="text">' . get_field('case_study_text',$post->ID) . '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						
						echo '<div class="right">';
							echo '<div class="intro">' . get_field('case_study_form_introduction',$post->ID) . '</div>';
							echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]');
						echo '</div>';
						
						echo '<style>';
							echo '#gform_submit_button_3 {';
								echo 'display: block;';
								echo 'background: url("' . get_template_directory_uri() . '/images/files-white.png' . '") no-repeat transparent;';
								echo 'background-position: 20% center';
							echo '}';
							echo '#gform_submit_button_3:hover {';
								echo 'display: block;';
								echo 'background: url("' . get_template_directory_uri() . '/images/files-green.png' . '") no-repeat transparent;';
								echo 'background-position: 20% center';
							echo '}';
						echo '</style>';
						
						$_SESSION['case_study_confirmation'] = '<div class="confirmation">Thank you for your interest.  <a href="' . get_field('case_study_file',$post->ID) . '" target="_blank">' . 'Click here to view the case study.' . '</a></div>';
						
					echo '</div>';
				
				endforeach;
				wp_reset_postdata(); 
			endif;

		echo '</div>';		
	echo '</section>';
	
?>