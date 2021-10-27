<style>
    .wrapper-banner{
    position: relative;
    width: 100%;
    height: calc(100vh - 96px);
    background: #000000;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
}

.wrapper-banner .overlay{
 width: 100%;
 height: 100%;
 background-color: #000000;
 position: absolute;
 top:0;
 left: 0;
 opacity: 0.3;
 z-index: 1;
}

.wrapper-banner .container{
    z-index: 2;
    position: relative;
}

.wrapper-banner h1{
    color:var(--light-color);
    font-family: var(--primary-font-bold);
    font-size: 3.5em;
}

.carousel-caption{
    text-align: left;
}

.carousel-indicators [data-bs-target] {
    box-sizing: content-box;
    flex: 0 1 auto;
    width: 14px;
    height: 14px;
    padding: 0;
    border-radius: 100%;
    margin-right: 10px;
    margin-left: 10px;
    text-indent: -999px;
    cursor: pointer;
    background-color: transparent;
    border: 2px solid #FFF;
}

.carousel-indicators .active {
    background-color: #FFF;
}

@media (max-width: 600px)  {
    .wrapper-banner h1{
        font-size: 2.5em;
    }
}
</style>


<div id="banner" class="carousel slide cross-fade" data-bs-ride="carousel">
    <?php
    $args = array('post_type' => 'banners');
    $the_query = new WP_Query($args);
    ?>

<div class="carousel-indicators" style="z-index: 3;">
<?php $i = 0; ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <?php if ($i === 0) { $class = 'active';  } else { $class = '';} ?>
        <button type="button" data-bs-target="#banner" data-bs-slide-to="<?php echo $i;?>" class="<?php echo $class; ?>" aria-current="true" aria-label="Slide 1<?php echo $i;?>"></button>
        <?php $i++; ?>
    <?php endwhile; ?>
</div>

    <?php if ($the_query->have_posts()) : ?>
        <div class="carousel-inner">
            <?php $i = 0; ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php if ($i === 0) { $class = 'active';  } else { $class = '';} ?>

                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
                <?php $image = $image[0]; ?>

                <div class="carousel-item <?php echo $class; ?> wrapper-banner" data-bs-interval="5000" style="background-image: url('<?php echo $image; ?>');">
                    <div class="overlay"></div>
                    <div class="container center full-h">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1> <?php the_title(); ?> </h1>
                                <?php $current_post_meta = get_post_meta(get_the_id(), 'link'); ?>
                                <?php if(count($current_post_meta)) : ?>
                                    <a href="<?php echo $current_post_meta[0]; ?>" class="btn-primary">VER MÁS</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                
                </div>
                <?php $i++; ?>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php else :  ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</div>