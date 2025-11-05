<?php

namespace CEF\Tournaments\AffiliateScraper\Contracts;

use Illuminate\Support\Collection;

interface canListTournamentHistory{
    public function listTournamentHistory(): Collection;
}