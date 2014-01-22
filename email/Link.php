<?php

require_once('init.php');

require_once('campagins.php');

class link extends campagins
{
	private $id;
	
	private $creative_id;
	
	private $link;
	
	private $name;
	
	private $links;
	
	private $date_submitted;
	
	private $tmp_name;
	
	public function __construct($the_link)
	{
		$this->setTable('link');
		
		if(!empty($the_link['creative_id']))
			$this->creative_id = $the_link['creative_id'];	
		
		if(!empty($the_link['tmp_name']))
			$this->tmp_name = $the_link['tmp_name'];
		
		if(!empty($the_link['link']))
			$this->link = $the_link['link'];
		
		if(!empty($the_link['name']))
			$this->name = $the_link['name'];
		
		if(!empty($the_link['date_submitted']))
			$this->date_submitted = $the_link['date_submitted'];
		
		$this->links = array('creative_id' => $this->creative_id, 
			'name'=>$this->name, 'link'=>strtolower($this->link), 'date_submitted'=>$this->date_submitted);		
	}
	
	public function upload()
	{
		$dir  = 'domain-server/links/'.$this->id.'/';
		if(!is_dir($dir))
			mkdir($dir, 0700);				
		move_uploaded_file($this->tmp_name, $dir.strtolower($this->links['link']));
		
		$ftp = (array('ftp'=>array('user'=>'timike', 'password'=>'ieZ4r-Hlx1am', 
                'host'=>'50.87.144.118')));
		$factory =new Factory($ftp);
    $ftp= $factory->get_obj();
		
		$ftp->upload_links($this->id, strtolower($this->links['link']));
                                
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"http://timmike1831.com/domain-server/index.php");
    curl_setopt($ch, CURLOPT_POST, 1);                
    curl_setopt($ch, CURLOPT_POSTFIELDS, "link=".$this->name."&link_id=".$this->id."");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $server_output = curl_exec ($ch);
      curl_close ($ch);
		
	}
	
	public function get_link()
	{
		return $this->links;
	}
	
	public function set_id($the_id)
	{
		$this->id = $the_id;
	}
	
}

if(!empty($_POST['submit_link'])){
	$link = array('name'=>$_POST['name'], 'creative_id'=>$_POST['creative_id'], 
   'link'=>$_FILES['image']['name'], 'date_submitted'=>date('Y-m-d H:i:s'), 'tmp_name'=>$_FILES['image']['tmp_name']);
	$link = new link($link);
	$id = $link->insert($link->get_link());
	$link->set_id($id);
	$link->upload();
	header("location:displayLink.php?creative_id=".$_POST['creative_id']."");
	exit;
}

?>