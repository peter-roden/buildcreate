<?php
	$block_name = "hero-blog";
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
		background:url("<?php echo wp_get_attachment_url(get_field('hero_blog_background_image_desktop')); ?>") center center no-repeat;
		background-size:cover
	}
	@media screen and (max-width: 800px) {
		#<?php echo esc_attr($id); ?>  { 
			background:url("<?php echo wp_get_attachment_url(get_field('hero_blog_background_image_mobile')); ?>") center center no-repeat;
			background-size:cover
		}
	}
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
<?php

	$post_categories 		= get_post_primary_category($post->ID, 'category'); 
	$primary_category 		= $post_categories['primary_category'];
	$primary_category_name 	= $post_categories['primary_category']->name;
	$primary_category_slug 	= $post_categories['primary_category']->slug;

	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="hero-image ' . esc_attr($className) . '">'; 
	
		echo '<div class="hero-blog-category-' . $primary_category_slug . '">';
	
			echo '<div class="is-layout-flex wp-container-3 wp-block-columns">';
				echo '<div class="is-layout-flow wp-block-column" style="flex-basis:25%"></div>';
				echo '<div class="is-layout-flow wp-block-column" style="flex-basis:75%">';
				
					$post_id = get_the_id();
									
					echo '<div class="content">';
						echo '<div class="meta">';
							echo '<div class="date">' . get_the_date( 'F jS, Y' ) . '</div>';
							$category = get_the_category(); 
							foreach ($category as $c) :
								if ($c->category_parent == 0) :
									echo '<div class="category">';
										echo '<a href="' . site_url() . '/blog?category=' . $c->slug . '">' . $c->name . '</a>';
									echo '</div>';
								endif;
							endforeach;
						echo '</div>';
						
						echo '<div class="title">' . get_the_title() . '</div>';
						
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
					
				echo '</div>';
			echo '</div>';
			
		echo '</div>';
		
	echo '</section>';
?>