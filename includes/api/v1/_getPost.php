<?php
namespace bergenworks\api\v1;

/**
 * Retrieve page by slug
 * Wrapper for built in WordPress endpoint: /wp-json/wp/v2/pages?slug=<name>
 */
function getPost($request) {
    $slug = $request["slug"];

    $id = null;

    $post = get_page_by_path($slug, OBJECT, "post");
    $id = $post->ID;

    if (!$id) {
        return new \WP_Error('empty_category', 'could not find requested post', array('status' => 404));
    }

    $post_request  = new \WP_REST_Request('GET', '/wp/v2/posts/' . $id);
    $response = rest_do_request($post_request);

    if ($response->is_error()) {
        return new \WP_Error('empty_category', 'error retrieving post', array('status' => 500));
    }

    return new \WP_REST_Response($response->get_data(), 200);
}

function getAllPosts($request) {
    $posts_request  = new \WP_REST_Request('GET', '/wp/v2/posts');
    $response = rest_do_request($posts_request);

    if ($response->is_error()) {
        return new \WP_Error('empty_category', 'error retrieving posts', array('status' => 500));
    }

    return new \WP_REST_Response($response->get_data(), 200);
}
