<?php

ini_set('display_errors', 1);

require_once('init.php');


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
$camps = $cam::display();

$factory = new Factory(array('fromdomains'=>array()));
$fromdomains = $factory->get_obj();
$fromdos = $fromdomains::display();

echo '<pre>';
print_r($fromdos);
echo '</pre>';

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
?>
<h2>FromDomain</h2>
<form action="fromdomains.php" method="POST">
<?php
if(!empty($fromdos)){
	foreach($fromdos as $value){
		echo '<input name="fromdomains['.$value["id"].']" type="checkbox" ';
		if($value['is_selected'] == '1'){
			echo ' checked= checked ';
		}		
		echo '/>'.$value['name'].'<br />';
	}
}
?>
<br />
<input type="submit" value="submit" name="submit_from_domains"/>
</form>

<br />



