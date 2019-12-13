<?php
namespace bergenworks\acf\fields;

class Membership {

    const GROUP_PREFIX = 'group_bergenworks_membership_';
    const FIELD_PREFIX = 'field_bergenworks_membership_';
    const LOCATION = [
        [
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'membership',
        ],
    ];

    public $field_groups = ['membership_box'];

    public function register() {
        foreach($this->field_groups as $group) {
            acf_add_local_field_group($this->{$group});
        }
    }

    public $membership_box = [
        'key' => self::GROUP_PREFIX . 'box',
        'title' => 'Membership box',
        'fields' => [
            [
                'key' => self::FIELD_PREFIX . 'message',
                'label' => '',
                'name' => '',
                'type' => 'message',
                'message' => 'Here you can enter the content used for membership plan blocks which can be shown on for example the front page.',
            ],
            [
                'key' => self::FIELD_PREFIX . 'color',
                'label' => 'Color',
                'name' => 'color',
                'type' => 'color_picker',
                'required' => 0,
                'default_value' => '#00D1B2',
            ],
            [
                'key' => self::FIELD_PREFIX . 'price',
                'label' => 'Price',
                'name' => 'price',
                'type' => 'group',
                'required' => 0,
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'key' => self::FIELD_PREFIX . 'price_amount',
                        'label' => 'Amount',
                        'name' => 'amount',
                        'type' => 'number',
                        'required' => 0,
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'price_per',
                        'label' => 'Amount per',
                        'name' => 'per',
                        'type' => 'text',
                        'required' => 0,
                        'default_value' => '/ month',
                    ],
                ],
            ],
            [
                'key' => self::FIELD_PREFIX . 'description',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
                'required' => 0,
            ],
            [
                'key' => self::FIELD_PREFIX . 'button',
                'label' => 'Button',
                'name' => 'button',
                'type' => 'group',
                'required' => 0,
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'key' => self::FIELD_PREFIX . 'button_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                        'required' => 0,
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'button_use_external_link',
                        'label' => 'External link',
                        'name' => 'use_external_link',
                        'type' => 'true_false',
                        'required' => 0,
                        'message' => '',
                        'default_value' => 0,
                        'ui' => 1,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'button_internal_link',
                        'label' => 'Internal link',
                        'name' => 'link',
                        'type' => 'bw_page_link',
                        'required' => 0,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => self::FIELD_PREFIX . 'button_use_external_link',
                                    'operator' => '!=',
                                    'value' => '1',
                                ],
                            ],
                        ],
                        'post_type' => [
                            0 => 'post',
                            1 => 'page',
                        ],
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'allow_archives' => 0,
                        'multiple' => 0,
                        'return_format' => 'bw_api',
                    ],
                    [
                        'key' => self::FIELD_PREFIX . 'button_external_link',
                        'label' => 'External link',
                        'name' => 'external_link',
                        'type' => 'url',
                        'required' => 0,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => self::FIELD_PREFIX . 'button_use_external_link',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'location' => [self::LOCATION],
        'menu_order' => 0,
        'position' => 'normal',
    ];
}
