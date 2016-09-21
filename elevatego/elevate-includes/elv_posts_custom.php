<?php
/** This file contains all the global functions */
/**
 *
 * Custom Fields for Posts i.e. Expertise Articles
 * Created by - Aneesh Singh
 * Updated by - Aneesh Singh
 * Updated on - 22nd May 2016
 *
 */
function elv_get_all_the_authors() {
    $author_id = array();
    $query = new WP_Query( array( 'post_type' => 'elv_authors') );
    while ( $query->have_posts() ) : $query->the_post();
        $s_name = get_the_title(get_the_ID());
        $author_id[get_the_ID()] =  $s_name;
    endwhile; wp_reset_postdata();
    return  $author_id ;
}


$prefix = 'elv_posts_';
$post_box = array(
    'id' => 'post-meta-box',
    'title' => 'Post Information',
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'taxonomies' => array('category'),
    'rewrite' => array('slug' => 'post'),
    'fields' => array(
        array(
            'desc' => 'Authors',
            'id' => $prefix . 'authors',
            'name' => 'Authors:',
            'std' => '1',
            'options' => elv_get_all_the_authors(),
            'type' => 'select',
        ),
        array(
            'desc' => 'Featured Article',
            'id' => $prefix . 'featured',
            'name' => 'Featured Article:',
            'options' => array(
                '1' => 'No',
                '2' => 'Yes',
            ),
            'std' => 'Featured Article',
            'type' => 'select'
        ),
        array(
            'desc' => 'Date yes / no',
            'id' => $prefix . 'dateyn',
            'name' => 'Date yes / no:',
            'options' => array(
                '1' => 'Yes',
                '2' => 'No',
            ),
            'std' => '1',
            'type' => 'select'
        ),
        array(
            'desc' => 'Date published',
            'id' => $prefix . 'date_published',
            'name' => 'Date published:',
            'std' => '',
            'type' => 'text',
        ),
        array(
            'desc' => 'Number of dislikes this post has',
            'id' => $prefix . 'dislikes',
            'name' => 'Number of dislikes:',
            'std' => '5',
            'type' => 'text',
        ),
        array(
            'desc' => 'Number of likes this post has',
            'id' => $prefix . 'likes',
            'name' => 'Number of Likes:',
            'std' => '20',
            'type' => 'text',
        ),
        array(
            'desc' => 'Expanded Accordion',
            'id' => $prefix . 'accordion',
            'name' => 'Expand Accordion:',
            'options' => array(
                '1' => 'No',
                '2' => 'Yes',
            ),
            'type' => 'select'
        ),
        array(
            'desc' => 'Please new heading',
            'id' => $prefix . 'disclaimer1',
            'name' => 'Disclaimer - Accordion disclaimers:',
            'std' => '',
            'type' => 'textHTML',
        ),
        array(
            'desc' => 'Expanded Accordion in Black',
            'id' => $prefix . 'accordion2',
            'name' => 'Expand Accordion in Black:',
            'options' => array(
                '1' => 'No',
                '2' => 'Yes',
            ),
            'type' => 'select'
        ),
        array(
            'desc' => 'Please new heading',
            'id' => $prefix . 'disclaimer2',
            'name' => 'Disclaimer - in Black disclaimer:',
            'std' => '',
            'type' => 'textHTML',
        ),

    )
);

add_action('admin_menu', 'elv_posts_add_box');
function elv_posts_add_box() {
    global $post_box;
    add_meta_box($post_box['id'], $post_box['title'], 'elv_post_show_box', $post_box['page'], $post_box['context'], $post_box['priority']);
}

// Callback function to show fields in meta box
function elv_post_show_box() {
    global $post_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="posts_post_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    echo '<table class="form-table">';

    foreach ($post_box['fields'] as $field) {
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


add_action('save_post', 'elv_posts_save_data');
function elv_posts_save_data( $i_post_id ) {
    global $post_box;

    if( !empty( $post_box ) ) {

        // verify nonce
        if ( isset($_POST['posts_post_box_nonce']) && !wp_verify_nonce($_POST['posts_post_box_nonce'], basename(__FILE__)))  {
            return $i_post_id;
        }

        // check autosave
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
            return $i_post_id;
        }

        // check permissions
        if ( isset($_POST['post_type']) && 'page' == sanitize_text_field($_POST['post_type']) ) {
            if (!current_user_can('edit_page', $i_post_id)) {
                return $i_post_id;
            }
        } elseif ( !current_user_can('edit_post', $i_post_id) ) {
            return $i_post_id;
        }

        foreach ( $post_box['fields'] as $field ) {

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
