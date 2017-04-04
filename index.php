<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business
 */

get_header(); ?>
<section class="posts">
	<div class="container">
        <div class="head">
            <h2 class="title">Blog page</h2>
            <span class="text text-italic">Our featured Post</span>
        </div>
        <?php
        global $query_string;
        query_posts($query_string . '&cat=-4');
        ?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="post">
                <div class="author-img">
                    <?php $author_email = get_the_author_email();
                    echo get_avatar($author_email, 'full'); ?>
                </div>
                <div class="post-content">
                    <h3 class="title title-small">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <span class="date">Posted By<?php the_author(); ?>, <?php the_time('F j, Y '); ?></span>
                    <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                    <p class="text"><?php the_content(); ?></p>
                    <div class="share-btn"><span class="text">Share: </span><?php echo do_shortcode("[uptolike]"); ?></div>
                    <a href="<?php the_permalink(); ?>" class="btn">read more</a>
                </div>
            </div>

        <?php endwhile; ?>
            <div class="pagination">
                <?php
                global $wp_query;
                $big = 999999999; // need an unlikely integer
                echo paginate_links(array(
                    'paged'=>get_query_var('paged'),
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'total' => $wp_query->max_num_pages,
                    'show_all' => false,
                    'end_size'  => 0,
                    'mid_size' => 1,
                    'prev_next' => false,
                    'prev_text' => '',
                    'next_text' => '',
                    'current' => 1
                ));
                ?>
            </div>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
