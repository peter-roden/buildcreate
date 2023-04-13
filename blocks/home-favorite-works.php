<?php
	$block_name = "home-favorite-works";
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
	
	if (get_field('home_favorite_works_rounded')) :
		$corners = 'corners';
	else :
		$corners= '';
	endif;
	
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . '">'; 
			
		echo '<div class="wrapper">'; 	
			
			$home_favorite_works = get_field('home_favorite_works');
			$home_favorite_work  = get_field('home_favorite_work');
			
			echo '<div class="row">';
			for ($i = 0; $i <= 2; $i++) :
				
				$post = get_post($home_favorite_works[$i]);
				$blocks = parse_blocks($post->post_content);
				foreach ($blocks as $block) :
					if ($block['blockName'] == 'acf/work-index') :
						$work_index_image = $block['attrs']['data']['work_index_image'];
					endif;
				endforeach;
				
				echo '<div class="column column-' . $i . '">';
				
?>		
					<style>
						.column-<?php echo $i; ?> {
							background:url("<?php echo wp_get_attachment_url($work_index_image); ?>") center center no-repeat;
							background-size:cover
						}
					</style>
					
<?php
					echo '<a class="rollover ' . $corners . '" href="' . get_the_permalink($home_favorite_works[$i]) . '">';
						echo '<div class="eye"><i class="fa-solid fa-eye"></i></div>';
					echo '</a>';
				echo '</div>';
			endfor;
			echo '</div>';
			
			echo '<div class="middle">';
				echo '<div class="headline">' . get_field('home_favorite_works_headline') . '</div>';
				echo '<div class="link"><a href="'. get_the_permalink($home_favorite_work[0])  . '">' .  'See our favorite work' . '</a></div>';
			echo '</div>';
			
			echo '<div class="row">';
			for ($i = 3; $i <= 5; $i++) :
				
				$post = get_post($home_favorite_works[$i]);
				$blocks = parse_blocks($post->post_content);
				foreach ($blocks as $block) :
					if ($block['blockName'] == 'acf/work-index') :
						$work_index_image = $block['attrs']['data']['work_index_image'];
					endif;
				endforeach;
								
				echo '<div class="column column-' . $i . '">';
								
?>		
					<style>
						.column-<?php echo $i; ?> {
							background:url("<?php echo wp_get_attachment_url($work_index_image); ?>") center center no-repeat;
							background-size:cover
						}
					</style>
					
<?php
					echo '<a class="rollover ' . $corners . '" href="' . get_the_permalink($home_favorite_works[$i]) . '">';
						echo '<div class="eye"><i class="fa-solid fa-eye"></i></div>';
					echo '</a>';
				echo '</div>';
			endfor;
			echo '</div>';
				
		echo '</div>';

	echo '</section>';
?>