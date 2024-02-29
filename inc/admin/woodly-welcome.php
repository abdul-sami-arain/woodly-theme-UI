<?php

$ssl_check = 'https' === substr(get_home_url(), 0, 5);
$green_mark = '<mark class="green"><span class="dashicons dashicons-yes"></span></mark>';

$woodlytheme = wp_get_theme();

$plugins_counts = (array)get_option('active_plugins', array());

if (is_multisite()) {
    $network_activated_plugins = array_keys(get_site_option('active_sitewide_plugins', array()));
    $plugins_counts = array_merge($plugins_counts, $network_activated_plugins);
}
?>

<div class="wrap about-wrap woodly-wrap">
    <h1><?php _e('Welcome to Woodly', 'woodly'); ?></h1>

    <div class="about-text"><?php echo esc_html__('Woodly theme is now installed and ready to use!', 'woodly'); ?></div>
    <div class="woodly-badge">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/admin-logo.svg"
             alt="<?php esc_html_e('Woodly Admin Logo', 'woodly'); ?>">

        <p><?php echo esc_html($woodlytheme->get('Version')); ?></p>
    </div>
    <h2 class="nav-tab-wrapper">
        <?php
        printf('<a href="#" class="nav-tab nav-tab-active">%s</a>', __('Welcome', 'woodly'));
        if (class_exists('Woodly_Core')) {
        printf('<a href="admin.php?page=woodly_options" class="nav-tab">%s</a>', __('Theme Options', 'woodly'));
        }

        printf('<a href="%s" class="nav-tab">%s</a>', admin_url('admin.php?page=woodly-wizard&step=content'), __('Demo Import', 'woodly'));
        ?>
    </h2>


    <div class="woodly-section nav-tab-active" id="welcome">
        <p class="about-description">
            <?php printf(__('Before you get started, please be sure to always check out documentation Which Included In the theme folder or from <a href="https://docs.teconce.com/tecdocs/woodly-animated-furniture-woocommerce-theme/" target="_blank">Website</a>. We outline all kinds of good information and provide you with all the details you need to use woodly.', 'woodly')); ?>
        </p>
        <p class="about-description">
            <?php printf(__('If you are unable to find your answer in our documentation, please contact us via  <a href="https://teconce.ticksy.com/" target="_blank">submit a ticket</a> with your purchase code, site CPanel, and admin login info.', 'woodly'), 'mailto:hello@teconce.com'); ?>
        </p>
        <p class="about-description">
            <?php printf(__('We are very happy to help you and you will get the reply from us  faster than you expected.', 'woodly'), 'https://docs.teconce.com/tecdocs/woodly-animated-furniture-woocommerce-theme/'); ?>
        </p>

        <p class="about-description">
            <?php printf(__('Note: Please Install All Required Plugins Before Install Demo !', 'woodly'), 'https://docs.teconce.com/tecdocs/woodly-animated-furniture-woocommerce-theme/'); ?>
        </p>
    </div>
    <div class="woodly-thanks">
        <p class="description"><?php esc_html_e('Thank you for using', 'woodly'); ?>
            <strong><?php esc_html_e('Woodly', 'woodly'); ?></strong> <?php esc_html_e('theme!', 'woodly'); ?> <?php esc_html_e('Powered by', 'woodly'); ?>
            <a href="<?php echo esc_url('https://teconce.com'); ?>"
               target="_blank"><?php esc_html_e('Teconce', 'woodly'); ?></a></p>
    </div>

<div class="theme_inner_row">
    <div class="woodly-system-stats woodly-admin-50">
        <h3>System Status</h3>

        <table class="system-status-table">

			


				<tr>
					<td width="180"><?php esc_html_e( 'Install Location:', 'woodly' ); ?></td>
					<td>
						<?php
						if ( get_template() === WOODLY_THEME_NAME ) {
							echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--success">%s</code>', esc_html__( 'Standard', 'woodly' ) ) );
						} else {
							echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--danger">%s</code>', __( 'Non-standard', 'woodly' ) ) );
							echo woodly__wp_kses( sprintf( __( 'Using %s Theme from non-standard install location or having a different directory name could lead to issues in receiving and installing updates. Please make sure that theme folder name is <strong>%s</strong>, without spaces.', 'woodly' ), woodly__get_props('theme_title'), WOODLY_THEME_NAME ) );
						}
						?>
					</td>
				</tr>
				<tr>
					<td><?php esc_html_e( 'File System Accessible:', 'woodly' ); ?></td>
					<td>
						<?php
						global $wp_filesystem;

						if ( $wp_filesystem || WP_Filesystem() ) {
							echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--success">%s</code>', esc_html__( 'Yes', 'woodly' ) ) );
						} else {
							echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--danger">%s</code><p>%s</p>',
								__( 'No', 'woodly' ),
								__( 'Theme has no direct access to the file system. Therefore plugins and pre-made websites installation is not possible to work properly.<br>Please try to insert the following code: <code>define( "FS_METHOD", "direct" );</code><br>before <code>/* That\'s all, stop editing! Happy blogging. */</code> in <code>wp-config.php</code>.', 'woodly' ) )
							);
						}
						?>
					</td>
				</tr>
				<tr>
					<td><?php esc_html_e( 'Uploads Folder Writable:', 'woodly' ); ?></td>
					<td>
					<?php
						$wp_uploads = wp_get_upload_dir();
						if ( wp_is_writable( trailingslashit( $wp_uploads['basedir'] ) ) ) {
							echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--success">%s</code>', esc_html__( 'Yes', 'woodly' ) ) );
						} else {
							echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--danger">%s</code><p>%s</p>',
								__( 'No', 'woodly' ),
								__( 'Uploads folder must be writable to allow WordPress function properly.<br>See <a href="https://codex.wordpress.org/Changing_File_Permissions" target="_blank">changing file permissions</a> or contact your hosting provider.', 'woodly' ) )
							);
						}
					?>
					</td>
				</tr>
				<tr>
					<td><?php esc_html_e( 'ZipArchive Support:', 'woodly' ); ?></td>
					<td>
					<?php
					if ( class_exists( 'ZipArchive' ) ) {
						echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--success">%s</code>', esc_html__( 'Yes', 'woodly' ) ) );
					} else {
						echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--danger">%s</code><p>%s</p>',
							__( 'No', 'woodly' ),
							__( 'ZipArchive is required for plugins installation and pre-made websites import.<br>Please contact your hosting provider.', 'woodly' ) )
						);
					}
					?>
					</td>
				</tr>
				<tr>
					<td><?php esc_html_e( 'PHP Version:', 'woodly' ); ?></td>
					<td>
					<?php
					$php_version = PHP_VERSION;
					if ( version_compare( '7.3.0', $php_version, '>' ) ) {
						echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--warning">%s</code> %s',
							$php_version,
							__( 'Current version is sufficient. However <strong>v.7.3.0</strong> or greater is recommended to improve the performance.', 'woodly' ) )
						);
					} else {
						echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--success">%s</code> %s',
							$php_version,
							__( 'Current version is sufficient.', 'woodly' ) )
						);
					}
					?>
					</td>
				</tr>
				<tr>
					<td><?php esc_html_e( 'PHP Max Input Vars:', 'woodly' ); ?></td>
					<td>
					<?php
					$max_input_vars = ini_get( 'max_input_vars' );
					if ( $max_input_vars < 1000 ) {
						echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--danger">%s</code> %s',
							$max_input_vars,
							__( 'Minimum value is <strong>1000</strong>. <strong>2000</strong> is recommended. <strong>3000</strong> or more may be required if lots of plugins are in use and/or you have a large amount of menu items.', 'woodly' ) )
						);

					} elseif ( $max_input_vars < 2000 ) {
						echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--warning">%s</code> %s',
							$max_input_vars,
							__( 'Current limit is sufficient for most tasks. <strong>2000</strong> is recommended. <strong>3000</strong> or more may be required if lots of plugins are in use and/or you have a large amount of menu items.', 'woodly' ) )
						);
					} elseif ( $max_input_vars < 3000 ) {
						echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--success">%s</code> %s',
							$max_input_vars,
							__( 'Current limit is sufficient. However, up to <strong>3000</strong> or more may be required if lots of plugins are in use and/or you have a large amount of menu items.', 'woodly' ) )
						);
					} else {
						echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--success">%s</code> %s',
							$max_input_vars,
							__( 'Current limit is sufficient.', 'woodly' ) )
						);
					}
					?>
					</td>
				</tr>
				<tr>
					<td><?php esc_html_e( 'WP Memory Limit:', 'woodly' ); ?></td>
					<td>
					<?php

					$memory = wp_convert_hr_to_bytes( @ini_get( 'memory_limit' ) );

					// translators: %1$s - wp codex article url.
					$tip = woodly__wp_kses( sprintf(  __( '<br><small>See <a href="%1$s" target="_blank">increasing memory allocated to PHP</a> or contact your hosting provider.</small>', 'woodly' ), 'http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP' ) );

					if ( $memory < 67108864 ) {
						echo woodly__wp_kses(
							sprintf( '<code class="ssFlag ssFlag--danger">%s</code> %s %s',
								size_format( $memory ),
								__( 'Minimum value is <strong>64 MB</strong>. <strong>128 MB</strong> is recommended. <strong>256 MB</strong> or more may be required if lots of plugins are in use and/or you want to install the London Demo.', 'woodly' ),
								$tip
							)
						);
					} elseif ( $memory < 134217728 ) {
						echo woodly__wp_kses(
							sprintf( '<code class="ssFlag ssFlag--warning">%s</code> %s %s',
								size_format( $memory ),
								__( 'Current memory limit is sufficient for most tasks. However, recommended value is <strong>128 MB</strong>. <strong>256 MB</strong> or more may be required if lots of plugins are in use and/or you want to install the London Demo.', 'woodly' ),
								$tip
							)
						);
					} elseif ( $memory < 268435456 ) {
						echo woodly__wp_kses(
							sprintf( '<code class="ssFlag ssFlag--success">%s</code> %s %s',
								size_format( $memory ),
								__( 'Current memory limit is sufficient. However, <strong>256 MB</strong> or more may be required if lots of plugins are in use and/or you want to install the London Demo.', 'woodly' ),
								$tip
							)
						);
					} else {
						echo woodly__wp_kses(
							sprintf( '<code class="ssFlag ssFlag--success">%s</code> %s',
								size_format( $memory ),
								__( 'Current memory limit is sufficient.', 'woodly' )
							)
						);
					}
					?>
					</td>
				</tr>
				<?php if ( function_exists( 'ini_get' ) ) : ?>
					<tr>
						<td><?php esc_html_e( 'PHP Time Limit:', 'woodly' ); ?></td>
						<td>
							<?php
							$time_limit = ini_get( 'max_execution_time' );

							// translators: %1$s - wp codex article url.
							$tip = woodly__wp_kses( sprintf( __( '<br><small>See <a href="%1$s" target="_blank">increasing max PHP execution time</a> or contact your hosting provider.</small>', 'woodly' ), 'http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded' ) );

							if ( 300 > $time_limit && 0 != $time_limit ) {
								echo woodly__wp_kses(
									sprintf( '<code class="ssFlag ssFlag--danger">%s</code> %s %s',
										$time_limit,
										__( 'Minimum value is <strong>300</strong>. <strong>600</strong> is recommended.', 'woodly' ),
										$tip
									)
								);
							} elseif ( (600 > $time_limit && 300 <= $time_limit) && 0 != $time_limit ) {
								echo woodly__wp_kses(
									sprintf( '<code class="ssFlag ssFlag--warning">%s</code> %s %s',
										$time_limit,
										__( 'Current time limit is sufficient, however <strong>600</strong> is recommended.', 'woodly' ),
										$tip
									)
								);
							} elseif ( 600 <= $time_limit && 0 != $time_limit ) {
								echo woodly__wp_kses(
									sprintf( '<code class="ssFlag ssFlag--success">%s</code> %s %s',
										$time_limit,
										__( 'Current time limit should be sufficient.', 'woodly' ),
										$tip
									)
								);
							} else {
								echo woodly__wp_kses(
									sprintf( '<code class="ssFlag ssFlag--success">%s</code> %s',
										_x( 'unlimited', 'Time limit status.', 'woodly' ),
										__( 'Current time limit is sufficient.', 'woodly' )
									)
								);
							}
							?>
						</td>
					</tr>
				<?php endif; ?>
				<?php if ( function_exists( 'ini_get' ) ) : ?>
					<tr>
						<td><?php esc_html_e( 'Zlib Output Compression:', 'woodly' ); ?></td>
						<td>
							<?php
							$zlib_output_compression = ini_get( 'zlib.output_compression' );

							if ( strtolower($zlib_output_compression) == 'on' ) {
								echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--danger">%s</code> %s',
									__( 'On', 'woodly' ),
									sprintf(__( 'zlib.output_compression is problematic and throws errors most of the time in WordPress. Make sure to <a href="%s" target="_blank">disable it</a>.', 'woodly' ), woodly__support_url('kb/undefined-error-when-trying-to-install-plugins-or-import-demos/') ) )
								);
							} else {
								echo woodly__wp_kses( sprintf( '<code class="ssFlag ssFlag--success">%s</code>', esc_html__( 'Off', 'woodly' ) ) );
							}
							?>
						</td>
					</tr>
				<?php endif; ?>
			</table>
    </div>

    <div class="woodly-system-stats woodly-admin-50">
        <h3>Theme Information</h3>

        <table class="system-status-table">
            <tbody>
            <tr>
                <td><?php esc_html_e('Theme Name', 'woodly'); ?></td>
                <td><?php echo wp_get_theme(); ?></td>
            </tr>

            <tr>
                <td><?php esc_html_e('Author Name', 'woodly'); ?></td>
                <td><?php echo maybe_unserialize($woodlytheme->get('Author')); ?></td>
            </tr>

            <tr>
                <td><?php esc_html_e('Current Version', 'woodly'); ?></td>
                <td><?php echo esc_html($woodlytheme->get('Version')); ?></td>
            </tr>

            <tr>
                <td><?php esc_html_e('Text Domain', 'woodly'); ?></td>
                <td><?php echo esc_html($woodlytheme->get('TextDomain')); ?></td>
            </tr>

            <tr>
                <td><?php esc_html_e('Child Theme', 'woodly'); ?></td>
                <td><?php echo is_child_theme() ? $green_mark : 'No'; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
    <div class="woodly-system-stats">
        <h3>Active Plugins (<?php echo count($plugins_counts); ?>)</h3>
        <table class="system-status-table">
            <tbody>
            <?php
            foreach ($plugins_counts as $plugin) {

                $plugin_info = @get_plugin_data(WP_PLUGIN_DIR . '/' . $plugin);
                $dirname = dirname($plugin);
                $version_string = '';
                $network_string = '';

                if (!empty($plugin_info['Name'])) {

                    // Link the plugin name to the plugin url if available.
                    $plugin_name = esc_html($plugin_info['Name']);

                    if (!empty($plugin_info['PluginURI'])) {
                        $plugin_name = '<a href="' . esc_url($plugin_info['PluginURI']) . '" target="_blank">' . $plugin_name . '</a>';
                    }

                    ?>
                    <tr>
                        <?php
                        $allowed_html = [
                            'a' => [
                                'href' => [],
                                'title' => [],
                            ],
                            'br' => [],
                            'em' => [],
                            'strong' => [],
                        ];
                        ?>
                        <td class="ncs_plugin_name"><?php echo wp_kses($plugin_name, $allowed_html); ?></td>
                        <td><?php echo sprintf('by %s', $plugin_info['Author']) . ' &ndash; ' . esc_html($plugin_info['Version']) . $version_string . $network_string; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>

    </div>
</div>

