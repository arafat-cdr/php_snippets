<?php

function pr($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

$img_to_download = 'https://www.dropbox.com/scl/fi/di32nzlyilcuiv9bruwe7/Nature__6.gif?rlkey=10kk11bvyaaj6b2x83wr3uviz&dl=0';

// Parse the URL to get its components
$url_components = parse_url($img_to_download);
// Get the filename from the path component

$path_parts = pathinfo($url_components['path']);
$img_name = $path_parts['basename'];


pr( $url_components );
pr( $path_parts );

echo "Image name: " . $img_name;
?>
