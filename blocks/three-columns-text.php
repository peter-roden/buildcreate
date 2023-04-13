<?php
	$block_name = "three-columns-text";
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
			echo '<div class="theme">';
			
				echo '<div class="headline">' . get_field('three_columns_text_headline') . '</div>';
				echo '<div class="text">' . get_field('three_columns_text_text') . '</div>';

				if( have_rows('three_columns_text_columns') ):
					echo '<div class="columns">';
						while( have_rows('three_columns_text_columns') ) : the_row();
							echo '<div class="column">';
								echo '<div class="column-headline">' . get_sub_field('headline') . '</div>';
								echo '<div class="column-text">' . get_sub_field('text') . '</div>';
							echo '</div>';
						endwhile;
					echo '</div>';
				endif;

			echo '</div>';
		echo '</div>';
		
	echo '</section>';
?>