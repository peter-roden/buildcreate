<?php
	$block_name = "process-stages";
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
		
		if( have_rows('process_stages')) :
			$i=0;
			echo '<div class="wrapper">';
				echo '<div class="top-row-container">';
					while( have_rows('process_stages') ): the_row();
						$i++;
						if ($i == 1) :
							echo '<div id="top-row-' . $i . '">';
						else :
							echo '<div id="top-row-' . $i . '" style="display:none">';
						endif;
							echo '<div class="top-row">';
								echo '<div class="image">' . '<img src="' . get_sub_field('image') . '">' . '</div>';
								echo '<div class="content">';
								
									if (get_sub_field('headline')) :
										echo '<div class="headline">' . get_sub_field('headline') . '</div>';
									endif;
									if (get_sub_field('text')) :
										echo '<div class="text">' . get_sub_field('text') . '</div>';
									endif;
									
									if (have_rows('skills')) : 
										echo '<div class="skills-container">';
											echo '<ul class="fa-ul">';
												while (have_rows('skills')) : the_row();
													echo '<li><span class="fa-li"><i class="fa-regular fa-chevron-right"></i></span>' . get_sub_field('skill') . '</li>';
												endwhile;
											echo '</ul>';
										echo '</div>';
									endif;
			
									if (get_sub_field('article_text')) :
										echo '<div class="article">';
											// echo '<i class="fa-solid fa-bookmark"></i>' . strip_tags(get_sub_field('article_text'));
											$article_ids = get_sub_field('article');
											foreach ($article_ids as $article_id) :
												echo '<ul class="fa-ul">';
													echo '<li class="skill"><span class="fa-li"><i class="fa-solid fa-bookmark"></i></span>' . strip_tags(get_sub_field('article_text')) . '<br>' . '<a href="' . get_the_permalink($article_id) . '" style="line-height: 24px;">' . get_the_title($article_id) . '</a></li>';
												echo '</ul>';
												// echo '<span><a href="' . get_the_permalink($article_id) . '">' . get_the_title($article_id) . '</a></span>';
											endforeach;
										echo '</div>';
									endif;
									
								echo '</div>';
							echo '</div>';
						echo '</div>';
					endwhile;
				echo '</div>';		
			echo '</div>';	
		endif;
		
		if( have_rows('process_stages')) :
			$i=0;
			echo '<div class="bottom-row-container">';
				while( have_rows('process_stages') ): the_row();
					$i++;
					if ($i==1) :
						$active = 'active';
					else :
						$active = '';
					endif;
					echo '<a class="bottom-row bottom-row-' . $i . ' ' . $active . '">';
						echo '<div class="name">' . get_sub_field('name') . '<i class="fa-regular fa-circle-' . $i .'"></i>' . '</div>';
					echo '</a>';
					
					echo '<script>';
						echo 'jQuery(document).ready(function($){';
							echo '$(".bottom-row-' . $i .'").click(function(){';
								for ($ii = 1; $ii <= count(get_field('process_stages')); $ii++) :
									if ($ii == $i) :
										echo '$("#top-row-' . $ii .'").show();'; 							
										echo '$(".bottom-row-' . $ii .'").addClass("active");';
									else :
										echo '$("#top-row-' . $ii .'").hide();'; 							
										echo '$(".bottom-row-' . $ii .'").removeClass("active");'; 							
									endif;
								endfor;
							echo '});';
						echo '});';
					echo '</script>'; 
					
				endwhile;
			echo '</div>';
		endif;
			
	echo '</section>';
?>