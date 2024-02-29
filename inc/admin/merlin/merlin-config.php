<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

      $config = array(
		'directory'            => 'inc/admin/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'woodly-wizard', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'woodly-admin-menu', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/', // URL for the 'child-action-link'.
		'dev_mode'             => true, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => '', // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Setup Wizard', 'woodly' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'woodly' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'woodly' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'woodly' ),

		'btn-skip'                 => esc_html__( 'Skip', 'woodly' ),
		'btn-next'                 => esc_html__( 'Next', 'woodly' ),
		'btn-start'                => esc_html__( 'Start', 'woodly' ),
		'btn-no'                   => esc_html__( 'Cancel', 'woodly' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'woodly' ),
		'btn-child-install'        => esc_html__( 'Install', 'woodly' ),
		'btn-content-install'      => esc_html__( 'Install', 'woodly' ),
		'btn-import'               => esc_html__( 'Import', 'woodly' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'woodly' ),
		'btn-license-skip'         => esc_html__( 'Later', 'woodly' ),

		/* translators: Theme Name */
		'license-header'         => esc_html__( 'Activate Theme', 'woodly' ),
		'license-header2'         => esc_html__( 'Activate Your Theme', 'woodly' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'woodly' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Please add your Envato purchase code along with your email address to confirm the purchase.', 'woodly' ),
		'license-label'            => esc_html__( 'License key', 'woodly' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'woodly' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'woodly' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'woodly' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Let\'s Get You Started', 'woodly' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'woodly' ),
		'welcome%s'                => esc_html__( 'Thanks for purchasing woodly! Start wizard to generate child theme, intstall plugins and import demo date.', 'woodly' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'woodly' ),

		'child-header'             => esc_html__( 'Install Child Theme', 'woodly' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'woodly' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'woodly' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'woodly' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'woodly' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'woodly' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'woodly' ),

		'plugins-header'           => esc_html__( 'Install Plugins', 'woodly' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'woodly' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get you started.', 'woodly' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'woodly' ),
		'plugins-action-link'      => esc_html__( 'View Plugins', 'woodly' ),

		'import-header'            => esc_html__( 'Import Demo', 'woodly' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'woodly' ),
		'import-action-link'       => esc_html__( 'Advanced', 'woodly' ),

		'ready-header'             => esc_html__( 'You\'re Ready!', 'woodly' ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'woodly' ),
		'ready-action-link'        => esc_html__( 'Extras', 'woodly' ),
		'ready-big-button'         => esc_html__( 'View your website', 'woodly' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://teconce.ticksy.com/', esc_html__( 'Help center', 'woodly' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://www.youtube.com/@teconce', esc_html__( 'Youtube', 'woodly' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'woodly' ) ),
	)
);