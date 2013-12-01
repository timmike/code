<?php
require_once('./class/track_request_pdo.php');

$action = $_POST['action'];
unset($_POST["action"]);

$conn = new mysql_pdo();
if($action == 'insert') $result = $conn->insertLinkid($_POST);
if($action == 'update') $result = $conn->updateLinkid($_POST);





