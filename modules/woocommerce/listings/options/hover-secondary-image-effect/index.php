<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Indusri_Woo_Listing_Option_Hover_Secondary_Image_Effect' ) ) {

    class Indusri_Woo_Listing_Option_Hover_Secondary_Image_Effect extends Indusri_Woo_Listing_Option_Core {

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

            $this->option_slug          = 'product-hover-secondary-image-effect';
            $this->option_name          = esc_html__('Hover Secondary Image Effect', 'indusri');
            $this->option_default_value = 'product-hover-secimage-fade';
            $this->option_type          = array ( 'class', 'value-css' );
            $this->option_value_prefix  = 'product-hover-';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'indusri_woo_custom_product_template_hover_options', array( $this, 'woo_custom_product_template_hover_options'), 15, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_hover_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'hover';
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
                'product-hover-secimage-fade'         => esc_html__('Fade', 'indusri'),
                'product-hover-secimage-zoomin'       => esc_html__('Zoom In', 'indusri'),
                'product-hover-secimage-zoomout'      => esc_html__('Zoom Out', 'indusri'),
                'product-hover-secimage-zoomoutup'    => esc_html__('Zoom Out Up', 'indusri'),
                'product-hover-secimage-zoomoutdown'  => esc_html__('Zoom Out Down', 'indusri'),
                'product-hover-secimage-zoomoutleft'  => esc_html__('Zoom Out Left', 'indusri'),
                'product-hover-secimage-zoomoutright' => esc_html__('Zoom Out Right', 'indusri'),
                'product-hover-secimage-pushup'       => esc_html__('Push Up', 'indusri'),
                'product-hover-secimage-pushdown'     => esc_html__('Push Down', 'indusri'),
                'product-hover-secimage-pushleft'     => esc_html__('Push Left', 'indusri'),
                'product-hover-secimage-pushright'    => esc_html__('Push Right', 'indusri'),
                'product-hover-secimage-slideup'      => esc_html__('Slide Up', 'indusri'),
                'product-hover-secimage-slidedown'    => esc_html__('Slide Down', 'indusri'),
                'product-hover-secimage-slideleft'    => esc_html__('Slide Left', 'indusri'),
                'product-hover-secimage-slideright'   => esc_html__('Slide Right', 'indusri'),
                'product-hover-secimage-hingeup'      => esc_html__('Hinge Up', 'indusri'),
                'product-hover-secimage-hingedown'    => esc_html__('Hinge Down', 'indusri'),
                'product-hover-secimage-hingeleft'    => esc_html__('Hinge Left', 'indusri'),
                'product-hover-secimage-hingeright'   => esc_html__('Hinge Right', 'indusri'),
                'product-hover-secimage-foldup'       => esc_html__('Fold Up', 'indusri'),
                'product-hover-secimage-folddown'     => esc_html__('Fold Down', 'indusri'),
                'product-hover-secimage-foldleft'     => esc_html__('Fold Left', 'indusri'),
                'product-hover-secimage-foldright'    => esc_html__('Fold Right', 'indusri'),
                'product-hover-secimage-fliphoriz'    => esc_html__('Flip Horizontal', 'indusri'),
                'product-hover-secimage-flipvert'     => esc_html__('Flip Vertical', 'indusri')
            );
            $settings['default'] =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('indusri_woo_listing_option_hover_secondary_image_effect') ) {
	function indusri_woo_listing_option_hover_secondary_image_effect() {
		return Indusri_Woo_Listing_Option_Hover_Secondary_Image_Effect::instance();
	}
}

indusri_woo_listing_option_hover_secondary_image_effect();