<?php
/**
 * Widget for testimonials
 *
 * @package    	GTL_Components
 * @link        http://www.greenturtlelab.com/
 * since 	    1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


if( ! class_exists( 'GTL_Multipurpose_testimonials' ) ):

	/**
	 * Testimonial section
	 * Retrievs from Ttestimonials custom post type 
	 * @since 1.0.0
	 */
class GTL_Multipurpose_testimonials extends WP_Widget
	{
		
		function __construct(){

			parent::__construct(
				'gtl_testimonials', 
				esc_html__( 'GTL Testimonials', 'gtl-multipurpose' ), 
				array( 'description' => esc_html__( 'Displays testimonials carousel', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
			);

		}

	function form( $instance ) {

		$title 		= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$subtitle 	= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
		$cat_id 	= ! empty( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$tax_id 	= ! empty( $instance[ 'testimonial_category' ] ) ? $instance[ 'testimonial_category' ] : '';
		$no 		= ! empty( $instance[ 'no' ] ) ? $instance[ 'no' ] : '';
		$featured 	= ! empty( $instance[ 'featured' ] ) ? $instance[ 'featured' ] : '';
		$cta_label  = ! empty( $instance[ 'cta_label' ] ) ? $instance[ 'cta_label' ] : '';
		$cta_url 	= ! empty( $instance[ 'cta_url' ] ) ? esc_url($instance[ 'cta_url' ]) : '';
		$cta_btn 	= ! empty( $instance[ 'cta_btn' ] ) ? $instance[ 'cta_btn' ] : '';
		$layout 	= ! empty( $instance[ 'layout' ] ) ? $instance[ 'layout' ] : 'te1';

		$cats = gtl_multipurpose_post_type_category( 'testimonial' );
		$taxs = gtl_multipurpose_post_type_taxonomy( 'testimonial' , 'testimonial-category' );
		
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'gtl-multipurpose' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_html_e( 'Subtitle:', 'gtl-multipurpose' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">
		</p>

		<?php if( $cats ): ?>
			<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Category:', 'gtl-multipurpose' ); ?></label> 
		    <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>">
		    <option value=""><?php _e( 'Select All' , 'gtl-multipurpose' ); ?></option>
		     <?php foreach( $cats as $cat): $checked = $cat_id == $cat->term_id?'selected':'';  ?>
				<option <?php echo $checked; ?> value="<?php echo $cat->term_id ?>"><?php echo $cat->name?></option>
		     <?php endforeach; ?>
		    </select>
			</p>
		<?php endif; ?>

		<?php if( $taxs ):  ?>
			<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'testimonial_category' ) ); ?>"><?php esc_html_e( 'Testimonial Category:', 'gtl-multipurpose' ); ?></label> 				
		    <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'testimonial_category' ) ); ?>">
		    <option value=""><?php _e( 'Select All' , 'gtl-multipurpose' ); ?></option>
		     <?php foreach( $taxs as $tax): $checked = $tax_id == $tax->term_id?'selected':'';  ?>
				<option <?php echo $checked; ?> value="<?php echo $tax->term_id ?>"><?php echo $tax->name?></option>
		     <?php endforeach; ?>
		    </select>
			</p>
		<?php endif; ?>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>"><?php esc_html_e( 'No of Testimonials ( Enter -1 to display all ):', 'gtl-multipurpose' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no' ) ); ?>" type="number" value="<?php echo esc_attr( $no ); ?>">
		</p>

		<p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" type="checkbox" value="1" <?php if($featured){echo 'checked';}?>> <?php echo _e( 'Only display featured testimonials' , 'gtl-multipurpose' );?>
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'cta_label' ) ); ?>"><?php esc_html_e( 'CTA Label:', 'gtl-multipurpose' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta_label' ) ); ?>" type="text" value="<?php echo esc_attr( $cta_label ); ?>">
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'cta_url' ) ); ?>"><?php esc_html_e( 'CTA URL:', 'gtl-multipurpose' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta_url' ) ); ?>" type="text" value="<?php echo esc_url( $cta_url ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cta_btn' ) ); ?>"><?php esc_html_e( 'CTA Button Type:', 'gtl-multipurpose' ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta_btn' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta_btn' ) ); ?>">
				<option value="primary_btn" <?php echo $cta_btn=='primary_btn'?'selected':'';?>><?php esc_html_e( 'Primary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="secondary_btn" <?php echo $cta_btn=='secondary_btn'?'selected':'';?>><?php esc_html_e( 'Secondary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="tertiary_btn" <?php echo $cta_btn=='tertiary_btn'?'selected':'';?>><?php esc_html_e( 'Tertiary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="quaternary_btn" <?php echo $cta_btn=='quaternary_btn'?'selected':'';?>><?php esc_html_e( 'Quaternary Button' , 'gtl-multipurpose' ); ?></option>
			</select>
		</p>

		 <div>
		<div class="row">
		<label><?php esc_html_e( 'Layout:', 'gtl-multipurpose' ); ?></label> 
			<div class="col col-6 va-m">
				<input type="radio" value="te1" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='te1'?'checked':'';?>>
				<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/testimonial-1.png">
			</div>
			<div class="col col-6 va-m">
				<input type="radio" value="te2" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='te2'?'checked':'';?>>
				<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/testimonial-2.png">
			</div>
			<div class="col col-6 va-m">
				<input type="radio" value="te3" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='te3'?'checked':'';?>>
				<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/testimonial-3.png">
			</div>
		</div>
		
		</div>
			
			
		
			<?php
	}


	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] 			= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] 		= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['category'] 		= ( isset( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
		$instance['team_category']	= ( isset( $new_instance['team_category'] ) ) ? sanitize_text_field( $new_instance['team_category'] ) : '';
		$instance['no'] 			= ( isset( $new_instance['no'] ) ) ? sanitize_text_field( $new_instance['no'] ) : '';
		$instance['featured'] 		= ( isset( $new_instance['featured'] ) ) ? sanitize_text_field( $new_instance['featured'] ) : '';
		$instance['cta_label'] 		= ( isset( $new_instance['cta_label'] ) ) ? sanitize_text_field( $new_instance['cta_label'] ) : '';
		$instance['cta_url'] 		= ( isset( $new_instance['cta_url'] ) ) ? esc_url_raw( $new_instance['cta_url'] ) : '';
		$instance['cta_btn']   		= ( isset( $new_instance['cta_btn'] ) ) ? sanitize_text_field( $new_instance['cta_btn'] ) : 'primary_btn';
		$instance['layout'] 		= ( isset( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : 'te1';		
		return $instance;
	}



	function widget( $widget_args, $instance ) {
	
		$title 			 = ( isset( $instance['title'] ) )?$instance['title']:''; 
		$subtitle 		 = ( isset( $instance['subtitle'] ) )?$instance['subtitle']:'';	
		$category 		 = ( isset( $instance['category'] ) )?$instance['category']:'';
		$testimonial_category= ( isset( $instance['testimonial_category'] ) )?$instance['testimonial_category']:'';
		$no 			 = ( isset( $instance['no'] ) )?$instance['no']:'-1';
		$column 		 = 2;
		$featured 		 = ( isset( $instance['featured'] ) )?$instance['featured']:'';
		$cta_label 		 = ( isset( $instance['cta_label'] ) )?$instance['cta_label']:'';
		$cta_url 		 = ( isset( $instance['cta_url'] ) )?$instance['cta_url']:'';
		$cta_btn   		 = ( isset( $instance['cta_btn'] ) ) ? $instance['cta_btn']:'primary_btn';
		$layout 		 = ( isset( $instance['layout'] ) )?$instance['layout']:'te1';

		$image_size = $this->imageSize( $layout );
		$colwrap = $this->columnWrap( $column , $layout );

		$h_align = 'center';
		$c_align = 'left';


		if( isset( $instance['panels_info']['style']['header_alignment'])){

			$h_align =  $instance['panels_info']['style']['header_alignment'];
		}
		if( isset( $instance['panels_info']['style']['content_alignment'])){

			$c_align =  $instance['panels_info']['style']['content_alignment'];
		}

		if( isset($widget_args['before_widget'])){

			echo $widget_args['before_widget'];
		}
		?>
  
       

		<div class="pb-compo compo-testimonial">

				
			

				<?php if( $title || $subtitle ): ?>
					
					<div class="compo-header <?php echo $h_align;?>">

						<?php if( $title ):?>

							<?php echo $widget_args['before_title'] . esc_html( $title ) . $widget_args['after_title']; ?>

						<?php endif;?>

						<?php if( $subtitle ):?>

							<p><?php echo esc_html( $subtitle ); ?></p>

						<?php endif;?>
						
					</div>

			<?php endif; ?>

				<div class="compo-body compo-testimonial-body layout-<?php echo $layout.' '.$colwrap.' '.$c_align;?>">
				
				<?php if( $layout == 'te1'): ?>
                	<div id="" class="testimonial-slider owl-carousel owl-theme">
            	<?php endif; ?>

				

					<?php

					$args = $this->queryArgs( $category , $testimonial_category , $featured , $no );
					$loop = new WP_Query( $args );
					while( $loop->have_posts()):$loop->the_post();
						$name = esc_html(get_post_meta( get_the_ID() , 'gtl-client-name' , true ));
						$company = get_post_meta( get_the_ID() , 'gtl-company-name' , true );
						$designation = get_post_meta( get_the_ID() , 'gtl-client-designation' , true );

						?>  

						 <?php if( $layout  == 'te1'){ ?>

								<div class="card-design item">
									<div class="image-holder border-radius-50">
									<?php 

										if( has_post_thumbnail() ){

											the_post_thumbnail( 'thumbnail' );

										}else{

											echo '<img src="'.get_template_directory_uri().'/assets/images/user-default.jpg" height="100" width="100" alt="">';
										}

									?>
									</div>
									<div class="people-word ">
										<?php the_content();?>
										<div class="people-meta">
											<span class="name  opacity-7"><?php echo $name?$name:the_title();?></span>
											<?php if( $designation ): ?>
												<span class="dsn opacity-5" ><?php echo esc_html($designation); ?><?php if( $company ): ?>,<?php endif;?> </span>
											<?php endif; ?>
											<?php if( $company ): ?>
												<span class="cmp opacity-5"><?php echo esc_html($company); ?></span>
											<?php endif; ?>
											
										</div>

									</div>
								</div>

						<?php }else{?>

								<div class="card-design flex-wrapper">
		                            <div class="image-holder border-radius-50  img-flex">
		                                <?php 
											
												if( has_post_thumbnail() ){

													the_post_thumbnail( 'thumbnail' );

												}else{

													echo '<img src="'.get_template_directory_uri().'/assets/images/user-default.jpg" height="100" width="100" alt="">';
												}

											?>
		                            </div>
		                            
		                            <div class="fig-caption caption-flex">
		                                
		                                
		                                <?php the_content(); ?>
		                                
		                               
	                            		<div class="people-meta">
											<span class="name  opacity-7"><?php echo $name?$name:the_title();?></span>
											<?php if( $designation ): ?>
												<span class="dsn opacity-5" ><?php echo esc_html($designation); ?><?php if( $company ): ?>,<?php endif;?> </span>
											<?php endif; ?>
											<?php if( $company ): ?>
												<span class="cmp opacity-5"><?php echo esc_html($company); ?></span>
											<?php endif; ?>
											
										</div>
		                            </div>
		                        </div>

						<?php } ?>


				<?php endwhile; ?>

			<?php if( $layout == 'te1'): ?>
                </div> 
            	<?php endif; ?>

			</div>

			<?php if( $cta_label): ?>
					<div class="compo-cta">
						<a href="<?php echo esc_url( $cta_url );?>" class="deafBtn <?php echo esc_attr($cta_btn);?>"><?php echo esc_html($cta_label);?></a>
					</div>
			<?php endif; ?>
		
	</div>
               
            
    
                    
                           
			<?php
			if( isset($widget_args['after_widget'])){
				echo $widget_args['after_widget'];
			}

			wp_reset_query();
		}


		private function queryArgs( $category , $testimonial_category , $featured , $no  ){

			$tax_query = array();
                		$meta_query = array();
                		if( $category ){
	                	 array_push( $tax_query , array( 'taxonomy' => 'category', 'field'    => 'term_id', 'terms'    => $category ) );
		                }
		                if( $testimonial_category ){
		                	 array_push( $tax_query , array( 'taxonomy' => 'testimonial-category', 'field'    => 'term_id', 'terms'    => $testimonial_category ) );
		                }
		                if( $featured ){
		                	array_push( $meta_query , array( 'key'     => 'gtl-is-featured', 'value'   => '1' ) );
		                }

					return  array( 'post_type' => 'testimonials' , 
							'posts_per_page' => $no,
							'tax_query' 	 => $tax_query,
                			'meta_query' 	 => $meta_query
							);

		}

	private function columnWrap( $column , $layout ){
				if( $layout == 'te1' ){
					return false;
				}

				if( $layout == 'te2' ){
					return 'three-col';
				}

				if( $layout == 'te3' ){
					return 'one-col';
				}

			
		}


		function imageSize( $layout ){

			return 'gtl-multipurpose-img-100-100';
		}



	}
endif;


if( ! function_exists( 'gtl_multipurpose_widget_testimonials' ) ) :
	/**
     * Register and load widget.
     */
	function gtl_multipurpose_widget_testimonials() {

		/*
			Main Feature Widget Register
		*/
		register_widget( 'GTL_Multipurpose_testimonials' );

	}
endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_testimonials' );

