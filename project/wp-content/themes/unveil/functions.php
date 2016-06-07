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

/* Theme support for custom header image*/

$args = array(
    'width'         => 1200,
    'height'        => 650,
    'default-image' => get_template_directory_uri() . '/images/pinwheel.jpg',
    'uploads'       => true,
);

add_theme_support( 'custom-header', $args );

$defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'header-text'            => true,
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );

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
        'before-widget' => '<li id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'footer-sidebar1',
        'name' => __('Footer Sidebar1', 'unveil'),
        'description' => ('This is the left footer sidebar widget area. It is displayed on all posts and pages of your site by default.'),
        'before-widget' => '<li id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'footer-sidebar2',
        'name' => __('Footer Sidebar2', 'unveil'),
        'description' => ('This is the center footer sidebar widget area. It is displayed on all posts and pages of your site by default.'),
        'before-widget' => '<li id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'footer-sidebar3',
        'name' => __('Footer Sidebar3', 'unveil'),
        'description' => ('This is the right footer sidebar widget area. It is displayed on all posts and pages of your site by default.'),
        'before-widget' => '<li id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'left-sidebar',
        'name' => __('Left Sidebar', 'unveil'),
        'description' => ('This is an alternate sidebar for posts and pages. Used for archive.php, home.php, page.php, and single.php'),
        'before-widget' => '<li id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'half-sidebar-left',
        'name' => __('Half Page Left Sidebar', 'unveil'),
        'description' => ('This is used on the contact form page template.'),
        'before-widget' => '<li id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'half-sidebar-right',
        'name' => __('Half Page Right Sidebar', 'unveil'),
        'description' => ('TThis is used on the contact form page template.'),
        'before-widget' => '<li id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</li>',
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

function custom_excerpt_length( $length ) {
    if (is_search()) {
        return 25;
    }
    else return 45;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Theme Customizer

function unveil_customizer_register( $wp_customize ) {
// Add your code inside this Theme Customizer registration function -- your $wp_customize additions go here

// Theme Customizer -- Colors
// Header Text Color Setting
    $wp_customize->get_setting( 'header_textcolor' )->default = '#F6F8F8';

// Header Background Color Setting
    $wp_customize->add_setting( 'header_bg_color', array(
        'default' => '#1E3D6B'
    ) );

// Header Background Color Control -- This is a color picker control
    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'header_bg_color',
            array(
                'label' => __('Header Background Color', 'unveil'),
                'section' => 'colors',
                'settings' => 'header_bg_color',
            )
        ) );

    // Home Page Area Colors

    $wp_customize->add_setting('home_area_colors', array(
        'default'=> 'value1',
    ));

    $wp_customize->add_control( 'home_area_colors',
        array(
            'label'		 => __('Home Section Colors', 'unveil' ),
            'section'    => 'colors',
            'settings'   => 'home_area_colors',
            'type'       => 'radio',
            'choices'    => array(
                'value1' => __( 'Standard', 'unveil' ),
                'value2' => __( 'Reverse', 'unveil' ),
            ),
        )
    );

//Change control order in site identity section

$wp_customize->get_control( 'blogname' )->priority = 10;
$wp_customize->get_control( 'display_header_text' )->priority = 20;
$wp_customize->get_control( 'blogdescription' )->priority = 30;
$wp_customize->get_control( 'site_icon' )->priority = 40;

// Theme Customizer -- Rename and Describe Header Image Section
 $wp_customize->add_section( 'header_image' , array(
        'title'      => __( 'Hero Image', 'unveil' ),
        'description' => 'Change the large hero image that appears on the Home page, the About page (Single Use layout version) and a Blog page if you created one.',
        'priority' => 60,
    ) );

    // Theme Customizer -- Logo Uploader
    $wp_customize->add_section( 'unveil_logo_section' , array(
        'title'       => __( 'Logo Upload', 'unveil' ),
        'priority'    => 10,
        'description' => 'Upload a logo to replace the default site title in the header. The maximum image height is 100px.',
    ) );
    $wp_customize->add_setting( 'unveil_logo' );
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize, 'unveil_logo', array(
            'label'    => __( 'Logo Uploader', 'unveil' ),
            'section'  => 'unveil_logo_section',
            'settings' => 'unveil_logo',
        ) ) );
//Change label for featured text

$wp_customize->get_control( 'blogdescription' )->label = __('Feature Text', 'unveil');

// Theme Customizer -- Site Identity  -- Label for checkbox
    $wp_customize->get_control( 'site_icon' )->label = __( 'Site Icon aka favicon', 'unveil' );

//Label the favicon section
$wp_customize->get_control( 'display_header_text' )->label = __('Display Site Title', 'unveil');
}

// Theme Customizer - Home Page Text
$wp_customize->add_section( 'custom_home_section', array(
    'title'           => __( 'Home Page Updates', 'unveil' ),
    'description'     => __( 'Add titles to each section of the Home Page.', 'unveil' ),
    'priority'        => 10,
    'active_callback' => 'is_front_page',
) );

// Control/Setting for First Section Title
$wp_customize->add_setting( 'welcome_title', array(
    'default'           => __( 'Welcome to Our Business', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'welcome_title', array(
    'priority'    => 10,
    'section'     => 'custom_home_section',
    'label'       => __( 'Input a title for the First Section', 'unveil' ),
    'description' => '',
) );

// Control/Setting for Second Section Title
$wp_customize->add_setting( 'prices_title', array(
    'default'           => __( 'Prices', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'prices_title', array(
    'priority'    => 10,
    'section'     => 'custom_home_section',
    'label'       => __( 'Input a title for the Second Section', 'unveil' ),
    'description' => '',
) );

// Control/Setting for Third Section Title
$wp_customize->add_setting( 'shopping_title', array(
    'default'           => __( 'Shopping', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'shopping_title', array(
    'priority'    => 10,
    'section'     => 'custom_home_section',
    'label'       => __( 'Input a title for the Third Section', 'unveil' ),
    'description' => '',
) );

// Control/Setting for Third Section Call to Action Button
$wp_customize->add_setting( 'call_to_action_title', array(
    'default'           => __('Visit Our Store', 'unveil'),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'call_to_action_title', array(
    'priority'    => 10,
    'section'     => 'custom_home_section',
    'label'       => __( 'Input a title for the Call to Action Button', 'unveil' ),
    'description' => __( 'Call to Action Button defaults with "Visit Our Store"', 'unveil' ),
) );

// Control/Setting for Third Section Call to Action Button Link
$wp_customize->add_setting( 'call_to_action_link', array(
    'default'           => 'http://yourbusiness.com/shop/',
    'sanitize_callback' => 'esc_url',
) );
$wp_customize->add_control( 'call_to_action_link', array(
    'type'        =>  'url',
    'priority'    => 10,
    'section'     => 'custom_home_section',
    'label'       => __( 'Link URL for the Call to Action Button', 'unveil' ),
    'description' => '',
) );



add_action( 'customize_register', 'unveil_customizer_register' );

// Add CSS from Theme Customizer to wp_head

function unveil_customizer_css() {
    ?>
    <style>

        /*=== Style from The Customizer Colors Section - Header Background Color ===*/


        .navbar,
        .mynav {
            background-color: <?php echo get_theme_mod( 'header_bg_color' ); ?>;

        }
        .navbar-default
        .navbar-nav li a {
            color: #<?php echo get_theme_mod('header_textcolor'); ?>;
        }

        <?php if (get_theme_mod('home_area_colors') == 'value2') : ?>
            body {
                background-color: #1E3D68;
                color: #F6F8F8;
            }
        <?php endif; ?>

    </style>
    <?php
}
add_action( 'wp_head', 'unveil_customizer_css' );