<?php
	$block_name = "contact";
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
		echo '<div class="wrapper">';

			echo '<div class="contact-wrapper">';
				
				echo '<div class="left content">';
					echo '<div class="headline">' . strip_tags(get_field ('contact_headline')) . '</div>';
					echo '<div class="text">' . get_field ('contact_text') . '</div>';
					echo '<div class="contact-desktop">';
						if( have_rows('contact_information') ):
							echo '<div class="information">';
								while( have_rows('contact_information') ) : the_row();
									if (get_sub_field('link_or_text') == 'link') :
										$link = get_sub_field('link');
										if( $link ): 
											$link_url 		= $link['url'];
											$link_title 	= $link['title'];;
											$link_target 	= $link['target'] ? $link['target'] : '_self';
										endif;
										echo '<div class="link"><a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '</a></div>';
									endif;
									if (get_sub_field('link_or_text') == 'text') :
										echo '<div class="text">' .  get_sub_field('text') . '</div>';
									endif;
								endwhile;
							echo '</div>';
						endif;
						if( have_rows('contact_social') ):
							$i=0;
							echo '<div class="social">';
								while( have_rows('contact_social') ) : the_row();
									$i++;
									if ($i == 1) :
										$class="first";
									else :
										$class="not-first";
									endif;
									$link = get_sub_field('link');
									if( $link ): 
										$link_url 		= $link['url'];
										$link_title 	= get_sub_field('icon');
										$link_target 	= $link['target'] ? $link['target'] : '_self';
									endif;
									echo '<div class="link ' . $class . '"><a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '</a></div>';
								endwhile;
							echo '</div>';
						endif;
					echo '</div>';
				echo '</div>';
				
				echo '<div class="right">';
					echo do_shortcode('[gravityform id="5" title="false" description="false" ajax="true"]');
					
					echo '<div class="contact-mobile">';
						if( have_rows('contact_information') ):
							echo '<div class="information">';
								while( have_rows('contact_information') ) : the_row();
									if (get_sub_field('link_or_text') == 'link') :
										$link = get_sub_field('link');
										if( $link ): 
											$link_url 		= $link['url'];
											$link_title 	= $link['title'];;
											$link_target 	= $link['target'] ? $link['target'] : '_self';
										endif;
										echo '<div class="link"><a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '</a></div>';
									endif;
									if (get_sub_field('link_or_text') == 'text') :
										echo '<div class="text">' .  get_sub_field('text') . '</div>';
									endif;
								endwhile;
							echo '</div>';
						endif;
						if( have_rows('contact_social') ):
							$i=0;
							echo '<div class="social">';
								while( have_rows('contact_social') ) : the_row();
									$i++;
									if ($i == 1) :
										$class="first";
									else :
										$class="not-first";
									endif;
									$link = get_sub_field('link');
									if( $link ): 
										$link_url 		= $link['url'];
										$link_title 	= get_sub_field('icon');
										$link_target 	= $link['target'] ? $link['target'] : '_self';
									endif;
									echo '<div class="link ' . $class . '"><a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '</a></div>';
								endwhile;
							echo '</div>';
						endif;
					echo '</div>';
					
				echo '</div>';
			
			echo '</div>';

		echo '</div>';		
	echo '</section>';
	
?>