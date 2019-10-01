<?php

function register_menus() {
    register_nav_menu('main-menu', ('Main menu'));
}
add_action('init', 'register_menus');

require_once('includes/api/v1/endpoints.php');
require_once("includes/acf-options.php");
