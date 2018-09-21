<?php
/**
 * Widget for title subtitle section
 *
 * @package    	GTL_Components
 * @link        http://www.greenturtlelab.com/
 * since 	    1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


if( ! class_exists( 'GTL_Multipurpose_title_subtitle' ) ):

	/**
	 * title subtitle section
	 * @since 1.0.0
	 */
class GTL_Multipurpose_title_subtitle extends WP_Widget{
		
	function __construct(){

		parent::__construct(
			'gtl_title_subtitle', 
			esc_html__( 'GTL Title and Subtitle', 'gtl-multipurpose' ), 
			array( 'description' => esc_html__( 'Displays text section with title and subtitle', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
		);

	}

	function form( $instance ) {

		$title 		= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$subtitle 	= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
		
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_html_e( 'Subtitle:', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">
		</p>
	
		<?php
	}

	function update( $new_instance, $old_instance ) {

		$instance 				= $old_instance;
		$instance['title'] 		= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] 	= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		return $instance;
	}

	function widget( $widget_args, $instance ) {

		$title = $instance['title'];
		$subtitle = $instance['subtitle'];

		if( isset($widget_args['before_widget'])){

			echo $widget_args['before_widget'];
		}
		?>
    
    
        <div class="pb-compo compo-title-subtitle">
          
             <div class="compo-body compo-title-subtitle-body">

	            <?php if( $subtitle ):?>

	        		<h4><?php echo esc_html( $subtitle ); ?></h4>

	    		<?php endif;?>

	            <?php if( $title ):?>

	        		<h1><?php echo esc_html($title); ?></h1>

	    		<?php endif;?>

             </div>   
           
            
        </div>               
                       
		<?php
		
		if( isset($widget_args['after_widget'])){

			echo $widget_args['after_widget'];
		}
	}
	}
endif;


if( ! function_exists( 'gtl_multipurpose_widget_title_subtitle' ) ):

	/**
     * Register and load widget.
     */
	function gtl_multipurpose_widget_title_subtitle() {

		register_widget( 'GTL_Multipurpose_title_subtitle' );

	}

endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_title_subtitle' );