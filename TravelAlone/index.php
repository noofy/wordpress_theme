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
<!--<h3>?php echo get_the_category_by_id(get_option('default_category')); ?</h3><br />-->
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article class="maincontent">
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('homepage-thumb'); ?></a>
<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<p><span class="small">Posted <time datetime="<?php the_time('y-m-d'); ?>" pubdate="pubdate"><?php the_time('Y-m-d'); ?></time> &#149 <?php comments_number('0 comments','only 1 comment','% comments'); ?></span></p>
</article>
<?php endwhile; else: ?>
<h3><?php _e('Sorry, no posts matched your criteria.'); ?></h3>
<?php endif; ?>
<!-- paginate --><div class="paginate"><br /><br /><?php TAtheme_paginate(); ?></div>

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