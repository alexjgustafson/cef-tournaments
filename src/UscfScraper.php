<?php

namespace CEF\Tournaments;

use CEF\Tournaments\AffiliateScraper\AffiliateScraper;

class UscfScraper {

    const AFFILIATE_ID = 'A6033006';

    private \WP_Post $post;
    private string $start = '';
    private string $end = '';


    function __construct(?\WP_Post $post) {
        if(!$post){
            return;
        }
        $this->post = $post;
        $this->start = (string) get_field('tournament_start_date', $this->post);
        $this->end = (string) get_field('tournament_end_date', $this->post);
    }

    private function shouldTryToScrape() : bool {
        if(!$this->start){
            return false;
        }

        $today = date('Y-m-d');
        $inFuture = strtotime($this->start) > strtotime($today);
        return !$inFuture;
    }

    private function scrape() : string {
        if(!$this->shouldTryToScrape()){
            return '';
        }

        // Load up Affiliate Scraper tool
//        $scraper = new AffiliateScraper(self::AFFILIATE_ID);
//        $tournaments = $scraper->listTournamentHistory();

        // look for first event with start (or start and end)
        // return url
    }


    public function getUrl() : string {
        return sanitize_text_field($this->scrape());
    }

}
