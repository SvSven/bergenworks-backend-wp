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

    public $field_groups = ['hero_section', 'intro_section', 'membership_plans', 'highlight_section'];

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
                        'preview_size' => 'medium',
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
                        'preview_size' => 'medium',
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

    public $membership_plans = [
        'key' => self::GROUP_PREFIX . 'highlighted_memberships',
        'title' => 'Highlighted membership plans',
        'fields' => [
            [
                'key' => self::FIELD_PREFIX . 'highlighted_memberships_message',
                'label' => '',
                'name' => '',
                'type' => 'message',
                'message' => 'Here you can select which membership plans you wish to highlight on the front page. You can view and edit each membership plan on the memberships page. Membership plans can be selected in the left column, and selected plans can be dragged to re-arrange them in the right column.',
            ],
            [
                'key' => self::FIELD_PREFIX . 'highlighted_memberships_selected',
                'label' => 'Selected plans',
                'name' => 'membership_plans',
                'type' => 'relationship',
                'required' => 0,
                'post_type' => [
                    0 => 'membership',
                ],
                'taxonomy' => '',
                'filters' => '',
                'elements' => '',
                'return_format' => 'object',
                'return_as_bw_api' => 1,
            ],
        ],
        'location' => [self::LOCATION],
        'menu_order' => 2,
        'position' => 'normal'
    ];

    public $highlight_section = [
        'key' => self::GROUP_PREFIX . 'highlight_section',
        'title' => 'Highlight section',
        'fields' => [
            [
                'key' => self::FIELD_PREFIX . 'highlight',
                'label' => '',
                'name' => 'highlight',
                'type' => 'group',
                'required' => 0,
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'key' => self::FIELD_PREFIX . 'highlight_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'bw_image',
                        'required' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'allow_archives' => 0,
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'highlight_content',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'group',
                        'required' => 0,
                        'layout' => 'block',
                        'sub_fields' => [
                            [
                                'key' => self::FIELD_PREFIX . 'highlight_content_title',
                                'label' => 'Title',
                                'name' => 'title',
                                'type' => 'text',
                                'required' => 0,
                            ],
                            [
                                'key' => self::FIELD_PREFIX . 'highlight_content_text',
                                'label' => 'Text',
                                'name' => 'text',
                                'type' => 'textarea',
                                'required' => 0,
                                'new_lines' => 'wpautop',
                            ],
                            [
                                'key' => self::FIELD_PREFIX . 'highlight_content_link_label',
                                'label' => 'Link label',
                                'name' => 'link_label',
                                'type' => 'text',
                                'required' => 0,
                            ],
                            [
                                'key' => self::FIELD_PREFIX . 'highlight_content_link',
                                'label' => 'Link',
                                'name' => 'link',
                                'type' => 'bw_page_link',
                                'required' => 0,
                                'allow_null' => 0,
                                'allow_archives' => 0,
                                'multiple' => 0,
                                'return_format' => 'bw_api',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'location' => [self::LOCATION],
        'menu_order' => 3,
        'position' => 'normal',
    ];

}
