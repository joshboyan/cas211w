
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
            <div class="col-sm-4" id="feature4">
                <a href="#"><img class="img-circle" src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/bento.jpg" alt="Generic placeholder image"></a>
                <h3 class="feature-heading">Latest Work</h3>
                <p>Did you see that shop button gracefully appear? You can bet your users will. They probably won't make it past that but if they do they are going to get blown away by your latest poems about your vegan bicycle or whatever it is you do. This will be the first item in this section users see...</p>
                <p><a class="btn" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-sm-4 -->
            <div class="col-sm-4" id="feature5">
                <a href="#"><img class="img-circle" src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/pinwheel-small.jpg" alt="Generic placeholder image"></a>
                <h3 class="feature-heading">Curating This Section</h3>
                <p>By default this section will show your last three posts. This section gets all of its images and copy from your latest post. Pretty easy huh? People are gonna think you are working so hard to maintain this masterpiece...</p>
                <p><a class="btn" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-sm-4 -->
            <div class="col-sm-4"  id="feature6">
                <a href="#"><img class="img-circle" src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/appetizers.jpg" alt="Generic placeholder image"></a>
                <h3 class="feature-heading">Show What You Want</h3>
                <p>If you have a seasonal promotion or enter into your blue phase this section is easy to curate using the category tags you are diligently assigning to all your post. Please tell me your assigning categories! We are all busy and don't have the time for my long winded speech about SEO... </p>
                <p><a class="btn" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-sm-4 -->
        </div><!-- /.row -->
    </section><!-- /latest work and news -->

    <!-- Footer information
    ================================================== -->

<?php get_footer(); ?>