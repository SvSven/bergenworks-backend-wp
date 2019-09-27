<?php

include('_getFrontpage.php');
include('_getSiteInfo.php');

$endpoints = [
    [
        "endpoint" => "frontpage",
        "callback" => "getFrontpage"
    ],
    [
        "endpoint" => "site-info",
        "callback" => "getSiteInfo"
    ]
];

function registerEndpoint($endpoint, $callback) {
    $namespace = "bw";
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