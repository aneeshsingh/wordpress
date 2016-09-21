<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
$menu_data = $atts['sub_menu'];
$number_of_tiles = $atts['number_of_tiles'];
$menu_data_s = (array)vc_param_group_parse_atts($menu_data);

$tabs = array();
$categories = array();
$i = 0;
$k = 0;
foreach ($menu_data_s as $menu_data_p) {



    $tabs[$i]['parent_icon'] = $menu_data_p['icon_typicons'];
    $tabs[$i]['parent_name'] = $menu_data_p['filter'];
    $menu_data_p_s = (array)vc_param_group_parse_atts($menu_data_p['menu_data']);
    $counter = 0;

    foreach ($menu_data_p_s as $product_category){
        $categories[$k]['parent'] = $menu_data_p['filter'];
        $categories[$k]['child_icon'] = $product_category['product_icon_typicons'];
        $link = $product_category['prd_link'];
        $url = vc_build_link($link);
        $categories[$k]['title'] = esc_attr($url['title']);
        $categories[$k]['url'] = esc_url($url['url']);
        $categories[$k]['class'] = '';

        $k++;
        $counter++;
    }

    switch ($counter%3){

        case 0;
            break;
        case 2:
            $categories[$k+1]['parent'] = $menu_data_p['filter'];
            $categories[$k+1]['child_icon'] = 'picon';
            $categories[$k+1]['title'] = '';
            $categories[$k+1]['url'] = '';
            $categories[$k+1]['class'] = 'product-category-null';
            $k = $k + 2;

            break;
        case 1:
            $categories[$k+2]['parent'] = $menu_data_p['filter'];
            $categories[$k+2]['child_icon'] = 'picon';
            $categories[$k+2]['title'] = '';
            $categories[$k+2]['url'] = '';
            $categories[$k+2]['class'] = 'product-category-null';
            $categories[$k+1]['parent'] = $menu_data_p['filter'];
            $categories[$k+1]['child_icon'] = 'picon';
            $categories[$k+1]['title'] = '';
            $categories[$k+1]['url'] = '';
            $categories[$k+1]['class'] = 'product-category-null';

            $k = $k +4;
            break;
        default:
            break;
    }
    $i++;
}



$s_inline_style = '';
$s_featured_img_url = '';

$s_tiles  = '';
$s_tiles  .= elv_get_tile_headers($tabs);
$s_tiles .= elv_create_product_categories($categories);
$s_tiles .= elv_generate_modal_windows($tabs);
$s_tiles .= elv_generate_expertise_tiles($tabs,$number_of_tiles);


wp_reset_postdata();

$s_tiles .= '	</div>' . PHP_EOL . '</div>';


print balanceTags($s_tiles);
