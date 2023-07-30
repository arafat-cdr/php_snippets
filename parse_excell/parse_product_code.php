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
        $cols = $dim[0];

        $product_code_arr = array();

        $servername = "localhost";
        $username = "root";
        $password = "123456";
        $dbname = "test_xs2qunal_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        foreach ($xlsx->readRows() as $k => $r) {
            //      if ($k == 0) continue; // skip first row

            echo '<tr>';
            for ($i = 0; $i < $cols; $i ++) {

                if( $r[ $i ] && ! in_array($r[ $i ], $product_code_arr) ){
                    $product_code_arr[] = $r[ $i ];

                    $code = $r[ $i ];

                   /* $sql = "INSERT INTO `wl_product_codes` (`code`)
                    VALUES ('$code')";

                    if ($conn->query($sql) === TRUE) {
                      echo "New record created successfully";
                    } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                    }*/

                }else if( $r[ $i ] ){
                    echo '<br/>duplicate is: '.$r[ $i ];
                }

                // echo '<td>' . ( isset($r[ $i ]) ? $r[ $i ] : '&nbsp;' ) . '</td>';
            }

            // die();
        }
        echo '</table>';

        pr( $product_code_arr );

    } else {
        echo SimpleXLSX::parseError();
    }
}
echo '<h2>Upload form</h2>
<form method="post" enctype="multipart/form-data">
*.XLSX <input type="file" name="file"  />&nbsp;&nbsp;<input type="submit" value="Parse" />
</form>';
