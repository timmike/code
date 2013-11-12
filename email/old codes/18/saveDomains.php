<?php 
include_once("./lib/class/mysql_pdo.php");
$db = new mysql_pdo();
$domains = $db->saveDomain($_POST);

//echo json_encode($_POST);
?>


