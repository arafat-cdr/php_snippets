### PHP Code Snippets

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

echo "Current URL: " . $page_url;

```

