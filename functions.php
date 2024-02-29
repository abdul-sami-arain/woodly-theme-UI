<?php
/**
 * Woodly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package woodly
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

#-----------------------------------------------------------------#
# Defined Constants
#-----------------------------------------------------------------#/
define('WOODLY_THEME_NAME', 'woodly');
if (!defined('WOODLY_PATH')) define('WOODLY_PATH', get_template_directory());
if (!defined('WOODLY_URL')) define('WOODLY_URL', get_template_directory_uri());
define('WOODLY_THEME_DIR', wp_normalize_path(WOODLY_PATH . '/'));
define('WOODLY_THEME_URI', preg_replace('/^http(s)?:/', '', WOODLY_URL) . '/');
define('WOODLY_CHILD_PATH', get_stylesheet_directory());
defined('WOODLY_USER_LOGGED') or define('WOODLY_USER_LOGGED', is_user_logged_in());

#-----------------------------------------------------------------#
# Site Content Width
#-----------------------------------------------------------------#/
if( !isset($content_width) ) $content_width = 640;

if( !class_exists('Woodly_Theme_Setup') ) {

    class Woodly_Theme_Setup {

        public function __construct() {

            /* includes_files Theme Files */

            add_action('after_setup_theme', array( $this, 'includes_files' ), 4 );

            /* Main Theme Options */

            add_action('after_setup_theme', array( $this, 'theme_support') );

            /* Register Widget */
            add_action('widgets_init', array( $this, 'woodly_widgets_init'));

        }

        public function includes_files(){
            /**
             * Implement the Custom Header feature.
             */
            require WOODLY_PATH . '/inc/custom-header.php';

            /**
             * Custom template tags for this theme.
             */
            require WOODLY_PATH . '/inc/template-tags.php';

            /**
             * Functions which enhance the theme by hooking into WordPress.
             */
            require WOODLY_PATH . '/inc/template-functions.php';
            require WOODLY_PATH . '/inc/template-post.php';

            /**
             * Customizer additions.
             */
            require WOODLY_PATH . '/inc/customizer.php';

            /**
             * Enqueue.
             */

            require WOODLY_PATH . '/inc/woodly-enqueue.php';

            /**
             * Navwalker additions.
             */
            require WOODLY_PATH . '/inc/bootstrap-navwalker.php';
            require WOODLY_PATH . '/inc/woodly-nav-walker.php';

            require WOODLY_PATH . '/inc/woodly-accordion-walker.php';





            /**
             * Comment.
             */
            require WOODLY_PATH . '/inc/woodly_comment.php';

            /**
             * Admin Page.
             */
            require WOODLY_PATH . '/inc/admin/admin.php';
            require WOODLY_PATH . '/inc/admin/admin-init.php';

            /**
             * Breadcrumb.
             */
            require WOODLY_PATH . '/inc/breadcrumb.php';

            /**
             * Load Jetpack compatibility file.
             */
            if ( defined( 'JETPACK__VERSION' ) ) {
                require WOODLY_PATH . '/inc/jetpack.php';
            }

            /**
             * Load WooCommerce compatibility file.
             */
            if ( class_exists( 'WooCommerce' ) ) {
                require WOODLY_PATH . '/inc/woocommerce.php';
                require WOODLY_PATH . '/inc/template-product.php';
                require WOODLY_PATH . '/inc/vendor/woo-single-product-structure.php';
            }

            if (!is_customize_preview()  && is_admin() ) {
                require_once(WOODLY_PATH.'/inc/admin/merlin/vendor/autoload.php');
                require_once(WOODLY_PATH.'/inc/admin/merlin/class-merlin.php');
                require_once(WOODLY_PATH.'/inc/admin/merlin/merlin-config.php');
                require_once(WOODLY_PATH.'/inc/admin/merlin/merlin-filters.php');
            }


        }


        public function theme_support(){
            // Set our theme version.
            if (!defined('WOODLY_VERSION')) {
                // Replace the version number of the theme on each release.
                define('WOODLY_VERSION', '1.3');
            }
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on Woodly, use a find and replace
             * to change 'woodly' to the name of your theme in all the template files.
             */
            load_theme_textdomain( 'woodly', WOODLY_PATH . '/languages' );

            // Add default posts and comments RSS feed links to head.
            add_theme_support( 'automatic-feed-links' );
            
            add_filter( 'wpcf7_autop_or_not', '__return_false' );

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support( 'title-tag' );

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support( 'post-thumbnails' );


            add_image_size( 'woodly-blog-sthome-one', 740, 540, true );
            add_image_size( 'woodly-blog-sthome-two', 430, 300, true );
            add_image_size( 'woodly-blog-sthome-three', 370, 417, true );
            add_image_size( 'woodly-blog-sthome-four', 370, 300, true );
            add_image_size( 'woodly-blog-sthome-five', 570, 400, true );
            add_image_size( 'woodly-navigation-image', 80, 80, true );
            add_image_size( 'woodly-blog-side-square', 88, 88, true );
            add_image_size( 'woodly-single-portfolio-thumbnail', 570, 710, true );
            add_image_size( 'woodly-portfolio-style-two', 120,120, true );
            add_image_size( 'woodly-portfolio-style-four', 306,340, true );
            add_image_size( 'woodly-product-quick-view', 488, 683, true );

            // Image Size Cropping When Upload an image smaller than the size
            if(!function_exists('woodly_thumbnail_upload_scale')) {
                function woodly_thumbnail_upload_scale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){

                    if ( !$crop ) return null; // let the wordpress default function handle this

                    $aspect_ratio = $orig_w / $orig_h;
                    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

                    $crop_w = round($new_w / $size_ratio);
                    $crop_h = round($new_h / $size_ratio);

                    $s_x = floor( ($orig_w - $crop_w) / 2 );
                    $s_y = floor( ($orig_h - $crop_h) / 2 );

                    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
                }
            }
            add_filter( 'image_resize_dimensions', 'woodly_thumbnail_upload_scale', 10, 6 );



            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(
                array(
                    'main' => esc_html__( 'Main Menu', 'woodly' ),
                    'account-menu' => esc_html__( 'Account Menu', 'woodly' ),
                )
            );

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support(
                'html5',
                array(
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'style',
                    'script',
                )
            );

            // Set up the WordPress core custom background feature.
            add_theme_support(
                'custom-background',
                apply_filters(
                    'woodly_custom_background_args',
                    array(
                        'default-color' => 'ffffff',
                        'default-image' => '',
                    )
                )
            );

            // Add theme support for selective refresh for widgets.
            add_theme_support( 'customize-selective-refresh-widgets' );





            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support(
                'custom-logo',
                array(
                    'height'      => 250,
                    'width'       => 250,
                    'flex-width'  => true,
                    'flex-height' => true,
                )
            );


            #-----------------------------------------------------------------#
# Gutenberg
#-----------------------------------------------------------------#/
            // Theme supports wide images, galleries and videos.
            add_theme_support( 'align-wide' );
            add_theme_support( 'wp-block-styles' );
            add_theme_support( 'editor-styles' );
            add_theme_support( 'responsive-embeds' );
            add_theme_support( 'custom-units' );

            remove_theme_support( 'widgets-block-editor' );


            add_editor_style('style-editor.css');
            add_editor_style('https://fonts.googleapis.com/css2?family=Open+Sans&family=Quicksand:wght@500;600;700&display=swap');


            // Add custom editor font sizes.
            add_theme_support(
                'editor-font-sizes',
                array(
                    array(
                        'name'      => esc_attr__( 'Small', 'woodly' ),
                        'shortName' => esc_attr__( 'S', 'woodly' ),
                        'size'      => 16,
                        'slug'      => 'small',
                    ),
                    array(
                        'name'      => esc_attr__( 'Normal', 'woodly' ),
                        'shortName' => esc_attr__( 'M', 'woodly' ),
                        'size'      => 18,
                        'slug'      => 'normal',
                    ),
                    array(
                        'name'      => esc_attr__( 'Large', 'woodly' ),
                        'shortName' => esc_attr__( 'L', 'woodly' ),
                        'size'      => 24,
                        'slug'      => 'large',
                    ),
                    array(
                        'name'      => esc_attr__( 'Huge', 'woodly' ),
                        'shortName' => esc_attr__( 'XL', 'woodly' ),
                        'size'      => 42,
                        'slug'      => 'huge',
                    ),
                )
            );

            // Make specific theme colors available in the editor.
            add_theme_support( 'editor-color-palette', array(
                array(
                    'name'  => __( 'Light gray', 'woodly' ),
                    'slug'  => 'light-gray',
                    'color'	=> '#f5f5f5',
                ),
                array(
                    'name'  => __( 'Medium gray', 'woodly' ),
                    'slug'  => 'medium-gray',
                    'color' => '#999',
                ),
                array(
                    'name'  => __( 'Dark gray', 'woodly' ),
                    'slug'  => 'dark-gray',
                    'color' => '#222a36',
                ),

                array(
                    'name'  => __( 'Purple', 'woodly' ),
                    'slug'  => 'purple',
                    'color' => '#5a00f0',
                ),

                array(
                    'name'  => __( 'Dark Blue', 'woodly' ),
                    'slug'  => 'dark-blue',
                    'color' => '#28375a',
                ),

                array(
                    'name'  => __( 'Red', 'woodly' ),
                    'slug'  => 'red',
                    'color' => '#c44d58',
                ),

                array(
                    'name'  => __( 'Yellow', 'woodly' ),
                    'slug'  => 'yellow',
                    'color' => '#ecca2e',
                ),

                array(
                    'name'  => __( 'Green', 'woodly' ),
                    'slug'  => 'green',
                    'color' => '#64a500',
                ),

                array(
                    'name'  => __( 'White', 'woodly' ),
                    'slug'  => 'white',
                    'color' => '#ffffff',
                ),
            ) );

            add_theme_support( 'editor-font-sizes', array(
                array(
                    'name' => __( 'Small', 'woodly' ),
                    'size' => 14,
                    'slug' => 'small'
                ),
                array(
                    'name' => __( 'Normal', 'woodly' ),
                    'size' => 16,
                    'slug' => 'normal'
                ),
                array(
                    'name' => __( 'Large', 'woodly' ),
                    'size' => 36,
                    'slug' => 'large'
                ),
                array(
                    'name' => __( 'Huge', 'woodly' ),
                    'size' => 40,
                    'slug' => 'huge'
                )
            ) );




        }


        public function woodly_widgets_init()
        {
            register_sidebar(
                array(
                    'name'          => esc_html__( 'Sidebar', 'woodly' ),
                    'id'            => 'woodly-sidebar',
                    'description'   => esc_html__( 'Add widgets here.', 'woodly' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s global-animated-hidden global-animated-up">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );

            register_sidebar(
                array(
                    'name'          => esc_html__( 'Woo Archive', 'woodly' ),
                    'id'            => 'woodly-woo-sidebar',
                    'description'   => esc_html__( 'Add widgets here.', 'woodly' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s global-animated-hidden global-animated-up">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
            
            register_sidebar(
                array(
                    'name'          => esc_html__( 'Woo Droppanel / Offcanvas', 'woodly' ),
                    'id'            => 'woodly-woo-offcanvas-sidebar',
                    'description'   => esc_html__( 'Add widgets here.', 'woodly' ),
                    'before_widget' => '<section id="%1$s" class="inner-filter-widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title d-none">',
                    'after_title'   => '</h2>',
                )
            );


            register_sidebar(
                array(
                    'name'          => esc_html__( 'Case Study Sidebar', 'woodly' ),
                    'id'            => 'woodly-cs-sidebar',
                    'description'   => esc_html__( 'Add widgets here.', 'woodly' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s global-animated-hidden global-animated-up">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
        }


    }

    new Woodly_Theme_Setup;

}
