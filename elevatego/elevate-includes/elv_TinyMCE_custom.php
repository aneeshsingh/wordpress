<?php

/** This file contains all the global functions */



/**
 *
 *
 *
 * Updated TinyMCE functionality
 *
 *
 */

// Callback function to insert 'styleselect' into the $buttons array
function elv_my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'elv_my_mce_buttons_2' );


// Callback function to filter the MCE settings
function elv_my_mce_before_init_insert_formats( $init_array ) {
    // Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => '.translation',
            'block' => 'blockquote',
            'classes' => 'translation',
            'wrapper' => true,

        ),
        array(
            'title' => '⇠.rtl',
            'block' => 'blockquote',
            'classes' => 'rtl',
            'wrapper' => true,
        ),
        array(
            'title' => '.ltr⇢',
            'block' => 'blockquote',
            'classes' => 'ltr',
            'wrapper' => true,
        ),
        array(
            'title' => 'Content Block',
            'block' => 'span',
            'classes' => 'content-block',
            'wrapper' => true,

        ),
        array(
            'title' => 'Para with Lead',
            'block' => 'span',
            'classes' => 'lead',
            'wrapper' => true,

        ),
        array(
            'title' => 'Blue Button',
            'block' => 'span',
            'classes' => 'blue-button',
            'wrapper' => true,
        ),
        array(
            'title' => 'Red Button',
            'block' => 'span',
            'classes' => 'red-button',
            'wrapper' => true,
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );
    $init_array['entities'] = '160,nbsp,38,amp,60,lt,62,gt,8224,dagger,8225,Dagger';

    return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'elv_my_mce_before_init_insert_formats' );


function elv_enable_more_buttons($buttons) {

    $buttons[] = 'backcolor';
    $buttons[] = 'newdocument';
    $buttons[] = 'cut';
    $buttons[] = 'copy';
    $buttons[] = 'hr';

    return $buttons;
}
add_filter("mce_buttons_3", "elv_enable_more_buttons");

/**
 *
 *
 * Adding button functionality to WordPress Editor
 *
 *
 */

add_action( 'init', 'elv_wptuts_buttons' );
function elv_wptuts_buttons() {
    add_filter( "mce_external_plugins", "elv_wptuts_add_buttons" );
    add_filter( 'mce_buttons', 'elv_wptuts_register_buttons' );
}
function elv_wptuts_add_buttons( $plugin_array ) {
    $plugin_array['wptuts'] = get_template_directory_uri() . '/js/wp-editor.js';
    return $plugin_array;
}
function elv_wptuts_register_buttons( $buttons ) {
    array_push( $buttons, 'dropcap', 'showrecent' , 'anchortag','Trophy_Multiplier_one','Trophy_Multiplier_two', 'additional_gift', 'Rewards_with_image' , 'Big_green_Zero','bigzero','promotile' ); // dropcap', 'recentposts, , 'anchortag
    return $buttons;
}

