<?php
ini_set('display_errors', 1);
if(!empty($_GET['campagin_id'])){
	$campagin_id = $_GET['campagin_id'];
}
?>

<h2>Creatives</h2>

<form action="Creative.php" method="post">
	<input type="hidden" name="campagin_id" value="<?php echo $campagin_id; ?>" />
	<input type="text" name="name"/>
	<input type="submit" name="submitcreative"/>
</form>

<?php

require_once('init.php');

require_once('Creative.php');

creative::setTable('creative');
$rows = creative::displayByField(array('campagin_id'=>$campagin_id));

echo '<table border="1">
<tr><td>id</td><td>campagin</td><td>name</td></tr>';
if(!empty($rows)){
	foreach($rows as $key => $value){
		echo '<tr>';
		foreach($value as $key => $vv){
			if($key == 'id'){
				echo '<td><a href="displayLink.php?creative_id='.$vv.'">'.$vv.'</td></a>';
			}
			else{
				echo '<td>'.$vv.'</td>';
			}		
		}
		echo '</tr>';
	}
}
echo '</table>

<a href="index.php">Back to Campagins</a>';


?>