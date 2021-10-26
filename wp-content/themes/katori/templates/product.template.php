<?php
/*
Template Name: Plantilla productos
Template Post Type: products
*/
?>

<style>
    .product-detail 
    h1, 
    h3,
    p{
        font-weight: 900;
    }

    .product-detail h3{
        font-weight: 900;
        font-size: 1.5em;
        margin-bottom: 20px;
    }

    .product-detail p{
        font-weight: 900;
        font-size: 1.2em;
    }

    .product-detail strong{
        font-family: var(--primary-font-bold);
    }
</style>

<?php get_header(); ?>
<div class="wrapper-container">
    <section class="container product-detail">
        <div class="row">
                <div class="col-lg-12">
                        <?php while(have_posts()): the_post(); ?>

                           <h1> <?php the_title();?> </h1>

                           <p>
                                <?php
                                    the_content();
                                    endwhile;
                                ?>
                            </p>
                </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>