<?php 
 $front_banner = gtl_multipurpose_front_banner_type();
 $site_banner = gtl_multipurpose_site_banner_type(); 

 if( is_front_page() || is_home()){ 

      if( $front_banner == 'slider-banner' ){

        gtl_multipurpose_banner_slider();

      }else if( $front_banner == 'video-banner' ){

        gtl_multipurpose_banner_video();

      }else if(  $front_banner == 'image-banner' ){

        gtl_multipurpose_banner_image();

      }else if( $front_banner == 'shortcode-banner' ){ 

         echo '<section id="scBanner" class="jr-site-static-banner front-page sc-banner">';
         echo do_shortcode( get_theme_mod( 'front_banner_shortcode' ) );
         echo '</section>';
      }
  
 }else{

      if( $site_banner == 'slider-banner' ){ 

        gtl_multipurpose_banner_slider();

      }
      else if( $site_banner == 'video-banner' ){

        gtl_multipurpose_banner_video();

      }
      else if(  $site_banner == 'image-banner' ){

        gtl_multipurpose_banner_image();
      }
      else if( $site_banner == 'shortcode-banner' ){

        echo '<section id="scBanner"  class="jr-site-static-banner inner-page sc-banner">';
        do_shortcode( get_theme_mod( 'inner_banner_shortcode' ) );
        echo '</section>';

      }
    
 
 }