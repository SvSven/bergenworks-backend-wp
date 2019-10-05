<?php

require_once('_getSiteInfo.php');
require_once('_getMenus.php');
require_once('_getPage.php');
require_once('_getPost.php');

$endpoints = [
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
    ],
    [
        "endpoint" => "page/(?P<slug>[a-zA-Z0-9-]+)",
        "callback" => "getPage"
    ],
    [
        "endpoint" => "post/(?P<slug>[a-zA-Z0-9-]+)",
        "callback" => "getPost"
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
