<?php
	$block_name = "blog-sidebar";
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

		if (get_field('blog_sidebar_show_search')) :
			echo '<div class="search">';
				echo '<form action="' . site_url() . '/blog" method="get" class="searchform">';
					echo '<input type="text" name="search" placeholder="Search ' . '" />';
				echo '</form>';
				echo '<div class="icon"><i class="fa-regular fa-magnifying-glass"></i></div>';
			echo '</div>';
		endif;
		
		if (get_field('blog_sidebar_show_subscribe')) :
			echo '<div class="subscribe">';
				echo '<div class="headline">' . get_field('blog_sidebar_subscribe_headline') . '</div>';
				echo '<div class="text">' . get_field('blog_sidebar_subscribe_text') . '</div>';
				$shortcode = get_field('blog_sidebar_subscribe_form');
				echo do_shortcode($shortcode);
			echo '</div>';
		endif;
		
		if (get_field('blog_sidebar_show_categories')) :
			echo '<div class="categories">';
				echo '<div class="bookmark"><i class="fa-solid fa-bookmark"></i></div>';
				$i=0;
				$categories = get_categories_hierarchical();
				foreach($categories as $category) :
					if ($category->name != 'Uncategorized') :
						$i++;
						if ($i==1) :
		   					echo '<div class="parent-category first"><a href="' . site_url() . '/blog?category=' . $category->slug .'">' . $category->name . '</a></div>';
						else :
						   	echo '<div class="parent-category"><a href="' . site_url() . '/blog?category=' . $category->slug .'">' . $category->name . '</a></div>';
						endif;
						$child_categories = $category->child_categories;
						foreach($child_categories as $child_category) :
						   	echo '<div class="child-category"><a href="' . site_url() . '/blog?category=' . $child_category->slug .'">' . $child_category->name . '</a></div>';
						endforeach;
					endif;
				endforeach;
			echo '</div>';
		endif;
		
	echo '</section>';
	
?>