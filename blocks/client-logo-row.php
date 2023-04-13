<?php
	$block_name = "client-logo-row";
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
			
				echo '<div class="headline">' . get_field('client_logo_row_headline') . '</div>';
				echo '<div class="text">' . get_field('client_logo_row_text') . '</div>';

				if( have_rows('client_logo_row_logos') ):
					echo '<div class="columns">';
						while( have_rows('client_logo_row_logos') ) : the_row();
							echo '<div class="column">';
								echo '<div class="image">' . '<img src="' . get_sub_field('logo') . '">' . '</div>';
							echo '</div>';
						endwhile;
					echo '</div>';
				endif;

			echo '</div>';
		echo '</div>';
		
	echo '</section>';
?>