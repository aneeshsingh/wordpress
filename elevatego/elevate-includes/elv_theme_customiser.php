<?php

/** This file contains all the global functions */

/**
 *
 *
 * Adding theme customizing options
 *
 *
 */

function elv_prefix_customizer_register($wp_customize)
{

	$wp_customize->add_panel('panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Client Details', 'textdomain'),
		'description' => __('Description of what this panel does.', 'textdomain'),
	));

	$wp_customize->add_section('section_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Contact Details', 'textdomain'),
		'description' => '',
		'panel' => 'panel_id',
	));
	$wp_customize->add_setting('email_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_email',
	));

	$wp_customize->add_control('email_field_id', array(
		'type' => 'email',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __('Contact Email Field', 'textdomain'),
		'description' => '',
	));
	$wp_customize->add_setting('password_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_password',
	));

	$wp_customize->add_control('password_field_id', array(
		'type' => 'password',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __('Global Password Field', 'textdomain'),
		'description' => '',
	));

	$wp_customize->add_setting('phone_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_textarea',
	));

	$wp_customize->add_control('phone_field_id', array(
		'type' => 'textarea',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __('Phone Number', 'textdomain'),
		'description' => '',
	));

	$wp_customize->add_setting('rate_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_textarea',
	));

	$wp_customize->add_control('rate_field_id', array(
		'type' => 'textarea',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __('Rate Structure', 'textdomain'),
		'description' => '',
	));

	$wp_customize->add_setting('utm_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_textarea',
	));

	$wp_customize->add_control('utm_field_id', array(
		'type' => 'textarea',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __('UTM codes', 'textdomain'),
		'description' => '',
	));

	$wp_customize->add_setting('salesforce_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_textarea',
	));

	$wp_customize->add_control('salesforce_field_id', array(
		'type' => 'textarea',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __('Salesforce hidden form data (Request a call)', 'textdomain'),
		'description' => '',
	));

	$wp_customize->add_setting('live_chat_salesforce_id_1', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_textarea',
	));

	$wp_customize->add_control('live_chat_salesforce_id_1', array(
		'type' => 'textarea',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __('Live chat salesforce id 1', 'textdomain'),
		'description' => '',
	));

	$wp_customize->add_setting('live_chat_salesforce_id_2', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_textarea',
	));

	$wp_customize->add_control('live_chat_salesforce_id_2', array(
		'type' => 'textarea',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __('Live chat salesforce id 2', 'textdomain'),
		'description' => '',
	));

	$wp_customize->add_setting('live_chat_image', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'live_chat_image', array(
		'section'  => 'section_id',
		'label'    => __('Upload Live Chat Image', 'textdomain'),
		'settings' => 'live_chat_image',
	)));
}

add_action('customize_register', 'elv_prefix_customizer_register');

