<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTL_Multipurpose
 */


?>

                    

                  <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-<?php the_ID();?>" aria-expanded="true" aria-controls="collapse-<?php the_ID();?>">
                      <div class="themes-toggle-heading"> <i class="fa fa-caret-right" aria-hidden="true"></i> <?php the_title();?></div>
                    </a>
                    </h5>
                  </div>
                  <div id="collapse-<?php the_ID();?>" class="active collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      
                      <?php the_content();?>
                      
                    </div>
                  </div>
              