<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business
 */

?>

	</div><!-- #content -->

<footer class="main-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-4">
				<?php the_custom_logo(); ?>
				<ul>
					<?php if(!dynamic_sidebar('footer-sidebar')) : ?>

					<?php endif; ?>
				</ul>
				<div class="footer-social">
					<a class="facebook" href="<?php echo get_theme_mod('social_links_facebook'); ?>">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>
					<a class="twitter" href="<?php echo get_theme_mod('social_links_twitter'); ?>">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
					<a class="google-plus" href="<?php echo get_theme_mod('social_links_google'); ?>">
						<i class="fa fa-google-plus" aria-hidden="true"></i>
					</a>
					<a class="linkedin" href="<?php echo get_theme_mod('social_links_instagram'); ?>">
						<i class="fa fa-linkedin" aria-hidden="true"></i>
					</a>
				</div>
			</div>
			<div class="footer-menu col-sm-12 col-md-3">
				<h2 class="title title-white title-small">Navigation</h2>
				<nav class="foot-nav">
					<?php wp_nav_menu( array(
						'theme_location'  => 'foot-nav',
						'container'       => false,
						'menu_class'      => 'foot-menu'
					));
					?>
				</nav>
			</div>
			<div class="contact-form col-sm-12 col-md-5">
				<h2 class="title title-white title-small">Quick contact us</h2>
				<?php echo do_shortcode("[cform-nd id=\"92\"]"); ?>
			</div>
		</div>

	</div>
</footer>


<?php wp_footer(); ?>

</body>
</html>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
