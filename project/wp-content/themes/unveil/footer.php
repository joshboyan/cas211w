<section id="footer">
    <footer>
        <div class="container-fluid">
            <div class="row footer-widget-area">
                <div class="col-sm-4 footer-widget1">

                    <?php get_sidebar('footer1'); ?>

                </div><!-- /.col-sm-4 -->
                <div class="col-sm-4 footer-widget2">

                    <?php get_sidebar('footer2'); ?>
                    
                </div><!-- /.col-sm-4 -->
                <div class="col-sm-4 footer-widget3">
                    <h4>This is footer widget area 3.</h4>
                    <p>Perhaps for Social media?</p>
                    <ul>
                        <li><a class="btn" href="#" target="_blank"><div class="sr-only">Facebook
                                    page</div><i class="fa fa-facebook fa-lg"></i></a></li>
                        <li><a class="btn" href="#" target="_blank"><div class="sr-only">Twitter page</div><i class="fa
                        fa-twitter fa-lg"></i></a></li>
                        <li><a class="btn" href="#" target="_blank"><div class="sr-only">Google+ page</div><i class="fa
                        fa-google-plus fa-lg"></i></a></li>
                        <li><a class="btn" href="#" target="_blank"><div class="sr-only">Youtube page</div><i class="fa
                        fa-youtube fa-lg"></i></a></li>
                    </ul>
                </div><!-- /.col-sm-4 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">&copy; <?php echo date('Y'); ?> Unveil Theme &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></div><!-- /.col-sm-4 -->
                <div class="col-sm-4"><a role="Back to top" href="#"><i class="fa fa-arrow-up"></i></a></div><!-- /.col-sm-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </footer>
</section>   <!-- footer -->

</div><!-- /.container -->

<?php wp_footer(); ?>

</body>
</html>
