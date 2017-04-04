<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package business
 **/
get_header(); ?>
	<section class="single-post-sec">
		<div class="container">
				<div class="head">
					<h2 class="title">Blog post</h2>
					<p class="text text-italic">Our featured Post</p>
				</div>
				<?php if (have_posts()):
					while (have_posts()): the_post(); ?>
						<article class="post post-single">
							<div class="author-img">
								<?php $author_email = get_the_author_email(); echo get_avatar($author_email, 'full');?>
							</div>
							<div class="post-content">
								<h3 class="title title-small">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<div class="date">
                                    <span>By
										<?php the_author(); ?>
                                    </span>
										<span><?php the_time( 'F j, Y ' ); ?></span>
								</div>
								<div class="img-wrap">
									<?php the_post_thumbnail('full', 'class=img-responsive'); ?>
								</div>
								<?php the_content(); ?>
								<div class="addition-content">
									<h3 class="title title-small"><?php echo get_theme_mod('single_title'); ?></h3>
									<p class="text"><?php echo get_theme_mod('single_text-1'); ?></p>
									<div class="importent-text"><?php echo get_theme_mod('single_text-read'); ?></div>
									<p class="text"><?php echo get_theme_mod('single_text-2'); ?></p>
								</div>
								<div class="share-btn"><span class="text">Share: </span><?php echo do_shortcode("[uptolike]"); ?></div>
						</article>
						<div class="admin-content">
							<div class="author-img">
								<?php $author_email = get_the_author_email(); echo get_avatar($author_email, 'full');?>
							</div>
							<div class="author-text">
								<h3 class="title title-small title-white">
									<?php global $current_user;
									get_currentuserinfo();
									echo $current_user->user_login . "\n";
									?>
								</h3>
								<p class="text text-white"><?php echo get_theme_mod('admins-content'); ?></p>
								<span class="triangle">triangle</span>
							</div>
						</div>
<!--						<div class="comments">--><?php //comments_template( ); ?><!--</div>-->
					<?php endwhile; ?>

				<?php else: ?>
					<p>No posts found</p>
				<?php endif; ?>
		</div>
	</section>
<?php get_footer();
