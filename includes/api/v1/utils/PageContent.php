<?php
namespace bergenworks\api\v1\utils;

use bergenworks\api\v1\utils\PageContentFormat;

class PageContent {
    public $id;
    public $slug;
    private $formatted;
    private $cache_path;

    /**
     * @param int post ID
     */
    public function __construct($page) {
        $page_obj = get_post($page);

        if (!$page_obj) {
            $page_obj = get_page_by_path($page);

            if(!$page_obj) {
                return false;
            }
        }

        $this->id = $page_obj->ID;
        $this->slug = $page_obj->post_name;
        $this->cache_path = get_template_directory() . '/includes/api/v1/page_cache';
    }

    /**
     * Retrieves formatted page content
     * Return from stored JSON if available, else convert and return
     * @return array
     */
    public function get() {
        $file = "{$this->cache_path}/{$this->id}.json";

        if (file_exists($file)) {
            $json = file_get_contents($file);
            return json_decode($json, true);
        }

        return $this->convertToFormat();
    }

    /**
     * Create formatted page content based on stored format
     * @return bool|array
     */
    private function convertToFormat() {
        if(!$this->formatted = $this->getFormat($this->slug)) {
            return false;
        }

        array_walk_recursive($this->formatted, function(&$item) {
            $item = get_field($item, $this->id);
        });

        return $this->formatted;
    }

    /**
     * Find and return the correct format array
     * @param string $slug - page slug
     * @return array
     */
    private function getFormat($slug) {
        return PageContentFormat::get($slug);
    }

    /**
     * Stores formatted page content as JSON file
     * @return bool
     */
    public function createCache() {
        if(!$this->formatted) {
            $this->convertToFormat();

            if(!$this->formatted) {
                return false;
            }
        }

        try {
            if(!$fp = fopen("{$this->cache_path}/{$this->id}.json", "w")) {
                throw new \Exception('Failed to open file.');
            }

            if(!fwrite($fp, json_encode($this->formatted))) {
                throw new \Exception('Failed to write to file.');
            }

            fclose($fp);
            return true;

        } catch (\Exception $error) {
            error_log('Error while creating JSON file: ' . $error);
            return false;
        }
    }
}
