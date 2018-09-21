<?php
/**
* Widget for counter section
*
* @package    	GTL_Components
* @link         http://www.greenturtlelab.com/
* since 	    1.0.0
* Author:      Greenturtlelab
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

if( ! class_exists( 'GTL_Multipurpose_counter' ) ):

/**
* Counter section
* @since 1.0.0
*/
class GTL_Multipurpose_counter extends WP_Widget
{
	function __construct(){

		parent::__construct(
				'gtl_counter', 
				esc_html__( 'GTL Counter', 'gtl-multipurpose' ), 
				array( 'description' => esc_html__( 'Displays counter with title, icon and numbere', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
				);
	}


	function form( $instance ) {

		$title 		= ( isset( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : '';
		$subtitle   = ( isset( $instance[ 'subtitle' ] ) ) ? $instance[ 'subtitle' ] : '';
		$column 	= ! empty( $instance[ 'column' ] ) ? $instance[ 'column' ] : '4';
		$counter 	= ( isset( $instance[ 'counter' ] ) ) ? $instance[ 'counter' ] : array();

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_html_e( 'Subtitle:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'column' ) ); ?>"><?php esc_html_e( 'Column ( 2 - 4 ):', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column' ) ); ?>" min="2" max="4" name="<?php echo esc_attr( $this->get_field_name( 'column' ) ); ?>" type="number" value="<?php echo esc_attr( $column ); ?>">
		</p>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_label_1' ) ); ?>"><?php esc_html_e( 'Label 1:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_label_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[0][label]' ) ); ?>" type="text" value="<?php echo isset($counter[0]['label'])?esc_attr($counter[0]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_icon_1' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>, Click <a target="_blank" href="https://fontawesome.com/icons/">here</a> to view full list of icons', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_icon_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[0][icon]' ) ); ?>" type="text" value="<?php echo isset($counter[0]['icon'])?esc_attr($counter[0]['icon']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_number_1' ) ); ?>"><?php esc_html_e( 'Number:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_number_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[0][number]' ) ); ?>" type="number" value="<?php echo isset($counter[0]['number'])? esc_attr($counter[0]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_label_1' ) ); ?>"><?php esc_html_e( 'Label 2:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_label_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[1][label]' ) ); ?>" type="text" value="<?php echo isset($counter[1]['label'])?esc_attr($counter[1]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_icon_1' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>, Click <a target="_blank" href="https://fontawesome.com/icons/">here</a> to view full list of icons', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_icon_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[1][icon]' ) ); ?>" type="text" value="<?php echo isset($counter[1]['icon'])?esc_attr($counter[1]['icon']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_number_1' ) ); ?>"><?php esc_html_e( 'Number:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_number_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[1][number]' ) ); ?>" type="number" value="<?php echo isset($counter[1]['number'])?esc_attr($counter[1]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_label_1' ) ); ?>"><?php esc_html_e( 'Label 3:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_label_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[2][label]' ) ); ?>" type="text" value="<?php echo isset($counter[2]['label'])?esc_attr($counter[2]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_icon_1' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>, Click <a target="_blank" href="https://fontawesome.com/icons/">here</a> to view full list of icons', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_icon_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[2][icon]' ) ); ?>" type="text" value="<?php echo isset($counter[2]['icon'])?esc_attr($counter[2]['icon']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_number_1' ) ); ?>"><?php esc_html_e( 'Number:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_number_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[2][number]' ) ); ?>" type="number" value="<?php echo isset($counter[2]['number'])?esc_attr($counter[2]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_label_1' ) ); ?>"><?php esc_html_e( 'Label 4:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_label_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[3][label]' ) ); ?>" type="text" value="<?php echo isset($counter[3]['label'])?esc_attr($counter[3]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_icon_1' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>, Click <a target="_blank" href="https://fontawesome.com/icons/">here</a> to view full list of icons', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_icon_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[3][icon]' ) ); ?>" type="text" value="<?php echo isset($counter[3]['icon'])?esc_attr($counter[3]['icon']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_number_1' ) ); ?>"><?php esc_html_e( 'Number:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_number_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[3][number]' ) ); ?>" type="number" value="<?php echo isset($counter[3]['number'])?esc_attr($counter[3]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_label_5' ) ); ?>"><?php esc_html_e( 'Label 5:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_label_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[4][label]' ) ); ?>" type="text" value="<?php echo isset($counter[4]['label'])?esc_attr($counter[4]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_icon_5' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>, Click <a target="_blank" href="https://fontawesome.com/icons/">here</a> to view full list of icons', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_icon_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[4][icon]' ) ); ?>" type="text" value="<?php echo isset($counter[4]['icon'])?esc_attr($counter[4]['icon']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_number_5' ) ); ?>"><?php esc_html_e( 'Number:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_number_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[4][number]' ) ); ?>" type="number" value="<?php echo isset($counter[4]['number'])?esc_attr($counter[4]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_label_6' ) ); ?>"><?php esc_html_e( 'Label 6:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_label_6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[5][label]' ) ); ?>" type="text" value="<?php echo isset($counter[5]['label'])?esc_attr($counter[5]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_icon_6' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>, Click <a target="_blank" href="https://fontawesome.com/icons/">here</a> to view full list of icons', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_icon_6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[5][icon]' ) ); ?>" type="text" value="<?php echo isset($counter[5]['icon'])?esc_attr($counter[5]['icon']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_number_6' ) ); ?>"><?php esc_html_e( 'Number:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_number_6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[5][number]' ) ); ?>" type="number" value="<?php echo isset($counter[5]['number'])?esc_attr($counter[5]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_label_7' ) ); ?>"><?php esc_html_e( 'Label 7 :', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_label_7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[6][label]' ) ); ?>" type="text" value="<?php echo isset($counter[6]['label'])?esc_attr($counter[6]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_icon_7' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>, Click <a target="_blank" href="https://fontawesome.com/icons/">here</a> to view full list of icons', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_icon_7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[6][icon]' ) ); ?>" type="text" value="<?php echo isset($counter[6]['icon'])?esc_attr($counter[6]['icon']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_number_7' ) ); ?>"><?php esc_html_e( 'Number:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_number_7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[6][number]' ) ); ?>" type="number" value="<?php echo isset($counter[6]['number'])?esc_attr($counter[6]['number']):'';?>">
			</p>
		</div>

		<div class="counter-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_label_8' ) ); ?>"><?php esc_html_e( 'Label 8 :', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_label_8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[7][label]' ) ); ?>" type="text" value="<?php echo isset($counter[7]['label'])?esc_attr($counter[7]['label']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_icon_8' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>, Click <a target="_blank" href="https://fontawesome.com/icons/">here</a> to view full list of icons', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_icon_8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[7][icon]' ) ); ?>" type="text" value="<?php echo isset($counter[7]['icon'])?esc_attr($counter[7]['icon']):'';?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'counter_number_8' ) ); ?>"><?php esc_html_e( 'Number:', 'gtl-multipurpose' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_number_8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter[7][number]' ) ); ?>" type="number" value="<?php echo isset($counter[7]['number'])?esc_attr($counter[7]['number']):'';?>">
			</p>
		</div>

		<?php
	}


	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] 		= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] 	= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['column'] 	= ( isset( $new_instance['column'] ) ) ? sanitize_text_field( $new_instance['column'] ) : '';
		$instance['counter'] 	= ( isset( $new_instance['counter'] ) ) ? $new_instance['counter']  : array();
		return $instance;
	}


	function widget( $widget_args, $instance ) {

		$title    = $instance['title'];
		$subtitle = $instance['subtitle'];
		$column   = ( isset( $instance['column'] ) ) ?$instance['column'] : '';
		$counter  = $instance['counter'];

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

		<div class="pb-compo compo-counter">

			<?php if( $title || $subtitle ): ?>

				<div class="compo-header <?php echo $h_align;?>">

					<?php if( $title ):?>

						<?php echo $widget_args['before_title'] . esc_html( $title ) . $widget_args['after_title']; ?>

					<?php endif;?>

					<?php if( $subtitle ):?>

						<p><?php echo esc_html($subtitle); ?></p>

					<?php endif;?>

				</div>

			<?php endif; ?>

			<div class="compo-body compo-counter-body <?php echo $columnWrap.' '.$c_align;?>">
				<?php 
				if( is_array( $counter ) ):
					foreach( $counter as $count):
						if( empty( $count['label'] ) ): continue; endif;
				?>
							<div class="milestone-counter">
							<i class="<?php echo esc_attr($count['icon']); ?>"></i>
							<span class="stat-count highlight"><?php echo esc_html($count['number']); ?></span>
							<div class="milestone-details"><?php echo esc_html($count['label']); ?></div>
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


	function getCounterCount( $counter ){

		$i = 0;
		if( is_array( $counter ) ):

			foreach( $counter as $count):

				if( !empty( $count['label'] ) ): 
					$i++;
				endif;

			endforeach;

		endif;
		return $i;
	}

	

	private function columnWrap( $column ){

		$colwrap = 'four-col';
		if( $column == 2 ){

			$colwrap = 'two-col';

		}elseif( $column == 3 ){

			$colwrap = 'three-col';

		}
		return $colwrap;
	}

}
endif;
		

if( ! function_exists( 'gtl_multipurpose_widget_counter' ) ):

	/**
	* Register and load widget.
	*/
	function gtl_multipurpose_widget_counter() {

		register_widget( 'GTL_Multipurpose_counter' );

}
endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_counter' );