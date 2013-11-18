<?php

ini_set('display_errors', 1);
require_once('init.php');


$domains = array("domains"=> array());
$factory = new Factory($domains);

Database::setTable("domains");
$rows= domains::display();


?>


<form action="campagins.php" method="post">
	Campain<br />
	Name
	<input type="text" name="Name"/><br />
  Advertiser
	<input type="text" name="Advertiser"/><br />
	Network
	<input type="text" name="Network"/><br />
	Offer
	<input type="text" name="Offer"/><br />
	Domain
	<input type="text" name="Domain"/><br />
	Cluster
	<input type="text" name="Cluster"/><br />
	<input type="submit" />
	
</form>