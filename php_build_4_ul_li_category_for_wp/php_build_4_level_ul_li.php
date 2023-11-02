<?php

function pr( $data ){
    echo '<pre>';
    print_r($data);
    echo '<pre>';
}


// $html = buildNestedList($yourArray);
// echo $html;

function build_4_level_cat($arr){

    $new_arr = array();

    if( $arr ){
        
        foreach( $arr as $k => $v ){

            # All level
            $level_one = $level_two = $level_three = $level_four = '';

            if( isset( $v[0] ) ){
                $level_one = strtolower( str_replace(' ', '_',  $v[0]) );            
            }

            if( isset( $v[1] ) ){
                $level_two = strtolower( str_replace(' ', '_',  $v[1]) );            
            }

            if( isset( $v[2] ) ){
                $level_three = strtolower( str_replace(' ', '_',  $v[2]) );            
            }

            if( isset( $v[3] ) ){
                $level_four = strtolower( str_replace(' ', '_',  $v[3]) );            
            }

            ############################################################
            // pr('One--> '.$level_one);
            // pr('two--> '.$level_two);

            // pr('Three--> '.$level_three);

            // pr('Four--> '.$level_four);

            ############################################################

            # Assign the Arr
            if( !isset($new_arr[$level_one]) ){
                $new_arr[$level_one] = array();
            }
            if( $level_one && !isset( $new_arr[$level_one]['child'] ) ){
                $new_arr[$level_one]['child'] = array();
            }
            if( !isset( $new_arr[$level_one]['child'][$level_two] ) ){
                $new_arr[$level_one]['child'][$level_two] = array();
            }
            # end Assign Arr

            if( $level_one && !in_array($v[0], $new_arr[$level_one]) ){
                $new_arr[$level_one]['data'] = $v[0]; 
            }


            # Define the Arr
           
           
            if( !isset( $new_arr[$level_one]['child'][$level_two]['data'] ) ){
                $new_arr[$level_one]['child'][$level_two]['data'] = array();
            }
            if( !isset( $new_arr[$level_one]['child'][$level_two]['child'] ) ){
                $new_arr[$level_one]['child'][$level_two]['child'] = array();
            }

            # end Define

            if( $level_two && !in_array( $v[1], $new_arr[$level_one]['child'][$level_two] ) ){
                $new_arr[$level_one]['child'][$level_two]['data'] = $v[1];
            }

            if( $level_three && !in_array( $v[2], $new_arr[$level_one]['child'][$level_two]['child'] ) ){
                $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['data'] = $v[2];
            }

            # Define The Arr

            if( !isset( $new_arr[$level_one]['child'][$level_two]['child'] ) ){
                $new_arr[$level_one]['child'][$level_two]['child'] = array();
            }
            if( !isset( $new_arr[$level_one]['child'][$level_two]['child'][$level_three] ) ){
                $new_arr[$level_one]['child'][$level_two]['child'][$level_three] = array();
            }
            if( !isset( $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['data'] ) ){
                $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['data'] = array();
            }
            if( !isset( $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['child'] ) ){
                $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['child'] = array();
            }

            if( !isset( $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['child'][$level_four] ) ){
                $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['child'][$level_four] = array();
            }
            if( !isset( $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['child'][$level_four]['child'] ) ){
                $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['child'][$level_four]['child'] = array();
            }

            # End Define the Arr

            if( $level_four && !in_array( $v[3], $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['child'][$level_four] ) ){
                $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['child'][$level_four]['data'] = $v[3];
            }

            if( $level_four && !in_array( $v[3], $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['child'][$level_four]['child'] ) ){
                $new_arr[$level_one]['child'][$level_two]['child'][$level_three]['child'][$level_four]['child'] = array();
            }



            
        }

        // ksort($new_arr);
        // pr($new_arr);
    }

    return $new_arr;
}



function build_4_ul_li_cat($new_arr){

    // pr( $new_arr );

    $ul_li = '';
    if( $new_arr ){

        foreach( $new_arr as $k => $v ){
            
            $level_1 = $v['data'];
            $ul_li .= "\n\t<li>";
            $ul_li .= $level_1;

            if( isset( $v['child'] ) ){

                 $ul_li .= "\n\t\t<ul>";

                foreach( $v['child'] as $kk => $vv ){

                    $level_2 = $vv['data'];

                    $ul_li .= "\n\t\t\t<li>";
                    $ul_li .= $level_2;

                    if( isset( $vv['child'] ) ){

                        $ul_li .= "\n\t\t\t\t<ul>";
                        // pr( $vv['child'] );
                        foreach( $vv['child'] as $kkk => $vvv ){

                            // pr( $vvv['data'] );

                            $level_3 = $vvv['data'];

                            if( $level_3 ){

                                $ul_li .= "\n\t\t\t\t\t<li>";
                                $ul_li .= $level_3;

                                if( isset( $vvv['child'] ) ){
                                    $ul_li .= "\n\t\t\t\t\t\t<ul>";
                                    
                                    foreach( $vvv['child'] as $kkkk => $vvvv ){

                                        if( isset($vvvv['data']) ){
                                            $level_4 = $vvvv['data'];

                                            $ul_li .= "\n\t\t\t\t\t\t\t<li>";
                                            $ul_li .= $level_4;

                                            # End of li
                                            $ul_li .= "\n\t\t\t\t\t\t\t</li>\n";
                                        }
                                        
                                    }
                                    # End of li
                                    $ul_li .= "\n\t\t\t\t\t\t</ul>\n";
                                }
                                # End of li
                                $ul_li .= "\n\t\t\t\t\t</li>\n";
                            }
                        
                        }
                        $ul_li .= "\n\t\t\t\t</ul>";


                    }
                    

                    # End of li
                    $ul_li .= "\n\t\t\t</li>\n";

                }

                 $ul_li .= "\n\t\t</ul>";

            }



            # end of li
           $ul_li .= "\n\t</li>\n";


        }

    }

    return $ul_li;

}


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

$arr = array(
    array('Akcesoria', 'Kluczyki', 'Brelok do kluczy', ''),
    array('Akcesoria', 'Kluczyki', 'Etui na Kluczyk', ''),
    array('Akcesoria', 'Haki Holownicze i Akcesoria', ''),
    array('Akcesoria', 'Latarki', ''),

    array('Garaż i narzędzia', 'Obsługa Elektroniki', ''),
    array('Garaż i narzędzia', 'Obsługa Elektroniki', 'Kabelki i akcesoria', ''),
    array('Garaż i narzędzia', 'Obsługa Elektroniki', 'Naprawa elektroniki', ''),
    array('Garaż i narzędzia', 'Obsługa Elektroniki', 'Rurki kurczące', ''),
    array('Hamulce', 'Klocki hamulcowe', 'Zestaw klocków', 'Przód', ''),
);

$res = build_4_level_cat( $arr );

// pr( $res );

$res = removeEmptyValuesAndSubarrays($res);

// pr($res);

// die("die here");

$ul_li = build_4_ul_li_cat( $res );

echo '<ul>'.$ul_li.'</ul>';