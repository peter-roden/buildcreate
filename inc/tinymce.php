<?php

// TINYMCE Options
function tinymce_fonts_before_init($settings){
	$font_formats = "Gotham=Gotham Book";
	$settings['font_formats'] = ' ' . $font_formats;
	$settings['wordpress_adv_hidden'] = false;	
	return $settings;
}
add_filter('tiny_mce_before_init', 'tinymce_fonts_before_init');

// function tinymce_colors_before_init($settings){
// 	$default_colours = '"015D53","blue-stone", 
// 						"07BAA6","caribbean-green", 
// 						"33FAAE","spring-green", 
// 						"343434","gondola", 
// 						"3FFAE5","baby-blue", 
// 						"435A55","plantation", 
// 						"57B750","fern", 
// 						"68D671","pastel-green", 
// 						"6DBA85","silver-tree", 
// 						"8FA59A","cascade", 
// 						"91F4CE","mint", 
// 						"9FFDD2","aquamarine", 
// 						"B4FAC4","pale-green", 
// 						"CAEDE8","iris", 
// 						"D1EA6A","mindaro", 
// 						"DFEBE8","tranquil", 
// 						"E6F2EC","bubbles", 
// 						"EFF7F6", "catskill",
// 						"FFFFFF", "white"';
// 	$settings['textcolor_map'] = '['.$default_colours.']';
// 	return $settings;
// }
// add_filter('tiny_mce_before_init', 'tinymce_colors_before_init');

// function tinymce_add_buttons_fontselect($buttons){
// 	array_unshift($buttons, 'fontselect');
// 	return $buttons;
// }
// add_filter('mce_buttons', 'tinymce_add_buttons_fontselect');
// 
// function tinymce_add_buttons_fontsizeselect( $buttons ) {
// 	array_shift( $buttons );
// 	array_unshift( $buttons, 'fontsizeselect');
// 	return $buttons;
// }
// add_filter('mce_buttons_2', 'tinymce_add_buttons_fontsizeselect');

function wp_mce_text_sizes( $initArray ){
	// $initArray['theme_advanced_font_sizes'] = "9px 10px 12px 13px 14px 16px 18px 20px 24px 28px 30px 32px 36px 40px 44px 48px 50px";
	// $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 20px 24px 28px 30px 32px 36px 40px 44px 48px 50px";
	$initArray['theme_advanced_font_sizes'] = "16px";
	$initArray['fontsize_formats'] = "16px";
	return $initArray;
}
add_filter( 'tiny_mce_before_init', 'wp_mce_text_sizes' );
function tinmyce_editor_styles() {
	add_editor_style( 'tinymce.css' );
}
add_action( 'after_setup_theme', 'tinmyce_editor_styles' );

?>