<?php

/** This file contains all the global functions */


/**
 *Setup of the FEATURES custom post type
 *
 * @since 1.0.0
 * @author Ian Skea
 * Updated by - Aneesh Singh
 *
 *
 */

add_action( 'init', 'elv_feature_post_type' );
function elv_feature_post_type() {
    register_post_type( 'elv_feature',
        array(
            'labels' => array(
                'name' => __( 'Menu Features' ),
                'singular_name' => __( 'Menu Feature' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-feedback',
            'description' => 'Modular callout features',
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array( 'category', 'post_tag' ),
            'exclude_from_search' => true,
            'publicly_queryable' => false,
        )
    );
    //register_taxonomy_for_object_type( 'category', 'tags' );
}


$prefix = 'elv_feature_';
$feature_box = array(
    'id' => 'feature-meta-box',
    'title' => 'Feature Information',
    'page' => 'elv_feature',
    'context' => 'normal',
    'priority' => 'high',
    'taxonomies' => array('category'),
    'rewrite' => array('slug' => 'feature'),
    'fields' => array(

        array(
            'desc' => 'Please select the Menu Name',
            'id' => $prefix . 'tag',
            'name' => 'Menu Name:',
            'options' => array(
                '1' => 'Column One',
                '2' => 'Column Two',
                '3' => 'Column Three',
                '4' => 'Column Four',
            ),
            'std' => 'Menu Name',
            'type' => 'select'
        ),
        array(
            'desc' => 'Please enter the link for this Menu Feature',
            'id' => $prefix . 'link',
            'name' => 'Tile Link:',
            'std' => '/this-is-the-link/',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please add the CTA for the button',
            'id' => $prefix . 'cta',
            'name' => 'Call to Action:',
            'std' => 'Get Started',
            'type' => 'text',
        ),
    )
);


add_action('admin_menu', 'elv_feature_add_box');
function elv_feature_add_box() {
    global $feature_box;
    add_meta_box($feature_box['id'], $feature_box['title'], 'elv_feature_show_box', $feature_box['page'], $feature_box['context'], $feature_box['priority']);
}

// Callback function to show fields in meta box
function elv_feature_show_box() {
    global $feature_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="feature_feature_box_nonce" value="'. wp_create_nonce(basename(__FILE__)) .'" />';

    echo '<table class="form-table">';

    foreach ($feature_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
            '<th style="width:15%"><label for="' .  esc_attr($field['id']) . '">' . esc_attr($field['name']) . '</label></th>',
        '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="' . esc_attr($field['id']) . '" id="' . esc_attr($field['id']) . '" value="' . ($meta ? esc_attr($meta) : esc_attr($field['std'])) . '" size="30" style="width:97%" />' . '<br />' . esc_attr($field['desc']);
                break;
            case 'textarea':
            	echo '<textarea name="' . esc_attr($field['id']) . '" id="' . esc_attr($field['id']) . '" cols="60" rows="4" style="width:97%">' . ($meta ? esc_textarea($meta) : esc_textarea($field['std'])). '</textarea>' . '<br />' . esc_attr($field['desc']);
                break;
            case 'select':
                echo '<select name="' . esc_attr($field['id']) . '" id="' . esc_attr($field['id']) . '">' . PHP_EOL;
                foreach ($field['options'] as $k => $v) {
                    echo '<option value="'. esc_attr($k) .'" '. selected( esc_attr($meta), esc_attr($k), false ) . '>'. esc_attr($v) .'</option>' . PHP_EOL;
                }
                echo '</select>';
                break;
            case 'textHTML':
                wp_editor(  ($meta ? $meta : $field['std']), $field['id'] );
                break;
        }
        echo     '</td><td>' . PHP_EOL .
            '</td></tr>';
    }
    echo '</table>';
}


add_action('save_post', 'elv_feature_save_data');
function elv_feature_save_data( $i_post_id ) {
    global $feature_box;

    if( !empty( $feature_box ) ) {

        // verify nonce
        if ( isset($_POST['feature_feature_box_nonce']) && !wp_verify_nonce($_POST['feature_feature_box_nonce'], basename(__FILE__)) ) {
            return $i_post_id;
        }

        // check autosave
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
            return $i_post_id;
        }

        // check permissions
        if ( isset($_POST['post_type']) && 'page' == $_POST['post_type'] ) {
            if (!current_user_can('edit_page', $i_post_id)) {
                return $i_post_id;
            }
        } elseif ( !current_user_can('edit_post', $i_post_id) ) {
            return $i_post_id;
        }

        foreach ( $feature_box['fields'] as $field ) {

            $s_old = '';
            $s_old = get_post_meta($i_post_id, $field['id'], true);

            $s_new = '';
            if( isset($_POST[$field['id']]) ) {
                $s_new = $_POST[$field['id']];
            }

            if ( $s_new != $s_old ) {
                update_post_meta( $i_post_id, $field['id'], $s_new );
            } elseif ( '' == $s_new && $s_old ) {
                delete_post_meta( $i_post_id, $field['id'], $s_old );
            }
        }
    }
}
