<?php

/**
 * Template Name: Two Half Page Sidebars
 */

get_header(); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

        <!-- Content Area
        ================================================== -->
        <div class="container marketing">
            <div class="row">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <article class="blog-post">

                        <h1><?php the_title(); ?></h1>

                        <p class="blog-post-meta"><?php echo get_the_date('F j, Y'); ?> by <a href="#"><?php the_author(); ?></a></p>

                        <?php the_content(); ?>

                        <!--pagination array -->
                        <?php
                        $defaults = array(
                            'before'           => '<p class="pagination">',
                            'after'            => '</p>',
                            'link_before'      => '<span>',
                            'link_after'       => '</span>',
                            'next_or_number'   => 'number',
                            'separator'        => ' &nbsp;&nbsp;',
                            'nextpagelink'     => __( 'Next page' ),
                            'previouspagelink' => __( 'Previous page' ),
                            'pagelink'         => '%',
                            'echo'             => 1
                        );
                        wp_link_pages( $defaults );
                        ?>

                    </article><!-- /.blog-post -->

                <?php endwhile; else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
                </article>

                <div class="well">
                    <div class="screen-reader-response"></div>

                    <?php echo do_shortcode( '[contact-form-7 id="115" title="Contact form 1"]' ); ?>

            </div><!-- /.row -->

            <div class="row">

                <div class="col-sm-6">
                    
                    <?php get_sidebar('half1'); ?>
                    
                </div> <!-- /col -->

                <div class="col-sm-6">
                    <?php get_sidebar('half2'); ?>
                </div> <!-- /col -->

            </div><!-- /.row -->

    <?php get_footer(); ?>
