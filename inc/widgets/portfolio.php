<?php
/**
 * Widget for portfolio
 * @package    	GTL_Components
 * @link        http://www.greenturtlelab.com/
 * since 	    1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


if( ! class_exists( 'GTL_Multipurpose_portfolio' ) ):

/**
 * Portfolio section
 * Retrievs from project custom post type 
 * @since 1.0.0
 */
class GTL_Multipurpose_portfolio extends WP_Widget{

	function __construct(){

		parent::__construct(
				'gtl_portfolio', 
				esc_html__( 'GTL Portfolio/projects', 'gtl-multipurpose' ), 
				array( 'description' => esc_html__( 'Displays Clients logo', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )
			);
	}


	function form( $instance ) {

		$title 		= ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$subtitle 	= ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
		$tab  		= ! empty( $instance[ 'tab' ] ) ? $instance[ 'tab' ] : '';
		$cat_id 	= ! empty( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$tax_id 	= ! empty( $instance[ 'portfolio_category' ] ) ? $instance[ 'portfolio_category' ] : '';
		$read_more 	= ! empty( $instance[ 'read_more' ] ) ? $instance[ 'read_more' ] : __('Read More' , 'gtl-multipurpose' );
		$excerpt_display = ! empty( $instance[ 'excerpt_display' ] ) ? $instance[ 'excerpt_display' ] :''; 
		$featured 	= ! empty( $instance[ 'featured' ] ) ? $instance[ 'featured' ] : '';
		$exclude_un = ! empty( $instance[ 'exclude_un' ] ) ? $instance[ 'exclude_un' ] : '';
		$no 		= ! empty( $instance[ 'no' ] ) ? $instance[ 'no' ] : '';
		$column 	= ! empty( $instance[ 'column' ] ) ? $instance[ 'column' ] : '4';
		$cta_label 	= ! empty( $instance[ 'cta_label' ] ) ? $instance[ 'cta_label' ] : '';
		$cta_url 	= ! empty( $instance[ 'cta_url' ] ) ? esc_url($instance[ 'cta_url' ]) : '';
		$cta_btn 	= ! empty( $instance[ 'cta_btn' ] ) ? $instance[ 'cta_btn' ] : '';
		$layout 	= ! empty( $instance[ 'layout' ] ) ? $instance[ 'layout' ] : 'p1';
		$cats = gtl_multipurpose_post_type_category( 'portfolio' );
		$taxs = gtl_multipurpose_post_type_taxonomy( 'portfolio' , 'portfolio-category' );

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
			<label for="<?php echo esc_attr( $this->get_field_id( 'tab' ) ); ?>"><?php esc_html_e( 'Select tab labels:', 'gtl-multipurpose' ); ?></label> 
			<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'tab' ) ); ?>">
				<option <?php echo $tab == 'no-tab'?'selected':''; ?> value="no-tab"><?php esc_html_e( 'No Tab' , 'gtl-multipurpose' )?></option>
				<option <?php echo $tab == 'category'?'selected':''; ?> value="category"><?php esc_html_e( 'Category' , 'gtl-multipurpose' )?></option>
				<option <?php echo $tab == 'project-category'?'selected':''; ?> value="project-category"><?php esc_html_e( 'Portfolio Category' , 'gtl-multipurpose' )?></option>
			</select>
		</p>

		<p>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'exclude_un' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'exclude_un' ) ); ?>" type="checkbox" value="1" <?php if($exclude_un){echo 'checked';}?>> <?php echo esc_html_e( 'Exclude Uncategorized (Applicable with wordpress default category)' , 'gtl-multipurpose' );?>
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
				<label for="<?php echo esc_attr( $this->get_field_id( 'portfolio_category' ) ); ?>"><?php esc_html_e( 'Portfolio Category:', 'gtl-multipurpose' ); ?></label> 				
				<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'portfolio_category' ) ); ?>">
					<option value=""><?php _e( 'Select All' , 'gtl-multipurpose' ); ?></option>
					<?php foreach( $taxs as $tax): $checked = $tax_id == $tax->term_id?'selected':'';  ?>
						<option <?php echo $checked; ?> value="<?php echo $tax->term_id ?>"><?php echo $tax->name?></option>
					<?php endforeach; ?>
				</select>
			</p>
		<?php endif; ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>"><?php esc_html_e( 'No of Projects ( Enter -1 to display all ):', 'gtl-multipurpose' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no' ) ); ?>" type="number" value="<?php echo esc_attr( $no ); ?>">
		</p>

		<p>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" type="checkbox" value="1" <?php if($featured){echo 'checked';}?>> <?php echo _e( 'Only display featured projects' , 'gtl-multipurpose' );?>
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
			<div class="row">
				<label><?php esc_html_e( 'Layout:', 'gtl-multipurpose' ); ?></label> 
				<div class="col col-6 va-m">
					<input type="radio" value="p1" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='p1'?'checked':'';?>>
					<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/portfolio-1.png">
				</div>
				<div class="col col-6 va-m">
					<input type="radio" value="p2" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" <?php echo $layout=='p2'?'checked':'';?>>
					<img src="<?php echo get_template_directory_uri()?>/assets/admin/images/portfolio-2.png">
				</div>
			</div>
			
		</div>
		<?php
	}


	function update( $new_instance, $old_instance ) {

		$instance 					= $old_instance;
		$instance['title'] 			= ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] 		= ( isset( $new_instance['subtitle'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['tab'] 			= ( isset( $new_instance['tab'] ) ) ? sanitize_text_field( $new_instance['tab'] ) : '';
		$instance['category'] 		= ( isset( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
		$instance['portfolio_category']= ( isset( $new_instance['portfolio_category'] ) ) ? sanitize_text_field( $new_instance['portfolio_category'] ) : '';
		$instance['no'] 			= ( isset( $new_instance['no'] ) ) ? sanitize_text_field( $new_instance['no'] ) : '';
		$instance['featured'] 		= ( isset( $new_instance['featured'] ) ) ? sanitize_text_field( $new_instance['featured'] ) : '';
		$instance['read_more'] 		= ( isset( $new_instance['read_more'] ) ) ? sanitize_text_field( $new_instance['read_more'] ) : '';
		$instance['excerpt_display']= ( isset( $new_instance['excerpt_display'] ) ) ? sanitize_text_field( $new_instance['excerpt_display'] ) : '';
		$instance['exclude_un'] 	= ( isset( $new_instance['exclude_un'] ) ) ? sanitize_text_field( $new_instance['exclude_un'] ) : '';
		$instance['cta_label'] 		= ( isset( $new_instance['cta_label'] ) ) ? sanitize_text_field( $new_instance['cta_label'] ) : '';
		$instance['cta_url'] 		= ( isset( $new_instance['cta_url'] ) ) ? esc_url_raw( $new_instance['cta_url'] ) : '';
		$instance['cta_btn']   		= ( isset( $new_instance['cta_btn'] ) ) ? sanitize_text_field( $new_instance['cta_btn'] ) : 'primary_btn';
		$instance['layout'] 		= ( isset( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : 'p1';	
		return $instance;
	}


	function widget( $widget_args, $instance ) {

		$title 			 = ( isset( $instance['title'] ) )?$instance['title']:'';
		$subtitle 		 = ( isset( $instance['subtitle'] ) )?$instance['subtitle']:'';	
		$tab 		 	 = ( isset( $instance['tab'] ) )?$instance['tab']:'category';	
		$category 		 = ( isset( $instance['category'] ) )?$instance['category']:'';
		$portfolio_category = ( isset( $instance['portfolio_category'] ) )?$instance['portfolio_category']:'';
		$no 			 = ( isset( $instance['no'] ) )?$instance['no']:'-1';
		$column 		 = ( isset( $instance['column'] ) )?$instance['column']:'';
		$featured 		 = ( isset( $instance['featured'] ) )?$instance['featured']:'';
		$read_more 		 = ( isset( $instance['read_more'] ) )?$instance['read_more']:'' ;
		$excerpt_display = ( isset( $instance['excerpt_display'] ) )?$instance['excerpt_display']:'';
		$exclude_un 	 = ( isset( $instance['exclude_un'] ) )?$instance['exclude_un']:'';
		$cta_label 		 = ( isset( $instance['cta_label'] ) )?$instance['cta_label']:'';
		$cta_url 		 = ( isset( $instance['cta_url'] ) )?$instance['cta_url']:'';
		$cta_btn   		 = ( isset( $instance['cta_btn'] ) ) ? $instance['cta_btn']:'primary_btn';
		$layout 		 = ( isset( $instance['layout'] ) )?$instance['layout']:'p1';

		$imageSize = $this->imageSize( $layout );

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

		<div class="pb-compo compo-portfolio">
			<?php

			$args = $this->queryArgs( $category , $portfolio_category , $featured , $no );
			$loop = new WP_Query( $args );

			?>
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

			<div class="compo-body compo-portfolio-body  layout-<?php echo $layout.' '.$c_align;; ?>">
				<?php
				$args = $this->queryArgs( $category , $portfolio_category , $featured , $no );
				$loop = new WP_Query( $args );
				?>
				<?php 
				if( $tab != 'no-tab' ):

					$tab_labels = get_terms( array( 'taxonomy' => $tab , 'post_type' => 'projects' ) );
					if( ! is_wp_error( $tab_labels ) && !empty( $tab_labels ) ){

						echo ' <div class="toolbar mb2 mt2">';
						echo '<a class="p-btn fil-cat active-work" href="" data-rel="all">'.__('All' , 'gtl-multipurpose' ).'</a>';
						foreach( $tab_labels as $label ):
							if( $exclude_un ){
								if( $label->term_id == 1 ){continue;}
							}
							?>
							<a class="p-btn fil-cat " href="" data-rel="<?php echo $label->slug?>"><?php echo $label->name;?></a>
							<?php 
						endforeach;

					} 
					echo '</div><div style="clear:both;"></div>';

				endif;
				?>
				<div id="portfolioWork">
					<?php
					while( $loop->have_posts()):$loop->the_post();
						$cat_class = gtl_multipurpose_post_type_category_css_class( get_the_ID() , $tab )
						?>
						<div class="tile scale-anm <?php echo $cat_class;?> all">
							<div class="zoom-effect">
								<?php the_post_thumbnail( $imageSize );?>
							</div>
							<div class="p-overlay">
								<div class="p-inner">
									<?php $this->title();?>
									<?php $this->content( $excerpt_display);?>
									<?php $this-> readMoreLink( $read_more );?>
								</div>
							</div>
						</div>
				<?php endwhile?>
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


	private function title(){

		$url 		    = get_post_meta( get_the_ID(), 'gtl-project-url', true );
		$single_page    = get_post_meta( get_the_ID(), 'gtl-enable-project-single', true );
		$new_tab    	= get_post_meta( get_the_ID(), 'gtl-project-new-tab', true );
		if( $url ){
		?>
			<a href="<?php echo $url;?>" <?php if($new_tab){echo 'target="_blank"';}?>><h3><?php the_title();?></h3></a>

		<?php 
		}else if( $single_page ){
		?>
			<a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>

		<?php 
		}else{
		?>
			<h3><?php the_title();?></h3>

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


	private function readMoreLink( $read_more ){

		$url 		    = get_post_meta( get_the_ID(), 'gtl-project-url', true );
		$single_page    = get_post_meta( get_the_ID(), 'gtl-enable-project-single', true );
		$new_tab    	= get_post_meta( get_the_ID(), 'gtl-project-new-tab', true );

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


	private function queryArgs( $category , $portfolio_category , $featured , $no ){

			$tax_query = array();
			$meta_query = array();
			if( $category ){

				array_push( $tax_query , array( 'taxonomy' => 'category', 'field'    => 'term_id', 'terms'    => $category ) );
			}

			if( $portfolio_category ){

				array_push( $tax_query , array( 'taxonomy' => 'project-category', 'field'    => 'term_id', 'terms'    => $portfolio_category ) );
			}

			if( $featured ){

				array_push( $meta_query , array( 'key'     => 'gtl-is-featured', 'value'   => '1' ) );
			} 

			return $args = array( 
				'post_type' => 'projects' , 
				'posts_per_page' => $no,
				'tax_query' 	 => $tax_query,
				'meta_query' 	 => $meta_query
				);
	}

 private function imageSize( $layout ){

 	$imageSize = 'gtl-multipurpose-img-400-null';

 	if( $layout == 'p2' ){

 		$imageSize = 'gtl-multipurpose-img-400-400';
 	}
 	return $imageSize;

 }


}
endif;


if( ! function_exists( 'gtl_multipurpose_widget_portfolio' ) ):

	/**
	* Register and load widget.
	*/
	function gtl_multipurpose_widget_portfolio() {

		register_widget( 'GTL_Multipurpose_portfolio' );

	}

endif;
add_action( 'widgets_init', 'gtl_multipurpose_widget_portfolio' );