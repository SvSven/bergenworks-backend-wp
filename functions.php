<?php

/**
 * For some reason, WordPress has decided to use the value of the "Site Address" setting instead of
 * the value of "WordPress Address" to create the rest API url. This, obviously, causes problems when
 * using WordPress as a headless CMS. This fixes that.
 */
add_filter('rest_url', function($url) {
    $url = str_replace(home_url(), site_url(), $url);
    return $url;
});

function register_menus() {
    register_nav_menu('main-menu', ('Main menu'));
    register_nav_menu('footer-left', ('Footer menu left'));
    register_nav_menu('footer-center', ('Footer menu center'));
    register_nav_menu('footer-right', ('Footer menu right'));
}
add_action('init', 'register_menus');

require_once('includes/api/v1/endpoints.php');
require_once("includes/acf-options.php");
require_once("includes/acf-blocks.php");
