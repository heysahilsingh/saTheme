<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Sa SEO START -->
    <title><?php saPageTitle() ?></title>
    <meta name="description" content="<?php saPageDescription() ?>">
    <meta property="og:site_name" content="<?php bloginfo('name') ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php saPageTitle() ?>">
    <meta property="og:description" content="<?php saPageDescription() ?>">
    <meta property="og:image" content="<?php saPageImgUrl() ?>">
    <meta property="og:url" content="<?php saPageUrl() ?>">
    <meta name="twitter:card" content="<?php saPageImgUrl() ?>">
    <meta name="twitter:image" content="<?php saPageImgUrl() ?>">
    <meta name="twitter:title" content="<?php saPageTitle() ?>">
    <meta name="twitter:description" content="<?php saPageDescription() ?>">
  <!-- Sa SEO END -->
    <meta name="theme-color" content="#000">
    <meta name="msapplication-TileColor" content="#000">
    <meta name="msapplication-navbutton-color" content="#000">
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Site Header Start -->
	<header class="sa-site-header sa-full-width">Header Data</header>	
<!-- Site Header End -->


