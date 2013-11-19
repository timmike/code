<?php
ini_set('display_errors', 1);
if(!empty($_GET['creative_id'])){
	$creative_id = $_GET['creative_id'];
}

?>

<h2>Links</h2>

<form action="Link.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="creative_id" value="<?php echo $creative_id; ?>" />
	name or decription<input type="text" name="name"/>
  image<input type="file" name="image"/>
	<input type="submit" name="submitlink"/>
</form>

<?php

require_once('link.php');

$rows = link::display_creative_id($creative_id);


echo '<table border="1">
<tr><td>id</td><td>cretaive id</td><td>name</td><td>image</td></tr>';
if(!empty($rows)){
	foreach($rows as $key => $value){
		echo '<tr>';
		foreach($value as $key => $vv){
			if($key == 'file_name'){
				$file_path = './links/'.$value['id'].'/'.$value['file_name'];
				echo '<td><a href="fileServe.php?file_path='.$file_path.'" target="_blank"><img src="fileServe.php?file_path='.$file_path.'" width="64" height="64" /></a></td>';
			}
			else
				echo '<td>'.$vv.'</td>';
		}
		echo '</tr>';
	}
}
echo '</table><a href="index.php">Back to Campagins</a>';

?>