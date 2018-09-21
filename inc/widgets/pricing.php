<?php

/**

 * Widget for pricing section

 * @package    	GTL_Multipurpose

 * @link        http://www.greenturtlelab.com/

 * since 	    1.0.0

 * Author:      Greenturtlelab

 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt

 */



if( ! class_exists( 'GTL_Multipurpose_pricing' ) ):



/**

 * Pricing section

 * Retrievs from pricing_tables custom post type 

 * @since 1.0.0

 */

class GTL_Multipurpose_pricing extends WP_Widget{



    function __construct(){



        parent::__construct(

                'gtl_pricing', 

                esc_html__( 'GTL Pricing', 'gtl-multipurpose' ), 

                array( 'description' => esc_html__( 'Displays pricing options', 'gtl-multipurpose' ) , 'panels_groups' => array( 'themewidgets' ) )

            );

    }



    function form( $instance ) {



        $title      = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

        $subtitle   = ! empty( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';

        $cat_id     = ! empty( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';

        $tax_id     = ! empty( $instance[ 'service_category' ] ) ? $instance[ 'service_category' ] : '';

        $no         = ! empty( $instance[ 'no' ] ) ? $instance[ 'no' ] : '';

        $column     = ! empty( $instance[ 'column' ] ) ? $instance[ 'column' ] : '3';

        $featured   = ! empty( $instance[ 'featured' ] ) ? $instance[ 'featured' ] : '';

        $cta_label  = ! empty( $instance[ 'cta_label' ] ) ? $instance[ 'cta_label' ] : '';

        $cta_url    = ! empty( $instance[ 'cta_url' ] ) ? esc_url($instance[ 'cta_url' ]) : '';

        $cta_btn    = ! empty( $instance[ 'cta_btn' ] ) ? $instance[ 'cta_btn' ] : '';

        $layout     = ! empty( $instance[ 'layout' ] ) ? $instance[ 'layout' ] : 'p1';



        ?>



        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'gtl-multipurpose' ); ?></label> 

            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

        </p>



        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_html_e( 'Subtitle:', 'gtl-multipurpose' ); ?></label> 

            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">

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

                <label for="<?php echo esc_attr( $this->get_field_id( 'pricing_category' ) ); ?>"><?php esc_html_e( 'Pricing Category:', 'gtl-multipurpose' ); ?></label>               

                <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'pricing_category' ) ); ?>">

                    <option value=""><?php _e( 'Select All' , 'gtl-multipurpose' ); ?></option>

                    <?php foreach( $taxs as $tax): $checked = $tax_id == $tax->term_id?'selected':'';  ?>

                        <option <?php echo $checked; ?> value="<?php echo $tax->term_id ?>"><?php echo $tax->name?></option>

                    <?php endforeach; ?>

                </select>

            </p>

        <?php endif; ?>



        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'column' ) ); ?>"><?php esc_html_e( 'Column ( 1 - 4 ):', 'gtl-multipurpose' ); ?></label> 

            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column' ) ); ?>" min="1" max="4" name="<?php echo esc_attr( $this->get_field_name( 'column' ) ); ?>" type="number" value="<?php echo esc_attr( $column ); ?>">

        </p>



        <p>

            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" type="checkbox" value="1" <?php if($featured){echo 'checked';}?>> <?php echo _e( 'Only display featured tables' , 'gtl-multipurpose' );?>

        </p>



        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>"><?php esc_html_e( 'No of Pricings ( Enter -1 to display all ):', 'gtl-multipurpose' ); ?></label> 

            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no' ) ); ?>" type="number" value="<?php echo esc_attr( $no ); ?>">

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



       



        <?php

    }





    function update( $new_instance, $old_instance ) {

        $instance                    = $old_instance;

        $instance['title']           = ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        $instance['subtitle']        = ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';

        $instance['category']        = ( isset( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';

        $instance['pricing_category']= ( isset( $new_instance['pricing_category'] ) ) ? sanitize_text_field( $new_instance['pricing_category'] ) : '';

        $instance['no']              = ( isset( $new_instance['no'] ) ) ? sanitize_text_field( $new_instance['no'] ) : '';

        $instance['column']          = ( isset( $new_instance['column'] ) ) ? sanitize_text_field( $new_instance['column'] ) : '';

        $instance['featured']        = ( isset( $new_instance['featured'] ) ) ? sanitize_text_field( $new_instance['featured'] ) : '';

        $instance['cta_label']       = ( isset( $new_instance['cta_label'] ) ) ? sanitize_text_field( $new_instance['cta_label'] ) : '';

        $instance['cta_url']         = ( isset( $new_instance['cta_url'] ) ) ? esc_url_raw( $new_instance['cta_url'] ) : '';

        $instance['cta_btn']         = ( isset( $new_instance['cta_btn'] ) ) ? sanitize_text_field( $new_instance['cta_btn'] ) : 'primary_btn';

        $instance['layout']          = ( isset( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';

        return $instance;

    }





    function widget( $widget_args, $instance ) {



        $title            = ( isset( $instance['title'] ) ) ?  $instance['title'] : '';

        $subtitle         = ( isset( $instance['subtitle'] ) ) ? $instance['subtitle'] : '';

        $category         = ( isset( $instance['category'] ) ) ? $instance['category'] : '';

        $pricing_category = ( isset( $instance['pricing_category'] ) ) ? $instance['pricing_category'] : '';

        $no               = ( isset( $instance['no'] ) ) ? $instance['no'] : '-1';

        $column           = ( isset( $instance['column'] ) ) ? $instance['column'] : '';

        $featured         = ( isset( $instance['featured'] ) ) ? $instance['featured'] : '';

        $layout           = ( isset( $instance['layout'] ) ) ? $instance['layout'] : 'p1';

        $cta_label        = ( isset( $instance['cta_label'] ) ) ? $instance['cta_label'] : '';

        $cta_url          = ( isset( $instance['cta_url'] ) ) ? esc_url( $instance['cta_url'] ) : '';

        $cta_btn          = ( isset( $instance['cta_btn'] ) ) ? $instance['cta_btn']:'primary_btn';



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

        $columnWrap = $this->columnWrap( $column );



        ?>

        <div class="pb-compo compo-pricing">



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



            <div class="compo-body compo-pricing-body <?php echo $c_align;?>">

                <div class="compo-price-table-item  <?php echo $columnWrap.' layout-'.$layout;?>" >

                    <?php 

                    $args = $this->queryArgs( $category , $pricing_category , $featured , $no );

                    $loop = new WP_Query( $args );

                    $i = 1;

                    while( $loop->have_posts()):$loop->the_post();

                        $price    = get_post_meta( get_the_ID() , 'gtl-pricing-price', true );

                        $duration = get_post_meta( get_the_ID() , 'gtl-pricing-duration', true );

                        $text     = get_post_meta( get_the_ID() , 'gtl-pricing-button-label', true );

                        $button_type = get_post_meta( get_the_ID() , 'gtl-pricing-button-type', true );

                        $link     = get_post_meta( get_the_ID() , 'gtl-pricing-button-link', true );

                        $currency = get_post_meta( get_the_ID() , 'gtl-pricing-currency', true );

                        $features = get_post_meta( get_the_ID() , 'gtl-pricing-features' , true );

                        $active   = '';



                        if( $i == 2 && $column == 3){



                           $active = 'compo-active';



                       }

                        ?>



                        <div class="compo-price-table-column table-<?php echo $i ;?>">

                            <div class="compo-price-table <?php echo $active;?>">

                                <div class="compo-header compo-price-table-head <?php echo $h_align;?>">



                                    <?php if( has_post_thumbnail() ):?>

                                        <div class="compo-price-table-image">

                                            <?php the_post_thumbnail('thumbnail');?>

                                        </div> 

                                    <?php endif;?>



                                    <h3 class="compo-price-table-title"><?php the_title();?></h3>

                                    <div class="compo-price-table-caption"><?php the_content();?></div>



                                </div>



                                <div class="compo-body compo-price-table-price compo-title-font <?php echo $h_align;?>">

                                    <span class="compo-price-prefix"><?php echo esc_html($currency) ;?></span>

                                    <span class="compo-price-table-price-number"><?php echo esc_html($price);?></span>



                                    <?php if($duration):?>

                                        <span class="compo-price-suffix"><?php echo esc_html($duration);?></span>

                                    <?php endif?>



                                </div>



                                <div class="compo-price-table-content-wrap">

                                    <div class="compo-price-table-content">

                                        <div class="compo-price-list <?php echo $c_align;?>">

                                            <ul>

                                                <?php 

                                                if( is_array( $features ) ):



                                                    foreach( $features as $f):

                                                ?>

                                                        <li><i class="fa fa-check"></i><?php echo $f['name'];?></li>

                                                <?php 

                                                    endforeach; 



                                                endif; 

                                                ?>

                                            </ul>

                                        </div>

                                    </div>

                                    <a class="deafBtn <?php echo $button_type?$button_type:'primary_btn';?>" href="<?php echo esc_url( $link ); ?>" target="_self"><?php echo esc_html( $text );?></a>

                                </div>

                            </div>

                        </div>

                    <?php $i++; endwhile; ?>

                    

                </div>



                <?php if( $cta_label): ?>



               <div class="compo-cta">

                        <a href="<?php echo esc_url( $cta_url );?>" class="deafBtn <?php echo esc_attr($cta_btn);?>"><?php echo esc_html($cta_label);?></a>

                    </div>



            <?php endif; ?>



            </div>

        </div>



        <?php



        if( isset($widget_args['after_widget'])){



            echo $widget_args['after_widget'];

        }

    }





    private function queryArgs( $category , $pricing_category , $featured , $no ){



        $tax_query = array();

        $meta_query = array();



        if( $category ){



            array_push( $tax_query , array( 'taxonomy' => 'category', 'field'    => 'term_id', 'terms'    => $category ) );

        }



        if( $pricing_category ){



            array_push( $tax_query , array( 'taxonomy' => 'service-category', 'field'    => 'term_id', 'terms'    => $pricing_category ) );

        }



        if( $featured ){



            array_push( $meta_query , array( 'key'     => 'gtl-is-featured', 'value'   => '1' ) );

        }



        return array( 

            'post_type'      => 'pricing_tables' , 

            'posts_per_page' => $no,

            'tax_query'      => $tax_query,

            'meta_query'     => $meta_query

            );

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

}

endif;





if( ! function_exists( 'gtl_multipurpose_widget_pricing' ) ) :

    

    /**

    * Register and load widget.

    */

    function gtl_multipurpose_widget_pricing() {



        register_widget( 'GTL_Multipurpose_pricing' );



    }



endif;

add_action( 'widgets_init', 'gtl_multipurpose_widget_pricing' );

