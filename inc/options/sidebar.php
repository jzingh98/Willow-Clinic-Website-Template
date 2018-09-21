<?php 
 $wp_customize->add_panel( 'gtl_sidebar_panel', array(
        'priority'       => 11,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Sidebar Setting', 'gtl-multipurpose'),
    ) );

 /********************** post sidebar ********************************/

    //____Blog sidebar position ___//
    $wp_customize->add_section(
        'gtl_sidebar_panel',
        array(
            'title'         => __('Post sidebar', 'gtl-multipurpose'),
            'priority'      => 10,
            'panel'         => 'gtl_sidebar_panel', 
        )
    );

    //Archive page
    $wp_customize->add_setting(
        'post_arhive_sidebar_pos',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'post_arhive_sidebar_pos',
        array(
            'type'        => 'radio',
            'label'       => __('Post archive sidebar position', 'gtl-multipurpose'),
            'section'     => 'gtl_sidebar_panel',
            'description' => __('Select the sidebar position for post index/archive templates', 'gtl-multipurpose'),
            'choices' => array(
                'none'    => __('No sidebar', 'gtl-multipurpose'),
                'right'     => __('Right sidebar', 'gtl-multipurpose'),
                'left'=> __('Left sidebar', 'gtl-multipurpose')
            ),
        )
    );

    //Single post
    $wp_customize->add_setting(
        'post_single_sidebar_type',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'post_single_sidebar_type',
        array(
            'type'        => 'radio',
            'label'       => __('Post single sidebar position', 'gtl-multipurpose'),
            'section'     => 'gtl_sidebar_panel',
            'description' => __('Select the sidebar position for post single templates', 'gtl-multipurpose'),
            'choices' => array(
                'none'    => __('No sidebar', 'gtl-multipurpose'),
                'right'     => __('Right sidebar', 'gtl-multipurpose'),
                'left'=> __('Left sidebar', 'gtl-multipurpose')
            ),
        )
    );

    //___select sidebar ___//

    $wp_customize->add_setting(
        'post_sidebar_id',
        array(
            'default'           => 'gtl-blog-sidebar',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'post_sidebar_id',
        array(
            'type'        => 'radio',
            'label'       => __('Select sidebar', 'gtl-multipurpose'),
            'section'     => 'gtl_sidebar_panel',
            'description' => __('Select sidebar for post archive/single pages. Will ignored if No sidebar is checked above', 'gtl-multipurpose'),
            'choices' => gtl_multipurpose_sidebars(),
        )
    );


/********************** page sidebar ********************************/
//____Page sidebar position ___//
    $wp_customize->add_section(
        'gtl_page_sidebar_panel',
        array(
            'title'         => __('Page sidebar', 'gtl-multipurpose'),
            'priority'      => 10,
            'panel'         => 'gtl_sidebar_panel', 
        )
    );
    $wp_customize->add_setting(
        'page_sidebar_pos',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'page_sidebar_pos',
        array(
            'type'        => 'radio',
            'label'       => __('Page sidebar position', 'gtl-multipurpose'),
            'section'     => 'gtl_page_sidebar_panel',
            'description' => __('Select the sidebar position for pages', 'gtl-multipurpose'),
            'choices' => array(
                'none'    => __('No sidebar', 'gtl-multipurpose'),
                'right'     => __('Right sidebar', 'gtl-multipurpose'),
                'left'=> __('Left sidebar', 'gtl-multipurpose')
            ),
        )
    );

    //___select sidebar ___//

    $wp_customize->add_setting(
        'page_sidebar_id',
        array(
            'default'           => 'gtl-blog-sidebar',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'page_sidebar_id',
        array(
            'type'        => 'radio',
            'label'       => __('Select sidebar', 'gtl-multipurpose'),
            'section'     => 'gtl_page_sidebar_panel',
            'description' => __('Select sidebar for pages. Will ignored if No sidebar is checked above', 'gtl-multipurpose'),
            'choices' => gtl_multipurpose_sidebars(),
        )
    );



/********************** shop sidebar ********************************/
     //shop sidebar position ___//
    $wp_customize->add_section(
        'gtl_shop_sidebar_panel',
        array(
            'title'         => __('Shop sidebar', 'gtl-multipurpose'),
            'priority'      => 11,
            'panel'         => 'gtl_sidebar_panel', 
        )
    );
    $wp_customize->add_setting(
        'shop_sidebar_pos',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'shop_sidebar_pos',
        array(
            'type'        => 'radio',
            'label'       => __('Shop sidebar position', 'gtl-multipurpose'),
            'section'     => 'gtl_shop_sidebar_panel',
            'description' => __('Select the sidebar position for shop archive/single templates', 'gtl-multipurpose'),
            'choices' => array(
                'none'    => __('No sidebar', 'gtl-multipurpose'),
                'right'     => __('Right sidebar', 'gtl-multipurpose'),
                'left'=> __('Left sidebar', 'gtl-multipurpose')
            ),
        )
    );

    //___select sidebar ___//

    $wp_customize->add_setting(
        'shop_sidebar_id',
        array(
            'default'           => 'gtl-blog-sidebar',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'shop_sidebar_id',
        array(
            'type'        => 'radio',
            'label'       => __('Select sidebar', 'gtl-multipurpose'),
            'section'     => 'gtl_shop_sidebar_panel',
            'description' => __('Select sidebar for shop archive/single teamplates. Will ignored if No sidebar is checked above', 'gtl-multipurpose'),
            'choices' => gtl_multipurpose_sidebars(),
        )
    );




