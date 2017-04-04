<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php bloginfo('name');?></title>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<section class="intro">
	<header class="main-header">
		<div class="container">
			<a class="logo" href="<?php echo home_url();?>"
				<?php the_custom_logo(); ?>
				<h1><?php bloginfo('name');?></h1>
			</a>
			<nav class="main-nav">
				<?php wp_nav_menu( array(
					'theme_location'  => 'main-nav',
					'container'       => false,
					'menu_class'      => 'menu-list hidden-sm-down'
				));
				?>
				<button class="menu-btn hidden-md-up"><i class="fa fa-align-justify" aria-hidden="true"></i></button>
			</nav>
		</div>
		<span class="line">line</span>
	</header>
</section>

<div id="content" class="site-content">
