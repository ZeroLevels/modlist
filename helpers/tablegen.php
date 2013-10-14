<?php

if(!function_exists('filter_sort')) {
    function filtersort($data) {
        return PREG_REPLACE("/[^0-9a-zA-Z]/i", '', $data);
    }
}

if(!function_exists('dependTag')) {
    function dependTag($name) {
            $name = str_replace(' Compatible','',$name);
            $name = str_replace(' Required','',$name);
            return filtersort(strtolower($name));
    }
}
if(!function_exists('authorParse')) {
    function authorParse($authors) {
            if(count($authors) == 1)
                    return $authors[0];
            else {
                    $last = array_pop($authors);
                    return implode(', ',$authors) . ' &amp; ' . $last;
            }
    }
}

if(!function_exists('authorParseAllComma')) {
    function authorParseAllComma($authors) {
            if(count($authors) == 1)
                    return $authors[0];
            else {
                    return implode(', ',$authors);
            }
    }
}

if(!function_exists('loadMod')) {
    function loadMod($name,$author) {
            $mods = readJSON();
            foreach ($mods as &$mod) {
                    if($mod->name == $name && authorParse($mod->author) == $author) {
                            $mod->parsedauthors = authorParseAllComma($mod->author);
                            return $mod;
                    }
            }
            return false;
    }
}