<footer>

	<div class="footer-container">

		<div class="left">
			<a class="logo" href="<?php echo site_url(); ?>"><img src="<?php echo get_field('footer_logo','options'); ?>"></a>
			<div class="tagline"><?php echo get_field('footer_tagline','options'); ?></div>
			<div class="established"><?php echo get_field('footer_established','options'); ?></div>
			<?php
				if( have_rows('footer_contact','options') ):
					echo '<div class="footer-contact">';
						while( have_rows('footer_contact','options') ): the_row();
							$link_or_text = get_sub_field('link_or_text');
							if ($link_or_text == 'link') :
								$link = get_sub_field('link');
								if( $link ): 
									$link_url 		= $link['url'];
									$link_title 	= $link['title'];
									$link_target 	= $link['target'] ? $link['target'] : '_self';
								endif;
								echo '<div class="contact-item"><a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' . $link_title  . '</a></div>';
							elseif ($link_or_text == 'text') :
								echo '<div class="contact-item">' . get_sub_field('text') . '</div>';
							endif;
						endwhile;
					echo '</div>';
				endif;
				if( have_rows('footer_social','options') ):
					echo '<div class="social">';
						while( have_rows('footer_social','options') ): the_row();
							$link = get_sub_field('link');
							if( $link ): 
								$link_url 		= $link['url'];
								$link_title 	= $link['title'];
								$link_target 	= $link['target'] ? $link['target'] : '_self';
							endif;
							echo '<a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' . get_sub_field('icon') . '</a>';
						endwhile;
					echo '</div>';
				endif;
			?>
		</div>
		<div class="right">
			<div class="intro"><?php echo strip_tags(get_field('footer_intro','options')); ?></div>
			<div class="subscribe">
				<?php
					$shortcode = get_field('footer_subscribe_form','options');
					echo do_shortcode($shortcode);
					
					echo '<style>';
						echo '#gform_submit_button_1 {';
							echo 'display: block;';
							echo 'background: url("' . get_template_directory_uri() . '/images/paper-plane-white.png' . '") no-repeat transparent;';
							echo 'background-position: 22% 60%';
						echo '}';
						echo '#gform_submit_button_1:hover {';
							echo 'display: block;';
							echo 'background: url("' . get_template_directory_uri() . '/images/paper-plane-green.png' . '") no-repeat transparent;';
							echo 'background-position: 22% 60%';
						echo '}';
					echo '</style>';
					
				?>

			</div>
			<div class="link-groups">
				<?php
					if( have_rows('footer_primary_links','options') ):
						echo '<div class="link-group primary">';
							while( have_rows('footer_primary_links','options') ): the_row();
								$link = get_sub_field('link');
								if( $link ): 
									$link_url 		= $link['url'];
									$link_title 	= $link['title'];
									$link_target 	= $link['target'] ? $link['target'] : '_self';
								endif;
								echo '<a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '</a>';	
							endwhile;
						echo '</div>';
					endif;
					if( have_rows('footer_secondary_links','options') ):
						while( have_rows('footer_secondary_links','options') ): the_row();
							echo '<div class="link-group secondary">';
								echo '<div class="title">' . get_sub_field('title') . '</div>';
								if( have_rows('links') ):
									while( have_rows('links') ): the_row();
										$link = get_sub_field('link');
										if( $link ): 
											$link_url 		= $link['url'];
											$link_title 	= $link['title'];
											$link_target 	= $link['target'] ? $link['target'] : '_self';
										endif;
										echo '<a href=" '. esc_url( $link_url ) .'" target="' . esc_attr($link_target) . '">' .  $link_title . '</a>';
									endwhile;
								endif;
							echo '</div>';
						endwhile;
					endif;
				?>
			</div>
		</div>
		
	</div>
	<div class="footer-container">
		<div class="left">&nbsp;</div>
		<div class="right">
			<div class="copyright">Copyright <?php echo date("Y"); ?> build/create</div>
		</div>
	</div>

</footer>
<?php wp_footer(); ?>
</div>
</div>
</body>
</html>