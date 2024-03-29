<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTL_Multipurpose
 */

$sidebar = gtl_multipurpose_post_archive_sidebar_pos();
$imageSize = 'gtl-multipurpose-img-700-400';
if( ! $sidebar ){
   $imageSize = 'gtl-multipurpose-img-1200-600'; 
}
?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'); ?>>
    <div class="article-wrap">
        
           
                    
        <div class="post-summary <?php if( ! gtl_multipurpose_feat_image()) echo 'full-width';?>">

            <?php if( ! esc_attr( get_theme_mod( 'hide_meta_index' ) )  && ( 'post' == get_post_type() ) ):?>
                <?php gtl_multipurpose_author();?>                               
                <?php gtl_multipurpose_posted_on(); ?>
            <?php endif;?>

            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>

            <?php gtl_multipurpose_categories(); ?>     
            <?php gtl_multipurpose_comment_count(); ?>
           

             <?php if( gtl_multipurpose_feat_image() ):?>
                <div class="article-img-wrap">
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $imageSize ); ?></a>
                </div>
            <?php endif; ?>
            <?php gtl_multipurpose_post_excerpt(); ?>
            <a href="<?php the_permalink();?>" class="deafBtn <?php gtl_multipurpose_blog_read_more_btn(); ?>"><?php  echo gtl_multipurpose_blog_read_more_label();?></a>
        </div>
    </div>
</div>          
