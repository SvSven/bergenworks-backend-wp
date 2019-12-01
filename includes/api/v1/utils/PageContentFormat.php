<?php
namespace bergenworks\api\v1\utils;

/**
 * TODO: Set this up to format all page data (not just ACF fields) for every page
 * Pages with custom ACF fields have their own format, others use a default format
 */

/**
 * Contains page data format arrays for API response
 * Each key value contains the name of the ACF field to retrieve from database
 * $slug = ['key' => 'acf_field_name']
 */
class PageContentFormat {

    /**
     * Retrieve page data format array
     * @param string - page slug
     * @return array|bool
     */
    public static function get($slug) {
        if(!isset(self::${$slug})) {
            return false;
        }
        return self::${$slug};
    }

    public static $home = [
        'hero_section' => [
            'image' => 'hero_image',
            'title' => 'hero_title',
            'subtitle' => 'hero_subtitle',
            'blocks' => 'hero_blocks'
        ],
        'intro_section' => [
            'title' => 'intro_title',
            'text' => 'intro_content',
            'image' => 'intro_image',
            'button' => 'intro_button',
            'testimonial' => 'intro_testimonial'
        ],
    ];
}
