<?php

/* Theme Image Maximum Content Width */

if ( ! isset( $content_width ) ) {
    $content_width = 660;
}

/* Theme support for automatic feed links and title tags */

function unveil_setup() {

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Register Custom Navigation Walker
    require_once('wp_bootstrap_navwalker.php');

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'unveil' ),
    ) );

}

add_action('after_setup_theme','unveil_setup');

/* Enqueue styles and scripts */

function unveil_scripts() {

/*Remove WorPress jQuery*/

wp_dequeue_script( 'jquery' );

wp_deregister_script( 'jquery' );

/* Stylesheets */

wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );

wp_enqueue_style( 'viewport-bug-style', get_template_directory_uri() . '/css/ie10-viewport-bug-workaround.css' );

wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css' );

wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/style.css' );

/* Scripts */

wp_enqueue_script( 'html5-shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js' );

wp_enqueue_script( 'responsive-script', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js' );

wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',"", '1.0', true );

wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0', true );

wp_enqueue_script( 'ie-viewport-bug', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array('jquery'), '1.0', true );

wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true );

if ( is_singular() ) wp_enqueue_script('comment-reply');
}

add_action('wp_enqueue_scripts','unveil_scripts');

/* Change archive truncate symbol to ... */

function custom_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

// Register Custom Post Type - Products

add_action( 'init', 'create_post_type' );
add_post_type_support( 'unveil_product', 'thumbnail' );
function create_post_type() {
    register_post_type( 'unveil_product',
        array(
            'labels' => array(
                'name' => __( 'Products' ),
                'singular_name' => __( 'Product' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}

// Modifies Comment Form Default Fields

add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
function bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label class="sr-only" for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
            '<input class="form-control" id="author" name="author" type="text" placeholder="Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label class="sr-only" for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
            '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="Email *"' . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label class="sr-only" for="url">' . __( 'Website' ) . '</label> ' .
            '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="Website"' . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
    );

    return $fields;
}

// Modifies Text Area Fields in Comments Form

add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
                <label class="sr-only" for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
                <textarea class="form-control" id="comment" name="comment" cols="45" placeholder="Comment" rows="8" aria-required="true"></textarea>
                </div>';
    $args['class_submit'] = 'btn btn-default'; // since WP 4.1

    return $args;
}

//Register Sidebars

function unveil_sidebars() {
    $args = array(
        'id' => 'main-sidebar',
        'name' => __('Main Right Sidebar', 'unveil'),
        'description' => ('This is the main sidebar on the right for posts and pages. Used for archive.php, home.php, page.php, and single.php'),
        'before-widget' => '<div id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'footer-sidebar1',
        'name' => __('Footer Sidebar1', 'unveil'),
        'description' => ('This is the footer sidebar widget area. It is displayed on all posts and pages of your site by default.'),
        'before-widget' => '<div id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'left-sidebar',
        'name' => __('Left Sidebar', 'unveil'),
        'description' => ('This is an alternate sidebar for posts and pages. Used for archive.php, home.php, page.php, and single.php'),
        'before-widget' => '<div id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'half-sidebar-left',
        'name' => __('Half Page Left Sidebar', 'unveil'),
        'description' => ('This is used on the contact form page template.'),
        'before-widget' => '<div id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'half-sidebar-right',
        'name' => __('Half Page Right Sidebar', 'unveil'),
        'description' => ('TThis is used on the contact form page template.'),
        'before-widget' => '<div id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );
}

add_action( 'widgets_init', 'unveil_sidebars');


// Enable PHP in widgets

add_filter('widget_text','execute_php',100);
function execute_php($html){
    if(strpos($html,"<"."?php")!==false){
        ob_start();
        eval("?".">".$html);
        $html=ob_get_contents();
        ob_end_clean();
    }
    return $html;
}