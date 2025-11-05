<?php

namespace CEF\Tournaments\SaveCrosstableUrlOnInit;

use CEF\Tournaments\CrosstableUrlSaver;

// If we view the post on the front end
add_action('parse_query', function(){
    if(!is_singular('tournament')){
        return;
    }
    (new CrosstableUrlSaver(get_post()))->save();
});
