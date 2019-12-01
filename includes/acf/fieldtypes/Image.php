<?php
namespace bergenworks\acf\fieldtypes;

class Image extends \acf_field_image {
    public function initialize() {
        parent::initialize();

        $this->name = 'bw_image';
        $this->label = 'BW Image';
        $this->category = 'BergenWorks';
        $this->defaults = [
            'post_type' => ['post', 'page'],
            'allow_null' => 0,
            'multiple' => 0,
            'allow_archives' => 0,
            'return_format' => 'bw_api'
        ];
    }

    public function render_field($field) {
        parent::render_field($field);
        ?>
        <script>
            (function($){
                const Field = acf.models.ImageField.extend({
                    type: 'bw-image',
                });
                acf.registerFieldType(Field);
            })(jQuery);
        </script>
        <?php
    }

    function format_value( $value, $post_id, $field ) {
        if( empty($value) || !is_numeric($value) ) return false;

        $id = intval($value);
        $image = wp_get_attachment_image_src($value, 'full');

        return [
            "id" => $id,
            "url" => $image[0],
            "alt" => get_post_meta($id, '_wp_attachment_image_alt', true)
        ];
    }
}
