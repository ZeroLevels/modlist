<?php

if(!function_exists('filter_sort')) {
    function filtersort($data) {
        return PREG_REPLACE("/[^0-9a-zA-Z]/i", '', $data);
    }
}

if(!function_exists('changelogDate')) {
    function changelogDate($version) { //
            $file = file('data/changelogs/'.$version.'.txt');
            $date = substr(trim($file[0]),1,-1);
            $date = parseDate($date);
            return date('jS F, Y',$date);
    }
}

if(!function_exists('parseDate')) {
    function parseDate($date) {
            $pieces = explode('/',$date);
            return strtotime(implode(' ',$pieces));
    }
}

if(!function_exists('changelogParse')) {
    function changelogParse($version) { //
            $file = file('data/changelogs/'.$version.'.txt');
            $latestchanges = array();
            for($i=1;$i<count($file);$i++) {
                    if($file[$i] == "\r\n" || $file[$i] == "\n")
                            break;
                    else
                            if(strpos($file[$i], '(Which are the following)') === false)
                                    $latestchanges[] = $file[$i];
            }
            return convertChangelog($latestchanges, $version);
    }
}

if(!function_exists('convertChangelog')) {
    function convertChangelog($mods, $version) { //
            $added = array();
            $updated = array();
            $removed = array();
            $new = array();
            foreach($mods as &$mod) {
                    $arr = explode(' ',trim($mod));
                    $type = substr($arr[0],1);
                    if($type == "Added")
                            $added[] = extractName($mod);
                    elseif($type == "Updated")
                            $updated[] = extractName($mod);
                    elseif($type == "Removed")
                            $removed[] = extractName($mod);
            }

            $result = '';

            if(count($updated) > 3) {
                    $updated = shuffle($updated);
                    $result .= 'Updated ' . formatMod($updated[0],$version) . ', ' . formatMod($updated[1],$version) . ', and ' . (string)(count($updated)-2) . ' other mods... ';
            } elseif(count($updated) > 1) {
                    $last = array_pop($updated);
                    $addedlist = array();
                    foreach($updated as &$mod)
                            $addedlist[] = formatMod($mod,$version);
                    $result .= 'Updated ' . implode(', ',$addedlist) . ' and ' . formatMod($last,$version) . '. ';
            } elseif(count($updated) == 1) {
                    $result .= 'Updated ' . formatMod($updated[0],$version) . '. ';
            }

            if(count($added) > 3) {
                    $updated = shuffle($added);
                    $result .= 'Added ' . formatMod($added[0],$version) . ', ' . formatMod($added[1],$version) . ', and ' . (string)(count($added)-2) . ' other mods... ';
            } elseif(count($added) > 1) {
                    $last = array_pop($added);
                    $addedlist = array();
                    foreach($added as &$mod)
                            $addedlist[] = formatMod($mod,$version);
                    $result .= 'Added ' . implode(', ',$addedlist) . ' and ' . formatMod($last,$version) . '. ';
            } elseif(count($added) == 1) {
                    $result .= 'Added ' . formatMod($added[0],$version) . '. ';
            }

            if(count($removed) > 3) {
                    $updated = shuffle($removed);
                    $result .= 'Removed ' . formatMod($removed[0],$version) . ', ' . formatMod($removed[1],$version) . ', and ' . (string)(count($removed)-2) . ' other mods... ';
            } elseif(count($removed) > 1) {
                    $last = array_pop($removed);
                    $addedlist = array();
                    foreach($removed as &$mod)
                            $addedlist[] = formatMod($mod,$version);
                    $result .= 'Removed ' . implode(', ',$addedlist) . ' and ' . formatMod($last,$version) . '. ';
            } elseif(count($removed) == 1) {
                    $result .= 'Removed ' . formatMod($removed[0],$version) . '. ';
            }

            return $result;
    }
}

if(!function_exists('formatMod')) {
    function formatMod($mod,$version) {
            return '<a href="/version/'.$version.'/#'.tagformat($mod).'">'.$mod.'</a>';
    }
}

if(!function_exists('extractName')) {
    function extractName($line) {
            preg_match('#\"(.*?)\"#', $line, $match);
            return $match[1];
    }
}

if(!function_exists('tagformat')) {
    function tagformat($data) {
            return strtolower(PREG_REPLACE("/[^0-9a-zA-Z]/i", '', $data));
    }
}
