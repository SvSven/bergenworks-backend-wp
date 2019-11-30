<?php
namespace bergenworks\api\v1;

function getImage($request) {
    $id = $request['id'];

    $size = $request->get_param('size');
    $image = wp_get_attachment_image_src($id, $size)[0];

    if(!$image) {
        return new \WP_Error('resource_not_found', 'could not find requested image', array('status' => 404));
    }

    $extension = pathinfo($image, PATHINFO_EXTENSION);

    header("Content-Type: image/{$extension}");
    readfile($image);
}
