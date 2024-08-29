<?php
add_action( 'indusri_after_main_css', 'header_style' );
function header_style() {
    wp_enqueue_style( 'indusri-header', get_theme_file_uri('/modules/header/assets/css/header.css'), false, INDUSRI_THEME_VERSION, 'all');
}

if( ! function_exists( 'indusri_get_header_wrapper_classes' )  ) {
	function indusri_get_header_wrapper_classes() {
        return implode(' ', apply_filters( 'indusri_header_wrapper_classes', array ( 'header-top-absolute' ) ));
	}
}

if( ! function_exists( 'indusri_header_template' )  ) {
	function indusri_header_template() {
		indusri_template_part( 'header', 'templates/header' );
	}

	add_action( 'indusri_header', 'indusri_header_template' );
}

if( ! function_exists('indusri_get_header_logo') ) {
	function indusri_get_header_logo() {
		$logo = '<img class="normal_logo" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" src="'.esc_url(INDUSRI_ROOT_URI.'/assets/images/logo.svg').'"/>';

		$customizer_logo = get_custom_logo();
		if ( ! empty( $customizer_logo ) ) {
			$customizer_logo_id = get_theme_mod( 'custom_logo' );

			if ( $customizer_logo_id ) {
				$alt = get_post_meta( $customizer_logo_id, '_wp_attachment_image_alt', true );
				$logo_attr = array(
					'class' => 'normal_logo'
				);

				if ( empty( $image_alt ) ) {
					$logo_attr['alt'] = get_bloginfo( 'name', 'display' );
				}

				$logo = wp_get_attachment_image( $customizer_logo_id, 'full', false, $logo_attr );

			}
		}

		return $logo;
	}
}

if( !class_exists( 'Indusri_Default_Header_Walker_Nav_Menu' ) ) {

	class Indusri_Default_Header_Walker_Nav_Menu extends Walker_Nav_Menu {

		public function start_lvl( &$output, $depth = 0, $args = null ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = str_repeat( $t, $depth );

			$classes = array( 'sub-menu', 'is-hidden' );
			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$output .= "{$n}{$indent}<ul$class_names>{$n}";
			$output .= '<li class="close-nav"><a href="javascript:void(0);"></a></li>';
			$output .= '<li class="go-back"><a href="javascript:void(0);"></a></li>';
			$output .= '<li class="see-all"></li>';
		}
	}
}

if( !function_exists('indusri_nav_menu_class') ) {
	function indusri_nav_menu_class( $classes, $item, $args, $depth ) {

		$classes[] = 'menu-item-depth-' . $depth;
		return $classes;
	}

	add_filter( 'nav_menu_css_class', 'indusri_nav_menu_class', 10, 4 );
}