<?php
/**
 * OCDI support.
 *
 * @package GTL_Multipurpose
 */

// Disable PT branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * OCDI files.
 *
 * @since 1.0.0
 *
 * @return array Files.
 */
function gtl_multipurpose_ocdi_files() {

	return array(

		array(
			'import_file_name'             => esc_html__( 'Default', 'gtl-multipurpose' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/default/default.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'ocdi/default/default.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/default/default.dat',
			'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/default/default.png',
			),
		
		array(
			'import_file_name'             => esc_html__( 'One Page', 'gtl-multipurpose' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/one-page/one-page.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'ocdi/one-page/one-page.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/one-page/one-page.dat',
			'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/one-page/one-page.png',
			),

		array(
			'import_file_name'             => esc_html__( 'Health', 'gtl-multipurpose' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/health/health.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'ocdi/health/health.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/health/health.dat',
			'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/health/health.png',
			),


		array(
			'import_file_name'             => esc_html__( 'Fitness', 'gtl-multipurpose' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/fitness/fitness.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'ocdi/fitness/fitness.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/fitness/fitness.dat',
			'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/fitness/fitness.png',
			),

		array(
			'import_file_name'             => esc_html__( 'Law Firm', 'gtl-multipurpose' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/law-firm/law-firm.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'ocdi/law-firm/law-firm.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/law-firm/law-firm.dat',
			'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/law-firm/law-firm.png',
			),

		array(
			'import_file_name'             => esc_html__( 'Construction', 'gtl-multipurpose' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/construction/construction.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'ocdi/construction/construction.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/construction/construction.dat',
			'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/construction/construction.png',
			),
		
		);
}

add_filter( 'pt-ocdi/import_files', 'gtl_multipurpose_ocdi_files', 99 );

/**
 * OCDI after import.
 *
 * @since 1.0.0
 */
function gtl_multipurpose_ocdi_after_import() {

	// Assign front page and posts page (blog page).
	$front_page_id = null;
	$blog_page_id  = null;

	$front_page = get_page_by_title( 'Home');

	if ( $front_page ) {
		if ( is_array( $front_page ) ) {
			$first_page = array_shift( $front_page );
			$front_page_id = $first_page->ID;
		} else {
			$front_page_id = $front_page->ID;
		}
	}

	$blog_page = get_page_by_title( 'Blog' );

	if ( $blog_page ) {
		if ( is_array( $blog_page ) ) {
			$first_page = array_shift( $blog_page );
			$blog_page_id = $first_page->ID;
		} else {
			$blog_page_id = $blog_page->ID;
		}
	}

	if ( $front_page_id && $blog_page_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id );
		update_option( 'page_for_posts', $blog_page_id );
	}

	// Assign navigation menu locations.
	$menu_location_details = array(
		'primary-menu'      => 'primary-menu',		
		);

	if ( ! empty( $menu_location_details ) ) {
		$navigation_settings = array();
		$current_navigation_menus = wp_get_nav_menus();
		if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
			foreach ( $current_navigation_menus as $menu ) {
				foreach ( $menu_location_details as $location => $menu_slug ) {
					if ( $menu->slug === $menu_slug ) {
						$navigation_settings[ $location ] = $menu->term_id;
					}
				}
			}
		}

		set_theme_mod( 'nav_menu_locations', $navigation_settings );
	}
}

add_action( 'pt-ocdi/after_import', 'gtl_multipurpose_ocdi_after_import' );
