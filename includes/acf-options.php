<?php

if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' 	=> 'Custom Site Options',
        'menu_title'	=> 'Site options',
        'menu_slug' 	=> 'site-options',
        'capability'	=> 'edit_posts',
        'redirect'		=> true
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Contact Information',
        'menu_title'	=> 'Contact',
        'parent_slug'	=> 'site-options',
    ));
}
