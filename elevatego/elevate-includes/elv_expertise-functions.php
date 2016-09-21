<?php
/** This file contains all expertise related functions */


/**
 * @param $user_id
 * @return mixed
 *
 * @return an array of all the post IDs liked by users
 *
 */
function elv_has_user_liked($persona_id){
    $user_likes = get_post_meta($persona_id, 'elv_personalisations_likes', true);
    $user_liked_posts = array();
    if (isset($user_likes) && $user_likes != '') {
        $user_liked_posts = explode('|', $user_likes);
    }
    return $user_liked_posts;
}


/**
 * @param $user_id
 * @return array
 *
 *
 */
function elv_has_user_disliked($persona_id){
    $user_dislikes = get_post_meta($persona_id, 'elv_personalisations_dislikes', true);
    $user_disliked_posts = array();
    if (isset($user_dislikes) && $user_dislikes != '') {
        $user_disliked_posts = explode('|', $user_dislikes);
    }

    return $user_disliked_posts;
}


/**
 * @param $user_id
 * @return array
 *
 */
function elv_has_user_bookmarked($persona_id){
    $user_bookmarks = get_post_meta($persona_id, 'elv_personalisations_bookmarks', true);

    $user_bookmark_posts = array();
    if (isset($user_bookmarks) && $user_bookmarks != '') {
        $user_bookmark_posts = explode('|', $user_bookmarks);
    }
    return $user_bookmark_posts;

}

/**
 * @param $user_id
 * @return array
 *
 */

function elv_has_user_followed_author($persona_id){
    $user_followed_author = get_post_meta($persona_id, 'elv_personalisations_authors', true);
    $user_followed_authors = array();
    if (isset($user_followed_author) && $user_followed_author != '') {
        $user_followed_authors = explode('|', $user_followed_author);
    }
    return $user_followed_authors;
}


/**
 * @param $post_id
 * @return int
 *
 *
 */
function elv_get_article_author_id($post_id){
    $author_id = get_post_meta($post_id, 'elv_posts_authors',true);
    $author_id_value = 295;
    if (isset($author_id) && $author_id != '') {
        $author_id_value = $author_id;
    }

    return $author_id_value;

}


/**
 * @param $author_id
 * @return string
 *
 */
function elv_get_elevate_author_name($author_id){
	$author_name = 'Leanne Tea';
	$a_author = get_post($author_id);
	if( isset($a_author->post_title) ){
		$author_name = $a_author->post_title;
	}
	return $author_name;
}

/***
 * @param $author_id
 * @return string
 *
 */
function elv_get_elevate_author_bio($author_id){
	$author_content = '';
	$a_author = get_post($author_id);
	if( isset($a_author->post_content) ){
    	$author_content = $a_author->post_content;
	}
	return $author_content;
}

/***
 * @param $author_id
 * @return mixed|string
 *
 */
function elv_get_elevate_author_tagline($author_id){
    $author_tag_line = '';
    $author_tag_line = get_post_meta($author_id, 'elv_authors_tag_line',true);
    $author_tag_line = isset($author_tag_line) ? $author_tag_line : '';
    return $author_tag_line;
}


/**
 * @param $author_id
 * @return int
 *
 */
function elv_get_elevate_author_followers($author_id){
    $number_author_followers = 20;
    $author_followers = get_post_meta($author_id,'elv_authors_follow_id', true);
    if (!empty($author_followers) && $author_followers != '') {
        $number_author_followers = count(explode('|', $author_followers));
    }
    return $number_author_followers;
}

/**
 * @param $author_id
 * @return false|string
 *
 */
function elv_get_elevate_author_featured_image($author_id){
    $author_featured_image = get_home_url() . '/wp-content/uploads/2016/05/chat-brigit-2.jpg';
    $author_featured_image = wp_get_attachment_url(get_post_thumbnail_id($author_id));
    return $author_featured_image;
}


/**
 * @param $post_id
 * @return int
 *
 *
 */
function elv_get_number_of_post_likes($post_id){
    $number_of_likes = get_post_meta($post_id, 'elv_posts_likes');
    $number_of_likes_value = 20;
    if (!empty($number_of_likes) && $number_of_likes[0] != '') {
        $number_of_likes_value = $number_of_likes[0];
    }
    return $number_of_likes_value;
}


/***
 * @param $post_id
 * @return int
 *
 *
 *
 */
function elv_get_number_of_post_dislikes($post_id){
    $number_of_dislikes = get_post_meta($post_id, 'elv_posts_dislikes');
    $number_of_dislikes_value = 5;

    if (!empty($number_of_dislikes) && $number_of_dislikes[0] != '') {
        $number_of_dislikes_value = $number_of_dislikes[0];
    }

    return $number_of_dislikes_value;
}


/**
 * @param $string
 * @param int $number_of_words
 * @return string
 *
 *
 *
 */
function elv_bold_first_words($string, $number_of_words =3){
    $a_get_the_title = array();
    $a_get_the_title = explode(' ', $string);

    $s_title = '<strong>';
    $i = 0;
    foreach ($a_get_the_title as $v) {
        if ($i == $number_of_words) {
            $s_title .= '</strong>';
        }
        $s_title .= ' ' . $v;
        $i++;
    }
    return $s_title;
}


/***
 * @param $post_id
 * @param int $number_of_words
 * @return string
 *
 *
 */
function elv_get_post_trimmed_content($post_id, $number_of_words = 200){
    $content_post = get_post($post_id);
    $content = $content_post->post_content;
    $content = wp_trim_words( $content, $number_of_words, '...' );
    return $content;
}


function elv_create_expertise_buttons(
    $post_id,
    $form_post_url,
    $form_id,
    $user_id_field_id,
    $code_spliter,
    $post_id_posted,
    $author_id_posted,
    $author_id_value,
    $user_bookmark_posts,
    $icon,
    $button_default_id,
    $button_updated_id,
    $value_placeholder_id,
    $additional_classes,
    $actual_value,
    $code_spliter_value
){
    $added_html = '';
    if($actual_value != ''){
        $added_html  = '<span id="'. esc_attr($value_placeholder_id) .'">'. esc_attr($actual_value) .'</span>';
    }

    $html = '';
    $html .='<form method="post" action="'. esc_url($form_post_url) .'" id="'. esc_attr($form_id) .'">
            <input type="hidden" id="'. esc_attr($user_id_field_id) .'" value="1" name="'. esc_attr($user_id_field_id) .'" />
            <input type="hidden" id="'. esc_attr($code_spliter) .'" value="'. esc_attr($code_spliter_value) .'" name="'. esc_attr($code_spliter) .'" />
            <input type="hidden" id="'. esc_attr($post_id_posted) .'" value="'.  esc_attr($post_id) .'" name="'. esc_attr($post_id_posted) .'" />
            <input type="hidden" id="action" value="expertise" name="action" />
            <input type="hidden" id="'. esc_attr($author_id_posted) .'" value="'. esc_attr($author_id_value) .'" name="'. esc_attr($author_id_posted) .'" />
            <input type="hidden" id="h" value="'. esc_attr(elv_get_current_hash()) .'" name="h" />';

    if (in_array($post_id, $user_bookmark_posts)) {
        $html .='<span class="'. esc_attr($icon) .' text-primary" id="'. esc_attr($button_default_id) .'"><!-- fill --></span>
                 '.$added_html.'
                <span id="'. esc_attr($button_updated_id) .'"></span>';
    } else {
        $html .='<button class="'. esc_attr($icon) .'" id="'. esc_attr($button_default_id) .'"><!-- fill --></button>
                <span class="'. esc_attr($icon) .' text-primary" id="'. esc_attr($button_default_id) .'_later" style="display:none"><!-- fill --></span>
                   '.$added_html.'
                <span id="'. esc_attr($button_updated_id) .' text-primary" style="display:none;" class="'. esc_attr($additional_classes) .'"></span>';

    }

    $html .= '</form>';
    return $html;
}


function elv_create_author_follow_button(
    $post_id,
    $form_post_url,
    $form_id,
    $user_id_field_id,
    $code_spliter,
    $post_id_posted,
    $author_id_posted,
    $author_id_value,
    $user_bookmark_posts,
    $icon,
    $button_default_id,
	$code_spliter_value,
    $follow_me_class
){
    $html = '';
    $html .='<form method="post" action="'. esc_url($form_post_url) .'" id="'. esc_attr($form_id) .'">
       	 	<input type="hidden" id="action" value="expertise" name="action" />
            <input type="hidden" id="'. esc_attr($user_id_field_id) .'" value="11" name="'. esc_attr($user_id_field_id) .'"/>
            <input type="hidden" id="'. esc_attr($code_spliter) .'" value="'. esc_attr($code_spliter_value) .'" name="'. esc_attr($code_spliter) .'"/>
            <input type="hidden" id="'. esc_attr($post_id_posted) .'" value="'.  esc_attr($post_id) .'" name="'. esc_attr($post_id_posted) .'"/>
            <input type="hidden" id="'. esc_attr($author_id_posted) .'" value="'. esc_attr($author_id_value) .'" name="'. esc_attr($author_id_posted) .'"/>';


        $html .='<p class="'. esc_attr($follow_me_class) .'">';



    if (in_array($author_id_value, $user_bookmark_posts)) {
        $html .='<button class="'. esc_attr($icon) .' active" id="'. esc_attr($button_default_id) .'">Following</button>';
    } else {
        $html .='<button class="'. esc_attr($icon) .'" id="'. esc_attr($button_default_id) .'">Follow</button>';
    }



        $html .='</p>';
    

    $html .= '</form>';
    return $html;
}


function elv_create_ajax_calls(
    $form_id,
    $user_id,
    $user_id_field_id,
    $value_placeholder_id,
    $button_updated_id,
$button_default_id
){
    $button_default_id_later = $button_default_id.'_later';
    $html = 'jQuery("#'. esc_attr($form_id) .'").submit(function () {
		var evl_uid = jQuery("#elv_uid").val();
		jQuery("#'. esc_attr($user_id_field_id) .'").val(evl_uid);
		// catch the form"s submit event
		jQuery.ajax({ // create an AJAX call...
			data: jQuery(this).serialize(), // get the form data
			type: jQuery(this).attr("method"), // GET or POST
			url: jQuery(this).attr("action"), // the file to call
			success: function (response) { // on success..
				jQuery("#'. esc_attr($value_placeholder_id) .'").hide();
				jQuery("#'. esc_attr($button_default_id) .'").hide();
				jQuery("#'. esc_attr($button_updated_id) .'").show();
				jQuery("#'. esc_attr($button_default_id_later) .'").show();
				jQuery("#'. esc_attr($button_updated_id) .'").html(response); // update the DIV
			}
		});
		return false; // cancel original event to prevent form submitting
	});';

    return $html;
}
