<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (function_exists("curl_init")) {
		if (!$_GET["test"] != null) {
			header( "HTTP/1.1 301 Moved Permanently" );
			header( "Location: http://www.google.com/ncr" );
		} else {
			echo 'Hello Opera Mini Server! Fuck GFW!';
		}
	} else {
		echo 'cURL is not enabled.';
	}
} else {
	$curlInterface = curl_init();
	$headers[] = 'Connection: Keep-Alive';
	$headers[] = 'content-type: application/xml';
	$headers[] = 'User-Agent: Java0';
	curl_setopt_array($curlInterface, array(
		CURLOPT_URL => 'http://server4.operamini.com',
		CURLOPT_HTTPHEADER => $headers,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => @file_get_contents('php://input'))
    );
	$result = curl_exec($curlInterface);
	curl_close($curlInterface);
	header('Content-Type: application/octet-stream');
	header('Cache-Control: private, no-cache');
	echo $result;
}
?>
