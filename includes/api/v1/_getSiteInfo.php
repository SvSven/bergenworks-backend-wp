<?php

function getSiteInfo($request) {

    $acf_options = get_fields('options');

    $data = [
        "site_name" => get_bloginfo("name"),
        "site_description" => get_bloginfo("description")
    ];

    return new WP_REST_Response(array_merge($data, $acf_options), 200);
}
