<?php

add_action('acf/init', 'register_testimonial_fields');

function register_testimonial_fields() {
    $fields = [
        'key' => 'group_bergenworks_block_testimonial',
        'title' => 'Block - BergenWorks Testimonial',
        'fields' => [
            [
                'key' => 'field_bergenworks_testimonial_text',
                'label' => 'testimonial',
                'name' => 'testimonial',
                'type' => 'textarea',
                'required' => 1,
            ],
            [
                'key' => 'field_bergenworks_testimonial_author',
                'label' => 'author',
                'name' => 'author',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'field_bergenworks_testimonial_role',
                'label' => 'role',
                'name' => 'role',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'field_bergenworks_testimonial_image',
                'label' => 'image',
                'name' => 'image',
                'type' => 'image',
                'required' => 1,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/bergenworks-testimonial',
                ],
            ],
        ],
    ];
    acf_add_local_field_group($fields);
}
