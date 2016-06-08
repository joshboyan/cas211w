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
        'description' => __('This is the main sidebar on the right for posts and pages. Used for archive.php, home.php, page.php, and single.php'),
        'before-widget' => '<li id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'footer-sidebar1',
        'name' => __('Footer Sidebar1', 'unveil'),
        'description' => __('This is the left footer sidebar widget area. It is displayed on all posts and pages of your site by default.'),
        'before-widget' => '<li id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'footer-sidebar2',
        'name' => __('Footer Sidebar2', 'unveil'),
        'description' => __('This is the center footer sidebar widget area. It is displayed on all posts and pages of your site by default.'),
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
        'description' => __('This is used on the contact form page template.'),
        'before-widget' => '<li id="%1$s" class="sidebar-module %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    );
    register_sidebar( $args );

    $args = array(
        'id' => 'half-sidebar-right',
        'name' => __('Half Page Right Sidebar', 'unveil'),
        'description' => __('This is used on the contact form page template.'),
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
        'priority' => 30,
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

// Theme Customizer -- Background Image CSS

    $wp_customize->add_section(
        'unveil_shopping_area',
        array(
            'title'       => __( 'Shopping Area', 'unveil' ),
            'priority'    => 30,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Change the background image in the Shopping Area of the Home Page', 'unveil' ),
        )
    );

    $wp_customize->add_setting(
        'unveil_background_image',
        array(
            'default'      => get_template_directory_uri() . '/img/sourdough.jpg',
            'transport'    => 'refresh'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'unveil_background_image',
            array(
                'label'       => __( 'Background Image', 'unveil' ),
                'settings'    => 'unveil_background_image',
                'section'     => 'unveil_shopping_area',
                'description' => __( 'Recommended image size is approximately 1200x785 pixels', 'unveil' ),
            )
        )
    );    

// Theme Customizer - Home Page Text
$wp_customize->add_section( 'custom_home_section', array(
    'title'           => __( 'Home Page Updates', 'unveil' ),
    'description'     => __( 'Add titles to each section of the Home Page.', 'unveil' ),
    'priority'        => 25,
    'active_callback' => 'is_front_page',
) );

// Control/Setting for First Section Title
$wp_customize->add_setting( 'welcome_title', array(
    'default'           => __( 'Featured Work', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'welcome_title', array(
    'priority'    => 10,
    'section'     => 'custom_home_section',
    'label'       => __( 'Input a title for the First Section', 'unveil' ),
    'description' => '',
) );

// Control/Setting for section Section Title (Not used in this theme)
$wp_customize->add_setting( 'shopping_title', array(
    'default'           => __( 'Shopping', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'shopping_title', array(
    'priority'    => 10,
    'section'     => 'custom_home_section',
    'label'       => __( 'Input a title for the second Section', 'unveil' ),
    'description' => '',
) );

// Control/Setting for second Section Call to Action Button text
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

// Control/Setting for second Section Call to Action Button Link
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

// Control/Setting for third Section Title
    $wp_customize->add_setting( 'news_title', array(
        'default'           => __( 'Latest Work and News', 'unveil' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'news_title', array(
        'priority'    => 20,
        'section'     => 'custom_home_section',
        'label'       => __( 'Input a title for the third Section', 'unveil' ),
        'description' => '',
    ) );


// Theme Customizer -- Front Page Slideshow

$wp_customize->add_section(
    'unveil_slideshow',
    array(
        'title'       => __( 'Slideshow', 'unveil' ),
        'priority'    => 20,
        'capability'  => 'edit_theme_options',
        'description' => __( 'Change the images, text and call to action in the slideshow', 'unveil' ),
    )
);

//First slide

$wp_customize->add_setting(
    'unveil_first_slide',
    array(
        'default'      => get_template_directory_uri() . '/img/steak.jpg',
        'transport'    => 'refresh'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'unveil_first_slide',
        array(
            'label'       => __( 'First Slide', 'unveil' ),
            'settings'    => 'unveil_first_slide',
            'section'     => 'unveil_slideshow',
            'description' => __( 'Recommended image size is approximately 1200x785 pixels', 'unveil' ),
        )
    )
);
// Control/Setting for first slide header
$wp_customize->add_setting( 'first_slide_header', array(
    'default'           => __( 'Unveil visual Showcase', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'first_slide_header', array(
    'priority'    => 10,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Input header for the first slide', 'unveil' ),
    'description' => '',
) );

// Control/Setting for first slide text
$wp_customize->add_setting( 'first_slide_text', array(
    'default'           => __( 'Describe the slide and where the CTA will take them', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'first_slide_text', array(
    'priority'    => 10,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Input text for the first slide', 'unveil' ),
    'description' => '',
    'type' => 'textarea',
) );

// Control/Setting for first slide Call to Action Button
$wp_customize->add_setting( 'first_slide_cta_title', array(
    'default'           => __('Visit Our Store', 'unveil'),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'first_slide_cta_title', array(
    'priority'    => 10,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Input a title for the Call to Action Button', 'unveil' ),
    'description' => __( 'Call to Action Button defaults with "Visit Our Store"', 'unveil' ),
) );

// Control/Setting for first slide Call to Action Button Link
$wp_customize->add_setting( 'first_slide_cta_link', array(
    'default'           => 'http://yourbusiness.com/shop/',
    'sanitize_callback' => 'esc_url',
) );
$wp_customize->add_control( 'first_slide_cta_link', array(
    'type'        =>  'url',
    'priority'    => 10,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Link URL for the Call to Action Button', 'unveil' ),
    'description' => '',
) );
/* To make this work I need to write a while loop that checks if the checkbox has input, places a counter variable everywhere I use "first", increment the variable  create a unique section then checks the new sections checkbox for input. Front page php needs a similar loop.
    // Control/Setting adding another slide
    $wp_customize->add_setting( 'slide_checkbox1', array(
        'default'           => __( '', 'unveil' ),
    ) );
    $wp_customize->add_control( 'slide_checkbox1', array(
        'priority'    => 90,
        'section'     => 'unveil_slideshow',
        'label'       => __( 'Check to add another slide', 'unveil' ),
        'description' => '',
        'type' => 'checkbox',
    ) ); */

//Second slide

$wp_customize->add_setting(
    'unveil_second_slide',
    array(
        'default'      => get_template_directory_uri() . '/img/steak.jpg',
        'transport'    => 'refresh'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'unveil_second_slide',
        array(
            'label'       => __( 'Second Slide', 'unveil' ),
            'settings'    => 'unveil_second_slide',
            'section'     => 'unveil_slideshow',
            'description' => __( 'Recommended image size is approximately 1200x785 pixels', 'unveil' ),
        )
    )
);
// Control/Setting for second slide header
$wp_customize->add_setting( 'second_slide_header', array(
    'default'           => __( 'Unveil Visual Showcase', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'second_slide_header', array(
    'priority'    => 20,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Input header for the second slide', 'unveil' ),
    'description' => '',
) );

// Control/Setting for second slide text
$wp_customize->add_setting( 'second_slide_text', array(
    'default'           => __( 'Describe the slide and where the CTA will take them', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'second_slide_text', array(
    'priority'    => 10,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Input text for the second slide', 'unveil' ),
    'description' => '',
    'type' => 'textarea',
) );

// Control/Setting for second slide Call to Action Button
$wp_customize->add_setting( 'second_slide_cta_title', array(
    'default'           => __('Visit Our Store', 'unveil'),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'second_slide_cta_title', array(
    'priority'    => 10,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Input a title for the Call to Action Button', 'unveil' ),
    'description' => __( 'Call to Action Button defaults with "Visit Our Store"', 'unveil' ),
) );

// Control/Setting for first slide Call to Action Button Link
$wp_customize->add_setting( 'second_slide_cta_link', array(
    'default'           => 'http://yourbusiness.com/shop/',
    'sanitize_callback' => 'esc_url',
) );
$wp_customize->add_control( 'second_slide_cta_link', array(
    'type'        =>  'url',
    'priority'    => 10,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Link URL for the Call to Action Button', 'unveil' ),
    'description' => '',
) );

//Third slide

$wp_customize->add_setting(
    'unveil_third_slide',
    array(
        'default'      => get_template_directory_uri() . '/img/steak.jpg',
        'transport'    => 'refresh'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'unveil_third_slide',
        array(
            'label'       => __( 'Third Slide', 'unveil' ),
            'settings'    => 'unveil_third_slide',
            'section'     => 'unveil_slideshow',
            'description' => __( 'Recommended image size is approximately 1200x785 pixels', 'unveil' ),
        )
    )
);
// Control/Setting for third slide header
$wp_customize->add_setting( 'third_slide_header', array(
    'default'           => __( 'Unveil Visual Showcase', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'third_slide_header', array(
    'priority'    => 20,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Input header for the third slide', 'unveil' ),
    'description' => '',
) );

// Control/Setting for third slide text
$wp_customize->add_setting( 'third_slide_text', array(
    'default'           => __( 'Describe the slide and where the CTA will take them', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'third_slide_text', array(
    'priority'    => 10,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Input text for the third slide', 'unveil' ),
    'description' => '',
    'type' => 'textarea',
) );

// Control/Setting for third slide Call to Action Button
$wp_customize->add_setting( 'third_slide_cta_title', array(
    'default'           => __('Visit Our Store', 'unveil'),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'third_slide_cta_title', array(
    'priority'    => 10,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Input a title for the Call to Action Button', 'unveil' ),
    'description' => __( 'Call to Action Button defaults with "Visit Our Store"', 'unveil' ),
) );

// Control/Setting for first slide Call to Action Button Link
$wp_customize->add_setting( 'third_slide_cta_link', array(
    'default'           => 'http://yourbusiness.com/shop/',
    'sanitize_callback' => 'esc_url',
) );
$wp_customize->add_control( 'third_slide_cta_link', array(
    'type'        =>  'url',
    'priority'    => 10,
    'section'     => 'unveil_slideshow',
    'label'       => __( 'Link URL for the Call to Action Button', 'unveil' ),
    'description' => '',
) );

// Theme Customizer -- Front Page 1st section marketing

$wp_customize->add_section(
    'unveil_marketing',
    array(
        'title'       => __( '1st Marketing Section', 'unveil' ),
        'priority'    => 20,
        'capability'  => 'edit_theme_options',
        'description' => __( 'Change the images, text and call to action in the 1st marketing section', 'unveil' ),
    )
);

//First marketing area

$wp_customize->add_setting(
    'unveil_first_marketing',
    array(
        'default'      => get_template_directory_uri() . '/img/steak.jpg',
        'transport'    => 'refresh'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'unveil_first_marketing',
        array(
            'label'       => __( 'First Marketing Area', 'unveil' ),
            'settings'    => 'unveil_first_marketing',
            'section'     => 'unveil_marketing',
            'description' => __( 'Recommended image size is approximately 1200x785 pixels', 'unveil' ),
        )
    )
);

// Control/Setting for first marketing area image alt text
    $wp_customize->add_setting( 'first_marketing_alt', array(
        'default'           => __( 'Unveil visual Showcase', 'unveil' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'first_marketing_alt', array(
        'priority'    => 10,
        'section'     => 'unveil_marketing',
        'label'       => __( 'Input alt text for image', 'unveil' ),
        'description' => '',
    ) );

// Control/Setting for first marketing area header
$wp_customize->add_setting( 'first_marketing_header', array(
    'default'           => __( 'Unveil visual Showcase', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'first_marketing_header', array(
    'priority'    => 10,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Input header for the first marketing area', 'unveil' ),
    'description' => '',
) );

// Control/Setting for first marketing area text
$wp_customize->add_setting( 'first_marketing_text', array(
    'default'           => __( 'Describe the marketing area and where the CTA will take them', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'first_marketing_text', array(
    'priority'    => 10,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Input text for the first marketing area', 'unveil' ),
    'description' => '',
    'type' => 'textarea',
) );

// Control/Setting for first marketing area Call to Action Button
$wp_customize->add_setting( 'first_marketing_cta_title', array(
    'default'           => __('Visit Our Store', 'unveil'),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'first_marketing_cta_title', array(
    'priority'    => 10,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Input a title for the Call to Action Button', 'unveil' ),
    'description' => __( 'Call to Action Button defaults with "Visit Our Store"', 'unveil' ),
) );

// Control/Setting for first marketing area Call to Action Button Link
$wp_customize->add_setting( 'first_marketing_cta_link', array(
    'default'           => 'http://yourbusiness.com/shop/',
    'sanitize_callback' => 'esc_url',
) );
$wp_customize->add_control( 'first_marketing_cta_link', array(
    'type'        =>  'url',
    'priority'    => 10,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Link URL for the Call to Action Button', 'unveil' ),
    'description' => '',
) );

//Second marketing area

$wp_customize->add_setting(
    'unveil_second_marketing',
    array(
        'default'      => get_template_directory_uri() . '/img/steak.jpg',
        'transport'    => 'refresh'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'unveil_second_marketing',
        array(
            'label'       => __( 'Second Marketing Area', 'unveil' ),
            'settings'    => 'unveil_second_marketing',
            'section'     => 'unveil_marketing',
            'description' => __( 'Recommended image size is approximately 1200x785 pixels', 'unveil' ),
        )
    )
);

// Control/Setting for second marketing area image alt text
    $wp_customize->add_setting( 'second_marketing_alt', array(
        'default'           => __( 'Unveil visual Showcase', 'unveil' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'second_marketing_alt', array(
        'priority'    => 10,
        'section'     => 'unveil_marketing',
        'label'       => __( 'Input alt text for image', 'unveil' ),
        'description' => '',
    ) );

// Control/Setting for second marketing area header
$wp_customize->add_setting( 'second_marketing_header', array(
    'default'           => __( 'Unveil Visual Showcase', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'second_marketing_header', array(
    'priority'    => 20,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Input header for the second marketing area', 'unveil' ),
    'description' => '',
) );

// Control/Setting for second marketing area text
$wp_customize->add_setting( 'second_marketing_text', array(
    'default'           => __( 'Describe the marketing area and where the CTA will take them', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'second_marketing_text', array(
    'priority'    => 10,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Input text for the second marketing area', 'unveil' ),
    'description' => '',
    'type' => 'textarea',
) );

// Control/Setting for second marketing area Call to Action Button
$wp_customize->add_setting( 'second_marketing_cta_title', array(
    'default'           => __('Visit Our Store', 'unveil'),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'second_marketing_cta_title', array(
    'priority'    => 10,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Input a title for the Call to Action Button', 'unveil' ),
    'description' => __( 'Call to Action Button defaults with "Visit Our Store"', 'unveil' ),
) );

// Control/Setting for second marketing area Call to Action Button Link
$wp_customize->add_setting( 'second_marketing_cta_link', array(
    'default'           => 'http://yourbusiness.com/shop/',
    'sanitize_callback' => 'esc_url',
) );
$wp_customize->add_control( 'second_marketing_cta_link', array(
    'type'        =>  'url',
    'priority'    => 10,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Link URL for the Call to Action Button', 'unveil' ),
    'description' => '',
) );

//Third Marketing Area

$wp_customize->add_setting(
    'unveil_third_marketing',
    array(
        'default'      => get_template_directory_uri() . '/img/steak.jpg',
        'transport'    => 'refresh'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'unveil_third_marketing',
        array(
            'label'       => __( 'Third Marketing Area', 'unveil' ),
            'settings'    => 'unveil_third_marketing',
            'section'     => 'unveil_marketing',
            'description' => __( 'Recommended image size is approximately 1200x785 pixels', 'unveil' ),
        )
    )
);

// Control/Setting for third marketing area image alt text
    $wp_customize->add_setting( 'third_marketing_alt', array(
        'default'           => __( 'Unveil visual Showcase', 'unveil' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'third_marketing_alt', array(
        'priority'    => 10,
        'section'     => 'unveil_marketing',
        'label'       => __( 'Input alt text for image', 'unveil' ),
        'description' => '',
    ) );

// Control/Setting for third marketing area header
$wp_customize->add_setting( 'third_marketing_header', array(
    'default'           => __( 'Unveil Visual Showcase', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'third_marketing_header', array(
    'priority'    => 20,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Input header for the third marketing area', 'unveil' ),
    'description' => '',
) );

// Control/Setting for third marketing text
$wp_customize->add_setting( 'third_marketing_text', array(
    'default'           => __( 'Describe the marketing area and where the CTA will take them', 'unveil' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'third_marketing_text', array(
    'priority'    => 10,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Input text for the third marketing area', 'unveil' ),
    'description' => '',
    'type' => 'textarea',
) );

// Control/Setting for third marketing area Call to Action Button
$wp_customize->add_setting( 'third_marketing_cta_title', array(
    'default'           => __('Visit Our Store', 'unveil'),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'third_marketing_cta_title', array(
    'priority'    => 10,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Input a title for the Call to Action Button', 'unveil' ),
    'description' => __( 'Call to Action Button defaults with "Visit Our Store"', 'unveil' ),
) );

// Control/Setting for third marketing area Call to Action Button Link
$wp_customize->add_setting( 'third_marketing_cta_link', array(
    'default'           => 'http://yourbusiness.com/shop/',
    'sanitize_callback' => 'esc_url',
) );
$wp_customize->add_control( 'third_marketing_cta_link', array(
    'type'        =>  'url',
    'priority'    => 10,
    'section'     => 'unveil_marketing',
    'label'       => __( 'Link URL for the Call to Action Button', 'unveil' ),
    'description' => '',
) );

// Theme Customizer - Social Icons
    $wp_customize->add_section( 'social_icons_section', array(
        'title'           => __( 'Social Icons', 'snazzy' ),
        'description'     => __( 'Add your social media URLs to each field below to display their related social icons in the footer.  <br> <em> Please enter the complete address including the http:// </em>', 'unveil' ),
        'priority'        => 10,
    ) );

// Control/Setting for Facebook Link
    $wp_customize->add_setting( 'facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( 'facebook_url', array(
        'type'        =>  'url',
        'priority'    => 10,
        'section'     => 'social_icons_section',
        'label'       => __( 'Facebook URL', 'unveil' ),
    ) );

    // Control/Setting for Twitter Link
    $wp_customize->add_setting( 'twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( 'twitter_url', array(
        'type'        =>  'url',
        'priority'    => 10,
        'section'     => 'social_icons_section',
        'label'       => __( 'Twitter URL', 'unveil' ),
    ) );

    // Control/Setting for Google+ Link
    $wp_customize->add_setting( 'google_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( 'google_url', array(
        'type'        =>  'url',
        'priority'    => 10,
        'section'     => 'social_icons_section',
        'label'       => __( 'Google+ URL', 'unveil' ),
    ) );

    // Control/Setting for YouTube Link
    $wp_customize->add_setting( 'youtube_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( 'youtube_url', array(
        'type'        =>  'url',
        'priority'    => 10,
        'section'     => 'social_icons_section',
        'label'       => __( 'YouTube URL', 'unveil' ),
    ) );

// Theme Customizer -- Blog Header

    $wp_customize->add_section(
        'unveil_blog',
        array(
            'title'       => __( 'Blog Header', 'unveil' ),
            'priority'    => 20,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Change the text and heading in the blog header.', 'unveil' ),
        )
    );
// Control/Setting for blog header
    $wp_customize->add_setting( 'blog_header', array(
        'default'           => __( 'Curating This Section', 'unveil' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'blog_header', array(
        'priority'    => 20,
        'section'     => 'unveil_slideshow',
        'label'       => __( 'Input header for the blog pages', 'unveil' ),
        'description' => '',
    ) );

// Control/Setting for blog text
    $wp_customize->add_setting( 'blog_text', array(
        'default'           => __( 'Write a cool intro to the blog pages.', 'unveil' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'blog_text', array(
        'priority'    => 10,
        'section'     => 'unveil_slideshow',
        'label'       => __( 'Input text for the blog header', 'unveil' ),
        'description' => '',
        'type' => 'textarea',
    ) );
}

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

        /* Style from The Customizer Slideshow section */
        <?php if ( 0 < count( strlen( ( $first_slide_url = get_theme_mod( 'unveil_first_slide' ) ) ) ) ) { ?>
        .first-slide {
            background-image: url( <?php echo $first_slide_url; ?> ); }

        <?php } // end if ?>

        <?php if ( 0 < count( strlen( ( $second_slide_url = get_theme_mod( 'unveil_second_slide' ) ) ) ) ) { ?>
        .second-slide {
            background-image: url( <?php echo $second_slide_url; ?> ); }
        <?php } // end if ?>

        <?php if ( 0 < count( strlen( ( $third_slide_url = get_theme_mod( 'unveil_third_slide' ) ) ) ) ) { ?>
        .third-slide {
            background-image: url( <?php echo $third_slide_url; ?> ); }
        <?php } // end if ?>

        /* Style from The Customizer Shopping section */
        <?php if ( 0 < count( strlen( ( $background_image_url = get_theme_mod( 'unveil_background_image' ) ) ) ) ) { ?>
        .shopping-banner {
            background-image: url( <?php echo $background_image_url; ?> ); }
        <?php } // end if ?>

    </style>
    <?php
}
add_action( 'wp_head', 'unveil_customizer_css' );

load_theme_textdomain( 'unveil', get_template_directory_uri() . '/languages' );

// Dashboard Enqueue Scripts

function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// Dashboard Footer Customization

function unveil_footer_admin () {

    echo 'Theme by <a href="http://www.unveil.com" target="_blank">Joshy Poo Inc.</a> | Designed by <a href="http://www.joshboyan.com" target="_blank">Josh Boyan</a></p>';
}
add_filter('admin_footer_text', 'unveil_footer_admin');