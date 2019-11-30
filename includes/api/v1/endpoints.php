<?php
namespace bergenworks\api\v1;

require_once('_getSiteInfo.php');
require_once('_getMenus.php');
require_once('_getPage.php');
require_once('_getPost.php');
require_once('_getImage.php');

$endpoints = [
    [
        "endpoint" => "site-info",
        "callback" => 'bergenworks\api\v1\getSiteInfo'
    ],
    [
        "endpoint" => "menus",
        "callback" => 'bergenworks\api\v1\getAllMenus'
    ],
    [
        "endpoint" => "menus/(?P<name>[a-zA-Z0-9-]+)",
        "callback" => 'bergenworks\api\v1\getSpecificMenu'
    ],
    [
        "endpoint" => "pages",
        "callback" => 'bergenworks\api\v1\getAllPages'
    ],
    [
        "endpoint" => "pages/(?P<slug>[a-zA-Z0-9-]+)",
        "callback" => 'bergenworks\api\v1\getPage'
    ],
    [
        "endpoint" => "posts",
        "callback" => 'bergenworks\api\v1\getAllPosts'
    ],
    [
        "endpoint" => "posts/(?P<slug>[a-zA-Z0-9-]+)",
        "callback" => 'bergenworks\api\v1\getPost'
    ],
    [
        "endpoint" => "image/(?P<id>[0-9-]+)",
        "callback" => 'bergenworks\api\v1\getImage'
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
