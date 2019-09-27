<?php

include('includes/api/endpoints.php');

function register_menus() {
    register_nav_menu('main-menu', ('Main menu'));
}

add_action('init', 'register_menus');
