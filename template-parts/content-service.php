<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTL_Multipurpose
 */

  $icon_class   = get_post_meta( get_the_ID(), 'gtl-service-icon' , true );
  $icon_color   = get_post_meta( get_the_ID(), 'gtl-service-icon-color' , true );
  $url        = get_post_meta( get_the_ID(), 'gtl-service-url', true );
  $single_page    = get_post_meta( get_the_ID(), 'gtl-enable-service-single', true );
  $new_tab      = get_post_meta( get_the_ID(), 'gtl-service-new-tab', true );
?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('item card-design'); ?>>

       
           <div class="icon-holder img-flex">
              <i style="color:<?php echo $icon_color;?>;" class="<?php echo $icon_class;?>" <?php if($icon_color){echo 'style="color:'.$icon_color.'"';}?>></i>
           </div>
            <div class="content-block fig-caption caption-flex">
              <h4><?php the_title(); ?></h4>
              <?php the_content(); ?>
              <?php 
              if( ( $url || $single_page )  ){
                  if( $url ){
                ?>
                    <a class="read-more" href="<?php echo $url;?>" <?php if($new_tab){echo 'target="_blank"';}?>>
                    <?php _e( 'Read More' , 'gtl-multipurpose');?></a>
                <?php 
                  }else if( $single_page ){
                ?>
                    <a class="read-more" href="<?php the_permalink();?>"><?php _e( 'Read More' , 'gtl-multipurpose'); ?></a>

                <?php 
                  }
                }
               ?>
            </div>
          


   

</div>          
