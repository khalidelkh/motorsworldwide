<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Indusri_Shop_Metabox_Single_Upsell_Related' ) ) {
    class Indusri_Shop_Metabox_Single_Upsell_Related {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {

			add_filter( 'indusri_shop_product_custom_settings', array( $this, 'indusri_shop_product_custom_settings' ), 10 );

		}

        function indusri_shop_product_custom_settings( $options ) {

			$ct_dependency      = array ();
			$upsell_dependency  = array ( 'show-upsell', '==', 'true');
			$related_dependency = array ( 'show-related', '==', 'true');
			if( function_exists('indusri_shop_single_module_custom_template') ) {
				$ct_dependency['dependency'] 	= array ( 'product-template', '!=', 'custom-template');
				$upsell_dependency 				= array ( 'product-template|show-upsell', '!=|==', 'custom-template|true');
				$related_dependency 			= array ( 'product-template|show-related', '!=|==', 'custom-template|true');
			}

			$product_options = array (

				array_merge (
					array(
						'id'         => 'show-upsell',
						'type'       => 'select',
						'title'      => esc_html__('Show Upsell Products', 'indusri'),
						'class'      => 'chosen',
						'default'    => 'admin-option',
						'attributes' => array( 'data-depend-id' => 'show-upsell' ),
						'options'    => array(
							'admin-option' => esc_html__( 'Admin Option', 'indusri' ),
							'true'         => esc_html__( 'Show', 'indusri'),
							null           => esc_html__( 'Hide', 'indusri'),
						)
					),
					$ct_dependency
				),

				array(
					'id'         => 'upsell-column',
					'type'       => 'select',
					'title'      => esc_html__('Choose Upsell Column', 'indusri'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'indusri' ),
						1              => esc_html__( 'One Column', 'indusri' ),
						2              => esc_html__( 'Two Columns', 'indusri' ),
						3              => esc_html__( 'Three Columns', 'indusri' ),
						4              => esc_html__( 'Four Columns', 'indusri' ),
					),
					'dependency' => $upsell_dependency
				),

				array(
					'id'         => 'upsell-limit',
					'type'       => 'select',
					'title'      => esc_html__('Choose Upsell Limit', 'indusri'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'indusri' ),
						1              => esc_html__( 'One', 'indusri' ),
						2              => esc_html__( 'Two', 'indusri' ),
						3              => esc_html__( 'Three', 'indusri' ),
						4              => esc_html__( 'Four', 'indusri' ),
						5              => esc_html__( 'Five', 'indusri' ),
						6              => esc_html__( 'Six', 'indusri' ),
						7              => esc_html__( 'Seven', 'indusri' ),
						8              => esc_html__( 'Eight', 'indusri' ),
						9              => esc_html__( 'Nine', 'indusri' ),
						10              => esc_html__( 'Ten', 'indusri' ),
					),
					'dependency' => $upsell_dependency
				),

				array_merge (
					array(
						'id'         => 'show-related',
						'type'       => 'select',
						'title'      => esc_html__('Show Related Products', 'indusri'),
						'class'      => 'chosen',
						'default'    => 'admin-option',
						'attributes' => array( 'data-depend-id' => 'show-related' ),
						'options'    => array(
							'admin-option' => esc_html__( 'Admin Option', 'indusri' ),
							'true'         => esc_html__( 'Show', 'indusri'),
							null           => esc_html__( 'Hide', 'indusri'),
						)
					),
					$ct_dependency
				),

				array(
					'id'         => 'related-column',
					'type'       => 'select',
					'title'      => esc_html__('Choose Related Column', 'indusri'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'indusri' ),
						2              => esc_html__( 'Two Columns', 'indusri' ),
						3              => esc_html__( 'Three Columns', 'indusri' ),
						4              => esc_html__( 'Four Columns', 'indusri' ),
					),
					'dependency' => $related_dependency
				),

				array(
					'id'         => 'related-limit',
					'type'       => 'select',
					'title'      => esc_html__('Choose Related Limit', 'indusri'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'indusri' ),
						1              => esc_html__( 'One', 'indusri' ),
						2              => esc_html__( 'Two', 'indusri' ),
						3              => esc_html__( 'Three', 'indusri' ),
						4              => esc_html__( 'Four', 'indusri' ),
						5              => esc_html__( 'Five', 'indusri' ),
						6              => esc_html__( 'Six', 'indusri' ),
						7              => esc_html__( 'Seven', 'indusri' ),
						8              => esc_html__( 'Eight', 'indusri' ),
						9              => esc_html__( 'Nine', 'indusri' ),
						10              => esc_html__( 'Ten', 'indusri' ),
					),
					'dependency' => $related_dependency
				)

			);

			$options = array_merge( $options, $product_options );

			return $options;

		}

    }
}

Indusri_Shop_Metabox_Single_Upsell_Related::instance();