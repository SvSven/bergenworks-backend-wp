<?php

include('_getFrontpage.php');
include('_getSiteInfo.php');
include('_getMenus.php');

$endpoints = [
    [
        "endpoint" => "frontpage",
        "callback" => "getFrontpage"
    ],
    [
        "endpoint" => "site-info",
        "callback" => "getSiteInfo"
    ],
    [
        "endpoint" => "menus",
        "callback" => "getAllMenus"
    ],
    [
        "endpoint" => "menus/(?P<name>[a-zA-Z0-9-]+)",
        "callback" => "getSpecificMenu"
    ]
];

function registerEndpoint($endpoint, $callback) {
    $namespace = "bw/v1";
    add_action('rest_api_init', function () use ($namespace, $endpoint, $callback) {
        register_rest_route($namespace, $endpoint,array(
                      'methods'  => 'GET',
                      'callback' => $callback
            ));
      });
}

foreach($endpoints as $endpoint) {
    registerEndpoint($endpoint['endpoint'], $endpoint['callback']);
}
