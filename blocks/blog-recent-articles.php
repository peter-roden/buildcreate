<?php
	$block_name = "blog-recent-articles";
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
	
	$location = get_field('show_recent_articles_location');
	if (get_field('show_recent_articles_rounded')) :
		$corners = 'corners';
	else :
		$corners= '';
	endif;
	
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) . ' location-' . $location . '">'; 
			
		echo '<div class="wrapper">'; 	
				
			echo '<div class="theme theme-' . $location . ' blog-recent-articles-theme-'. get_field('radio_button_backgrounds') . ' ' . $corners .'">'; 	
		
				echo '<div class="recent">' . get_field('show_recent_articles_headline') . '</div>';
				
				echo '<div class="post-containers">';
				
					$args = array (
						'post_type' 		=> 'post',
						'posts_per_page'	=> 3,
						'orderby' 			=> 'post_date',
						'order' 			=> 'DESC',
						'post_status' 		=> 'publish'
					);
					$query = new WP_Query($args);
					if ($query->have_posts()) :
						$i=0;
						while ($query->have_posts()) : $query->the_post();
							$i++;
							$post_id = get_the_id();
														
							echo '<div class="post-container">';
			
								echo '<div class="content">';
							
									echo '<a class="title" href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a>';
							
									$category = get_the_category ($post_id,); 
									$category_parent_id = $category[0]->category_parent;
									if ($category_parent_id == 0) :
										$category_parent_id = $category[0]->term_id;
									endif;
									$term_id = 'term_' . $category_parent_id;
							
									echo '<div class="meta">';
										echo '<div class="date">' . get_the_date('F jS, Y',$post_id) . '</div>';
										foreach ($category as $c) :
											if ($c->category_parent == 0) :
												echo '<div class="category"><a href="' . site_url() . '/blog?category=' . $c->slug .'">' . $c->name . '</a></div>';
											endif;
										endforeach;
									echo '</div>';
									
								echo '</div>';
								
							echo '</div>';
								
						endwhile;
					endif;	
				
				echo '</div>';
				
			echo '</div>';
				
		echo '</div>';

	echo '</section>';
?>