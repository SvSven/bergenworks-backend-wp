<?php
namespace bergenworks\api\v1;

function getAllMenus($request) {
    $locations = get_nav_menu_locations();
    $registered_menus = get_registered_nav_menus();

    $output = [];

    foreach($registered_menus as $key => $value) {
        $menu_object = wp_get_nav_menu_object($locations[$key]);
        $menu_items = wp_get_nav_menu_items($menu_object->term_id);

        $menu = null;

        if($menu_items) {
            $menu["items"] = formatMenuOutput($menu_items);
            $menu["name"] = $menu_object->name;
        }

        $output[$key] = $menu;
    }

    return new \WP_REST_Response($output, 200);
}

function getSpecificMenu($request) {
    $menu_name = $request["name"];

    $menu_locations = get_nav_menu_locations();
    $menu_object = wp_get_nav_menu_object($menu_locations[$menu_name]);

    if(!$menu_object) {
        return new \WP_Error('empty_category', 'could not find menu', array('status' => 404));
    }

    $menu = wp_get_nav_menu_items($menu_object->term_id);

    if(!$menu) {
        return new \WP_Error('empty_category', 'error retrieving menu', array('status' => 500));
    }

    return new \WP_REST_Response(formatMenuOutput($menu), 200);
}

function formatMenuOutput($menu) {
    $output = [];
    $frontpage_id = get_option('page_on_front');

    foreach($menu as $item) {
        $slug = null;
        if($item->object !== "custom") {
            $post = get_post($item->object_id);
            $slug = $post->post_name;
        }

        $output[] = [
            "id" => (int)$item->object_id,
            "menu_order" => $item->menu_order,
            "type" => $item->object,
            "title" => $item->title,
            "slug" => $slug ? $slug : null,
            "is_frontpage" => (int)$item->object_id == $frontpage_id,
            "is_custom_link" => $item->object == "custom" ? true : false,
            "custom_link_url" => $item->object == "custom" ? $item->url : null
        ];
    }

    return $output;
}
