<?php

// Add featured_image url to rest API response for page/post hero image
add_action( 'rest_api_init', function () {
    register_rest_field( ['page', 'post'], 'featured_image', array(
        'get_callback' => function( $post ) {
            $post_id = $post['id'];
            return get_the_post_thumbnail_url($post_id, 'page_hero');
        }
    ) );

    if (function_exists('get_fields')) {
        register_rest_field( ['page', 'post'], 'acf_content', array(
            'get_callback' => function($post) {

                $fields = get_fields($post['id']);

                if (get_option('page_on_front') == $post['id']) {
                    /**
                     * Todo: Have ACF return this specific image url so that we don't have
                     * to hard code the fields here
                     */
                    $img_id = get_field('hero_content_image', $post['id']);
                    $fields['hero']['content']['image'] = wp_get_attachment_image_url($img_id, 'page_hero');

                    return $fields;
                }

                return $fields;
            }
        ));
    }
} );
