<?php
/**
 * GTL Multipurpose Theme Customizer
 *
 * @package GTL_Multipurpose
 */

   

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gtl_multipurpose_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';

	
	$wp_customize->get_section( 'title_tagline' )->title = __('Site name, tagline and logo', 'gtl-multipurpose');
	$wp_customize->get_section( 'header_image' )->title = __('Add media' , 'gtl-multipurpose');
	$wp_customize->get_section( 'title_tagline' )->priority = '5';
	$wp_customize->get_section( 'title_tagline' )->panel = 'gtl_header_panel';
	$wp_customize->get_section( 'header_image' )->panel = 'gtl_banner_panel';
	$wp_customize->get_section( 'colors' )->title = __('General', 'gtl-multipurpose');
    $wp_customize->get_section( 'colors' )->panel = 'gtl_colors_panel';
    $wp_customize->get_section( 'colors' )->priority = '10';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'gtl_multipurpose_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'gtl_multipurpose_customize_partial_blogdescription',
		) );
	}

	 class GTL_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:30px;padding:5px;text-transform:uppercase;">
            <?php echo esc_html( $this->label ); ?>
            </h3>
        <?php
        }
    } 
    require_once trailingslashit( get_template_directory() ) . '/inc/options/layout.php';
    require_once trailingslashit( get_template_directory() ) . '/inc/options/header.php';
	require_once trailingslashit( get_template_directory() ) . '/inc/options/banner.php';
	require_once trailingslashit( get_template_directory() ) . '/inc/options/footer.php';
	require_once trailingslashit( get_template_directory() ) . '/inc/options/fonts.php';
	require_once trailingslashit( get_template_directory() ) . '/inc/options/blog.php';
	require_once trailingslashit( get_template_directory() ) . '/inc/options/sidebar.php';
	require_once trailingslashit( get_template_directory() ) . '/inc/options/color.php';
	require_once trailingslashit( get_template_directory() ) . '/inc/options/button.php';
	

}
add_action( 'customize_register', 'gtl_multipurpose_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function gtl_multipurpose_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function gtl_multipurpose_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gtl_multipurpose_customize_preview_js() {
	wp_enqueue_script( 'gtl-multipurpose-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'gtl_multipurpose_customize_preview_js' );
