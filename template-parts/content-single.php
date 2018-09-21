<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTL_Multipurpose
 */
$post_type = get_post_type();
?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'); ?>>
    <div class="article-wrap flex-box">
         <div class="post-details">
                    <?php 
                        if( $post_type == 'post' ){

                            echo  gtl_multipurpose_post_single_title();

                        }else{

                            the_title('<h1 class="page-title">','</h1>');
                        }
                        
                   
                    ?>
                    
                        <?php if( gtl_multipurpose_single_feat_image() ):?>
                            
                            <div class="image-holder">
                        
                                <?php the_post_thumbnail('gtl-multipurpose-img-1200-600'); ?>
                        
                            </div>
                    <?php endif; ?>
                    
            
                    
        <div class="post-detail">
           <?php the_content(); ?>
        </div>
    </div>
</div> 
</div>