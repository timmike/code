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
		
		if(!empty($the_link['tmp_name']))			
			$this->tmp_name = $the_link['tmp_name'];
		
		if(!empty($the_link['creative_id']))
			$this->creative_id = $the_link['creative_id'];	
		
		if(!empty($the_link['file_name']))
			$this->file_name = $the_link['file_name'];
		
		if(!empty($the_link['file_name']))
			$this->name = $the_link['name'];
		
		$this->link = array('creative_id' => $this->creative_id, 
			'name'=>$this->name, 'file_name'=>strtolower($this->file_name));		
	}
	
	public function upload()
	{
		$ftp = (array('ftp'=>array('user'=>'timike', 'password'=>'ieZ4r-Hlx1am', 
		'host'=>'50.87.144.118')));
		$factory =new Factory($ftp);
		$ftp= $factory->get_obj();
		$dir  = 'links/'.$this->id.'/';
		mkdir($dir, 0700);
		move_uploaded_file($this->tmp_name, $dir.'/'.strtolower($this->link['file_name']));
		
		$ftp->upload_links($this->id, strtolower($this->link['file_name']));
		
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"http://timmike1831.com/index.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
            "link=".$this->name."&link_id=".$this->id."");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);
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