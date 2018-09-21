<?php
/**
 * Widget for clients
 * @package    	GTL_Components
 * @link        http://www.greenturtlelab.com/
 * since 	    1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


if( ! class_exists( 'GTL_Multipurpose_clients' ) ):

	/**
	 * Clients section
	 * Retrievs from clients custom post type 
	 * @since 1.0.0
	 */
class GTL_Multipurpose_clients extends WP_Widget
	{
		
		function __construct(){

			parent::__construct(
				'gtl_clients', 
				esc_html__( 'GTL Clients', 'gtl-multipurpose' ), 
				array( 'description' => esc_html__( 'Displays Clients logo', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
			);

		}


		function form( $instance ) {
			
			$title 		= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
			$subtitle 	= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
			$cat_id 	= ! empty( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
			$tax_id 	= ! empty( $instance[ 'client_category' ] ) ? $instance[ 'client_category' ] : '';
			$featured 	= ! empty( $instance[ 'featured' ] ) ? $instance[ 'featured' ] : '';
			$dcarousel 	= ! empty( $instance[ 'dcarousel' ] ) ? $instance[ 'dcarousel' ] : '';
			$no 		= ! empty( $instance[ 'no' ] ) ? $instance[ 'no' ] : '';
			$column 	= ! empty( $instance[ 'column' ] ) ? $instance[ 'column' ] : '4';
			$cta_label 	= ! empty( $instance[ 'cta_label' ] ) ? $instance[ 'cta_label' ] : '';
			$cta_url 	= ! empty( $instance[ 'cta_url' ] ) ? esc_url($instance[ 'cta_url' ]) : '';
			$cta_btn 	= ! empty( $instance[ 'cta_btn' ] ) ? $instance[ 'cta_btn' ] : '';
			$layout 	= ! empty( $instance[ 'layout' ] ) ? $instance[ 'layout' ] : 'c1';

			$cats = gtl_multipurpose_post_type_category( 'clients' );
			$taxs = gtl_multipurpose_post_type_taxonomy( 'clients' , 'client-category' );
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
				<label for="<?php echo esc_attr( $this->get_field_id( 'client_category' ) ); ?>"><?php esc_html_e( 'Client Category:', 'gtl-multipurpose' ); ?></label> 				
			    <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'client_category' ) ); ?>">
			    <option value=""><?php _e( 'Select All' , 'gtl-multipurpose' ); ?></option>
			     <?php foreach( $taxs as $tax): $checked = $tax_id == $tax->term_id?'selected':'';  ?>
					<option <?php echo $checked; ?> value="<?php echo $tax->term_id ?>"><?php echo $tax->name?></option>
			     <?php endforeach; ?>
			    </select>
				</p>
			<?php endif; ?>

			<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>"><?php esc_html_e( 'No of Clients ( Enter -1 to display all ):', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no' ) ); ?>" type="number" value="<?php echo esc_attr( $no ); ?>">
			</p>

			<p>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" type="checkbox" value="1" <?php if($featured){echo 'checked';}?>> <?php echo _e( 'Only display featured clients' , 'gtl-multipurpose' );?>
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

			<p>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dcarousel' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'dcarousel' ) ); ?>" type="checkbox" value="1" <?php if($dcarousel){echo 'checked';}?>> <?php echo _e( 'Disable carousel' , 'gtl-multipurpose' );?>
			</p>
			
		
			<?php
		}



		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;
			$instance['title'] 			= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['subtitle'] 		= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
			$instance['category'] 		= ( isset( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
			$instance['client_category']= ( isset( $new_instance['client_category'] ) ) ? sanitize_text_field( $new_instance['client_category'] ) : '';
			$instance['no'] 			= ( isset( $new_instance['no'] ) ) ? sanitize_text_field( $new_instance['no'] ) : '';
			$instance['column'] 		= ( isset( $new_instance['column'] ) ) ? sanitize_text_field( $new_instance['column'] ) : '';
			$instance['featured'] 		= ( isset( $new_instance['featured'] ) ) ? sanitize_text_field( $new_instance['featured'] ) : '';
			$instance['dcarousel'] 		= ( isset( $new_instance[ 'dcarousel' ] ) ) ? sanitize_text_field(  $new_instance[ 'dcarousel' ] ) : '';
			$instance['cta_label'] 		= ( isset( $new_instance['cta_label'] ) ) ? sanitize_text_field( $new_instance['cta_label'] ) : '';
			$instance['cta_url'] 		= ( isset( $new_instance['cta_url'] ) ) ? esc_url_raw( $new_instance['cta_url'] ) : '';
			$instance['cta_btn'] 		= ( isset( $new_instance['cta_btn'] ) ) ? sanitize_text_field( $new_instance['cta_btn'] ) : 'primary_btn';
			$instance['layout'] 		= ( isset( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';	
			return $instance;
		}

	

		function widget( $widget_args, $instance ) {

			$title 			 = ( isset( $instance['title'] ) ) ? $instance['title']:'';
			$subtitle 		 = ( isset( $instance['subtitle'] ) ) ? $instance['subtitle']:'';	
			$category 		 = ( isset( $instance['category'] ) ) ? $instance['category']:'';
			$client_category = ( isset( $instance['client_category'] ) ) ? $instance['client_category']:'';
			$no 			 = ( isset( $instance['no'] ) ) ? $instance['no']:'-1';
			$column 		 = ( isset( $instance['column'] ) ) ? $instance['column']:'';
			$featured 		 = ( isset( $instance['featured'] ) ) ? $instance['featured']:'';
			$dcarousel 		 = ( isset( $instance['dcarousel'] ) ) ? $instance['dcarousel']:'';
			$cta_label 		 = ( isset( $instance['cta_label'] ) ) ? $instance['cta_label']:'';
			$cta_url 		 = ( isset( $instance['cta_url'] ) ) ? $instance['cta_url']:'';
			$cta_btn 		 = ( isset( $instance['cta_btn'] ) ) ? $instance['cta_btn']:'primary_btn';
			$layout 		 = ( isset( $instance['layout'] ) )  ? $instance['layout']:'';

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
  
        <div class="pb-compo compo-client">
        	

        	<?php if( $title || $subtitle ): ?>

						<div class="compo-header <?php echo $h_align; ?>">

							<?php if( $title ):?>

								<?php echo $widget_args['before_title'] . esc_html( $title ) . $widget_args['after_title']; ?>

							<?php endif;?>

							<?php if( $subtitle ):?>

							<p><?php echo esc_html( $subtitle ); ?></p>


							<?php endif;?>
							
						</div>

			<?php endif; ?>

			<div class="compo-body compo-client-body <?php echo $c_align;?>">
				<div class="client-logo-carousel jr-site-centralize large-wrap">
					<div class="<?php echo $dcarousel ? 'carousel-disabled center' : 'clientLogo owl-carousel owl-theme';?>">
						<?php
						$args = $this->queryArgs( $category , $client_category , $featured , $no );
						$loop = new WP_Query( $args );
						while( $loop->have_posts()): $loop->the_post();
							$url 		= get_post_meta( get_the_ID(), 'gtl-client-url', true );
							$new_tab    = get_post_meta(get_the_ID(), 'gtl-client-new-tab', true ) ;
							?>

								<div class="item">
									<?php if( $url ){ ?>

										<a href="<?php echo $url;?>" <?php echo ($new_tab)?'target="_blank"':'';?>><?php the_post_thumbnail('gtl-multipurpose-img-250-null');?></a>

									<?php }else{ ?>

										<?php the_post_thumbnail('gtl-multipurpose-img-250-null');?>

									<?php } ?>

								</div>

					<?php endwhile; ?>
				</div>

				<?php if( $cta_label): ?>

						<div class="compo-cta">
						<a href="<?php echo esc_url( $cta_url );?>" class="deafBtn <?php echo esc_attr($cta_btn);?>"><?php echo esc_html($cta_label);?></a>
					</div>
					
				<?php endif; ?>
			</div>

		</div>
           
    </div>
   
                    
                           
		<?php
		if( isset($widget_args['after_widget'])){

			echo $widget_args['after_widget'];
		}
		wp_reset_query();
	}

		

	private function queryArgs( $category , $client_category , $featured , $no ){

		$tax_query = array();
        $meta_query = array();
        if( $category ){

        	 array_push( $tax_query , array( 'taxonomy' => 'category', 'field'    => 'term_id', 'terms'    => $category ) );
        }

        if( $client_category ){

        	 array_push( $tax_query , array( 'taxonomy' => 'client-category', 'field'    => 'term_id', 'terms'    => $client_category ) );
        }

        if( $featured ){

        	array_push( $meta_query , array( 'key'     => 'gtl-is-featured', 'value'   => '1' ) );
        } 

        return  array( 
        	'post_type' => 'clients' , 
        	'posts_per_page' => $no,
        	'tax_query' 	 => $tax_query,
        	'meta_query' 	 => $meta_query

        	);

	}
}

endif;


if( ! function_exists( 'gtl_multipurpose_widget_clients' ) ):

	/**
     * Register and load widget.
     */
	function gtl_multipurpose_widget_clients() {

		register_widget( 'GTL_Multipurpose_clients' );

	}
endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_clients' );