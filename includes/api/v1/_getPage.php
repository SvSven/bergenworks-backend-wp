<?php
namespace bergenworks\api\v1;

/**
 * Retrieve page by slug
 * Wrapper for built in WordPress endpoint: /wp-json/wp/v2/pages?slug=<name>
 */
function getPage($request) {
    $slug = $request["slug"];

    $id = null;

    // We want to make sure the "home" slug returns the frontpage
    if ($slug == "home") {
        $id = get_option('page_on_front');
    } else {
        $page = get_page_by_path($slug);
        $id = $page->ID;
    }

    if (!$id) {
        return new WP_Error('empty_category', 'could not find requested page', array('status' => 404));
    }

    $page_request  = new WP_REST_Request('GET', '/wp/v2/pages/' . $id);
    $response = rest_do_request($page_request);

    if ($response->is_error()) {
        return new WP_Error('empty_category', 'error retrieving page', array('status' => 500));
    }

    return new WP_REST_Response($response->get_data(), 200);
}

function getAllPages($request) {
    $pages_request  = new WP_REST_Request('GET', '/wp/v2/pages');
    $response = rest_do_request($pages_request);

    if ($response->is_error()) {
        return new WP_Error('empty_category', 'error retrieving pages', array('status' => 500));
    }

    return new WP_REST_Response($response->get_data(), 200);
}
