<?php

   // button panel
    $wp_customize->add_panel( 'gtl_button_panel', array(
        'priority'       => 21,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Button Setting', 'gtl-multipurpose'),
    ) );


    /**
     * Primary button settings
     */
    // primary button section
    $wp_customize->add_section(
        'primary_button',
        array(
            'title'         => __('Primary Button', 'gtl-multipurpose'),
            'priority'      => 14,
            'panel'         => 'gtl_button_panel',
        )
    );    
    
    // primary button fields
    $wp_customize->add_setting(
        'line_height',
        array(           
            'default'           => '44',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
            'line_height',
            array(
                'label'       => __('Line Height', 'gtl-multipurpose'),
                'type'              => 'number',
                'description' => __( 'Height of the button' , 'gtl-multipurpose' ),
                'section'     => 'primary_button',
                'priority'    => 15
            )
    );

    $wp_customize->add_setting(
        'border_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                'border_color',
                 array(
                    'label' => __('Border Color', 'gtl-multipurpose'),
                    'section' => 'primary_button',
                    'priority' => 16
                )
            )
    );

    $wp_customize->add_setting(
        'border_width',
        array(
            'default'           => '',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control( 
                'border_width',
                 array(
                    'label'       => __('Border width', 'gtl-multipurpose'),
                    'type'        => 'number',
                    'description' => '',
                    'section'     => 'primary_button',
                    'priority'    => 17
                )
    );

    $wp_customize->add_setting(
        'border_radius',
        array(
            'default'           => '0',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control( 
                'border_radius',
                 array(
                    'type' => 'number',
                    'label' => __('Border Radius', 'gtl-multipurpose'),
                    'section' => 'primary_button',
                    'priority' => 18
                )
            
    );

    $wp_customize->add_setting(
        'bg_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                'bg_color',
                 array(
                    'label' => __('Background Color', 'gtl-multipurpose'),
                    'section' => 'primary_button',
                    'priority' => 19
                )
            )
    );

    $wp_customize->add_setting(
        'bg_hover_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                'bg_hover_color',
                 array(
                    'label' => __('Background Hover Color', 'gtl-multipurpose'),
                    'section' => 'primary_button',
                    'priority' => 20
                )
            )
    );

    $wp_customize->add_setting(
        'label_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                'label_color',
                 array(
                    'label' => __('Label Color', 'gtl-multipurpose'),
                    'section' => 'primary_button',
                    'priority' => 21
                )
            )
    );

    $wp_customize->add_setting(
        'label_hover_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                'label_hover_color',
                 array(
                    'label' => __('Label Hover Color', 'gtl-multipurpose'),
                    'section' => 'primary_button',
                    'priority' => 21
                )
            )
    );

    $wp_customize->add_setting(
        'label_font_size',
        array(
            'default'           => '15',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
                'label_font_size',
                 array(
                    'type' => 'number',
                    'label' => __('Label font size', 'gtl-multipurpose'),
                    'section' => 'primary_button',
                    'priority' => 22
                )
            
    );
    
    $wp_customize->add_setting(
        'padding',
        array(           
            'default'           => '20',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
            'padding',
            array(
                'type'              => 'number',
                'label'       => __('Left/Right Padding', 'gtl-multipurpose'),
                'section'     => 'primary_button',
                'priority'    => 24
            )
    );



    /**
     * Secondary button settings
     */
    // secondary button section
    $wp_customize->add_section(
        'secondary_button',
        array(
            'title'         => __('Secondary Button', 'gtl-multipurpose'),
            'priority'      => 14,
            'panel'         => 'gtl_button_panel',
        )
    );    
    
    // secondary_button button fields
    $wp_customize->add_setting(
        's_line_height',
        array(
            
            'default'           => '44',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
            's_line_height',
            array(
                'type'              => 'number',
                'label'       => __('Line Height', 'gtl-multipurpose'),
                'description' => __( 'Height of the button' , 'gtl-multipurpose' ),
                'section'     => 'secondary_button',
                'priority'    => 15
            )
    );

    $wp_customize->add_setting(
        's_border_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                's_border_color',
                 array(
                    'label' => __('Border Color', 'gtl-multipurpose'),
                    'section' => 'secondary_button',
                    'priority' => 16
                )
            )
    );

    $wp_customize->add_setting(
        's_border_width',
        array(
            'default'           => '',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control( 
                's_border_width',
                 array(
                    'label'       => __('Border width', 'gtl-multipurpose'),
                    'type'        => 'number',
                    'description' => '',
                    'section'     => 'secondary_button',
                    'priority'    => 16
                )
    );


    $wp_customize->add_setting(
        's_border_radius',
        array(
            'default'           => '0',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control( 
                's_border_radius',
                 array(
                    'label' => __('Border Radius', 'gtl-multipurpose'),
                    'section' => 'secondary_button',
                    'priority' => 16
                )
            
    );

    $wp_customize->add_setting(
        's_bg_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                's_bg_color',
                 array(
                    'label' => __('Background Color', 'gtl-multipurpose'),
                    'section' => 'secondary_button',
                    'priority' => 17
                )
            )
    );

    $wp_customize->add_setting(
        's_bg_hover_color',
        array(
            'default'           => '25',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                's_bg_hover_color',
                 array(
                    'label' => __('Background Hover Color', 'gtl-multipurpose'),
                    'section' => 'secondary_button',
                    'priority' => 18
                )
            )
    );

    $wp_customize->add_setting(
        's_label_color',
        array(
            'default'           => '25',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                's_label_color',
                 array(
                    'label' => __('Label Color', 'gtl-multipurpose'),
                    'section' => 'secondary_button',
                    'priority' => 19
                )
            )
    );

 $wp_customize->add_setting(
        's_label_font_size',
        array(
            'default'           => '15',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
                's_label_font_size',
                 array(
                     'type' => 'number',
                    'label' => __('Label font size', 'gtl-multipurpose'),
                    'section' => 'primary_button',
                    'priority' => 22
                )
            
    );

    $wp_customize->add_setting(
        's_label_hover_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                's_label_hover_color',
                 array(
                    'label' => __('Label Hover Color', 'gtl-multipurpose'),
                    'section' => 'secondary_button',
                    'priority' => 20
                )
            )
    );

    $wp_customize->add_setting(
        's_label_font_size',
        array(
            'default'           => '15',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
                's_label_font_size',
                 array(
                    'label' => __('Label font size', 'gtl-multipurpose'),
                    'section' => 'secondary_button',
                    'priority' => 20
                )
            
    );
    
    $wp_customize->add_setting(
        's_padding',
        array(
           
            'default'           => '20',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
            's_padding',
            array(
                 'type'              => 'number',
                'label'       => __('Left/Right Padding', 'gtl-multipurpose'),
                'section'     => 'secondary_button',
                'priority'    => 21
            )
    );



    /**
     * Tertiary button settings
     */
    // tertiary button section
    $wp_customize->add_section(
        'tertiary_button',
        array(
            'title'         => __('Tertiary Button', 'gtl-multipurpose'),
            'priority'      => 14,
            'panel'         => 'gtl_button_panel',
        )
    );    
    
    // tertiary_button button fields
    $wp_customize->add_setting(
        't_line_height',
        array(
            
            'default'           => '44',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
            't_line_height',
            array(
                'type'              => 'number',
                'label'       => __('Line Height', 'gtl-multipurpose'),
                'description' => __( 'Height of the button' , 'gtl-multipurpose' ),
                'section'     => 'tertiary_button',
                'priority'    => 15
            )
    );

    $wp_customize->add_setting(
        't_border_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                't_border_color',
                 array(
                    'label' => __('Border Color', 'gtl-multipurpose'),
                    'section' => 'tertiary_button',
                    'priority' => 16
                )
            )
    );

    $wp_customize->add_setting(
        't_border_width',
        array(
            'default'           => '',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control( 
                't_border_width',
                 array(
                    'label'       => __('Border width', 'gtl-multipurpose'),
                    'type'        => 'number',
                    'description' => '',
                    'section'     => 'tertiary_button',
                    'priority'    => 16
                )
    );

    $wp_customize->add_setting(
        't_border_radius',
        array(
            'default'           => '0',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control( 
                't_border_radius',
                 array(
                    'type'              => 'number',
                    'label' => __('Border Radius', 'gtl-multipurpose'),
                    'section' => 'tertiary_button',
                    'priority' => 16
                )
            
    );

    $wp_customize->add_setting(
        't_bg_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                't_bg_color',
                 array(
                    'label' => __('Background Color', 'gtl-multipurpose'),
                    'section' => 'tertiary_button',
                    'priority' => 17
                )
            )
    );

    $wp_customize->add_setting(
        't_bg_hover_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                't_bg_hover_color',
                 array(
                    'label' => __('Background Hover Color', 'gtl-multipurpose'),
                    'section' => 'tertiary_button',
                    'priority' => 18
                )
            )
    );

    $wp_customize->add_setting(
        't_label_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                't_label_color',
                 array(
                    'label' => __('Label Color', 'gtl-multipurpose'),
                    'section' => 'tertiary_button',
                    'priority' => 19
                )
            )
    );

    $wp_customize->add_setting(
        't_label_hover_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                't_label_hover_color',
                 array(
                    'label' => __('Label Hover Color', 'gtl-multipurpose'),
                    'section' => 'tertiary_button',
                    'priority' => 20
                )
            )
    );

    $wp_customize->add_setting(
        't_label_font_size',
        array(
            'default'           => '15',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
                't_label_font_size',
                 array(
                     'type' => 'number',
                    'label' => __('Label font size', 'gtl-multipurpose'),
                    'section' => 'tertiary_button',
                    'priority' => 22
                )
            
    );
    
    $wp_customize->add_setting(
        't_padding',
        array(
            'default'           => '20',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
            't_padding',
            array(
                 'type'              => 'number',
                'label'       => __('Left/Right Padding', 'gtl-multipurpose'),
                'section'     => 'tertiary_button',
                'priority'    => 21
            )
    );


    /**
     * Quaternary button settings
     */
    // quaternary button section
    $wp_customize->add_section(
        'quaternary_button',
        array(
            'title'         => __('Quaternary Button', 'gtl-multipurpose'),
            'priority'      => 14,
            'panel'         => 'gtl_button_panel',
        )
    );    
    
    // quaternary button fields
    $wp_customize->add_setting(
        'q_line_height',
        array(
           
            'default'           => '44',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
            'q_line_height',
            array(
                 'type'              => 'number',
                'label'       => __('Line Height', 'gtl-multipurpose'),
                'description' => __( 'Height of the button' , 'gtl-multipurpose' ),
                'section'     => 'quaternary_button',
                'priority'    => 15
            )
    );

    $wp_customize->add_setting(
        'q_border_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                'q_border_color',
                 array(
                    'label' => __('Border Color', 'gtl-multipurpose'),
                    'section' => 'quaternary_button',
                    'priority' => 16
                )
            )
    );

    $wp_customize->add_setting(
        'q_border_width',
        array(
            'default'           => '',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control( 
                'q_border_width',
                 array(
                    'label'       => __('Border width', 'gtl-multipurpose'),
                    'type'        => 'number',
                    'description' => '',
                    'section'     => 'quaternary_button',
                    'priority'    => 16
                )
    );

    $wp_customize->add_setting(
        'q_border_radius',
        array(
            'default'           => '0',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control( 
                'q_border_radius',
                 array(
                     'type'              => 'number',
                    'label' => __('Border Radius', 'gtl-multipurpose'),
                    'section' => 'quaternary_button',
                    'priority' => 16
                )
            
    );

    $wp_customize->add_setting(
        'q_bg_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                'q_bg_color',
                 array(
                    'label' => __('Background Color', 'gtl-multipurpose'),
                    'section' => 'quaternary_button',
                    'priority' => 17
                )
            )
    );

    $wp_customize->add_setting(
        'q_bg_hover_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                'q_bg_hover_color',
                 array(
                    'label' => __('Background Hover Color', 'gtl-multipurpose'),
                    'section' => 'quaternary_button',
                    'priority' => 18
                )
            )
    );

    $wp_customize->add_setting(
        'q_label_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                'q_label_color',
                 array(
                    'label' => __('Label Color', 'gtl-multipurpose'),
                    'section' => 'quaternary_button',
                    'priority' => 19
                )
            )
    );

    $wp_customize->add_setting(
        'q_label_hover_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
                 $wp_customize,
                'q_label_hover_color',
                 array(
                    'label' => __('Label Hover Color', 'gtl-multipurpose'),
                    'section' => 'quaternary_button',
                    'priority' => 20
                )
            )
    );

    $wp_customize->add_setting(
        'q_label_font_size',
        array(
            'default'           => '15',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
                'q_label_font_size',
                 array(
                     'type' => 'number',
                    'label' => __('Label font size', 'gtl-multipurpose'),
                    'section' => 'quaternary_button',
                    'priority' => 22
                )
            
    );
    
    $wp_customize->add_setting(
        'q_padding',
        array(          
            'default'           => '20',
            'sanitize_callback' => 'absint',
            
        )
    );
    $wp_customize->add_control(
            'q_padding',
            array(
                 'type'              => 'number',
                'label'       => __('Left/Right Padding', 'gtl-multipurpose'),
                'section'     => 'quaternary_button',
                'priority'    => 21
            )
    );