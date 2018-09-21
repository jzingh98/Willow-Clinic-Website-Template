<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTL_Multipurpose
 */

    $url        = get_post_meta( get_the_ID(), 'gtl-project-url', true );
    $single_page    = get_post_meta( get_the_ID(), 'gtl-enable-project-single', true );
    $new_tab      = get_post_meta( get_the_ID(), 'gtl-project-new-tab', true );
?>


       <div id="post-<?php the_ID(); ?>"  <?php post_class('tile scale-anm all '); ?> >
              <div class="zoom-effect">
                <?php the_post_thumbnail( 'gtl-multipurpose-img-400-400' );?>
              </div>
              <div class="p-overlay">
                <div class="p-inner">
                   <h3><?php the_title();?></h3>
                   <?php the_excerpt();?>
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
            </div>
       
