
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
                    <?php if ( has_post_thumbnail() ) ; ?>
                    <?php echo '<div class="col-sm-6">' . '<a href=' . get_permalink() . '>' ; ?> <?php the_post_thumbnail('thumbnail', array('class' => "img-circle")); ?> <?php echo '</a></div>' ; ?>

                    <div <?php if ( has_post_thumbnail() ) {
                        echo 'class="col-sm-6">';
                    }
                    else {
                        echo 'class="col-xs-12">';
                    }
                    ?>
                    <?php the_excerpt(); ?>

                    <p class="archiveButton"><a class="btn" href="<?php the_permalink(); ?>" role="button">Read More &raquo;</a></p>

                    <?php if ( has_category()) { ?>
                        <p>Posted in: <?php the_category(', ') ?> </p>
                    <?php }  ?>

                    <?php if ( has_tags()) { ?>
                        <p>Tags: <?php the_tags(', ') ?> </p>
                    <?php }  ?>

            </div>

            <hr>
            </article><!-- /.blog-post -->

            <?php endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts included the words you typed in the search.' ); ?></p>
                <p>Try the search form again, or try checking in one of these categories:</p>
                <ul class="searchcatlist">
                    <?php wp_list_categories(array(
                        'title_li' => __( '' ),
                        'orderby' => 'title',
                        'order' => 'ASC',
                    ))
                    ?>
                </ul>
            <?php endif; ?>


            <nav>
                <div  class="post-navigation">
                    <ul >
                        <li><?php next_posts_link('<span class="btn">&larr; Older Posts</span>'); ?></li> &nbsp;
                        <li><?php previous_posts_link('<span class="btn">Newer Posts &rarr;</span>'); ?></li>
                    </ul>
                </div>
            </nav>
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