<?php


/*
* 

In PHP, you might choose to use file_get_contents('php://input') over $_POST in certain situations because they serve different purposes and are suitable for different use cases:

Raw Data Handling:

file_get_contents('php://input'): This function allows you to access the raw data sent in an HTTP request's body. It's particularly useful when you expect non-form data, such as JSON or XML, in the request body. It provides you with the raw, untouched content of the request, allowing you to manually parse and process it as needed.
$_POST: This superglobal is specifically designed for handling data submitted through HTML forms using the POST method. It automatically parses form-encoded data and makes it available as an associative array, where field names are keys and field values are values. It's convenient for handling standard HTML form submissions.
Content-Type Flexibility:

file_get_contents('php://input'): This method does not depend on the Content-Type header of the HTTP request. It allows you to handle various data formats, including JSON, XML, plain text, or binary data, without relying on the browser sending a specific Content-Type header.
$_POST: It works well with application/x-www-form-urlencoded and multipart/form-data content types, which are typical for HTML form submissions. If you receive content in other formats, like JSON, you would need to manually parse it using json_decode or other functions.
Fine-Grained Control:

file_get_contents('php://input'): This method provides more control over data processing. You can choose how to parse and validate the data according to your application's specific requirements.
$_POST: It automatically parses form data, which can be convenient for simple use cases but may not provide enough control for complex data processing scenarios.
In summary, you would use file_get_contents('php://input')

 when you need to handle raw, non-form data sent in the request body, or when you require more control and flexibility over how data is processed. On the other hand, $_POST is primarily designed for handling standard HTML form submissions and provides automatic parsing and access to form-encoded data. The choice between the two depends on the nature of the data you expect in your PHP script.

 ***/


function pr($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

if( isset( $_POST['btn'] ) ){
	$res = file_get_contents('php://input');

	pr( $res );

	parse_str($res, $res1);

	pr( $res1);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="" method="POST">
		<input type="text" name="name" value="Jon Doe">
		<input type="email" name="email" value="test@test.com">

		<input type="submit" name="btn">
	</form>
</body>
</html>