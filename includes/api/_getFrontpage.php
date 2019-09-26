<?php

function getFrontpage($request) {
    $frontpage_id = get_option('page_on_front');

    if (empty($frontpage_id)) {
        return new WP_Error('empty_category', 'no static frontpage has been selected', array('status' => 404));
    }

    $page_request  = new WP_REST_Request('GET', '/wp/v2/pages/' . $frontpage_id);
    $response = rest_do_request($page_request);

    if ($response->is_error()) {
        return new WP_Error('empty_category', 'error retrieving static frontpage', array('status' => 500));
    }

    return $response->get_data();
}
