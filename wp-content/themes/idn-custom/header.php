<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width;minimum-scale=1">
	<script src="<?php echo get_template_directory_uri()."/owl/jquery.js" ?>"></script>
	<script src="<?php echo get_template_directory_uri()."/owl/owl.carousel.min.js" ?>"></script>
	<title>
		<?php if(is_single() || is_page()) :  ?>
		<?php the_title(); ?> | 
		<?php elseif(is_category()) :  ?>
			<?php single_cat_title(); ?> | 
			<?php elseif(is_tag()) :  ?>
				<?php single_tag_title(); ?> | 
				<?php elseif(is_author()) :  ?>
					<?php the_author(); ?> | 
					<?php elseif(is_home() || is_front_page()) :  ?>
					Home | 
				<?php endif; ?>
				<?php bloginfo('name'); ?>
			</title>
			<?php wp_head(); ?>
		</head>
		<body>

			<div class="navbar">
				<div class="logo">
					<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
					$url = get_bloginfo('url');
					echo '<a href="'.$url.'"><img src="' . esc_url( $custom_logo_url ) . '" alt=""></a>';
					?>
				</div>
				<div class="hash"></div>
				<div class="idn-menu">
					<?php 
					wp_nav_menu(['theme_location'=>'Primary']);
					?>
				</div>
				<div class="addon">
					<a href="" class="dashicons-before dashicons-search"></a>
					<a href="" class="dashicons-before dashicons-edit"></a>
					<a href="" class="dashicons-before dashicons-admin-users"></a>
				</div>
			</div>

			<div class="hot">
				<div class="ttl">What's Hot</div>
				<div class="run">
					<?php if(function_exists('ditty_news_ticker')){ditty_news_ticker(119);} ?>
				</div>
			</div>