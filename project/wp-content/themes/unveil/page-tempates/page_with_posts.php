<?php

/**
 * Template Name: Custom Page with Posts
 */

get_header(); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Marketing messaging and featured work
    ================================================== -->
    <div class="row">
        <section id="content_area">
            <div class="col-xs-12">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <article class="blog-post">

                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

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

            </div> <!-- /.col-sm-8 -->
        </section><!-- /#content_area -->
    </div><!-- /.row -->

    <!-- Latest work and news
    ================================================== -->
    <section id="latest work and news">
        <h2>Latest Work and News</h2>
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <?php
            $recent_posts = new WP_Query();
            $recent_posts->query('orderby=date&posts_per_page=3&category_name=news');
            $feature_number = 4;
            ?>
            <?php if ( $recent_posts->have_posts() ) : ?>
                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                    <div class="col-sm-4" id="<?php echo 'feature' . $feature_number ?>">
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail', array('class' => "img-circle")); ?></a>
                        <h3 class="feature-heading"><?php the_title(); ?></a></h3>
                        <?php the_excerpt(); ?>
                        <p><a class="btn" href="<?php the_permalink() ?>" role="button">View details &raquo;</a></p>
                    </div><!-- /.cols -->
                    <?php $feature_number = $feature_number + 1 ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="col-xs-12 news-section"><p><?php _e( 'No posts have been created yet in the Services category.<br>
Add that category and create posts.<br>Be sure to give each post a featured image.' ); ?></p></div><!-- /.col -->
            <?php endif; ?>

        </div><!-- /.col-sm-4 -->
</div><!-- /.row -->
</section><!-- /latest work and news -->

<!-- Footer information
================================================== -->

<?php get_footer(); ?>
