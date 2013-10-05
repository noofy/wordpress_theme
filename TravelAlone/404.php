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
<!-- search form --><?php get_search_form(); ?><Br /><Br />
<!-- content --><h1 class="error">Whoops, 404!</h1><br />
<h2 class="tagline">很抱歉，您要找的網頁並不存在。請使用以上的搜尋功能再試一次吧！</h2>

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