<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Indusri_Woo_Listing_Option_Space' ) ) {

    class Indusri_Woo_Listing_Option_Space extends Indusri_Woo_Listing_Option_Core {

        private static $_instance = null;

        public $option_slug;

        public $option_name;

        public $option_type;

        public $option_default_value;

        public $option_value_prefix;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {

            $this->option_slug          = 'product-space';
            $this->option_name          = esc_html__('Space', 'indusri');
            $this->option_type          = array ( 'class', 'value-css' );
            $this->option_default_value = 'product-with-space';
            $this->option_value_prefix  = 'product-';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'indusri_woo_custom_product_template_common_options', array( $this, 'woo_custom_product_template_common_options'), 15, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_common_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'common';
        }

        /**
         * Setting Args
         */
        function setting_args() {
            $settings            =  array ();
            $settings['id']      =  $this->option_slug;
            $settings['type']    =  'select';
            $settings['title']   =  $this->option_name;
            $settings['options'] =  array (
                'product-without-space' => esc_html__('False', 'indusri'),
                'product-with-space'    => esc_html__('True', 'indusri'),
            );
            $settings['default'] =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('indusri_woo_listing_option_space') ) {
	function indusri_woo_listing_option_space() {
		return Indusri_Woo_Listing_Option_Space::instance();
	}
}

indusri_woo_listing_option_space();