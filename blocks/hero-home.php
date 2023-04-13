<?php
	$block_name = "hero-home";
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
	#<?php echo esc_attr($id); ?>  {
		background:url("<?php echo wp_get_attachment_url(get_field('hero_home_background_image_desktop')); ?>") center center no-repeat;
		background-size:cover
	}
	@media screen and (max-width: 800px) {
		#<?php echo esc_attr($id); ?>  { 
			background:url("<?php echo wp_get_attachment_url(get_field('hero_home_background_image_mobile')); ?>") center center no-repeat;
			background-size:cover
		}
	}
</style>

<?php
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="hero-image ' . esc_attr($className) . '">'; 
		echo '<div class="wrapper">';
			echo '<div class="content">';
			
				echo '<div class="headline">' . get_field('hero_home_headline') . '</div>';
				echo '<div class="intro">' . get_field('hero_home_intro') . '</div>';
				
				$link = get_field('hero_home_button');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					echo '<div class="button">';
						echo '<a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) .'">' . esc_html( $link_title ) . '</a>';
					echo '</div>';
				endif;
			
			echo '</div>';
		echo '</div>';
	echo '</section>';
?>