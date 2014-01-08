<?php
require_once('./lib/class/track_request_pdo.php');

$request = $_GET["request"];
$split = explode('-', $request);

$linkid = $split[0];
$field = $split[1];

$processData["id"] = $linkid;
$processData["field"] = $field == '0' ? 'image' : 'address'; 

$conn = new mysql_pdo();
$conn->getLinkAsset($processData);

?>


