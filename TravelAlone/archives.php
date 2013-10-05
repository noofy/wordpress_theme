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

<?php
	if(is_day())
		_e('You are viewing the ' . get_the_date() . ' daily archives');
	elseif(is_month())
		_e('You are viewing the ' . get_the_date('F Y') . ' monthly archives');
	elseif(is_year())
		_e('You are viewing the ' . get_the_date('Y') . ' yearly archives');
	elseif(is_author())
		_e('You are viewing author archives');
	else
		_e('You are viewing the "' . single_cat_title('',false) . '" Archives');
?><br />
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article class="maincontent">
<?php the_post_thumbnail('homepage-thumb'); ?>
<h3><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<p><span class="small">Posted <time datetime="<?php the_time('y-m-d'); ?>" pubdate="pubdate"><?php the_time('M n'); ?></time> &#149 <?php comments_number('0 comments','only 1 comment','% comments'); ?></span></p>
</article>
<?php endwhile; else: ?>
<h3><?php _e('The archives you are looking for could not be found.'); ?></h3>
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