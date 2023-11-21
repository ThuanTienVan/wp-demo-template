<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: https://ogp.me/ns#">
  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php if (is_front_page() || is_home()) : ?>
  <title><?php bloginfo('name'); ?></title>
  <?php else : ?>
  <title><?php wp_title('|', true, 'right'); bloginfo('name') ?></title>
  <?php endif; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="">
  <meta name="description" content="<?php echo $description ?>">
  <meta name="robots" content="index">

	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/ico_favicon.png">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico">

	<meta property="og:locale" content="<?php language_attributes(); ?>">
  <meta property="og:url" content="">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo $title ?>">
  <meta property="og:description" content="<?php echo $description ?>">
  <meta property="og:site_name" content="">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/ogimage.jpg">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo $title ?>">
  <meta name="twitter:description" content="<?php echo $description ?>">
  <meta name="twitter:image" content="">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
  <?php wp_head(); ?>
</head>
