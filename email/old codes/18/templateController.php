<?php
include_once("./lib/class/template_mysql_pdo.php");


$conn = new mysql_pdo();
$action = $_POST["action"];
unset($_POST["action"]);

if($action=="server_action"){
	$data = $_POST;
	$data["action"] = $data["server_action"];
	unset($data["server_action"]);
	$conn->server_action($data);
}

if($action=="getCreativeList"){
	echo json_encode($conn->getCreativeList($_POST));
}
if($action=="getCreativeLink_Offer"){
	echo json_encode($conn->getCreativeLink_Offer($_POST));
}
if($action=="getTemplateList"){
	echo json_encode($conn->getTemplateList($_POST));
}

if($action=="getTemplate"){
	echo json_encode($conn->getTemplate($_POST));
}



