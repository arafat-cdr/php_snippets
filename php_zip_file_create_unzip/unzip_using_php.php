<?php
function unzip_it($file, $folder){
    $zip = new ZipArchive;
    $res = $zip->open($file);
    if ($res === TRUE) {
      $zip->extractTo($folder);
      $zip->close();
      echo 'done <br/>';
    } else {
      echo 'Failed ! <br/>';
    }
}

$zip_arr = array(
    'part-01.zip',
    'part-02.zip',
    'part-03.zip',
    'part-04.zip',
    'part-06.zip',
    'part-05-01.zip',
    'part-05-02.zip',
    'part-05-03.zip',
    'part-05-04.zip',
    'part-05-06.zip',
    'part-05-07.zip',
    'part-05-08.zip',
);

foreach($zip_arr as $v){
    unzip_it($v, __DIR__);
}