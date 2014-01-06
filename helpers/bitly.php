<?php

/*
 * Modlist helper
 */

namespace Modlist;

/**
 * Bit.ly abstraction for the modlist
 *
 * @author GrygrFlzr
 * @package Modlist
 */
class bitly {
    /**
     * Shorten a long link
     * @param string $url The link to be shortened
     */
    public static function shorten($url) {
        //Submit data to Bit.ly API
        $json_data = json_decode(file_get_contents(
                'https://api-ssl.bitly.com/v3/shorten?access_token=' . BITLY_TOKEN .
                '&longUrl=' . urlencode($url)
                , false), true);
        
        $output['link'] = $json_data['data']['url'];
        
        return $output;
    }
    
    /**
     * Expands a bit.ly link
     * @param string $url The bit.ly link to expand
     */
    public static function expand($url) {
        //Request info from Bit.ly API
        $info = json_decode(file_get_contents(
                'https://api-ssl.bitly.com/v3/info?access_token=' . BITLY_TOKEN .
                '&shortUrl=' . urlencode($url), false), true);

        $output['title'] = $info['data']['info'][0]['title'];
        
        //Request expanded URL from Bit.ly API
        $expand = json_decode(file_get_contents(
                'https://api-ssl.bitly.com/v3/expand?access_token=' . BITLY_TOKEN .
                '&shortUrl=' . urlencode($url), false), true);
        
        $output['link'] = $expand['data']['expand'][0]['long_url'];
        
        return $output;
    }
}
