
<?php get_header(); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <div class="row">
        <!-- Content Area
        ================================================== -->
        <section id="content_area">
            <div class="col-sm-8">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <article class="blog-post">

                        <h1><?php the_title(); ?></h1>

                        <p class="blog-post-meta"><?php echo get_the_date('F j, Y'); ?> by <a href="#"><?php the_author(); ?></a></p>
                        <?php get_template_part( 'content', 'comments' ); ?>

                        <?php the_content(); ?>

                        <p>Posted in: <?php the_category(', ');?></p>

                        <p><?php the_tags();?></p>
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

                <div class="row">

                    <nav>
                        <div  class="post-navigation">
                            <ul >
                                <li><?php previous_post_link('%link', '<span class="btn"> &larr; Previous post in category </span>', TRUE); ?></li> &nbsp;
                                <li><?php next_post_link( '%link', '<span class="btn">Next post in category &rarr; </span>', TRUE); ?></li>
                            </ul>
                        </div>
                    </nav>

                </div> <!-- /.row-->

                <?php
                if ( comments_open() ) {
                    echo '<div class="well">';
                    comments_template();
                    echo '</div>';
                }
                ?>

            </div> <!-- /.col-sm-8 -->
        </section><!-- /#content_area -->
        <!-- Sidebar Area
        ================================================== -->
        <section id="sidebar">
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

                <?php get_sidebar(); ?>

        </section><!-- /#sidebar -->
    </div><!-- /.row -->

    

<?php get_footer(); ?>




