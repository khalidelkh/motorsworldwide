<?php
add_action( 'indusri_after_main_css', 'footer_style' );
function footer_style() {
    wp_enqueue_style( 'indusri-footer', get_theme_file_uri('/modules/footer/assets/css/footer.css'), false, INDUSRI_THEME_VERSION, 'all');
}

add_action( 'indusri_footer', 'footer_content' );
function footer_content() {
    indusri_template_part( 'content', 'content', 'footer' );
}