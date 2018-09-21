<?php
/**
 * Widget for services
 * @package    	GTL_Multipurpose
 * @link         http://www.greenturtlelab.com/
 * since 	    1.0.0
 * Author:       Greenturtlelab
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
 */

if( ! class_exists( 'GTL_Multipurpose_services' ) ):

/**
* Services section
* Retrievs from services custom post type 
* @since 1.0.0
*/
class GTL_Multipurpose_services extends WP_Widget
{
	function __construct(){

		parent::__construct(
			'gtl_services', 
			esc_html__( 'GTL Services', 'gtl-multipurpose' ), 
			array( 'description' => esc_html__( 'Displays services', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
			);
	}


	function form( $instance ) {
		$title 		= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$subtitle 	= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
		$cat_id 	= ! empty( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$tax_id 	= ! empty( $instance[ 'service_category' ] ) ? $instance[ 'service_category' ] : '';
		$no 		= ! empty( $instance[ 'no' ] ) ? $instance[ 'no' ] : '';
		$column 	= ! empty( $instance[ 'column' ] ) ? $instance[ 'column' ] : '3';
		$featured 	= ! empty( $instance[ 'featured' ] ) ? $instance[ 'featured' ] : '';
		$read_more 	= ! empty( $instance[ 'read_more' ] ) ? $instance[ 'read_more' ] : __('Read More' , 'gtl-multipurpose' );
		$excerpt_display = ! empty( $instance[ 'excerpt_display' ] ) ? $instance[ 'excerpt_display' ] :''; 
		$thumbnail 	= ! empty( $instance[ 'thumbnail' ] ) ? $instance[ 'thumbnail' ] :''; 
		$cta_label 	= ! empty( $instance[ 'cta_label' ] ) ? $instance[ 'cta_label' ] : '';
		$cta_url 	= ! empty( $instance[ 'cta_url' ] ) ? esc_url($instance[ 'cta_url' ]) : '';
		$cta_btn 	= ! empty( $instance[ 'cta_btn' ] ) ? $instance[ 'cta_btn' ] : '';
		$layout 	= ! empty( $instance[ 'layout' ] ) ? $instance[ 'layout' ] : 's1';
		
		$cats 		= gtl_multipurpose_post_type_category( 'services' );
		$taxs 		= gtl_multipurpose_post_type_taxonomy( 'services' , 'service-category' );

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
				<label for="<?php echo esc_attr( $this->get_field_id( 'service_category' ) ); ?>"><?php esc_html_e( 'Service Category:', 'gtl-multipurpose' ); ?></label> 				
				<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'service_category' ) ); ?>">
					<option value=""><?php _e( 'Select All' , 'gtl-multipurpose' ); ?></option>
					<?php foreach( $taxs as $tax): $checked = $tax_id == $tax->term_id?'selected':'';  ?>
						<option <?php echo $checked; ?> value="<?php echo $tax->term_id ?>"><?php echo $tax->name?></option>
					<?php endforeach; ?>
				</select>
			</p>
		<?php endif; ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>"><?php esc_html_e( 'No of services ( Enter -1 to display all ):', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no' ) ); ?>" type="number" value="<?php echo esc_attr( $no ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'column' ) ); ?>"><?php esc_html_e( 'Column ( 1 - 4 ):', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column' ) ); ?>" min="1" max="4" name="<?php echo esc_attr( $this->get_field_name( 'column' ) ); ?>" type="number" value="<?php echo esc_attr( $column ); ?>">
		</p>

		<p>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" type="checkbox" value="1" <?php if($featured){echo 'checked';}?>> <?php echo _e( 'Only display featured services' , 'gtl-multipurpose' );?>
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'thumbnail' ) ); ?>"><?php esc_html_e( 'Icon / Featured Image', 'gtl-multipurpose' ); ?></label> 
			<br/>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'thumbnail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumbnail' ) ); ?>" type="checkbox" value="1" <?php if($thumbnail){echo 'checked';}?> > <?php _e('Ignore FontAwesome and use featured image' , 'gtl-multipurpose' );?>
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Layout:', 'gtl-multipurpose' ); ?></label> 
			<p><em><?php _e('Recomended: layout 1,2 are for icon and layout 3,4 are for thumbnail image');?></em></p>
			<div class="row">
				<div class="col col-6 va-m">
					<input type="radio" value="s1" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='s1'?'checked':'';?>>
					<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/service-1.png">
				</div>
				<div class="col col-6 va-m">
					<input type="radio" value="s2" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='s2'?'checked':'';?>>
					<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/service-2.png">
				</div>
			</div>

			<div class="row mg-tp-35">
				<div class="col col-6 va-m">
					<input type="radio" value="s3" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='s3'?'checked':'';?>>
					<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/service-3.png">
				</div>
				<div class="col col-6 va-m">
					<input type="radio" value="s4" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='s4'?'checked':'';?>>
					<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/service-4.png">
				</div>
			</div>
		</div>
		<?php
	}


	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] 				= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] 			= ( isset( $new_instance['subtitle'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['category'] 			= ( isset( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
		$instance['service_category']	= ( isset( $new_instance['service_category'] ) ) ? sanitize_text_field( $new_instance['service_category'] ) : '';
		$instance['no'] 				= ( isset( $new_instance['no'] ) ) ? sanitize_text_field( $new_instance['no'] ) : '';
		$instance['column'] 			= ( isset( $new_instance['column'] ) ) ? sanitize_text_field( $new_instance['column'] ) : '';
		$instance['featured'] 			= ( isset( $new_instance['featured'] ) ) ? sanitize_text_field( $new_instance['featured'] ) : '';
		$instance['read_more'] 			= ( isset( $new_instance['read_more'] ) ) ? sanitize_text_field( $new_instance['read_more'] ) : '';
		$instance['excerpt_display']	= ( isset( $new_instance['excerpt_display'] ) ) ? sanitize_text_field( $new_instance['excerpt_display'] ) : '';
		$instance['thumbnail']      	= ( isset( $new_instance['thumbnail'] ) ) ? sanitize_text_field( $new_instance['thumbnail'] ) : '';
		$instance['cta_label'] 			= ( isset( $new_instance['cta_label'] ) ) ? sanitize_text_field( $new_instance['cta_label'] ) : '';
		$instance['cta_url'] 			= ( isset( $new_instance['cta_url'] ) ) ? esc_url_raw( $new_instance['cta_url'] ) : '';
		$instance['cta_btn']   			= ( isset( $new_instance['cta_btn'] ) ) ? sanitize_text_field( $new_instance['cta_btn'] ) : 'primary_btn';
		$instance['layout'] 			= ( isset( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';
		return $instance;
	}


	function widget( $widget_args, $instance ) {

		$title 			 = ( isset( $instance['title'] ) ) ?$instance['title'] : '';
		$subtitle 		 = ( isset( $instance['subtitle'] ) ) ?$instance['subtitle'] : '';
		$category 		 = ( isset( $instance['category'] ) ) ?$instance['category'] : '';
		$service_category= ( isset( $instance['service_category'] ) ) ?$instance['service_category'] : '';
		$no 			 = ( isset( $instance['no'] ) ) ?$instance['no'] : '-1';
		$column 		 = ( isset( $instance['column'] ) ) ?$instance['column'] : '';
		$featured 		 = ( isset( $instance['featured'] ) ) ?$instance['featured'] : '';
		$read_more 		 = ( isset( $instance['read_more'] ) ) ?$instance['read_more'] : '';
		$excerpt_display = ( isset( $instance['excerpt_display'] ) ) ?$instance['excerpt_display'] : '';
		$thumbnail       = ( isset( $instance['thumbnail'] ) ) ?$instance['thumbnail'] : '';
		$cta_label 		 = ( isset( $instance['cta_label'] ) ) ?$instance['cta_label'] : '';
		$cta_url 		 = ( isset( $instance['cta_url'] ) ) ? $instance['cta_url'] : '';
		$cta_btn   		 = ( isset( $instance['cta_btn'] ) ) ? $instance['cta_btn']:'primary_btn';
		$layout 		 = ( isset( $instance['layout'] ) ) ? $instance['layout'] : 's1';
		$image_size 	 = $this->imageSize( $layout );
		$colwrap 		 = $this->columnWrap( $column );

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

		<div class="pb-compo compo-service">

			<?php if( $title || $subtitle ): ?>

				<div class="compo-header <?php echo $h_align;?>" >

					<?php if( $title ):?>

						<?php echo $widget_args['before_title'] . esc_html( $title ) . $widget_args['after_title']; ?>

					<?php endif;?>

					<?php if( $subtitle ):?>

						<p><?php echo esc_html( $subtitle ); ?></p>

					<?php endif;?>

				</div>

			<?php endif; ?>

			<div class="compo-body compo-service-body layout-<?php echo $layout.' '.$colwrap.' '.$c_align . ' '.$image_size;?>">
				<?php 
				$args = $this->queryArgs( $category , $service_category , $featured , $no );
				$loop = new WP_Query( $args );
				while( $loop->have_posts()): $loop->the_post();
				?>
					<div class="card-design <?php echo 'col-'.$column.'-item'; if( $layout == 's2' || $layout == 's4') echo ' flex-wrapper';?>">
						<?php $this->icon( $thumbnail , $image_size ); ?>
						<div class="content-block fig-caption caption-flex">
							<?php $this->title(); ?>
							<?php $this->content( $excerpt_display ); ?>
							<?php $this->readMoreLink( $read_more ); ?>
						</div>
					</div>

			<?php endwhile; ?>
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

	$url 		    = get_post_meta( get_the_ID(), 'gtl-service-url', true );
	$single_page    = get_post_meta( get_the_ID(), 'gtl-enable-service-single', true );
	$new_tab    	= get_post_meta( get_the_ID(), 'gtl-service-new-tab', true );
	?>
	<?php 
	if( $url ){
	?>
		<a href="<?php echo $url;?>" <?php if($new_tab){echo 'target="_blank"';}?>><h4><?php the_title();?></h4></a>

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


private function icon( $thumbnail , $image_size ){

	$icon_class 	= get_post_meta( get_the_ID(), 'gtl-service-icon' , true );
	$icon_color 	= get_post_meta( get_the_ID(), 'gtl-service-icon-color' , true );
	?>

	<?php if( $thumbnail && has_post_thumbnail() ){ ?>

	<div class="image-holder img-flex">
		<?php 
		the_post_thumbnail( $image_size );
		?>
	</div> 

	<?php }elseif( $icon_class ){?>

		<div class="icon-holder img-flex"><i style="color:<?php echo $icon_color;?>;" class="<?php echo $icon_class;?>" <?php if($icon_color){echo 'style="color:'.$icon_color.'"';}?>></i></div>
	
	<?php
	}
}


private function readMoreLink( $read_more ){

	$url 		    = get_post_meta( get_the_ID(), 'gtl-service-url', true );
	$single_page    = get_post_meta( get_the_ID(), 'gtl-enable-service-single', true );
	$new_tab    	= get_post_meta( get_the_ID(), 'gtl-service-new-tab', true );
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


	private function queryArgs( $category , $service_category , $featured , $no ){
		$tax_query = array();
		$meta_query = array();
		if( $category ){

			array_push( $tax_query , array( 'taxonomy' => 'category', 'field'    => 'term_id', 'terms'    => $category ) );
		}

		if( $service_category ){

			array_push( $tax_query , array( 'taxonomy' => 'service-category', 'field'    => 'term_id', 'terms'    => $service_category ) );
		}
		
		if( $featured ){

			array_push( $meta_query , array( 'key'     => 'gtl-is-featured', 'value'   => '1' ) );
		}

		return array( 
			'post_type' 	 => 'services' , 
			'posts_per_page' => $no,
			'tax_query' 	 => $tax_query,
			'meta_query' 	 => $meta_query
			);
	}


private function columnWrap( $column ){
	$colwrap = 'three-col';
	if( $column == 1 ){

		$colwrap = 'one-col';

	}elseif( $column == 2 ){

		$colwrap = 'two-col';

	}elseif( $column == 3 ){

		$colwrap = 'three-col';

	}elseif($column == 4 ){

		$colwrap = 'four-col';
	}
	return $colwrap;
}


function imageSize( $layout ){

	if( $layout == 's1' || $layout == 's2' ){

		$image_size = 'gtl-multipurpose-img-64-64';

	}else if( $layout == 's3'){

		$image_size = 'gtl-multipurpose-img-400-300';

	} else if( $layout == 's4' ){

		$image_size = 'gtl-multipurpose-img-300-400';
	}
	return $image_size;
}
}
endif;


if( ! function_exists( 'gtl_multipurpose_widget_services' ) ):

	/**
	* Register and load widget.
	*/
	function gtl_multipurpose_widget_services() {
	
		register_widget( 'GTL_Multipurpose_services' );

	}

endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_services' );