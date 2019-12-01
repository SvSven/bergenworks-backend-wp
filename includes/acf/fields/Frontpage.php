<?php
namespace bergenworks\acf\fields;

class Frontpage {

    const GROUP_PREFIX = 'group_bergenworks_frontpage_';
    const FIELD_PREFIX = 'field_bergenworks_frontpage_';
    const LOCATION = [
        [
            'param' => 'page_type',
            'operator' => '==',
            'value' => 'front_page',
        ],
    ];

    public $field_groups = ['hero_section', 'intro_section'];

    public function register() {
        foreach($this->field_groups as $group) {
            acf_add_local_field_group($this->{$group});
        }
    }

    public $hero_section = [
        'key' => self::GROUP_PREFIX . 'hero',
        'title' => 'Hero section',
        'fields' => [
            [
                'key' => self::FIELD_PREFIX . 'hero',
                'label' => 'Content',
                'name' => 'hero',
                'type' => 'group',
                'required' => 0,
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'key' => self::FIELD_PREFIX . 'hero_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'bw_image',
                        'required' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'allow_archives' => 0,
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'hero_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 0,
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'hero_subtitle',
                        'label' => 'Subtitle',
                        'name' => 'subtitle',
                        'type' => 'textarea',
                        'required' => 0,
                    ],
                ],
            ],
            [
                'key' => self::FIELD_PREFIX . 'blocks',
                'label' => 'Blocks',
                'name' => 'hero_blocks',
                'type' => 'repeater',
                'required' => 0,
                'layout' => 'table',
                'button_label' => 'Add block',
                'sub_fields' => [
                    [
                        'key' => self::FIELD_PREFIX . 'blocks_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 0,
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'blocks_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'bw_page_link',
                        'required' => 0,
                        'post_type' => [
                            0 => 'post',
                            1 => 'page',
                        ],
                        'allow_null' => 0,
                        'allow_archives' => 0,
                        'multiple' => 0,
                        'return_format' => 'bw_api',
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'blocks_icon',
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'icon-picker',
                        'required' => 0,
                    ],
                ],
            ],
        ],
        'location' => [self::LOCATION],
        'menu_order' => 0,
        'position' => 'normal',
    ];

    public $intro_section = [
        'key' => self::GROUP_PREFIX . 'intro',
        'title' => 'Intro section',
        'fields' => [
            [
                'key' => self::FIELD_PREFIX . 'intro_title',
                'label' => 'Title',
                'name' => 'intro_title',
                'type' => 'text',
                'required' => 0,
                'conditional_logic' => 0,
            ],
            [
                'key' => self::FIELD_PREFIX . 'intro',
                'label' => 'Intro',
                'name' => 'intro',
                'type' => 'group',
                'required' => 0,
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'key' => self::FIELD_PREFIX . 'intro_content',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'textarea',
                        'required' => 0,
                        'new_lines' => 'wpautop',
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'intro_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'bw_image',
                        'required' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ],
                ],
            ],
            [
                'key' => self::FIELD_PREFIX . 'intro_button',
                'label' => 'Button',
                'name' => 'intro_button',
                'type' => 'link',
                'required' => 0,
                'return_format' => 'array',
            ],
            [
                'key' => self::FIELD_PREFIX . 'intro_testimonial',
                'label' => 'Testimonial',
                'name' => 'intro_testimonial',
                'type' => 'group',
                'required' => 0,
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'key' => self::FIELD_PREFIX . 'intro_testimonial_text',
                        'label' => 'text',
                        'name' => 'text',
                        'type' => 'textarea',
                        'required' => 0,
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'intro_testimonial_author',
                        'label' => 'author',
                        'name' => 'author',
                        'type' => 'text',
                        'required' => 0,
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'intro_testimonial_role',
                        'label' => 'role',
                        'name' => 'role',
                        'type' => 'text',
                        'required' => 0,
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'intro_testimonial_image',
                        'label' => 'image',
                        'name' => 'image',
                        'type' => 'bw_image',
                        'required' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'allow_archives' => 0,
                    ],
                ],
            ],
        ],
        'location' => [self::LOCATION],
        'menu_order' => 1,
        'position' => 'normal',
    ];
}
