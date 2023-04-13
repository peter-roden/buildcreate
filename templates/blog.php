<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>

<?php
$blocks = parse_blocks( get_the_content() );
foreach ($blocks as $block) :
	if ($block['blockName'] == 'acf/hero-blog-index') :
		$hero_block_index .= render_block($block);
	endif;
	if ($block['blockName'] == 'acf/download-file') :
		$download_file .= render_block($block);
	endif;
	if ($block['blockName'] == 'acf/row-with-image') :
		$row_with_image .= render_block($block);
	endif;
endforeach;
echo $hero_block_index;	
echo $download_file;	
echo $row_with_image;	
?>
	
<?php get_footer(); ?>