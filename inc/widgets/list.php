<?php

/**

 * Widget for list section

 * @package    	GTL_Multipurpose

 * @link        http://www.greenturtlelab.com/

 * since 	    1.0.0

 * Author:      Greenturtlelab

 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt

 */





if( ! class_exists( 'GTL_Multipurpose_list' ) ):



/**

 * List section

 * List item with icon

 * @since 1.0.0

 */

class GTL_Multipurpose_list extends WP_Widget

{

	function __construct(){



		parent::__construct(

				'gtl_list', 

				esc_html__( 'GTL List', 'gtl-multipurpose' ), 

				array( 'description' => esc_html__( 'Displays list itemes with FontAwesome icon', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )

			);

	}





	function form( $instance ) {



		$title 					= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

		$subtitle 				= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';

		$enable_border 			= ! empty( $instance[ 'enable_border' ] ) ? $instance[ 'enable_border' ] : '';

		$enable_border_radius 	= ! empty( $instance[ 'enable_border_radius' ] ) ? $instance[ 'enable_border_radius' ] : '';

		$icon_color 			= ! empty( $instance[ 'icon_color' ] ) ? $instance[ 'icon_color' ] : '';

		$column 				= ! empty( $instance[ 'column' ] ) ? $instance[ 'column' ] : '1';

		$list 					= ! empty( $instance[ 'list' ] ) ? $instance[ 'list' ] : array();



		



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

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'enable_border' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'enable_border' ) ); ?>" type="checkbox" value="1" <?php if($enable_border){echo 'checked';}?>> <?php  esc_html_e( 'Enable Icon Border (Default square border)' , 'gtl-multipurpose' );?>

		</p>



		<p>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'enable_border_radius' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'enable_border_radius' ) ); ?>" type="checkbox" value="1" <?php if($enable_border_radius){echo 'checked';}?>> <?php echo esc_html_e( 'Enable Icon Border Radius (Works if border enabled)' , 'gtl-multipurpose' );?>

		</p>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>"><?php esc_html_e( 'Icon Color:', 'gtl-multipurpose' ); ?></label> 

			<input class="widefat color-field" id="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_color' ) ); ?>" type="text" value="<?php echo esc_attr( $icon_color ); ?>">

		</p>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'column' ) ); ?>"><?php esc_html_e( 'Column ( 1 - 4 ):', 'gtl-multipurpose' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column' ) ); ?>" min="1" max="4" name="<?php echo esc_attr( $this->get_field_name( 'column' ) ); ?>" type="number" value="<?php echo esc_attr( $column ); ?>">

		</p>



		<div class="list-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_1' ) ); ?>"><?php esc_html_e( 'Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_label_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[0][label]' ) ); ?>" type="text" value="<?php echo isset($list[0]['label'])?esc_attr($list[0]['label']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_1' ) ); ?>"><?php esc_html_e( 'Sub Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[0][sublabel]' ) ); ?>" type="text" value="<?php echo isset($list[0]['sublabel'])?esc_attr($list[0]['sublabel']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_icon_1' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_icon_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[0][icon]' ) ); ?>" type="text" value="<?php echo isset($list[0]['icon'])?esc_attr($list[0]['icon']):'';?>">

			</p>

		</div>



		<div class="list-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_2' ) ); ?>"><?php esc_html_e( 'Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_label_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[1][label]' ) ); ?>" type="text" value="<?php echo isset($list[1]['label'])?esc_attr($list[1]['label']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_2' ) ); ?>"><?php esc_html_e( 'Sub Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[1][sublabel]' ) ); ?>" type="text" value="<?php echo isset($list[1]['sublabel'])?esc_attr($list[1]['sublabel']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_icon_2' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_icon_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[1][icon]' ) ); ?>" type="text" value="<?php echo isset($list[1]['icon'])?esc_attr($list[1]['icon']):'';?>">

			</p>

		</div>



		<div class="list-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_3' ) ); ?>"><?php esc_html_e( 'Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_label_3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[2][label]' ) ); ?>" type="text" value="<?php echo isset($list[2]['label'])?esc_attr($list[2]['label']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_3' ) ); ?>"><?php esc_html_e( 'Sub Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[2][sublabel]' ) ); ?>" type="text" value="<?php echo isset($list[2]['sublabel'])?esc_attr($list[2]['sublabel']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_icon_3' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_icon_3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[2][icon]' ) ); ?>" type="text" value="<?php echo isset($list[2]['icon'])?esc_attr($list[2]['icon']):'';?>">

			</p>

		</div>



		<div class="list-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_4' ) ); ?>"><?php esc_html_e( 'Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_label_4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[3][label]' ) ); ?>" type="text" value="<?php echo isset($list[3]['label'])?esc_attr($list[3]['label']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_4' ) ); ?>"><?php esc_html_e( 'Sub Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[3][sublabel]' ) ); ?>" type="text" value="<?php echo isset($list[3]['sublabel'])?esc_attr($list[3]['sublabel']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_icon_4' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_icon_4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[3][icon]' ) ); ?>" type="text" value="<?php echo isset($list[3]['icon'])?esc_attr($list[3]['icon']):'';?>">

			</p>

		</div>



		<div class="list-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_5' ) ); ?>"><?php esc_html_e( 'Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_label_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[4][label]' ) ); ?>" type="text" value="<?php echo isset($list[4]['label'])?esc_attr($list[4]['label']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_5' ) ); ?>"><?php esc_html_e( 'Sub Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[4][sublabel]' ) ); ?>" type="text" value="<?php echo isset($list[4]['sublabel'])?esc_attr($list[4]['sublabel']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_icon_5' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_icon_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[4][icon]' ) ); ?>" type="text" value="<?php echo isset($list[4]['icon'])?esc_attr($list[4]['icon']):'';?>">

			</p>

		</div>



		<div class="list-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_6' ) ); ?>"><?php esc_html_e( 'Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_label_6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[5][label]' ) ); ?>" type="text" value="<?php echo isset($list[5]['label'])?esc_attr($list[5]['label']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_6' ) ); ?>"><?php esc_html_e( 'Sub Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[5][sublabel]' ) ); ?>" type="text" value="<?php echo isset($list[5]['sublabel'])?esc_attr($list[5]['sublabel']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_icon_6' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_icon_6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[5][icon]' ) ); ?>" type="text" value="<?php echo isset($list[5]['icon'])?esc_attr($list[5]['icon']):'';?>">

			</p>

		</div>



		<div class="list-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_7' ) ); ?>"><?php esc_html_e( 'Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_label_7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[6][label]' ) ); ?>" type="text" value="<?php echo isset($list[6]['label'])?esc_attr($list[6]['label']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_7' ) ); ?>"><?php esc_html_e( 'Sub Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[6][sublabel]' ) ); ?>" type="text" value="<?php echo isset($list[6]['sublabel'])?esc_attr($list[6]['sublabel']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_icon_7' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_icon_7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[6][icon]' ) ); ?>" type="text" value="<?php echo isset($list[6]['icon'])?esc_attr($list[6]['icon']):'';?>">

			</p>

		</div>



		<div class="list-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_8' ) ); ?>"><?php esc_html_e( 'Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_label_8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[7][label]' ) ); ?>" type="text" value="<?php echo isset($list[7]['label'])?esc_attr($list[7]['label']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_8' ) ); ?>"><?php esc_html_e( 'Sub Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[7][sublabel]' ) ); ?>" type="text" value="<?php echo isset($list[7]['sublabel'])?esc_attr($list[7]['sublabel']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_icon_8' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_icon_8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[7][icon]' ) ); ?>" type="text" value="<?php echo isset($list[7]['icon'])?esc_attr($list[7]['icon']):'';?>">

			</p>

		</div>



		<div class="list-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_9' ) ); ?>"><?php esc_html_e( 'Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_label_9' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[8][label]' ) ); ?>" type="text" value="<?php echo isset($list[8]['label'])?esc_attr($list[8]['label']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_9' ) ); ?>"><?php esc_html_e( 'Sub Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_9' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[8][sublabel]' ) ); ?>" type="text" value="<?php echo isset($list[8]['sublabel'])?esc_attr($list[8]['sublabel']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_icon_9' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_icon_9' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[8][icon]' ) ); ?>" type="text" value="<?php echo isset($list[8]['icon'])?esc_attr($list[8]['icon']):'';?>">

			</p>

		</div>



		<div class="list-wrap" style="margin-top:30px;background-color:#eaeaea;padding:20px;">

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_10' ) ); ?>"><?php esc_html_e( 'Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_label_10' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[9][label]' ) ); ?>" type="text" value="<?php echo isset($list[9]['label'])?esc_attr($list[9]['label']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_label_10' ) ); ?>"><?php esc_html_e( 'Sub Label:', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_sublabel_10' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[9][sublabel]' ) ); ?>" type="text" value="<?php echo isset($list[9]['sublabel'])?esc_attr($list[9]['sublabel']):'';?>">

			</p>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'list_icon_10' ) ); ?>"><?php echo __( 'FontAwesome Icon: e.g. <strong>fa fa-ambulance</strong>', 'gtl-multipurpose' ); ?></label> 

				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_icon_10' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list[9][icon]' ) ); ?>" type="text" value="<?php echo isset($list[9]['icon'])?esc_attr($list[9]['icon']):'';?>">

			</p>

		</div>



		<?php

	}





	function update( $new_instance, $old_instance ) {



		$instance = $old_instance;

		$instance['title'] 			= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['subtitle'] 		= ( isset( $new_instance['subtitle'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';

		$instance['enable_border'] 	= ( isset( $new_instance['enable_border'] ) ) ? sanitize_text_field( $new_instance['enable_border'] ) : '';

		$instance['enable_border_radius'] 	= ( isset( $new_instance['enable_border_radius'] ) ) ? sanitize_text_field( $new_instance['enable_border_radius'] ) : '';

		$instance['icon_color'] 	= ( isset( $new_instance['icon_color'] ) ) ? sanitize_text_field( $new_instance['icon_color'] ) : '';

		$instance['column'] 		= ( isset( $new_instance['column'] ) ) ? sanitize_text_field( $new_instance['column'] ) : '';

		$instance['list'] 			= ( isset( $new_instance['list'] ) ) ? $new_instance['list']  : '';

		return $instance;

	}





	function widget( $widget_args, $instance ) {



		$title 			 	 = ( isset( $instance['title'] ) ) ? $instance['title']:'';

		$subtitle 		 	 = ( isset( $instance['subtitle'] ) ) ? $instance['subtitle']:'';

		$enable_border 		 = ( isset( $instance['enable_border'] ) ) ? $instance['enable_border']:'';

		$enable_border_radius= ( isset( $instance['enable_border_radius'] ) ) ? $instance['enable_border_radius']:'';

		$icon_color 		 = ( isset( $instance['icon_color'] ) ) ? $instance['icon_color']:'';

		$column 		 	 = ( isset( $instance['column'] ) ) ?$instance['column'] : '1';

		$list 			 	 = ( isset( $instance['list'] ) ) ? $instance['list'] : '' ;



		$icon_class = $this->iconClass( $enable_border , $enable_border_radius ); 

		$icon_inline_style = $this->iconInlineStyle( $icon_color , $enable_border  );

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





		<div class="pb-compo compo-list-with-icon ">



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



			<div class="compo-body compo-list-with-icon-body <?php echo $c_align;?>">

				<ul class="<?php echo $columnWrap;?>">

					<?php 

					if( is_array( $list ) ):



						foreach( $list as $li):



							if( empty(  $li['label'] ) ): 



								continue; 



							endif;



							$label 	  = isset( $li['label'] ) ? $li['label'] : '';

							$sublabel = isset( $li['sublabel'] ) ? $li['sublabel'] : '';

							$icon  	  = isset( $li['icon'] ) ? $li['icon'] : '';

							$label    = isset( $li['label'] ) ? $li['label'] : '';



							echo '<li>';



							if( $c_align == 'left' || $c_align == 'center' ):



								echo '<i '.$icon_inline_style.' class="'.esc_attr( $icon ).' '.$icon_class.'"></i>';



							endif;



							echo '<h4>'. esc_html($label).'</h4>';



							if( $sublabel ){



								echo '<p>'.esc_html($sublabel).'</p>';

							}

							



							if( $c_align == 'right' ):



								echo '<i '.$icon_inline_style.' class="'.esc_attr( $icon ).' '.$icon_class.'"></i>';



							endif;



							echo '</li>';



						endforeach;



					endif; 

				  ?>

					</ul>

				</div>

			</div>



			<?php



			if( isset($widget_args['after_widget'])){



				echo $widget_args['after_widget'];

			}

		}



		private function columnWrap( $column ){

			$colwrap = 'one-col';

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



		private function iconClass( $enable_border , $enable_border_radius ){

			$class = '';

			if( $enable_border ){

				$class = 'bordered';

				if( $enable_border_radius ){

					$class .= ' circled ';

				}

			}

			return $class;

		}



		private function iconInlineStyle( $icon_color , $enable_border  ){

			$style = 'style="';

			if( $icon_color ){

				$style .= 'color:'.$icon_color.';';

				if( $enable_border ){

					$style .= 'border-color:'.$icon_color.';';

				}

			}

			$style .= '"';

			return $style;

		}

	}

endif;

		



if( ! function_exists( 'gtl_multipurpose_widget_list' ) ):



	/**

	* Register and load widget.

	*/

	function gtl_multipurpose_widget_list() {



	register_widget( 'GTL_Multipurpose_list' );



}

endif;

add_action( 'widgets_init', 'gtl_multipurpose_widget_list' );