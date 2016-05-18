
<?php get_header(); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <div class="row">
        <!-- Content Area
        ================================================== -->
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

<?php get_footer(); ?>