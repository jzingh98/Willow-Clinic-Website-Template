<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTL_Multipurpose
 */

$sidebar     = gtl_multipurpose_post_archive_sidebar_pos();
$facebook    = get_post_meta( get_the_ID() , 'gtl-team-facebook', true ) ;
$twitter     = get_post_meta( get_the_ID() , 'gtl-team-twitter', true ) ;
$google      = get_post_meta( get_the_ID() , 'gtl-team-google-plus', true ) ;
$linkedin    = get_post_meta( get_the_ID() , 'gtl-team-linkedin', true ) ;
$instagram   = get_post_meta( get_the_ID() , 'gtl-team-instagram', true ) ;
$link        = get_post_meta( get_the_ID() , 'gtl-team-url', true ) ;
$new_tab     = get_post_meta( get_the_ID() , 'gtl-team-new-tab', true ) ;
?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>

    <div class="person-img-wrap">
        <div class="person-img">
        <?php the_post_thumbnail( 'gtl-multipurpose-img-300-400' ); ?>
        </div>
        <div class="connect">

            <?php if($facebook):?>
                <a href="<?php echo $facebook;?>" target="_blank"><i class="fab fa-facebook-f"></i> </a>
            <?php endif?>

            <?php if($twitter):?>
                <a href="<?php echo $twitter;?>" target="_blank"><i class="fab fa-twitter"></i> </a>
            <?php endif?>

            <?php if($google):?>
                <a href="<?php echo $google;?>"target="_blank"><i class="fab fa-google"></i> </a>
            <?php endif?>

            <?php if($linkedin):?>
                <a href="<?php echo $linkedin;?>" target="_blank"><i class="fab fa-linkedin-in"></i> </a>
            <?php endif?>

            <?php if($instagram):?>
                <a href="<?php echo $instagram;?>" target="_blank"><i class="fab fa-instagram "></i> </a>
            <?php endif?>

            <?php if($link):?>
                <a href="<?php echo $link;?>" <?php echo $new_tab?'target="_blank"':'';?>><i class="fas fa-link "></i> </a>
            <?php endif?>


        </div>
    </div>


    <div class="name">

        <?php the_title();?>

    </div>

    <div class="position opacity-8">
        <?php echo get_post_meta( get_the_ID(), 'gtl-team-designation', true );?>
    </div>

</div>          
