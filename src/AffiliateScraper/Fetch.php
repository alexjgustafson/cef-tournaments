<?php

namespace CEF\Tournaments\AffiliateScraper;

use CEF\Tournaments\AffiliateScraper\Contracts\canFetch;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Fetch implements canFetch {
    private string $affiliateId;
    function __construct(string $id) {
        $this->affiliateId = $id;
    }

    function affiliateTournamentHistoryUrl(): string {
        return "https://ratings.uschess.org/affiliate/{$this->affiliateId}";
    }

    public function fetch(): ResponseInterface{
        $client = new Client([
                'cookies' => true,
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0',
                    'Accept'=> '*/*',
                    'Accept-Language'=> 'en-US,en;q=0.5',
                    'Accept-Encoding'=> 'gzip, deflate, br',
                    'Connection'=> 'keep-alive'
                ]
            ]
        );
        return $client->get($this->affiliateTournamentHistoryUrl());
    }
}