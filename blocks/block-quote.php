
<?php
	$block_name = "block-quote";
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
	
?>
	
	<style>
		@media screen and (max-width: 800px) {
			#<?php echo esc_attr($id); ?>  { 
				background:url("<?php echo wp_get_attachment_url(get_field('block_quote_mobile_image')); ?>") no-repeat;
				background-size:cover;
				background-position: 50% 50%;
			}
		}
	</style>

<?php
	
	$background = get_field('radio_button_backgrounds');
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . ' block-quote-' . $background . '">'; 

		echo '<div class="desktop-theme">';
			echo '<div class="image" '; 
				echo 'style="background:url(' . "'" . get_field('block_quote_desktop_image') . "'" . ') no-repeat; background-size:cover;background-position: 50% 50%">';
			echo '</div>';
			echo '<div class="text">';
				echo '<div class="quote">' . get_field('block_quote_quote') . '</div>';
				echo '<div class="attribution">' . get_field('block_quote_attribution') . '</div>';
			echo '</div>';
		echo '</div>';

		echo '<div class="mobile-theme">';
			// echo '<div class="image"><img src="' . get_field('block_quote_desktop_image') . '"></div>';
			echo '<div class="text">';
				echo '<div class="quote">' . get_field('block_quote_quote') . '</div>';
				echo '<div class="attribution">' . get_field('block_quote_attribution') . '</div>';
			echo '</div>';
		echo '</div>';

	echo '</section>';
?>