<?php
function createZipFromDirectory($directory, $zipFilename, $excludeDirs) {
    $zip = new ZipArchive();

    if ($zip->open($zipFilename, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
        die("Failed to create or open the zip file.");
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $file) {
        $filePath = $file->getPathname();

        $skipFile = false;
        foreach ($excludeDirs as $excludeDir) {
            if (strpos($filePath, $excludeDir) !== false) {
                $skipFile = true;
                break;
            }
        }

        if (!$skipFile) {
            if ($file->isDir()) {
                $zip->addEmptyDir(str_replace($directory . '/', '', $filePath . '/'));
            } else {
                $zip->addFile($filePath, str_replace($directory . '/', '', $filePath));
            }
        }
    }

    $zip->close();

    echo "Zip file created successfully.";

    if( file_exists($zipFilename) ){
           echo '<br/> Zip file found here';
       }else{
           echo '<br/>Zip file not Found';
       }

}

// Usage example
$data_today = date("Y-m-d");
$directory = __DIR__; // Current directory
$zipFilename = __DIR__ . '/'.$data_today.'-archive.zip'; // Full path to the zip file
$excludeDirs = array(
    "bkup",
    "open_ai",
    "ssh_php",
);

createZipFromDirectory($directory, $zipFilename, $excludeDirs);
