<?php

require_once('init.php');

require_once('campagins.php');

class link extends campagins
{
	private $id;
	
	private $creative_id;
	
	private $file_name;
	
	private $name;
	
	private $tmp_name;
	
	private $link;
	
	public function __construct($the_link)
	{
		$this->setTable('link');
					
		$this->tmp_name = $the_link['tmp_name'];
		
		$this->creative_id = $the_link['creative_id'];
		
		$this->file_name = $the_link['file_name'];
		
		$this->name = $the_link['name'];
		
		$this->link = array('creative_id' => $this->creative_id, 
			'name'=>$this->name, 'file_name'=>strtolower($this->file_name));		
	}
	
	public function upload()
	{
		$dir  = 'links/'.$this->id.'/';
		mkdir($dir, 0700);
		move_uploaded_file($this->tmp_name, $dir.'/'.strtolower($this->link['file_name']));
	}
	
	public function get_link()
	{
		return $this->link;
	}
	
	public function set_id($the_id)
	{
		$this->id = $the_id;
	}
	
}

if(!empty($_POST['submitlink'])){
	$link = array('name'=>$_POST['name'], 'creative_id'=>$_POST['creative_id'], 
   'file_name'=>$_FILES['image']['name'], 'tmp_name'=>$_FILES['image']['tmp_name']);
	$link = new link($link);
	$id = $link->insert($link->get_link());
	$link->set_id($id);
	$link->upload();
	header("location:displayLink.php?creative_id=".$_POST['creative_id']."");
	exit;
}

?>