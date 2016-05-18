
<?php get_header('front'); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Marketing messaging and featured work
    ================================================== -->

    <section id="featured-work">
        <h2>Featured Work</h2>
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-sm-4" id="feature1">
                <a href="#"><img class="img-circle" src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/baguette.jpg" alt="Generic placeholder image"></a>
                <h3 class="feature-heading">Most Important</h3>
                <p>On mobile devices this will be the first thing users see after the carousel. This is where your most impressive offering should go. Gaze pattern mapping suggests this will generally be the first place desktop users look as well...</p>
                <p><a class="btn" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-sm-4 -->
            <div class="col-sm-4" id="feature2">
                <a href="#"><img class="img-circle" src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/pierogis-small.jpg" alt="Generic placeholder image"></a>
                <h3 class="feature-heading">What Are These?</h3>
                <p>These 3 section link to the other main pages of your site. The top navigation is a last resort for users. You are guiding their journey with well curated materials and beautiful images. Did you see that hover effect creating great user experiences? Yeah you did...</p>
                <p><a class="btn" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-sm-4 -->
            <div class="col-sm-4" id="feature3">
                <a href="#"><img class="img-circle" src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/grilled.jpg" alt="Generic placeholder image"></a>
                <h3 class="feature-heading">Setting These Images</h3>
                <p>Each of these sections links to a static page on your site. The picture is the featured image (and also the hero banner image) you set for that page. The heading that floats up over the picture is the title of that page. This text is in-fact the first text that appears on the page. All this lead to smooth page transitions and good UI...</p>
                <p><a class="btn" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-sm-4 -->
        </div><!-- /.row -->
    </section><!-- /featured work -->

    <!-- Shopping Banner
    ================================================== -->
    <section id="shopping">
        <div class="container-fluid shopping-banner">
            <div class="shopping-btn-container"><a role="button" class="btn btn-primary shopping-btn" href="#" role="button">Shop!</a></div>
        </div>
    </section><!-- /shopping-->

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