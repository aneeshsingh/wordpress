<?php

$vc_is_wp_version_3_6_more = version_compare( preg_replace( '/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo( 'version' ) ), '3.6' ) >= 0;

add_filter( 'vc_iconpicker-type-icomoon', 'elv_icon');

$colors_arr = array (
	__( 'Blue', 'js_composer' ) => 'blue',
	__( 'Turquoise', 'js_composer' ) => 'turquoise',
	__( 'Pink', 'js_composer' ) => 'pink',
	__( 'Violet', 'js_composer' ) => 'violet',
	__( 'Peacoc', 'js_composer' ) => 'peacoc',
	__( 'Chino', 'js_composer' ) => 'chino',
	__( 'Mulled Wine', 'js_composer' ) => 'mulled_wine',
	__( 'Vista Blue', 'js_composer' ) => 'vista_blue',
	__( 'Black', 'js_composer' ) => 'black',
	__( 'Orange', 'js_composer' ) => 'orange',
	__( 'Sky', 'js_composer' ) => 'sky',
	__( 'Green', 'js_composer' ) => 'green',
	__( 'Juicy pink', 'js_composer' ) => 'juicy_pink',
	__( 'Sandy brown', 'js_composer' ) => 'sandy_brown',
	__( 'Purple', 'js_composer' ) => 'purple',
	__( 'White', 'js_composer' ) => 'white',
);

$size_arr = array (
	__( 'Mini', 'js_composer' ) => 'xs',
	__( 'Small', 'js_composer' ) => 'sm',
	__( 'Normal', 'js_composer' ) => 'md',
	__( 'Large', 'js_composer' ) => 'lg'
);

function elv_icon($icons) {
	$icomoon = array(
		array('icon-internt_web_technology-08' => ''),
		array('icon-icon_mail_alt' => ''),
		array('icon-phone-outline' => ''),
		array('icon-icon_camera_alt' => ''),
		array('icon-icon_lifesaver' => ''),
		array('icon-puzzle16' => ''),
		array('icon-icon_lifesaver' => ''),
		array('icon-icon_mug' => ''),
		array('icon-icon_desktop' => ''),
		array('icon-icon_lock-open_alt' => ''),
		array('icon-icon_lightbulb_alt' => ''),
		array('icon-icon_mic_alt' => ''),
		array('icon-icon_lifesaver' => ''),
	);
	return array_merge($icons, $icomoon);
}

function elv_icons() {
	$icons = array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon library', 'js_composer' ),
			'value' => array(
				__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
				__( 'Open Iconic', 'js_composer' ) => 'openiconic',
				__( 'Typicons', 'js_composer' ) => 'typicons',
				__( 'Entypo', 'js_composer' ) => 'entypo',
				__( 'Linecons', 'js_composer' ) => 'linecons',
				__( 'Tesla Icons', 'js_composer' ) => 'icomoon'
			),
			'admin_label' => false,
			'param_name' => 'type',
			'description' => __( 'Select icon library.', 'js_composer' ),
		),

		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon library', 'js_composer' ),
			'value' => array(
				__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
				__( 'Open Iconic', 'js_composer' ) => 'openiconic',
				__( 'Typicons', 'js_composer' ) => 'typicons',
				__( 'Entypo', 'js_composer' ) => 'entypo',
				__( 'Linecons', 'js_composer' ) => 'linecons',
				__( 'Tesla Icons', 'js_composer' ) => 'icomoon'
			),
			'admin_label' => false,
			'param_name' => 'type',
			'description' => __( 'Select icon library.', 'js_composer' ),
			'dependency' => array(
				'element' => 'add_icon',
				'value' => 'true',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'fontawesome',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_openiconic',
			'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'openiconic',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_typicons',
			'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_entypo',
			'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_linecons',
			'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'linecons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_icomoon',
			'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'icomoon',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'icomoon',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		));
	return $icons;
}
$elv_icons = elv_icons();

global $vc_add_css_animation;

$vc_add_css_animation = array(
	'type' => 'dropdown',
	'heading' => __( 'CSS Animation', 'js_composer' ),
	'param_name' => 'css_animation',
	'admin_label' => true,
	'value' => array(
		__( 'No', 'js_composer' ) => '',
		__( 'Top to bottom', 'js_composer' ) => 'top-to-bottom',
		__( 'Bottom to top', 'js_composer' ) => 'bottom-to-top',
		__( 'Left to right', 'js_composer' ) => 'left-to-right',
		__( 'Right to left', 'js_composer' ) => 'right-to-left',
		__( 'Appear from center', 'js_composer' ) => 'appear'
	),
	'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'js_composer' )
);

global $vc_column_width_list;
$vc_column_width_list = array(
	__('1 column - 1/12', 'js_composer') => '1/12',
	__('2 columns - 1/6', 'js_composer') => '1/6',
	__('3 columns - 1/4', 'js_composer') => '1/4',
	__('4 columns - 1/3', 'js_composer') => '1/3',
	__('5 columns - 5/12', 'js_composer') => '5/12',
	__('6 columns - 1/2', 'js_composer') => '1/2',
	__('7 columns - 7/12', 'js_composer') => '7/12',
	__('8 columns - 2/3', 'js_composer') => '2/3',
	__('9 columns - 3/4', 'js_composer') => '3/4',
	__('10 columns - 5/6', 'js_composer') => '5/6',
	__('11 columns - 11/12', 'js_composer') => '11/12',
	__('12 columns - 1/1', 'js_composer') => '1/1'
);

vc_add_params('vc_row', array(
	array(
		'type' => 'textfield',
		'heading' => __( 'Anchor ID', 'js_composer' ),
		'param_name' => 'anchor_id',
		'description' => __( 'Enter anchor ID, if you use page with slides', 'js_composer' ),
	)
));

/* Custom Heading element
----------------------------------------------------------- */
vc_map( array(
	'name' => __( 'Custom Heading', 'js_composer' ),
	'base' => 'vc_custom_heading',
	'icon' => 'icon-wpb-ui-custom_heading',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Text with Google fonts', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Text source', 'js_composer' ),
			'param_name' => 'source',
			'value' => array(
				__( 'Custom text', 'js_composer' ) => '',
				__( 'Post or Page Title', 'js_composer' ) => 'post_title'
			),
			'std' => '',
			'description' => __( 'Select text source.', 'js_composer' )
		),
		array(
			'type' => 'textarea',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'text',
			'admin_label' => true,
			'value' => __( 'This is custom heading element', 'js_composer' ),
			'description' => __( 'If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'js_composer' ),					'description' => __( 'Note: If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'js_composer' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Make uppercase', 'js_composer' ),
			'param_name' => 'make_uppercase',
			'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
			'description' => __( 'Transform text to uppercase', 'js_composer' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'No margin top', 'js_composer' ),
			'param_name' => 'no_top',
			'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
			'description' => __( 'Best for section titles, remove top space.', 'js_composer' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'URL (Link)', 'js_composer' ),
			'param_name' => 'link',
			'description' => __( 'Add link to custom heading.', 'js_composer' ),
			// compatible with btn2 and converted from href{btn1}
		),
		array(
			'type' => 'font_container',
			'param_name' => 'font_container',
			'value' => '',
			'settings' => array(
				'fields' => array(
					'tag' => 'h2', // default value h2
					'text_align',
					'font_size',
					'line_height',
					'color',
					//'font_style_italic'
					//'font_style_bold'
					//'font_family'

					'tag_description' => __( 'Select element tag.', 'js_composer' ),
					'text_align_description' => __( 'Select text alignment.', 'js_composer' ),
					'font_size_description' => __( 'Enter font size.', 'js_composer' ),
					'line_height_description' => __( 'Enter line height.', 'js_composer' ),
					'color_description' => __( 'Select color for your element.', 'js_composer' ),
					//'font_style_description' => __('Put your description here','js_composer'),
					//'font_family_description' => __('Put your description here','js_composer'),
				),
			),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Use theme default font family?', 'js_composer' ),
			'param_name' => 'use_theme_fonts',
			'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
			'description' => __( 'Use font family from the theme.', 'js_composer' ),
		),

		array(
			'type' => 'dropdown',
			'heading' => __( 'Select font weight', 'js_composer' ),
			'param_name' => 'fnt_weight',
			'value' => array(
				'300',
				'400',
				'500',
				'700'
			),
			'std' => '300',
			'dependency' => array(
				'element' => 'use_theme_fonts',
				'value' => 'yes',
			),
		),


		array(
			'type' => 'google_fonts',
			'param_name' => 'google_fonts',
			'value' => 'font_family:Montserrat|font_style:400%20regular%3A400%3Anormal', // default
			//'font_family:'.rawurlencode('Abril Fatface:400').'|font_style:'.rawurlencode('400 regular:400:normal')
			// this will override 'settings'. 'font_family:'.rawurlencode('Exo:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic').'|font_style:'.rawurlencode('900 bold italic:900:italic'),
			'settings' => array(
				//'no_font_style' // Method 1: To disable font style
				//'no_font_style'=>true, // Method 2: To disable font style
				'fields' => array(
					//'font_family' => 'Abril Fatface:regular',
					//'Exo:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',// Default font family and all available styles to fetch
					//'font_style' => '400 regular:400:normal',
					// Default font style. Name:weight:style, example: "800 bold regular:800:normal"
					'font_family_description' => __( 'Select font family.', 'js_composer' ),
					'font_style_description' => __( 'Select font styling.', 'js_composer' )
				)
			),
			'dependency' => array(
				'element' => 'use_theme_fonts',
				'value_not_equal_to' => 'yes',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group' => __( 'Design Options', 'js_composer' )
		)
	),
) );


/* ELV Two Column With Chat */
vc_map( array(
	'name' => __( 'Elevate Two Column With Chat', 'js_composer' ),
	'base' => 'elv_two_column_with_chat',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Pricing Table', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<h4>Financial needs selector tool</h4><h2>Learn. Compare. Choose.</h2><p class="lead">As your world evolves, we help you balance your financial needs and plan your long term goals.</p>', 'js_composer' ),
		),

		array(
			'type' => 'vc_link',
			'heading' => __( 'Button (Link)', 'js_composer' ),
			'param_name' => 'link',
			'description' => __( 'Add link to button.', 'js_composer' ),
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'persona_number'  => '1',
					'background_image'  => '',
					'background_video'   => ''
				),
				array(
					'persona_number'  => '2',
					'background_image'  => '',
					'background_video'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Persona Number', 'js_composer' ),
					'param_name' => 'persona_number',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Background Video URL', 'js_composer' ),
					'param_name' => 'background_video',
					'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),


	)
) );



/* ELV Tiles */
vc_map( array(
	'name' => __( 'Elevate Tiles', 'js_composer' ),
	'base' => 'elv_tiles',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Tiles', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'param_group',
			'heading' => __( 'Sub Menu', 'js_composer' ),
			'param_name' => 'sub_menu',
			'description' => __( 'Choose sub menu i.e. bank, save, borrow etc.', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
					'filter'  => 'featured',
					'menu_data'=> array(
						'product_icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
						'prd_link'  => '',
					),
				),
				array(
					'icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
					'filter'  => 'bank',
					'menu_data'=> array(
						'product_icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
						'prd_link'  => '',
					),
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Filter', 'js_composer' ),
					'param_name' => 'filter',
					'description' => __( 'Insert first filter over here. E.g. bank. Note please use lower case ', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'param_group',
					'heading' => __( 'Menu Data', 'js_composer' ),
					'param_name' => 'menu_data',
					'description' => __( 'Menu Data', 'js_composer' ),
					'value' => urlencode( json_encode( array(
						array(
							'product_icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
							'prd_link'  => '',
						),
						array(
							'product_icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
							'prd_link'  => '',
						),
					) ) ),
					'params' => array(
						array(
							'type' => 'iconpicker',
							'heading' => __( 'Icon', 'js_composer' ),
							'param_name' => 'product_icon_typicons',
							'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
							'settings' => array(
								'emptyIcon' => false, // default true, display an "EMPTY" icon?
								'type' => 'typicons',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display
							),
							'dependency' => array(
								'element' => 'type',
								'value' => 'typicons',
							),
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							'type' => 'vc_link',
							'heading' => __( 'Product Link', 'js_composer' ),
							'param_name' => 'prd_link',
							'description' => __( 'Insert Product Link', 'js_composer' ),
							'admin_label' => true,
						),
					)
				),
			)
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of tiles', 'js_composer' ),
			'param_name' => 'number_of_tiles',
			'description' => __( 'Number of tiles. Enter -1 for all', 'js_composer' ),
			'admin_label' => true,
		),
	)
) );

/* ELV LifeStage Category Hero */
vc_map( array(
	'name' => __( 'Elevate Lifestage Category Hero', 'js_composer' ),
	'base' => 'elv_lifestage_category_hero',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Lifestage Category Hero', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Light/Dark', 'js_composer' ),
			'value' => array(
				__( 'Light', 'js_composer' ) => 'light',
				__( 'Dark', 'js_composer' ) => 'dark'
			),
			'param_name' => 'light_dark',
			'description' => __( 'Select theme style - light / dark.', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Heading', 'js_composer' ),
			'param_name' => 'heading',
			'description' => __( 'Insert Main Heading over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<h3>Now\'s the time to put aside some extra cash so you can spend your retirement doing things you enjoy</h3>', 'js_composer' ),
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'persona_number'  => '1',
					'background_image'  => '',
					'background_video'   => ''
				),
				array(
					'persona_number'  => '2',
					'background_image'  => '',
					'background_video'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Persona Number', 'js_composer' ),
					'param_name' => 'persona_number',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Background Video URL', 'js_composer' ),
					'param_name' => 'background_video',
					'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Background Video URL', 'js_composer' ),
			'param_name' => 'background_video',
			'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'URL (Link)', 'js_composer' ),
			'param_name' => 'link',
			'description' => __( 'Add main call to action.', 'js_composer' ),
			// compatible with btn2 and converted from href{btn1}
		),

	)
) );




/* ELV Elevate Email Subscribe Row */
vc_map( array(
	'name' => __( 'Elevate Email Subscribe Row', 'js_composer' ),
	'base' => 'elv_email_subscribe_row',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Email Subscribe Row', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Salesforce Organisation ID', 'js_composer' ),
			'param_name' => 'oid',
			'description' => __( 'Insert Salesforce Organisational ID here. E.g. 00D28000000HpoS', 'js_composer' ),
			'admin_label' => true,
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Salesforce Return URL', 'js_composer' ),
			'param_name' => 'retURL',
			'description' => __( 'Insert Salesforce Return URL over here. E.g. http://www.macquarie.com/au/personal/home-loans', 'js_composer' ),
			'admin_label' => true,
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Web to Lead form Name', 'js_composer' ),
			'param_name' => 'sales_00N28000001ZCdL',
			'description' => __( 'Example: Subscribe - Macquarie Elevate - Online - Staff always on', 'js_composer' ),
			'admin_label' => true,
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Lead Record Type', 'js_composer' ),
			'param_name' => 'recordType',
			'description' => __( 'Example: 01228000000Czge', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( '00N28000002BqFl', 'js_composer' ),
			'param_name' => 'sales_00N28000002BqFl',
			'description' => __( 'Usually this is left empty', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Campaign ID', 'js_composer' ),
			'param_name' => 'Campaign_ID',
			'description' => __( 'Example: 70128000000DZrY', 'js_composer' ),
			'admin_label' => true,
		),


		array(
			'type' => 'textfield',
			'heading' => __( 'Lead Source', 'js_composer' ),
			'param_name' => 'lead_source',
			'description' => __( 'Example: Macquarie Elevate', 'js_composer' ),
			'admin_label' => true,
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Referral Source', 'js_composer' ),
			'param_name' => 'Referral_Source__c',
			'description' => __( 'Example: Macquarie Staff', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Main Text', 'js_composer' ),
			'param_name' => 'main_text',
			'description' => __( 'Insert Main Text over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<h2>Great! You\'ve successfully subscribed.</h2><p><strong>As a subscriber you can take advantage of special Your.Macquarie content.</strong></p><p>To activate your account please check your email and click the activation link.</p>', 'js_composer' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Error text', 'js_composer' ),
			'param_name' => 'error_text',
			'description' => __( 'Insert error text  over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Button text', 'js_composer' ),
			'param_name' => 'button_text',
			'description' => __( 'Insert button text  over here', 'js_composer' ),
			'admin_label' => true,
		),

	)
) );



/* ELV Elevate Repayments Calc */
vc_map( array(
	'name' => __( 'Elevate Repayments Calc', 'js_composer' ),
	'base' => 'elv_repayments_calc',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Repayments Calc', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Main heading', 'js_composer' ),
			'param_name' => 'heading',
			'description' => __( 'Please enter the main heading', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Section subtitle', 'js_composer' ),
			'param_name' => 'subtitle',
			'description' => __( 'Please enter the subtitle', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Menu Data', 'js_composer' ),
			'param_name' => 'menu_data',
			'description' => __( 'Menu Data', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'btn_link'  => '',
					'icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
					'modal_yes_no'  => 'no',
					'modal_type'  => 'book',
					'modal_link'  => '',

				),
				array(
					'btn_link'  => '',
					'icon_typicons'  => 'picon picon-0431-money-atm-machine-withdrawal-cash',
					'modal_yes_no'  => 'no',
					'modal_type'  => 'book',
					'modal_link'  => '',
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'vc_link',
					'heading' => __( 'Button Link', 'js_composer' ),
					'param_name' => 'btn_link',
					'description' => __( 'Insert Button Name over here', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Modal Yes / No', 'js_composer' ),
					'value' => array(
						__( 'Yes', 'js_composer' ) => 'yes',
						__( 'No', 'js_composer' ) => 'no'
					),
					'param_name' => 'modal_yes_no',
					'description' => __( 'Is Modal there?.', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Modal Type', 'js_composer' ),
					'value' => array(
						__( 'Booking', 'js_composer' ) => 'book',
						__( 'Subscribe', 'js_composer' ) => 'subscribe',
						__( 'Tips and Tools', 'js_composer' ) => 'tipsandtools',
						__( 'Alert', 'js_composer' ) => 'alert'
					),
					'param_name' => 'modal_type',
					'description' => __( 'Modal Type?.', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'vc_link',
					'heading' => __( 'Modal Link', 'js_composer' ),
					'param_name' => 'modal_link',
					'description' => __( 'Please choose / enter modal URL', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
			)
		),
		array(
			'type' => 'attach_images',
			'heading' => __( 'Background Image', 'js_composer' ),
			'param_name' => 'background_image',
			'value' => '',
			'description' => __( 'Select images from media library.', 'js_composer' ),
		),
	)
) );



/* ELV Feature Testimonial */
vc_map( array(
	'name' => __( 'Elevate Feature Testimonial', 'js_composer' ),
	'base' => 'elv_feature_testimonial',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Feature Testimonial', 'js_composer' ),
	'params' => array(

		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<h2>"Great product and service"</h2><p class="lead">I changed from St.George to Macquarie Bank, and I couldn\'t be any happier with the way they handle everything, was first class.</p>', 'js_composer' ),
		),

		array(
			'type' => 'vc_link',
			'heading' => __( 'URL (Link)', 'js_composer' ),
			'param_name' => 'link',
			'description' => __( 'Add link to the testimonial.', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Left/Right Text', 'js_composer' ),
			'value' => array(
				__( 'Text Left', 'js_composer' ) => 'left',
				__( 'Text Right', 'js_composer' ) => 'right'
			),
			'admin_label' => false,
			'param_name' => 'type',
			'description' => __( 'Select Text Location.', 'js_composer' ),
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'persona_number'  => '1',
					'background_image'  => '',
					'background_video'   => ''
				),
				array(
					'persona_number'  => '2',
					'background_image'  => '',
					'background_video'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Persona Number', 'js_composer' ),
					'param_name' => 'persona_number',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Background Video URL', 'js_composer' ),
					'param_name' => 'background_video',
					'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),
	)
) );




/* ELV Feature Product */
vc_map( array(
	'name' => __( 'Elevate Feature Product', 'js_composer' ),
	'base' => 'elv_feature_product',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Feature Product', 'js_composer' ),
	'params' => array(

		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<h4>Features</h4><h2>Redraw facility</h2><p class="lead">Make unlimited extra payments on a variable rate loan or up to 5% each year on a fixed rate loan. Redraw those funds later if you need to. </p>', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Left/Right Text', 'js_composer' ),
			'value' => array(
				__( 'Text Left', 'js_composer' ) => 'left',
				__( 'Text Right', 'js_composer' ) => 'right'
			),
			'admin_label' => false,
			'param_name' => 'type',
			'description' => __( 'Select Text Location.', 'js_composer' ),
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'persona_number'  => '1',
					'background_image'  => '',
					'background_video'   => ''
				),
				array(
					'persona_number'  => '2',
					'background_image'  => '',
					'background_video'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Persona Number', 'js_composer' ),
					'param_name' => 'persona_number',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Background Video URL', 'js_composer' ),
					'param_name' => 'background_video',
					'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Background Video URL', 'js_composer' ),
			'param_name' => 'background_video',
			'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
			'admin_label' => true,
		),
	)
) );



/* ELV Elevate Hero Product */
vc_map( array(
	'name' => __( 'Elevate Hero Product', 'js_composer' ),
	'base' => 'elv_hero_product',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Hero Product', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Light/Dark', 'js_composer' ),
			'value' => array(
				__( 'Light', 'js_composer' ) => 'light',
				__( 'Dark', 'js_composer' ) => 'dark'
			),
			'param_name' => 'light_dark',
			'description' => __( 'Select theme style - light / dark.', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Description', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<h1>Basic home loan</h1><h3>A low interest rate home loan for those who don\'t need an offset facility.</h3>', 'js_composer' ),
		),

		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'persona_number'  => '1',
					'background_image'  => '',
				),
				array(
					'persona_number'  => '2',
					'background_image'  => '',
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Persona Number', 'js_composer' ),
					'param_name' => 'persona_number',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),

			)
		),

		array(
			'type' => 'vc_link',
			'heading' => __( 'Apply Now URL (Link)', 'js_composer' ),
			'param_name' => 'apply_now_link',
			'description' => __( 'Add main call to action.', 'js_composer' ),
			// compatible with btn2 and converted from href{btn1}
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'Product Rates URL (Link)', 'js_composer' ),
			'param_name' => 'product_link',
			'description' => __( 'Link this to the product whoes features you want to get for example link to Basic Home Loan Product Features.', 'js_composer' ),
			// compatible with btn2 and converted from href{btn1}
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Product Type', 'js_composer' ),
			'value' => array(
				__( 'Home Loans', 'js_composer' ) => 'hl',
				__( 'Savings Accounts', 'js_composer' ) => 'sa',
				__( 'Credit Cards', 'js_composer' ) => 'cc'
			),
			'admin_label' => false,
			'param_name' => 'product_type',
			'description' => __( 'Select the product type.', 'js_composer' ),
		),

	)
) );




/* ELV Product Main Features */
vc_map( array(
	'name' => __( 'Elevate Product Main Features', 'js_composer' ),
	'base' => 'elv_product_main_features',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Product Main Features', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Heading', 'js_composer' ),
			'param_name' => 'heading',
			'description' => __( 'Insert any random value', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textarea',
			'heading' => __( 'Description', 'js_composer' ),
			'param_name' => 'description',
			'admin_label' => true,
			'value' => __( 'This is the description', 'js_composer' ),
			'description' => __( 'This is the description.', 'js_composer' ),
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'persona_number'  => '1',
					'background_image'  => '',
					'background_video'   => ''
				),
				array(
					'persona_number'  => '2',
					'background_image'  => '',
					'background_video'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Persona Number', 'js_composer' ),
					'param_name' => 'persona_number',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Background Video URL', 'js_composer' ),
					'param_name' => 'background_video',
					'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Background Video URL', 'js_composer' ),
			'param_name' => 'background_video',
			'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
			'admin_label' => true,
		),

		array(
			'type' => 'param_group',
			'heading' => __( 'Menu Data', 'js_composer' ),
			'param_name' => 'menu_data',
			'description' => __( 'Menu Data', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'name'  => 'Buying your first home',
					'icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
					'description'   => 'http://www.macquarie.com/buying-your-first-home'
				),
				array(
					'name'  => 'Buying your next home',
					'icon_typicons'  => 'picon picon-0431-money-atm-machine-withdrawal-cash',
					'description'   => 'http://www.macquarie.com/buying-your-first-home'
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Name', 'js_composer' ),
					'param_name' => 'name',
					'value' => '',
					'description' => __( 'Menu Name', 'js_composer' )
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'exploded_textarea',
					'heading' => __( 'description', 'js_composer' ),
					'param_name' => 'Description',
					'value' => '',
					'description' => __( 'Menu Description', 'js_composer' )
				)
			)
		),

	)
) );


/* ELV Elevate Bundle Feature */
vc_map( array(
	'name' => __( 'Elevate Bundle Feature', 'js_composer' ),
	'base' => 'elv_bundle_feature',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Bundle Feature', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Heading', 'js_composer' ),
			'param_name' => 'heading',
			'description' => __( 'Insert Heading value', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Sub-Heading', 'js_composer' ),
			'param_name' => 'subheading',
			'description' => __( 'Insert Sub Heading value', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Bundle', 'js_composer' ),
			'param_name' => 'bundle',
			'description' => __( 'Insert bundle URL', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'Product 1', 'js_composer' ),
			'param_name' => 'btn_link_1',
			'description' => __( 'Insert Product 1 URL over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'Product 2', 'js_composer' ),
			'param_name' => 'btn_link_2',
			'description' => __( 'Insert Product 2 URL over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'Product 3', 'js_composer' ),
			'param_name' => 'btn_link_3',
			'description' => __( 'Insert Product 3 URL over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'Product 4', 'js_composer' ),
			'param_name' => 'btn_link_4',
			'description' => __( 'Insert Product 4 URL over here', 'js_composer' ),
			'admin_label' => true,
		),
	)
) );



/* ELV Elevate Anchor Navigation */
vc_map( array(
	'name' => __( 'Elevate Anchor Navigation', 'js_composer' ),
	'base' => 'elv_anchor_navigation',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Anchor Navigation', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Custom Background Color', 'js_composer' ),
			'param_name' => 'bg_color',
			'description' => __( 'Select custom background color.', 'js_composer' ),
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Menu Headings', 'js_composer' ),
			'param_name' => 'menu_headings',
			'description' => __( 'Menu headings', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'icon_fontawesome'  => 'fa fa-adjust',
					'name'  => 'All offers',
					'target_id'   => '1'
				),
				array(
					'icon_fontawesome'  => 'fa fa-adjust',
					'name'  => 'Home Loans',
					'target_id'   => '2'
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Name', 'js_composer' ),
					'param_name' => 'name',
					'value' => '',
					'description' => __( 'Menu Name', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Target ID', 'js_composer' ),
					'param_name' => 'target_id',
					'value' => '',
					'description' => __( 'Target ID', 'js_composer' )
				)
			)
		),

	)
) );

/* ELV Two Column Event*/
vc_map( array(
	'name' => __( 'Elevate Two Column Event', 'js_composer' ),
	'base' => 'elv_two_column_event',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Two Column Event', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'js_composer' ),
		),

		array(
			'type' => 'vc_link',
			'heading' => __( 'Button (Link)', 'js_composer' ),
			'param_name' => 'link',
			'description' => __( 'Add link to button.', 'js_composer' ),
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'persona_number'  => '1',
					'background_image'  => '',
					'background_video'   => ''
				),
				array(
					'persona_number'  => '2',
					'background_image'  => '',
					'background_video'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Persona Number', 'js_composer' ),
					'param_name' => 'persona_number',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Background Video URL', 'js_composer' ),
					'param_name' => 'background_video',
					'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Custom Border Color', 'js_composer' ),
			'param_name' => 'border_color',
			'description' => __( 'Select custom border color.', 'js_composer' ),
		),



	)
) );

/* ELV Feature Expertise Lifestage*/
vc_map( array(
	'name' => __( 'Elevate Feature Expertise Lifestage', 'js_composer' ),
	'base' => 'elv_feature_expertise_lifestage',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Feature Expertise Lifestage', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'vc_link',
			'heading' => __( 'Article Link', 'js_composer' ),
			'param_name' => 'link',
			'description' => __( 'Please insert the Article Link', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Chat Feature', 'js_composer' ),
			'param_name' => 'chat',
			'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
			'description' => __( 'Include the Chat Feature.', 'js_composer' ),
		),
	)
) );

/* ELV Reward Features */
vc_map( array(
	'name' => __( 'Elevate Reward Features', 'js_composer' ),
	'base' => 'elv_reward_features',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Reward Features', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Heading', 'js_composer' ),
			'param_name' => 'heading',
			'description' => __( 'Insert Main heading over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Sub Heading', 'js_composer' ),
			'param_name' => 'subheading',
			'description' => __( 'Insert Main heading over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textarea_html',
			'heading' => __( 'Description', 'js_composer' ),
			'param_name' => 'content',
			'description' => __( 'Insert Description over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'persona_number'  => '1',
					'background_image'  => '',
					'background_video'   => ''
				),
				array(
					'persona_number'  => '2',
					'background_image'  => '',
					'background_video'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Persona Number', 'js_composer' ),
					'param_name' => 'persona_number',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Background Video URL', 'js_composer' ),
					'param_name' => 'background_video',
					'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'Button Link', 'js_composer' ),
			'param_name' => 'btn_link',
			'description' => __( 'Insert Button Name over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Text Location', 'js_composer' ),
			'value' => array(
				__( 'Left', 'js_composer' ) => 'left',
				__( 'Right', 'js_composer' ) => 'right',
			),
			'admin_label' => false,
			'param_name' => 'type',
			'description' => __( 'Select the image shape.', 'js_composer' ),
		),
	)
) );

/* ELV Reward Promo */
vc_map( array(
	'name' => __( 'Elevate Rewards Promo', 'js_composer' ),
	'base' => 'elv_reward_promo',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Rewards Promo', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textarea_html',
			'heading' => __( 'Description', 'js_composer' ),
			'param_name' => 'content',
			'description' => __( 'Insert Description over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'Button Link', 'js_composer' ),
			'param_name' => 'btn_link',
			'description' => __( 'Insert Button Name over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'persona_number'  => '1',
					'background_image'  => '',
					'background_video'   => ''
				),
				array(
					'persona_number'  => '2',
					'background_image'  => '',
					'background_video'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Persona Number', 'js_composer' ),
					'param_name' => 'persona_number',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Background Video URL', 'js_composer' ),
					'param_name' => 'background_video',
					'description' => __( 'Insert youtube video ID over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Text Location', 'js_composer' ),
			'value' => array(
				__( 'Left', 'js_composer' ) => 'left',
				__( 'Right', 'js_composer' ) => 'right',
			),
			'admin_label' => false,
			'param_name' => 'type',
			'description' => __( 'Select the image shape.', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Button Style', 'js_composer' ),
			'value' => array(
				__( 'Primary', 'js_composer' ) => 'primary',
				__( 'Secondary', 'js_composer' ) => 'secondary',
			),
			'admin_label' => false,
			'param_name' => 'button_type',
			'description' => __( 'Select button color. Primary for blue and Secondary for green.', 'js_composer' ),
		),
	)
) );



/* ELV Rate Widget */
vc_map( array(
	'name' => __( 'Elevate Rate Widget', 'js_composer' ),
	'base' => 'elv_rate_widget',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Rate Widget', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Tile Border Color', 'js_composer' ),
			'value' => array(
				__( 'Blue', 'js_composer' ) => 'blue',
				__( 'Green', 'js_composer' ) => 'green',
			),
			'admin_label' => false,
			'param_name' => 'type',
			'description' => __( 'Select Top border color.', 'js_composer' ),
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'js_composer' ),
		),
	)
) );

/* Featured promotions tiles */
vc_map( array(
	'name' => __( 'Elevate featured promotions tiles', 'js_composer' ),
	'base' => 'elv_featured_promotion_tiles',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate featured promotions tiles', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Main Heading', 'js_composer' ),
			'param_name' => 'main_heading',
			'description' => __( 'Featured products ', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Sub Heading', 'js_composer' ),
			'param_name' => 'sub_heading',
			'description' => __( 'Features you expect. Service you deserve.', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'tile_heading'  => 'Credit cards',
					'tile_description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut congue nunc.',
					'background_image'   => '',
					'btn_link'   => ''
				),
				array(
					'tile_heading'  => 'Savings Account',
					'tile_description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut congue nunc.',
					'background_image'   => '',
					'btn_link'   => ''
				),
				array(
					'tile_heading'  => 'Transaction account',
					'tile_description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut congue nunc.',
					'background_image'   => '',
					'btn_link'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Tile Heading', 'js_composer' ),
					'param_name' => 'tile_heading',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Tile Description', 'js_composer' ),
					'param_name' => 'tile_description',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'vc_link',
					'heading' => __( 'Button Link', 'js_composer' ),
					'param_name' => 'btn_link',
					'description' => __( 'Insert Button Name over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),

	)
) );


/* Featured tiles Product Page*/
vc_map( array(
	'name' => __( 'Elevate Tiles Product Page', 'js_composer' ),
	'base' => 'elv_featured_tiles_product_page',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Tiles Product Page', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'vc_link',
			'heading' => __( 'Tiles URL', 'js_composer' ),
			'param_name' => 'tile_url',
			'description' => __( 'Select the URL of tile', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'tile_heading'  => 'Credit cards',
					'tile_description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut congue nunc.',
					'background_image'   => '',
					'btn_link'   => ''
				),
				array(
					'tile_heading'  => 'Savings Account',
					'tile_description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut congue nunc.',
					'background_image'   => '',
					'btn_link'   => ''
				),
				array(
					'tile_heading'  => 'Transaction account',
					'tile_description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut congue nunc.',
					'background_image'   => '',
					'btn_link'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Tile Heading', 'js_composer' ),
					'param_name' => 'tile_heading',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Tile Description', 'js_composer' ),
					'param_name' => 'tile_description',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'vc_link',
					'heading' => __( 'Button Link', 'js_composer' ),
					'param_name' => 'btn_link',
					'description' => __( 'Insert Button Name over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),

	)
) );



/* Expertise Article Carousel */
vc_map( array(
	'name' => __( 'Expertise Article Carousel', 'js_composer' ),
	'base' => 'elv_expertise_article_carousel',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Expertise Article Carousel', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Tag', 'js_composer' ),
			'param_name' => 'filter1',
			'description' => __( 'Choose the first tag for related articles. ', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Tag 2', 'js_composer' ),
			'param_name' => 'filter2',
			'description' => __( 'Choose the second tag for related articles ', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Tag 3', 'js_composer' ),
			'param_name' => 'filter3',
			'description' => __( 'Choose the third tag for related articles ', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Tag 4', 'js_composer' ),
			'param_name' => 'filter4',
			'description' => __( 'Choose the fourth tag for related articles ', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of tiles', 'js_composer' ),
			'param_name' => 'number_of_tiles',
			'description' => __( 'Number of tiles. Enter -1 for all', 'js_composer' ),
			'admin_label' => true,
		),

	)
) );

/* Lifestages 2 by 2  */
vc_map( array(
	'name' => __( 'Lifestages 2 by 2', 'js_composer' ),
	'base' => 'elv_lifestages_2_by_2',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Lifestages 2 by 2', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Main Heading', 'js_composer' ),
			'param_name' => 'main_heading',
			'description' => __( 'Main heading e.g. Your.Macquarie ', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Sub-Heading', 'js_composer' ),
			'param_name' => 'sub_heading',
			'description' => __( 'Sub heading e.g. Lifestages ', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Background', 'js_composer' ),
			'param_name' => 'background_data',
			'description' => __( 'Background', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'tile_heading'  => 'Starting your career',
					'tile_description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut congue nunc.',
					'background_image'   => '',
					'btn_link'   => ''
				),
				array(
					'tile_heading'  => 'Getting financially savvy',
					'tile_description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut congue nunc.',
					'background_image'   => '',
					'btn_link'   => ''
				),
				array(
					'tile_heading'  => 'Building wealth',
					'tile_description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut congue nunc.',
					'background_image'   => '',
					'btn_link'   => ''
				),
				array(
					'tile_heading'  => 'Preparing for retiremen',
					'tile_description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut congue nunc.',
					'background_image'   => '',
					'btn_link'   => ''
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Tile Heading', 'js_composer' ),
					'param_name' => 'tile_heading',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Tile Description', 'js_composer' ),
					'param_name' => 'tile_description',
					'description' => __( 'Please enter persona number. E.g. 1, 2, 3...', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
				array(
					'type' => 'vc_link',
					'heading' => __( 'Button Link', 'js_composer' ),
					'param_name' => 'btn_link',
					'description' => __( 'Insert Button Name over here', 'js_composer' ),
					'admin_label' => true,
				),
			)
		),

	)
) );

/* Product Main Features Three */
vc_map( array(
	'name' => __( 'Product Main Features Three', 'js_composer' ),
	'base' => 'elv_product_main_features_three',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Product Main Features Three', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'param_group',
			'heading' => __( 'Menu Data', 'js_composer' ),
			'param_name' => 'menu_data',
			'description' => __( 'Menu Data', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'name'  => 'Buying your first home',
					'icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
					'description'   => 'http://www.macquarie.com/buying-your-first-home'
				),
				array(
					'name'  => 'Buying your next home',
					'icon_typicons'  => 'picon picon-0431-money-atm-machine-withdrawal-cash',
					'description'   => 'http://www.macquarie.com/buying-your-first-home'
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Name', 'js_composer' ),
					'param_name' => 'name',
					'value' => '',
					'description' => __( 'Menu Name', 'js_composer' )
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'exploded_textarea',
					'heading' => __( 'description', 'js_composer' ),
					'param_name' => 'description',
					'value' => '',
					'description' => __( 'Menu Description', 'js_composer' )
				)
			)
		),

	)
) );


/* Bank Accounts Tool */
vc_map( array(
	'name' => __( 'Bank Accounts Tool', 'js_composer' ),
	'base' => 'elv_bank_accounts_tool',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Bank Accounts Tool', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'param_group',
			'heading' => __( 'Menu Data', 'js_composer' ),
			'param_name' => 'menu_data',
			'description' => __( 'Menu Data', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'btn_link'  => '',
					'icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
					'modal_yes_no'  => 'no',
					'modal_type'  => 'book',
					'modal_link'  => '',

				),
				array(
					'btn_link'  => '',
					'icon_typicons'  => 'picon picon-0431-money-atm-machine-withdrawal-cash',
					'modal_yes_no'  => 'no',
					'modal_type'  => 'book',
					'modal_link'  => '',
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'vc_link',
					'heading' => __( 'Button Link', 'js_composer' ),
					'param_name' => 'btn_link',
					'description' => __( 'Insert Button Name over here', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Modal Yes / No', 'js_composer' ),
					'value' => array(
						__( 'Yes', 'js_composer' ) => 'yes',
						__( 'No', 'js_composer' ) => 'no'
					),
					'param_name' => 'modal_yes_no',
					'description' => __( 'Is Modal there?.', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Modal Type', 'js_composer' ),
					'value' => array(
						__( 'Booking', 'js_composer' ) => 'book',
						__( 'Subscribe', 'js_composer' ) => 'subscribe',
						__( 'Tips and Tools', 'js_composer' ) => 'tipsandtools',
						__( 'Alert', 'js_composer' ) => 'alert'
					),
					'param_name' => 'modal_type',
					'description' => __( 'Modal Type?.', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'vc_link',
					'heading' => __( 'Modal Link', 'js_composer' ),
					'param_name' => 'modal_link',
					'description' => __( 'Please choose / enter modal URL', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
			)
		),

	)
) );


/* Credit Card Category Page */
vc_map( array(
	'name' => __( 'Credit Card Category Page', 'js_composer' ),
	'base' => 'elv_credit_card_category_page',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Credit Card Category Page', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'param_group',
			'heading' => __( 'Menu Data', 'js_composer' ),
			'param_name' => 'menu_data',
			'description' => __( 'Menu Data', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'btn_link'  => '',
					'icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
					'modal_yes_no'  => 'no',
					'modal_type'  => 'book',
					'modal_link'  => '',

				),
				array(
					'btn_link'  => '',
					'icon_typicons'  => 'picon picon-0431-money-atm-machine-withdrawal-cash',
					'modal_yes_no'  => 'no',
					'modal_type'  => 'book',
					'modal_link'  => '',
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'vc_link',
					'heading' => __( 'Button Link', 'js_composer' ),
					'param_name' => 'btn_link',
					'description' => __( 'Insert Button Name over here', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Modal Yes / No', 'js_composer' ),
					'value' => array(
						__( 'Yes', 'js_composer' ) => 'yes',
						__( 'No', 'js_composer' ) => 'no'
					),
					'param_name' => 'modal_yes_no',
					'description' => __( 'Is Modal there?.', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Modal Type', 'js_composer' ),
					'value' => array(
						__( 'Booking', 'js_composer' ) => 'book',
						__( 'Subscribe', 'js_composer' ) => 'subscribe',
						__( 'Tips and Tools', 'js_composer' ) => 'tipsandtools',
						__( 'Alert', 'js_composer' ) => 'alert'
					),
					'param_name' => 'modal_type',
					'description' => __( 'Modal Type?.', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'vc_link',
					'heading' => __( 'Modal Link', 'js_composer' ),
					'param_name' => 'modal_link',
					'description' => __( 'Please choose / enter modal URL', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
			)
		),

	)
) );

/* Credit Card Product Hero */
vc_map( array(
	'name' => __( 'Credit Card Product Hero', 'js_composer' ),
	'base' => 'elv_credit_card_product_hero',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Credit Card Product Hero', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<h4>Exclusive offer for members</h4><h2>60,000 bonus Macquarie Rewards points</h2><p class="lead">Apply and be approved for the Macquarie Black Card with Macquarie Rewards and you\'ll receive 60,000 Macquarie Rewards points<a href="#" class="disclaimer-link">*</a> when you spend $3,000 within 60 days of approval.</p>', 'js_composer' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'Button Link', 'js_composer' ),
			'param_name' => 'btn_link',
			'description' => __( 'Insert Button Name over here', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Green Border Heading Box 1', 'js_composer' ),
			'param_name' => 'green_border_heading_box_1',
			'value' => '',
			'description' => __( 'Green Border Heading Box 1', 'js_composer' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Green Border Price Box 1', 'js_composer' ),
			'param_name' => 'green_border_price_box_1',
			'value' => '',
			'description' => __( 'Green Border Price Box 1', 'js_composer' )
		),
		array(
			'type' => 'exploded_textarea',
			'heading' => __( 'Green Border Description 1', 'js_composer' ),
			'param_name' => 'green_border_description_1',
			'value' => '',
			'description' => __( 'Green Border Description 1', 'js_composer' )
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_typicons',
			'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Green Border Heading Box 2', 'js_composer' ),
			'param_name' => 'green_border_heading_box_2',
			'value' => '',
			'description' => __( 'Green Border Heading Box 2', 'js_composer' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Green Border Price Box 2', 'js_composer' ),
			'param_name' => 'green_border_price_box_2',
			'value' => '',
			'description' => __( 'Green Border Price Box 2', 'js_composer' )
		),
		array(
			'type' => 'exploded_textarea',
			'heading' => __( 'Green Border Description 2', 'js_composer' ),
			'param_name' => 'green_border_description_2',
			'value' => '',
			'description' => __( 'Green Border Description 2', 'js_composer' )
		),
		array(
			'type' => 'attach_images',
			'heading' => __( 'Background Image', 'js_composer' ),
			'param_name' => 'background_image',
			'value' => '',
			'description' => __( 'Select images from media library.', 'js_composer' ),
		),
	)
) );


/* Credit Card Additional Features */
vc_map( array(
	'name' => __( 'Credit Card Additional Features', 'js_composer' ),
	'base' => 'elv_credit_card_additional_features',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Credit Card Additional Features', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Subtitle', 'js_composer' ),
			'param_name' => 'subtitle',
			'value' => ''
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Heading', 'js_composer' ),
			'param_name' => 'heading',
			'value' => ''
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Menu Data', 'js_composer' ),
			'param_name' => 'menu_data',
			'description' => __( 'Menu Data', 'js_composer' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Name', 'js_composer' ),
					'param_name' => 'name',
					'value' => '',
					'description' => __( 'Menu Name', 'js_composer' )
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'exploded_textarea',
					'heading' => __( 'description', 'js_composer' ),
					'param_name' => 'description',
					'value' => '',
					'description' => __( 'Menu Description', 'js_composer' )
				),
				array(
					'type' => 'attach_images',
					'heading' => __( 'Background Images', 'js_composer' ),
					'param_name' => 'background_image',
					'value' => '',
					'description' => __( 'Select images from media library.', 'js_composer' ),
				),
			)
		),

	)
) );


/* Credit Card Additional Features */
vc_map( array(
	'name' => __( 'Article Listing', 'js_composer' ),
	'base' => 'elv_article_listing',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Article Listing', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Name', 'js_composer' ),
			'param_name' => 'name',
			'value' => '',
			'description' => __( 'Menu Name', 'js_composer' )
		),
	)
) );


/* Elevate Contact Us */
vc_map( array(
	'name' => __( 'Elevate Contact Us', 'js_composer' ),
	'base' => 'elv_contact_us_tile',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Contact Us', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Tile Contact Us', 'js_composer' ),
			'param_name' => 'tile_description',
			'description' => __( 'Please enter widget title', 'js_composer' ),
			'admin_label' => true,
		),
	)
) );


/* Elevate Personalised Promotion Tile  */
vc_map( array(
	'name' => __( 'Elevate Personalised Promotion Tile', 'js_composer' ),
	'base' => 'elv_personalised_promotion_tile',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Personalised Promotion Tile', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<p>Please add content</p>', 'js_composer' ),
		),
	)
) );


/* ELV Param Tiles */
vc_map( array(
	'name' => __( 'Elevate Param Tiles', 'js_composer' ),
	'base' => 'elv_param_tiles',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Param  Tiles', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'param_group',
			'heading' => __( 'Sub Menu', 'js_composer' ),
			'param_name' => 'sub_menu',
			'description' => __( 'Choose sub menu i.e. bank, save, borrow etc.', 'js_composer' ),
			'value' => urlencode( json_encode( array(
				array(
					'icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
					'filter'  => 'featured',
					'menu_data'=> array(
						'product_icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
						'prd_link'  => '',
					),
				),
				array(
					'icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
					'filter'  => 'bank',
					'menu_data'=> array(
						'product_icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
						'prd_link'  => '',
					),
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Filter', 'js_composer' ),
					'param_name' => 'filter',
					'description' => __( 'Insert first filter over here. E.g. bank. Note please use lower case ', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'param_group',
					'heading' => __( 'Menu Data', 'js_composer' ),
					'param_name' => 'menu_data',
					'description' => __( 'Menu Data', 'js_composer' ),
					'value' => urlencode( json_encode( array(
						array(
							'product_icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
							'prd_link'  => '',
						),
						array(
							'product_icon_typicons'  => 'picon picon-0887-knife-kitchen-utensils',
							'prd_link'  => '',
						),
					) ) ),
					'params' => array(
						array(
							'type' => 'iconpicker',
							'heading' => __( 'Icon', 'js_composer' ),
							'param_name' => 'product_icon_typicons',
							'value' => 'picon picon-0431-money-atm-machine-withdrawal-cash', // default value to backend editor admin_label
							'settings' => array(
								'emptyIcon' => false, // default true, display an "EMPTY" icon?
								'type' => 'typicons',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display
							),
							'dependency' => array(
								'element' => 'type',
								'value' => 'typicons',
							),
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							'type' => 'vc_link',
							'heading' => __( 'Product Link', 'js_composer' ),
							'param_name' => 'prd_link',
							'description' => __( 'Insert Product Link', 'js_composer' ),
							'admin_label' => true,
						),
					)
				),
			)
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of tiles', 'js_composer' ),
			'param_name' => 'number_of_tiles',
			'description' => __( 'Number of tiles. Enter -1 for all', 'js_composer' ),
			'admin_label' => true,
		),
	)
) );



/* ELV  */
vc_map( array(
	'name' => __( 'Elevate Side Chat Widget', 'js_composer' ),
	'base' => 'elv_side_chat_widget',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Side Chat Widget', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Call to action', 'js_composer' ),
			'param_name' => 'call_to_action',
			'description' => __( 'Please enter widget title', 'js_composer' ),
			'admin_label' => true,
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'Request a call URL', 'js_composer' ),
			'param_name' => 'link',
			'description' => __( 'Add main call to action.', 'js_composer' ),
			// compatible with btn2 and converted from href{btn1}
		),
		array(
			'type' => 'attach_images',
			'heading' => __( 'Images', 'js_composer' ),
			'param_name' => 'images',
			'value' => '',
			'description' => __( 'Select images from media library.', 'js_composer' ),
		),

	)
) );


/* ELV Expertise Tags */
vc_map( array(
	'name' => __( 'Elevate Expertise Tag Heading', 'js_composer' ),
	'base' => 'elv_expertise_tags',
	'icon' => 'icon-wpb',
	'category' => __( 'Elevate Widgets', 'js_composer' ),
	'description' => __( 'Elevate Expertise Tag Heading', 'js_composer' ),
	'params' => array(

	)
) );

