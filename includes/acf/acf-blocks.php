<?php

if (!function_exists('acf_register_block_type')) return;

add_filter('block_categories', 'register_block_categories', 10, 2);
add_action('acf/init', 'register_blocks');

function register_block_categories($categories, $post) {
    return array_merge(
        $categories,
        [
            [
                'slug' => 'bergenworks',
                'title' => 'BergenWorks'
            ]
        ]
    );
}

function register_blocks() {
    acf_register_block_type(array(
        'name'              => 'bergenworks_testimonial',
        'title'             => 'Testimonial',
        'description'       => 'BergenWorks testimonial block.',
        'render_template'   => 'includes/acf/blocks/testimonial.php',
        'category'          => 'bergenworks',
        'icon'              => 'admin-comments',
        'keywords'          => ['testimonial', 'quote'],
    ));
}
