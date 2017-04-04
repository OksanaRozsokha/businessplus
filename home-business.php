<?php
/*
Template Name: Business home
*/
get_header(); ?>
    <section class="about-us">
        <div class="container">
            <div class="head">
                <h2 class="title">
                    <?php echo get_theme_mod('about_title'); ?>
                </h2>
                <span class="text text-italic"><?php echo get_theme_mod('about_description'); ?></span>
            </div>
            <div class="content">
                <?php
                $the_slug = 'about-us';
                $args = array(
                    'name'           => $the_slug,
                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'posts_per_page' => 1
                );
                $query = new WP_Query( $args );
                if ($query->have_posts()):?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <p class="text">
                            <?php the_content(); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="btn" data-text="Read more"><span>read more</span></a>

                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section class="services">
        <div class="container">
            <h2 class="title"><?php echo get_theme_mod('services_title'); ?></h2>
            <span class="text text-italic"><?php echo get_theme_mod('services_description'); ?></span>

            <!-- custom post type -->
            <?php
            $query = new WP_Query( array('post_type' => 'services-reviews', 'posts_per_page' => 100 ) );
            if ($query->have_posts()):?>
                <ul class="services-list row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li class="col-sm-12 col-lg-6" <?php

                        if ( $thumbnail_id = get_post_thumbnail_id() ) {
                            if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'normal-bg' ) )
                                printf( ' style="background:  url(%s) no-repeat;"', $image_src[0] );
                        }

                        ?>>
                            <h3 class="title title-small"><?php the_title(); ?></h3>
                            <p class="text"><?php the_content(); ?></p>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; wp_reset_postdata(); ?>
                <a href="<?php the_permalink(); ?>" class="btn">Find Out More</a>
        </div>
    </section>

    <section class="our-clients">
        <div class="container">
            <h2 class="title"><?php echo get_theme_mod('clients_title'); ?></h2>
            <span class="text text-italic"><?php echo get_theme_mod('clients_description'); ?></span>
            <?php
            $query = new WP_Query( array('post_type' => 'slides-carousel', 'posts_per_page' => 100 ) );
            if ($query->have_posts()):?>
                <div class="owl-carousel slide-one owl-theme">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="slider-item">
                            <p class="text"><?php the_content();?></p>
                            <div class="client-info">
                                <?php the_post_thumbnail('full'); ?>
                                <h3 class="title title-small"><?php the_title(); ?></h3>
                                <span class="mini-description">Designation</span>
                            </div>

                        </div>
                    <?php endwhile; ?>
                </div>
                    <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="container">

            <!--    title in customiser    -->
            <h2 class="title"><?php echo get_theme_mod('news_title'); ?></h2>
            <span class="text text-italic"><?php echo get_theme_mod('news_description'); ?></span>
            <!--        -->

            <div class="news-post row">
                <div class="main-post col-xs-12 col-lg-6">

                    <!--  single post  -->
                    <?php
                    $the_slug = 'news';
                    $args = array(
                        'name'           => $the_slug,
                        'post_type'      => 'post',
                        'post_status'    => 'publish',
                        'posts_per_page' => 1
                    );
                    $query = new WP_Query( $args );
                    if ($query->have_posts()):?>
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <ul class="post-info">
                                <li class="date">
                                    <span class="big-date"><?php the_time('j') ?></span>
                                    <?php the_time('M-Y') ?>
                                </li>
                                <li class="comments-number"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li>
                                <li class="views-number"><?php setPostViews(get_the_ID()); ?></li>
                            </ul>
                            <div class="post-content">
                                <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                                <h3 class="title title-small"><?php the_title(); ?></h3>
                                <p class="text">
                                    <?php the_content(); ?>
                                </p>
                                <?php endwhile; ?>
                                <?php endif; wp_reset_postdata(); ?>
                            </div>

                </div>
                <div class="resent-posts col-xs-12 col-lg-6">
                    <?php
                    $n=2;
                    $recent = new WP_Query('showposts=$n');
                    while($recent->have_posts()) : $recent->the_post();
                        ?>
                        <article class="resent">
                            <h3 class="title title-small">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <span class="small-date"><?php the_time( 'j-M-Y' ); ?></span>
                            <p class="text"><?php the_excerpt(); ?></p>
                        </article>
                    <?php endwhile; ?>

                    <?php
                    $n=2;
                    $recent = new WP_Query('showposts=$n');
                    while($recent->have_posts()) : $recent->the_post();
                        ?>
                        <article class="resent">
                            <h3 class="title title-small">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <span class="small-date"><?php the_time( 'j-M-Y' ); ?></span>
                            <p class="text"><?php the_excerpt(); ?></p>
                        </article>
                    <?php endwhile; ?>
                    <a href="<?php the_permalink(); ?>" class="btn"><span>View more</span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="partners">
        <div class="container">
            <h2 class="title"><?php echo get_theme_mod('partners_title'); ?></h2>
            <span class="text text-italic"><?php echo get_theme_mod('partners_description'); ?></span>
                <?php
                $query = new WP_Query( array('post_type' => 'partners-carousel', 'posts_per_page' => 100 ) );
                if ($query->have_posts()):?>
                    <div class="owl-carousel slide-two owl-theme">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="slider-item">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; wp_reset_postdata(); ?>
            </div>

        </div>
    </section>

<?php get_footer(); ?>