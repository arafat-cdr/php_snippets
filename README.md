### PHP Code Snippets

### Php Remove Deep Empty Array From Arr

```php

<?php


function removeEmptyValuesAndSubarrays($array){
   foreach($array as $k=>&$v){
        if(is_array($v)){
            $v=removeEmptyValuesAndSubarrays($v);  // filter subarray and update array
            if(!sizeof($v)){ // check array count
                unset($array[$k]);
            }
        }elseif(!strlen($v)){  // this will handle (int) type values correctly
            unset($array[$k]);
        }
   }
   return $array;
}



```

### Create a Php Log File Quickly

```php
<?php

// Specify the path to your log file
$logFilePath = __DIR__.'/log.txt';

// Check if the file exists, and if not, create it
if (!file_exists($logFilePath)) {
    touch($logFilePath); // Create an empty file
}

$str_to_log = 'This is a log Test';

file_put_contents($logFilePath, $str_to_log . PHP_EOL, FILE_APPEND);


```

### Php Get Current Url

```php

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

```

