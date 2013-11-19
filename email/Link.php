<?php

require_once('campagins.php');

class link extends campagins
{
	private $id;
	
	private $creative_id;
	
	private $name;
	
	private $address;
	
	private $tmp_name;
	
	private $link;
	
	public function __construct($the_link)
	{
		$this->setTable('link');
		$this->link = array('creative_id' => $the_link['creative_id'], 
			'name'=>$the_link['name'], 'file_name'=>strtolower($the_link['file_name']));
		$this->tmp_name = $the_link['tmp_name'];
		$this->id = $this->insert($this->link);
		$this->upload();
	}
	
	public function upload()
	{
		$dir  = 'links/'.$this->id.'/';
		mkdir($dir, 0700);
		move_uploaded_file($this->tmp_name, $dir.'/'.strtolower($this->link['file_name']));
	}
	
	public static function display_creative_id($creative_id)
	{
	  $result = mysqli_query(parent::getInstance()->getConnection(), 
		'select * from link
		where creative_id = '.$creative_id.'
		order by id desc');
		
		$res = array();
		for($i=0; $i<$result->num_rows; $i++){
			$rows = mysqli_fetch_array($result,MYSQL_ASSOC);
			$res[] = $rows;
		}
		return $res;
	}
	
}

if(!empty($_POST['submitlink'])){
	$link = array('name'=>$_POST['name'], 'creative_id'=>$_POST['creative_id'], 
   'file_name'=>$_FILES['image']['name'], 'tmp_name'=>$_FILES['image']['tmp_name']);
	$link = new link($link);
	header("location:displayLink.php?creative_id=".$_POST['creative_id']."");
	exit;
}

?>