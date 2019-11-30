<?php
namespace bergenworks\api\v1;

use bergenworks\api\v1\utils\PageContent;

add_action( 'rest_api_init', function () {
    // Add featured_image url to rest API response for page/post hero image
    register_rest_field( ['page', 'post'], 'featured_image', array(
        'get_callback' => function( $post ) {
            $post_id = $post['id'];
            return get_the_post_thumbnail_url($post_id, 'page_hero');
        }
    ) );

    if (function_exists('get_fields')) {
        register_rest_field( ['page', 'post'], 'acf_content', array(
            'get_callback' => function($post) {
                $page_content = new PageContent($post->ID);
                $content = $page_content->get();
                return $content;
            }
        ));
    }
} );
