<?php
	$block_name = "numbers-feature";
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
	
	$background = get_field('radio_button_backgrounds');
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) .' numbers-feature-' . $background . '">'; 

		echo '<div class="wrapper">';
		
			if( have_rows('number_feature_counters') ):
				$counter = 0;
				echo '<div class="counters">';
					while( have_rows('number_feature_counters') ) : the_row();
						$counter++;
						
						echo '<div class="counter">';
							echo '<div class="number">';
								echo '<span id="counter-' . $counter . '">' . get_sub_field('maximum') . '</span>';
							echo '</div>';
							echo '<div class="label">' . get_sub_field('label') . '</div>';
						echo '</div>';
						echo '<script>';
							echo 'jQuery(document).ready(function($){';
								echo '$("#counter-' . $counter . '").each(function () {';
									echo 'var $this = $(this);';
									echo 'jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {';
										echo 'duration: 1000,';
										echo 'easing: "swing",';
										echo 'step: function () {';
											echo '$this.text(Math.ceil(this.Counter).toLocaleString("en"));';
										echo '}';
									echo '});';
								echo '});';
							echo '});';
						echo '</script>';
					
					endwhile;
				echo '</div>';
			endif;
		
		echo '</div>';
		
	echo '</section>';
?>