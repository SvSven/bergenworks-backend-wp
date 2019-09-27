<?php

function getSiteInfo($request) {
    $data = [
        "site_name" => get_bloginfo("name"),
        "site_description" => get_bloginfo("description")
    ];

    return new WP_REST_Response($data, 200);
}
