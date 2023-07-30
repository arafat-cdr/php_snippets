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


echo '<h1>XLSX to HTML</h1>';

if (isset($_FILES['file'])) {
    if ($xlsx = SimpleXLSX::parse($_FILES['file']['tmp_name'])) {
        echo '<h2>Parsing Result</h2>';
        echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';

        $dim = $xlsx->dimension();
        $cols = $dim[0]-1; // fix the script issue
        // $cols = $dim[0];

        foreach ($xlsx->readRows() as $k => $r) {
            //      if ($k == 0) continue; // skip first row

            $sku = is_numeric( $r[0] ) ? $r[0] : false;

            echo '<tr>';
            for ($i = 0; $i < $cols; $i ++) {
                if( $r[$i] ){
                    
                    echo '<td>' . ( isset($r[ $i ]) ? $r[ $i ] : '&nbsp;' ) . '</td>';     
                }
               
            }
            // additional 2 td
            echo "<td><div class='wl_img'>img src</div></td>";
            echo "<td>site price $sku</td>";
            // additional 2 td
            echo '</tr>';

            // die();
        }
        echo '</table>';
    } else {
        echo SimpleXLSX::parseError();
    }
}
echo '<h2>Upload form</h2>
<form method="post" enctype="multipart/form-data">
*.XLSX <input type="file" name="file"  />&nbsp;&nbsp;<input type="submit" value="Parse" />
</form>';
