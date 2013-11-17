<?php

	$ch = curl_init();
	$url = "http://www.mydealstoday.info/sendMail/templateController.php";
	$data = $_POST;
	
	// You can POST a file by prefixing with an @ (for <input type="file"> fields)
	
	$handle = curl_init($url);
	curl_setopt($handle, CURLOPT_POST, true);
	curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
	curl_exec($handle);
