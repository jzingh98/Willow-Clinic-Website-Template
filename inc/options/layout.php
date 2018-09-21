<?php 
/* GTL Multipurpose Customizer Options */


       
//___Header area___//
    $wp_customize->add_panel( 'gtl_site_layout_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Layout Setting', 'gtl-multipurpose'),
    ) );
    //___Header type___//
    $wp_customize->add_section(
        'gtl_layout_type',
        array(
            'title'         => __('Layout type', 'gtl-multipurpose'),
            'priority'      => 10,
            'panel'         => 'gtl_site_layout_panel', 
        )
    );
    //Front page
    $wp_customize->add_setting(
        'site_layout_type',
        array(
            'default'           => 'full-width-layout',
            'sanitize_callback' => 'gtl_sanitize_site_layout',
        )
    );
    $wp_customize->add_control(
        'site_layout_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site layout', 'gtl-multipurpose'),
            'section'     => 'gtl_layout_type',
            'description' => __('Select the layout type for your website', 'gtl-multipurpose'),
            'choices' => array(
                'full-width-layout'    => __('Full Width', 'gtl-multipurpose'),
                'box-layout'     => __('Boxed', 'gtl-multipurpose'),
               
            ),
        )
    );

    //Front page
    $wp_customize->add_setting(
        'site_container_type',
        array(
            'default'           => 'container-large',
            'sanitize_callback' => 'gtl_sanitize_site_container',
        )
    );
    $wp_customize->add_control(
        'site_container_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site Container', 'gtl-multipurpose'),
            'section'     => 'gtl_layout_type',
            'description' => __('Select the container type for your website', 'gtl-multipurpose'),
            'choices' => array(
                'container-large'    => __('Large', 'gtl-multipurpose'),
                'container-medium'     => __('Medium', 'gtl-multipurpose'),
                 'container-small'     => __('Small', 'gtl-multipurpose'),
                  'container-fluid'     => __('Fullwidth/Fluid', 'gtl-multipurpose'),
                   
               
            ),
        )
    );
   

/******************** sanitization ***************************/

//site layout
function gtl_sanitize_site_layout( $input ) {
    $valid = array(
        'full-width-layout'    => __('Full Width', 'gtl-multipurpose'),
                'box-layout'     => __('Boxed', 'gtl-multipurpose'),
                'left-header-layout'     => __('Left Menu', 'gtl-multipurpose'),
                'right-header-layout'     => __('Right Menu', 'gtl-multipurpose'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function gtl_sanitize_site_container( $input ) {
    $valid = array(
                'container-large'    => __('Large', 'gtl-multipurpose'),
                'container-medium'     => __('Medium', 'gtl-multipurpose'),
                 'container-small'     => __('Small', 'gtl-multipurpose'),
                  'container-fluid'     => __('Fullwidth/Fluid', 'gtl-multipurpose'),
                   
               
            );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

