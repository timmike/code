<?php

ini_set('display_errors', 1);
require_once('init.php');


$domains = array("domains"=> array());
$factory = new Factory($domains);

Database::setTable("domains");
$rows= domains::display();


?>

<h2>Campagin</h2>
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
	<input type="submit" name="submit_campagin" />
	
</form>

<?php
$camp = array("campagins"=> array());
$factory = new Factory($camp);
$cam = $factory->get_obj();
$camps = $cam->display();

echo '<table border="1">
<tr><td>id</td><td>campagin name</td>
<td>advertiser</td><td>network</td><td>domain</td><td>cluster</td><td>offer</td></tr>';
if(!empty($camps)){
	foreach($camps as $key => $value){
		echo '<tr>';
		foreach($value as $key => $vv){
			if($key == 'id'){
				echo '<td><a href="displayCreative.php?campagin_id='.$vv.'">'.$vv.'</td></a>';
			}
			else{
				echo '<td>'.$vv.'</td>';
			}
		}
		echo '</tr>';
	}
}
echo '</table>';
exit;

?>