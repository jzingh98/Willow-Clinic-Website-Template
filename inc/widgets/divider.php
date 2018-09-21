<?php
/**
* Widget for divider section
*
* @package    	GTL_Components
* @link        http://www.greenturtlelab.com/
* since 	    1.0.0
* Author:      Greenturtlelab
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

if( ! class_exists( 'GTL_Multipurpose_divider' ) ):

/**
* Divider section
* @since 1.0.0
*/
class GTL_Multipurpose_divider extends WP_Widget
{
	function __construct(){

		parent::__construct(
				'gtl_divider', 
				esc_html__( 'GTL Divider', 'gtl-multipurpose' ), 
				array( 'description' => esc_html__( 'Displays section divider with title, subtitle and a cta button', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
			);
	}


	function form( $instance ) {

		$title 		= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$subtitle 	= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
		$cta_label 	= ! empty( $instance[ 'cta_label' ] ) ? $instance[ 'cta_label' ] : '';
		$cta_url 	= ! empty( $instance[ 'cta_url' ] ) ? esc_url($instance[ 'cta_url' ]) : '';
		$cta_btn 	= ! empty( $instance[ 'cta_btn' ] ) ? $instance[ 'cta_btn' ] : '';
		$cta2_label = ! empty( $instance[ 'cta2_label' ] ) ? $instance[ 'cta2_label' ] : '';
		$cta2_url 	= ! empty( $instance[ 'cta2_url' ] ) ? esc_url($instance[ 'cta2_url' ]) : '';
		$cta2_btn 	= ! empty( $instance[ 'cta2_btn' ] ) ? $instance[ 'cta2_btn' ] : '';
		$inline 	= ! empty( $instance[ 'inline' ] ) ? $instance[ 'inline' ] : '';
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'cta_label' ) ); ?>"><?php esc_html_e( 'CTA 1 Label:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta_label' ) ); ?>" type="text" value="<?php echo esc_attr( $cta_label ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cta_url' ) ); ?>"><?php esc_html_e( 'CTA 1 URL:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta_url' ) ); ?>" type="text" value="<?php echo esc_url( $cta_url ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cta_btn' ) ); ?>"><?php esc_html_e( 'CTA 1 Button Type:', 'gtl-multipurpose' ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta_btn' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta_btn' ) ); ?>">
				<option value="primary_btn" <?php echo $cta_btn=='primary_btn'?'selected':'';?>><?php esc_html_e( 'Primary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="secondary_btn" <?php echo $cta_btn=='secondary_btn'?'selected':'';?>><?php esc_html_e( 'Secondary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="tertiary_btn" <?php echo $cta_btn=='tertiary_btn'?'selected':'';?>><?php esc_html_e( 'Tertiary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="quaternary_btn" <?php echo $cta_btn=='quaternary_btn'?'selected':'';?>><?php esc_html_e( 'Quaternary Button' , 'gtl-multipurpose' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cta2_label' ) ); ?>"><?php esc_html_e( 'CTA 2 Label:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta2_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta2_label' ) ); ?>" type="text" value="<?php echo esc_attr( $cta2_label ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cta2_url' ) ); ?>"><?php esc_html_e( 'CTA 2 URL:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta2_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta2_url' ) ); ?>" type="text" value="<?php echo esc_url( $cta2_url ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cta2_btn' ) ); ?>"><?php esc_html_e( 'CTA 2 Button Type:', 'gtl-multipurpose' ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cta2_btn' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cta2_btn' ) ); ?>">
				<option value="primary_btn" <?php echo $cta2_btn=='primary_btn'?'selected':'';?>><?php esc_html_e( 'Primary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="secondary_btn" <?php echo $cta2_btn=='secondary_btn'?'selected':'';?>><?php esc_html_e( 'Secondary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="tertiary_btn" <?php echo $cta2_btn=='tertiary_btn'?'selected':'';?>><?php esc_html_e( 'Tertiary Button' , 'gtl-multipurpose' ); ?></option>
				<option value="quaternary_btn" <?php echo $cta2_btn=='quaternary_btn'?'selected':'';?>><?php esc_html_e( 'Quaternary Button' , 'gtl-multipurpose' ); ?></option>
			</select>
		</p>

		<p>
			<input type="checkbox" <?php echo $inline?'checked':'';?> value="1" name="<?php echo esc_attr( $this->get_field_name( 'inline' ) ); ?>" class="widefat"> <span><?php _e('Make button inlined','gtl-multipurpose')?></span>
		</p>
		<?php
	}


	function update( $new_instance, $old_instance ) {

		$instance 				= $old_instance;
		$instance['title'] 		= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] 	= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['cta_label']  = ( isset( $new_instance['cta_label'] ) ) ? sanitize_text_field( $new_instance['cta_label'] ) : '';
		$instance['cta_url'] 	= ( isset( $new_instance['cta_url'] ) ) ? esc_url_raw( $new_instance['cta_url'] ) : '';
		$instance['cta_btn']    = ( isset( $new_instance['cta_btn'] ) ) ? sanitize_text_field( $new_instance['cta_btn'] ) : 'primary_btn';
		$instance['cta2_label'] = ( isset( $new_instance['cta2_label'] ) ) ? sanitize_text_field( $new_instance['cta2_label'] ) : '';
		$instance['cta2_url'] 	= ( isset( $new_instance['cta2_url'] ) ) ? esc_url_raw( $new_instance['cta2_url'] ) : '';
		$instance['cta2_btn']   = ( isset( $new_instance['cta2_btn'] ) ) ? sanitize_text_field( $new_instance['cta2_btn'] ) : 'primary_btn';
		$instance['inline'] 	= ( isset( $new_instance['inline'] ) ) ? sanitize_text_field( $new_instance['inline'] ) : '';
		return $instance;
	}


	function widget( $widget_args, $instance ) {

		$title 		= ( isset( $instance['title'] ) ) ? $instance['title'] : '';
		$subtitle 	= ( isset( $instance['subtitle'] ) ) ? $instance['subtitle'] : '';
		$inline 	= ( isset( $instance['inline'] ) ) ? $instance['inline'] : '';
		$cta_label  = ( isset( $instance['cta_label'] ) ) ? $instance['cta_label'] : '';
		$cta_url 	= ( isset( $instance['cta_url'] ) ) ? esc_url( $instance['cta_url'] ) : '';
		$cta_btn    = ( isset( $instance['cta_btn'] ) ) ? $instance['cta_btn'] : 'primary_btn';
		$cta2_label = ( isset( $instance['cta2_label'] ) ) ? $instance['cta2_label'] : '';
		$cta2_url 	= ( isset( $instance['cta2_url'] ) ) ? esc_url( $instance['cta2_url'] ) : '';
		$cta2_btn   = ( isset( $instance['cta2_btn'] ) ) ? $instance['cta2_btn'] : 'primary_btn';

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
		<div class="pb-compo compo-cta">
			<div class="compo-body compo-divider-body <?php if($inline){ echo 'inline-btn';} echo ' '.$c_align; ?>">

				<?php if( $inline ){ ?>

					<div class="flex-box">
						
							<div class='divider-text'>

							<?php if( $title ):?>

								<h2><?php esc_html_e( $title ); ?></h2>

							<?php endif;?>

							<?php if( $subtitle ):?>

								<p><?php esc_html_e( $subtitle ); ?></p>

							<?php endif;?>

							</div>

							<span div class="btns-wrap">
								<?php if( $cta_label): ?>

									<a href="<?php echo $cta_url;?>" class="deafBtn <?php echo esc_attr($cta_btn);?>"><?php echo esc_html($cta_label);?></a>

								<?php endif; ?>

								<?php if( $cta2_label): ?>

									<a href="<?php echo $cta2_url;?>" class="deafBtn <?php echo esc_attr($cta2_btn);?>"><?php echo esc_html($cta2_label);?></a>

								<?php endif; ?>
							</span>
						
					</div>

				<?php }else{ ?>

						<?php if( $title ):?>

							<h2><?php esc_html_e( $title ) ; ?></h2>

						<?php endif;?>

						<?php if( $subtitle ):?>

							<p><?php esc_html_e( $subtitle ) ; ?></p>

						<?php endif;?>

						<?php if( $cta_label): ?>

							<a href="<?php echo $cta_url;?>" class="deafBtn <?php echo esc_attr($cta_btn);?>"><?php echo esc_html($cta_label);?></a>

						<?php endif; ?>

						<?php if( $cta2_label): ?>

							<a href="<?php echo $cta2_url;?>" class="deafBtn <?php echo esc_attr($cta2_btn);?>"><?php echo esc_html($cta2_label);?></a>

						<?php endif; ?>

				<?php } ?>
			</div>
		</div>
		<?php
		if( isset($widget_args['after_widget'])){

			echo $widget_args['after_widget'];
		}
	}
}
endif;


if( ! function_exists( 'gtl_multipurpose_widget_divider' ) ):

	/**
	* Register and load widget.
	*/
	function gtl_multipurpose_widget_divider() {

		register_widget( 'GTL_Multipurpose_divider' );

	}
endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_divider' );
