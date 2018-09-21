<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTL_Multipurpose
 */

get_header(); 
$sidebar = gtl_multipurpose_page_sidebar_pos();

if( ! $sidebar ){

  $row =  'aGrid';

}else if($sidebar=='left'){

  $row = 'col_2-30-70';

}else{

  $row = 'col_2-70-30';
}
?>

<?php get_template_part( 'template-parts/banner' );?>

    <section id="postList" class="jr-site-project-list  pd-t-100 pd-b-100 <?php echo $sidebar?'has-sidebar':'no-sidebar';?>">
    	<div class="<?php echo gtl_multipurpose_site_container();?> content-all">
 

    		<div class="<?php echo $row;?>">  
            
              
              <?php if( $sidebar == 'left' ):  get_sidebar();  endif; ?>        
                
    			<div class="cols">

                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    
                ?> 
                
                
               

    				 <?php 

    				 if ( have_posts() ) :
	    				 /* Start the Loop */
              echo '<div id="portfolioWork" class="item-wrap compo-portfolio-body layout-p1">';
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content' , 'project' );

						endwhile;
            echo '</div>';

                         do_action('gtl_multipurpose_posts_navigation'); 
						
					else :

					get_template_part( 'template-parts/content', 'none' );

					endif; ?>
    		 
             
    			
    			</div>
                <?php if( $sidebar == 'right' ):  get_sidebar();  endif; ?>   
    		</div>
    	</div>
    </section>
<?php

get_footer();
