<?php

// Specify the path to your log file
$logFilePath = __DIR__.'/log.txt';

// Check if the file exists, and if not, create it
if (!file_exists($logFilePath)) {
    touch($logFilePath); // Create an empty file
}

$date_time = "Date Time Now: ".date("Y-m-d H:i:s")."\n";
$timestamp = microtime(true);
$milliseconds = round(($timestamp - floor($timestamp)) * 1000); // Extract milliseconds

$dateWithMilliseconds = date('Y-m-d H:i:s') . '.' . str_pad($milliseconds, 3, '0', STR_PAD_LEFT);

$str_to_log = $date_time.$dateWithMilliseconds;

file_put_contents($logFilePath, $str_to_log . PHP_EOL, FILE_APPEND);