<?php
global $current_user;
wp_get_current_user();
$logo1x = cs_get_option('main-logo', 'url');
$logo2x = cs_get_option('main-logo-retina', 'url');
if ($logo2x) {
    $logo2x = cs_get_option('main-logo-retina', 'url');
} else {
    $logo2x = cs_get_option('main-logo', 'url');
}

?>
<div class="block lg:hidden">
   <div class="woodly-mobile-menu d-block d-customL-none">

        <nav  class="mobile--nav-menu woodly-accordion-box">

            <div class="woodly-nav-logo-popover">
                <div class="woodly-site-branding">

                    <?php if ($logo1x){ ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($logo1x);?>" srcset="<?php echo esc_url($logo1x);?> 1x, <?php echo esc_url($logo2x);?> 2x" alt="logo" class="has-retina"></a>
                    <?php } else {?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo get_template_directory_uri();?>/assets/images/Logo.svg" alt="logo"></a>
                    <?php }?>

                </div><!-- .site-branding -->
            </div>
            <div class="woodly-search-popover">

            </div>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main',
                'menu_id'        => 'primary-menu-mobile',
                'container_id' => 'mayosis-sidemenu',
                'walker' => new Woodly_Accordion_Walker(),
            ) );
            ?>

            <div class="bottom-account-menu">

                <?php
                if (!is_user_logged_in())
                { ?>
                    <?php
                    $logpage = cs_get_option('login_page_link');
                    ?>
                    <a href="<?php echo esc_attr( esc_url( get_page_link( $logpage ) ) ) ?>" class="woodly_mob_login_btn"><i class="ri-user-line"></i> <?php esc_attr_e('Login','woodly');?></a>

                <?php } else { ?>
                    <div class="btn-group dropup msv-mobile-pop-account">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-user-line"></i> <?php echo esc_html($current_user->display_name ); ?>
                        </button>
                        <ul class="dropdown-menu popr-box">
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'account-menu',
                                    'container_class' => 'msv-acc-menu-itemwrap',
                                    'menu_class' => 'msv-acc-menu-itembox',
                                )
                            ); ?>
                            <div class="mayosis-account-information mobile_account_info">
                                <span><?php echo get_avatar(get_the_author_meta('email'), '30'); ?></span>

                                <a href="<?php echo wp_logout_url(home_url('/'));?> " class="mayosis-logout-link"><?php esc_html_e('Logout','woodly');?></a>
                            </div>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </nav>

        <div class="overlaymobile"></div>
        <div  class="mobile-nav">
            <span class="burger"><span></span></span>
        </div >
    </div>
</div>

<div class="d-none d-customL-block navbar navbar-expand-lg">

     <?php
    wp_nav_menu(array(
        'theme_location' => 'main',
        'menu_id' => 'primary-menu',
        'container' => 'div',
        'container_class' => 'collapse navbar-collapse woodly-m-menu',
        'menu_class' => 'nav navbar-nav nav-style-megamenu',
        'fallback_cb' => '',
        'walker' => new WP_Bootstrap_Navwalker(),
    ));
    ?>


</div>