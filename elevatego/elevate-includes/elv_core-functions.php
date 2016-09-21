<?php
/** This file contains all the global functions */

/**
 *
 * Function Image URL
 *
 */
function elv_get_image_url($post_id) {
    $background_image_url = '';
    $background_image_url  = wp_get_attachment_url(get_post_thumbnail_id($post_id));
    if($background_image_url == ''){
        $background_image_url = get_template_directory_uri().'/img/hero_elevate-product_lg.jpg';
    }
    return $background_image_url;
}


/**
 * @param $v
 * @return string
 *
 *
 */
function elv_get_headings($v)
{
    $heading_title = '';
    if ($v->post_title) {
        $heading_title = $v->post_title;
    } elseif ($v->title) {
        $heading_title = $v->title;
    } else {
        $heading_title = 'Error';
    }
    return $heading_title;
}

/**
 *
 *
 * Function for Background Image
 *
 *
 */
function elv_find_right_background_image($background_data){
    $persona = 1;
    $persona = elv_get_persona_name(elv_get_persona_id());
    
    $a_background_data = (array) vc_param_group_parse_atts( $background_data );
    $background_images = array();
	
    foreach ($a_background_data as $background_data_s) {
		$img = '';
		if( isset($background_data_s['background_image']) ){
			$img = $background_data_s['background_image'];
		}
        $background_images[$background_data_s['persona_number']] = $img;
    }

    $main_background_image = '';


    if(isset($background_images[$persona])) {
        if (!$background_images[$persona]) {
            $main_background_image = $background_images[1];
        } else {
            $main_background_image = $background_images[$persona];
        }
    } else{
        $main_background_image = $background_images[1];
    }
    return $main_background_image;
}

/**
 * @param array $elements
 * @param int $parentId
 * @return array
 *
 *
 */
function elv_buildTree(array &$elements, $parentId = 0) {
    $branch = array();
    foreach ($elements as &$element) {
        if ($element->menu_item_parent == $parentId) {
            $children = elv_buildTree($elements, $element->ID);
            if ($children)
                $element->wpse_children = $children;

            $branch[$element->ID] = $element;
            unset($element);
        }
    }
    return $branch;
}

/**
 *
 * Removing Pages from search
 *
 *
 *
 */
function elv_SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts','elv_SearchFilter');


/**
 *
 * Update Excerpt length in general
 *
 *
 *
 */
function elv_elevate_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'elevate_excerpt_length' );




function elv_create_new_user($hash, $persona)
{
    $args = array('post_type' => 'elv_personalisations', 'posts_per_page' => 10);
    $loop = new WP_Query($args);
    $user_found = 0;

    while ($loop->have_posts()) {
        $loop->the_post();
        if (get_the_title() == $hash) {
            $user_found = 1;
            $id = get_the_ID();
        }
    }

    if ($user_found == 0) {
        $id = wp_insert_post(array('post_title' => $hash, 'post_type' => 'elv_personalisations', 'post_content' => $persona, 'post_status' => 'publish',));
        update_post_meta($id, 'elv_personalisations_ID', $id);
        update_post_meta($id, 'elv_personalisations_hash', $hash);
        update_post_meta($id, 'elv_personalisations_persona', $persona);
        update_post_meta($id, 'elv_personalisations_likes', 222);
        update_post_meta($id, 'elv_personalisations_dislikes', 221);
        update_post_meta($id, 'elv_personalisations_authors', 292);
    }
    return $id;
}


function elv_is_new_user($hash)
{
    $args = array('post_type' => 'elv_personalisations', 'posts_per_page' => -1);
    $loop = new WP_Query($args);
    $persona = '';
    $post_id = '';
    $user_found = 0;
    while ($loop->have_posts()) {
        $loop->the_post();

        if (get_the_title() == $hash) {
            $post_id = get_the_ID();
            $personas = get_post_meta($post_id, 'elv_personalisations_persona');
            $persona = $personas[0];
            $user_found = 1;

        }
    }

    if (!$user_found) {


        $persona = 12;
        $post_id = elv_create_new_user($hash, $persona);
    }

    return $persona . '|' . $post_id;
}


function elv_get_persona_id()
{


    if (elv_get_current_hash() != '') {
        $hash = elv_get_current_hash();
    }

    $args = array('post_type' => 'elv_personalisations', 'posts_per_page' => -1);
    $loop = new WP_Query($args);
    $persona = '';
    $hash_id = '';
    $user_found = 0;

    while ($loop->have_posts()) : $loop->the_post();
        if (get_the_title() == $hash) {
            $hash_id = get_the_ID();
            $personas = get_post_meta($hash_id, 'elv_personalisations_persona');
            $persona = $personas[0];
            $user_found = 1;

        }
    endwhile;

    if ( $user_found > 0) {

    } else {
        $persona = 12;
        $hash_id = elv_create_new_user($hash, $persona);
    }
    wp_reset_postdata();
    return $hash_id;

}

function elv_get_persona_name($hash)
{

    if(elv_get_current_hash() != ''){
        $hash = elv_get_current_hash();
    }
    $args = array('post_type' => 'elv_personalisations', 'posts_per_page' => -1);
    $loop = new WP_Query($args);
    $persona = '';
    $hash_id = '';
    $user_found = 0;
    while ($loop->have_posts()) : $loop->the_post();

        if (get_the_title() == $hash) {
            $hash_id = get_the_ID();
            $personas = get_post_meta($hash_id, 'elv_personalisations_persona');
            $persona = $personas[0];
            $user_found = 1;

        }
    endwhile;

    if ($user_found > 0) {

    } else {

        $persona = 12;
        $hash_id = elv_create_new_user($hash, $persona);
    }

    wp_reset_postdata();
    return $persona;

}

function elv_get_current_hash(){

    $hash = '';

    if (isset($_GET['h'])) {
        $hash = isset($_GET['h']) ? sanitize_text_field($_GET['h']) : '';
    }
    elseif (isset($_POST['h'])) {
        $hash = isset($_POST['h']) ? sanitize_text_field($_POST['h']) : '';
    }

    elseif(isset($_COOKIE['cookie_key'])){
        $hash_persona = sanitize_text_field($_COOKIE['cookie_key']);
        $hash = explode('|',$hash_persona)[0];
    }


    return $hash;

}

/*
 * Functions to emulate the JS charCodeAt function
 */
function charCodeAt($str, $num) { return utf8_ord(utf8_charAt($str, $num)); }
function utf8_ord($ch) {
    $len = strlen($ch);
    if($len <= 0) return false;
    $h = ord($ch{0});
    if ($h <= 0x7F) return $h;
    if ($h < 0xC2) return false;
    if ($h <= 0xDF && $len>1) return ($h & 0x1F) <<  6 | (ord($ch{1}) & 0x3F);
    if ($h <= 0xEF && $len>2) return ($h & 0x0F) << 12 | (ord($ch{1}) & 0x3F) << 6 | (ord($ch{2}) & 0x3F);
    if ($h <= 0xF4 && $len>3) return ($h & 0x0F) << 18 | (ord($ch{1}) & 0x3F) << 12 | (ord($ch{2}) & 0x3F) << 6 | (ord($ch{3}) & 0x3F);
    return false;
}
function utf8_charAt($str, $num) { return mb_substr($str, $num, 1, 'UTF-8'); }

function loopAndEncode( $string ){
    $s_return = '';
    $a_str = array();
    $a_return = array();
    $a_str = str_split($string);
    foreach( $a_str as $v ){
        $a_return[] = charCodeAt($v,0);
    }
    $s_return = implode('_', $a_return);
    return $s_return;
}
