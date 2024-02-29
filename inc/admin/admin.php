<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
function woodly_welcome_page(){
    require_once 'woodly-welcome.php';
}

function woodly_admin_menu(){
    if ( current_user_can( 'edit_theme_options' ) ) {
        add_menu_page( 'Woodly', 'Woodly', 'administrator', 'woodly-admin-menu', 'woodly_welcome_page',  WOODLY_URL .'/assets/images/Icon.svg', 4 );
        add_submenu_page( 'woodly-admin-menu', 'woodly', esc_html__('Welcome','woodly'), 'administrator', 'woodly-admin-menu', 'woodly_welcome_page',0 );
      
        
        
     
    }
}

add_action( 'admin_menu', 'woodly_admin_menu' );
