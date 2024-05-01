### PHP Code Snippets

### Php Remove Deep Empty Array From Arr

```php

<?php

// https://stackoverflow.com/questions/9895130/recursively-remove-empty-elements-and-subarrays-from-a-multi-dimensional-array

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


```

### Php Get --Document Root--current url -- Base url
    ** Remember This should Write When The Server First Run
    ** That means It should Go Inside Root/index.php
    ** Other wise It will result False Positive

```php
<?php


public function document_root(){

    $documet_root = $_SERVER['DOCUMENT_ROOT'];

    // remove laravel public folder if it is running from public
    $documet_root = str_replace('public', '', $documet_root);

    return $documet_root;
}

public function current_url(){
    $page_url  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    return $page_url;
}

public function get_base_url(){

 // Get the document root
 $documentRoot = rtrim($_SERVER['DOCUMENT_ROOT'], '/');

 // Get the directory of the current script
 $currentDirectory = rtrim(__DIR__, '/');

 // Check if the current directory is the same as the document root
 if ($documentRoot === $currentDirectory) {
    echo '<br/>  root <br/>';
      // Get the protocol (HTTP or HTTPS)
         $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

         // Get the host (domain)
         $host = $_SERVER['HTTP_HOST'];

         // Concatenate the protocol, host, and optionally the port number
         $baseURL = $protocol . '://' . $host;

         return $baseURL;
 } else {
    echo '<br/> subfolder <br/>';
      // Get the current URL
      $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      // Parse the URL
      $urlParts = parse_url($currentURL);

      // Reconstruct the base URL
      $baseURL = $urlParts['scheme'] . '://' . $urlParts['host'] . dirname($urlParts['path']) . '/';

     return $baseURL;
 }


}



```


### Php Modify a Php/Any File Programitically

```php
<?php

// Adjust this path if your wp-config.php is in a different location
$file_path = ABSPATH . 'wp-config.php'; 

// Read the contents of the wp-config.php file
$config_content = file_get_contents($file_path);

$str_to_write = 'define("DISABLE_WP_CRON", true);';

if (strpos($config_content, $str_to_write) !== false) {
    echo "<br/>The line is already present in the string.";

} else {
    echo "<br/>The line is not present in the string.";
    # Now Write Back the String
    $config_data = str_replace( '<?php', '<?php'."\n\n".$str_to_write, $config_content);
    file_put_contents($file_path, $config_data);
}


```

### Php var_export
    
    * The var_export() function outputs or returns structured information about a variable.
    * If set to true, it returns the variable representation instead of outputting it
    * This function works similar to var_dump(), except that the returned value for this function is valid PHP code.

### Code
```php
// Code
<?php
$array = array(
    'name' => 'John',
    'age' => 30,
    'city' => 'New York'
);

$exported_array = var_export($array, true);

echo "Original Array:\n";
print_r($array);

echo "\nExported Array:\n$exported_array\n";


```

### Result

```php

Original Array:
Array
(
    [name] => John
    [age] => 30
    [city] => New York
)

Exported Array:
array (
  'name' => 'John',
  'age' => 30,
  'city' => 'New York',
)



```