<?php
	$block_name = "blog-post-index";
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
	
		echo '<div class="category-select-desktop">';
			echo '<div class="browse">' . 'BROWSE:' . '</div>';
			$categories = get_categories_hierarchical();
			foreach($categories as $category) :
				if ($category->slug != 'uncategorized') :
					echo '<div class="parent-category"><a href="' . site_url() . '/blog?category=' . $category->slug .'">' . $category->name . '</a></div>';
				endif;
			endforeach;
		echo '</div>';
		
		echo '<div class="category-select-mobile">';
			echo '<table>';
				echo '<tr>';
				echo '<td><div class="browse">' . 'BROWSE:' . '</div></td>';	
				$categories = get_categories_hierarchical();
				$i=0;
				foreach($categories as $category) :
					$i++;
					if ($category->name != 'Uncategorized') :
						if ($i == 1 ) :
							echo '<td><div class="parent-category first"><a href="' . site_url() . '/blog?category=' . $category->slug .'">' . $category->name . '</a></div></td>';
							echo '</tr>';
						else :
							echo '<tr>';
							echo '<td>&nbsp;</td>';
							echo '<td><div class="parent-category other"><a href="' . site_url() . '/blog?category=' . $category->slug .'">' . $category->name . '</a></div></td>';
							echo '</tr>';
						endif;
					endif;
				endforeach;
			echo '</table>';
		echo '</div>';

		echo '<div class="blog-container">';
			
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			if ($_GET['category']) :
				$args = array (
					'post_type' 		=> 'post',
					'posts_per_page'	=> 6,
					'orderby' 			=> 'post_date',
					'order' 			=> 'DESC',
					'post_status' 		=> 'publish',
					'paged' 			=> $paged,
					'category_name'		=> $_GET['category']
				);
			elseif ($_GET['search']) :
				$args = array (
					'post_type' 		=> 'post',
					'posts_per_page'	=> 6,
					'orderby' 			=> 'post_date',
					'order' 			=> 'DESC',
					'post_status' 		=> 'publish',
					'paged' 			=> $paged,
					's' 				=> $_GET['search']
				);
			elseif ($_GET['authored']) :		
				$args = array (
					'post_type' 		=> 'post',
					'posts_per_page'	=> 6,
					'orderby' 			=> 'post_date',
					'order' 			=> 'DESC',
					'post_status' 		=> 'publish',
					'paged' 			=> $paged,
					'meta_query' => array(
						array(
							'key' 		=> 'post_author',
							'value'		=> '"' . $_GET['authored'] . '"', 
							'compare' 	=> 'LIKE'
						)
					)
				);	
			else :
				$args = array (
					'post_type' 		=> 'post',
					'posts_per_page'	=> 6,
					'orderby' 			=> 'post_date',
					'order' 			=> 'DESC',
					'post_status' 		=> 'publish',
					'paged' 			=> $paged
				);
			endif;
			$query = new WP_Query($args);
			if ($query->have_posts()) :
				$i=0;
				while ($query->have_posts()) : $query->the_post();
					$i++;
					$post_id = get_the_id();
					
					if ($i == 1) :
						if (empty($_GET)) :
							 continue;
						endif;
					endif;
												
					$post_categories 		= get_post_primary_category($post->ID, 'category'); 
					$primary_category 		= $post_categories['primary_category'];
					$primary_category_name 	= $post_categories['primary_category']->name;
					$primary_category_slug 	= $post_categories['primary_category']->slug;
											
					echo '<div id="post-container-' . $i . '" class="post-container category-' . $primary_category_slug . '">';
					
						$post = get_post($post_id);
						$blocks = parse_blocks($post->post_content);
						foreach ($blocks as $block) :
							if ($block['blockName'] == 'acf/hero-blog') :
								$hero_blog_background_image_desktop = $block['attrs']['data']['hero_blog_background_image_desktop'];
								$hero_blog_background_image_mobile  = $block['attrs']['data']['hero_blog_background_image_mobile'];
							endif;
						endforeach;
							
						echo '<style>
							#post-container-' . $i . '{
								background:url("' . wp_get_attachment_url($hero_blog_background_image_desktop) .'") center center no-repeat;
								background-size:cover
							}
							#post-container-' . $i . ':hover .content .title {
								color: #D1EA6A;
								transition-duration: 300ms;
							}
							@media screen and (max-width: 800px) {
								#post-container-' . $i . '{
									background:url("' . wp_get_attachment_url($hero_blog_background_image_mobile) .'") center center no-repeat;
									background-size:cover
								}
								#post-container-' . $i . ':hover .content .title {
									color: #D1EA6A;
									transition-duration: 300ms;
								}
							}
						</style>';
												
						echo '<div class="category-' . $primary_category_slug . '">';

							echo '<div class="content">';
						
									echo '<div class="meta">';
										echo '<div class="date">' . get_the_date('F jS, Y',$post_id) . '</div>';
										echo '<div class="category"><a href="' . site_url() . '/blog?category=' . $primary_category_slug .'">' . $primary_category_name . '</a></div>';
									echo '</div>';
									
									echo '<a class="title" href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a>';
									
									echo '<div class="read-more">';
										echo '<i class="fa-solid fa-align-right"></i>';
										echo '<a href="' . get_the_permalink($post_id) . '">' . 'READ NOW' . '</a>';
									echo '</div>';
								
							echo '</div>';
						
						echo '</div>';
					
					echo '</div>';
					
					echo '<script>';
						echo 'jQuery(document).ready(function($){';
							echo '$("#post-container-' . $i . '").click(function() {'; 
								echo "window.location = '" . get_the_permalink($post_id) . "';";
							echo '});';
						echo '});';
					echo '</script>'; 
					
				endwhile;
			endif;	

			$GLOBALS['wp_query']->max_num_pages = $query->max_num_pages;
			the_posts_pagination( array(
			   'mid_size' => 1,
			   'prev_text' => __( 'PREVIOUS', 'green' ),
			   'next_text' => __( 'NEXT', 'green' ),
			   'screen_reader_text' => __( 'Posts navigation' )
			));
			
			echo '<script>';
				echo 'jQuery(document).ready(function($){';
					echo '$(".nav-links .prev").removeClass("page-numbers");'; 
					echo '$(".nav-links .next").removeClass("page-numbers");'; 
				echo '});';
			echo '</script>'; 
				
		echo '</div>';

	echo '</section>';
?>