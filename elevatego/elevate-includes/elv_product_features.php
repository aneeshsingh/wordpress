<?php
/** This file contains all the global functions */

/**
 *
 * Add Product features and custom fields
 * Created by - Ian Skea
 * Updated by - Aneesh Singh
 * Updated on - 22nd May 2016
 *
 */

add_action( 'init', 'elv_product_features' );

function elv_product_features() {
    register_post_type( 'elv_product_features',
        array(
            'labels' => array(
                'name' => __( 'Product Features' ),
                'singular_name' => __( 'Product Feature' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-pressthis',
            'description' => 'Modular feature items',
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array( 'category', 'post_tag' )
        )
    );
}

$prefix = 'elv_product_features_';
$product_feature_box = array(
    'id' => 'product_feature-meta-box',
    'title' => 'Product feature Information',
    'page' => 'elv_product_features',
    'context' => 'normal',
    'priority' => 'high',
    'taxonomies' => array('category'),
    'rewrite' => array('slug' => 'product_features'),
    'fields' => array(

        array(
            'desc' => 'Tag line',
            'id' => $prefix . 'tagline',
            'name' => 'Tagline:',
            'std' => '1',
            'type' => 'text',
        ),
        array(
            'desc' => 'Learn More',
            'id' => $prefix . 'learn_more',
            'name' => 'Learn more:',
            'std' => '',
            'type' => 'text',
        ),
        array(
            'desc' => 'Apply Now',
            'id' => $prefix . 'apply_now',
            'name' => 'Apply Now:',
            'std' => '',
            'type' => 'text',
        ),
        array(
            'desc' => 'Rewards',
            'id' => $prefix . 'rewards',
            'name' => 'Rewards:',
            'std' => '',
            'type' => 'textHTML',
        ),
        array(
            'desc' => 'Your Savings',
            'id' => $prefix . 'your_savings',
            'name' => 'Your Savings',
            'std' => '',
            'type' => 'text',
        ),
    )
);

add_action('admin_menu', 'elv_product_features_add_box');
function elv_product_features_add_box() {
    global $product_feature_box;
    add_meta_box($product_feature_box['id'], $product_feature_box['title'], 'elv_product_feature_show_box', $product_feature_box['page'], $product_feature_box['context'], $product_feature_box['priority']);
}

// Callback function to show fields in meta box
function elv_product_feature_show_box() {
    global $product_feature_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="product_features_product_feature_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    echo '<table class="form-table">';

    foreach ($product_feature_box['fields'] as $field) {
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
                echo '<textarea name="' . esc_attr($field['id']) . '" id="' . esc_attr($field['id']) . '" cols="60" rows="4" style="width:97%">' . ($meta ? esc_attr($meta) : esc_attr($field['std'])). '</textarea>' . '<br />' . esc_attr($field['desc']); 
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


add_action('save_post', 'elv_product_features_save_data');
function elv_product_features_save_data( $i_post_id ) {
    global $product_feature_box;

    if( !empty( $product_feature_box ) ) {

        // verify nonce
        if ( isset($_POST['product_features_product_feature_box_nonce']) && !wp_verify_nonce($_POST['product_features_product_feature_box_nonce'], basename(__FILE__)) ) {
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

        foreach ( $product_feature_box['fields'] as $field ) {

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
