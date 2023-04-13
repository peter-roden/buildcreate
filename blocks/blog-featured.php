<?php
	$block_name = "blog-featured";
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

<?php
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . ' blog-featured-theme-' . get_field('radio_button_backgrounds') . '">'; 
	
		echo '<div class="wrapper">';
			
			$blog_featured = get_field('blog_featured');
			if ($blog_featured) :
				foreach ($blog_featured as $blog) :
					$post_id = $blog;
				
					echo '<div class="content">';
					
						echo '<div class="brain">';
							echo '<i class="fa-solid fa-brain"></i>';
							echo '<span>' . 'BLOG' . '</span>';
						echo '</div>';
						
						echo '<div class="title">' . '<a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a>' . '</div>';
	
						$authors = get_field('post_author',$post_id);
						if ($authors): 
							foreach ($authors as $author ): 
								echo '<div class="author">';
									echo '<a class="image" href="' . get_the_permalink($author) . '">' . '<img src="' . get_field ('staff_image', $author) . '"/>'  . '</a>';
									echo '<div class="name-title">';
										echo '<a class="name" href="' . get_the_permalink($author) . '">';
								 			echo get_field('staff_first_name',$author) . ' ';
								 			echo '<span>' . get_field('staff_last_name',$author) . '</span>';
										echo '</a>';
										echo '<div class="title">' . get_field('staff_title',$author) . '</div>';
									echo '</div>';
								echo '</div>';
							endforeach;
						endif;	
				
						echo '<div class="meta">';
							echo '<div class="date">' . get_the_date( 'F jS, Y' ) . '</div>';
							$category = get_the_category($post_id); 
							$category_parent_id = $category[0]->category_parent;
							if ( $category_parent_id != 0 ) :
								$category_parent = get_term( $category_parent_id, 'category' );
								echo '<div class="category"><a href="' . get_category_link($category_parent->term_id) . '">' . $category_parent->name . '</a></div>';
							endif;
						echo '</div>';		
					
					echo '</div>';	
						
				endforeach;	
			endif;
			
		echo '</div>';
		
	echo '</section>';
?>