<?php
   //___Fonts___//
    $wp_customize->add_section(
        'gtl_fonts',
        array(
            'title' => __('Fonts Setting', 'gtl-multipurpose'),
            'priority' => 19,
            'description' => __('If you are not familier with google fonts, please visit: google.com/fonts', 'gtl-multipurpose'),
        )
    );
    //Body fonts title
    $wp_customize->add_setting('gtl_font_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );
    $wp_customize->add_control( new GTL_Info( $wp_customize, 'body_fonts', array(
        'label' => __('Body fonts', 'gtl-multipurpose'),
        'section' => 'gtl_fonts',
        'settings' => 'gtl_font_options[info]',
        'priority' => 10
        ) )
    );    
    //Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => 'Libre+Franklin:100,200,300,400,500,600,700,800,900',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_name',
        array(
            'label' => __( 'Google font name & sets. E.g. Libre+Franklin:100,200,300', 'gtl-multipurpose' ),
            'section' => 'gtl_fonts',
            'type' => 'text',
            'priority' => 11
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => 'Libre+Franklin',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'label' => __( 'Font family', 'gtl-multipurpose' ),
            'section' => 'gtl_fonts',
            'type' => 'text',
            'priority' => 12
        )
    );

    //Font sizes title
    $wp_customize->add_setting('gtl_font_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );
    $wp_customize->add_control( new GTL_Info( $wp_customize, 'font_sizes', array(
        'label' => __('Font sizes', 'gtl-multipurpose'),
        'section' => 'gtl_fonts',
        'settings' => 'gtl_font_options[info]',
        'priority' => 16
        ) )
    );
    // Site title
    $wp_customize->add_setting(
        'site_title_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '32',
        )       
    );
    $wp_customize->add_control( 'site_title_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'gtl_fonts',
        'label'       => __('Site title', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 90,
            'step'  => 1,
        ),
    ) ); 
    // Site description
    $wp_customize->add_setting(
        'site_desc_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
        )       
    );
    $wp_customize->add_control( 'site_desc_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'gtl_fonts',
        'label'       => __('Site description', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
        ),
    ) );  
    // Nav menu
    $wp_customize->add_setting(
        'menu_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
        )       
    );
    $wp_customize->add_control( 'menu_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'gtl_fonts',
        'label'       => __('Menu items', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
        ),
    ) );           
    //H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '70',
        )       
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'gtl_fonts',
        'label'       => __('H1 font size', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '46',
        )       
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'gtl_fonts',
        'label'       => __('H2 font size', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '34',
        )       
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'gtl_fonts',
        'label'       => __('H3 font size', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '28',
        )       
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'gtl_fonts',
        'label'       => __('H4 font size', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '25',
        )       
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'gtl_fonts',
        'label'       => __('H5 font size', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
        )       
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'gtl_fonts',
        'label'       => __('H6 font size', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //Body
    $wp_customize->add_setting(
        'body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16',
        )       
    );
    $wp_customize->add_control( 'body_size', array(
        'type'        => 'number',
        'priority'    => 23,
        'section'     => 'gtl_fonts',
        'label'       => __('Body font size', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
        ),
    ) );
    // Single post tiles
    $wp_customize->add_setting(
        'single_post_title_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '34',
        )       
    );

    $wp_customize->add_control( 'single_post_title_size', array(
        'type'        => 'number',
        'priority'    => 24,
        'section'     => 'gtl_fonts',
        'label'       => __('Single post title size', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 90,
            'step'  => 1,
        ),
    ) ); 