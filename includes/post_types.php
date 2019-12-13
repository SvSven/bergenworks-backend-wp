<?php
namespace bergenworks\posttypes;

add_action('init', function() {
    register_post_type('membership',
        [
            'labels' => [
                'name' => 'Membership plans',
                'singular_name' => 'Membership'
            ],
            'public' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'membership'],
            'menu_icon' => 'dashicons-groups',
            'supports' => [],
            'show_in_rest' => true
        ]
    );
    remove_post_type_support('membership', 'editor');
});

