<?php

namespace CEF\Tournaments;

class CrosstableUrlSaver {

    const FIELD_KEY = 'tournament_crosstable_url';

    private \WP_Post $post;
    private string $crossTableUrl = '';

    function __construct(?\WP_Post $post) {
        if(!$post){
            return;
        }
        $this->post = $post;
        $this->crossTableUrl = (string) get_field(self::FIELD_KEY, $this->post);
    }

    public function save() : string {
        if(!$this->post){
            return '';
        }
        if($this->crossTableUrl){
            return $this->crossTableUrl;
        }

        $scraper = new UscfScraper($this->post);
        $this->crossTableUrl = sanitize_url($scraper->getUrl());
        if($this->crossTableUrl){
            update_field(self::FIELD_KEY, $this->crossTableUrl, $this->post->ID);
        }
        return $this->crossTableUrl;
    }

}
