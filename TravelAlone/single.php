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
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<!-- titlepic --><?php the_post_thumbnail('page-featured-image'); ?>
<!-- title --><h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<!-- info --><p><span class="small">Posted <time datetime="<?php the_time('Y-m-d'); ?>" pubdate="pubdate"><?php the_time('M n'); ?></time> &#149 <a href="#comments"></a><?php comments_number('0 comments','only 1 comment','% comments'); ?></a></span></p><br />
<!-- content --><div class="contentstyle"><?php the_content(); ?></div><br />
<!-- category --><p><span class="small">分類：<?php the_category(', '); ?></span></p>
<!-- tag list --><p><span class="small"><?php if(get_the_tags()) {the_tags();} ?></span></p>
<!-- author --><p><span class="small">作者：<?php the_author_posts_link(); ?></span></p><br />
<!-- edit --><?php edit_post_link('編輯文章','<p>','</p><br>'); ?>
<!-- page --><span class="postpage"><ul><?php previous_post_link('<li>%link</li>','&lt; Previous Post'); ?><?php next_post_link('<li>%link</li>','Next Post &gt;'); ?></ul></span><Br /><br />
<!-- comments --><?php comments_template(); ?>
<?php endwhile; else: ?>
<h3><?php _e('The post you are looking for could not be found.'); ?></h3>
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