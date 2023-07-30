<?php

if( !function_exists('pr') ){
    function pr($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

function wl_get_open_ai_result_version_2( $question ){

	$api_key = "API_GOES_HERE";

	$questions = array(
	    "Give a suitable blog title post for this recipe or meal plan: ".$question,
	    "You are an expert in SEO. Give me blog tags seperated by commas For: ".$question,
	    "is this '{ $question }' in category of 'recipe', or 'meal plan', or 'not_valid_post' retun only the category name",
	);

	// parameters for the API request
	$prompt = "Answer the following questions:\n" . implode("\n", array_map(function($i, $q) { return ($i+1) . ". " . $q; }, array_keys($questions), $questions));
	$model = "text-davinci-002";
	$temperature = 0.5;
	$max_tokens = 50;
	// $n = count($questions);
	$n = 1;

	// pr( $prompt );
	// die();

	// construct API request
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/completions");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array(
	    "prompt" => $prompt,
	    "model" => $model,
	    "temperature" => $temperature,
	    "max_tokens" => $max_tokens,
	    "n" => $n,
	    "stop" => null
	)));
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    "Content-Type: application/json",
	    "Authorization: Bearer " . $api_key
	));

	// make API request and print answers
	$response = json_decode(curl_exec($ch), true);

	$response_text = $response['choices'][0]['text'];

	// pr( $response_text );

	$my_res = explode("\n", $response_text);

	$my_res = array_filter( $my_res ); // for removing empty array elements


	// Remove numbered markers from each element using array_map and preg_replace
	$elements = array_map(function($el) {
	    return preg_replace('/^[0-9]+\. /', '', $el);
	}, $my_res);

	// Print the resulting array


	// close cURL handle
	curl_close($ch);

	# New array keys
	$new_array_keys = array(
		'post_title',
		'post_tag',
		'post_category',
	);

	$new_arr = array_combine($new_array_keys, $elements);
	// pr($elements);

	return $new_arr;
}

$question = 'how to cook fish';

$res = wl_get_open_ai_result_version_2( $question );

pr( $res );