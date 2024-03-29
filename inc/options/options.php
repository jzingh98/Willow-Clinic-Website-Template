<?php
//___Colors___//
    $wp_customize->add_panel( 'gtl_options_panel', array(
        'priority'       => 21,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Options Setting', 'gtl-multipurpose'),
    ) );

/************************ General section *****************************/


    //Social media
    $wp_customize->add_setting(
        'social_media',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
           
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'social_media',
            array(
                'label' => __('Body text', 'gtl-multipurpose'),
                'section' => 'colors',
                'settings'      => 'body_text_color',
                'priority' => 3
            )
        )
    );    

    
    /************** Header Section ****************************/  

    $wp_customize->add_section(
        'colors_header',
        array(
            'title'         => __('Header', 'gtl-multipurpose'),
            'priority'      => 12,
            'panel'         => 'gtl_colors_panel',
        )
    );
    
    



        //Menu bg
    $wp_customize->add_setting(
        'menu_bg_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_bg_color',
            array(
                'label' => __('Menu background', 'gtl-multipurpose'),
                'section' => 'colors_header',
                'priority' => 12
            )
        )
    );     

    //Top level menu items
    $wp_customize->add_setting(
        'top_items_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_items_color',
            array(
                'label' => __('Top level menu items', 'gtl-multipurpose'),
                'section' => 'colors_header',
                'priority' => 13
            )
        )
    );
    //Menu items hover
    $wp_customize->add_setting(
        'menu_items_hover',
        array(
            'default'           => '#d65050',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_items_hover',
            array(
                'label' => __('Menu items hover', 'gtl-multipurpose'),
                'section' => 'colors_header',
                'priority' => 15
            )
        )
    );

    //Sub menu items color
    $wp_customize->add_setting(
        'submenu_items_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_items_color',
            array(
                'label' => __('Sub-menu items', 'gtl-multipurpose'),
                'section' => 'colors_header',
                'priority' => 16
            )
        )
    );
    //Sub menu background
    $wp_customize->add_setting(
        'submenu_background',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_background',
            array(
                'label' => __('Sub-menu background', 'gtl-multipurpose'),
                'section' => 'colors_header',
                'priority' => 17
            )
        )
    );
    //Mobile menu
    $wp_customize->add_setting(
        'mobile_menu_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mobile_menu_color',
            array(
                'label' => __('Mobile menu button', 'gtl-multipurpose'),
                'section' => 'colors_header',
                'priority' => 17
            )
        )
    );    
    //Slider text
    $wp_customize->add_setting(
        'slider_text',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'slider_text',
            array(
                'label' => __('Banner slider text', 'gtl-multipurpose'),
                'section' => 'colors_header',
                'priority' => 18
            )
        )
    );

    
    

   /*********************** Sidebar section **********************/

    $wp_customize->add_section(
        'colors_sidebar',
        array(
            'title'         => __('Sidebar', 'gtl-multipurpose'),
            'priority'      => 13,
            'panel'         => 'gtl_colors_panel',
        )
    );
    //Sidebar backgound
    $wp_customize->add_setting(
        'sidebar_background',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_background',
            array(
                'label' => __('Sidebar background', 'gtl-multipurpose'),
                'section' => 'colors_sidebar',
                'priority' => 20
            )
        )
    );
    //Sidebar color
    $wp_customize->add_setting(
        'sidebar_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_color',
            array(
                'label' => __('Sidebar color', 'gtl-multipurpose'),
                'section' => 'colors_sidebar',
                'priority' => 21
            )
        )
    );


    /*********************** Footer Section *************************/
    $wp_customize->add_section(
        'colors_footer',
        array(
            'title'         => __('Footer', 'gtl-multipurpose'),
            'priority'      => 14,
            'panel'         => 'gtl_colors_panel',
        )
    );    
    

    //Footer background
    $wp_customize->add_setting(
        'footer_background',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background',
            array(
                'label' => __('Footer background', 'gtl-multipurpose'),
                'section' => 'colors_footer',
                'priority' => 24
            )
        )
    );

    //Footer color
    $wp_customize->add_setting(
        'footer_color',
        array(
            'default'           => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_color',
            array(
                'label' => __('Footer color', 'gtl-multipurpose'),
                'section' => 'colors_footer',
                'priority' => 25
            )
        )
    );

    //Copyright bg color
    $wp_customize->add_setting(
        'copyright_bg_color',
        array(
            'default'           => '#6b6b6b',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'copyright_bg_color',
            array(
                'label' => __('Copyright background', 'gtl-multipurpose'),
                'section' => 'colors_footer',
                'priority' => 25
            )
        )
    );

    //Copyright  color
    $wp_customize->add_setting(
        'copyright_color',
        array(
            'default'           => '#efefef',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'copyright_color',
            array(
                'label' => __('Copyright text color', 'gtl-multipurpose'),
                'section' => 'colors_footer',
                'priority' => 25
            )
        )
    );