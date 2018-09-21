<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GTL_Multipurpose
 */

?>
<div class="cols is-sidebar secondary <?php echo gtl_multipurpose_get_sidebar_id();?>">
<?php dynamic_sidebar( gtl_multipurpose_get_sidebar_id() ); ?>
</div>