
<?php get_header(); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <div class="row">
        <!-- Content Area
        ================================================== -->
        <section id="content_area">

                <?php
                $args = array( 'post_type' => 'unveil_product', 'posts_per_page' => 6, 'orderby' => 'ASC' );
                $product_query = new WP_Query( $args );
                $feature_number = 1;
                if ( $product_query->have_posts() ) : ?>
                <?php while ( $product_query->have_posts() ) : $product_query->the_post(); ?>

                 <div class="col-sm-4" id="<?php echo 'feature' . $feature_number ?>">
                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail', array('class' => "img-circle")); ?></a> <br>
                    <h3 class="feature-heading"><?php the_title(); ?></h3>
                 </div>
                        
                 <?php $feature_number = $feature_number + 1 ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="col-xs-12"></div> <p><?php _e( 'No products have been created yet. Add a category and create posts.<br>Be sure to give each product a featured image.' ); ?></p></div>

            </article><!-- /.blog-post -->
            <?php endif; ?>
    </section><!-- /#content_area -->
</div><!-- /.row -->

<?php get_footer(); ?>