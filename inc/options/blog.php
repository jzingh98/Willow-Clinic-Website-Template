<?php

    // blog area 
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => __('Blog Setting', 'gtl-multipurpose'),
            'priority' => 19,
        )
    ); 

    // Blog layout
    $wp_customize->add_setting('gtl_blog_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );
    $wp_customize->add_control( new GTL_Info( $wp_customize, 'layout', array(
        'label' => __('Post Layout', 'gtl-multipurpose'),
        'section' => 'blog_options',
        'settings' => 'gtl_blog_options[info]',
        'priority' => 10
        ) )
    );    
    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default'           => 'list',
            'sanitize_callback' => 'gtl_sanitize_blog',
        )
    );
    $wp_customize->add_control(
        'blog_layout',
        array(
            'type'      => 'radio',
            'label'     => __('Choose a layout', 'gtl-multipurpose'),
            'section'   => 'blog_options',
            'priority'  => 11,
            'choices'   => array(
                'classic-1'           => __( 'Classic 1', 'gtl-multipurpose' ),
                'classic-2'       => __( 'Classic 2 ', 'gtl-multipurpose' ),
                'list'       => __( 'List', 'gtl-multipurpose' ),
                'grid'         => __( 'Grid', 'gtl-multipurpose' ),
                'masonry'    => __( 'Masonry', 'gtl-multipurpose' )
            ),
        )
    ); 
   

    
    //Content/excerpt
    $wp_customize->add_setting('gtl_blog_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );
    $wp_customize->add_control( new GTL_Info( $wp_customize, 'content', array(
        'label' => __('Post content/excerpt', 'gtl-multipurpose'),
        'section' => 'blog_options',
        'settings' => 'gtl_blog_options[info]',
        'priority' => 13
        ) )
    );          
    //Full content posts
    $wp_customize->add_setting(
      'full_content_home',
      array(
        'sanitize_callback' => 'gtl_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'full_content_home',
        array(
            'type' => 'checkbox',
            'label' => __('Full content on home page', 'gtl-multipurpose'),
            'section' => 'blog_options',
            'priority' => 14,
        )
    );
    $wp_customize->add_setting(
      'full_content_archives',
      array(
        'sanitize_callback' => 'gtl_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'full_content_archives',
        array(
            'type' => 'checkbox',
            'label' => __('Full content on all archives.', 'gtl-multipurpose'),
            'section' => 'blog_options',
            'priority' => 15,
        )
    );   

    //Excerpt
    $wp_customize->add_setting(
        'exc_lenght',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
        )       
    );
    $wp_customize->add_control( 'exc_lenght', array(
        'type'        => 'number',
        'priority'    => 16,
        'section'     => 'blog_options',
        'label'       => __('Post excerpt length', 'gtl-multipurpose'),
        'description' => __('Default: 18 words', 'gtl-multipurpose'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
        ),
    ) );

    // meta
    $wp_customize->add_setting('gtl_blog_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );
    $wp_customize->add_control( new GTL_Info( $wp_customize, 'meta', array(
        'label' => __('Post meta', 'gtl-multipurpose'),
        'section' => 'blog_options',
        'settings' => 'gtl_blog_options[info]',
        'priority' => 17
        ) )
    ); 

    //Hide meta index
    $wp_customize->add_setting(
      'hide_meta_index',
      array(
        'sanitize_callback' => 'gtl_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'hide_meta_index',
      array(
        'type' => 'checkbox',
        'label' => __('Don\'t display post meta on index/archive', 'gtl-multipurpose'),
        'section' => 'blog_options',
        'priority' => 18,
      )
    );
    //Hide meta single
    $wp_customize->add_setting(
      'hide_meta_single',
      array(
        'sanitize_callback' => 'gtl_sanitize_checkbox',
        'default' => 0,     
      )   
    );

    $wp_customize->add_control(
      'hide_meta_single',
      array(
        'type' => 'checkbox',
        'label' => __('Don\'t display post meta on single', 'gtl-multipurpose'),
        'section' => 'blog_options',
        'priority' => 19,
      )
    );

    //Featured images
    $wp_customize->add_setting('gtl_blog_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );
    $wp_customize->add_control( new GTL_Info( $wp_customize, 'images', array(
        'label' => __('Post featured images', 'gtl-multipurpose'),
        'section' => 'blog_options',
        'settings' => 'gtl_blog_options[info]',
        'priority' => 21
        ) )
    );     
    //Index images
    $wp_customize->add_setting(
        'hide_index_feat_image',
        array(
            'sanitize_callback' => 'gtl_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'hide_index_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Don\'t display featured images on index/archives.', 'gtl-multipurpose'),
            'section' => 'blog_options',
            'priority' => 22,
        )
    );
    //Post images
    $wp_customize->add_setting(
        'hide_single_feat_image',
        array(
            'sanitize_callback' => 'gtl_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'hide_single_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Don\'t display featured images on single posts', 'gtl-multipurpose'),
            'section' => 'blog_options',
            'priority' => 23,
        )
    );


    // Read more button
    $wp_customize->add_setting('gtl_blog_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );
    $wp_customize->add_control( new GTL_Info( $wp_customize, 'button', array(
        'label' => __('Read more button', 'gtl-multipurpose'),
        'section' => 'blog_options',
        'settings' => 'gtl_blog_options[info]',
        'priority' => 24
        ) )
    );

    // button label
    $wp_customize->add_setting(
        'read_more_button_label',
        array(
            'sanitize_callback' => 'gtl_sanitize_text',
        )       
    );
    $wp_customize->add_control(
        'read_more_button_label',
        array(
            'type' => 'text',
            'label' => __('Read more button label', 'gtl-multipurpose'),
            'section' => 'blog_options',
            'priority' => 25,
        )
    );
    // button type
    $wp_customize->add_setting(
        'read_more_button_type',
        array(
            'default' => 'primary_btn',
            'sanitize_callback' => 'gtl_sanitize_text',
        )       
    );
    $wp_customize->add_control(
        'read_more_button_type',
        array(
            'type' => 'select',
            'label' => __('Read more button type', 'gtl-multipurpose'),
            'section' => 'blog_options',
            'priority' => 26,
            'choices' => array(
                        'primary_btn'   => 'Primary Button',
                        'secondary_btn' => 'Secondary Button',
                        'tertiary_btn'  => 'Tertiary Button',
                        'quaternary_btn'=> 'Quaternary Button',
                    )
        )
    );

/********** sanitization **********/
//Blog Layout
function gtl_sanitize_blog( $input ) {
    $valid = array(
        'classic-1'    => __( 'Classic 1', 'gtl-multipurpose' ),
        'classic-2'    => __( 'Classic 2', 'gtl-multipurpose' ),
        'list'       => __( 'List', 'gtl-multipurpose' ),
        'grid'  => __( 'Grid', 'gtl-multipurpose' ),
        'masonry'    => __( 'Masonry', 'gtl-multipurpose' )

    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}