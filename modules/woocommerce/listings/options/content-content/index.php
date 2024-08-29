<?php

/**
 * Listing Options - Product Thumb Content
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Indusri_Woo_Listing_Option_Content_Content' ) ) {

    class Indusri_Woo_Listing_Option_Content_Content extends Indusri_Woo_Listing_Option_Core {

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

            $this->option_slug          = 'product-content-content';
            $this->option_name          = esc_html__('Content Elements', 'indusri');
            $this->option_type          = array ( 'html', 'value-css' );
            $this->option_default_value = '';
            $this->option_value_prefix  = '';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {

            /* Custom Product Templates - Options */
            add_filter( 'indusri_woo_custom_product_template_content_options', array( $this, 'woo_custom_product_template_content_options'), 10, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_content_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'content';
        }

        /**
         * Setting Arguments
         */
        function setting_args() {

            $settings            =  array ();
            $settings['id']      =  $this->option_slug;
            $settings['type']    =  'sorter';
            $settings['title']   =  $this->option_name;
            $settings['default'] =  array (
                'enabled'            => array(
                    'title'          => esc_html__('Title', 'indusri'),
                    'category'       => esc_html__('Category', 'indusri'),
                    'price'          => esc_html__('Price', 'indusri'),
                    'button_element' => esc_html__('Button Element', 'indusri'),
                    'icons_group'    => esc_html__('Icons Group', 'indusri'),
                ),
                'disabled'         => array(
                    'excerpt'       => esc_html__('Excerpt', 'indusri'),
                    'rating'        => esc_html__('Rating', 'indusri'),
                    'countdown'     => esc_html__('Count Down', 'indusri'),
                    'separator'     => esc_html__('Separator', 'indusri'),
                    'element_group' => esc_html__('Element Group', 'indusri'),
                    'product_notes' => esc_html__('Product Notes', 'indusri'),
                    'label_instock' => esc_html__('Label - InStock', 'indusri'),
                    'swatches'      => esc_html__('Swatches', 'indusri')
                ),
            );



            return $settings;
        }
    }

}

if( !function_exists('indusri_woo_listing_option_content_content') ) {
	function indusri_woo_listing_option_content_content() {
		return Indusri_Woo_Listing_Option_Content_Content::instance();
	}
}

indusri_woo_listing_option_content_content();