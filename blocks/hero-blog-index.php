

<?php if (($_GET['category']) || ($_GET['search'])  || ($_GET['authored'])) : ?>
	
	<?php
		$block_name = "hero-blog-index-get";
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
		echo '<section id="' . esc_attr($id). '" class="hero-image ' . esc_attr($className) . '">'; 
			
			if ($_GET['category']) :
				$cat = get_category_by_slug($_GET['category']); 
				echo '<div class="browsing">' . 'Browsing articles about ' . $cat->name . '</div>';
			endif;
			if ($_GET['search']) :
				echo '<div class="browsing">' . 'Browsing articles about "' . $_GET['search'] . '"</div>';
			endif;
			if ($_GET['authored']) :
				$args = array (
					'post_type' 		=> 'staff',
					'post_status' 		=> 'publish',
					'p'					=> $_GET['authored']
				);
				$query = new WP_Query($args);
				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post();
						$post_id = get_the_id();
						echo '<div class="browsing">' . 'Browsing articles written by  ' . get_field('staff_first_name', $post_id) . ' ' . get_field('staff_last_name', $post_id) . '</div>';
					endwhile;
				endif;
			endif;
			
		
		echo '</section>';
		
	?>		
		
		<style>
			nav .menu-desktop .menu-desktop-container .logo .logo-name  { color: #FFFFFF; }
				nav .menu-desktop .menu-desktop-container .top-links .top-link a { color: #FFFFFF; }
				nav .menu-desktop .menu-desktop-container .top-links .top-link a:hover { color: #57B750; transition-duration: 300ms;}
				nav .menu-mobile .top-level .logo .logo-name { color: #FFFFFF; }
				nav .menu-mobile .top-level .open { color: #FFFFFF; }
		</style>
		<script>
			$(document).ready(function(){
				$("nav .menu-desktop .menu-desktop-container .logo img").attr("src", "<?php echo get_field('menu_desktop_logo_white','options'); ?>"); 
				$("nav .menu-mobile .top-level .logo img").attr("src", "<?php echo get_field('menu_mobile_logo_white','options'); ?>"); 
				$("nav .menu-desktop .menu-desktop-container .top-links .megamenu-link").mouseleave(function(){
					$("nav .menu-desktop .menu-desktop-container .top-links .top-link .megamenu-active").css("background-color", "transparent");
				});
			});
		</script>
		
<?php else : ?>

	<?php
		$block_name = "hero-blog-index";
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
		nav .menu-desktop .menu-desktop-container .logo .logo-name  { color: #FFFFFF; }
		nav .menu-desktop .menu-desktop-container .top-links .top-link a { color: #FFFFFF; }
		nav .menu-desktop .menu-desktop-container .top-links .top-link a:hover { color: #57B750; transition-duration: 300ms;}
		nav .menu-mobile .top-level .logo .logo-name { color: #FFFFFF; }
		nav .menu-mobile .top-level .open { color: #FFFFFF; }
	</style>
	<script>
		$(document).ready(function(){
			$("nav .menu-desktop .menu-desktop-container .logo img").attr("src", "<?php echo get_field('menu_desktop_logo_white','options'); ?>"); 
			$("nav .menu-mobile .top-level .logo img").attr("src", "<?php echo get_field('menu_mobile_logo_white','options'); ?>"); 
		});
	</script>
	<?php
		echo '<div class="clearfix"></div>';	
		echo '<section id="' . esc_attr($id). '" class="hero-image ' . esc_attr($className) . '">'; 
		
			$args = array(
				'posts_per_page'	=> 1,
				'offset' 			=> 0,
				'orderby' 			=> 'post_date',
				'order' 			=> 'DESC',
				'post_status' 		=> 'publish'
			);
			$query = new WP_Query($args);
			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post();
					
					$post = get_post(get_the_id());
					$blocks = parse_blocks($post->post_content);

					foreach ($blocks[0]['innerBlocks'] as $block) :	
						if ($block['blockName'] == 'acf/hero-blog') :
							$background_image_desktop = $block['attrs']['data']['hero_blog_background_image_desktop'];
							$background_image_mobile  = $block['attrs']['data']['hero_blog_background_image_mobile'];
						endif;
					endforeach;
					
	?>
					<style>
						#<?php echo esc_attr($id); ?>  {
							background:url("<?php echo wp_get_attachment_url($background_image_desktop); ?>") center center no-repeat;
							background-size:cover
						}
						@media screen and (max-width: 800px) {
							#<?php echo esc_attr($id); ?>  { 
								background:url("<?php echo wp_get_attachment_url($background_image_mobile); ?>") center center no-repeat;
								background-size:cover
							}
						}
					</style>
	
	<?php
					
					$post_categories 		= get_post_primary_category($post->ID, 'category'); 
					$primary_category 		= $post_categories['primary_category'];
					$primary_category_name 	= $post_categories['primary_category']->name;
					$primary_category_slug 	= $post_categories['primary_category']->slug;
											
					echo '<div class="hero-blog-index-overlay">';
		
						echo '<div class="wrapper">';
								
							echo '<div class="content">';
							
								echo '<div class="brain">';
									echo '<i class="fa-solid fa-brain"></i>';
									echo '<span>' . 'BLOG' . '</span>';
								echo '</div>';
							
								echo '<div class="meta">';
									echo '<div class="date">' . 'Latest' . '</div>';
									$category = get_the_category(); 
									foreach ($category as $c) :
										if ($c->category_parent == 0) :
											echo '<div class="category"><a href="' . site_url() . '/blog?category=' . $c->slug .'">' . $c->name . '</a></div>';
										endif;
									endforeach;
								echo '</div>';
								
								echo '<div class="title">' . get_the_title() . '</div>';
								
								echo '<div class="read-more">';
									echo '<i class="fa-solid fa-align-right"></i>';
									echo '<a href="' . get_the_permalink() . '">' . 'READ MORE' . '</a>';
							echo '</div>';
						
						echo '</div>';
						
					echo '</div>';
					
				endwhile;
			endif;	
		
		echo '</section>';
		
endif;
?>