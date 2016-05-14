
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

                <?php the_excerpt(); ?>

                <p class="archiveButton"><a class="btn" href="<?php the_permalink(); ?>" role="button">Read More &raquo;</a></p>

                <p>Posted in: <?php the_category(', ');?></p>

                <p><?php the_tags();?></p>
                
            </article><!-- /.blog-post -->

            <?php endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
            </article>

            <div class="row">
                <a href="#">
                    <div class="col-md-6">
                        <div class="row post_nav">
                            <div class="col-xs-2">
                                <i class="fa fa-chevron-left"></i>
                            </div><!-- /.col-xs-2-->
                            <div class="col-xs-6">
                                <h4>Previous Post</h4>
                                <h4>Latest Work</h4>
                            </div><!-- /.col-xs-6-->
                            <div class="col-xs-4">
                                <img src="img/bento-thumb.jpg" alt="previous post featured image">
                            </div><!-- /.col-xs-4-->
                        </div><!-- /.row-->
                    </div><!-- /.col-md-6 -->
                </a>

                <a href="#">
                    <div class="col-md-6">
                        <div class="row post_nav">
                            <div class="col-xs-4">
                                <img src="img/appetizers-thumb.jpg" alt="previous post featured image">
                            </div><!-- /.col-xs-4-->
                            <div class="col-xs-6">
                                <h4>Next Post</h4>
                                <h4>Show What You Want</h4>
                            </div><!-- /.col-xs-6-->
                            <div class="col-xs-2">
                                <i class="fa fa-chevron-right"></i>
                            </div><!-- /.col-xs-2-->

                        </div><!-- /.row-->
                    </div><!-- /.col-md-6 -->
                </a>
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