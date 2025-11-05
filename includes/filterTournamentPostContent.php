<?php

namespace CEF\Tournaments\FilterTournamentPostContent;

use CEF\Tournaments\Tournament;

function getReplacementText() {
    $tournament = new Tournament(get_post());
    return $tournament->getContent();
}

add_filter('the_content', function($content){
    if(!is_singular('tournament')){
        return $content;
    }
    $replace = getReplacementText();
    return $replace ? $replace : $content;
});