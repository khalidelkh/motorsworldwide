<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Indusri_Woo_Listing_Option_Content_Icon_Group_Style' ) ) {

    class Indusri_Woo_Listing_Option_Content_Icon_Group_Style extends Indusri_Woo_Listing_Option_Core {

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

            $this->option_slug          = 'product-content-iconsgroup-style';
            $this->option_name          = esc_html__('Icons Group - Style', 'indusri');
            $this->option_type          = array ( 'class', 'value-css' );
            $this->option_default_value = 'product-content-iconsgroup-style-simple';
            $this->option_value_prefix  = 'product-content-iconsgroup-style-';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'indusri_woo_custom_product_template_content_options', array( $this, 'woo_custom_product_template_content_options'), 25, 1 );
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
         * Setting Args
         */
        function setting_args() {
            $settings            =  array ();
            $settings['id']      =  $this->option_slug;
            $settings['type']    =  'select';
            $settings['title']   =  $this->option_name;
            $settings['options'] =  array (
                'product-content-iconsgroup-style-simple'                      => esc_html__('Simple', 'indusri'),
                'product-content-iconsgroup-style-bgfill-square'               => esc_html__('Background Fill Square', 'indusri'),
                'product-content-iconsgroup-style-bgfill-rounded-square'       => esc_html__('Background Fill Rounded Square', 'indusri'),
                'product-content-iconsgroup-style-bgfill-rounded'              => esc_html__('Background Fill Rounded', 'indusri'),
                'product-content-iconsgroup-style-brdrfill-square'             => esc_html__('Border Fill Square', 'indusri'),
                'product-content-iconsgroup-style-brdrfill-rounded-square'     => esc_html__('Border Fill Rounded Square', 'indusri'),
                'product-content-iconsgroup-style-brdrfill-rounded'            => esc_html__('Border Fill Rounded', 'indusri'),
                'product-content-iconsgroup-style-skinbgfill-square'           => esc_html__('Skin Background Fill Square', 'indusri'),
                'product-content-iconsgroup-style-skinbgfill-rounded-square'   => esc_html__('Skin Background Fill Rounded Square', 'indusri'),
                'product-content-iconsgroup-style-skinbgfill-rounded'          => esc_html__('Skin Background Fill Rounded', 'indusri'),
                'product-content-iconsgroup-style-skinbrdrfill-square'         => esc_html__('Skin Border Fill Square', 'indusri'),
                'product-content-iconsgroup-style-skinbrdrfill-rounded-square' => esc_html__('Skin Border Fill Rounded Square', 'indusri'),
                'product-content-iconsgroup-style-skinbrdrfill-rounded'        => esc_html__('Skin Border Fill Rounded', 'indusri')
            );
            $settings['default']    =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('indusri_woo_listing_option_content_iconsgroup_style') ) {
	function indusri_woo_listing_option_content_iconsgroup_style() {
		return Indusri_Woo_Listing_Option_Content_Icon_Group_Style::instance();
	}
}

indusri_woo_listing_option_content_iconsgroup_style();