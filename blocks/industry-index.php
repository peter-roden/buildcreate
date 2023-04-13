<?php
	$block_name = "industry-index";
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
	
		echo '<div class="industry-index-container">';
	
			echo '<div class="image">' . '<img src="' . get_field('industry_index_image') . '">' . '</div>';
		
			echo '<div class="content">';
				echo '<div class="heading">' . get_the_title() . '</div>';
				echo '<div class="text">' . get_field('industry_index_text') . '</div>';
				echo '<div class="link">';
					 echo '<a href="' . get_the_permalink() . '">' . get_field('industry_index_link_text') . '<i class="fa-regular fa-arrow-right-long"></i>' . '</a>';
				echo '</div>';
			echo '</div>';

		echo '</div>';		
		
	echo '</section>';

?>