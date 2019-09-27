<?php

function getAllMenus($request) {
    $locations = get_nav_menu_locations();
    $registered_menus = get_registered_nav_menus();

    $output = [];

    foreach($registered_menus as $key => $value) {
        $menu_object = wp_get_nav_menu_object($locations[$key]);
        $output[$key] = wp_get_nav_menu_items($menu_object->term_id);
    }

    return new WP_REST_Response($output, 200);
}

function getSpecificMenu($request) {
    $menu_name = $request["name"];

    $menu_locations = get_nav_menu_locations();
    $menu_object = wp_get_nav_menu_object($menu_locations[$menu_name]);

    if(!$menu_object) {
        return new WP_Error('empty_category', 'could not find menu', array('status' => 404));
    }

    $menu = wp_get_nav_menu_items($menu_object->term_id);

    if(!$menu) {
        return new WP_Error('empty_category', 'error retrieving menu', array('status' => 500));
    }

    return new WP_REST_Response($menu, 200);
}
