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
                    <?php if ( display_header_text() ) : ?>
                        <?php if ( get_theme_mod( 'unveil_logo' ) ) : ?>
                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <img src="<?php echo esc_url( get_theme_mod( 'unveil_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
                        <?php else : ?>
                            <a class="navbar-brand page-scroll" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse mynav" id="bs-example-navbar-collapse-1">
                   

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

        <div class="carousel-inner" role="listbox">
            <!-- First carousel slide -->
            <div class="item active blog-slide">
                <div class="container">
                    <ul class="carousel-social to_left">
                        <li><a class="btn social" href="#" target="_blank"><div class="sr-only">Facebook page</div><i class="fa fa-facebook fa-lg"></i></a></li>
                        <li><a class="btn social" href="#" target="_blank"><div class="sr-only">Twitter page</div><i class="fa
                        fa-twitter fa-lg"></i></a></li>
                        <li><a class="btn social" href="#" target="_blank"><div class="sr-only">Google+ page</div><i class="fa
                        fa-google-plus fa-lg"></i></a></li>
                        <li><a class="btn social" href="#" target="_blank"><div class="sr-only">Youtube page</div><i class="fa
                        fa-youtube fa-lg"></i></a></li>
                    </ul>
                    <div class="carousel-caption">
                        <h1>Curating This Section</h1>
                        <p>By default this section will show your last three posts. This section gets all of its images and copy from your latest post. Pretty easy huh? People are gonna think you are working so hard to maintain this masterpiece but the theme is designed to make looking good easy! </p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.carousel -->
</section><!-- /main image carousel -->
</header>
<div class="row">
    <?php
    if(is_category('lunch')) {
        echo '<h1>What \'s Cooking This Afternoon</h1>';
    }
    else {
        echo '<h1>What \'s Cooking</h1> ';
    }

    ?>
</div>