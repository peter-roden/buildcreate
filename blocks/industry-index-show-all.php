<?php

	if (get_field('industry_index_show_all')) :
		
			echo '<div class="industry-posts">';
			
				$args = array(  
					'post_type' => 'industries',
					'post_status' => 'publish',
					'posts_per_page' => -1
				);
				$loop = new WP_Query( $args ); 	
				$i=0;
				while ( $loop->have_posts() ) : 
		
					$i++;
					if ($i % 2 != 0) :
						$side = 'left';
					else :
						$side = 'right';
					endif;
				
					echo '<div id="post-' . $i . '" class="industry-post ' . $side . '">';
					
						echo '<div class="wrapper">';
		
							$loop->the_post(); 
							$content_markup = '';
							$blocks = parse_blocks( get_the_content() );
							foreach ($blocks as $block) :
								if ($block['blockName'] == 'acf/industry-index') :
									$content_markup .= render_block($block);
								endif;
							endforeach;
							echo $content_markup;	
								
						echo '</div>';
		
					echo '</div>';
				
				endwhile;
				
			echo '</div>';

	endif;

?>