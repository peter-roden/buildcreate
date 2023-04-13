<?php

	if (get_field('work_index_show_all')) :
		
		echo '<div class="wrapper">';
		
			echo '<div class="work-posts">';
			
				$args = array(  
					'post_type' => 'work',
					'post_status' => 'publish',
					'posts_per_page' => -1
				);
				$loop = new WP_Query( $args ); 	
				$i=0;
				echo '<div id="post-' . $i . '" class="work-post first-post left"></div>';
				while ( $loop->have_posts() ) : 
		
					$i++;
					if ($i % 2 != 0) :
						$side = 'right';
					else :
						$side = 'left';
					endif;
				
					echo '<div id="post-' . $i . '" class="work-post ' . $side . '">';
		
						$loop->the_post(); 
						$content_markup = '';
						$blocks = parse_blocks( get_the_content() );
						foreach ($blocks as $block) :
							if ($block['blockName'] == 'acf/work-index') :
								$content_markup .= render_block($block);
							endif;
						endforeach;
						echo $content_markup;	
		
						echo '<script>';
							echo 'jQuery(document).ready(function($){';
								echo '$("#post-' . $i . '").mouseenter(function(){';
									echo '$("#post-' . $i . ' .rollover").show();';
									echo '$("#post-' . $i . ' .image").css("opacity","0.7");';
								echo '}).mouseleave(function() {';
									echo '$("#post-' . $i . ' .rollover").hide();';
									echo '$("#post-' . $i . ' .image").css("opacity","1");';
								echo '});';
								echo '$("#post-' . $i . ' .rollover").click(function(){';
									echo "window.location = '" . get_the_permalink() . "';";
								echo '});';
							echo '});';
						echo '</script>';
					echo '</div>';
				
				endwhile;
				
			echo '</div>';
				
		echo '</div>';

	endif;

?>