<?php

/**

* Widget for pragraph 

*

* @package    	GTL_Components

* @link         http://www.greenturtlelab.com/

* since 	    1.0

* Author:      Greenturtlelab

* License URI: http://www.gnu.org/licenses/gpl-2.0.txt

*/



if( ! class_exists( 'GTL_Multipurpose_paragraph' ) ): 



/**

 * paragraph

 * @since 1.0.0

 */

class GTL_Multipurpose_paragraph extends WP_Widget{



	function __construct(){



		parent::__construct(

				'gtl_paragraph', 

				esc_html__( 'GTL Paragraph', 'gtl-multipurpose' ), 

				array( 'description' => esc_html__( 'HTML Paragraph with styling', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )

			);

	}





	function form( $instance ) {



		$paragraph_text = ! empty( $instance[ 'paragraph_text' ] ) ? ( $instance[ 'paragraph_text' ] ) : '';

		$font_size 		= ! empty( $instance[ 'font_size' ] ) ? ( $instance[ 'font_size' ] ) : '';

		$font_size 		= ! empty( $instance[ 'font_size' ] ) ? ($instance[ 'font_size' ]) : '';

		$font_weight 	= ! empty( $instance[ 'font_weight' ] ) ? ($instance[ 'font_weight' ]) : '';

		$line_height 	= ! empty( $instance[ 'line_height' ] ) ? ($instance[ 'line_height' ]) : '';

		$font_color		= ! empty( $instance[ 'font_color' ] ) ? ( $instance[ 'font_color' ] ) : '';

		$bg_color		= ! empty( $instance[ 'bg_color' ] ) ? ( $instance[ 'bg_color' ] ) : '';

		$margin			= ! empty( $instance[ 'margin' ] ) ? ( $instance[ 'margin' ] ) : '';

		$padding		= ! empty( $instance[ 'padding' ] ) ? ( $instance[ 'padding' ] ) : '';



		?>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'paragraph_text' ) ); ?>"><?php esc_html_e( 'Paragraph Text:', 'gtl-multipurpose' ); ?></label> 

			<textarea class="widefat" rows="5" id="<?php echo esc_attr( $this->get_field_id( 'paragraph_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'paragraph_text' ) ); ?>" value=""><?php echo esc_attr( $paragraph_text ); ?></textarea>

		</p>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'font_size' ) ); ?>"><?php esc_html_e( 'Font Size:', 'gtl-multipurpose' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'font_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'font_size' ) ); ?>" type="text" value="<?php echo esc_attr( $font_size ); ?>" placeholder="18px">

		</p>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'font_weight' ) ); ?>"><?php esc_html_e( 'Font Weight:', 'gtl-multipurpose' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'font_weight' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'font_weight' ) ); ?>" type="text" value="<?php echo esc_attr( $font_weight ); ?>" placeholder="500">

		</p>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'font_color' ) ); ?>"><?php esc_html_e( 'Font color:', 'gtl-multipurpose' ); ?></label> 

			<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'font_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'font_color' ) ); ?>" type="text" value="<?php echo esc_attr( $font_color ); ?>">

		</p>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'line_height' ) ); ?>"><?php esc_html_e( 'Line height:', 'gtl-multipurpose' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'line_height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'line_height' ) ); ?>" type="text" value="<?php echo esc_attr( $line_height ); ?>" placeholder="20px">

		</p>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'letter_spacing' ) ); ?>"><?php esc_html_e( 'Letter spacing:', 'gtl-multipurpose' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'letter_spacing' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'letter_spacing' ) ); ?>" type="text" value="<?php echo esc_attr( $letter_spacing ); ?>" placeholder="2px">

		</p>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>"><?php esc_html_e( 'BG color:', 'gtl-multipurpose' ); ?></label> 

			<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bg_color' ) ); ?>" type="text" value="<?php echo esc_attr( $bg_color ); ?>">

		</p>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'margin' ) ); ?>"><?php esc_html_e( 'Margin:', 'gtl-multipurpose' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'margin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'margin' ) ); ?>" type="text" value="<?php echo esc_attr( $margin ); ?>" placeholder="10px 0">

		</p>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'padding' ) ); ?>"><?php esc_html_e( 'Padding:', 'gtl-multipurpose' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'padding' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'padding' ) ); ?>" type="text" value="<?php echo esc_attr( $padding ); ?>" placeholder="0 50px">

		</p>



		<?php

	}





	function update( $new_instance, $old_instance ) {



		$instance 					= $old_instance;

		$instance['paragraph_text'] = ( isset( $new_instance['paragraph_text'] ) ) ? sanitize_text_field( $new_instance['paragraph_text'] ) : '';

		$instance['font_size'] 		= ( isset( $new_instance['font_size'] ) ) ? sanitize_text_field( $new_instance['font_size'] ) : '';

		$instance['font_weight'] 	  = ( isset( $new_instance['font_weight'] ) ) ? sanitize_text_field( $new_instance['font_weight'] ) : '';

		$instance['line_height'] 	  = ( isset( $new_instance['line_height'] ) ) ? sanitize_text_field( $new_instance['line_height'] ) : '';

		$instance['letter_spacing'] 	  = ( isset( $new_instance['letter_spacing'] ) ) ? sanitize_text_field( $new_instance['letter_spacing'] ) : '';

		$instance['font_color'] 	= ( isset( $new_instance['font_color'] ) ) ? sanitize_text_field( $new_instance['font_color'] ) : '';

		$instance['bg_color'] 		= ( isset( $new_instance['bg_color'] ) ) ? sanitize_text_field( $new_instance['bg_color'] ) : '';

		$instance['margin'] 		= ( isset( $new_instance['margin'] ) ) ? sanitize_text_field( $new_instance['margin'] ) : '';

		$instance['padding'] 		= ( isset( $new_instance['padding'] ) ) ? sanitize_text_field( $new_instance['padding'] ) : '';

		return $instance;

	}





	function widget( $widget_args, $instance ) {

		

		$paragraph_text = ( isset( $instance['paragraph_text'] ) ) ? $instance['paragraph_text']: __( 'Empty Paragraph' , 'gtl-multipurpose' );

		$font_size 		= ( isset( $instance[ 'font_size' ] ) ) ? ($instance[ 'font_size' ]) : '';

		$font_weight 	= ( isset( $instance['font_weight'] ) ) ? $instance['font_weight'] : '';

		$line_height 	= ( isset( $instance['line_height'] ) ) ? $instance['line_height'] : '';

		$letter_spacing = ( isset( $instance['letter_spacing'] ) ) ? $instance['letter_spacing'] : '';

		$font_color		= ( isset( $instance[ 'font_color' ] ) ) ? ($instance[ 'font_color' ]) : '';

		$bg_color		= ( isset( $instance[ 'bg_color' ] ) ) ? ($instance[ 'bg_color' ]) : '';

		$margin			= ( isset( $instance[ 'margin' ] ) ) ? ($instance[ 'margin' ]) : '';

		$padding		= ( isset( $instance[ 'padding' ] ) ) ? ($instance[ 'padding' ]) : '';



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

		<div class="pb-compo compo-paragraph <?php echo $c_align;?>">

			<?php 



			$style = 'style="';



			if( $font_size ){



				$style .= 'font-size:'.$font_size.';';

			}



			if( $font_weight ){



				$style .= 'font-weight:'.$font_weight.';';

			}



			if( $line_height ){



				$style .= 'line-height:'.$line_height.';';

			}



			if( $letter_spacing ){



				$style .= 'letter-spacing:'.$letter_spacing.';';

			}



			if( $font_color ){



				$style .= 'color:'.$font_color.';';

			}



			if( $bg_color ){



				$style .= 'background-color:'.$bg_color.';';

			}



			if( $margin ){



				$style .= 'margin:'.$margin.';';

			}



			if( $padding ){



				$style .= 'padding:'.$padding.';';

			}



			$style .= '"';

			echo '<p '.$style.'>'.esc_html($paragraph_text).'</p>';

			?>    

		</div>

		<?php

		if( isset($widget_args['after_widget'])){



			echo $widget_args['after_widget'];

		}

	}

}

endif;





if( ! function_exists( 'gtl_multipurpose_widget_paragraph' ) ):



	/**

	* Register and load widget.

	*/

	function gtl_multipurpose_widget_paragraph() {



		register_widget( 'GTL_Multipurpose_paragraph' );

	}



endif;

add_action( 'widgets_init', 'gtl_multipurpose_widget_paragraph' );