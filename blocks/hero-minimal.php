<?php
	$block_name = "hero-minimal";
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
	@media screen and (max-width: 800px) {
		#<?php echo esc_attr($id); ?>  { 
			background:url("<?php echo wp_get_attachment_url(get_field('hero_minimal_mobile_background_image')); ?>") center center no-repeat;
			background-size:cover
		}
	}
</style>

<?php

	$background_color = get_field('hero_minimal_background');
	if (($background_color == "blue-stone") ||
	($background_color == "caribbean-green") ||
	($background_color == "gondola") ||
	($background_color == "fern")) :
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
	echo '<section id="' . esc_attr($id). '" class="hero-image ' . esc_attr($className) . ' hero-minimal-' . get_field('hero_minimal_background') . '">'; 
		echo '<div class="wrapper">';
			echo '<div class="content">';
			
				echo '<div class="name">' . get_field('hero_minimal_name') . '</div>';
				echo '<div class="text">' . get_field('hero_minimal_text') . '</div>';
				
			echo '</div>';
		echo '</div>';
	echo '</section>';
?>