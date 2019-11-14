<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="title" content="Jasper Kean - Portolio">
	<meta name="description" content="Jasper Kean, a WordPress, HTML5 and HTML Email Developer">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://jasperkean.co.uk">
	<meta property="og:title" content="Jasper Kean - Portolio">
	<meta property="og:description" content="Jasper Kean, a WordPress, HTML5 and HTML Email Developer">
	<meta property="og:image"
		content="https://jasperkean.co.uk/wp-content/uploads/2019/11/meta-img.jpg">

	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://jasperkean.co.uk">
	<meta property="twitter:title" content="Jasper Kean - Portolio">
	<meta property="twitter:description" content="Jasper Kean, a WordPress, HTML5 and HTML Email Developer">
	<meta property="twitter:image"
		content="https://jasperkean.co.uk/wp-content/uploads/2019/11/meta-img.jpg">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

	<header class="site-header">

		<div class="container">

			<?php $logo = get_field('logo', 'options'); ?>

			<a href="<?php bloginfo('url'); ?>" class="logo">Jasper Kean</a>

			<?php 
				$link = get_field('button', 'options');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
			<a class="button" href="<?php echo esc_url( $link_url ); ?>"
				target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			<?php endif; ?>

		</div>

	</header>