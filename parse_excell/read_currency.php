<?php

require(__DIR__."/vendor/autoload.php");

use Shuchkin\SimpleXLSX;

function pr($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}


// -------------------------------------------------------

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);


// echo '<h1>XLSX to HTML</h1>';

if (isset($_FILES['file'])) {
    if ($xlsx = SimpleXLSX::parse($_FILES['file']['tmp_name'])) {

        $dim = $xlsx->dimension();
        // $cols = $dim[0]-1; // fix the script issue
        $cols = $dim[0];

        $all_currency_arr = array();

        foreach ($xlsx->readRows() as $k => $r) {

            // pr( $r );
            if ($k == 0) continue; // skip first row

            # writing arr

            $all_currency_arr[$r[0]] = array(
                'code'   => $r[1],
                'countryname' => $r[0],
                'currencyname' =>  $r[0].' '.$r[1],
                'symbol' => $r[2],
               );

            for ($i = 0; $i < $cols; $i ++) {
               pr( $r[ $i ] );

            }
        }

     // $my_json =  json_encode( $all_currency_arr );

     $content = $all_currency_arr;
     $fp = fopen("myTextArr.txt","wb");
     fwrite($fp,$content);
     fclose($fp);

    } else {
        echo SimpleXLSX::parseError();
    }
}
// echo '<h2>Upload form</h2>
// <form method="post" enctype="multipart/form-data">
// *.XLSX <input type="file" name="file"  />&nbsp;&nbsp;<input type="submit" value="Parse" />
// </form>';
