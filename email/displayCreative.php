<?php
ini_set('display_errors', 1);
if(!empty($_GET['campagin_id'])){
	$campagin_id = $_GET['campagin_id'];
}
?>


<form action="Creative.php" method="post">
	<input type="hidden" name="campagin_id" value="<?php echo $campagin_id; ?>" />
	<input type="text" name="name"/>
	<input type="submit" name="submitcreative"/>
</form>

<?php
require_once('Creative.php');

$rows = creative::display_campagin_id($campagin_id);


echo '<table border="1">
<tr><td>id</td><td>campagin</td><td>name</tr>';
if(!empty($rows)){
	foreach($rows as $key => $value){
		echo '<tr>';
		foreach($value as $key => $vv){
			echo '<td>'.$vv.'</td>';			
		}
		echo '</tr>';
	}
}
echo '</table>

<a href="index.php">Back to Campagins</a>';


?>