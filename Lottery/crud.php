<?php

include_once("db_connect.php");
include_once("winningNumbers.php");
/*
function __autoload($class_name){
		include "$class_name.php";
	}
*/

$dbClass = new db_connect();
$dbClass->setTable("superlotto-plus");

$dbClass->insert();

$winningNumbers = $dbClass->read();

echo json_encode($winningNumbers);

/*
foreach($winningNumbers as $winningNumber){
	echo $winningNumber["id"].'---'.$winningNumber["date"]. '--'.$winningNumber["number"];
	echo "<br />";
}
*/