<?php get_header(); ?>
<?php 

	if(have_posts()) : 
		
		echo '<div class="wrapper">';
		
			while(have_posts()) : 
				the_post(); 
				$post_id = get_the_id();
				
				$blocks = parse_blocks( get_the_content() );
				foreach ($blocks as $block) :
					if ($block['blockName'] == 'acf/cta-with-image') :
						$cta_with_image .= render_block($block);
					endif;
				endforeach;
				
				echo '<div class="single-staff-container">';

					echo '<a class="back mobile" href="' . site_url() . '/about/">' . '<i class="fa-regular fa-arrow-left-long"></i>' . 'Back to About' . '</a>';
				
					echo '<div class="left">';
					
						echo '<div class="content">';
							echo '<div class="image">' . '<img src="' . get_field('staff_image', $post_id) . '">' . '</div>';
							echo '<div class="text">';
								echo '<div class="name">';
									echo '<span class="first-name">' . get_field('staff_first_name', $post_id) . '</span>'; 
									echo '<span class="last-name">'  . get_field('staff_last_name', $post_id)  . '</span>';
								echo '</div>';
								echo '<div class="title">' . get_field('staff_title', $post_id) . '</div>';
								echo '<div class="bio">' . get_field('staff_bio', $post_id) . '</div>'; 
							echo '</div>';
						echo '</div>';
						
						echo '<div class="quote-container">';
							echo '<div class="icon">' . '<i class="fa-solid fa-quote-left"></i>' . '</div>';
							echo '<div class="quote">' . get_field('staff_quote', $post_id) . '</div>'; 
						echo '</div>';
					
					echo '</div>';
					
					echo '<div class="right">';
					
						echo '<a class="back desktop" href="' . site_url() . '/about/">' . '<i class="fa-regular fa-arrow-left-long"></i>' . 'Back to About' . '</a>';
						
						if (have_rows('staff_education', $post_id)) :
							echo '<div class="education-container">';
								echo '<div class="label">' . 'EDUCATION' . '</div>'; 
								while (have_rows('staff_education', $post_id)) : 
									the_row();
									echo '<div class="school-container">';
										echo '<div class="major">' . get_sub_field('major') . '</div>';
										echo '<div class="school">' . get_sub_field('school') . '</div>';
									echo '</div>';
								endwhile;
							echo '</div>';
						endif;
						
						if (have_rows('staff_expertise', $post_id)) : 
							echo '<div class="expertise-container">';
								echo '<div class="label">' . 'EXPERTISE' . '</div>'; 
								echo '<ul class="fa-ul">';
									while (have_rows('staff_expertise', $post_id)) : the_row();
										echo '<li><span class="fa-li"><i class="fa-regular fa-chevron-right"></i></span>' . get_sub_field('area') . '</li>';
									endwhile;
								echo '</ul>';
							echo '</div>';
						endif;
						
					echo '</div>';
					
				echo '</div>';
		
			endwhile; 

		echo '</div>';
		
	endif; 
	
	$author_found = FALSE;
	$args = array (
		'post_type' 		=> 'post',
		'posts_per_page'	=> -1,
		'orderby' 			=> 'post_date',
		'order' 			=> 'DESC',
		'post_status' 		=> 'publish'
	);
	$query = new WP_Query($args);
	if ($query->have_posts()) :
		while ($query->have_posts()) : $query->the_post();
		$id = get_the_id();
			$authors = get_field('post_author',$id);
			if ($authors): 
				foreach ($authors as $author ): 
					if ($author == $post_id) :
						$author_found = TRUE;
					endif;
				endforeach;
			endif;
		endwhile;		
	endif;
	
	if ($author_found) :
		
		$args = array (
			'post_type' 		=> 'post',
			'posts_per_page'	=> -1,
			'orderby' 			=> 'post_date',
			'order' 			=> 'DESC',
			'post_status' 		=> 'publish'
		);
		$query = new WP_Query($args);
		if ($query->have_posts()) :
				
			echo '<div class="wrapper">';
			
				echo '<div class="articles-by">';
			
					echo '<div class="top">';
						echo '<div class="by">' . 'Articles by ' . get_field('staff_first_name', $post_id) . '</div>';
						if ($query->found_posts > 3) :
							echo '<a class="desktop" href="' . site_url() . '/blog?authored=' . $post_id . '">' . 'View All' . '</a>'; 
						endif;
					echo '</div>';
					
					echo '<div class="post-containers">';
				
						$i=0;
						while ($query->have_posts()) : $query->the_post();
							$id = get_the_id();
								
							$authors = get_field('post_author',$id);
							if ($authors): 
										
								foreach ($authors as $author ): 
									if ($author == $post_id) :
										
										$i++;
										if ($i <= 3) :
															
											echo '<div class="post-container">';
											
												echo '<div class="content">';
											
													echo '<a class="title" href="' . get_the_permalink($id) . '">' . get_the_title($id) . '</a>';
											
													$category = get_the_category ($id,); 
													$category_parent_id = $category[0]->category_parent;
													if ($category_parent_id == 0) :
														$category_parent_id = $category[0]->term_id;
													endif;
													$term_id = 'term_' . $category_parent_id;
											
													echo '<div class="meta">';
														echo '<div class="date">' . get_the_date('F jS, Y',$id) . '</div>';
														foreach ($category as $c) :
															if ($c->category_parent == 0) :
																echo '<div class="category"><a href="' . site_url() . '/blog?category=' . $c->slug .'">' . $c->name . '</a></div>';
															endif;
														endforeach;
													echo '</div>';
													
												echo '</div>';
												
											echo '</div>';
										
										endif;
										
									endif;
								endforeach;
								
							endif;	
							
						endwhile;
					
					echo '</div>';
					
					if ($query->found_posts > 3) :
						echo '<a class="mobile" href="' . site_url() . '/blog?authored=' . $post_id . '">' . 'View All' . '</a>'; 
					endif;
	
				echo '</div>';
			
			echo '</div>';
			
		endif;
	
	endif;
	
	echo $cta_with_image;	

?>
<?php get_footer(); ?>