<?php
	$block_name = "hero";
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

	$theme = get_field('hero_theme_select');
	if (($theme == "apple-green") ||
	    ($theme == "bangladesh-green") ||
		($theme == "jet") ||
		($theme == "tiffany-blue")) :
			echo '<style>
						nav .menu-desktop .menu-desktop-container .logo .logo-name  { color: #FFFFFF; }
						nav .menu-desktop .menu-desktop-container .top-links .top-link a { color: #FFFFFF; }
						nav .menu-desktop .menu-desktop-container .top-links .top-link a:hover { color: #68D671; transition-duration: 300ms;}
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
	echo '<section id="' . esc_attr($id). '" class="' . esc_attr($className) .'">'; 

		echo '<div class="theme theme-' . $theme . '">';
				
			if (get_field('hero_background_image_desktop')) :
				echo '<div class="background-image background-image-desktop"><img src="' . get_field('hero_background_image_desktop') . '"></div>';
				echo '<div class="background-image background-image-mobile"><img src="' .  get_field('hero_background_image_mobile') . '"></div>';	
			endif;
			
			echo '<div class="wrapper">';
				echo '<div class="content">';
					
					// $post_type_obj = get_post_type_object(get_post_type());
					// echo '<div class="post-title">' . $post_type_obj->labels->name . ' / ' . get_the_title() . '</div>';
					if (get_post_type() == 'jobs') : 
						echo '<div class="post-title">' . 'CAREERS' . '</div>';
					else :
						echo '<div class="post-title">' . get_the_title() . '</div>';
					endif;
					echo '<div class="headline">' . get_field('hero_headline') . '</div>';
					echo '<div class="intro">' . get_field('hero_intro') . '</div>';
					echo '<div class="text">' . get_field('hero_text') . '</div>';
					
					$link = get_field('hero_button');
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
		echo '</div>';
		
	echo '</section>';
?>