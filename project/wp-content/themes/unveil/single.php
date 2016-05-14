
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

                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                        <p class="blog-post-meta"><?php echo get_the_date('F j, Y'); ?> by <a href="#"><?php the_author(); ?></a></p>

                        <?php the_content(); ?>

                        <p>Posted in: <?php the_category(', ');?></p>

                        <p><?php the_tags();?></p>

                    </article><!-- /.blog-post -->

                <?php endwhile; else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
                </article>

                <div class="row">

                    <ul>

                        <li><?php previous_post_link('%link', '&larr; Previous post in category', TRUE); ?></li>

                        <li><?php next_post_link('%link', 'Next post in category &rarr;', TRUE); ?></li>
                    </ul>
                    

                </div> <!-- /.row-->
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




