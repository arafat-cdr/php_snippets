<?php
# code by arafat | arafat.dml@gmail.com
# find in fiverr.com/web_lover
# web_lover in fiverr
# Buy Script form http://simplerscript.com

if( !function_exists('pr') ){
	function pr($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}

if(!function_exists('get_ip')){
	function get_ip(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		      return $_SERVER['HTTP_CLIENT_IP'];
		  }
		  else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		      return $_SERVER['HTTP_X_FORWARDED_FOR'];
		  }
		  else {
		      return $_SERVER['REMOTE_ADDR'];
		  }
	}
}

if( !function_exists('get_data_from_ip') ){
	function get_data_from_ip($ip = NULL, $dump = false){
		  
		// Use JSON encoded string and converts
		// it into a PHP variable
		$ipdat = @json_decode(file_get_contents(
		    "http://www.geoplugin.net/json.gp?ip=" . $ip));

		if($dump){
			pr($ipdat);
		}

		return $data = array(
			"country" => $ipdat->geoplugin_countryName ? $ipdat->geoplugin_countryName : NULL,
			"city" 	  => $ipdat->geoplugin_city ? $ipdat->geoplugin_city : NULL,
			"continent" =>  $ipdat->geoplugin_continentName ? $ipdat->geoplugin_continentName : NULL,
		);
	}
}

$ip = get_ip();

$ip_data = get_data_from_ip($ip,1);

pr($ip_data);