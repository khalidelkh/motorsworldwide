<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package Indusri WordPress theme
 */

function indusri_tgmpa_plugins_register() {

	// Get array of recommended plugins.
    $theme_required_plugin_lists = array();
    $url = 'https://api.wordpress.org/plugins/info/1.0/unyson';
    $api_response = wp_remote_get( $url );
    if ( is_array( $api_response ) && ! is_wp_error( $api_response ) ) {
        if( isset($api_response['response']) && !empty($api_response['response']) ) {
            if ( 404 == $api_response['response']['code'] && 'Not Found' == $api_response['response']['message'] ) {
                $unyson_plugin = array(
                    array(
                        'name'               => esc_html__('Unyson', 'indusri'),
                        'slug'               => 'unyson',
                        'source'             => INDUSRI_MODULE_DIR . '/plugins/unyson.zip',
                        'required'           => true,
                        'version'            => '2.7.28',
                        'force_activation'   => false,
                        'force_deactivation' => false,
                    )
                );
            } else {
                $unyson_plugin = array(
                    array(
                        'name'     => esc_html__('Unyson', 'indusri'),
                        'slug'     => 'unyson',
                        'required' => true,
                    )
                );
            }
        }
    }
	$plugins_list = array(
        array(
            'name'               => esc_html__('Indusri Plus', 'indusri'),
            'slug'               => 'indusri-plus',
            'source'             => INDUSRI_MODULE_DIR . '/plugins/indusri-plus.zip',
            'required'           => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('Indusri Pro', 'indusri'),
            'slug'               => 'indusri-pro',
            'source'             => INDUSRI_MODULE_DIR . '/plugins/indusri-pro.zip',
            'required'           => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('Elementor', 'indusri'),
            'slug'     => 'elementor',
            'required' => true,
        ),
        array(
            'name'               => esc_html__('WeDesignTech Elementor Addon', 'indusri'),
            'slug'               => 'wedesigntech-elementor-addon',
            'source'             => INDUSRI_MODULE_DIR . '/plugins/wedesigntech-elementor-addon.zip',
            'required'           => true,
            'version'            => '1.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('WeDesignTech Portfolio', 'indusri'),
            'slug'               => 'wedesigntech-portfolio',
            'source'             => INDUSRI_MODULE_DIR . '/plugins/wedesigntech-portfolio.zip',
            'required'           => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('WooCommerce', 'indusri'),
            'slug'     => 'woocommerce',
            'required' => false,
        ),
        array(
            'name'               => esc_html__('Indusri Shop', 'indusri'),
            'slug'               => 'indusri-shop',
            'source'             => INDUSRI_MODULE_DIR . '/plugins/indusri-shop.zip',
            'required'           => false,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('TI WooCommerce Wishlist ', 'netlink'),
            'slug'     => 'ti-woocommerce-wishlist',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('Contact Form 7', 'indusri'),
            'slug'     => 'contact-form-7',
            'required' => true,
        )
	);
    $theme_required_plugin_lists = array_merge( $unyson_plugin, $plugins_list );
    $plugins = apply_filters('indusri_required_plugins_list', $theme_required_plugin_lists);
	// Register notice
	tgmpa( $plugins, array(
		'id'           => 'indusri_theme',
		'domain'       => 'indusri',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
		'dismissable'  => true,
	) );

}
add_action( 'tgmpa_register', 'indusri_tgmpa_plugins_register' );