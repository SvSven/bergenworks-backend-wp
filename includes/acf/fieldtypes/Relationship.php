<?php
namespace bergenworks\acf\fieldtypes;

class Relationship extends \acf_field_relationship {

    function render_field($field) {
        // To prevent the field from rendering twice
        return false;
    }

	function format_value($value, $post_id, $field) {
		if(empty($value) ) {
			return $value;
        }

        if($field['return_as_bw_api']) {
            $output = [];
            foreach($value as $post) {
                $fields = get_fields($post->ID);

                $content = [
                    'id' => $post->ID,
                    'title' => $post->post_title
                ];

                $output[] = array_merge($content, $fields);
            }
            return $output;
        }

        // Handle return as normal ACF relationship field
        $value = acf_get_array($value);
        $value = array_map('intval', $value);
        if($field['return_format'] == 'object') {
            $value = acf_get_posts(array(
                'post_in' => $value,
                'post_type'	=> $field['post_type']
            ));
        }
        return $value;
    }

    /**
     * Add additional option to return value as BW format
     * Since we're just extending the existing field and not creating a new one, we can't
     * just add this choice to the existing return_format setting
     */
	function render_field_settings($field) {
		acf_render_field_setting( $field, array(
			'label'			=> 'Return as BW Api',
			'instructions'	=> '',
			'type'			=> 'radio',
			'name'			=> 'return_as_bw_api',
			'choices'		=> [
				0		    => 'No',
				1		    => 'Yes',
            ],
			'layout'	=>	'horizontal',
        ));
    }
}
