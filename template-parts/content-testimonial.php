<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTL_Multipurpose
 */

    $name = get_post_meta( get_the_ID() , 'gtl-client-name' , true );
    $company = get_post_meta( get_the_ID() , 'gtl-company-name' , true );
    $designation = get_post_meta( get_the_ID() , 'gtl-client-designation' , true );
?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('card-design flex-wrapper'); ?>>


        <div class="image-holder border-radius-50  img-flex">
            <?php 

if( has_post_thumbnail() ){

  the_post_thumbnail( 'thumbnail' );

}else{

  echo '<img src="'.get_template_directory_uri().'/assets/images/user-default.jpg" height="100" width="100" alt="">';
}

?>
        </div>
                
                <div class="fig-caption caption-flex">
                    
                    
                    <?php the_content(); ?>
                    
                   
                  <div class="people-meta">
      <span class="name  opacity-7"><?php echo $name?$name:the_title();?></span>
      <?php if( $designation ): ?>
        <span class="dsn opacity-5" ><?php echo $designation; ?><?php if( $company ): ?>,<?php endif;?> </span>
      <?php endif; ?>
      <?php if( $company ): ?>
        <span class="cmp opacity-5"><?php echo $company; ?></span>
      <?php endif; ?>
      
    </div>
                </div>
            

</div>          
