<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	  <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://www.jewelryroom.com/js/jquery-1.4.2.min.js"></script>
</head>
<body>
	
	<div id="g_id_onload"
	     data-client_id="919548478256-8smnh4e46t1vki997j9fmi711mcsj6ii.apps.googleusercontent.com"
	     data-context="signin"
	     data-ux_mode="popup"
	     data-callback="google_response"
	     data-auto_prompt="false">
	</div>

	<div class="g_id_signin"
	     data-type="standard"
	     data-shape="rectangular"
	     data-theme="outline"
	     data-text="signin_with"
	     data-size="large"
	     data-logo_alignment="left">
	</div>	

	 <script>
	        function decodeJwtResponse(token) {
	            var base64Url = token.split(".")[1];
	            var base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
	            var jsonPayload = decodeURIComponent(
	                atob(base64)
	                .split("")
	                .map(function(c) {
	                    return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
	                })
	                .join("")
	            );

	            return JSON.parse(jsonPayload);
	        }

	        function google_response(response) {

	            console.log(response);

	            const responsePayload = decodeJwtResponse(response.credential);

	            console.log('Main is: '+JSON.stringify(responsePayload));

	            console.log("ID: " + responsePayload.sub);
	            console.log('Full Name: ' + responsePayload.name);
	            console.log('Given Name: ' + responsePayload.given_name);
	            console.log('Family Name: ' + responsePayload.family_name);
	            console.log("Image URL: " + responsePayload.picture);
	            console.log("Email: " + responsePayload.email);

	            $.ajax({
							type: "POST",
							url: "google_login/ajax.php",
							data: "id=" + responsePayload.sub + '&email=' + responsePayload.email + '&firstname=' + responsePayload.given_name + '&lastname=' + responsePayload.family_name + "&t=" + new Date().getTime(),
							dataType: "json",
							beforeSend: function(XMLHttpRequest) {},
							success: function(data, textStatus) {
								//console.log(data);return false;


								if (data['register_first']) {
									location.href = 'register_success.php';
									return false;
								}

								if (data['error']) {
									alert(data['error']);
									return false;
								}

								if (data['success']) {
									location.href = 'index.php';
								} else {
									alert('error');
								}
							},
							error: function() {},
							cache: false
						});

	        }
	    </script>
</body>
</html>