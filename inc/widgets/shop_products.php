<?php
/**
* Widget for shop products
*
* @package    	GTL_Components
* @link         http://www.greenturtlelab.com/
* since 	    1.0.0
* Author:      Greenturtlelab
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

if( ! class_exists( 'GTL_Multipurpose_shop_product' ) ):

/**
* products section
* Retrievs from products custom post type 
* @since 1.0.0
*/
class GTL_Multipurpose_shop_product extends WP_Widget
{
	function __construct(){

		parent::__construct(
				'gtl_shop_products', 
				esc_html__( 'GTL Shop Products', 'gtl-multipurpose' ), 
				array( 'description' => esc_html__( 'Displays home page blog block', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
			);
	}


	function form( $instance ) {

		$title 		= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$subtitle 	= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
		$tax_id 	= ! empty( $instance[ 'product_category' ] ) ? $instance[ 'product_category' ] : '';
		$no 		= ! empty( $instance[ 'no' ] ) ? $instance[ 'no' ] : '4';
		$column 	= ! empty( $instance[ 'column' ] ) ? $instance[ 'column' ] : '3';
		$featured 	= ! empty( $instance[ 'featured' ] ) ? $instance[ 'featured' ] : '';
		$cta_label 	= ! empty( $instance[ 'cta_label' ] ) ? $instance[ 'cta_label' ] : '';
		$cta_url 	= ! empty( $instance[ 'cta_url' ] ) ? esc_url($instance[ 'cta_url' ]) : '';
		$cta_btn 	= ! empty( $instance[ 'cta_btn' ] ) ? $instance[ 'cta_btn' ] : '';

		$taxs 		= gtl_multipurpose_post_type_taxonomy( 'product' , 'product_cat' );

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_attr_e( 'Subtitle:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">
		</p>

		<?php if( $taxs ):  ?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'product_category' ) ); ?>"><?php esc_attr_e( 'product Category:', 'gtl-multipurpose' ); ?></label> 				
				<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'product_category' ) ); ?>">
					<option value=""><?php _e( 'Select All' , 'gtl-multipurpose' ); ?></option>
					<?php foreach( $taxs as $tax): $checked = $tax_id == $tax->term_id?'selected':'';  ?>
						<option <?php echo $checked; ?> value="<?php echo $tax->term_id ?>"><?php echo $tax->name?></option>
					<?php endforeach; ?>
				</select>
			</p>
		<?php endif; ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>"><?php esc_attr_e( 'No of products ( Enter -1 to display all ):', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no' ) ); ?>" type="number" value="<?php echo esc_attr( $no ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'column' ) ); ?>"><?php esc_attr_e( 'Column ( 2 - 4 ):', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column' ) ); ?>" min="2" max="4" name="<?php echo esc_attr( $this->get_field_name( 'column' ) ); ?>" type="number" value="<?php echo esc_attr( $column ); ?>">
		</p>

		<p>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" type="checkbox" value="1" <?php if($featured){echo 'checked';}?>> <?php echo _e( 'Only display featured products' , 'gtl-multipurpose' );?>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cta_label' ) ); ?>"><?php esc_attr_e( 'CTA Label:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta_label' ) ); ?>" type="text" value="<?php echo esc_attr( $cta_label ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cta_url' ) ); ?>"><?php esc_attr_e( 'CTA URL:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta_url' ) ); ?>" type="text" value="<?php echo esc_url( $cta_url ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cta_btn' ) ); ?>"><?php esc_attr_e( 'CTA Button Type:', 'gtl-multipurpose' ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta_btn' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta_btn' ) ); ?>">
				<option value="primary_btn" <?php echo $cta_btn=='primary_btn'?'selected':'';?>><?php _e( 'Primary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="secondary_btn" <?php echo $cta_btn=='secondary_btn'?'selected':'';?>><?php _e( 'Secondary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="tertiary_btn" <?php echo $cta_btn=='tertiary_btn'?'selected':'';?>><?php _e( 'Tertiary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="quaternary_btn" <?php echo $cta_btn=='quaternary_btn'?'selected':'';?>><?php _e( 'Quaternary Button' , 'gtl-multipurpose' ); ?></option>
			</select>
		</p>

		<?php
	}


	function update( $new_instance, $old_instance ) {

		$instance 						= $old_instance;
		$instance['title'] 				= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] 			= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['product_category']	= ( isset( $new_instance['product_category'] ) ) ? sanitize_text_field( $new_instance['product_category'] ) : '';
		$instance['no'] 				= ( isset( $new_instance['no'] ) ) ? sanitize_text_field( $new_instance['no'] ) : '';
		$instance['column'] 			= ( isset( $new_instance['column'] ) ) ? sanitize_text_field( $new_instance['column'] ) : '';
		$instance['featured'] 			= ( isset( $new_instance['featured'] ) ) ? sanitize_text_field( $new_instance['featured'] ) : '';
		$instance['cta_label'] 			= ( isset( $new_instance['cta_label'] ) ) ? sanitize_text_field( $new_instance['cta_label'] ) : '';
		$instance['cta_url'] 			= ( isset( $new_instance['cta_url'] ) ) ? esc_url_raw( $new_instance['cta_url'] ) : '';
		$instance['cta_btn']   			= ( isset( $new_instance['cta_btn'] ) ) ? sanitize_text_field( $new_instance['cta_btn'] ) : 'primary_btn';
		return $instance;
	}


	function widget( $widget_args, $instance ) {

		$title 			 = ( isset( $instance['title'] ) ) ?$instance['title'] : '';
		$subtitle 		 = ( isset( $instance['subtitle'] ) ) ?$instance['subtitle'] : '';
		$product_category= ( isset( $instance['product_category'] ) ) ?$instance['product_category'] : '';
		$no 			 = ( isset( $instance['no'] ) ) ?$instance['no'] : '4';
		$column 		 = ( isset( $instance['column'] ) ) ?$instance['column'] : '';
		$featured 		 = ( isset( $instance['featured'] ) ) ?$instance['featured'] : '';
		$cta_label 		 = ( isset( $instance['cta_label'] ) ) ?$instance['cta_label'] : '';
		$cta_url 		 = ( isset( $instance['cta_url'] ) ) ? $instance['cta_url'] : '';
		$cta_btn   		 = ( isset( $instance['cta_btn'] ) ) ? $instance['cta_btn']:'primary_btn';

		$columnWrap = $this->columnWrap( $column );

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

		<div class="pb-compo compo-products">

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

			<div class="compo-body compo-shop-body">
				<div class="woocommerce">

					<ul class="products <?php echo $columnWrap. ' '.$c_align;?>">	
						<?php 
						$args = $this->queryArgs( '' , $product_category , $featured , $no );
						$loop = new WP_Query( $args ); 
						while( $loop->have_posts()):$loop->the_post();
						?>
						<?php
							/**
							 * woocommerce_shop_loop hook.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action( 'woocommerce_shop_loop' );
						?>
						<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile;?>
					</ul>			
			</div>		
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


private function queryArgs( $category , $product_category , $featured , $no ){
	$tax_query = array();
	$meta_query = array();
	if( $product_category ){

		array_push( $tax_query , array( 'taxonomy' => 'product_cat', 'field'    => 'term_id', 'terms'    => $product_category ) );
	}

	if( $featured ){

		array_push( $meta_query , array( 'key'     => 'gtl-is-featured', 'value'   => '1' ) );
	}

	return array( 
		'post_type' 	 => 'product' , 
		'posts_per_page' => $no,
		'tax_query' 	 => $tax_query,
		'meta_query' 	 => $meta_query
		);
}

}
endif;



if( ! function_exists( 'gtl_multipurpose_widget_shop_product' ) ):
	
	/**
	* Register and load widget.
	*/
	function gtl_multipurpose_widget_shop_product() {


		register_widget( 'GTL_Multipurpose_shop_product' );

	}

endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_shop_product' );