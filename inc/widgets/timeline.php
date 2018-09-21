<?php
/**
 * Widget for Timeline
 *
 * @package    	GTL_Components
 * @link        http://www.greenturtlelab.com/
 * since 	    1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


if( ! class_exists( 'GTL_Multipurpose_timeline' ) ):

	/**
	 * timeline section
	 * @since 1.0.0
	 */
class GTL_Multipurpose_timeline extends WP_Widget{
		
	function __construct(){
		parent::__construct(
			'gtl_timeline', 
			esc_html__( 'GTL Timeline', 'gtl-multipurpose' ), 
			array( 'description' => esc_html__( 'Accepts Label and url for CTA button', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
		);

	}

	function form( $instance ) {

		$title 		= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$subtitle 	= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
		$cat_id 	= ! empty( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$tax_id 	= ! empty( $instance[ 'event_category' ] ) ? $instance[ 'event_category' ] : '';
		$no 		= ! empty( $instance[ 'no' ] ) ? $instance[ 'no' ] : '';
		$featured 	= ! empty( $instance[ 'featured' ] ) ? $instance[ 'featured' ] : '';
		$read_more 	= ! empty( $instance[ 'read_more' ] ) ? $instance[ 'read_more' ] : __('Read More' , 'gtl-multipurpose' );
		$content_display = ! empty( $instance[ 'content_display' ] ) ? $instance[ 'content_display' ] :''; 
		$content_bg 	 = ! empty( $instance[ 'content_bg' ] ) ? $instance[ 'content_bg' ] :''; 
		$cta_label 		 = ! empty( $instance[ 'cta_label' ] ) ? $instance[ 'cta_label' ] : '';
		$cta_url 		 = ! empty( $instance[ 'cta_url' ] ) ? esc_url($instance[ 'cta_url' ]) : '';
		$cta_btn 		 = ! empty( $instance[ 'cta_btn' ] ) ? $instance[ 'cta_btn' ] : '';

		$cats = gtl_multipurpose_post_type_category( 'events' );
		$taxs = gtl_multipurpose_post_type_taxonomy( 'events' , 'event-category' );
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
				<label for="<?php echo esc_attr( $this->get_field_id( 'event_category' ) ); ?>"><?php esc_html_e( 'Event Category:', 'gtl-multipurpose' ); ?></label> 				
			    <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'event_category' ) ); ?>">
			    <option value=""><?php _e( 'Select All' , 'gtl-multipurpose' ); ?></option>
			     <?php foreach( $taxs as $tax): $checked = $tax_id == $tax->term_id?'selected':'';  ?>
					<option <?php echo $checked; ?> value="<?php echo $tax->term_id ?>"><?php echo $tax->name?></option>
			     <?php endforeach; ?>
			    </select>
			</p>
		<?php endif; ?>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>"><?php esc_html_e( 'No of events ( Enter -1 to display all ):', 'gtl-multipurpose' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no' ) ); ?>" type="number" value="<?php echo esc_attr( $no ); ?>">
		</p>
		
		<p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" type="checkbox" value="1" <?php if($featured){echo 'checked';}?>> <?php echo _e( 'Only display featured events' , 'gtl-multipurpose' );?>
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'read_more' ) ); ?>"><?php esc_html_e( 'Read more text:', 'gtl-multipurpose' ); ?></label> 
		<br/><em><?php _e( 'Only works if either \'single page is enabled\' or \'external/internal link\' is provided' , 'gtl-multipurpose');?></em>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'read_more' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'read_more' ) ); ?>" type="text" value="<?php echo esc_attr( $read_more ); ?>">
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'content_display' ) ); ?>"><?php esc_html_e( 'Content display:', 'gtl-multipurpose' ); ?></label> 
		<br/>
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content_display' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content_display' ) ); ?>">
			<option value="title" <?php echo $content_display == 'title'?'selected':'';?>><?php esc_html_e('Only title' , 'gtl-multipurpose' );?></option>
			<option value="excerpt" <?php echo $content_display == 'excerpt'?'selected':'';?>><?php esc_html_e('Title & excerpt' , 'gtl-multipurpose' );?></option>
			<option value="content" <?php echo $content_display == 'content'?'selected':'';?>><?php esc_html_e('Title & full content' , 'gtl-multipurpose' );?></option>
		</select>
		</p>

		<!-- <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'content_bg' ) ); ?>"><?php esc_html_e( 'Content background color:', 'gtl-multipurpose' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content_bg' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content_bg' ) ); ?>" type="text" value="<?php echo esc_attr( $content_bg ); ?>">
		</p> -->

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
	
		<?php
	}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;
			$instance['title'] 			= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['subtitle'] 		= ( isset( $new_instance['subtitle'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
			$instance['category'] 		= ( isset( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
			$instance['event_category'] = ( isset( $new_instance['event_category'] ) ) ? sanitize_text_field( $new_instance['event_category'] ) : '';
			$instance['no'] 			= ( isset( $new_instance['no'] ) ) ? sanitize_text_field( $new_instance['no'] ) : '';
			$instance['featured'] 		= ( isset( $new_instance['featured'] ) ) ? sanitize_text_field( $new_instance['featured'] ) : '';
			$instance['read_more'] 		= ( isset( $new_instance['read_more'] ) ) ? sanitize_text_field( $new_instance['read_more'] ) : '';
			$instance['content_display']= ( isset( $new_instance['content_display'] ) ) ? sanitize_text_field( $new_instance['content_display'] ) : '';
			$instance['content_bg']		= ( isset( $new_instance['content_bg'] ) ) ? sanitize_text_field( $new_instance['content_bg'] ) : '';
			$instance['cta_label'] 	    = ( isset( $new_instance['cta_label'] ) ) ? sanitize_text_field( $new_instance['cta_label'] ) : '';
			$instance['cta_url'] 		= ( isset( $new_instance['cta_url'] ) ) ? esc_url_raw( $new_instance['cta_url'] ) : '';
			$instance['cta_btn']   		= ( isset( $new_instance['cta_btn'] ) ) ? sanitize_text_field( $new_instance['cta_btn'] ) : 'primary_btn';
			return $instance;

		}



		function widget( $widget_args, $instance ) {

			$title 			 	= ( isset( $instance['title'] ) ) ? $instance['title'] : '';
			$subtitle 		 	= ( isset( $instance['subtitle'] ) ) ? $instance['subtitle'] : '';	
			$category 		 	= ( isset( $instance['category'] ) ) ? $instance['category'] : '';
			$event_category  	= ( isset( $instance['event_category'] ) ) ? $instance['event_category'] : '';
			$no 			 	= ( isset( $instance['no'] ) ) ? $instance['no'] :'-1';
			$featured 		 	= ( isset( $instance['featured'] ) ) ? $instance['featured'] : '';
			$read_more 		 	= ( isset( $instance['read_more'] ) ) ? $instance['read_more'] : '' ;
			$content_display 	= ( isset( $instance['content_display'] ) )? $instance['content_display'] : '';
			$content_bg      	= ( isset( $instance['content_bg'] ) )? $instance['content_bg'] : gtl_multipurpose_theme_primary_color();
			$cta_label 		 	= ( isset( $instance['cta_label'] ) ) ? $instance['cta_label'] : '';
			$cta_url 		 	= ( isset( $instance['cta_url'] ) ) ? $instance['cta_url'] : '';
			$cta_btn   		 	= ( isset( $instance['cta_btn'] ) ) ? $instance['cta_btn'] : 'primary_btn';

			
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
        
        
            <div class="pb-compo compo-timeline ">

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

				<div class="compo-body compo-timeline-body  timeline-section <?php echo $c_align;?>">
					<div class="timeline">
						<?php 
						$args = $this->queryArgs( $category , $event_category , $featured , $no );
						$loop = new WP_Query( $args );
						$i = 2;
						while( $loop->have_posts()):$loop->the_post();
							$date = get_post_meta( get_the_ID() , 'gtl-event-date' , true );
							$class = $i % 2 == 0?'e-left':'e-right';
							$event_date = gtl_multipurpose_process_timeline_date( $date );
							$icon_class  = get_post_meta( get_the_ID() , 'gtl-event-icon' , true );
							$icon_color  = get_post_meta( get_the_ID() , 'gtl-event-icon-color' , true);
							?>
					            <div class="timeline-content-wrapper <?php echo $class;?> <?php if($icon_class){ echo 'has-icon';}?>">
					              <div class="content">
					                <div class="paddable">
					                    <?php if($icon_class){ echo '<i style="color:'.$icon_color.';" class="'.$icon_class.'"></i>';}?>
						                <h5><?php echo $event_date;?></h5>
						                <h3 class="opacity-9"> <?php the_title();?></h3>
						                <div class="opacity-8"><?php $this->content( $content_display  );?></div>
					              		<?php $this->readMoreLink( $read_more ); ?>
					                </div>
					                
					               </div>
					            </div>

					<?php $i++; endwhile; ?>
					  
				</div>

               <?php if( $cta_label ): ?>

						<div class="compo-cta">
						<a href="<?php echo esc_url( $cta_url );?>" class="deafBtn <?php echo esc_attr($cta_btn);?>"><?php echo esc_html($cta_label);?></a>
					</div>

					<?php endif; ?>
                
            </div>
       
     
                           
			<?php
			if( isset($widget_args['after_widget'])){

				echo $widget_args['after_widget'];
			}
		}

private function queryArgs( $category , $event_category , $featured , $no ){

		$tax_query = array();
		$meta_query = array();

		if( $category ){

			array_push( $tax_query , array( 'taxonomy' => 'category', 'field'    => 'term_id', 'terms'    => $category ) );
		}

		if( $event_category ){

			array_push( $tax_query , array( 'taxonomy' => 'event-category', 'field'    => 'term_id', 'terms'    => $event_category ) );
		}

		if( $featured ){

			array_push( $meta_query , array( 'key'     => 'gtl-is-featured', 'value'   => '1' ) );
		}

	return array( 
				'post_type' 	 => 'timeline', 
				'posts_per_page' => $no,
				'tax_query' 	 => $tax_query,
				'meta_query' 	 => $meta_query,
				'meta_key' 		 => 'gtl-event-date',
				'orderby' 		 => 'meta_value',
				'order' 		 => 'DESC'
				);

}

	private function content( $content_display ){
				
						
			if( $content_display  == 'excerpt' ){

				the_excerpt();

			}elseif ($content_display == 'content' ) {

				the_content();

			}
	}


	private function readMoreLink( $read_more ){
		$url 		    = get_post_meta( get_the_ID(), 'gtl-event-url', true );
		$single_page    = get_post_meta( get_the_ID(), 'gtl-event-enable-timeline-single', true );
		$new_tab    	= get_post_meta( get_the_ID(), 'gtl-event-new-tab', true );

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


if( ! function_exists( 'gtl_multipurpose_widget_timeline' ) ):

	/**
     * Register and load widget.
     */
	function gtl_multipurpose_widget_timeline() {

		register_widget( 'GTL_Multipurpose_timeline' );

	}
endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_timeline' );