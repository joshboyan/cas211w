<?php

/**
 * Template Name: Sidebar/Content
 */

get_header(); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <div class="row">
        <!-- Sidebar Area
        ================================================== -->
        <section id="sidebar">
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

                <?php get_sidebar('left'); ?>

        </section><!-- /#sidebar -->
        <!-- Content Area
        ================================================== -->
        <div class="container marketing">
            <div class="row">

                <h2 class="blog-post-title">Page &#8211; Two Sidebars</h2>

            </div><!-- /.row 1 -->
            <div class="row">
                <p>This is a page layout that has two sidebars (widget areas) below a content area. It&#8217;s ideal for a contact form in the content area and contact related information in the widgets above it.</p>
                <p>You can choose it from Page Attributes when you make a new Page.</p>
                <p>Here&#8217;s how a contact form might look in this section:</p>
                <div role="form" class="wpcf7" id="wpcf7-f156-p77-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"></div>
                    <form action="/project/page-two-sidebars/#wpcf7-f156-p77-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="156" />
                            <input type="hidden" name="_wpcf7_version" value="4.4" />
                            <input type="hidden" name="_wpcf7_locale" value="en_US" />
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f156-p77-o1" />
                            <input type="hidden" name="_wpnonce" value="426a916099" />
                        </div>
                        <div class="well">
                            <p>Send us a message</p>
                            <div class="form-group"><label class="sr-only" for="input-name">Name</label><br />
                                <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" id="input-name" aria-required="true" aria-invalid="false" placeholder="Name" /></span>
                            </div>
                            <p> <!-- /form-group --></p>
                            <div class="form-group">
                                <label class="sr-only" for="input-subject">Name</label><br />
                                <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text form-control" id="input-subject" aria-invalid="false" placeholder="Subject" /></span>
                            </div>
                            <p> <!-- /form-group --></p>
                            <div class="form-group"><label class="sr-only" for="input-email">Email</label><br />
                                <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" id="input-email" aria-required="true" aria-invalid="false" placeholder="Email" /></span>
                            </div>
                            <p> <!-- /form-group --></p>
                            <div class="form-group"><label class="sr-only" for="input-message">Message</label><br />
                                <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="3" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" id="input-message" aria-required="true" aria-invalid="false" placeholder="Message"></textarea></span>
                            </div>
                            <p> <!-- /form-group --><br />
                                <input type="submit" value="Click to Send" class="wpcf7-form-control wpcf7-submit btn btn-default" />
                        </div>
                        <p>  <!-- /well --></p>
                        <div class="wpcf7-response-output wpcf7-display-none"></div></form></div>

            </div><!-- /.row -->

            <div class="row">

                <div class="col-sm-6">
                    
                    <?php get_sidebar('half1'); ?>
                    
                </div> <!-- /col -->

                <div class="col-sm-6">
                    <?php get_sidebar('half2'); ?>
                </div> <!-- /col -->

            </div><!-- /.row -->

    <?php get_footer(); ?>
