<?php
namespace bergenworks\acf;

/**
 * Add custom path to icons for Icon Picker plugin
 */
add_filter('acf_icon_path_suffix', function() {
    return 'assets/icons/';
});

/**
 * Create options page(s)
 */
if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' 	=> 'Custom Site Options',
        'menu_title'	=> 'Site options',
        'menu_slug' 	=> 'site-options',
        'capability'	=> 'edit_posts',
        'redirect'		=> true
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'General Information',
        'menu_title'	=> 'General',
        'parent_slug'	=> 'site-options',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Contact Information',
        'menu_title'	=> 'Contact',
        'parent_slug'	=> 'site-options',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Corporate Partners',
        'menu_title'	=> 'Partners',
        'parent_slug'	=> 'site-options',
    ));
}
