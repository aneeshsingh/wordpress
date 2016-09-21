<?php
/** This file contains all the global functions */
/**
 *
 * Tiles post type
 * This post type is used to configure modal windows
 * Created by - Aneesh Singh
 * Updated by - Aneesh Singh
 * Updated on - 22nd May 2016
 *
 *
 */

add_action( 'init', 'elv_tiles_post_type' );
function elv_tiles_post_type() {
    register_post_type( 'elv_tiles',
        array(
            'labels' => array(
                'name' => __( 'Tiles' ),
                'singular_name' => __( 'Tile' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-layout',
            'description' => 'Modular callout tiles',
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array( 'category', 'post_tag' ),
            'exclude_from_search' => true,
        )
    );
}

$prefix = 'elv_tiles_';
$tile_box = array(
    'id' => 'tile-meta-box',
    'title' => 'Tile Information',
    'page' => 'elv_tiles',
    'context' => 'normal',
    'priority' => 'high',
    'taxonomies' => array('category'),
    'rewrite' => array('slug' => 'tiles'),
    'fields' => array(
        array(
            'desc' => 'Please select the class',
            'id' => $prefix . 'class',
            'name' => 'Background Colour:',
            'options' => array(
                'bg-blue' => 'Blue',
                'bg-grey' => 'Grey',
                'bg-grey-dark' => 'Dark Grey'
            ),
            'std' => '',
            'type' => 'select'
        ),
        array(
            'desc' => 'Please select tile size',
            'id' => $prefix . 'tile_size',
            'name' => 'Tile Size:',
            'options' => array(
                'col-md-4 tile-one-one' => '1 x 1',
                'col-md-4 tile-one-one-bg' => '1 x 1 - BG',
                'col-md-8 tile-one-two' => '1 x 2',
                'col-md-8 tile-one-two-bg' => '1 x 2 - BG',
                'col-md-4 tile-two-one' => '2 x 1',
                'col-md-4 tile-two-one-bg' => '2 x 1 - BG',
                'col-md-8 tile-two-two' => '2 x 2',
                'col-md-8 tile-two-two-bg' => '2 x 2 - BG',
            ),
            'std' => '',
            'type' => 'select'
        ),
        array(
            'desc' => 'Please enter the link for this tile',
            'id' => $prefix . 'link',
            'name' => 'Tile Link:',
            'std' => '/this-is-the-link/',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter the Sort Order',
            'id' => $prefix . 'sort',
            'name' => 'Sort Order:',
            'std' => '0',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please select pop-up type',
            'id' => $prefix . 'ptype',
            'name' => 'Pop-up Type:',
            'options' => array(
                'book' => 'Booking',
                'alert' => 'Alert',
                'subscribe' => 'Subscribe',
                'tipsandtools' => 'Tips and Tools',
            ),
            'std' => 'Menu Name',
            'type' => 'select'
        ),
        array(
            'desc' => 'Please heading',
            'id' => $prefix . 'pSubscribeHeading',
            'name' => '1. Subscribe Heading:',
            'std' => 'Subscribe to get expert advice and exclusive deals direct to your inbox',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter Booking Popup Heading',
            'id' => $prefix . 'pBookingHeading',
            'name' => '2. Booking Popup Heading:',
            'std' => 'Mark Bouris',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter Booking Sub Heading',
            'id' => $prefix . 'pSubBookingHeading',
            'name' => '2. Booking Sub Heading:',
            'std' => 'Ways to pay off your mortgage sooner',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter Booking Time | Locations  ',

            'id' => $prefix . 'pBookingTimeLocations',
            'name' => '2. Booking Time | Locations:',
            'std' => '12.30pm | Conference Room, 1 Shelley Street, Sydney NSW 2000',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter Booking Date  ',

            'id' => $prefix . 'pBookingDate',
            'name' => '2. Booking Date:',
            'std' => '21 May 2015',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please Booking Background Image',

            'id' => $prefix . 'pBooking',
            'name' => '2. Booking Background Image:',
            'std' => 'http://www.macquarie.com/dafiles/Internet/mgl/au/personal/media/homepage/images/home-offer-1.jpg',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter URL for Alert Image',

            'id' => $prefix . 'alertImage',
            'name' => '3. Alert Image:',
            'std' => '',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter Alert Heading',
            'id' => $prefix . 'alertHeading',
            'name' => '3. Alert Heading:',
            'std' => 'unchanged at 2.0%',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter Alert Button 1 Link',
            'id' => $prefix . 'alertButton1',
            'name' => '3. Alert Button 1 Link:',
            'std' => 'www.macquarie.com/fullstatement',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter Alert Button 1 Text',
            'id' => $prefix . 'alertButton1text',
            'name' => '3. Alert Button 1 Text:',
            'name' => '3. Alert Button 1 Text:',
            'std' => 'Read Full Statement',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter Alert Button 2 Link',
            'id' => $prefix . 'alertButton2',
            'name' => '3. Alert Button 2 Link:',
            'std' => 'www.macquarie.com/home-loans',
            'type' => 'text',
        ),
        array(
            'desc' => 'Please enter Alert Button 2 Text',
            'id' => $prefix . 'alertButton2text',
            'name' => '3. Alert Button 2 Text:',
            'std' => 'View our home loans',
            'type' => 'text',
        ),
    )
);

add_action('admin_menu', 'elv_tiles_add_box');
function elv_tiles_add_box() {
    global $tile_box;
    add_meta_box($tile_box['id'], $tile_box['title'], 'elv_tile_show_box', $tile_box['page'], $tile_box['context'], $tile_box['priority']);
}

// Callback function to show fields in meta box
function elv_tile_show_box() {
    global $tile_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="tiles_tile_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($tile_box['fields'] as $field) {
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


add_action('save_post', 'elv_tiles_save_data');
function elv_tiles_save_data( $i_post_id ) {
    global $tile_box;

    if( !empty( $tile_box ) ) {

        // verify nonce
        if ( isset($_POST['tiles_tile_box_nonce']) && !wp_verify_nonce($_POST['tiles_tile_box_nonce'], basename(__FILE__)) ) {
            return $i_post_id;
        }

        // check autosave
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
            return $i_post_id;
        }

        // check permissions
        if ( isset($_POST['post_type']) && 'page' == sanitize_text_field($_POST['post_type'] )) {
            if (!current_user_can('edit_page', $i_post_id)) {
                return $i_post_id;
            }
        } elseif ( !current_user_can('edit_post', $i_post_id) ) {
            return $i_post_id;
        }

        foreach ( $tile_box['fields'] as $field ) {

            $s_old = '';
            $s_old = get_post_meta($i_post_id, $field['id'], true);

            $s_new = '';
            if( isset($_POST[$field['id']]) ) {
                $s_new = sanitize_text_field($_POST[$field['id']]);
            }

            if ( $s_new != $s_old ) {
                update_post_meta( $i_post_id, $field['id'], $s_new );
            } elseif ( '' == $s_new && $s_old ) {
                delete_post_meta( $i_post_id, $field['id'], $s_old );
            }
        }
    }
}

