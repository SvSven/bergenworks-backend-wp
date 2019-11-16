<?php
namespace bergenworks\acf\fieldtypes;

use bergenworks\acf\fieldtypes\PageLink;

if (!class_exists('acf_field')) return;

/**
 * Register custom ACF field types
 */
class FieldTypes {
	public function __construct() {
		$this->settings = [
			'version'	=> '1.0.0',
			'url'		=> get_template_directory_uri() . '/includes/acf',
			'path'		=> get_template_directory_uri() . '/includes/acf'
		];

		add_action('acf/include_field_types', [$this, 'include_field_types']);
	}

	public function include_field_types($version = false) {
		new PageLink($this->settings);
	}
}
new FieldTypes();
