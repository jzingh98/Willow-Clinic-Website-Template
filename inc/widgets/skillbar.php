<?php
/**
* Widget for skillbar section
*
* @package    	GTL_Components
* @link         http://www.greenturtlelab.com/
* since 	    1.0.0
* Author:      Greenturtlelab
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

if( ! class_exists( 'GTL_Multipurpose_skillbar' ) ):

/**
* skillbar section
* Retrievs from services custom post type 
* @since 1.0.0
*/
class GTL_Multipurpose_skillbar extends WP_Widget{

	function __construct(){

		parent::__construct(
				'gtl_skillbar', 
				esc_html__( 'GTL Skillbar', 'gtl-multipurpose' ), 
				array( 'description' => esc_html__( 'Displays skillbar with title, subtitle', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
			);
	}


	function form( $instance ) {
		$title 		= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$subtitle 	= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
		$skillbar 	= ! empty( $instance[ 'skillbar' ] ) ? $instance[ 'skillbar' ] : array();
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_html_e( 'Subtitle:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">
		</p>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_label_1' ) ); ?>"><?php esc_html_e( 'Label 1:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bar_label_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[0][label]' ) ); ?>" type="text" value="<?php echo isset($skillbar[0]['label'])? esc_attr($skillbar[0]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_color_1' ) ); ?>"><?php esc_html_e( 'Bar Color:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'bar_color_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[0][color]' ) ); ?>" type="text" value="<?php echo isset($skillbar[0]['color'])?esc_attr($skillbar[0]['color']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_number_1' ) ); ?>"><?php esc_html_e( 'Skill(%):', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" min="0" max="100" id="<?php echo esc_attr( $this->get_field_id( 'bar_number_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[0][number]' ) ); ?>" type="number" value="<?php echo isset($skillbar[0]['number'])?esc_attr($skillbar[0]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_label_2' ) ); ?>"><?php esc_html_e( 'Label 2:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bar_label_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[1][label]' ) ); ?>" type="text" value="<?php echo isset($skillbar[1]['label'])?esc_attr($skillbar[1]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_color_2' ) ); ?>"><?php esc_html_e( 'Bar Color:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'bar_color_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[1][color]' ) ); ?>" type="text" value="<?php echo isset($skillbar[1]['color'])?esc_attr($skillbar[1]['color']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_number_2' ) ); ?>"><?php esc_html_e( 'Skill(%):', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" min="0" max="100" id="<?php echo esc_attr( $this->get_field_id( 'bar_number_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[1][number]' ) ); ?>" type="number" value="<?php echo isset($skillbar[1]['number'])?esc_attr($skillbar[1]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_label_3' ) ); ?>"><?php esc_html_e( 'Label 3:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bar_label_3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[2][label]' ) ); ?>" type="text" value="<?php echo isset($skillbar[2]['label'])?esc_attr($skillbar[2]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_color_3' ) ); ?>"><?php esc_html_e( 'Color:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'bar_color_3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[2][color]' ) ); ?>" type="text" value="<?php echo isset($skillbar[2]['color'])?esc_attr($skillbar[2]['color']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_number_3' ) ); ?>"><?php esc_html_e( 'Skill(%):', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" min="0" max="100" id="<?php echo esc_attr( $this->get_field_id( 'bar_number_3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[2][number]' ) ); ?>" type="number" min="1" max="100" value="<?php echo isset($skillbar[2]['number'])?esc_attr($skillbar[2]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_label_4' ) ); ?>"><?php esc_html_e( 'Label 4:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bar_label_4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[3][label]' ) ); ?>" type="text" value="<?php echo isset($skillbar[3]['label'])?esc_attr($skillbar[3]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_color_4' ) ); ?>"><?php esc_html_e( 'Bar Color:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'bar_color_4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[3][color]' ) ); ?>" type="text" value="<?php echo isset($skillbar[3]['color'])?esc_attr($skillbar[3]['color']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_number_4' ) ); ?>"><?php esc_html_e( 'Skill(%):', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" min="0" max="100" id="<?php echo esc_attr( $this->get_field_id( 'bar_number_4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[3][number]' ) ); ?>" type="number" value="<?php echo isset($skillbar[3]['number'])?esc_attr($skillbar[3]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_label_5' ) ); ?>"><?php esc_html_e( 'Label 5:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bar_label_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[4][label]' ) ); ?>" type="text" value="<?php echo isset($skillbar[4]['label'])?esc_attr($skillbar[4]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_color_5' ) ); ?>"><?php esc_html_e( 'Bar Color:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'bar_color_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[4][color]' ) ); ?>" type="text" value="<?php echo isset($skillbar[4]['color'])?esc_attr($skillbar[4]['color']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_number_5' ) ); ?>"><?php esc_html_e( 'Skill(%):', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" min="0" max="100" id="<?php echo esc_attr( $this->get_field_id( 'bar_number_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[4][number]' ) ); ?>" type="number" value="<?php echo isset($skillbar[4]['number'])?esc_attr($skillbar[4]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_label_6' ) ); ?>"><?php esc_html_e( 'Label 6:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bar_label_6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[5][label]' ) ); ?>" type="text" value="<?php echo isset($skillbar[5]['label'])?esc_attr($skillbar[5]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_color_6' ) ); ?>"><?php esc_html_e( 'Bar Color:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'bar_color_6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[5][color]' ) ); ?>" type="text" value="<?php echo isset($skillbar[5]['color'])?esc_attr($skillbar[5]['color']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_number_6' ) ); ?>"><?php esc_html_e( 'Skill(%):', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" min="0" max="100" id="<?php echo esc_attr( $this->get_field_id( 'bar_number_6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[5][number]' ) ); ?>" type="number" value="<?php echo isset($skillbar[5]['number'])?esc_attr($skillbar[5]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_label_7' ) ); ?>"><?php esc_html_e( 'Label 7:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bar_label_7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[6][label]' ) ); ?>" type="text" value="<?php echo isset($skillbar[6]['label'])?esc_attr($skillbar[6]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_color_7' ) ); ?>"><?php esc_html_e( 'Bar Color:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'bar_color_7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[6][color]' ) ); ?>" type="text" value="<?php echo isset($skillbar[6]['color'])?esc_attr($skillbar[6]['color']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_number_7' ) ); ?>"><?php esc_html_e( 'Skill(%):', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" min="0" max="100" id="<?php echo esc_attr( $this->get_field_id( 'bar_number_7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[6][number]' ) ); ?>" type="number" value="<?php echo isset($skillbar[6]['number'])?esc_attr($skillbar[6]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_label_8' ) ); ?>"><?php esc_html_e( 'Label 8:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bar_label_8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[7][label]' ) ); ?>" type="text" value="<?php echo isset($skillbar[7]['label'])?esc_attr($skillbar[7]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_color_8' ) ); ?>"><?php esc_html_e( 'Bar Color:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'bar_color_8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[7][color]' ) ); ?>" type="text" value="<?php echo isset($skillbar[7]['color'])?esc_attr($skillbar[7]['color']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bar_number_8' ) ); ?>"><?php esc_html_e( 'Skill(%):', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" min="0" max="100" id="<?php echo esc_attr( $this->get_field_id( 'bar_number_8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skillbar[7][number]' ) ); ?>" type="number" value="<?php echo isset($skillbar[7]['number'])?esc_attr($skillbar[7]['number']):'';?>">
			</p>
		</div>

	
	<?php
	}


	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] 	  = ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] = ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['skillbar'] = ( isset( $new_instance['skillbar'] ) ) ? $new_instance['skillbar']  : '';
		return $instance;
	}


	function widget( $widget_args, $instance ) {

		$title 			 = ( isset( $instance['title'] ) ) ? $instance['title'] : '';
		$subtitle 		 = ( isset( $instance['subtitle'] ) ) ?$instance['subtitle'] : '';
		$skillbar 		 = ( isset( $instance['skillbar'] ) ) ? $instance['skillbar'] : array();

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
		<div class="pb-compo compo-skillbar">

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

			<div class="compo-body compo-skillbar-body <?php echo $c_align;?>">
				<?php 
				if( is_array( $skillbar ) ):
					foreach( $skillbar as $skill):

						if( ! $skill['label'] ):continue;endif;
				?>
						<div class="skillbar clearfix " data-percent="<?php echo esc_attr($skill['number']); ?>%">
								<div class="skillbar-title"><span><?php echo esc_html($skill['label']);?></span></div>
								<div class="skillbar-bar" style="background: <?php echo esc_attr($skill['color']);?>"></div>
								<div class="skill-bar-percent"><?php echo esc_html($skill['number']) ;?>%</div>
							</div>
				<?php 
					endforeach;

				endif;
				?>
			</div>
		</div>

		<?php

		if( isset($widget_args['after_widget'])){

			echo $widget_args['after_widget'];
		}
	}
	}
	endif;


if( ! function_exists( 'gtl_multipurpose_widget_skillbar' ) ):

	/**
	* Register and load widget.
	*/
	function gtl_multipurpose_widget_skillbar() {

		register_widget( 'GTL_Multipurpose_skillbar' );

	}

endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_skillbar' );