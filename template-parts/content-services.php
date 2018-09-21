<?php 
$sidebar = gtl_multipurpose_services_sidebar_pos();
$col = $sidebar?'col-md-6':'col-md-4';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class($col); ?>>
    <div class="card-design">
    <?php if(has_post_thumbnail()):?>
        <div class="image-holder">
            <?php 
             the_post_thumbnail('gtl-multipurpose-img-330-200');
            ?>
            
        </div>
    <?php endif; ?>
        <a href="<?php echo the_permalink();?>">
        	<h3><?php the_title();?></h3>
        </a>
        
           <?php 
           the_excerpt();
           	?>
        
        <span class="underline"></span>
    </div>
</div>