<?php
/**
 * Utility functions for Aspegic theme
 *
 * @author Ashiqur Rahman
 * @url http://choobs.com
 **/

/**
 * Returns the list of available language lists.
 *
 * @param bool|true $print
 * @param string $display
 *
 * @return bool|string
 */
function aspegic_languages_list($print = true, $display = 'language_code'){
    if(!function_exists('icl_get_languages')) {
        return false;
    }

    $languages = wpml_get_active_languages_filter('skip_missing=0&orderby=name');
    $html = '';

    if(!empty($languages)){
        $html .= '<div class="choobs_language_list"><ul>';
        foreach($languages as $l){
            $html .= '<li '.(($l['active']) ? ' class="active" ' : '').'>';
            if(!$l['active']) {
                $html .= '<a href="'.$l['url'].'">';
            }
            if($display == 'language_code') {
                $html .= $l['language_code'];
            } else {
                $html .= wpml_display_language_names($l['native_name'], $l['translated_name']);
            }
            if(!$l['active']) {
                $html .= '</a>';
            }
            $html .= '</li>';
        }
        $html .= '</ul></div>';
    }
    if(!$print) {
        return $html;
    }
    print $html;
}

/**
 * Generate excuses randomly
 */
function generate_excuse_callback() {
    $current_post_id = intval( $_POST[ 'current_post_id' ] );

    //Get one random post
    $args = array(
        'post_type'         => 'excuse',
        'orderby'           => 'rand',
        'posts_per_page'    => '1',
        'post__not_in'      => array( $current_post_id ),
        'suppress_filters'  => 0
    );
    $query = new WP_Query( $args );

    $return_post = array();

    if( $query->have_posts() ) {
        while( $query->have_posts() ) {
            $query->the_post();
            $return_post[ 'id' ]            = get_the_ID();
            $return_post[ 'title' ]         = get_the_title();
            $return_post[ 'body' ]          = get_the_content();
            $return_post[ 'email_subject' ] = rawurlencode( __( 'Info', 'wpml-string-translation' ) );
            $return_post[ 'email_body' ]    = rawurlencode( strip_tags( get_the_content() ) );
            $return_post[ 'thumb' ]         = get_the_post_thumbnail_url();
            break;
        }
        wp_reset_postdata();
    }

    echo json_encode( $return_post );
    wp_die();
}

add_action( 'wp_ajax_generate_excuse', 'generate_excuse_callback' );
add_action( 'wp_ajax_nopriv_generate_excuse', 'generate_excuse_callback' );

/**
 * Get all the 'pain' posts
 * @return array
 */
function get_pains() {
    //Get list of pains
    $args = array(
        'post_type'     => 'pain',
        'order'         => 'ASC',
        'orderby'       => 'menu_order',
        'posts_per_page'=> -1
    );

    $query = new WP_Query( $args );

    $return_post = array();

    if( $query->have_posts() ) {
        while( $query->have_posts() ) {
            $query->the_post();
            $return_post[] = array(
                'id'            => get_the_ID(),
                'title'         => get_the_title(),
                'body'          => get_the_content(),
                'default_icon'  => get_post_meta( get_the_ID(), 'default_icon', true ),
                'active_icon'   => get_post_meta( get_the_ID(), 'active_icon', true )
            );
        }
        wp_reset_postdata();
    }

    return $return_post;
}

/**
 * Get the last update date
 * @return bool|string
 */
function get_last_update() {
    $query = new WP_Query( array( 'post_type' => 'any', 'posts_per_page' => 1 ) );

    if( $query ) {
        return date( 'd.m.Y', strtotime( $query->posts[0]->post_modified ) );
    }
    return date( 'd.m.Y' );
}