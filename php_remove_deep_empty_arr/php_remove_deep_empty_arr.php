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

