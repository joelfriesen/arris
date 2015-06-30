<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package arrisdesign
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="accessible skip-link screen-reader-text" href="#main">[Skip to Content]</a>
<input type="checkbox" class="main-nav-check" id="main-nav-check" /> 
<label for="main-nav-check" class="toggle-menu">Navigation</label>
<nav class="menubar mobile-nav" id="mobile-nav">
<?php wp_nav_menu(array( 'theme_location' => 'secondary-menu', 'container_class' => 'container' ) );?>
</nav>

<div class="site-header">
	<div class="leftnavbar"></div>
	<div class="headcontanier">
		<div class="site-branding">
			<?php if ( get_theme_mod('site_logo') ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
			<?php else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>
		</div>
		<nav class="menubar main-nav" id="main-nav">
		    <div class="navarea">
		        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
		    </div>
		</nav>
	</div>	
</div>

<div id="content" class="site-content container">