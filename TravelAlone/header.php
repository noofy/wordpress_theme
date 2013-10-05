<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title(' | '); ?></title>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset');?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<script src="<?php echo get_template_directory_uri(); ?>/scripts/function.js" type="text/javascript"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class('container'); ?>>
<div id="TA_allbox">
<header class="headerbox">
<div class="imgheader"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>"></div>
<div class="title">
<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php echo bloginfo('title'); ?></a></h1>
<span class="subtitle"><?php echo bloginfo('description'); ?></span>
</div>
</header>
