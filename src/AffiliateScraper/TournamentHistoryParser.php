<?php

namespace CEF\Tournaments\AffiliateScraper;

use CEF\Tournaments\AffiliateScraper\Contracts\canListTournamentHistory;
use Illuminate\Support\Collection;

class TournamentHistoryParser implements canListTournamentHistory{
    private string $data;

    function __construct($data) {
        $this->data = $data;
    }

    public function listTournamentHistory(): Collection {
        return Collection::make(json_decode($this->data)->items);
    }
}