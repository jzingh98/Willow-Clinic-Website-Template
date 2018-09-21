<?php
/**
 * Widget for team
 *
 * @package    	GTL_Multipurpose
 * @link        http://www.greenturtlelab.com/
 * since 	    1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


if( ! class_exists( 'GTL_Multipurpose_team' ) ):

	/**
	 * Team section
	 * Retrievs from team custom post type 
	 * @since 1.0.0
	 */
class GTL_Multipurpose_team extends WP_Widget{
		
		function __construct(){

			parent::__construct(
			'gtl_team', 
			esc_html__( 'GTL Team', 'gtl-multipurpose' ), 
			array( 'description' => esc_html__( 'Displays team/people with image and other informations', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
		);

	}

	function form( $instance ) {

		$title 		= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$subtitle 	= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
		$cat_id 	= ! empty( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$tax_id 	= ! empty( $instance[ 'team_category' ] ) ? $instance[ 'team_category' ] : '';
		$featured 	= ! empty( $instance[ 'featured' ] ) ? $instance[ 'featured' ] : '';
		$read_more 	= ! empty( $instance[ 'read_more' ] ) ? $instance[ 'read_more' ] : __('Read More' , 'gtl-multipurpose' );
		$excerpt_display = ! empty( $instance[ 'excerpt_display' ] ) ? $instance[ 'excerpt_display' ] :''; 
		$no 		= ! empty( $instance[ 'no' ] ) ? $instance[ 'no' ] : '';
		$column 	= ! empty( $instance[ 'column' ] ) ? $instance[ 'column' ] : '2';
		$cta_label 	= ! empty( $instance[ 'cta_label' ] ) ? $instance[ 'cta_label' ] : '';
		$cta_url 	= ! empty( $instance[ 'cta_url' ] ) ? esc_url($instance[ 'cta_url' ]) : '';
		$cta_btn 	= ! empty( $instance[ 'cta_btn' ] ) ? $instance[ 'cta_btn' ] : '';
		$layout 	= ! empty( $instance[ 'layout' ] ) ? $instance[ 'layout' ] : 't1';

		$cats = gtl_multipurpose_post_type_category( 'team' );
		$taxs = gtl_multipurpose_post_type_taxonomy( 'team' , 'team-category' );
		?>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'gtl-multipurpose' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'team_category' ) ); ?>"><?php esc_html_e( 'Team Category:', 'gtl-multipurpose' ); ?></label> 				
		    <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'team_category' ) ); ?>">
		    <option value=""><?php _e( 'Select All' , 'gtl-multipurpose' ); ?></option>
		     <?php foreach( $taxs as $tax): $checked = $tax_id == $tax->term_id?'selected':'';  ?>
				<option <?php echo $checked; ?> value="<?php echo $tax->term_id ?>"><?php echo $tax->name?></option>
		     <?php endforeach; ?>
		    </select>
			</p>
		<?php endif; ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>"><?php esc_html_e( 'No of Team ( Enter -1 to display all ):', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no' ) ); ?>" type="number" value="<?php echo esc_attr( $no ); ?>">
		</p>

		<p>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" type="checkbox" value="1" <?php if($featured){echo 'checked';}?>> <?php echo _e( 'Only display featured team' , 'gtl-multipurpose' );?>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'read_more' ) ); ?>"><?php esc_html_e( 'Read more text:', 'gtl-multipurpose' ); ?></label> 
			<br/><em><?php _e( 'Only works if either \'single page is enabled\' or \'external/internal link\' is provided' , 'gtl-multipurpose');?></em>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'read_more' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'read_more' ) ); ?>" type="text" value="<?php echo esc_attr( $read_more ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'excerpt_display' ) ); ?>"><?php esc_html_e( 'Content display ( Leave unchecked to display full content ):', 'gtl-multipurpose' ); ?></label> 
			<br/>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'excerpt_display' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'excerpt_display' ) ); ?>" type="checkbox" value="1" <?php if($excerpt_display){echo 'checked';}?> > <?php _e('Display excerpt' , 'gtl-multipurpose' );?>
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
		<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Layout:', 'gtl-multipurpose' ); ?></label> 
			<div class="col col-6 va-m">
				<input type="radio" value="t1" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='t1'?'checked':'';?>>
				<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/team-1.png">
			</div>
			<div class="col col-6 va-m">
				<input type="radio" value="t2" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='t2'?'checked':'';?>>
				<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/team-2.png">
			</div>
		</div>
		
		</div>

	<?php
	}


	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] 			= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] 		= ( isset( $new_instance['subtitle'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['category'] 		= ( isset( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
		$instance['team_category']	= ( isset( $new_instance['team_category'] ) ) ? sanitize_text_field( $new_instance['team_category'] ) : '';
		$instance['no'] 			= ( isset( $new_instance['no'] ) ) ? sanitize_text_field( $new_instance['no'] ) : '';
		$instance['featured'] 		= ( isset( $new_instance['featured'] ) ) ? sanitize_text_field( $new_instance['featured'] ) : '';
		$instance['read_more'] 		= ( isset( $new_instance['read_more'] ) ) ? sanitize_text_field( $new_instance['read_more'] ) : '';
		$instance['excerpt_display']= ( isset( $new_instance['excerpt_display'] ) ) ? sanitize_text_field( $new_instance['excerpt_display'] ) : '';
		$instance['cta_label'] 		= ( isset( $new_instance['cta_label'] ) ) ? sanitize_text_field( $new_instance['cta_label'] ) : '';
		$instance['cta_url'] 		= ( isset( $new_instance['cta_url'] ) ) ? esc_url_raw( $new_instance['cta_url'] ) : '';
		$instance['cta_btn']   		= ( isset( $new_instance['cta_btn'] ) ) ? sanitize_text_field( $new_instance['cta_btn'] ) : 'primary_btn';
		$instance['layout'] 		= ( isset( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : 't1';
		return $instance;
	}


	function widget( $widget_args, $instance ) { 
		
		$title 			 = ( isset( $instance['title'] ) )?$instance['title']:'';
		$subtitle 		 = ( isset( $instance['subtitle'] ) )?$instance['subtitle']:'';	
		$category 		 = ( isset( $instance['category'] ) )?$instance['category']:'';
		$team_category	 = ( isset( $instance['team_category'] ) )?$instance['team_category']:'';
		$no 			 = ( isset( $instance['no'] ) )?$instance['no']:'-1';
		$featured 		 = ( isset( $instance['featured'] ) )?$instance['featured']:'';
		$read_more 		 = ( isset( $instance['read_more'] ) )?$instance['read_more']:'' ;
		$excerpt_display = ( isset( $instance['excerpt_display'] ) )?$instance['excerpt_display']:'';
		$cta_label 		 = ( isset( $instance['cta_label'] ) )?$instance['cta_label']:'';
		$cta_url 		 = ( isset( $instance['cta_url'] ) )?$instance['cta_url']:'';
		$cta_btn   		 = ( isset( $instance['cta_btn'] ) ) ? $instance['cta_btn']:'primary_btn';
		$layout 		 = ( isset( $instance['layout'] ) )?$instance['layout']:'t1';

        $image_size = $this->imageSize( $layout );
		$columnWrap = $this->columnWrap( $layout );
		

		if( isset($widget_args['before_widget'])){

			echo $widget_args['before_widget'];
		}

		$h_align = 'center';
		$c_align = 'left';

		if( isset( $instance['panels_info']['style']['header_alignment'])){

			$h_align =  $instance['panels_info']['style']['header_alignment'];
		}
		if( isset( $instance['panels_info']['style']['content_alignment'])){

			$c_align =  $instance['panels_info']['style']['content_alignment'];
		}
		?>
   
       

        <div class="pb-compo compo-team">
            
            
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

        	<div class="compo-body compo-team-body layout-<?php echo $layout.' '.$columnWrap.' '.$c_align;?>">
				
				<?php if( $layout == 't1'): ?>

                	<div class="teamCarousel owl-carousel owl-theme">

            	<?php endif; ?>

                   <?php 
                    $args = $this->queryArgs( $category , $team_category , $featured , $no );
                    $loop = new WP_Query( $args );
                    while( $loop->have_posts()):$loop->the_post();

                        $facebook    = get_post_meta( get_the_ID() , 'gtl-team-facebook', true ) ;
						$twitter  	 = get_post_meta( get_the_ID() , 'gtl-team-twitter', true ) ;
						$google   	 = get_post_meta( get_the_ID() , 'gtl-team-google-plus', true ) ;
						$linkedin 	 = get_post_meta( get_the_ID() , 'gtl-team-linkedin', true ) ;
						$instagram   = get_post_meta( get_the_ID() , 'gtl-team-instagram', true ) ;
						$link        = get_post_meta( get_the_ID() , 'gtl-team-url', true ) ;
						$new_tab     = get_post_meta( get_the_ID() , 'gtl-team-new-tab', true ) ;
                   ?> 
                    
                    <?php if( $layout  == 't1'){ ?>
						
						<div class="item">
							<div class="person-img-wrap">
                            	<div class="person-img <?php echo $image_size;?>">
                            	<?php the_post_thumbnail( $image_size ); ?>
                      			</div>
                      			<div class="connect">

                      				<?php if($facebook):?>
	                                	<a href="<?php echo esc_url($facebook);?>" target="_blank"><i class="fab fa-facebook-f"></i> </a>
	                            	<?php endif?>

	                            	<?php if($twitter):?>
	                                <a href="<?php echo esc_url($twitter);?>" target="_blank"><i class="fab fa-twitter"></i> </a>
	                                <?php endif?>

	                                <?php if($google):?>
	                                <a href="<?php echo esc_url($google);?>" target="_blank"><i class="fab fa-google"></i> </a>
	                                <?php endif?>
									
									<?php if($linkedin):?>
	                                <a href="<?php echo esc_url($linkedin);?>" target="_blank"><i class="fab fa-linkedin-in"></i> </a>
	                                <?php endif?>

	                                <?php if($instagram):?>
	                                <a href="<?php echo esc_url($instagram);?>" target="_blank"><i class="fab fa-instagram "></i> </a>
	                                <?php endif?>

	                                <?php if($link):?>
	                                <a href="<?php echo esc_url($link);?>" <?php echo $new_tab?'target="_blank"':'';?>><i class="fas fa-link "></i> </a>
	                                <?php endif?>


                            	</div>
                            </div>

                        
                        <div class="name">
                        
                        	<?php $this->title();?>
                        
                        </div>

                        <div class="position text-muted">
                        	<?php echo get_post_meta( get_the_ID(), 'gtl-team-designation', true );?>
                        </div>

                    </div>

                    <?php }else{ ?>

                    <div class="card-design flex-wrapper">
                        <div class="image-holder img-flex">
                            <?php the_post_thumbnail( $image_size );?>
                        </div>
                        
                        <div class="fig-caption caption-flex">
                            
                            <?php $this->title();?>
                            
                            <h6 class="category text-muted"><?php echo get_post_meta( get_the_ID(), 'gtl-team-designation', true );?></h6>
                            <?php $this->content( $excerpt_display ); ?>
                            <?php $this->readMoreLink( $read_more );?>
                            <span class="underline"></span>
                            <div class="connect">
                  			
                  				<?php if($facebook):?>
                                	<a href="<?php echo esc_url($facebook);?>" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                            	<?php endif?>

                            	<?php if($twitter):?>
                                <a href="<?php echo esc_url($twitter);?>" target="_blank"><i class="fab fa-twitter"></i> </a>
                                <?php endif?>

                                <?php if($google):?>
                                <a href="<?php echo esc_url($google);?>" target="_blank"><i class="fab fa-google"></i> </a>
                                <?php endif?>
								
								<?php if($linkedin):?>
                                <a href="<?php echo esc_url($linkedin);?>" target="_blank"><i class="fab fa-linkedin-in"></i> </a>
                                <?php endif?>

                                <?php if($instagram):?>
                                <a href="<?php echo esc_url($instagram);?>" target="_blank"><i class="fab fa-instagram "></i> </a>
                                <?php endif?>

                                <?php if($link):?>
                                <a href="<?php echo esc_url($link);?>" <?php echo $new_tab?'target="_blank"':'';?>><i class="fas fa-link "></i> </a>
                                <?php endif?>

                        	</div>
                        </div>
                    </div>

                    <?php } ?>
                  
                    
                    
					<?php endwhile; ?>

				<?php if( $layout == 't1'): ?>
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


	private function title(){

		$url 		    = get_post_meta( get_the_ID(), 'gtl-team-url', true );
        $single_page    = get_post_meta( get_the_ID(), 'gtl-enable-team-single', true );
        $new_tab    	= get_post_meta( get_the_ID(), 'gtl-team-new-tab', true );
 
         if( $url ){
        ?>
         	<a href="<?php echo $url;?>" <?php if($new_tab){echo 'target="_blank"';}?>><h5><?php the_title();?></h5></a>
         
         <?php 
         }else if( $single_page ){
         ?>
			<a href="<?php the_permalink();?>"><h4><?php the_title();?></h4></a>

		<?php 
         }else{
         ?>

         <h4><?php the_title();?></h4>

         <?php 
         }

       }
                    
	private function content( $excerpt_display ){
		
		if( $excerpt_display ){

			the_excerpt();

		}else{

			the_content();
		}
	}



	private function queryArgs( $category , $team_category , $featured , $no  ){

		$tax_query = array();
		$meta_query = array();
		if( $category ){
    	 array_push( $tax_query , array( 'taxonomy' => 'category', 'field'    => 'term_id', 'terms'    => $category ) );
        }
        if( $team_category ){
        	 array_push( $tax_query , array( 'taxonomy' => 'team-category', 'field'    => 'term_id', 'terms'    => $team_category ) );
        }
        if( $featured ){
        	array_push( $meta_query , array( 'key'     => 'gtl-is-featured', 'value'   => '1' ) );
        }

       return  array( 
        	'post_type' => 'team' , 
        	'posts_per_page' => $no ,
        	'tax_query' 	 => $tax_query,
			'meta_query' 	 => $meta_query
        	);

	}

	


	  private function imageSize( $layout ){

				if( $layout == 't1'  ){

					$image_size = 'gtl-multipurpose-img-300-400';

				}else if( $layout == 't2'){

					$image_size = 'gtl-multipurpose-img-400-400';

				} 

				return $image_size;
	 }


	private function columnWrap( $layout ){
		 $col = '';
		 if( $layout == 't2' ){

		 	$col = 'two-col';
		 }
		 return $col;
	}


	private function readMoreLink( $read_more ){

	$url 		    = get_post_meta( get_the_ID(), 'gtl-team-url', true );
	$single_page    = get_post_meta( get_the_ID(), 'gtl-enable-team-single', true );
	$new_tab    	= get_post_meta( get_the_ID(), 'gtl-team-new-tab', true );
	
	if( ( $url || $single_page ) && $read_more ){

		if( $url ){
	?>
			<a class="read-more" href="<?php echo $url;?>" <?php if($new_tab){echo 'target="_blank"';}?>><?php echo $read_more;?></a>
	<?php 
		}else if( $single_page ){
	?>
			<a class="read-more" href="<?php the_permalink();?>"><?php echo $read_more;?></a>

	<?php 
		}
	}
}



}
endif;


if( ! function_exists( 'gtl_multipurpose_widget_team' ) ):

	/**
     * Register and load widget.
     */
	function gtl_multipurpose_widget_team() {

		/*
			Main Feature Widget Register
		*/
		register_widget( 'GTL_Multipurpose_team' );

	}

endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_team' );