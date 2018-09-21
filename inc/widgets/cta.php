<?php

/**
* Widget for cta button
*
* @package    	GTL_Components
* @link         http://www.greenturtlelab.com/
* since 	    1.0.0
* Author:      Greenturtlelab
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

if( ! class_exists( 'GTL_Multipurpose_cta' ) ):

/**
 * cta button
 * @since 1.0.0
 */
class GTL_Multipurpose_cta extends WP_Widget
{
	
	function __construct(){

		parent::__construct(
				'gtl_cta', 
				esc_html__( 'GTL CTA Button', 'gtl-multipurpose' ), 
				array( 'description' => esc_html__( 'Accepts Label and url for CTA button', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
			);
	}


	function form( $instance ) {

		$cta_label  = ! empty( $instance[ 'cta_label' ] ) ? $instance[ 'cta_label' ] : '';
		$cta_url 	= ! empty( $instance[ 'cta_url' ] ) ? esc_url($instance[ 'cta_url' ]) : '';
		$cta_btn 	= ! empty( $instance[ 'cta_btn' ] ) ? $instance[ 'cta_btn' ] : '';

		?>

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
		$instance['cta_label'] = ( isset( $new_instance['cta_label'] ) ) ? sanitize_text_field( $new_instance['cta_label'] ) : '';
		$instance['cta_url']   = ( isset( $new_instance['cta_url'] ) ) ? esc_url_raw( $new_instance['cta_url'] ) : '';
		$instance['cta_btn']   = ( isset( $new_instance['cta_btn'] ) ) ? sanitize_text_field( $new_instance['cta_btn'] ) : 'primary_btn';
		return $instance;
	}


	function widget( $widget_args, $instance ) {

		$cta_label = ( isset( $instance['cta_label'] ) ) ? $instance['cta_label'] : '';
		$cta_url   = ( isset( $instance['cta_url'] ) ) ? esc_url( $instance['cta_url'] ) : '';
		$cta_btn   = ( isset( $instance['cta_btn'] ) ) ? $instance['cta_btn'] : 'primary_btn';

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

		<div class="pb-compo compo-cta <?php echo $c_align;?>">

			<?php if( $cta_label): ?>

				<a href="<?php echo $cta_url;?>" class="deafBtn <?php echo esc_attr($cta_btn);?>"><?php echo esc_html($cta_label);?></a>

			<?php endif; ?>

		</div>

		<?php
		if( isset($widget_args['after_widget'])){

			echo $widget_args['after_widget'];
		}
	}
}
endif;


if( ! function_exists( 'gtl_multipurpose_widget_cta' ) ):

	/**
	 * Register and load widget.
	 */
	function gtl_multipurpose_widget_cta() {

		register_widget( 'GTL_Multipurpose_cta' );

}

endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_cta' );