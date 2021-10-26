<?php get_header(); ?>
<div class="wrapper-container">
    <?php require('components/banner.component.php'); ?>
    <?php require('components/grid-products.component.php'); ?>
    
    <div class="container">
     
            <?php dynamic_sidebar('footer_widget'); ?>
        
    </div>
  
</div>
<?php get_footer(); ?>