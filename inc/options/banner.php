<?php 
/**
 * Customizer options
 * @package     GTL_Multipurpose
 * @link        http://www.greenturtlelab.com/
 * since        1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
  
  /**
   * Banner settings 
   */   

    // banner area
        $wp_customize->add_panel( 'gtl_banner_panel', array(
            'priority'       => 10,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Banner Setting', 'gtl-multipurpose'),
        ) );

    // banner type
    $wp_customize->add_section(
        'gtl_banner_panel',
        array(
            'title'         => __('Banner type', 'gtl-multipurpose'),
            'priority'      => 10,
            'panel'         => 'gtl_banner_panel', 
        )
    );

    // front page banner type
    $wp_customize->add_setting(
        'front_banner_type',
        array(
            'default'           => 'slider-banner',
            'sanitize_callback' => 'gtl_sanitize_banner_type',
        )
    );

    $wp_customize->add_control(
        'front_banner_type',
        array(
            'type'        => 'radio',
            'label'       => __('Front page banner type', 'gtl-multipurpose'),
            'section'     => 'gtl_banner_panel',
            'description' => __('Select the banner type for your front page', 'gtl-multipurpose'),
            'choices' => array(
                'slider-banner'     => __('Full screen slider', 'gtl-multipurpose'),
                'image-banner'      => __('Image banner', 'gtl-multipurpose'),
                'video-banner'      => __('Video banner', 'gtl-multipurpose'),
                 'shortcode-banner'        => __('Shortcode', 'gtl-multipurpose'),
                'no-banner'         => __('No banner (only menu)', 'gtl-multipurpose')
            ),
        )
    );

    // front page banner shortcode
    $wp_customize->add_setting(
        'front_banner_shortcode',
        array(
            'default'           => '',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'front_banner_shortcode',
        array(
            'type'        => 'text',
            'label'       => __('Shortcode', 'gtl-multipurpose'),
            'section'     => 'gtl_banner_panel',
            'description' => __('Works if shortcode is checked above', 'gtl-multipurpose'),
        )
    );

    // inner page banner type
    $wp_customize->add_setting(
        'site_banner_type',
        array(
            'default'           => 'image-banner',
            'sanitize_callback' => 'gtl_sanitize_banner_type',
        )
    );

    $wp_customize->add_control(
        'site_banner_type',
        array(
            'type'        => 'radio',
            'label'       => __('Inner page banner type', 'gtl-multipurpose'),
            'section'     => 'gtl_banner_panel',
            'description' => __('Select the banner type for all inner pages except the front page', 'gtl-multipurpose'),
            'choices' => array(
                'slider-banner'    => __('Full screen slider', 'gtl-multipurpose'),
                'image-banner'     => __('Image banner', 'gtl-multipurpose'),
                'video-banner'=> __('Video banner', 'gtl-multipurpose'),
                'shortcode-banner'        => __('Shortcode', 'gtl-multipurpose'),
                'no-banner'   => __('No banner (only menu)', 'gtl-multipurpose')
            ),
        )
    ); 

    // inner page banner shortcode
    $wp_customize->add_setting(
        'inner_banner_shortcode',
        array(
            'default'           => '',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'inner_banner_shortcode',
        array(
            'type'        => 'text',
            'label'       => __('Shortcode', 'gtl-multipurpose'),
            'section'     => 'gtl_banner_panel',
            'description' => __('Works if shortcode is checked above', 'gtl-multipurpose'),
        )
    );   


/**
 *Slider settings 
 */

 // slider area
    $wp_customize->add_section(
        'gtl_slider',
        array(
            'title'         => __('Banner slides', 'gtl-multipurpose'),
            'description'   => __('You can add up to 5 images in the slider. You can also add  Call to action buttons for each slides. If you don\'t need CTA button simply leave label empty.', 'gtl-multipurpose'),
            'priority'      => 11,
            'panel'         => 'gtl_banner_panel',
        )
    );



    // slider Speed
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default' => __('3000','gtl-multipurpose'),
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'slider_speed',
        array(
            'label' => __( 'Slider speed', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'number',
            'description'   => __('Slider speed in miliseconds. Use 0 to disable', 'gtl-multipurpose'),       
            'priority' => 7
        )
    );

    // animation speed
    $wp_customize->add_setting(
        'animation_speed',
        array(
            'default' => __('1000','gtl-multipurpose'),
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'animation_speed',
        array(
            'label' => __( 'Animation speed', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'number',
            'description'   => __('Animation speed in miliseconds.', 'gtl-multipurpose'),       
            'priority' => 7
        )
    );
    

    // animation speed
    $wp_customize->add_setting(
        'caption_align',
        array(
            'default' => __('center','gtl-multipurpose'),
            'sanitize_callback' => '',
        )
    );

    $wp_customize->add_control(
        'caption_align',
        array(
            'label' => __( 'Title / Subtitle align', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'select',      
            'priority' => 7,
            'choices' => array(
                        'left'   => __('Left' , 'gtl-multipurpose' ),
                        'center' => __('Center' , 'gtl-multipurpose' ),
                        'right'  => __('Right' , 'gtl-multipurpose' ),
                       
                    )
        )
    );
    

    /**
     * slider Images 
     */

  // slide 1
    $wp_customize->add_setting('gtl_slider_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );

    $wp_customize->add_control( new GTL_Info( $wp_customize, 's1', array(
        'label' => __('First slide', 'gtl-multipurpose'),
        'section' => 'gtl_slider',
        'settings' => 'gtl_slider_options[info]',
        'priority' => 10
        ) )
    ); 

    $wp_customize->add_setting(
        'slider_image_1',
        array(
            'default' => get_template_directory_uri().'/assets/images/slider1.jpg',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_1',
            array(
               'label'          => __( 'Slider image 1', 'gtl-multipurpose' ),
               'type'           => 'image',
               'section'        => 'gtl_slider',
               'settings'       => 'slider_image_1',
               'priority'       => 11,
            )
        )
    );

   
    $wp_customize->add_setting(
        'slider_title_1',
        array(
            'default' => '',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_title_1',
        array(
            'label' => __( 'First slide title', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 12
        )
    );
    
    $wp_customize->add_setting(
        'slider_subtitle_1',
        array(
            'default' => __('Ultimate WordPress theme','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_subtitle_1',
        array(
            'label' => __( 'First slide subtitle', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 13
        )
    );  

    // cta 1
    $wp_customize->add_setting(
        'slider_1_cta_1_label',
        array(
            'default' => __('Click here','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_1_cta_1_label',
        array(
            'label' => __( 'First slide CTA 1 label', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 14
        )
    ); 

    $wp_customize->add_setting(
        'slider_1_cta_1_url',
        array(
            'default' => __('#about','gtl-multipurpose'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'slider_1_cta_1_url',
        array(
            'label' => __( 'First slide CTA 1 url', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 15
        )
    ); 

    $wp_customize->add_setting(
        'slider_1_cta_1_btn',
        array(
            'default' => __('primary_btn','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_1_cta_1_btn',
        array(
            'label' => __( 'CTA 1 Button Type', 'gtl-multipurpose' ),
            'description' => __( 'Style your button from button settings' , 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'select',
            'priority' => 16,
            'choices' => array(
                        'primary_btn'   => 'Primary Button',
                        'secondary_btn' => 'Secondary Button',
                        'tertiary_btn'  => 'Tertiary Button',
                        'quaternary_btn'=> 'Quaternary Button',
                    )
        )
    );


    // cta 2
    $wp_customize->add_setting(
        'slider_1_cta_2_label',
        array(
            'default' => __('','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_1_cta_2_label',
        array(
            'label' => __( 'First slide CTA 2 label', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 17
        )
    ); 

    $wp_customize->add_setting(
        'slider_1_cta_2_url',
        array(
            'default' => __('','gtl-multipurpose'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'slider_1_cta_2_url',
        array(
            'label' => __( 'First slide CTA 2 url', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 18
        )
    ); 

    $wp_customize->add_setting(
        'slider_1_cta_2_btn',
        array(
            'default' => __('primary_btn','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_1_cta_2_btn',
        array(
            'label' => __( 'CTA 2 Button Type', 'gtl-multipurpose' ),
            'description' => __( 'Style your button from button settings' , 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'select',
            'priority' => 19,
            'choices' => array(
                        'primary_btn'   => 'Primary Button',
                        'secondary_btn' => 'Secondary Button',
                        'tertiary_btn'  => 'Tertiary Button',
                        'quaternary_btn'=> 'Quaternary Button',
                    )
        )
    );


   
    // slide 2
    $wp_customize->add_setting('gtl_slider_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );

    $wp_customize->add_control( new GTL_Info( $wp_customize, 's2', array(
        'label' => __('Second slide', 'gtl-multipurpose'),
        'section' => 'gtl_slider',
        'settings' => 'gtl_slider_options[info]',
        'priority' => 20
        ) )
    );  

    $wp_customize->add_setting(
        'slider_image_2',
        array(
            'default' => get_template_directory_uri().'/assets/images/slider2.jpg',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_2',
            array(
               'label'          => __( 'Slider image 2', 'gtl-multipurpose' ),
               'type'           => 'image',
               'section'        => 'gtl_slider',
               'settings'       => 'slider_image_2',
               'priority'       => 21,
            )
        )
    );
   
    $wp_customize->add_setting(
        'slider_title_2',
        array(
            'default' => '',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_title_2',
        array(
            'label' => __( 'Second slide title', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 22
        )
    );
    
    $wp_customize->add_setting(
        'slider_subtitle_2',
        array(
            'default' => __('Feel free to go around','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_subtitle_2',
        array(
            'label' => __( 'Second slide subtitle', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 23
        )
    );   

   
    $wp_customize->add_setting(
        'slider_2_cta_1_label',
        array(
            'default' => __('Click here','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_2_cta_1_label',
        array(
            'label' => __( 'Second slide CTA 1 Label', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 24
        )
    ); 

    $wp_customize->add_setting(
        'slider_2_cta_1_url',
        array(
            'default' => __('','gtl-multipurpose'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'slider_2_cta_1_url',
        array(
            'label' => __( 'Second slide CTA 1 URL', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 25
        )
    ); 

    $wp_customize->add_setting(
        'slider_2_cta_1_btn',
        array(
            'default' => __('primary_btn','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_2_cta_1_btn',
        array(
            'label' => __( 'CTA 1 Button Type', 'gtl-multipurpose' ),
            'description' => __( 'Style your button from button settings' , 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'select',
            'priority' => 26,
            'choices' => array(
                        'primary_btn'   => 'Primary Button',
                        'secondary_btn' => 'Secondary Button',
                        'tertiary_btn'  => 'Tertiary Button',
                        'quaternary_btn'=> 'Quaternary Button',
                    )
        )
    );


   // slide 3
    $wp_customize->add_setting('gtl_slider_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );

    $wp_customize->add_control( new GTL_Info( $wp_customize, 's3', array(
        'label' => __('Third slide', 'gtl-multipurpose'),
        'section' => 'gtl_slider',
        'settings' => 'gtl_slider_options[info]',
        'priority' => 27
        ) )
    ); 

    $wp_customize->add_setting(
        'slider_image_3',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_3',
            array(
               'label'          => __( 'Slider image 3', 'gtl-multipurpose' ),
               'type'           => 'image',
               'section'        => 'gtl_slider',
               'settings'       => 'slider_image_3',
               'priority'       => 28,
            )
        )
    );

    $wp_customize->add_setting(
        'slider_title_3',
        array(
            'default' => '',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_title_3',
        array(
            'label' => __( 'Third slide title', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 29
        )
    );
    
    $wp_customize->add_setting(
        'slider_subtitle_3',
        array(
            'default' => '',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_subtitle_3',
        array(
            'label' => __( 'Third slide subtitle', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 30
        )
    );            

    $wp_customize->add_setting(
        'slider_3_cta_1_label',
        array(
            'default' => __('Click here','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_3_cta_1_label',
        array(
            'label' => __( 'Third slide CTA 1 label', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 31
        )
    ); 

    $wp_customize->add_setting(
        'slider_3_cta_1_url',
        array(
            'default' => __('','gtl-multipurpose'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'slider_3_cta_1_url',
        array(
            'label' => __( 'Third slide CTA 1 URL', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 32
        )
    ); 

    $wp_customize->add_setting(
        'slider_3_cta_1_btn',
        array(
            'default' => __('primary_btn','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_3_cta_1_btn',
        array(
            'label' => __( 'CTA 1 Button Type', 'gtl-multipurpose' ),
            'description' => __( 'Style your button from button settings' , 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'select',
            'priority' => 33,
            'choices' => array(
                        'primary_btn'   => 'Primary Button',
                        'secondary_btn' => 'Secondary Button',
                        'tertiary_btn'  => 'Tertiary Button',
                        'quaternary_btn'=> 'Quaternary Button',
                    )
        )
    );

 
    // slide 4
    $wp_customize->add_setting('gtl_slider_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );

    $wp_customize->add_control( new GTL_Info( $wp_customize, 's4', array(
        'label' => __('Forth slide', 'gtl-multipurpose'),
        'section' => 'gtl_slider',
        'settings' => 'gtl_slider_options[info]',
        'priority' => 34
        ) )
    ); 

    $wp_customize->add_setting(
        'slider_image_4',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_4',
            array(
               'label'          => __( 'Slider image 4', 'gtl-multipurpose' ),
               'type'           => 'image',
               'section'        => 'gtl_slider',
               'settings'       => 'slider_image_4',
               'priority'       => 35,
            )
        )
    );

    $wp_customize->add_setting(
        'slider_title_4',
        array(
            'default' => '',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_title_4',
        array(
            'label' => __( 'Forth slide title', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 36
        )
    );
    
    $wp_customize->add_setting(
        'slider_subtitle_4',
        array(
            'default' => '',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_subtitle_4',
        array(
            'label' => __( 'Forth slide subtitle', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 37
        )
    );            

    $wp_customize->add_setting(
        'slider_4_cta_1_label',
        array(
            'default' => __('','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_4_cta_1_label',
        array(
            'label' => __( 'Forth slide CTA 1 label', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 38
        )
    ); 

    $wp_customize->add_setting(
        'slider_4_cta_1_url',
        array(
            'default' => __('','gtl-multipurpose'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'slider_4_cta_1_url',
        array(
            'label' => __( 'Forth slide CTA 1 URL', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 39
        )
    ); 

    $wp_customize->add_setting(
        'slider_4_cta_1_btn',
        array(
            'default' => __('primary_btn','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_4_cta_1_btn',
        array(
            'label' => __( 'Forth slide CTA 1 Button Type', 'gtl-multipurpose' ),
            'description' => __( 'Style your button from button settings' , 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'select',
            'priority' => 40,
            'choices' => array(
                        'primary_btn'   => 'Primary Button',
                        'secondary_btn' => 'Secondary Button',
                        'tertiary_btn'  => 'Tertiary Button',
                        'quaternary_btn'=> 'Quaternary Button',
                    )
        )
    );


    // slide 5
    $wp_customize->add_setting('gtl_slider_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gtl_sanitize_text',            
        )
    );

    $wp_customize->add_control( new GTL_Info( $wp_customize, 's5', array(
        'label' => __('Fifth slide', 'gtl-multipurpose'),
        'section' => 'gtl_slider',
        'settings' => 'gtl_slider_options[info]',
        'priority' => 41
        ) )
    ); 

    $wp_customize->add_setting(
        'slider_image_5',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_5',
            array(
               'label'          => __( 'Slider image 5', 'gtl-multipurpose' ),
               'type'           => 'image',
               'section'        => 'gtl_slider',
               'settings'       => 'slider_image_5',
               'priority'       => 42,
            )
        )
    );

    $wp_customize->add_setting(
        'slider_title_5',
        array(
            'default' => '',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_title_5',
        array(
            'label' => __( 'Fifth slide title', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 43
        )
    );
    
    $wp_customize->add_setting(
        'slider_subtitle_5',
        array(
            'default' => '',
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_subtitle_5',
        array(
            'label' => __( 'Fifth slide subtitle', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 44
        )
    );            

    $wp_customize->add_setting(
        'slider_5_cta_1_label',
        array(
            'default' => __('','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_5_cta_1_label',
        array(
            'label' => __( 'Fifth slide CTA 1 label', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 45
        )
    ); 

    $wp_customize->add_setting(
        'slider_5_cta_1_url',
        array(
            'default' => __('','gtl-multipurpose'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'slider_5_cta_1_url',
        array(
            'label' => __( 'Fifth slide CTA 1 URL', 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'text',
            'priority' => 46
        )
    ); 

    $wp_customize->add_setting(
        'slider_5_cta_1_btn',
        array(
            'default' => __('primary_btn','gtl-multipurpose'),
            'sanitize_callback' => 'gtl_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'slider_5_cta_1_btn',
        array(
            'label' => __( 'Fifth slide CTA 1 Button Type', 'gtl-multipurpose' ),
            'description' => __( 'Style your button from button settings' , 'gtl-multipurpose' ),
            'section' => 'gtl_slider',
            'type' => 'select',
            'priority' => 47,
            'choices' => array(
                        'primary_btn'   => 'Primary Button',
                        'secondary_btn' => 'Secondary Button',
                        'tertiary_btn'  => 'Tertiary Button',
                        'quaternary_btn'=> 'Quaternary Button',
                    )
        )
    );





/**
 *sanitization 
 */

    // banner type
    function gtl_sanitize_banner_type( $input ) {

        $valid = array(
                    'slider-banner'    => __('Full screen slider', 'gtl-multipurpose'),
                    'image-banner'     => __('Image banner', 'gtl-multipurpose'),
                    'video-banner'=> __('Video banner', 'gtl-multipurpose'),
                    'shortcode-banner'        => __('Shortcode', 'gtl-multipurpose'),
                    'no-banner'   => __('No banner (only menu)', 'gtl-multipurpose')
        );
     
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {

            return '';
        }
    }



    // checkboxes
    function gtl_sanitize_checkbox( $input ) {
        if ( $input == 1 ) {

            return 1;

        } else {

            return '';
        }
    }


    // text
    function gtl_sanitize_text( $input ) {

        return wp_kses_post( force_balance_tags( $input ) );
    }

    




    // menu type
    function gtl_sanitize_menu_type( $input ) {

        $valid = array(
                    'sticky-header'    => __('Sticky', 'gtl-multipurpose'),
                    'image-banner'     => __('Image banner', 'gtl-multipurpose'),
                    'absolute-header'  => __('Absolute', 'gtl-multipurpose'),
                    'fixed-header'     => __('Fixed', 'gtl-multipurpose'),
        );
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {

            return '';
        }
    }