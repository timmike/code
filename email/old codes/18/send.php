<?php
	include_once('./lib/class/mysql_pdo.php');
	$ch = curl_init();
	$url = 'http://198.154.212.226/sendMail/send-pickup.php';
	$db = new mysql_pdo();
	//$data = array();
	$data = $_POST;

	$data["accessCode"] = 'VjJ0a1lXSnNjRWhYYlRWaFVqRndkVmRyWkdGaWJIQklWMVF3UFE9PQ==';
	$data["from"] = $db->getSelectedDomains("from");
	$data["redir"] = $db->getSelectedDomains("redir");
	$data["ip"] = $db->getSelectedDomains("ip");
	encode_json($data);

	// You can POST a file by prefixing with an @ (for <input type="file"> fields)
	$handle = curl_init($url);
	curl_setopt($handle, CURLOPT_POST, true);
	curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
	curl_exec($handle);

	function encode_json(&$data){
		foreach($data as $key => $array){
			if(is_array($array)) $data[$key] = json_encode($data[$key]);
		}
	}
