<?php

function TAtheme_filter_wp_title($currenttitle, $sep, $seplocal) {
	$site_name = get_bloginfo('name');
	$full_title = $site_name . $currenttitle;
	if (is_front_page() || is_home()){
		$site_desc=get_bloginfo('description');
		$full_title .= ' ' . $sep . ' ' . $site_desc;
	}
	return $full_title;
}
add_filter('wp_title','TAtheme_filter_wp_title',10,3);

register_nav_menus (
	array(
	'main-nav-header-top' => 'Main Nav, Top of Header',
	'sub_nav-header-bottom' => 'Sub Nav, Bottom of Header',
	'footer-nav' => 'Footer Menu'
	)
);

$defaults = array(
	'theme_location' => 'menu',
	'menu' => '',
	'container' => 'div',
	'container_class' => 'menu-{menu slug}-container',
	'container_id' => '',
	'menu_class' => 'menu',
	'menu_id' => '',
	'echo' => true,
	'fallback_cb' => 'wp_page_menu',
	'before' => '',
	'after' => '',
	'link_before' => '',
	'link_after' => '',
	'items_wrap' => '<ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>',
	'depth' => 0,
	'walker' => ''
);

add_theme_support('post-thumbnails');

$args = array(
	'name' => '',
	'id' => '',
	'description' => '',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => ''
);
register_sidebar($args);

//$TAtheme_header_sidebar = array(
//	'name' => 'Header',
//	'id' => 'header',
//	'description' => 'Widgets placed here will display in the header to the right of the logo',
//	'before_widget' => '',
//	'after_widget' => '',
//	'before_title' => '<h2>',
//	'after_title' => '</h2>'
//);
//register_sidebar($TAtheme_header_sidebar);

$TAtheme_aside_sidebar = array(
	'name' => 'Aside',
	'id' => 'aside',
	'description' => 'Widgets placed here will go in the Right hand sidebar',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div><!-- class: widget -->',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
);
register_sidebar($TAtheme_aside_sidebar);

//$TAtheme_upperfooter_sidebar = array(
//	'name' => 'Upper Footer',
//	'id' => 'upper-footer',
//	'description' => 'Widgets placed here will go in the upper footer area. You can put the nav menu in this area.',
//	'before_widget' => '<div class="upperfooter">',
//	'after_widget' => '</div><!-- class: widget -->',
//	'before_title' => '<h3 class="widgettitle">',
//	'after_title' => '</h3>'
//);
//register_sidebar($TAtheme_upperfooter_sidebar);

$TAtheme_footer_lt_sidebar = array(
	'name' => 'Left Footer',
	'id' => 'left-footer',
	'description' => 'Widgets placed here will go in the left column of the footer',
	'before_widget' => '<div class="ltfooter">',
	'after_widget' => '</div><!-- class: ltfooter -->',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
);
register_sidebar($TAtheme_footer_lt_sidebar);

$TAtheme_footer_rt_sidebar = array(
	'name' => 'Right Footer',
	'id' => 'right-footer',
	'description' => 'Widgets placed here will go in the right column of the footer',
	'before_widget' => '<div class="rtfooter">',
	'after_widget' => '</div><!-- class: rtfooter -->',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
);
register_sidebar($TAtheme_footer_rt_sidebar);

//comments
function displaycomments($comment, $args, $depth){
$GLOBALS['comment'] = $comment;
?>
<li class="comment-list-box">
<div class="comment-author">
<?php echo get_avatar( $comment, 40 ); ?>
</div>
<div class="comment-fn">
<?php printf(__('<span class="fn">%s</span>'), get_comment_author_link()) ?>
</div>
<div class="comment-meta">
<?php printf(__('%1$s @ %2$s'), get_comment_date(), get_comment_time()) ?> <?php edit_comment_link() ?>
</div>
<?php if ($comment->comment_approved == '0') : ?>
<em class="comment-approved">你的迴響正在審核中。</em>
<?php endif;?>
<?php comment_text() ?>
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
<?php }

add_theme_support('post-thumbnails');
add_image_size ('homepage-thumb',200,180,true);
add_image_size ('slider',530,215,true);
add_image_size ('post-thumb',260,175,true);
add_image_size ('sm-post-thumb',65,50,true);
add_image_size ('sq-post-thumb',100,100,true);
add_image_size ('page-featured-image',725,95,true);
add_image_size ('fullwidth-featured-image',820,95,true);

$args = array(
	'flex-width'    => true,
	'width'         => 970,
	'flex-width'    => true,
	'height'        => 240,
	'default-image' => get_template_directory_uri() . '/images/header.png',
	'default-text-color'     => '',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

$args = array(
	'default-color' => '000000',
	'default-image' => get_template_directory_uri() . '/images/background.jpg',
);
add_theme_support( 'custom-background', $args );
global $wp_version;
if ( version_compare( $wp_version, '3.4', '>=' ) ) :
	add_theme_support( 'custom-background' ); 
else :
	add_custom_background( $args );
endif;

//paginate
function TAtheme_paginate(){
	global $paged, $wp_query;
	$abignum = 999999999; //we need an unlikely integer
	$args = array(
		'base' => str_replace($abignum,'%#%',esc_url(get_pagenum_link($abignum))),
		'format' => 'paged=%#%',
		'current' => max(1,get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'show_all' => false,
		'end_size' => 2,
		'mid_size' => 2,
		'prev_next' => true,
		'prev_text' => __('&lt;'),
		'next_text' => __('&gt;'),
		'type' => 'list'
	);
	echo paginate_links($args);
}

add_filter('widget_text','do_shorcode');

?>