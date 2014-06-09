<?php

/*
 * typeahead/search
 * Typeahead query for submission form
 * @return page
 */

$this->respond('GET', '/search', function ($request, $response, $service, $app) {
    $mod_list = json_decode(file_get_contents('data/modlist.json'), true);
    
    $mods = array();
    foreach ($mod_list as $key => $mod) {
        if(stristr($mod['name'],$request->param('query')) !== false || (isset($mod['other']) && stristr($mod['other'], $request->param('query')) !== false)) {
            $entry = array();
            if(count($mod['author']) == 1)
                $entry['author'] = $mod['author'][0];
            else
                $entry['author'] = implode(", ", $mod['author']);
            $entry['desc'] = $mod['desc'];
            $entry['value'] = $mod['name'];
            if(isset($mod['other'])) {
                $entry['other'] = $mod['other'];
                $entry['tokens'] = array_merge(
                            explode(' ',preg_replace("/[^0-9a-zA-Z -]/i", '', $mod['name'])),
                            explode(' ',preg_replace("/[^0-9a-zA-Z -]/i", '', $mod['other']))
                        );
            } else
                $entry['tokens'] = explode(' ',preg_replace("/[^0-9a-zA-Z -]/i", '', $mod['name']));
            
            if(!in_array($entry,$mods)) {
                array_push($mods, $entry);
            }
            
            if(count($mods) >= 10)
                break;
        }
    }
    
    $response->json($mods);
});

/*
 * typeahead/load
 * Typeahead mod info load for submission form
 * @return page
 */

$this->respond('GET', '/load', function ($request, $response, $service, $app) {
    $mod_list = json_decode(file_get_contents('data/modlist.json'), true);
    
    $result = array();
    
    foreach ($mod_list as $key => $mod) {
        if($mod['name'] === $request->param('name') && implode(", ", $mod['author']) === $request->param('author')) {
            $mod['parsedauthors'] = implode(", ", $mod['author']);
            $result = $mod;
            break;
        }
    }
    
    $response->json($result);
});