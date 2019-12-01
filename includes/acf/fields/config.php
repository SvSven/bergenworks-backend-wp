<?php
namespace bergenworks\acf\fields;

use bergenworks\acf\fields\Frontpage;

if(!function_exists('acf_add_local_field_group') ) return;

add_action('acf/init', function() {
    $frontpage_fields = new Frontpage();
    $frontpage_fields->register();
});
