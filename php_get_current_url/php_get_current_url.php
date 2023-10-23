<?php

## Or Get the Full Page
$page_url  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// http://localhost/wp_fb_feeds/shop/?my-ajax-nonce=18a2e81436&_wp_http_referer=%2Fwp_fb_feeds%2Fshop%2F%3Fmy-ajax-nonce%3D18a2e81436%26wl_year%3D2006%26wl_make%3DBMW%26wl_model%3D130%2Bi%26wl_chassis%3DE87%26wl_engine%3DN46B20B%26wl_supplement%3D306D5&wl_year=2004&wl_make=BMW&wl_model=420+d&wl_chassis=F32&wl_engine=B38B15A&wl_supplement=306D3
echo "Current URL: " . $page_url;

// Php Get Base Url Only
// http://localhost/wp_fb_feeds/shop/

$url_arr = parse_url($page_url);
pr( $url_arr );

$base_url_only = $url_arr['scheme'].'://'.$url_arr['host'].$url_arr['path'];

