<?php
namespace bergenworks;
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Prevent WordPress from redirecting index.php to site_url()
 * We want to use two separate URLs - one for the CMS and one for the frontend
 * Changing the "WordPress Address (URL)" and "Site Address (URL)" however causes
 * a redirect to occur when visiting the "WordPress Address" directly.
 */
remove_filter('template_redirect','redirect_canonical');

/**
 * For some reason, WordPress has decided to use the value of the "Site Address" setting instead of
 * the value of "WordPress Address" to create the rest API url. This, obviously, causes problems when
 * using WordPress as a headless CMS. This fixes that.
 */
add_filter('rest_url', function($url) {
    $url = str_replace(home_url(), site_url(), $url);
    return $url;
});

add_filter('rest_url_prefix', function() {
    return 'api';
});

add_theme_support( 'post-thumbnails' );

add_image_size('page_hero', 2800, 1500, false);

function register_menus() {
    register_nav_menu('main-menu', ('Main menu'));
    register_nav_menu('footer-left', ('Footer menu left'));
    register_nav_menu('footer-center', ('Footer menu center'));
    register_nav_menu('footer-right', ('Footer menu right'));
}
add_action('init', 'bergenworks\register_menus');

require_once('includes/disable-editors.php');
require_once('includes/api/v1/endpoints.php');
require_once('includes/api/v1/custom-rest-fields.php');

/**
 * Functionality to extend Advanced Custom Fields
 */
require_once("includes/acf/BergenWorks_ACF.php");
