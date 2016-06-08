<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <?php wp_head(); ?>
</head>
<!-- NAVBAR
================================================== -->
<body <?php body_class(); ?>>
<section id="main navigation">
    <header class="masthead">
        <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php if ( get_theme_mod( 'unveil_logo' ) ) : ?>
                        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <img src="<?php echo esc_url( get_theme_mod( 'unveil_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
                    <?php else : ?>
                        <a class="navbar-brand page-scroll" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                    <?php endif; ?>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse mynav" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form navbar-right" role="search" action="/search" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control " placeholder="Search" id="sitesearch" name="query">
                            <button type="submit" class="btn form-btn fa fa-search"></button>
                        </div>
                    </form>

                    <?php
                    wp_nav_menu( array(
                            'menu'              => 'primary',
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => false,
                            'menu_class'        => 'nav navbar-nav navbar-right',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                    );
                    ?>

                </div><!-- /.navbar-collapse -->

            </div><!-- /.container-fluid -->
        </nav>
</section><!-- /main navigation-->

<!-- Carousel
================================================== -->
<section id="main image carousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- First carousel slide -->
            <div class="item active first-slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?php echo get_theme_mod( 'first_slide_header', 'Unveil Visual Showcase' ); ?></h1>
                        <p><?php echo get_theme_mod( 'first_slide_text', 'Describe the slide and where the CTA will take them.' ); ?></p>
                        <p><a role="button" class="btn btn-lg" href="><?php echo get_theme_mod( 'first_slide_cta_link' ); ?>" role="button"><?php echo get_theme_mod( 'first_slide_cta_title', 'Sign Up Today!' ); ?></a></p>
                    </div>
                </div>
            </div>
            <!-- Second carousel slide -->
            <div class="item second-slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?php echo get_theme_mod( 'second_slide_header', 'Unveil Visual Showcase' ); ?></h1>
                        <p><?php echo get_theme_mod( 'second_slide_text', 'Describe the slide and where the CTA will take them.' ); ?></p>
                        <p><a role="button" class="btn btn-lg" href="><?php echo get_theme_mod( 'second_slide_cta_link' ); ?>" role="button"><?php echo get_theme_mod( 'second_slide_cta_title', 'Sign Up Today!' ); ?></a></p>
                    </div>
                </div>
            </div>
            <!-- Third carousel slide -->
            <div class="item third-slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?php echo get_theme_mod( 'third_slide_header', 'Unveil Visual Showcase' ); ?></h1>
                        <p><?php echo get_theme_mod( 'third_slide_text', 'Describe the slide and where the CTA will take them.' ); ?></p>
                        <p><a role="button" class="btn btn-lg" href="><?php echo get_theme_mod( 'third_slide_cta_link' ); ?>" role="button"><?php echo get_theme_mod( 'third_slide_cta_title', 'Sign Up Today!' ); ?></a></p>
                    </div>
                </div>
            </div><!-- End third slide -->
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="fa fa-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- /.carousel -->
</section><!-- /main image carousel -->
</header>