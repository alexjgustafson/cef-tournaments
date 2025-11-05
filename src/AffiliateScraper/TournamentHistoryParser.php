<?php

namespace CEF\Tournaments\AffiliateScraper;

use CEF\Tournaments\AffiliateScraper\Contracts\canListTournamentHistory;
use Illuminate\Support\Collection;

class TournamentHistoryParser implements canListTournamentHistory{

    const EVENT_LIST_TABLE_INDEX = 6;

    const CROSS_TABLE_ROUTE = 'https://ratings.uschess.org/event/';

    private string $html;

    function __construct(string $html) {
        $this->html = $html;
    }

    public function formatTournamentRow(HTMLElement $row): TournamentListItem {
        $item = new TournamentListItem;

        $cells = $row->getElementsByTagName('td');
        if(!$cells){
            return $item;
        }

        $endedAndId = $cells->item(0);
        $item->dateEnded = trim(substr($endedAndId->textContent,0, strpos($endedAndId->innerHTML, '<br')));

        $maybeIds = $endedAndId->getElementsByTagName('small');
        $item->id = $maybeIds->item(0) ? $maybeIds->item(0)->textContent : '';
        $item->crosstableUrl = $item->id ? self::CROSS_TABLE_ROUTE . '?' . $item->id : '';

        $nameAndInfo = $cells->item(1);
        $item->name = $nameAndInfo->getElementsByTagName('a')->item(0)->textContent;
        $info = $nameAndInfo->getElementsByTagName('small')->item(0)->textContent;

        if($info){
            $trimReceived = substr($info, strpos($info, ' ')+1);
            $item->dateReceived = trim(substr($trimReceived, 0, strpos($trimReceived, ' ')));

            $trimEntered = substr($trimReceived, strpos($trimReceived, 'Entered:')+9);
            $item->dateEntered = trim(substr($trimEntered, 0, strpos($trimEntered, ' ')));

            $trimRated = substr($trimEntered, strpos($trimEntered, 'Rated:')+7);
            $item->dateRated = trim(substr($trimRated, 0, strpos($trimRated, ' ')));

            $item->sections = substr($trimRated, strpos($trimRated, 'Sections:')+10);
        }

        return $item;
    }

    public function listTournamentHistory(): Collection {

        $doc = \Dom\HTMLDocument::createFromString($this->html, LIBXML_NOERROR);

        // Find the tournaments table
        $tables = $doc->getElementsByTagName('table');
        $eventListTable = $tables->item(self::EVENT_LIST_TABLE_INDEX);

        // Capture the rows
        $eventListTableRows = $eventListTable->getElementsByTagName('tr');
        if(!$eventListTableRows){
            return collect([]);
        }

        // Format rows
        return collect($eventListTableRows)->skip(2)->map([$this, 'formatTournamentRow']);


    }
}