<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,viewport-fit=cover">
		<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/f65557eadf.js" crossorigin="anonymous"></script>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="site-wrap">
		<main id="main" role="main">
			<div class="clearfix"></div>
				
				<nav>
	
					<div class="menu-desktop">
						
						<div class="menu-desktop-container">
							
							<a href="<?php echo site_url(); ?>">
								<div class="logo">
									<img src="<?php echo get_field('menu_desktop_logo_green','options'); ?>">
									<div class="logo-name">build create</div>
								</div>
							</a>
										
							<?php 
								if( have_rows('menu_desktop_menu','options') ):
									echo '<div class="top-links">';
										while( have_rows('menu_desktop_menu','options') ): the_row();
											
											$top_link = get_sub_field('link');
											$megamenu = get_sub_field('megamenu');
											$mm	      = 0;
											if( $top_link ): 
												$top_link_url 		= $top_link['url'];
												$top_link_title 	= $top_link['title'];
												$top_link_target 	= $top_link['target'] ? $link['target'] : '_self';
												$top_link_megamenu 	= 'megamenu-not-active';
												if ($megamenu) :
													$mm++;
													$top_link_megamenu = 'megamenu-active megamenu-active-' . $mm;
												endif; 
											endif;
								
											if (!$megamenu) :
								
												echo '<div class="top-link">';
													echo '<a href=" '. esc_url( $top_link_url ) .'" target="' . esc_attr($top_link_target) . '" class="' . $top_link_megamenu . '">' .  $top_link_title . '</a>';
												echo '</div>';
											
											else :
													
												echo '<div class="top-link megamenu-link">';
													echo '<a href=" '. esc_url( $top_link_url ) .'" target="' . esc_attr($top_link_target) . '" class="' . $top_link_megamenu . '">' .  $top_link_title . '</a>';
												echo '</div>';
												
												echo '<div id="megamenu-' . $mm . '" class="megamenu" style="display:none;">';
													echo '<div class="description">';
														echo '<div class="headline">' . strip_tags(get_sub_field('mega_menu_headline')) . '</div>';
														echo '<div class="text">' . get_sub_field('mega_menu_text') . '</div>';
													echo '</div>';
													if( have_rows('megamenu_items') ):
														$mmm=0;
														echo '<div class="megamenu-items">';
															while( have_rows('megamenu_items') ): the_row();
																$mmm++;
																$megamenu_link 					 = get_sub_field('link');
																$megamenu_icon 					 = get_sub_field('icon');
																$megamenu_icon_hover			 = get_sub_field('icon_hover');
																$megamenu_background_color 		 = get_sub_field('background_color');
																$megamenu_background_color_hover = get_sub_field('background_color_hover');
																if( $megamenu_link ): 
																	$megamenu_link_url 		= $megamenu_link['url'];
																	$megamenu_link_title 	= $megamenu_link['title'];
																	$megamenu_link_target 	= $megamenu_link['target'] ? $link['target'] : '_self';
																endif;
																echo '<div id="megamenu-item-' . $mmm . '" class="megamenu-item" style="background-color:' . $megamenu_background_color . ';">';
																	echo '<a href=" '. esc_url( $megamenu_link_url ) .'" target="' . esc_attr($megamenu_link_target) . '">';
																		echo '<div class="icon">';
																			echo '<img class="megamenu-icon-' . $mmm . '" src="' . $megamenu_icon . '">';
																			echo '<div class="item-title">' . $megamenu_link_title . '</div>';
																		echo '</div>';
																	echo '</a>';
																echo '</div>';
																
																echo '<script>';
																	echo '$(document).ready(function(){';
																		echo '$("#megamenu-item-' . $mmm . '").hover(function(){';
																			echo '$(this).css("background", "' . $megamenu_background_color_hover .'");';
																			echo '$(".megamenu-icon-' . $mmm . '").attr("src","' . $megamenu_icon_hover . '");';
																			echo '$("#megamenu-item-' . $mmm . ' a .icon .item-title").css("color","#FFFFFF");';
																		echo '},';
																		echo 'function(){';
																			echo '$(this).css("background", "' . $megamenu_background_color .'");';
																			echo '$(".megamenu-icon-' . $mmm . '").attr("src","' . $megamenu_icon . '");';
																			echo '$("#megamenu-item-' . $mmm . ' a .icon .item-title").css("color","#343434");';
																		echo '});';
																	echo '});';
																echo '</script>';
																
															endwhile;
														echo '</div>';
													endif;
												echo '</div>';
											endif;
											
											echo '<script>';
												echo '$(document).ready(function(){';
													echo '$(".megamenu-active-' . $mm . '").click(function() {';
														echo '$("#megamenu-' . $mm . '").toggle();';
														echo '$(".megamenu-active-' . $mm . '").css("background-color","#FFFFFF");';
													echo '});';
													echo '$(".megamenu-active-' . $mm . '").mouseenter(function() {';
														echo '$("#megamenu-' . $mm . '").toggle();';
														echo '$(".megamenu-active-' . $mm . '").css("background-color","#FFFFFF");';
													echo '});';
													echo '$("#megamenu-' . $mm . '").mouseleave(function(){';
														echo '$("#megamenu-' . $mm . '").toggle();';
														echo '$(".megamenu-active-' . $mm . '").css("background-color","transparent");';
													echo '});';
												echo '});';
											echo '</script>';
																		
										endwhile;
									
									echo '</div>';
								endif;
							?>
						
						</div>
					</div>
					
					<div class="menu-mobile">
					
						<div class="top-level">
						
							<a href="<?php echo site_url(); ?>">
								<div class="logo">
										<img src="<?php echo get_field('menu_mobile_logo_green','options'); ?>">
										<div class="logo-name">build create</div>
								</div>
							</a>
							<div class="open"><i class="fa-solid fa-bars"></i></div>
							<script>
								jQuery(document).ready(function($){
									$(".menu-mobile .open").click(function(){
										$(".menu-mobile .top-level").hide();
										$(".menu-mobile .menu-container").show();
									});
								});
							</script>							
						</div>
						
						<div class="menu-container" style="display:none;">
						
							<div class="top-row">
								<div class="close"><i class="fa-thin fa-xmark"></i></div>
								<div class="column">
									<a href="<?php echo site_url(); ?>"><img src="<?php echo get_field('menu_mobile_logo','options'); ?>"></a>
								</div>
								<script>
									jQuery(document).ready(function($){
										$(".menu-mobile .menu-container .top-row .close").click(function(){
											$(".menu-mobile .top-level").show();
											$(".menu-mobile .menu-container").hide();
										});
									});
								</script>
														
								<?php
									if( have_rows('menu_mobile_top_menu','options') ):
										while( have_rows('menu_mobile_top_menu','options') ): the_row();
											if( have_rows('mobile_menu_top_rows') ):
												while( have_rows('mobile_menu_top_rows') ): the_row();	
													$col_count = count(get_sub_field('columns'));
													if( have_rows('columns') ):
														if ($col_count == 1) :
															echo '<div class="column">';
														else :
															echo '<div class="columns">';
														endif;	
															while( have_rows('columns') ): the_row();	
																$icon = get_sub_field('icon');
																$link = get_sub_field('link');
																if( $link ): 
																	$link_url 		= $link['url'];
																	$link_title 	= $link['title'];
																	$link_target 	= $link['target'] ? $link['target'] : '_self';;
																endif;
																echo '<div class="top-row-item">';
																	if ($icon) :
																		echo '<img src="' . $icon . '">';
																	endif;
																	echo '<a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' . esc_html($link_title) . '</a>';
																echo '</div>';
															endwhile;
														echo '</div>';
													endif;
												endwhile;
											endif;
										endwhile;
									endif;
								?>
							</div>
							
							<div class="bottom-row">
								
								<?php
									if( have_rows('menu_mobile_bottom_menu','options') ):
										while( have_rows('menu_mobile_bottom_menu','options') ): the_row();
											if( have_rows('mobile_menu_bottom_rows') ):
												while( have_rows('mobile_menu_bottom_rows') ): the_row();	
													echo '<div class="column">';
														$icon = get_sub_field('icon');
														$link = get_sub_field('link');
														if( $link ): 
															$link_url 		= $link['url'];
															$link_title 	= $link['title'];
															$link_target 	= $link['target'] ? $link['target'] : '_self';;
														endif;												
														echo '<a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">';
															echo '<div class="bottom-row-item">';
																echo '<div class="left">';
																	echo '<img src="' . $icon . '">';
																 	echo $link_title;
																echo '</div>';
																echo '<div class="right">';
																	echo '<i class="fa-light fa-arrow-right-long"></i>';
																echo '</div>';
															echo '</div>';
														echo '</a>';
													echo '</div>';
												endwhile;
											endif;
										endwhile;
									endif;										
								?>
							
						</div>
					</div>
			
				</nav>
				