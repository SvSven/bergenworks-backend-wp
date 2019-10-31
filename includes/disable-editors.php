<?php

/**
 * Check if content editors should be disabled for given post/page
 * @param integer id of post
 * @return bool
 */
function disable_editors($id) {
    // Path of page template(s) to exclude
    $excluded_templates = [];

    // IDs of post/page to exclude
    $excluded_ids = [
        get_option('page_on_front')
    ];

    // Get template path for current post
    $template = get_page_template_slug($id);

    return in_array($template, $excluded_templates) || in_array($id, $excluded_ids);
}

function disable_gutenberg($can_edit, $post_type) {
    return disable_editors($_GET['post']) ? false : true;
}
add_filter( 'gutenberg_can_edit_post_type', 'disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'disable_gutenberg', 10, 2 );

function disable_classic_editor() {
	if(!isset($_GET['post'])) return;

	if (disable_editors($_GET['post'])) {
		remove_post_type_support( 'page', 'editor' );
	}
}
add_action( 'admin_head', 'disable_classic_editor' );
