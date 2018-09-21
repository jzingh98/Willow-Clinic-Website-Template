<?php
if( ! function_exists( 'gtl_multipurpose_banner_slider' ) ):
	function gtl_multipurpose_banner_slider(){
		$slides = gtl_multipurpose_slider_data();
?>
		<div class="banner-slider-wrap relative">
		<div class="flexslider top_slider" data-speed="<?php echo gtl_multipurpose_slider_speed();?>" data-animation="<?php echo gtl_multipurpose_slider_animation_speed();?>">
			<ul class="slides">
				    <?php 
					  foreach( $slides as $slide):
					  	if( $slide['image']):
					  ?>
						<li class="slide1" style="background-image: url('<?php echo $slide['image']; ?>');background-position:center;">
						<div class="<?php echo gtl_multipurpose_site_container();?>  banner-caption">
						<div class="flex_caption1 <?php echo gtl_multipurpose_slider_caption_align();?>">
						  <?php echo apply_filters('gtl_multipurpose_slide_title', $slide['title'] , $slide['control'] );?>
						  <?php echo apply_filters('gtl_multipurpose_slide_subtitle', $slide['subtitle'] , $slide['control']);?>						
						  <?php 
							  $scroll_class = '';
							  if( ! empty( $slide['label1'] ) ):

							  		if( strpos( $slide['url1'] , '#' ) === 0 ){

										$scroll_class = 'do-scrol';
									}
						  	?>
								<a href="<?php echo $slide['url1'];?>" class="deafBtn <?php echo $slide['btn1'].' '.$scroll_class; ?>"><?php echo $slide['label1']; ?></a>
						  
						  <?php endif;?>

						  <?php 
							 
							  if( ! empty( $slide['label2'] ) ):

							  		if( strpos( $slide['url2'] , '#' ) === 0 ){

										$scroll_class = 'do-scrol';
									}
						  	?>
								<a href="<?php echo $slide['url2'];?>" class="deafBtn <?php echo $slide['btn2'].' '.$scroll_class; ?>"><?php echo $slide['label2']; ?></a>
						  
						  <?php endif;?>

						</div>
						</div> 
						</li>
					 <?php 
					 endif;
				 endforeach; 
				 ?>
				</ul>
				 
			</div>
			<?php if( ! esc_attr( get_theme_mod('hide_overlay') ) ):?>
			        <div class="banner-overlay"></div>
		    <?php endif; ?>
			</div>
			
<?php
	}
endif;


if( ! function_exists( 'gtl_multipurpose_banner_image' ) ):

	function gtl_multipurpose_banner_image(){
		?>
		<section id="staticBanner" class="jr-site-static-banner front-page header_height">
		   <?php if( esc_attr( get_theme_mod('header_image') ) ){
			the_header_image_tag();
		   	?>
		    <?php }else{?>
				<img src="<?php echo get_template_directory_uri().'/assets/images/slider1.jpg';?>">
		    <?php } ?>
		   <?php if( ! esc_attr( get_theme_mod('hide_overlay') ) ):?>
		        <div class="banner-overlay">
		        </div>
		    <?php endif; ?>
		    </section>
		<?php
	} 

endif;



if( ! function_exists( 'gtl_multipurpose_banner_video' ) ):
	function gtl_multipurpose_banner_video(){
?>
<section id="staticBanner" class="jr-site-static-banner front-page video-banner">
	<?php if( esc_attr ( get_theme_mod('external_header_video') ) ){?>
	<?php 
	echo wp_oembed_get( esc_attr( get_theme_mod('external_header_video') ) , array( 'banner' => 1 ) );
	?>

	<?php }else{?>

	<?php if(get_header_video_url()){?>
		<video controls='false' autoplay muted loop>
			<source src="<?php echo  get_header_video_url();?>" type="video/mp4">
				<?php _e('Your browser does not support the video tag.' , 'gtl-multipurpose')?>
		</video>

		<?php }else{ ?>

		<p class="alert alert-danger">
		<?php _e('Please upload banner video. Go to: Customize > Banner Setting > Add Media' , 'gtl-multipurpose' );?>
		</p>
		<?php } ?>

		<?php } ?>

		<?php if( ! esc_attr( get_theme_mod('hide_overlay') ) ):?>
			<div class="banner-overlay">
			</div>
		<?php endif; ?>
	</section>
<?php
	}

endif;


if( ! function_exists('gtl_multipurpose_slider_data') ):
	
	function gtl_multipurpose_slider_data(){

		$slide1 = esc_url( get_theme_mod( 'slider_image_1' ) );
		$title1  = esc_attr( get_theme_mod( 'slider_title_1' ) );
		$subtitle1 = esc_attr( get_theme_mod( 'slider_subtitle_1' ) );
		
		$cta1_label  = esc_attr( get_theme_mod( 'slider_1_cta_1_label' )  );
		$cta1_url    = esc_url( get_theme_mod( 'slider_1_cta_1_url' ) );
		$cta1_btn    = esc_attr( get_theme_mod( 'slider_1_cta_1_btn' ) );
		
		$cta2_label  = esc_attr( get_theme_mod( 'slider_1_cta_2_label' )  );
		$cta2_url    = esc_url( get_theme_mod( 'slider_1_cta_2_url' ) );
		$cta2_btn    = esc_attr( get_theme_mod( 'slider_1_cta_2_btn' ) );
		
		if( ! $slide1 ){
			$slide1 = get_template_directory_uri().'/assets/images/slider1.jpg';
		}
		
		
		$slider = array(
					array(
						'image' 	=> $slide1,
						'title' 	=> $title1,
						'subtitle'  => $subtitle1,
						'label1' 	=> $cta1_label,
						'url1' 		=> $cta1_url,
						'btn1' 		=> $cta1_btn,
						'label2' 	=> $cta2_label,
						'url2' 		=> $cta2_url,
						'btn2' 		=> $cta2_btn,
						'control'   => array( 'title1 captionDelay2 FromTop', 'title2 captionDelay4 FromTop', 'title3 captionDelay6 FromTop','title4 captionDelay7 FromBottom')
					),
					array(
						'image' 	=> esc_url( get_theme_mod( 'slider_image_2' ) ),
						'title' 	=> esc_attr( get_theme_mod( 'slider_title_2' ) ),
						'subtitle' 	=> esc_attr( get_theme_mod( 'slider_subtitle_2' ) ),
						'label1' 	=> esc_attr( get_theme_mod( 'slider_2_cta_1_label' )  ),
						'url1' 		=> esc_attr( get_theme_mod( 'slider_2_cta_1_url' )  ),
						'btn1' 		=> esc_attr( get_theme_mod( 'slider_2_cta_1_btn' )  ),
						'label2' 	=> '',
						'url2' 		=> '',
						'btn2' 		=> '',
						'control' 	=> array( 'title1 captionDelay2 FromTop', 'title2 captionDelay4 FromTop', 'title3 captionDelay6 FromTop','title4 captionDelay7 FromBottom')
						),
					array(
						'image' 	=> esc_url( get_theme_mod( 'slider_image_3' ) ),
						'title' 	=> esc_attr( get_theme_mod( 'slider_title_3' ) ),
						'subtitle' 	=> esc_attr( get_theme_mod( 'slider_subtitle_3' ) ),
						'label1' 	=> esc_attr( get_theme_mod( 'slider_3_cta_1_label' )  ),
						'url1' 		=> esc_attr( get_theme_mod( 'slider_3_cta_1_url' )  ),
						'btn1' 		=> esc_attr( get_theme_mod( 'slider_3_cta_1_btn' )  ),
						'label2' 	=> '',
						'url2' 		=> '',
						'btn2' 		=> '',
						'control' 	=> array( 'title1 captionDelay2 FromTop', 'title2 captionDelay4 FromTop', 'title3 captionDelay6 FromTop','title4 captionDelay7 FromBottom')
						),
					array(
						'image' 	=> esc_url( get_theme_mod( 'slider_image_4' ) ),
						'title' 	=> esc_attr( get_theme_mod( 'slider_title_4' ) ),
						'subtitle' 	=> esc_attr( get_theme_mod( 'slider_subtitle_4' ) ),
						'label1' 	=> esc_attr( get_theme_mod( 'slider_4_cta_1_label' )  ),
						'url1' 		=> esc_attr( get_theme_mod( 'slider_4_cta_1_url' )  ),
						'btn1' 		=> esc_attr( get_theme_mod( 'slider_4_cta_1_btn' )  ),
						'label2' 	=> '',
						'url2' 		=> '',
						'btn2' 		=> '',
						'control' 	=> array( 'title1 captionDelay2 FromTop', 'title2 captionDelay4 FromTop', 'title3 captionDelay6 FromTop','title4 captionDelay7 FromBottom')
						),
					array(
						'image' 	=> esc_url( get_theme_mod( 'slider_image_5' ) ),
						'title' 	=> esc_attr( get_theme_mod( 'slider_title_5' ) ),
						'subtitle' 	=> esc_attr( get_theme_mod( 'slider_subtitle_5' ) ),
						'label1' 	=> esc_attr( get_theme_mod( 'slider_5_cta_1_label' )  ),
						'url1' 		=> esc_attr( get_theme_mod( 'slider_5_cta_1_url' )  ),
						'btn1' 		=> esc_attr( get_theme_mod( 'slider_5_cta_1_btn' )  ),
						'label2' 	=> '',
						'url2' 		=> '',
						'btn2' 		=> '',
						'control' => array( 'title1 captionDelay2 FromTop', 'title2 captionDelay4 FromTop', 'title3 captionDelay6 FromTop','title4 captionDelay7 FromBottom')
						)
			);
		return $slider;
	}

endif;



if( ! function_exists('gtl_multipurpose_post_single_title') ):

	function gtl_multipurpose_post_single_title(){
	?>
        <div class="flex-box caption">
         
               <div class="article-wrap onDetails">
				
				 <h1 class="post-title">
                      <?php the_title(); ?>
                   </h1>
                   
				<?php if( ! esc_attr( get_theme_mod( 'hide_meta_single' ) ) && ( 'post' == get_post_type() ) ):?> 
				                   
	                <?php gtl_multipurpose_posted_on(); ?>
            	
            	<?php endif;?>
                   
                   <?php gtl_multipurpose_categories(); ?>
                   
                   <?php gtl_multipurpose_comment_count(); ?>
                  
                  
                  
               </div>
          
        </div>
	<?php
	}

endif;

if( ! function_exists('gtl_multipurpose_dynamic_css') ):
function gtl_multipurpose_dynamic_css(){
	ob_start();
	?>
	    <style>
        .header_height{ height:<?php echo gtl_multipurpose_header_height();?>;}
        .slides li:before{<?php echo gtl_multipurpose_hide_overlay(); ?>}
        body{
            font-family: '<?php echo gtl_multipurpose_body_font_family() ;?>',sans-serif;
            font-size: <?php echo gtl_multipurpose_body_font_size(); ?>;
            color: <?php echo gtl_multipurpose_body_text_color();?>;
        }
      
        .site-title a{font-size: <?php echo gtl_multipurpose_site_title_font_size();?>;}
        .site-description{font-size: <?php echo gtl_multipurpose_site_desc_font_size(); ?>;}
        nav.menu-main li a{font-size: <?php echo gtl_multipurpose_main_menu_font_size();?>;}
        h1{font-size: <?php echo gtl_multipurpose_h1_font_size();?>; }
        h2{font-size: <?php echo gtl_multipurpose_h2_font_size();?>; }
        h3{font-size: <?php echo gtl_multipurpose_h3_font_size();?>; }
        h4{font-size: <?php echo gtl_multipurpose_h4_font_size();?>; }
        h5{font-size: <?php echo gtl_multipurpose_h5_font_size();?>; }
        h6{font-size: <?php echo gtl_multipurpose_h6_font_size();?>; }
        header.sticky-header.scrolled,
        .no-banner header.jr-site-header
         {background-color:  <?php echo gtl_multipurpose_header_bg_color();?>!important; }

		 h1.site-title{font-size: 32px;margin:0 0 5px 0; }
        nav.menu-main ul>li>a{color:<?php echo gtl_multipurpose_menu_color();?>}
        nav.menu-main ul li a:hover{color:<?php echo gtl_multipurpose_menu_hover_color();?>;}    
        nav.menu-main ul li .sub-menu>li>a{color:<?php echo gtl_multipurpose_sub_menu_color();?>;}
        nav.menu-main ul li .sub-menu{background-color:<?php echo gtl_multipurpose_sub_menu_bg();?>;}
     
        .top_slider .slides .flex_caption1{color: <?php echo gtl_multipurpose_slider_text_color();?>;}
        .top_slider .slides.flex_caption1 a{color: <?php echo gtl_multipurpose_slider_cta_color();?>;}
        .top_slider .slides.flex_caption1 a.custom-btn{background-color:  <?php echo gtl_multipurpose_slider_cta_bg_color();?>;}
        .is-sidebar{
            background-color:  <?php echo gtl_multipurpose_sidebar_bg_color();?>;
            color:  <?php echo gtl_multipurpose_sidebar_color();?>;
        }
        .jr-site-footer{
             background-color:  <?php echo gtl_multipurpose_footer_bg_color();?>;
             color:<?php echo gtl_multipurpose_footer_color();?>;
        }
        .jr-site-footer a{
        	 color:<?php echo gtl_multipurpose_footer_color();?>;
        }

        .jr-site-footer .copyright-bottom{
        	background-color: <?php echo gtl_multipurpose_copyright_bg_color();?>;
        	color:<?php echo gtl_multipurpose_copyright_color();?>;
        }



        nav ul li:hover a,
        nav ul li.active-page a,
        nav ul > li.current-menu-item a {
          text-decoration: none;
          color: white;
        }

        .single-post .post-title{font-size:  <?php echo gtl_multipurpose_single_post_font_size();?>;}
	<?php 
		gtl_multipurpose_primary_button_style(); 
		gtl_multipurpose_secondary_button_style();
		gtl_multipurpose_tertiary_button_style();
		gtl_multipurpose_quaternary_button_style();

	?>

	/*-----------theme color -----------*/

	.custom-btn.secondary-btn,	.wpcf7-submit, .comments-area .form-submit .submit, .cart-count
	{
	  background-color: <?php echo gtl_multipurpose_theme_primary_color();?>;
	}
	body a, 
	.text-color-secondary,
	.blog-list-view .post-summary h4, 
	.article-wrap h4 a, 	
	.all-article-wrap .article-wrap h4:hover a, 
	.compo-list-with-icon ul li i, 
	
	.compo-testimonial-body.layout-te3 .fig-caption.caption-flex:before
	
	{
	  color: <?php echo gtl_multipurpose_theme_primary_color();?>;
	}

	.timeline::after,  nav ul li:hover, nav ul li.active-page, nav ul > li.current-menu-item, .post-navigation .nav-links .nav-previous:hover, .post-navigation .nav-links .nav-next:hover
	{
		background-color: <?php echo gtl_multipurpose_theme_primary_color();?>;

	}

	.timeline-content-wrapper::after{
		border-color: <?php echo gtl_multipurpose_theme_primary_color();?>;
	}

	.timeline-content-wrapper.e-right::before
	{
		border-color: transparent <?php echo gtl_multipurpose_theme_primary_color();?> transparent transparent;
	}
	.timeline-content-wrapper .content{
		background-color: <?php echo gtl_multipurpose_theme_primary_color();?>;
	}
	.timeline-content-wrapper.e-left::before{
		border-color: transparent  transparent transparent <?php echo gtl_multipurpose_theme_primary_color();?>;
	}

	.border-color-secondary, .wpcf7-form p label span input.wpcf7-form-control:focus,
	.wpcf7-form p label span textarea.wpcf7-form-control:focus 
	{
	  border-color:<?php echo gtl_multipurpose_theme_primary_color();?>;
	}

	.page-numbers li span.current, span.current, a.page-numbers:hover{
		 border-color:<?php echo gtl_multipurpose_theme_primary_color();?> !important;
		 background-color: <?php echo gtl_multipurpose_theme_primary_color();?>!important;;
	}

	

	.compo-price-table .compo-price-table-head{
		background-color: <?php echo gtl_multipurpose_theme_secondary_color();?>;
	}

	.compo-price-table.compo-active .compo-price-table-head{
		background-color: <?php echo gtl_multipurpose_theme_primary_color();?>;
	}

	.compo-price-list ul li i{
		color: <?php echo gtl_multipurpose_theme_primary_color();?>;
	}

	.compo-price-table .compo-price-table-price-number
	{
		color: <?php echo gtl_multipurpose_theme_primary_color();?>;
	}
	.compo-price-table .compo-price-suffix{
		color: <?php echo gtl_multipurpose_theme_secondary_color();?>;
	}

	a , .jr-site-footer .footerCol a:hover, .jr-site-footer .footerCol li a:hover, .is-sidebar [class*="widget_"] a:hover, .all-article-wrap .article-wrap h4 a
	
	{
		color: <?php echo gtl_multipurpose_theme_secondary_color();?>;
	}

	.compo-portfolio-body .p-btn.active-work::before, .compo-portfolio-body .p-btn:hover::before{
		background-color:  <?php echo gtl_multipurpose_theme_primary_color();?>;
	}

	.flex-direction-nav .flex-next i, .flex-direction-nav .flex-prev i{
		color: <?php echo gtl_multipurpose_theme_primary_color();?>;
	}

	/*---------------secondary color-------------------*/


	/*-----------ends theme color -----------*/
    </style>
	<?php 
	echo ob_get_clean();
}

endif;
add_action( 'wp_head' , 'gtl_multipurpose_dynamic_css' , 55 );