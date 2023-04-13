<?php /** Template for displaying 404 pages (Not Found) */ ?>

<?php get_header(); ?>
 
 <style>
	 nav .menu-desktop .menu-desktop-container .logo .logo-name  { color: #FFFFFF; }
	 nav .menu-desktop .menu-desktop-container .top-links .top-link a { color: #FFFFFF; }
	 nav .menu-desktop .menu-desktop-container .top-links .top-link a:hover { color: #57B750; transition-duration: 300ms;}
	 nav .menu-mobile .top-level .logo .logo-name { color: #FFFFFF; }
	 nav .menu-mobile .top-level .open { color: #FFFFFF; }
</style>

<?php
 
	echo '<script>
		$(document).ready(function(){
			$("nav .menu-desktop .menu-desktop-container .logo img").attr("src", "' . get_field('menu_desktop_logo_white','options') . '"); 
			$("nav .menu-mobile .top-level .logo img").attr("src", "' . get_field('menu_mobile_logo_white','options') . '"); 
			$("nav .menu-desktop .menu-desktop-container .top-links .megamenu-link").mouseleave(function(){
				$("nav .menu-desktop .menu-desktop-container .top-links .top-link .megamenu-active").css("background-color", "transparent");
			});
		});
	</script>';

	 echo '<div class="clearfix"></div>';	
	 echo '<section id="not-found">';
		  echo '<div class="not-found-container">';
		  	echo '<div class="image">';
				echo '<div class="mobile-image">';
					echo '<img src="' . wp_get_attachment_url(get_field('not_found_desktop_image','options')) . '">';
				echo '</div>';
				echo '<div class="desktop-image">';
					echo '<img src="' . wp_get_attachment_url(get_field('not_found_desktop_image','options')) . '">';
				echo '</div>';
			echo '</div>';
			echo '<div class="content">';
				echo '<div class="heading">' . get_field('not_found_heading','options') . '</div>';
				echo '<div class="text">' . get_field('not_found_text','options') . '</div>';
			echo '</div>';
		echo '</div>';
	 echo '</section>';
?>
 
 <?php get_footer(); ?>