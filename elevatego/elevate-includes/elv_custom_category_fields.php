<?php

/** This file contains all the global functions */


/**
 *
 * Add custom fields to tags
 *
 */



//add extra fields to category edit form callback function
function elv_extra_category_fields( $tag )
{    //check for existing featured ID
    $t_id = $tag->term_id;
    $cat_meta = get_option("category_$t_id");
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_Image_url"><?php _e('Category Video Url'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[video]" id="Cat_meta[video]" size="3" style="width:60%;"
                   value="<?php echo $cat_meta['video'] ? esc_attr($cat_meta['video']) : ''; ?>"><br/>
            <span class="description"><?php _e('Video for category: use  youtube ID E.g. lMJXxhRFO1k '); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="extra3"><?php _e('Heading on Video'); ?></label></th>
        <td>
            <textarea name="Cat_meta[extra3]" id="Cat_meta[extra3]" style="width:60%;"><?php echo esc_attr($cat_meta['extra3']) ? esc_attr($cat_meta['extra3']) : ''; ?></textarea><br />
            <span class="description"><?php _e('Heading on Video'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="extra2"><?php _e('Description Text'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[extra2]" id="Cat_meta[extra2]" size="25" style="width:60%;" value="<?php echo esc_attr($cat_meta['extra2']) ? esc_attr($cat_meta['extra2']) : ''; ?>"><br />
            <span class="description"><?php _e('Description Text'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="extra1"><?php _e('Video CTA'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[extra1]" id="Cat_meta[extra1]" size="25" style="width:60%;" value="<?php echo esc_attr($cat_meta['extra1']) ? esc_attr($cat_meta['extra1']) : ''; ?>"><br />
            <span class="description"><?php _e('Video CTA'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="lifestage1"><?php _e('Lifestage 1'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[lifestage1]" id="Cat_meta[lifestage1]" size="25" style="width:60%;"
                   value="<?php echo esc_attr($cat_meta['lifestage1']) ? esc_attr($cat_meta['lifestage1']) : ''; ?>"><br/>
            <span class="description"><?php _e('Lifestage 1'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="lifestage2"><?php _e('Lifestage 2'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[lifestage2]" id="Cat_meta[lifestage2]" size="25" style="width:60%;"
                   value="<?php echo esc_attr($cat_meta['lifestage2']) ? esc_attr($cat_meta['lifestage2']) : ''; ?>"><br/>
            <span class="description"><?php _e('Lifestage 2'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="lifestage3"><?php _e('Lifestage 3'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[lifestage3]" id="Cat_meta[lifestage3]" size="25" style="width:60%;"
                   value="<?php echo esc_attr($cat_meta['lifestage3']) ? esc_attr($cat_meta['lifestage3']) : ''; ?>"><br/>
            <span class="description"><?php _e('Lifestage 3'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="lifestage4"><?php _e('Lifestage 4'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[lifestage4]" id="Cat_meta[lifestage4]" size="25" style="width:60%;"
                   value="<?php echo esc_attr($cat_meta['lifestage4']) ? esc_attr($cat_meta['lifestage4']) : ''; ?>"><br/>
            <span class="description"><?php _e('Lifestage 4'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="filter1"><?php _e('Filter 1'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[filter1]" id="Cat_meta[filter1]" size="25" style="width:60%;"
                   value="<?php echo esc_attr($cat_meta['filter1']) ? esc_attr($cat_meta['filter1']) : ''; ?>"><br/>
            <span class="description"><?php _e('Filter 1'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="filter2"><?php _e('Filter 2'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[filter2]" id="Cat_meta[filter2]" size="25" style="width:60%;"
                   value="<?php echo esc_attr($cat_meta['filter2']) ? esc_attr($cat_meta['filter2']) : ''; ?>"><br/>
            <span class="description"><?php _e('Filter 2'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="filter3"><?php _e('Filter 3'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[filter3]" id="Cat_meta[filter3]" size="25" style="width:60%;"
                   value="<?php echo esc_attr($cat_meta['filter3']) ? esc_attr($cat_meta['filter3']) : ''; ?>"><br/>
            <span class="description"><?php _e('Filter 3'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="filter4"><?php _e('Filter 4'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[filter4]" id="Cat_meta[filter4]" size="25" style="width:60%;"
                   value="<?php echo esc_attr($cat_meta['filter4']) ? esc_attr($cat_meta['filter4']) : ''; ?>"><br/>
            <span class="description"><?php _e('Filter 4'); ?></span>
        </td>
    </tr>
    <?php
}


//add extra fields to category edit form hook
add_action ( 'edit_category_form_fields', 'elv_extra_category_fields');

// save extra category extra fields callback function
function elv_save_extra_category_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
        foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){

                $cat_meta[$key] = esc_attr($_POST['Cat_meta'][$key]);
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}


// save extra category extra fields hook
add_action ( 'edited_category', 'elv_save_extra_category_fileds');


