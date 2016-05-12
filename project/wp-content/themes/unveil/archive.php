
<?php get_header(); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
<div class="row">
    <!-- Content Area
    ================================================== -->
    <section id="content_area">
        <div class="col-sm-8">
            <h1>Content/Sidebar Page Layout</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam commodi consectetur culpa cupiditate debitis, dolore dolorum esse eum fugit id mollitia non placeat possimus provident quasi quibusdam rem tempora voluptas.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolorem ducimus id ipsam natus voluptatum. Commodi cumque minus odio placeat quidem. Architecto, expedita ipsam modi optio provident rem repellat voluptas! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam dolore ducimus excepturi facilis iusto, maiores minima modi porro quae reiciendis repellat voluptate? Amet aspernatur, dolorem esse necessitatibus nostrum quia.</p>
            <h2>A Secondary Header</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias deserunt dolorem esse, expedita fuga incidunt labore non placeat porro ratione reprehenderit sint temporibus. Aspernatur harum neque officia perferendis saepe temporibus.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dolores expedita nam nostrum odit quo repudiandae sunt temporibus. Architecto, consequuntur culpa delectus doloribus dolorum eaque inventore ipsa nostrum quisquam tempora.</p>

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
            
        </sectio><!-- /#sidebar -->
</div><!-- /.row -->


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- POSTS SECTION -->
    <article>
        <h2><?php the_title(); ?></h2>
        <p><?php the_excerpt(); ?></p>
    </article>

<?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>