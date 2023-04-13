<?php
	$block_name = "menu-row";
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
				
			echo '<div class="intro">' . get_field('menu_row_intro') . '</div>';
			echo '<div class="text">' . get_field('menu_row_text') . '</div>';

			if( have_rows('menu_row_columns')) :
				echo '<div class="columns">';
					while( have_rows('menu_row_columns') ): the_row();
						echo '<div class="column">';
							echo '<div class="heading">' . get_sub_field('heading') . '</div>';
							if( have_rows('items') ):
								while( have_rows('items') ): the_row();
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
				echo '</div>';
			endif;

		echo '</div>';		
	echo '</section>';
?>