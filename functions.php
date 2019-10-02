<?php

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
