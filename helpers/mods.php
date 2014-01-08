<?php

if(!function_exists('time_ago')) {
    /**
     * Converts Unix timestamp into time ago
     * @param int $tm Past Unix timestamp
     * @param type $rcs How many units are appended to the result
     * @return string
     */
    function time_ago($tm,$rcs = 0) {
        $cur_tm = time(); $dif = $cur_tm-$tm;
        $pds = array('second','minute','hour','day','week','month','year','decade');
        $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
        for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

        $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
        if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
        return $x;
    }
}

if(!function_exists('safehtml')) {
    /**
     * Filters a string for safe use in HTML outputs
     * @param string $string The unsafe string
     * @return string
     */
    function safehtml($string) {
        return htmlspecialchars($string,ENT_QUOTES);
    }
}

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
                    shuffle($updated);
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
                    shuffle($added);
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
                    shuffle($removed);
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
            return '<a href="/version/'.$version.'#'.tagformat($mod).'">'.$mod.'</a>';
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
