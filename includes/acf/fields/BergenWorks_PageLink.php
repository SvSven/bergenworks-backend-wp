<?php

class BergenWorks_PageLink extends acf_field_page_link {
    public function initialize() {
        parent::initialize();

		$this->name = 'bw_page_link';
        $this->label = 'BW Page Link';
        $this->category = 'BergenWorks';
		$this->defaults = [
			'post_type'			=> ['post', 'page'],
			'allow_null' 		=> 0,
			'multiple'			=> 0,
            'allow_archives'	=> 0,
            'return_format'     => 'bw_api'
        ];

		add_action('wp_ajax_acf/fields/bw_page_link/query', [$this, 'ajax_query']);
		add_action('wp_ajax_nopriv_acf/fields/bw_page_link/query', [$this, 'ajax_query']);
    }

    public function format_value($value, $post_id, $field) {
        $page = get_post($value);

        if (!array_key_exists('return_format', $field) || $field['return_format'] != 'bw_api' || !$page) {
            return parent::format_value($value, $post_id, $field);
        }

        return [
            'id' => $page->ID,
            'type' => $page->post_type,
            'title' => $page->post_name,
            'path' => $page->post_name,
            'url' => get_permalink($page->ID),
            'is_frontpage' => $page->ID == get_option('page_on_front')
        ];
    }

    public function render_field($field) {
        parent::render_field($field);
        ?>
        <script>
            (function($){
                const Field = acf.models.SelectField.extend({
                    type: 'bw-page-link',
                });
                acf.registerFieldType(Field);
            })(jQuery);
        </script>
        <?php
    }

    public function ajax_query() {
        parent::ajax_query();
    }

    public function render_field_settings( $field ) {
        parent::render_field_settings($field);

        acf_render_field_setting($field, [
			'label'			=> __('Return Value','acf'),
			'instructions'	=> __('Specify the returned value on front end','acf'),
			'type'			=> 'radio',
			'name'			=> 'return_format',
			'layout'		=> 'horizontal',
			'choices'		=> [
				'default'	=> 'Default ACF',
				'bw_api'	=> 'BergenWorks API Format',
            ]
        ]);
    }
}
new BergenWorks_PageLink($this->settings);
