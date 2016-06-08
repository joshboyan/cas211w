
<?php get_header('front'); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Marketing messaging and featured work
    ================================================== -->

    <section id="featured-work">
        <h2><?php get_theme_mod( 'welcome_title', 'Featured Work' ); ?></h2>
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-sm-4" id="feature1">
                <a href="<?php echo get_theme_mod( 'first_marketing_cta_link' ); ?>"><img class="img-circle" src="<?php echo get_theme_mod( 'unveil_first_marketing' ); ?>" alt="<?php echo get_theme_mod( 'first_marketing_alt' ); ?>"></a>
                <h3 class="feature-heading"><?php echo get_theme_mod( 'first_marketing_header', 'Most Important' ); ?></h3>
                <p><?php echo get_theme_mod( 'first_marketing_text', 'Describe the slide and where the CTA will take them.' ); ?></p>
                <p><a class="btn" href="<?php echo get_theme_mod( 'first_marketing_cta_link' ); ?>" role="button"><?php echo get_theme_mod( 'first_marketing_cta_title', 'Sign Up Today!' ); ?></a></p>
            </div><!-- /.col-sm-4 -->
            <div class="col-sm-4" id="feature2">
                <a href="<?php echo get_theme_mod( 'second_marketing_cta_link' ); ?>"><img class="img-circle" src="<?php echo get_theme_mod( 'unveil_second_marketing' ); ?>" alt="<?php echo get_theme_mod( 'second_marketing_alt' ); ?>"></a>
                <h3 class="feature-heading"><?php echo get_theme_mod( 'second_marketing_header', 'Most Important' ); ?></h3>
                <p><?php echo get_theme_mod( 'second_marketing_text', 'Describe the slide and where the CTA will take them.' ); ?></p>
                <p><a class="btn" href="<?php echo get_theme_mod( 'second_marketing_cta_link' ); ?>" role="button"><?php echo get_theme_mod( 'second_marketing_cta_title', 'Sign Up Today!' ); ?></a></p>
            </div><!-- /.col-sm-4 -->
            <div class="col-sm-4" id="feature3">
                <a href="<?php echo get_theme_mod( 'third_marketing_cta_link' ); ?>"><img class="img-circle" src="<?php echo get_theme_mod( 'unveil_third_marketing' ); ?>" alt="<?php echo get_theme_mod( 'third_marketing_alt' ); ?>"></a>
                <h3 class="feature-heading"><?php echo get_theme_mod( 'third_marketing_header', 'Most Important' ); ?></h3>
                <p><?php echo get_theme_mod( 'third_marketing_text', 'Describe the slide and where the CTA will take them.' ); ?></p>
                <p><a class="btn" href="<?php echo get_theme_mod( 'third_marketing_cta_link' ); ?>" role="button"><?php echo get_theme_mod( 'third_marketing_cta_title', 'Sign Up Today!' ); ?></a></p>
            </div><!-- /.col-sm-4 -->
        </div><!-- /.row -->
    </section><!-- /featured work -->

    <!-- Shopping Banner
    ================================================== -->
    <section id="shopping">
        <div class="container-fluid shopping-banner">
            <div class="shopping-btn-container"><a role="button" class="btn btn-primary shopping-btn" href="<?php echo get_theme_mod( 'call_to_action_link' ); ?>" role="button"><?php echo get_theme_mod( 'call_to_action_title', 'Shop!' ); ?></a></div>
        </div>
    </section><!-- /shopping-->

    <!-- Latest work and news
    ================================================== -->
    <section id="latest work and news">
        <h2><?php echo get_theme_mod( 'news_title', 'Latest Work and News' ); ?></h2>
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