<?php

function pr($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

$api_key = 'API_GOES_HERE';

$api_url = 'https://api.getresponse.com/v3';

$params = array(
	'campaign' => array(
		// 'campaignId' => 'VudGO',
		'campaignId' => 'VudGO',
	),
	'email' => 'testme_arafat_api@gmail.com',
);

$params = json_encode( $params );


$url = $api_url . '/' . 'contacts';

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_ENCODING => 'gzip,deflate',
    CURLOPT_FRESH_CONNECT => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_TIMEOUT => 60,
    CURLOPT_HEADER => false,
    CURLOPT_USERAGENT => 'PHP GetResponse client 0.0.2',
    CURLOPT_HTTPHEADER => array('X-Auth-Token: api-key ' . $api_key, 'Content-Type: application/json')
);

# for post
$options[CURLOPT_POST] = 1;
$options[CURLOPT_POSTFIELDS] = $params;


$curl = curl_init();
curl_setopt_array($curl, $options);

$response = json_decode(curl_exec($curl));

curl_close($curl);

pr( $response );