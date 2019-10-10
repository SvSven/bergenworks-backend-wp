<?php

// Add featured_image url to rest API response for page/post hero image
add_action( 'rest_api_init', function () {
    register_rest_field( ['page', 'post'], 'featured_image', array(
        'get_callback' => function( $post ) {
            $post_id = $post['id'];
            return get_the_post_thumbnail_url($post_id, 'page_hero');
        }
    ) );
} );
