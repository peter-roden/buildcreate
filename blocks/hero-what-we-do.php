<?php
	$block_name = "hero-what-we-do";
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

	$gradient = get_field('hero_gradient_select');
	if (($gradient == 'gradient-3') ||
	    ($gradient == 'gradient-4') ||
		($gradient == 'gradient-4') ||
		($gradient == 'gradient-5') ||
		($gradient == 'gradient-6') ||
		($gradient == 'gradient-8') ||
		($gradient == 'gradient-9') ||
		($gradient == 'gradient-10')) :
		echo '<style>
					nav .menu-desktop .menu-desktop-container .logo .logo-name  { color: #FFFFFF; }
					nav .menu-desktop .menu-desktop-container .top-links .top-link a { color: #FFFFFF; }
					nav .menu-desktop .menu-desktop-container .top-links .top-link a:hover { color: #57B750; transition-duration: 300ms;}
					nav .menu-mobile .top-level .logo .logo-name { color: #FFFFFF; }
					nav .menu-mobile .top-level .open { color: #FFFFFF; }
		  	</style>';
		echo '<script>
			  	$(document).ready(function(){
				  	$("nav .menu-desktop .menu-desktop-container .logo img").attr("src", "' . get_field('menu_desktop_logo_white','options') . '"); 
					$("nav .menu-mobile .top-level .logo img").attr("src", "' . get_field('menu_mobile_logo_white','options') . '"); 
					$("nav .menu-desktop .menu-desktop-container .top-links .megamenu-link").mouseleave(function(){
						$("nav .menu-desktop .menu-desktop-container .top-links .top-link .megamenu-active").css("background-color", "transparent");
					});
			  	});
		  	</script>';
	endif;
	
	echo '<div class="clearfix"></div>';	
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) .' ' . $gradient . ' mobile-' . get_field('hero_what_we_do_image_mobile_location') . '">'; 
				
			echo '<div class="wrapper desktop-' . get_field('hero_what_we_do_image_desktop_location') . '">';		
				echo '<div class="hero-what-we-do-container">';
							
					echo '<div class="content ' . get_field('hero_what_we_do_image_desktop_location') . '">';
					
						$back_or_title = get_field('hero_what_we_do_back_or_title');
						
						if ($back_or_title == 'back') :
							$post_data = get_post($post->post_parent);
							$post_type = $post_data->post_type;
							echo '<div class="back-or-title">';
								echo '<a href="' . site_url() . '/' . $post_type . '/">' . '<i class="fa-light fa-arrow-left-long"></i>' . 'Back' . '</a>';
							echo '</div>';
						endif;
						if ($back_or_title == 'title') :
							echo '<div class="back-or-title uppercase">';
								echo get_the_title(get_the_id());
							echo '</div>';
						endif;
						
						if (get_field('hero_what_we_do_description')) : 
							echo '<h1 class="description">' . strip_tags(get_field('hero_what_we_do_description')) . '</h1>';
						endif;
						if (get_field('hero_what_we_do_text')) : 
							echo '<div class="text">' . get_field('hero_what_we_do_text') . '</div>';
						endif;
						
						if( have_rows('hero_what_we_do_columns') ):
							$l=0;
							$columns=0;
							while( have_rows('hero_what_we_do_columns') ) : the_row();
								$l++;
								$columns++;
								
								if ($columns % 2 != 0) :
									echo '<div class="columns">';
								endif;
								
								if ((count(get_field('hero_what_we_do_columns')) > 1) && (get_sub_field('heading_column'))) :
									echo '<div class="column">';
										echo '<div class="heading">' . get_sub_field('heading') . '</div>';
									echo '</div>';
								endif;
								
								if ((count(get_field('hero_what_we_do_columns')) > 1) && ($l == count(get_field('hero_what_we_do_columns')))) :
									echo '<div class="column last column-' . $columns . '">';
								else :
									echo '<div class="column column-' . $columns . '">';
								endif;
									
									
									if ((count(get_field('hero_what_we_do_columns')) == 1) && (get_sub_field('heading_column'))) :
										echo '<div class="heading">' . get_sub_field('heading') . '</div>';
									endif;
									if (!get_sub_field('heading_column')) :
										echo '<div class="heading">' . get_sub_field('heading') . '</div>';
									endif;
									if( have_rows('rows') ):
										echo '<ul class="fa-ul column-text">';
											while( have_rows('rows') ) : the_row();
												echo '<li><span class="fa-li"><i class="fas ' . get_sub_field('icon') . '"></i></span>' . get_sub_field('text') . '</li>';
											endwhile;
										echo '</ul>';
									endif;
									echo '</div>';
									
								if (($columns % 2 == 0) || (count(get_field('hero_what_we_do_columns')) == 1)) :
									echo '</div>';
									$columns = 0;
								endif;
								
							endwhile;
						endif;
					
					echo '</div>';
					
					echo '<div class="image image-' . get_field('hero_what_we_do_image_desktop_location') . '">';
						echo '<div class="desktop-image">';
							echo '<img src="' . get_field('hero_what_we_do_image_desktop') . '">';
						echo '</div>';
						$image_mobile_location = get_field('hero_what_we_do_image_mobile_location');
						echo '<div class="mobile-image mobile-' . $image_mobile_location . '">';
							echo '<img src="' . get_field('hero_what_we_do_image_mobile') . '">';
						echo '</div>';
					echo '</div>';
				
				echo '</div>';
			echo '</div>';
		
	echo '</section>';
?>