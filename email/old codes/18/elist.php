<?php

server_action($_POST);

	function server_action($data){
		$ch = curl_init();
		$ip = '198.154.212.226';
		$url = "http://$ip/sendMail/eListController.php";
		$handle = curl_init($url);
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
		curl_exec($handle);
	}