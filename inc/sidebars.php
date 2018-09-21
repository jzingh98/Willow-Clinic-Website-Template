<?php
add_action( 'widgets_init', 'gtl_components_widget_init' );
function gtl_components_widget_init() { 

    register_sidebar( array(
    'name' => __( 'Blog Sidebar', 'gtl-components' ),
    'id' => 'gtl-blog-sidebar',
    'description' => __( 'Widgets for blog', 'gtl-components' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) ) ;

    register_sidebar( array(
    'name' => __( 'Shop Sidebar', 'gtl-components' ),
    'id' => 'gtl-shop-sidebar',
    'description' => __( 'Widgets for shop', 'gtl-components' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ));

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 1', 'gtl-multipurpose' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'gtl-multipurpose' ),
        'before_widget' => '<div id="%1$s" class="thumb-posts flex-box %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
    'name' => __( 'Sidebar 2', 'gtl-components' ),
    'id' => 'gtl-sidebar-2',
    'description' => __( 'Add widgets here', 'gtl-components' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));

     register_sidebar( array(
    'name' => __( 'Sidebar 3', 'gtl-components' ),
    'id' => 'gtl-sidebar-3',
    'description' => __( 'Add widgets here', 'gtl-components' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));

      register_sidebar( array(
    'name' => __( 'Sidebar 4', 'gtl-components' ),
    'id' => 'gtl-sidebar-4',
    'description' => __( 'Add widgets here', 'gtl-components' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));

      register_sidebar( array(
    'name' => __( 'Sidebar 5', 'gtl-components' ),
    'id' => 'gtl-sidebar-5',
    'description' => __( 'Add widgets here', 'gtl-components' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));
}