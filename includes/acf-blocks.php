<?php

function register_acf_block_types() {
    acf_register_block_type(array(
        'name'              => 'testimonial',
        'title'             => 'Testimonial',
        'description'       => 'Custom testimonial block.',
        'render_template'   => 'templates/blocks/acf-testimonial.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => ['testimonial', 'quote'],
    ));
}

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}
