<?php
	include_once('./lib/class/mysql_pdo.php');
	$ch = curl_init();
	$url = "http://www.mydealstoday.info/sendMail/send-pickup.php";
	
	$db = new mysql_pdo();
	$data = array();
	
	//$data = array("accessCode"=>"sendnow","data"=>"testdata");
	$data[]["from"] = $db->getSelectedDomains("from");
	$data[]["redir"] = $db->getSelectedDomains("redir");
	$data[]["redir"] = $db->getSelectedDomains("redir");
	$data = array();
	$data["from"] = $db->getSelectedDomains("from");

$data = array("from"=> json_encode($db->getSelectedDomains("from")));

	// You can POST a file by prefixing with an @ (for <input type="file"> fields)
	
	$handle = curl_init($url);
	curl_setopt($handle, CURLOPT_POST, true);
	curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
	curl_exec($handle);

	
