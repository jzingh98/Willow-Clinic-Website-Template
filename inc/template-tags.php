<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package GTL_Multipurpose
 */

if( ! function_exists( 'gtl_multipurpose_get_font' ) ){
	
	function gtl_multipurpose_get_font(){


		$font = esc_attr( get_theme_mod( 'body_font_name') );
		if( $font ){

			return esc_url('https://fonts.googleapis.com/css?family='.$font);

		}else{

			$font =  'https://fonts.googleapis.com/css?family=Libre+Franklin:100,200,300,400,500,600,700,800,900';

			return esc_url($font);
		}
	}

}

if( ! function_exists( 'gtl_multipurpose_blog_layout' ) ){

	function gtl_multipurpose_blog_layout(){

		$layout = esc_attr( get_theme_mod( 'blog_layout') ); 

		if( $layout ){

			return $layout;

		}else{

			return 'list';
		}
	}

}

if( ! function_exists( 'gtl_multipurpose_team_layout' ) ){

	function gtl_multipurpose_team_layout(){

		$layout = esc_attr( get_theme_mod( 'team_layout') ); 

		if( $layout ){

			return $layout;

		}else{
			
			return 'T_Ar_1';
		}
	}

}



if ( ! function_exists( 'gtl_multipurpose_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function gtl_multipurpose_posted_on() {
		$time_string = '<div class="article-date mr-t-5" datetime="%1$s">
									<span class="month">%2$s</span>
                                   <span class="date">%3$s</span>
                                   <span class="year">%4$s</span>
                                  </div>';
		

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date('M') ),
			esc_html( get_the_date('d') ),
			esc_html( get_the_date('Y') )
			
		);

		echo  sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'gtl-multipurpose' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	}
endif;

if ( ! function_exists( 'gtl_multipurpose_author' ) ) :
	/**
	 * Prints HTML with meta information for the current  author.
	 */
	function gtl_multipurpose_author() {
      $author_string = '<div class="article-author-info flex-box">
                                    <span class="img">%1$s</span>
                                    <span class="infos">
		                                <span class="author-name">%2$s</span>		                                
                            		</span>
                                </div>';
		echo  sprintf( $author_string , get_avatar( get_the_author_meta( 'ID' ) , 30 ) , '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>');
					
	}

endif;

if ( ! function_exists( 'gtl_multipurpose_categories' ) ) :
	/**
	 * Prints HTML with meta information for the current  categories.
	 */
	function gtl_multipurpose_categories() {
      $category_string = '<div class="tags">
	                        <i class="fa fa-tags"></i>
	                        %1$s
                    	</div>';
		$categories = get_the_category();
		$cats = array();
		if( !empty ( $categories ) ){
			foreach( $categories as $cat ):
				$cats[] = '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
			endforeach;
		}
		if( $cats ){
			echo sprintf( $category_string , implode( ' ' , $cats ) );
		}
					
	}
	
endif;






if ( ! function_exists( 'gtl_multipurpose_comment_count' ) ) :
	/**
	 * Prints HTML with meta information for the current  categories.
	 */
	function gtl_multipurpose_comment_count() {
      $info_string = '<div class="comments">
                                  <a href="%1$s">  <i class="fa fa-comment"></i><span>%2$s '.__( 'Comments' , 'gtl-multipurpose' ).'</span></a>
                                </div>';
                                
		echo sprintf( $info_string , get_permalink().'#comments' , wp_count_comments( get_the_ID())->approved );
		
					
	}
	
endif;


if ( ! function_exists( 'gtl_multipurpose_post_excerpt' ) ) :
	/**
	 * Prints excerpt or full content based on setting.
	 */
	function gtl_multipurpose_post_excerpt() {
      if( is_front_page() || is_home()){
                if( esc_attr( get_theme_mod( 'full_content_home' ) ) ){
                    the_content();
                }else{
                    the_excerpt();
                }
             }else{
                if( esc_attr( get_theme_mod( 'full_content_archives' ) ) ){
                    the_content();
                }else{
                    the_excerpt();
                }
             }
		
					
	}
	
endif;


if ( ! function_exists( 'gtl_multipurpose_header_type' ) ) :
	/**
	 *  Returns header type
	 */
	function gtl_multipurpose_header_type() {
		
		if( is_front_page() || is_home()){
			
			return  esc_attr ( get_theme_mod('front_header_type') ). ' ' .esc_attr ( get_theme_mod('front_banner_type') );
		}else{
			return  get_theme_mod('site_header_type').' '.esc_attr ( get_theme_mod('site_banner_type') );
		}		

}
endif;

if ( ! function_exists( 'gtl_multipurpose_header_height' ) ) :
	/**
	 *  Returns header height
	 */
	function gtl_multipurpose_header_height() {
		
		$height = esc_attr( get_theme_mod('header_height') ) ;
		if( $height )
			return $height.'px';
		return '300px';	

}
endif;

if ( ! function_exists( 'gtl_multipurpose_hide_overlay' ) ) :
	/**
	 *  Returns banner overlay
	 */
	function gtl_multipurpose_hide_overlay() {
		
		$hide = esc_attr( get_theme_mod('hide_overlay') ) ;
		if( $hide )
			return 'display:none;';
		return 'display:block;';

}
endif;



if( !function_exists( 'gtl_multipurpose_feat_image')):
	/**
	 *  Returns boolean
	 */
 function gtl_multipurpose_feat_image(){
 	if( has_post_thumbnail() && ! esc_attr( get_theme_mod( 'hide_index_feat_image' ) ) ){
   		return true; 
	}else{
	    return false;
	}
 }

endif;

if( !function_exists( 'gtl_multipurpose_single_feat_image')):
	/**
	 *  Returns boolean
	 */
 function gtl_multipurpose_single_feat_image(){
 	if( has_post_thumbnail() && ! esc_attr( get_theme_mod( 'hide_single_feat_image' ) ) ){
   		return true; 
	}else{
	    return false;
	}
 }

endif;


if ( ! function_exists( 'gtl_multipurpose_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function gtl_multipurpose_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'gtl-multipurpose' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'gtl-multipurpose' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'gtl-multipurpose' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'gtl-multipurpose' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'gtl-multipurpose' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'gtl-multipurpose' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/************ customizer options **************/
// layout settings
if( ! function_exists( 'gtl_multipurpose_body_site_layout' ) ):
	/**
	 *  Returns header site layout
	 */
	function gtl_multipurpose_body_site_layout(){
		$layout = esc_attr( get_theme_mod('site_layout_type') );
		if( $layout )
			return $layout;
		return 'full-width-layout';
	}
endif;


// container settings
if( ! function_exists( 'gtl_multipurpose_site_container' ) ):
	/**
	 *  Returns header site layout
	 */
	function gtl_multipurpose_site_container(){
		$layout = esc_attr( get_theme_mod('site_container_type') );
		if( $layout )
			return $layout;
		return 'container-large';
	}
endif;

//header
if ( ! function_exists( 'gtl_multipurpose_header_class' ) ) :
	/**
	 *  Returns header class
	 */
	function gtl_multipurpose_header_class() {
		
		$layout_type =  esc_attr( get_theme_mod('site_layout_type') );
		$menu_type  =  esc_attr( get_theme_mod('menu_type') ); 
		if( ! $layout_type ){
			$layout_type = 'full-width-layout';
		}
		if ( ! $menu_type ){

			echo 'sticky-header';

		}else  if( $layout_type != 'left-header-layout' && $layout_type != 'right-header-layout' ){

			echo $menu_type.' '.esc_attr( get_theme_mod('menu_display') );

		}
				

}
endif;

//banner
if( !function_exists( 'gtl_multipurpose_front_banner_type' ) ):
	/**
	 *  Returns front page banner type
	 */
	function gtl_multipurpose_front_banner_type(){
		$banner = esc_attr( get_theme_mod('front_banner_type') );
		if( $banner )
			return $banner;
		return "slider-banner";
	}
endif;

if( !function_exists( 'gtl_multipurpose_site_banner_type' ) ):
	/**
	 *  Returns inner page banner type
	 */
	function gtl_multipurpose_site_banner_type(){
		$banner = esc_attr( get_theme_mod('site_banner_type') ); 
		if( $banner ){
			return $banner;
		}
		return "image-banner";
	}
endif;


if( !function_exists( 'gtl_multipurpose_slider_speed' ) ):
	/**
	 *  Returns slider speed in milliseconds
	 */
	function gtl_multipurpose_slider_speed(){
		$speed = (int)esc_attr( get_theme_mod('slider_speed') ); 
		if( ! $speed ){
			return '3000';
		}
		if( $speed  >=  0   ){
			return $speed;
		}
		return '3000';
	}
endif;

if( !function_exists( 'gtl_multipurpose_slider_animation_speed' ) ):
	/**
	 *  Returns slider animation speed in milliseconds
	 */
	function gtl_multipurpose_slider_animation_speed(){
		$speed = esc_attr( get_theme_mod('animation_speed') ); 
		if( $speed ){
			return $speed;
		}
		return "1000";
	}
endif;

if( !function_exists( 'gtl_multipurpose_slider_caption_align' ) ):
	/**
	 *  Returns slider caption alignment
	 */
	function gtl_multipurpose_slider_caption_align(){
		$align = esc_attr( get_theme_mod( 'caption_align' ) ); 
		if( $align ){
			
			return $align;
		}
		return "center";
	}
endif;


//sidebar 
if( !function_exists( 'gtl_multipurpose_post_archive_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for posts archive
	 */
	function gtl_multipurpose_post_archive_sidebar_pos( ){

		$pos = esc_attr( get_theme_mod(  'post_arhive_sidebar_pos' ) );
		if( ! $pos ){
			return 'right';
		}else if( $pos == 'none' ){
			return false;
		}else{
			return $pos;
		}
	}
endif;

if( !function_exists( 'gtl_multipurpose_post_single_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for posts single
	 */
	function gtl_multipurpose_post_single_sidebar_pos(){

		$pos = esc_attr( get_theme_mod(  'post_single_sidebar_type' ) );
		if( ! $pos ){
			return 'right';
		}else if( $pos == 'none' ){
			return false;
		}else{
			return $pos;
		}
	}
endif;

if( !function_exists( 'gtl_multipurpose_page_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for page
	 */
	function gtl_multipurpose_page_sidebar_pos( ){
        
        $pos = get_post_meta( get_the_ID() , 'gtl-sidebar-pos' , true ); 
        if( $pos == 'none' && 'page' == get_post_type() ){

        	return false;

        }else if ( ! $pos ){

        	$pos = esc_attr( get_theme_mod(  'page_sidebar_pos' ) ); 

			if( ! $pos ){

				return 'right';

			}else if( $pos == 'none' ){

				return false;

			}else{

				return $pos;
			}

        }else{

        	return $pos;
        }
		
	}
endif;


if( !function_exists( 'gtl_multipurpose_services_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for services archive/single
	 */
	function gtl_multipurpose_services_sidebar_pos( ){

		$pos = esc_attr( get_theme_mod(  'service_sidebar_pos' ) );
		if( ! $pos ){
			return 'right';
		}else if( $pos == 'none' ){
			return false;
		}else{
			return $pos;
		}
	}
endif;

if( !function_exists( 'gtl_multipurpose_team_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for team archive/single
	 */
	function gtl_multipurpose_team_sidebar_pos( ){

		$pos = esc_attr( get_theme_mod(  'team_sidebar_pos' ) );
		if( ! $pos ){
			return 'right';
		}else if( $pos == 'none' ){
			return false;
		}else{
			return $pos;
		}
	}
endif;

if( !function_exists( 'gtl_multipurpose_testimonials_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for testimonials archive/single
	 */
	function gtl_multipurpose_testimonials_sidebar_pos( ){

		$pos = esc_attr( get_theme_mod(  'testimonial_sidebar_pos' ) );
		if( ! $pos ){
			return 'right';
		}else if( $pos == 'none' ){
			return false;
		}else{
			return $pos;
		}
	}
endif;


if( !function_exists( 'gtl_multipurpose_shop_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for shop archive/single
	 */
	function gtl_multipurpose_shop_sidebar_pos(){ 
		
		if ( class_exists( 'WooCommerce' ) ) { 
			if( is_shop() ){
				$pid = wc_get_page_id('shop');
			}else if( is_cart() ){
				$pid = wc_get_page_id('cart');
			}else if( is_checkout() ){
				$pid = wc_get_page_id('checkout');
			}

			$pos = get_post_meta( $pid , 'gtl-sidebar-pos' , true); 
			if( $pos == 'left' || $pos == 'right' ){

				return $pos;

			}else if( $pos == 'none' ){

				return false;
			}
		}

		$pos = esc_attr( get_theme_mod(  'shop_sidebar_pos' ) );
		if( ! $pos ){
			return 'right';
		}else if( $pos == 'none' ){
			return false;
		}else{
			return $pos;
		}
	}
endif;

if( !function_exists( 'gtl_multipurpose_get_sidebar_id' ) ):
	/**
	 *  Returns sidebar id for page/posts archive/single
	 */
	function gtl_multipurpose_get_sidebar_id(){

		$post_type = get_post_type();
		$sid_c = 'gtl-blog-sidebar'; 
		if( 'post' == $post_type ){ 

			$sid =  esc_attr( get_theme_mod( 'post_sidebar_id' ) );
			if( $sid ){
				$sid_c = $sid;
			}

		}else if( 'page' == $post_type ){ 
			
			$sid_pos = get_post_meta( get_the_ID() , 'gtl-sidebar-pos' , true );  
				
			if ( $sid_pos == 'none' ){

				return false;

			}else if (! $sid_pos ){ 

				$sid = esc_attr( get_theme_mod( 'gtl-sidebar-id' ) );

				if( $sid ){

					$sid_c = $sid;
				}

			}else{ 

				$sid = get_post_meta( get_the_ID() , 'gtl-sidebar-id' , true );
				if( $sid ){ 

					$sid_c = $sid;
				}

			}	

		}
		return $sid_c;
	}
endif;




//fonts
if( !function_exists( 'gtl_multipurpose_body_font_family' ) ):
	function gtl_multipurpose_body_font_family(){
		 /**
		 *  Returns body font family
		 */
		$body_font_family =  esc_attr( get_theme_mod('body_font_family') );
		if( $body_font_family ){

			return $body_font_family;
		}
		$body_font_family = "Libre Franklin";

		return esc_attr($body_font_family);
	}
endif;

if( !function_exists( 'gtl_multipurpose_body_font_size' ) ):
	/**
	 *  Returns body font size
	 */
	function gtl_multipurpose_body_font_size(){
		$body_font_size = esc_attr( get_theme_mod('body_size') );
		if( $body_font_size )
			return $body_font_size.'px';
		return "14px";
	}
endif;

if( !function_exists( 'gtl_multipurpose_body_text_color' ) ):
	/**
	 *  Returns body text color
	 */
	function gtl_multipurpose_body_text_color(){
		$body_text_color = esc_attr( get_theme_mod('body_text_color') );
		if( $body_text_color )
			return $body_text_color;
		return "#353535";
	}

endif;


if( !function_exists( 'gtl_multipurpose_site_title_font_size' ) ):
	/**
	 *  Returns site title font size
	 */
	function gtl_multipurpose_site_title_font_size(){
		$title_font_size = esc_attr( get_theme_mod('site_title_size') );
		if( $title_font_size )
			return $title_font_size.'px';
		return "32px";
	}

endif;

if( !function_exists( 'gtl_multipurpose_site_desc_font_size' ) ):
	/**
	 *  Returns site description font size
	 */
	function gtl_multipurpose_site_desc_font_size(){
		$desc_font_size = esc_attr( get_theme_mod('site_desc_size') );
		if( $desc_font_size )
			return $desc_font_size.'px';
		return "14px";
	}

endif;

if( !function_exists( 'gtl_multipurpose_main_menu_font_size' ) ):
	/**
	 *  Returns main menu font size
	 */
	function gtl_multipurpose_main_menu_font_size(){
		$menu_font_size = esc_attr( get_theme_mod('menu_size') );
		if( $menu_font_size )
			return $menu_font_size.'px';
		return "14px";
	}

endif;


if( !function_exists( 'gtl_multipurpose_h1_font_size' ) ):
	/**
	 *  Returns h1 font size
	 */
	function gtl_multipurpose_h1_font_size(){
		$h1_font_size = esc_attr( get_theme_mod('h1_size') );
		if( $h1_font_size )
			return $h1_font_size.'px';
		return "60px";
	}

endif;

if( !function_exists( 'gtl_multipurpose_h2_font_size' ) ):
	/**
	 *  Returns h1 font size
	 */
	function gtl_multipurpose_h2_font_size(){
		$h2_font_size = esc_attr( get_theme_mod('h2_size') );
		if( $h2_font_size )
			return $h2_font_size.'px';
		return "46px";
	}

endif;

if( !function_exists( 'gtl_multipurpose_h3_font_size' ) ):
	/**
	 *  Returns h3 font size
	 */
	function gtl_multipurpose_h3_font_size(){
		$h3_font_size = esc_attr( get_theme_mod('h3_size') );
		if( $h3_font_size )
			return $h3_font_size.'px';
		return "26px";
	}

endif;

if( !function_exists( 'gtl_multipurpose_h4_font_size' ) ):
	/**
	 *  Returns h4 font size
	 */
	function gtl_multipurpose_h4_font_size(){
		$h4_font_size = esc_attr( get_theme_mod('h4_size') );
		if( $h4_font_size )
			return $h4_font_size.'px';
		return "20px";
	}
endif;

if( !function_exists( 'gtl_multipurpose_h5_font_size' ) ):
	/**
	 *  Returns h5 font size
	 */
	function gtl_multipurpose_h5_font_size(){
		$h5_font_size = esc_attr( get_theme_mod('h5_size') );
		if( $h5_font_size )
			return $h5_font_size.'px';
		return "16px";
	}

endif;


if( !function_exists( 'gtl_multipurpose_h6_font_size' ) ):
	/**
	 *  Returns h6 font size
	 */
	function gtl_multipurpose_h6_font_size(){
		$h6_font_size = esc_attr( get_theme_mod('h6_size') );
		if( $h6_font_size )
			return $h6_font_size.'px';
		return "12px";
	}

endif;


if( !function_exists( 'gtl_multipurpose_header_bg_color' ) ):
	/**
	 *  Returns header background color
	 */
	function gtl_multipurpose_header_bg_color(){
		$bg = esc_attr( get_theme_mod('menu_bg_color') );
		if( $bg )
			return $bg;
		return "#1f2024";
	}

endif;


if( !function_exists( 'gtl_multipurpose_menu_color' ) ):
	/**
	 *  Returns header menu item color
	 */
	function gtl_multipurpose_menu_color(){
		$color = esc_attr( get_theme_mod('top_items_color') );
		if( $color )
			return $color;
		return "#fff";
	}

endif;


if( !function_exists( 'gtl_multipurpose_menu_hover_color' ) ):
	/**
	 *  Returns header menu hover color
	 */
	function gtl_multipurpose_menu_hover_color(){
		$color = esc_attr( get_theme_mod('menu_items_hover') );
		if( $color )
			return $color;
		return "#fff";
	}

endif;


if( !function_exists( 'gtl_multipurpose_sub_menu_color' ) ):
	/**
	 *  Returns submenu item color
	 */
	function gtl_multipurpose_sub_menu_color(){
		$color = esc_attr( get_theme_mod('submenu_items_color') );
		if( $color )
			return $color;
		return "rgba(0,0,0,0.6)";
	}

endif;


if( !function_exists( 'gtl_multipurpose_sub_menu_bg' ) ):
	/**
	 *  Returns submenu background color
	 */
	function gtl_multipurpose_sub_menu_bg(){
		$color = esc_attr( get_theme_mod('submenu_background') );
		if( $color )
			return $color;
		return "#fff";
	}

endif;


if( !function_exists( 'gtl_multipurpose_slider_text_color' ) ):
	/**
	 *  Returns slider text color
	 */
	function gtl_multipurpose_slider_text_color(){
		$color = esc_attr( get_theme_mod('slider_text') );
		if( $color )
			return $color;
		return "#fff";
	}

endif;


if( !function_exists( 'gtl_multipurpose_slider_cta_color' ) ):
	/**
	 *  Returns slider cta color
	 */
	function gtl_multipurpose_slider_cta_color(){
		$color = esc_attr( get_theme_mod('slider_cta_label') );
		if( $color )
			return $color;
		return "#fff";
	}
endif;


if( !function_exists( 'gtl_multipurpose_slider_cta_bg_color' ) ):
	/**
	 *  Returns slider cta background color
	 */
	function gtl_multipurpose_slider_cta_bg_color(){
		$color = esc_attr( get_theme_mod('slider_cta_bg') );
		if( $color )
			return $color;
		return "#df3d8c";
	}

endif;

if( !function_exists( 'gtl_multipurpose_sidebar_bg_color' ) ):
	/**
	 *  Returns sidebar background color
	 */
	function gtl_multipurpose_sidebar_bg_color(){
		$color = esc_attr( get_theme_mod('sidebar_background') );
		if( $color )
			return $color;
		return "rgba(0,0,0,0)";
	}

endif;


if( !function_exists( 'gtl_multipurpose_sidebar_color' ) ):
	/**
	 *  Returns sidebar color
	 */
	function gtl_multipurpose_sidebar_color(){
		$color = esc_attr( get_theme_mod('sidebar_color') );
		if( $color )
			return $color;
		return "#353535";
	}

endif;


if( !function_exists( 'gtl_multipurpose_footer_bg_color' ) ):
	/**
	 *  Returns header footer background color
	 */
	function gtl_multipurpose_footer_bg_color(){
		$color = esc_attr( get_theme_mod('footer_background') );
		if( $color )
			return $color;
		return "#1f2024";
	}

endif;

if( !function_exists( 'gtl_multipurpose_copyright_text' ) ):
	/**
	 *  Returns copyright text
	 */
	function gtl_multipurpose_copyright_text(){
		$text = esc_attr( get_theme_mod('footer_copyright', __( 'Copyright Greenturtlelab. All rights reserved.' , 'gtl-multipurpose') ) );
		if( $text )
			return $text;
		
	}

endif;

if( !function_exists( 'gtl_multipurpose_copyright_bg_color' ) ):
	/**
	 *  Returns copyright background color
	 */
	function gtl_multipurpose_copyright_bg_color(){
		$color = esc_attr( get_theme_mod('copyright_bg_color') );
		if( $color )
			return $color;
		return "#3d3d3d";
	}

endif;

if( !function_exists( 'gtl_multipurpose_copyright_color' ) ):
	/**
	 *  Returns copyright color
	 */
	function gtl_multipurpose_copyright_color(){
		$color = esc_attr( get_theme_mod('copyright_color') );
		if( $color )
			return $color;
		return "#efefef";
	}

endif;


if( !function_exists( 'gtl_multipurpose_footer_color' ) ):
	/**
	 *  Returns footer color
	 */
	function gtl_multipurpose_footer_color(){
		$color = esc_attr( get_theme_mod('footer_color') );
		if( $color )
			return $color;
		return "#fff";
	}

endif;


if( !function_exists( 'gtl_multipurpose_footer_widget_bg_color' ) ):
	/**
	 *  Returns footer widget area background color
	 */
	function gtl_multipurpose_footer_widget_bg_color(){
		$color = esc_attr( get_theme_mod('footer_widgets_background') );
		if( $color )
			return $color;
		return "#1f2024";
	}

endif;


if( !function_exists( 'gtl_multipurpose_footer_widget_color' ) ):
	/**
	 *  Returns footer widget area color
	 */
	function gtl_multipurpose_footer_widget_color(){
		$color = esc_attr( get_theme_mod('footer_widgets_color') );
		if( $color )
			return $color;
		return "rgba(255,255,255,0.4)";
	}

endif;


if( !function_exists( 'gtl_multipurpose_single_post_font_size' ) ):
	/**
	 *  Returns single post font size
	 */
	function gtl_multipurpose_single_post_font_size(){
		$size = esc_attr( get_theme_mod('single_post_title_size') );
		if( $size )
			return $size.'px';
		return "34px";
	}
	
endif;


//Pro features
function gtl_multipurpose_post_type_category( $post_type  ){
	$object = get_post_type_object( $post_type );
	if( ! empty( $object->taxonomies ) ){
		return get_terms( array( 'post_type' =>  $post_type , 'taxonomy'=> 'category' ) );
	}
	return false;
}

function gtl_multipurpose_post_type_taxonomy( $post_type , $taxonomy ){
	$tax  = get_terms(array( 'post_type' =>  $post_type , 'taxonomy'=> $taxonomy ) );
	if( ! is_wp_error( $tax ) && !empty( $tax )) {
				return $tax;
			}
	return false;
}

function gtl_multipurpose_post_type_category_css_class( $post_id , $taxonomy ){
  $arr = array(); 
  $terms =  wp_get_post_terms( $post_id , $taxonomy ); 
  if( ! empty( $terms ) && ! is_wp_error( $terms ) ){
  	foreach( $terms as $term){
  		$arr[] = $term->slug;
  	}
  }
  return implode( ' ' , $arr );
}


// button settings
function gtl_multipurpose_primary_button_style(){

	$line_height 	= esc_attr( get_theme_mod( 'line_height' ) );
	$border_color 	= esc_attr( get_theme_mod( 'border_color' ) );
	$border_radius 	= esc_attr( get_theme_mod( 'border_radius' ) );
	$bg_color 		= esc_attr( get_theme_mod( 'bg_color' ) );
	$bg_hover_color = esc_attr( get_theme_mod( 'bg_hover_color' ) );
	$label_color 	= esc_attr( get_theme_mod( 'label_color' ) );
	$label_hover_color  = esc_attr( get_theme_mod( 'label_hover_color' ) );
	$border_width 		= esc_attr( get_theme_mod( 'border_width' ) );
	$font_size 		    = esc_attr( get_theme_mod( 'label_font_size' ) );
	$padding 		    = esc_attr( get_theme_mod( 'padding' ) );

	$style = '.primary_btn, .woocommerce a.button{';

	// general
	if( $line_height ){

		$style .= 'line-height: '.$line_height . 'px;' ;
	}

	if( $border_color ){

		$style .= 'border-color: '.$border_color . ';' ;
	}

	if( $border_width ){

		$style .= 'border-width: '.$border_width . 'px;' ;
	}
	
	if( $border_radius ){

		$style .= 'border-radius: '.$border_radius . 'px;' ;
	}

	if( $bg_color ){

		$style .= 'background-color: '.$bg_color . ';' ;
	}else{
		$style .= 'background-color: inherit;' ;
	}

	if( $label_color ){

		$style .= 'color: '.$label_color . ';' ;
	}

	if( $font_size ){

		$style .= 'font-size: '.$font_size . 'px;' ;
	}

	if( $padding ){

		$style .= 'padding: 0 '.$padding.'px';
	}

	$style .= '}';

	// hover
	$style .= '.primary_btn:hover ,  .woocommerce a.button:hover{';

	$style .= 'text-decoration:none;';

	if( $bg_hover_color ){

		$style .= 'background-color: '.$bg_hover_color . ';' ;
	}

	if( $label_hover_color ){

		$style .= 'color: '.$label_hover_color . ' !important;' ;
	}

	$style .= '}';

	echo $style;
		
}

function gtl_multipurpose_secondary_button_style(){

	$line_height 	= esc_attr( get_theme_mod( 's_line_height' ) );
	$border_color 	= esc_attr( get_theme_mod( 's_border_color' ) );
	$border_radius 	= esc_attr( get_theme_mod( 's_border_radius' ) );
	$bg_color 		= esc_attr( get_theme_mod( 's_bg_color' ) );
	$bg_hover_color = esc_attr( get_theme_mod( 's_bg_hover_color' ) );
	$label_color 	= esc_attr( get_theme_mod( 's_label_color' ) );
	$label_hover_color = esc_attr( get_theme_mod( 's_label_hover_color' ) );
	$border_width 		= esc_attr( get_theme_mod( 's_border_width' ) );
	$font_size 		    = esc_attr( get_theme_mod( 's_label_font_size' ) );
	$padding 		   = esc_attr( get_theme_mod( 's_padding' ) );

	$style = '.secondary_btn{';

	// general
	if( $line_height ){

		$style .= 'line-height: '.$line_height . 'px;' ;
	}

	if( $border_color ){

		$style .= 'border-color: '.$border_color . ';' ;
	}

	if( $border_width ){

		$style .= 'border-width: '.$border_width . 'px;' ;
	}
	
	if( $border_radius ){

		$style .= 'border-radius: '.$border_radius . 'px;' ;
	}

	if( $bg_color ){

		$style .= 'background-color: '.$bg_color . ';' ;
	}

	if( $label_color ){

		$style .= 'color: '.$label_color . ';' ;
	}

	if( $font_size ){

		$style .= 'font-size: '.$font_size . 'px;' ;
	}


	if( $padding ){

		$style .= 'padding: 0 '.$padding.'px';
	}

	$style .= '}';

	// hover
	$style .= '.secondary_btn:hover{';

	$style .= 'text-decoration:none;';

	if( $bg_hover_color ){

		$style .= 'background-color: '.$bg_hover_color . ';' ;
	}

	if( $label_hover_color ){

		$style .= 'color: '.$label_hover_color . ';' ;
	}

	$style .= '}';

	echo $style;
		
}

function gtl_multipurpose_tertiary_button_style(){

	$line_height 	= esc_attr( get_theme_mod( 't_line_height' ) );
	$border_color 	= esc_attr( get_theme_mod( 't_border_color' ) );
	$border_radius 	= esc_attr( get_theme_mod( 't_border_radius' ) );
	$bg_color 		= esc_attr( get_theme_mod( 't_bg_color' ) );
	$bg_hover_color = esc_attr( get_theme_mod( 't_bg_hover_color' ) );
	$label_color 	= esc_attr( get_theme_mod( 't_label_color' ) );
	$label_hover_color = esc_attr( get_theme_mod( 't_label_hover_color' ) );
	$border_width 		= esc_attr( get_theme_mod( 't_border_width' ) );
	$font_size 		    = esc_attr( get_theme_mod( 't_label_font_size' ) );
	$padding 		   = esc_attr( get_theme_mod( 't_padding' ) );

	$style = '.tertiary_btn{';

	// general
	if( $line_height ){

		$style .= 'line-height: '.$line_height . 'px;' ;
	}

	if( $border_color ){

		$style .= 'border-color: '.$border_color . ';' ;
	}

	if( $border_width ){

		$style .= 'border-width: '.$border_width . 'px;' ;
	}
	
	if( $border_radius ){

		$style .= 'border-radius: '.$border_radius . 'px;' ;
	}

	if( $bg_color ){

		$style .= 'background-color: '.$bg_color . ';' ;
	}

	if( $label_color ){

		$style .= 'color: '.$label_color . ';' ;
	}

	if( $font_size ){

		$style .= 'font-size: '.$font_size . 'px;' ;
	}


	if( $padding ){

		$style .= 'padding: 0 '.$padding.'px';
	}

	$style .= '}';

	// hover
	$style .= '.tertiary_btn:hover{';

	$style .= 'text-decoration:none;';

	if( $bg_hover_color ){

		$style .= 'background-color: '.$bg_hover_color . ';' ;
	}

	if( $label_hover_color ){

		$style .= 'color: '.$label_hover_color . ';' ;
	}

	$style .= '}';

	echo $style;
		
}

function gtl_multipurpose_quaternary_button_style(){

	$line_height 	= esc_attr( get_theme_mod( 'q_line_height' ) );
	$border_color 	= esc_attr( get_theme_mod( 'q_border_color' ) );
	$border_radius 	= esc_attr( get_theme_mod( 'q_border_radius' ) );
	$bg_color 		= esc_attr( get_theme_mod( 'q_bg_color' ) );
	$bg_hover_color = esc_attr( get_theme_mod( 'q_bg_hover_color' ) );
	$label_color 	= esc_attr( get_theme_mod( 'q_label_color' ) );
	$label_hover_color = esc_attr( get_theme_mod( 'q_label_hover_color' ) );
	$border_width 	   = esc_attr( get_theme_mod( 'q_border_width' ) );
	$font_size 		   = esc_attr( get_theme_mod( 'q_label_font_size' ) );
	$padding 		   = esc_attr( get_theme_mod( 'q_padding' ) );

	$style = '.quaternary_btn{';

	// general
	if( $line_height ){

		$style .= 'line-height: '.$line_height . 'px;' ;
	}

	if( $border_color ){

		$style .= 'border-color: '.$border_color . ';' ;
	}

	if( $border_width ){

		$style .= 'border-width: '.$border_width . 'px;' ;
	}
	
	if( $border_radius ){

		$style .= 'border-radius: '.$border_radius . 'px;' ;
	}

	if( $bg_color ){

		$style .= 'background-color: '.$bg_color . ';' ;
	}

	if( $label_color ){

		$style .= 'color: '.$label_color . ';' ;
	}

	if( $font_size ){

		$style .= 'font-size: '.$font_size . 'px;' ;
	}


	if( $padding ){

		$style .= 'padding: 0 '.$padding.'px';
	}

	$style .= '}';

	// hover
	$style .= '.quaternary_btn:hover{';

	$style .= 'text-decoration:none;';

	if( $bg_hover_color ){

		$style .= 'background-color: '.$bg_hover_color . ';' ;
	}

	if( $label_hover_color ){

		$style .= 'color: '.$label_hover_color . ';' ;
	}

	$style .= '}';

	echo $style;
		
}


/*----------------------------------Theme Color  setting ----------------*/

if( !function_exists( 'gtl_multipurpose_theme_primary_color' ) ):
	/**
	 *  Returns theme primary color
	 */
	function gtl_multipurpose_theme_primary_color(){
		$theme_primary_color = esc_attr( get_theme_mod('theme_primary_color') );
		if( $theme_primary_color )
			return $theme_primary_color;
		return "#df3d8c";
	}

endif;


if( !function_exists( 'gtl_multipurpose_theme_secondary_color' ) ):
	/**
	 *  Returns theme primary color
	 */
	function gtl_multipurpose_theme_secondary_color(){
		$theme_secondary_color = esc_attr( get_theme_mod('theme_secondary_color') );
		if( $theme_secondary_color )
			return $theme_secondary_color;
		return "#0275d8";
	}

endif;


/*----------------------------- Blog settings _________________*/
if( !function_exists( 'gtl_multipurpose_blog_read_more_label' ) ):

	/**
	 *  Returns blog read more button label
	 */
	function gtl_multipurpose_blog_read_more_label(){
		$read_more = esc_attr( get_theme_mod('read_more_button_label') );
		if( $read_more )
			return $read_more;
		return __( 'Read More' , 'gtl-multipurpose' );
	}

endif;

if( !function_exists( 'gtl_multipurpose_blog_read_more_btn' ) ):
	
	/**
	 *  Returns blog read more button type
	 */
	function gtl_multipurpose_blog_read_more_btn(){
		$read_more_btn = esc_attr( get_theme_mod('read_more_button_type') );
		if( $read_more_btn )
			return $read_more_btn;
		return 'primary_btn';
	}

endif;

if( ! function_exists( 'gtl_multipurpose_process_timeline_date') ):
function gtl_multipurpose_process_timeline_date( $date ){

	$date = trim( $date );
	$dateArr = explode( '-' ,  $date );
	if( count( $dateArr) == 3 ){
		return  gmdate('d M, Y', strtotime( $date ) );
	}else if ( count( $dateArr ) == 2  ){
		$date  = $date .'-01';
		return  gmdate('M, Y', strtotime( $date ) );
	}else {
		return $date;
	}

}

endif;