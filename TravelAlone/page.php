<?php get_header(); ?>

<!-- nav -->
<?php
	$main_menu_header_top = array(
		'theme_location' => 'main-nav-header-top',
		'container' => 'nav',
		'container_class' => 'alignleft widecol clearfix',
		'container_id' => 'header-main-nav',
		'depth' => 1
	);
?>
<?php wp_nav_menu($main_menu_header_top); ?>
<!-- /nav -->

<br />
<div id="mainbox">

<!-- main content -->
<div id="contentbox">
<section>
<!-- Breadcrumb NavXT --><nav class="breadcrumb"><p><?php if(function_exists('bcn_display')) {bcn_display();} ?></p></nav><br />
<!-- titlepic --><?php the_post_thumbnail('sq-post-thumb'); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<!-- title --><h3><?php the_title(); ?></h3>
<!-- excerpt --><?php if(get_the_excerpt()) {?><p class="tagline"><?php echo get_the_excerpt(); ?></p><?php } ?><br />
<!-- content --><?php the_content(); ?>
<?php endwhile; else: ?>
<h3><?php _e('The Page you are looking for could not be found.'); ?></h3>
<?php endif; ?>

</section>
</div>
<!-- /main content -->

<!-- aside -->
<div id="sidebarbox">
<?php get_sidebar(); ?>
</div>
<!-- /aside -->

</div>
<div class="space"></div>
<!-- footer -->
<div id="dwfooter" class="clearfix">
<?php get_sidebar('lt-footer'); ?>
<?php get_sidebar('rt-footer'); ?>
</div>
<br />
<?php get_footer(); ?>
<!-- /footer -->