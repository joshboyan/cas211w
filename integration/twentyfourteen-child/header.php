<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		</a>
	</div>
	<?php endif; ?>

	<div class="header">
		<div class="container">
			<div class="logo-menu">
				<div class="logo">
					<p><a href="#"><img src="http://pccwebdesign.com/student203/nifty/images/nifty-tours-logo.png" alt="Nifty Tours Logo"/></a></p>
				</div>
				<!--<a id="simple-menu" href="#sidr">Toggle menu</a>-->
				<div id="mobile-header">
					<a class="responsive-menu-button" href="#"><img src="http://pccwebdesign.com/student203/nifty/images/11.png"/></a>
				</div>
				<div class="menu" id="navigation">
					<ul>
						<li><a href="http://pccwebdesign.com/student203/nifty/index.html">Home</a></li>
						<li><a href="#features">Services</a></li>
						<li><a href="#stories">Stories</a></li>                                     <li><a href="#">Shop</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="clearit"></div>

	<div class="color-border">
	</div>
	<!-- End header-->

	<div id="main" class="site-main">
