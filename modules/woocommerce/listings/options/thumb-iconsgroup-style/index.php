<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Indusri_Woo_Listing_Option_Thumb_IconsGroup_Style' ) ) {

    class Indusri_Woo_Listing_Option_Thumb_IconsGroup_Style extends Indusri_Woo_Listing_Option_Core {

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

            $this->option_slug          = 'product-thumb-iconsgroup-style';
            $this->option_name          = esc_html__('Icons Group - Style', 'indusri');
            $this->option_default_value = 'product-thumb-iconsgroup-style-simple';
            $this->option_type          = array ( 'class', 'value-css' );
            $this->option_value_prefix  = 'product-thumb-iconsgroup-style-';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'indusri_woo_custom_product_template_thumb_options', array( $this, 'woo_custom_product_template_thumb_options'), 30, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_thumb_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'thumb';
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
                'product-thumb-iconsgroup-style-simple'                      => esc_html__('Simple', 'indusri'),
                'product-thumb-iconsgroup-style-bgfill-square'               => esc_html__('Background Fill Square', 'indusri'),
                'product-thumb-iconsgroup-style-bgfill-rounded-square'       => esc_html__('Background Fill Rounded Square', 'indusri'),
                'product-thumb-iconsgroup-style-bgfill-rounded'              => esc_html__('Background Fill Rounded', 'indusri'),
                'product-thumb-iconsgroup-style-brdrfill-square'             => esc_html__('Border Fill Square', 'indusri'),
                'product-thumb-iconsgroup-style-brdrfill-rounded-square'     => esc_html__('Border Fill Rounded Square', 'indusri'),
                'product-thumb-iconsgroup-style-brdrfill-rounded'            => esc_html__('Border Fill Rounded', 'indusri'),
                'product-thumb-iconsgroup-style-skinbgfill-square'           => esc_html__('Skin Background Fill Square', 'indusri'),
                'product-thumb-iconsgroup-style-skinbgfill-rounded-square'   => esc_html__('Skin Background Fill Rounded Square', 'indusri'),
                'product-thumb-iconsgroup-style-skinbgfill-rounded'          => esc_html__('Skin Background Fill Rounded', 'indusri'),
                'product-thumb-iconsgroup-style-skinbrdrfill-square'         => esc_html__('Skin Border Fill Square', 'indusri'),
                'product-thumb-iconsgroup-style-skinbrdrfill-rounded-square' => esc_html__('Skin Border Fill Rounded Square', 'indusri'),
                'product-thumb-iconsgroup-style-skinbrdrfill-rounded'        => esc_html__('Skin Border Fill Rounded', 'indusri')
            );
            $settings['default']    =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('indusri_woo_listing_option_thumb_iconsgroup_style') ) {
	function indusri_woo_listing_option_thumb_iconsgroup_style() {
		return Indusri_Woo_Listing_Option_Thumb_IconsGroup_Style::instance();
	}
}

indusri_woo_listing_option_thumb_iconsgroup_style();