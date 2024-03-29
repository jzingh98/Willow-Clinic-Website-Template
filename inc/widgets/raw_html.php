<?php
/**
 * Widget for raw html section
 * @package    	GTL_Components
 * @link         http://www.greenturtlelab.com/
 * since 	    1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if( ! class_exists( 'GTL_Multipurpose_text' ) ):

/**
 * raw html section
 * Retrievs from services custom post type 
 * @since 1.0.0
 */
class GTL_Multipurpose_text extends WP_Widget{

	function __construct(){

		parent::__construct(
				'gtl_text', 
				esc_html__( 'GTL Raw HTML', 'gtl-multipurpose' ), 
				array( 'description' => esc_html__( 'Accepts raw html', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
			);
	}


	function form( $instance ) {

		$content 	= ! empty( $instance[ 'text' ] ) ? html_entity_decode ($instance[ 'text' ] ): '';

		?>

		<div class="">
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Content:', 'gtl-multipurpose' ); ?></label> 
			<textarea rows="15" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" class="widefat"><?php echo $content; ?></textarea>
		</div>
		<?php
	}


	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['text'] = ( isset( $new_instance['text'] ) ) ? wp_kses_post ( $new_instance['text'] ) : '';
		return $instance;
	}


	function widget( $widget_args, $instance ) {

		$content = $instance['text'];

		if( isset($widget_args['before_widget'])){

			echo $widget_args['before_widget'];
		}

		?>

		<div class="pb-compo">
			<div class="compo-body compo-rh-body">
				<?php echo  html_entity_decode( esc_html( $content ) );?>
			</div>
		</div>

		<?php

		if( isset($widget_args['after_widget'])){

			echo $widget_args['after_widget'];
		}
	}
}
endif;


if( ! function_exists( 'gtl_multipurpose_widget_text' ) ):

	/**
	* Register and load widget.
	*/
	function gtl_multipurpose_widget_text() {


		register_widget( 'GTL_Multipurpose_text' );

	}
endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_text' );