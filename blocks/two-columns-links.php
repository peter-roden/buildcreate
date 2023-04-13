<?php
	$block_name = "two-columns-links";
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
			
			if (get_field('two_columns_intro')) :
				echo '<div class="intro">' . strip_tags(get_field('two_columns_intro')) . '</div>';
			endif;
			if (get_field('two_columns_headline')) :
				echo '<div class="headline">' . strip_tags(get_field('two_columns_headline')) . '</div>';
			endif;
			if (get_field('two_columns_text')) :
				echo '<div class="text">' . get_field('two_columns_text') . '</div>';
			endif;
		
			if( have_rows('two_columns_rows') ):
				echo '<div class="rows">';
					while( have_rows('two_columns_rows') ) : the_row();
						echo '<div class="row">';

							if( have_rows('left_column') ): 
								while( have_rows('left_column') ): the_row(); 
									echo '<div class="left">';
										echo '<div class="title">' . get_sub_field('title') . '</div>';
										if( have_rows('links') ): 
											while( have_rows('links') ): the_row(); 
												$link = get_sub_field('link');
												if( $link ): 
													$link_url 		= $link['url'];
													$link_title 	= $link['title'];
													$link_target 	= $link['target'] ? $link['target'] : '_self';
												endif;
												echo '<div class="link"><a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '</a></div>';
											endwhile;
										endif;
									echo '</div>';
								endwhile; 
							endif;

							if( have_rows('right_column') ): 
								while( have_rows('right_column') ): the_row(); 
									echo '<div class="right">';
										echo '<div class="title">' . get_sub_field('title') . '</div>';
										if( have_rows('links') ): 
											while( have_rows('links') ): the_row(); 
												$link = get_sub_field('link');
												if( $link ): 
													$link_url 		= $link['url'];
													$link_title 	= $link['title'];
													$link_target 	= $link['target'] ? $link['target'] : '_self';
												endif;
												echo '<div class="link"><a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '</a></div>';
											endwhile;
										endif;
									echo '</div>';
								endwhile; 
							endif;

						echo '</div>';
					endwhile;
				echo '</div>';
			endif;

		echo '</div>';
		
	echo '</section>';
?>