<?php

namespace CEF\Tournaments;

class Tournament {

    private \WP_Post $post;
    private string $crossTableUrl = '';

    function __construct(?\WP_Post $post) {
        if(!$post){
            return;
        }
        $this->post = $post;
        $this->crossTableUrl = (string) get_field('tournament_crosstable_url', $this->post);
    }

    function getContent() : string {
        if(!$this->crossTableUrl){
            return '';
        }
        return sprintf('<h2>Tournament Completed</h2><a href="%s" target="_blank">View the crosstable at US Chess.</a>', esc_url($this->crossTableUrl));
    }
}