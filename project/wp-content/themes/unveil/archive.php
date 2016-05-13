
<?php get_header(); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
<div class="row">
    <!-- Content Area
    ================================================== -->
    <section id="content_area">
        <div class="col-sm-8">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="blog-post">

                <h1><a href="<?php the_permalink(); ?>"></a><?php the_title(); ?></a></h1>

                <p class="blog-post-meta"><?php echo get_the_date('F j, Y'); ?> by <a href="#"><?php the_author(); ?></a></p>

                <?php the_excerpt(); ?>

                <p class="archiveButton"><a class="btn" href="<?php the_permalink(); ?>" role="button">Read More &raquo;</a></p>
            </div><!-- /.blog-post -->

            <?php endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

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