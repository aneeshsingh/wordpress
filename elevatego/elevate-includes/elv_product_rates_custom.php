<?php
add_action( 'init', 'elv_product_rates_post_type' );
function elv_product_rates_post_type() {
	register_post_type( 'elv_product_rates',
		array(
			'labels' => array(
				'name' => __( 'Product Rates' ),
				'singular_name' => __( 'Product Rate' )
			),
			'public' => true,
			'has_archive' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-screenoptions',
			'description' => 'Modular callout rates',
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies' => array( 'category', 'post_tag' ),
			'exclude_from_search' => true,
			'publicly_queryable' => true,
		)
	);
	//register_taxonomy_for_object_type( 'category', 'tags' );
}


//Create rates custom fields
$prefix = 'elv_rates_';
$rate_box = array(
	'id' => 'rate-meta-box',
	'title' => 'Bundle Information',
	'page' => 'elv_product_rates',
	'context' => 'normal',
	'priority' => 'high',
	'taxonomies' => array('category'),
	'rewrite' => array('slug' => 'rates'),
	'fields' => array(

		array(
			'desc' => 'Display Name',
			'id' => $prefix . 'elv_rates_display_name',
			'name' => 'First Product URL:',
			'std' => '',
			'type' => 'text',
		),
	)
);


add_action('admin_menu', 'elv_rates_add_box');
function elv_rates_add_box() {
	global $rate_box;
	add_meta_box($rate_box['id'], $rate_box['title'], 'elv_rate_show_box', $rate_box['page'], $rate_box['context'], $rate_box['priority']);
}

// Callback function to show fields in meta box
function elv_rate_show_box() {
	global $rate_box, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="rates_rate_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

	echo '<table class="form-table">';

	foreach ($rate_box['fields'] as $field) {
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


add_action('save_post', 'elv_rates_save_data');
function elv_rates_save_data( $i_post_id ) {
	global $rate_box;

	if( !empty( $rate_box ) ) {

		// verify nonce
		if ( isset($_POST['rates_rate_box_nonce']) && !wp_verify_nonce($_POST['rates_rate_box_nonce'], basename(__FILE__)) ) {
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

		foreach ( $rate_box['fields'] as $field ) {

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