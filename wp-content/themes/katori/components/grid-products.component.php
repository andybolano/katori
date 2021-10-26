<style>
    .grid-products{
        margin-top: 40px;
    }

    .wrapper-image{
        text-align: center;
        border:4px solid var(--primary-color);
        border-radius: 10px;
    }

    .wrapper-image img{
       height: 220px;
    }

    .grid-products h2{
        font-weight: 900;
        margin-bottom: 30px;
    }

    .grid-products p, a{
        margin-top: 10px;
        font-weight: 900;
        font-size: 1.1em;
        color:var(--dark-color);
        text-decoration: none;
    }
</style>

<section class="grid-products">
   
<?php
    $args = array('post_type' => 'products');
    $the_query = new WP_Query($args);
    ?>

    <?php if ($the_query->have_posts()) : ?>
        <div class="container">
          <h2>Conoce nuestros productos</h2>
            <div class="row">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium'); ?>
                <?php $image = $image[0]; ?>
                <div class="col-lg-3">
                    <a href="<?php echo get_permalink() ?>">
                        <div class="wrapper-image">
                            <img src="<?php echo $image; ?>'">
                        </div>
                        <p><?php the_title(); ?></p>
                     </a>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php else :  ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</section>

