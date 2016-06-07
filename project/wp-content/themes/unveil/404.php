
<?php get_header(); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <div class="row">
        <!-- Content Area
        ================================================== -->
        <section id="content_area">
            <div class="col-sm-8  class="errorpage"">

               <h1> OMG!</h1>
                
                <h2>There doesn't seem to be anything here...</h2>
                <p>You can use this search bar to get back on track:</p>
                <div><?php get_search_form() ?></div>

                <p>Or use choose one of these links</p>

                <div><?php wp_list_categories() ?></div>

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




