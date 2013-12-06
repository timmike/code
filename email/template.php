<?php
/*singleton design pattern*/
require_once('db.php');

require_once('init.php');

class templates extends Database
{
	
	private $id;
	
	private $creative_id;
	
	private $name;
	
	private $template = array();
	
	private $des;
	
	public function __construct($template)
	{
		parent::setTable('template');
		
		$this->creative_id = $template['creative_id'];		
		
		$this->name = $template['name'];		
		
		$this->des = $template['template'];
		
		$this->template = array('creative_id' => $this->creative_id, 'name'=>$this->name);
		
	}
		
	public function get_template()
	{
		return $this->template;
	}
	
	public function upload()
	{
		$ftp = (array('ftp'=>array('user'=>'timike', 'password'=>'ieZ4r-Hlx1am', 
		'host'=>'50.87.144.118')));
		$factory =new Factory($ftp);
		
		$ftp= $factory->get_obj();
		
		$dir  = 'mailing-server/templates/'.$this->creative_id.'/';
		
		if(!is_dir($dir))
			mkdir($dir, 0777);
		
		$handle = fopen($dir.$this->creative_id.'_'.$this->name.'_'.$this->id.'.tpl', 'w') 
		or die('Cannot open file:  ');		
		fwrite($handle, $this->des); 
		$ftp->upload($this->creative_id.'_'.$this->name.'_'.$this->id.'.tpl', $handle, $this->creative_id);
		
		fclose($handle);
	}
	
	public function set_id($the_id)
	{
		$this->id = $the_id;
	}
	
	public function get_file_names_by_creative_id($creative_id)
	{
		$dir  = 'templates/'.$this->creative_id.'/';
		$this->creative_id = $creative_id;
		if(is_dir($dir)){
			$files = scandir($dir);
			unset($files[0]);
			unset($files[1]);
			$files[0] = file_get_contents($dir.$files[2]);
			$files = json_encode($files);
			echo $files;		
		}
		else{
			$files = array();
			$files = json_encode($files);
			echo $files;
		}
	}
	
	public function update_template()
	{
		$dir  = 'templates/'.$this->creative_id.'/'.$this->name;
		if(file_exists($dir)){
			
			$handle = fopen($dir, 'w') 
			or die('Cannot open file:  ');		
			fwrite($handle, $this->des); 		
			fclose($handle);
				
		}
		else{
			echo 'File does not exists. Please tell Tian or Mike';
			exit;
		}		
	}
	
	public function load_file()
	{
		$file = 'templates/'.$this->creative_id.'/'.$this->name;
		if(file_exists($file)){
			$content = file_get_contents($file);
			$res = array($content);
			$res = json_encode($res);		
			echo $res;
		}
	}
	
	public function send_emails($total)
	{		
		$factory = new Factory(array('redirdomains'=>array()));
		$obj = $factory->get_obj();	
		$domains = $obj::displayByField(array('is_selected'=>'"1"'));
		
		
		$data = array("name" => "Hagrid", "age" => "36");                                                                    
		$data_string = json_encode($data);                                                                                   
 


		$tt = $domains[0];
		//print_r($tt);
		$data_string = json_encode($tt);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://timmike1831.com/mailing-server/send.php");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    		'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($data_string))                                                                       
		);
			$server_output = curl_exec ($ch);
			echo '<pre>';
		print_r($server_output);
		echo '</pre>';
		
		                                      
		exit;
		

		$factory_2 = new Factory(array('fromdomains'=>array()));
		$obj_2 = $factory_2->get_obj();				
		$domains_2 = $obj_2::displayByField(array('is_selected'=>'"1"'));

		
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"http://timmike1831.com/mailing-server/send.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "redir=".$domains."&fromdir=".$domains_2."");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);
		
		echo '<pre>';
		print_r($server_output);
		echo '</pre>';
		
		exit;
				
		for($i=0; $i<$total; $i++)	{
			
			$this->template['template']= $this->des;
			
			$domain = $iterator->current();
			$domain = $domain['name'];
			
			$domain_2 = $iterator_2->current();
			$domain_2 = $domain_2['name'];
			
			$this->template['template'] = preg_replace('/\[redirdomain\]/', $domain, $this->template['template']);	
			$this->template['template'] = preg_replace('/\[fromdomain\]/', $domain_2, $this->template['template']);			
			$this->template['template'] = preg_replace('/\[seednum\]/', $i, $this->template['template']);		
			
			$matches = array();
			preg_match('/token\=[0-9]+/', $this->template['template'], $matches);
			preg_match('/[0-9]+/', $matches[0], $matches);
			
			$factory_3 = new Factory(array('link'=>array()));
			$link_obj = $factory_3->get_obj();
			$link = $link_obj::displayByField(array('id'=>$matches[0]));
			$this->template['template'] = preg_replace('/\[rand[0-9]*\]/', $link[0]['name'], $this->template['template']);
			
			echo '<textarea rows="18" cols="64">';
			echo 	$this->template['template'];
			echo '</textarea>';
			
		
			$counter_domain++;
			
			$iterator->next();
			
			if($counter_domain == $count_domain){
				$iterator->rewind();
				$counter_domain=0;
			}
					
			$counter_domain_2++;
			
			$iterator_2->next();
			
			if($counter_domain_2 == $count_domain_2){
				$iterator_2->rewind();
				$counter_domain_2=0;
			}
		}
				
	}
	
	
	private function replacing($obj, $total, $var)
	{
		$factory = new Factory($obj);
		$obj = $factory->get_obj();
		
		$domains = $obj::displayByField(array('is_selected'=>'"1"'));
		$arrayobject = new ArrayObject($domains);
		$iterator = $arrayobject->getIterator();
		$count_domain = $iterator->count();
		$counter_domain =1;
				
		for($i=0; $i<$total; $i++)	{
			
			$domain = $iterator->current();
			$domain = $domain['name'];
		
			
			echo '<textarea rows="18" cols="64">';
			echo preg_replace('/\['.$var.'\]/', $domain, $this->template['template']);	
			echo '</textarea>';
			
			$iterator->next();

			if($counter_domain == $count_domain){
				$iterator->rewind();
				$counter_domain=1;
			}
			
			$counter_domain++;
			
		}
					
	}
	
}

if(!empty($_POST['submitTemplate'])){
	$template = array('creative_id' => $_POST['creative_id'], 'name'=> $_POST['name'],
	'template'=>$_POST['template']);
	$template = new templates($template);
	$id = $template ->insert($template->get_template());
	$template->set_id($id);
	$template->upload();
	header("location: displaytemplate.php");
}
else if(!empty($_GET['submit']) && $_GET['submit'] == 'ajax'){
	$creative_id = $_GET['creative_id'];
	$template = array('creative_id'=>$creative_id, 'name'=>null, 'template'=>null);
	$template = new templates($template);
	$template->get_file_names_by_creative_id($creative_id);
}
else if(!empty($_GET['templ']) && $_GET['templ'] == 'templ'){
	$name = $_GET['name'];
	$creative_id = $_GET['creative_id'];
	$template = array('creative_id'=>$creative_id, 'name'=>$name, 'template'=>null);
	$template = new templates($template);
	$template->load_file();
}
else if(!empty($_POST['send']))
{
	$creative_id = $_POST['templ'];
	$template_name = $_POST['template_name'];
	$template = $_POST['template'];
	$template = array('creative_id'=>$creative_id, 'name'=>$template_name, 'template'=>$template);
	$template = new templates($template);
	$template->send_emails(15);
}
else if(!empty($_POST['updateTemplate']))
{

	if(empty($_POST['templ'])){
		echo 'creative id is not given. Cant update';
	}
	if(empty($_POST['template_name'])){
		echo 'template name is not given. Cant update';
	}
	
	$creative_id = $_POST['templ'];
	$template_name = $_POST['template_name'];
	$template = $_POST['template'];
		
	$template = array('creative_id'=>$creative_id, 'name'=>$template_name, 'template'=>$template);
	$template = new templates($template);
	$template->update_template();
	header("location: displaytemplate.php");
	exit;
	
}





?>