<?php

// ACF Options
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> '404 Settings',
		'menu_title'	=> '404',
		'parent_slug'	=> 'site-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Menu Desktop Settings',
		'menu_title'	=> 'Menu Desktop',
		'parent_slug'	=> 'site-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Menu Mobile Settings',
		'menu_title'	=> 'Menu Mobile',
		'parent_slug'	=> 'site-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Newsletter Popup Settings',
		'menu_title'	=> 'Newsletter Popup',
		'parent_slug'	=> 'site-settings',
	));
}

// buildcreate block category
function bc_plugin_block_categories( $categories ) {
	return array_merge(
		$categories,
		[
			[
				'slug'  => 'bc',
				'title' => __( 'buildcreate', 'buildcreate' ),
			],
		]
	);
}
add_action( 'block_categories', 'bc_plugin_block_categories', 10, 2 );

// Custom ACF blocks
add_action('acf/init', 'bc_acf_blocks_init');
function bc_acf_blocks_init() {

	if( function_exists('acf_register_block_type') ) {
		acf_register_block_type(array(
			'name'              => 'Big Feature with Intro',
			'title'             => __('Big Feature with Intro'),
			'description'       => __('A row with an intro and large image block'),
			'render_template'   => 'blocks/big-feature-intro.php',
			'category'          => 'bc',
			'icon'				=> 'cover-image'
		));
		acf_register_block_type(array(
			'name'              => 'Blog Featured',
			'title'             => __('Blog Featured'),
			'description'       => __('Featured Blog'),
			'render_template'   => 'blocks/blog-featured.php',
			'category'          => 'bc',
			'icon'				=> 'awards'
		));
		acf_register_block_type(array(
			'name'              => 'Block Quote',
			'title'             => __('Block Quote'),
			'description'       => __('A Block Quote row'),
			'render_template'   => 'blocks/block-quote.php',
			'category'          => 'bc',
			'icon'				=> 'format-quote'
		));
		acf_register_block_type(array(
			'name'              => 'Blog Post',
			'title'             => __('Blog Post'),
			'description'       => __('A Blog Post'),
			'render_template'   => 'blocks/blog-post.php',
			'category'          => 'bc',
			'icon'				=> 'admin-post'
		));
		acf_register_block_type(array(
			'name'              => 'Blog Post Index',
			'title'             => __('Blog Post Index'),
			'description'       => __('The Blog Post index'),
			'render_template'   => 'blocks/blog-post-index.php',
			'category'          => 'bc',
			'icon'				=> 'admin-post'
		));
		acf_register_block_type(array(
			'name'              => 'Blog Recent Articles',
			'title'             => __('Blog Recent Articles'),
			'description'       => __('Recent Articles'),
			'render_template'   => 'blocks/blog-recent-articles.php',
			'category'          => 'bc',
			'icon'				=> 'admin-page'
		));
		acf_register_block_type(array(
			'name'              => 'Blog Sidebar',
			'title'             => __('Blog Sidebar'),
			'description'       => __('The Blog Sidebar'),
			'render_template'   => 'blocks/blog-sidebar.php',
			'category'          => 'bc',
			'icon'				=> 'columns'
		));
		acf_register_block_type(array(
			'name'              => 'Book Meeting',
			'title'             => __('Book Meeting'),
			'description'       => __('Book Meeting'),
			'render_template'   => 'blocks/book-meeting.php',
			'category'          => 'bc',
			'icon'				=> 'calendar-alt'
		));
		acf_register_block_type(array(
			'name'              => 'Case Study',
			'title'             => __('Case Study'),
			'description'       => __('A row to download a case study'),
			'render_template'   => 'blocks/case-study.php',
			'category'          => 'bc',
			'icon'				=> 'book-alt'
		));
		acf_register_block_type(array(
			'name'              => 'Client Logo Row',
			'title'             => __('Client Logo Row'),
			'description'       => __('A row to show client logos'),
			'render_template'   => 'blocks/client-logo-row.php',
			'category'          => 'bc',
			'icon'				=> 'images-alt'
		));
		acf_register_block_type(array(
			'name'              => 'Contact',
			'title'             => __('Contact'),
			'description'       => __('A Contact block'),
			'render_template'   => 'blocks/contact.php',
			'category'          => 'bc',
			'icon'				=> 'email-alt'
		));
		acf_register_block_type(array(
			'name'              => 'CTA with Image',
			'title'             => __('CTA with Image'),
			'description'       => __('A row with an CTA and image block'),
			'render_template'   => 'blocks/cta-with-image.php',
			'category'          => 'bc',
			'icon'				=> 'money'
		));
		acf_register_block_type(array(
			'name'              => 'CTA with No Image',
			'title'             => __('CTA with No Image'),
			'description'       => __('A row with an CTA block'),
			'render_template'   => 'blocks/cta-with-no-image.php',
			'category'          => 'bc',
			'icon'				=> 'money'
		));
		acf_register_block_type(array(
			'name'              => 'Hero',
			'title'             => __('Hero'),
			'description'       => __('The Hero block'),
			'render_template'   => 'blocks/hero.php',
			'category'          => 'bc',
			'icon'				=> 'cover-image'
		));
		acf_register_block_type(array(
			'name'              => 'Hero Blog',
			'title'             => __('Hero Blog'),
			'description'       => __('A Blog Post Hero'),
			'render_template'   => 'blocks/hero-blog.php',
			'category'          => 'bc',
			'icon'				=> 'cover-image'
		));
		acf_register_block_type(array(
			'name'              => 'Hero Blog Index',
			'title'             => __('Hero Blog Index'),
			'description'       => __('A Blog Index Hero'),
			'render_template'   => 'blocks/hero-blog-index.php',
			'category'          => 'bc',
			'icon'				=> 'cover-image'
		));
		acf_register_block_type(array(
			'name'              => 'Hero Home',
			'title'             => __('Hero Home'),
			'description'       => __('The Home Page Hero block'),
			'render_template'   => 'blocks/hero-home.php',
			'category'          => 'bc',
			'icon'				=> 'cover-image'
		));
		acf_register_block_type(array(
			'name'              => 'Hero Minimal',
			'title'             => __('Hero Minimal'),
			'description'       => __('A Minimal Hero block'),
			'render_template'   => 'blocks/hero-minimal.php',
			'category'          => 'bc',
			'icon'				=> 'cover-image'
		));
		acf_register_block_type(array(
			'name'              => 'Hero What We Do',
			'title'             => __('Hero with What We Do'),
			'description'       => __('The Hero with What We Do block'),
			'render_template'   => 'blocks/hero-what-we-do.php',
			'category'          => 'bc',
			'icon'				=> 'cover-image'
		));
		acf_register_block_type(array(
			'name'              => 'Home Favorite Works',
			'title'             => __('Home Favorite Works'),
			'description'       => __('Home Favorite Works block'),
			'render_template'   => 'blocks/home-favorite-works.php',
			'category'          => 'bc',
			'icon'				=> 'cover-image'
		));
		acf_register_block_type(array(
			'name'              => 'Home Featured Work',
			'title'             => __('Home Featured Work'),
			'description'       => __('Home Featured Work block'),
			'render_template'   => 'blocks/home-featured-work.php',
			'category'          => 'bc',
			'icon'				=> 'cover-image'
		));
		acf_register_block_type(array(
			'name'              => 'Industry Index',
			'title'             => __('Industry Index'),
			'description'       => __('Industry Post information for Index Page'),
			'render_template'   => 'blocks/industry-index.php',
			'category'          => 'bc',
			'icon'				=> 'index-card'
		));
		acf_register_block_type(array(
			'name'              => 'Industry Index Show All',
			'title'             => __('Industry Index Show All'),
			'description'       => __('Show all Posts for Industry Index'),
			'render_template'   => 'blocks/industry-index-show-all.php',
			'category'          => 'bc',
			'icon'				=> 'format-gallery'
		));
		acf_register_block_type(array(
			'name'              => 'Industry Work Example',
			'title'             => __('Industry - Work Example'),
			'description'       => __('An Industry Work example block'),
			'render_template'   => 'blocks/industry-work-example.php',
			'category'          => 'bc',
			'icon'				=> 'networking'
		));
		acf_register_block_type(array(
			'name'              => 'Image with Text',
			'title'             => __('Image with Text'),
			'description'       => __('An image with text block'),
			'render_template'   => 'blocks/image-with-text.php',
			'category'          => 'bc',
			'icon'				=> 'cover-image'
		));
		acf_register_block_type(array(
			'name'              => 'Job Requirements Proficiencies',
			'title'             => __('Job Requirements Proficiencies'),
			'description'       => __('Job Requirements Proficiencies block'),
			'render_template'   => 'blocks/job-requirements-proficiencies.php',
			'category'          => 'bc',
			'icon'				=> 'admin-users'
		));
		acf_register_block_type(array(
			'name'              => 'Job Submission',
			'title'             => __('Job Submission'),
			'description'       => __('Job Submission'),
			'render_template'   => 'blocks/job-submission.php',
			'category'          => 'bc',
			'icon'				=> 'upload'
		));
		acf_register_block_type(array(
			'name'              => 'Menu Row',
			'title'             => __('Menu Row'),
			'description'       => __('A Row with Menu items block'),
			'render_template'   => 'blocks/menu-row.php',
			'category'          => 'bc',
			'icon'				=> 'menu'
		));
		acf_register_block_type(array(
			'name'              => 'Numbers Feature',
			'title'             => __('Numbers Feature'),
			'description'       => __('A Numbers Feature block'),
			'render_template'   => 'blocks/numbers-feature.php',
			'category'          => 'bc',
			'icon'				=> 'backup'
		));
		acf_register_block_type(array(
			'name'              => 'Learn More Row',
			'title'             => __('Learn More Row'),
			'description'       => __('A Row with an Image and Learn More button block'),
			'render_template'   => 'blocks/learn-more-row.php',
			'category'          => 'bc',
			'icon'				=> 'welcome-learn-more'
		));
		acf_register_block_type(array(
			'name'              => 'Post Featured Image Links',
			'title'             => __('Post Featured Image Links'),
			'description'       => __('A Row with Post Featured Image links block'),
			'render_template'   => 'blocks/post-featured-image-links.php',
			'category'          => 'bc',
			'icon'				=> 'admin-post'
		));
		acf_register_block_type(array(
			'name'              => 'Process Stages',
			'title'             => __('Process Stages'),
			'description'       => __('A row with process stages block'),
			'render_template'   => 'blocks/process-stages.php',
			'category'          => 'bc',
			'icon'				=> 'controls-repeat'
		));
		acf_register_block_type(array(
			'name'              => 'Row with Image',
			'title'             => __('Row with Image'),
			'description'       => __('A row with an image block'),
			'render_template'   => 'blocks/row-with-image.php',
			'category'          => 'bc',
			'icon'				=> 'align-left'
		));
		acf_register_block_type(array(
			'name'              => 'Row with Video',
			'title'             => __('Row with Video'),
			'description'       => __('A row with a video block'),
			'render_template'   => 'blocks/row-with-video.php',
			'category'          => 'bc',
			'icon'				=> 'playlist-video'
		));
		acf_register_block_type(array(
			'name'              => 'Show Jobs',
			'title'             => __('Show Jobs'),
			'description'       => __('Show Jobs'),
			'render_template'   => 'blocks/show-jobs.php',
			'category'          => 'bc',
			'icon'				=> 'admin-users'
		));
		acf_register_block_type(array(
			'name'              => 'Show Newsletter Popup',
			'title'             => __('Show Newsletter Popup'),
			'description'       => __('Show Newsletter Popup'),
			'render_template'   => 'blocks/show-newsletter-popup.php',
			'category'          => 'bc',
			'icon'				=> 'feedback'
		));
		acf_register_block_type(array(
			'name'              => 'Show Staff',
			'title'             => __('Show Staff'),
			'description'       => __('Show Staff'),
			'render_template'   => 'blocks/show-staff.php',
			'category'          => 'bc',
			'icon'				=> 'admin-users'
		));
		acf_register_block_type(array(
			'name'              => 'Three Columns',
			'title'             => __('Three Columns'),
			'description'       => __('A row with three columns block'),
			'render_template'   => 'blocks/three-columns.php',
			'category'          => 'bc',
			'icon'				=> 'editor-insertmore'
		));
		acf_register_block_type(array(
			'name'              => 'Three Columns Text',
			'title'             => __('Three Columns Text'),
			'description'       => __('A row with three columns of textblock'),
			'render_template'   => 'blocks/three-columns-text.php',
			'category'          => 'bc',
			'icon'				=> 'editor-insertmore'
		));
		acf_register_block_type(array(
			'name'              => 'Two Columns Links',
			'title'             => __('Two Columns Links'),
			'description'       => __('A row with two columns of links block'),
			'render_template'   => 'blocks/two-columns-links.php',
			'category'          => 'bc',
			'icon'				=> 'editor-insertmore'
		));
		acf_register_block_type(array(
			'name'              => 'Four Columns Links',
			'title'             => __('Four Columns Links'),
			'description'       => __('A row with four columns of links block'),
			'render_template'   => 'blocks/four-columns-links.php',
			'category'          => 'bc',
			'icon'				=> 'editor-insertmore'
		));
		acf_register_block_type(array(
			'name'              => 'Work Index',
			'title'             => __('Work Index'),
			'description'       => __('Work Post information for Index Page'),
			'render_template'   => 'blocks/work-index.php',
			'category'          => 'bc',
			'icon'				=> 'index-card'
		));
		acf_register_block_type(array(
			'name'              => 'Work Index Show All',
			'title'             => __('Work Index Show All'),
			'description'       => __('Show all Posts for Work Index'),
			'render_template'   => 'blocks/work-index-show-all.php',
			'category'          => 'bc',
			'icon'				=> 'format-gallery'
		));
		acf_register_block_type(array(
			'name'              => 'Work Featured Image Links',
			'title'             => __('Work Featured Image Links'),
			'description'       => __('A Row with Work Featured Image links block'),
			'render_template'   => 'blocks/work-featured-image-links.php',
			'category'          => 'bc',
			'icon'				=> 'admin-post'
		));
	}
}

// Allowed block types
function bc_allowed_block_types() {
	
	$allowed_blocks = array();
	global $post; 
	
	switch ($post->post_name) {
		default :
			$allowed_blocks = array (
				'acf/big-feature-with-intro',
				'acf/block-quote',
				'acf/blog-featured',
				'acf/blog-post',
				'acf/blog-post-index',
				'acf/blog-sidebar',
				'acf/blog-recent-articles',
				'acf/book-meeting',
				'acf/case-study',
				'acf/client-logo-row',
				'acf/contact',
				'acf/cta-with-image',
				'acf/cta-with-no-image',
				'acf/hero',
				'acf/hero-blog',
				'acf/hero-blog-index',
				'acf/hero-home',
				'acf/hero-minimal',
				'acf/hero-what-we-do',
				'acf/home-favorite-works',
				'acf/home-featured-work',
				'acf/image-with-text',
				'acf/industry-index',
				'acf/industry-index-show-all',
				'acf/industry-work-example',
				'acf/job-requirements-proficiencies',
				'acf/job-submission',
				'acf/learn-more-row',
				'acf/menu-row',
				'acf/numbers-feature',
				'acf/post-featured-image-links',
				'acf/process-stages',
				'acf/row-with-image',
				'acf/row-with-video',
				'acf/show-staff',
				'acf/show-jobs',
				'acf/show-newsletter-popup',
				'acf/three-columns',
				'acf/three-columns-text',
				'acf/two-columns-links',
				'acf/work-index',
				'acf/work-index-show-all',
				'acf/work-featured-image-links',
				'core/html',
				'core/columns',
				'core/group'
			);
			break;
	}
	
	return $allowed_blocks;
	
}
add_filter( 'allowed_block_types', 'bc_allowed_block_types' );

// Hero Theme Select
function acf_load_hero_theme_select ($field) {
	$field['choices'] = array(
		'aero-blue' 		=> '<img src="' . get_stylesheet_directory_uri() . '/images/hero-radio-aero-blue.png"><p>Aero Blue</p>',
		'apple-green' 		=> '<img src="' . get_stylesheet_directory_uri() . '/images/hero-radio-apple-green.png"><p>Apple Green</p>',
		'aquamarine' 		=> '<img src="' . get_stylesheet_directory_uri() . '/images/hero-radio-aquamarine.png"><p>Aquamarine</p>',
		'bangladesh-green' 	=> '<img src="' . get_stylesheet_directory_uri() . '/images/hero-radio-bangladesh-green.png"><p>Bangladesh Green</p>',
		'highlighter' 		=> '<img src="' . get_stylesheet_directory_uri() . '/images/hero-radio-highlighter.png"><p>Highlighter</p>',
		'jet' 				=> '<img src="' . get_stylesheet_directory_uri() . '/images/hero-radio-jet.png"><p>Jet</p>',
		'light-grey' 		=> '<img src="' . get_stylesheet_directory_uri() . '/images/hero-radio-light-grey.png"><p>Light Grey</p>',
		'magic-mint' 		=> '<img src="' . get_stylesheet_directory_uri() . '/images/hero-radio-magic-mint.png"><p>Magic Mint</p>',
		'tiffany-blue' 		=> '<img src="' . get_stylesheet_directory_uri() . '/images/hero-radio-tiffany-blue.png"><p>Tiffany Blue</p>'
	);
	return $field;
}
add_filter('acf/load_field/name=hero_theme_select', 'acf_load_hero_theme_select');

// Hero Gradient Select
function acf_load_hero_gradient_select ($field) {
	$field['choices'] = array(		
		'gradient-1' => '<img src="https://dev-buildcreate-new.pantheonsite.io/wp-content/themes/buildcreate/images/gradient-1.png">',
		'gradient-2' => '<img src="https://dev-buildcreate-new.pantheonsite.io/wp-content/themes/buildcreate/images/gradient-2.png">',
		'gradient-3' => '<img src="https://dev-buildcreate-new.pantheonsite.io/wp-content/themes/buildcreate/images/gradient-3.png">',
		'gradient-4' => '<img src="https://dev-buildcreate-new.pantheonsite.io/wp-content/themes/buildcreate/images/gradient-4.png">',
		'gradient-5' => '<img src="https://dev-buildcreate-new.pantheonsite.io/wp-content/themes/buildcreate/images/gradient-5.png">',
		'gradient-6' => '<img src="https://dev-buildcreate-new.pantheonsite.io/wp-content/themes/buildcreate/images/gradient-6.png">',
		'gradient-7' => '<img src="https://dev-buildcreate-new.pantheonsite.io/wp-content/themes/buildcreate/images/gradient-7.png">',
		'gradient-8' => '<img src="https://dev-buildcreate-new.pantheonsite.io/wp-content/themes/buildcreate/images/gradient-8.png">',
		'gradient-9' => '<img src="https://dev-buildcreate-new.pantheonsite.io/wp-content/themes/buildcreate/images/gradient-9.png">',
		'gradient-10' => '<img src="https://dev-buildcreate-new.pantheonsite.io/wp-content/themes/buildcreate/images/gradient-10.png">'
	);
	return $field;
}
add_filter('acf/load_field/name=hero_gradient_select', 'acf_load_hero_gradient_select');

// ACF Custom Styles for Hero Theme
add_action('admin_head', 'acf_custom_styles');
function acf_custom_styles() {
	echo '<style>
		.acf-hero-theme label input { 
			display: none;
		}
		.acf-hero-theme label p {
			margin: 0;
			padding: 0 0px 25px 0px;
			font-weight: 500;
			text-align: center;
		}
		.acf-hero-theme label img {
			border: solid 6px #ddd;
			max-width: 90%;
		}
		.acf-hero-theme label.selected img {
			border: solid 6px blue;
		}
		.acf-hero-theme li {
			display: inline-block;
			list-style: none;
			max-width: 25%;
		}
		.radio_button_backgrounds i,
		[data-name=radio_button_backgrounds] i {
			font-size: 24px;
			border: 1px solid #ddd;
			margin: 0 10px 10px 0;
		}
		.radio_button_backgrounds .blue-stone,
		[data-name=radio_button_backgrounds] .blue-stone {
			color: #015D53;
		}
		.radio_button_backgrounds .caribbean-green,
		[data-name=radio_button_backgrounds] .caribbean-green {
			color: #07BAA6;
		}
		.radio_button_backgrounds .gondola,
		[data-name=radio_button_backgrounds] .gondola {
			color: #343434;
		}
		.radio_button_backgrounds .fern,
		[data-name=radio_button_backgrounds] .fern {
			color: #57B750;
		}
		.radio_button_backgrounds .mint,
		[data-name=radio_button_backgrounds] .mint {
			color: #91F4CE;
		}
		.radio_button_backgrounds .pale-green,
		[data-name=radio_button_backgrounds] .pale-green {
			color: #B4FAC4;
		}
		.radio_button_backgrounds .iris,
		[data-name=radio_button_backgrounds] .iris {
			color: #CAEDE8;
		}
		.radio_button_backgrounds .mindaro,
		[data-name=radio_button_backgrounds] .mindaro {
			color: #D1EA6A;
		}
		.radio_button_backgrounds .catskill,
		[data-name=radio_button_backgrounds] .catskill {
			color: #EFF7F6;
		}
		.radio_button_backgrounds .white,
		[data-name=radio_button_backgrounds] .white {
			color: #FFFFFF;
		}
		[data-name="hero_gradient_select"] ul {
			display: grid;
			grid-template-columns:  1fr 1fr 1fr;
			gap: 15px;
		}
		[data-name="hero_gradient_select"] li img {
			width: 75px;
			height: auto;
		}
	</style>';
}

?>