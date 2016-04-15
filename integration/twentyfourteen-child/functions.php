<?php

add_action( 'wp_enqueue_scripts', 'nifty_scripts', 20 );

function nifty_scripts() {

// This removes the parent style

    wp_dequeue_style( 'twentyfourteen-style' );
    wp_dequeue_style( 'twentyfourteen-lato' );
    wp_dequeue_style( 'genericons' );
    wp_deregister_style( 'twentyfourteen-style' );
    wp_deregister_style( 'twentyfourteen-lato' );
    wp_deregister_style( 'genericons' );
    wp_dequeue_script( 'jquery' );
    wp_deregister_script( 'jquery' );

    wp_enqueue_style( 'google-raleway', 'http://fonts.googleapis.com/css?family=Raleway:400,200,300,600,700,800' );
    wp_enqueue_style( 'google-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300,200' );
    wp_enqueue_style( 'font-awesome', 'http://pccwebdesign.com/student203/nifty/css/font-awesome.min.css' );
    wp_enqueue_style( 'main-style', 'http://pccwebdesign.com/student203/nifty/nifty.css');
    wp_enqueue_style( 'responsive-style', 'http://pccwebdesign.com/student203/nifty/css/responsive.css', array('main-style'));
    wp_enqueue_style( 'sidr-style', 'http://pccwebdesign.com/student203/nifty/css/jquery.sidr.dark.css' );

    wp_enqueue_script( 'jquery', 'http://pccwebdesign.com/student203/nifty/js/jquery.min.js', array(), '1.11.0', false );
    wp_enqueue_script( 'sidr-script', 'http://pccwebdesign.com/student203/nifty/sidr/jquery.sidr.min.js', array('jquery'), '1.2.1', false );
    wp_enqueue_script( 'nicescroll-script', 'http://pccwebdesign.com/student203/nifty/js/jquery.nicescroll.min.js', array('jquery'), '3.2.0', true );
}

function comicpress_copyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
    $output = '';
    if($copyright_dates) {
        $copyright = "&copy; Nifty Tours " . $copyright_dates[0]->firstdate;
        if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
            $copyright .= '-' . $copyright_dates[0]->lastdate;
        }
        $output = $copyright;
    }
    return $output;
}