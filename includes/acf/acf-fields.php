<?php

if (!class_exists('acf_field')) return;

class BergenWorks_ACF_Fields {
	public function __construct() {
		$this->settings = [
			'version'	=> '1.0.0',
			'url'		=> get_template_directory_uri() . '/includes/acf-fields',
			'path'		=> get_template_directory_uri() . '/includes/acf-fields'
		];

		add_action('acf/include_field_types', [$this, 'include_field_types']);
	}

	public function include_field_types($version = false) {
		include_once('fields/BergenWorks_PageLink.php');
	}
}
new BergenWorks_ACF_Fields();

