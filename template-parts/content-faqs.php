<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTL_Multipurpose
 */


?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'); ?>>
    <div class="article-wrap flex-box">
        
                    
        <div class="post-summary <?php if( ! gtl_multipurpose_feat_image()) echo 'full-width';?>">

           <h4><?php the_title();?></h4>
           <div class="ans"> <?php the_content() ?></div>
           
        </div>
    </div>
</div> 