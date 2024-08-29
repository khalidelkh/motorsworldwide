<?php

if( ! function_exists('indusri_event_breadcrumb_title') ) {
    function indusri_event_breadcrumb_title($title) {
        if( get_post_type() == 'tribe_events' && is_single()) {
            $etitle = esc_html__( 'Event Detail', 'indusri' );
            return '<h1>'.$etitle.'</h1>';
        } else {
            return $title;
        }
    }

    add_filter( 'indusri_breadcrumb_title', 'indusri_event_breadcrumb_title', 20, 1 );
}

?>