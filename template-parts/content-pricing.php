<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTL_Multipurpose
 */

    $price    = get_post_meta( get_the_ID() , 'gtl-pricing-price', true );
    $duration = get_post_meta( get_the_ID() , 'gtl-pricing-duration', true );
    $text     = get_post_meta( get_the_ID() , 'gtl-pricing-button-label', true );
    $button_type = get_post_meta( get_the_ID() , 'gtl-pricing-button-type', true );
    $link     = get_post_meta( get_the_ID() , 'gtl-pricing-button-link', true );
    $currency = get_post_meta( get_the_ID() , 'gtl-pricing-currency', true );
    $features = get_post_meta( get_the_ID() , 'gtl-pricing-features' , true );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'compo-price-table-column' );?> >
    <div class="compo-price-table">
        <div class="compo-header compo-price-table-head center">

            <?php if( has_post_thumbnail() ):?>
                <div class="compo-price-table-image">
                    <?php the_post_thumbnail('thumbnail');?>
                </div> 
            <?php endif;?>

            <h3 class="compo-price-table-title"><?php the_title();?></h3>
            <div class="compo-price-table-caption"><?php the_content();?></div>

        </div>

        <div class="compo-body compo-price-table-price compo-title-font center">
            <span class="compo-price-prefix"><?php echo $currency ;?></span>
            <span class="compo-price-table-price-number"><?php echo $price;?></span>

            <?php if($duration):?>
                <span class="compo-price-suffix"><?php echo $duration;?></span>
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
            <a class="deafBtn primary_btn" href="<?php echo $link?>" target="_self"><?php echo $text;?></a>
        </div>
    </div>
</div>

         
