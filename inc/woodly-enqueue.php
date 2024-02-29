<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
if (!class_exists('Woodly_Theme_Script')) {

    class Woodly_Theme_Script
    {


        public function __construct()
        {


            add_action('wp_enqueue_scripts', array($this, 'woodly_scripts'));

            add_action('admin_enqueue_scripts', array($this, 'woodly_register_admin_styles'));


        }



#-----------------------------------------------------------------#
# Enqueue Styles & scripts
#-----------------------------------------------------------------#/

        public function woodly_scripts()
        {

            wp_enqueue_style('bootstrap', WOODLY_URL . '/assets/css/bootstrap.min.css', false, WOODLY_VERSION, 'all');
            wp_enqueue_style('swiper', WOODLY_URL . '/assets/css/swiper.min.css', false, WOODLY_VERSION, 'all');
            wp_enqueue_style('wow.animate', WOODLY_URL . '/assets/css/animate.css', false, WOODLY_VERSION, 'all');

            wp_enqueue_style('ticon', WOODLY_URL . '/assets/css/ticon.css', false, WOODLY_VERSION, 'all');
            wp_enqueue_style('woodly-animated', WOODLY_URL . '/assets/css/animated.css', false, WOODLY_VERSION, 'all');
            wp_enqueue_style('woodly-default', WOODLY_URL . '/assets/css/theme-default.css', false, WOODLY_VERSION, 'all');

            wp_enqueue_style('gridzy', WOODLY_URL . '/assets/css/gridzy.min.css', false, WOODLY_VERSION, 'all');

            wp_enqueue_style('woodly-style', WOODLY_URL . '/assets/css/woodly-style.css', false, WOODLY_VERSION, 'all');
            wp_enqueue_style('woodly-woocommerce-style-two', WOODLY_URL . '/assets/css/woodly-woocommerce-style.css', false, WOODLY_VERSION, 'all');
            wp_style_add_data('woodly-style', 'rtl', 'replace');
            
             wp_enqueue_style('woodly-google-fonts', woodly_fonts_url(), array(), null);

            wp_enqueue_style('woodly-responsive', WOODLY_URL . '/assets/css/woodly-responsive.css', false, WOODLY_VERSION, 'all');


            wp_enqueue_script('bootstrap', WOODLY_URL . '/assets/js/bootstrap.bundle.min.js', array('jquery'), WOODLY_VERSION, true);
            wp_enqueue_script('swiper', WOODLY_URL . '/assets/js/swiper.min.js', array('jquery'), WOODLY_VERSION, true);
            wp_enqueue_script('wow.min.js', WOODLY_URL . '/assets/js/wow.min.js', array('jquery'), WOODLY_VERSION, true);
            wp_enqueue_script('woodly-common-script', WOODLY_URL . '/assets/js/common.script.min.js', array('jquery'), WOODLY_VERSION, true);

            wp_enqueue_script('hover-animate', WOODLY_URL . '/assets/js/hover.animate.js', array('jquery'), WOODLY_VERSION, true);


            wp_enqueue_script('theia', WOODLY_URL . '/assets/js/theia-sticky-sidebar.min.js', array('jquery'), WOODLY_VERSION, true);
            wp_enqueue_script('resizeSensor', WOODLY_URL . '/assets/js/ResizeSensor.min.js', array('jquery'), WOODLY_VERSION, true);

            wp_enqueue_script('splitting', WOODLY_URL . '/assets/js/SplitText3.min.js', array('jquery'), WOODLY_VERSION, true);
            wp_enqueue_script('lax', WOODLY_URL . '/assets/js/gsap.min.js', array('jquery'), WOODLY_VERSION, true);


            wp_enqueue_script('marquee', WOODLY_URL . '/assets/js/marquee.min.js', array('jquery'), WOODLY_VERSION, true);
            wp_enqueue_script('hotspot', WOODLY_URL . '/assets/js/jquery.hotspot.js', array('jquery'), WOODLY_VERSION, true);


            wp_enqueue_script('howdydo', WOODLY_URL . '/assets/js/jquery.notification.min.js', array('jquery'), WOODLY_VERSION, true);


            wp_enqueue_script('woodly-main-script', WOODLY_URL . '/assets/js/woodly-main-script.js', array('jquery'), WOODLY_VERSION, true);


            if (class_exists('Woodly_Core')) {
                if (class_exists('WooCommerce')) {
                    wp_enqueue_script('woodly-woo', WOODLY_URL . '/assets/js/woodly-wc.js', array('jquery'), WOODLY_VERSION, true);

                }
            }


            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
           $ajax_url = admin_url('admin-ajax.php', 'relative');
            $script_params = array(
                'ajax_url' => $ajax_url
            );
            
            if (class_exists('WooCommerce')) {
                wp_enqueue_style('woodly-flickity', WOODLY_URL . '/assets/css/flickity.css', false, WOODLY_VERSION, 'all');
                wp_enqueue_script('woodly-flickity', WOODLY_URL . '/assets/js/flickity.pkgd.min.js', array(), WOODLY_VERSION, true);
                
                 wp_enqueue_script('woodly-mini-cart', WOODLY_URL . '/assets/js/woodly-mini-cart.js', array('jquery'), WOODLY_VERSION, true);

                    wp_localize_script( 'woodly-mini-cart', 'woodly_params', $script_params );

            }
        }




#-----------------------------------------------------------------#
# Register/Enqueue JS/CSS In Admin Panel
#-----------------------------------------------------------------#

        public function woodly_register_admin_styles()
        {

            wp_enqueue_style('woodly-admin-css', WOODLY_URL . '/assets/css/admin.css');
        }


    }

    new Woodly_Theme_Script;
}