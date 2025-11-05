<?php

namespace CEF\Tournaments\AffiliateScraper;

use Illuminate\Support\Collection;
use CEF\Tournaments\AffiliateScraper\Contracts\canListTournamentHistory;
use Psr\Http\Message\ResponseInterface;

class AffiliateScraper implements canListTournamentHistory {

    private ?ResponseInterface $fetchResponse = null;
    private string $id;
    private Collection $tournamentHistory;

    function __construct(string $id) {
        $this->id = $id;
        $this->tournamentHistory = collect([]);
    }

    private function fetchTournamentHistory($force = false){
        if((!$this->fetchResponse) || ($this->fetchResponse->getStatusCode() != 200) || $force){
            $this->fetchResponse = (new Fetch($this->id))->fetch();
        }
        if($this->fetchResponse->getStatusCode() != 200){
            return;
        }
        $body = (string) $this->fetchResponse->getBody()->getContents();
        $parser = new TournamentHistoryParser($body);
        $this->tournamentHistory = $parser->listTournamentHistory();
    }

    public function listTournamentHistory($force = false): Collection {
        $this->fetchTournamentHistory($force);
        return $this->tournamentHistory;
    }
}