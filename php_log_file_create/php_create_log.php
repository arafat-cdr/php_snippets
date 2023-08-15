<?php

$logFilePath = storage_path('logs/cron_log.txt');
# or
// $logFilePath = __DIR__."storage/public/logs/cron_log.txt";

file_put_contents($logFilePath, $message . PHP_EOL, FILE_APPEND);

$message = 'cron called at ' . now()->toDateTimeString();

// Open the log file in append mode and write the message
file_put_contents($logFilePath, $message . PHP_EOL, FILE_APPEND);