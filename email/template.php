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
		
		if(!empty($template['creative_id']))
      $this->creative_id = $template['creative_id'];
		
		if(!empty($template['name'])) 
		 $this->name = $template['name'];		
		
		$this->des = $template['template'];
		
		$this->template = array('creative_id' => $this->creative_id, 'name'=>$this->name);
		
		if(!empty($template['templates']))
       $this->templates =  $template['templates'];
		
	}
		
	public function get_template()
	{
		return $this->template;
	}
	
	public function upload()
	{				
		$dir  = 'mailing-server/templates/'.$this->creative_id.'/';
		
		if(!is_dir($dir))
			mkdir($dir, 0777);
		
		$handle = fopen($dir.$this->creative_id.'_'.$this->name.'_'.$this->id.'.tpl', 'w') 
				or die('Cannot open file:  ');		
		fwrite($handle, $this->des); 
					
		fclose($handle);
		
		$ftp = (array('ftp'=>array('user'=>'timike', 'password'=>'ieZ4r-Hlx1am', 
            'host'=>'50.87.144.118')));
            $factory =new Factory($ftp);
                
    $ftp= $factory->get_obj();
		
		$ftp->upload($this->creative_id.'_'.$this->name.'_'.$this->id.'.tpl', $handle, $this->creative_id);
    fclose($handle);
	}
	
	public function set_id($the_id)
	{
		$this->id = $the_id;
	}
	
	public function get_file_names_by_creative_id($creative_id)
	{
		$dir  = 'mailing-server/templates/'.$this->creative_id.'/';
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
                $dir  = 'mailing-server/templates/'.$this->creative_id.'/'.$this->name;
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
                
                $ftp = (array('ftp'=>array('user'=>'timike', 'password'=>'ieZ4r-Hlx1am', 
                'host'=>'50.87.144.118')));
                $factory =new Factory($ftp);
                $ftp= $factory->get_obj();
                $ftp->save_template($dir, $handle, $this->creative_id, $this->name);        
        }
	
	public function load_file()
	{
		$file = 'mailing-server/templates/'.$this->creative_id.'/'.$this->name;
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
		$arrayobject = new ArrayObject($domains);
		$iterator = $arrayobject->getIterator();
		$count_domain = $iterator->count();
		$counter_domain =0;
		
		$factory_2 = new Factory(array('fromdomains'=>array()));
		$obj_2 = $factory_2->get_obj();
				
		$domains_2 = $obj_2::displayByField(array('is_selected'=>'"1"'));		
		$arrayobject_2 = new ArrayObject($domains_2);
		$iterator_2 = $arrayobject_2->getIterator();
		$count_domain_2 = $iterator_2->count();
		$counter_domain_2 =0;
				
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
	
	
	     public function test($test_account)
        {
                $xml = new DOMDocument("1.0");
                $root = $xml->createElement("data");
                $xml->appendChild($root);
                
                $templates = $xml->createElement("templates");
                $root->appendChild($templates);
                
                if(!empty($this->templates)){
                        foreach($this->templates as $value){
                                $template = $xml->createElement('template');
                                $name = $xml->createElement("name");
                                $name_text = $xml->createTextNode($value);
                                $name->appendChild($name_text);
                                $template->appendChild($name);
                                $templates->appendChild($template);
                        }
                }
                
                $root->appendChild($templates);
                
                $test_a = $xml->createElement("test_account");
                $acc = $xml->createTextNode($test_account);
                $test_a->appendChild($acc);
                $root->appendChild($test_a);
                
                $creative_id = $xml->createElement("creative_id");
                $c = $xml->createTextNode($this->creative_id);
                $creative_id->appendChild($c);
                $root->appendChild($creative_id);
                
                $redirdomains = $xml->createElement("redirdomains");
                $root->appendChild(        $redirdomains);
                
                $factory = new Factory(array('redirdomains'=>array()));
                $obj = $factory->get_obj();        
                $domains = $obj::displayByField(array('is_selected'=>'"1"'));
                foreach($domains as $domain){
                        $do = $xml->createElement("domain");
                        $name = $xml->createTextNode($domain['name']);
                        $do->appendChild($name);
                        $redirdomains->appendChild($do);
                }
                
                $fromdomains = $xml->createElement("fromdomains");
                $root->appendChild($fromdomains);
                $factory_2 = new Factory(array('fromdomains'=>array()));
                $obj_2 = $factory_2->get_obj();                                
                $domains_2 = $obj_2::displayByField(array('is_selected'=>'"1"'));
                foreach($domains_2 as $domain){
                        $do = $xml->createElement("domain");
                        $name = $xml->createTextNode($domain['name']);
                        $do->appendChild($name);
                        $fromdomains->appendChild($do);
                }
                
                                                
                $xml->formatOutput = true;
                $xml->save("test.xml") or die("Error");
                
                
                $ftp = (array('ftp'=>array('user'=>'timike', 'password'=>'ieZ4r-Hlx1am', 
                'host'=>'50.87.144.118')));
                $factory =new Factory($ftp);
                
                $ftp= $factory->get_obj();
                $ftp->transfer('test.xml');
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,"http://timmike1831.com/mailing-server/test.php");                                                                                                                                    
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
                $server_output = curl_exec ($ch);                
                echo "Test sucessfully.";
								return true;

                
        }

public function send($seed, $send_account, $domain_select)
        {
                $xml = new DOMDocument("1.0");
                $root = $xml->createElement("data");
                $xml->appendChild($root);
                
                $templates = $xml->createElement("templates");
                $root->appendChild($templates);
                
                if(!empty($this->templates)){
                        foreach($this->templates as $value){
                                $template = $xml->createElement('template');
                                $name = $xml->createElement("name");
                                $name_text = $xml->createTextNode($value);
                                $name->appendChild($name_text);
                                $template->appendChild($name);
                                $templates->appendChild($template);
                        }
                }
                
                $root->appendChild($templates);
                
                $creative_id = $xml->createElement("creative_id");
                $c = $xml->createTextNode($this->creative_id);
                $creative_id->appendChild($c);
                $root->appendChild($creative_id);
        
                                
                $send_a = $xml->createElement("send_account");
                $c = $xml->createTextNode($send_account);
                $send_a->appendChild($c);
                $root->appendChild($send_a);
                
                $seed_a = $xml->createElement("seed");
                $c = $xml->createTextNode($seed);
                $seed_a->appendChild($c);
                $root->appendChild($seed_a);
                
                $domain_a = $xml->createElement("domain_select");
                $c = $xml->createTextNode($domain_select);
                $domain_a->appendChild($c);
                $root->appendChild($domain_a);
                
                $redirdomains = $xml->createElement("redirdomains");
                $root->appendChild(        $redirdomains);
                
                $factory = new Factory(array('redirdomains'=>array()));
                $obj = $factory->get_obj();        
                $domains = $obj::displayByField(array('is_selected'=>'"1"'));
                foreach($domains as $domain){
                        $do = $xml->createElement("domain");
                        $name = $xml->createTextNode($domain['name']);
                        $do->appendChild($name);
                        $redirdomains->appendChild($do);
                }
                
                $fromdomains = $xml->createElement("fromdomains");
                $root->appendChild($fromdomains);
                $factory_2 = new Factory(array('fromdomains'=>array()));
                $obj_2 = $factory_2->get_obj();                                
                $domains_2 = $obj_2::displayByField(array('is_selected'=>'"1"'));
                foreach($domains_2 as $domain){
                        $do = $xml->createElement("domain");
                        $name = $xml->createTextNode($domain['name']);
                        $do->appendChild($name);
                        $fromdomains->appendChild($do);
                }
                
                                                
                $xml->formatOutput = true;
                $xml->save("send.xml") or die("Error");
                
                
                $ftp = (array('ftp'=>array('user'=>'timike', 'password'=>'ieZ4r-Hlx1am', 
                'host'=>'50.87.144.118')));
                $factory =new Factory($ftp);
                
                $ftp= $factory->get_obj();
                $ftp->transfer('send.xml');
                
                if($domain_select == 'gmail.com'){
                        $ftp->transfer('gmail.txt');
                }
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,"http://timmike1831.com/mailing-server/send.php");                                                                                                                              
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
                $server_output = curl_exec ($ch);
                echo "Send sucessfully.";
								return true;
                
        }
	
}


if(!empty($_POST['creative_new_template'])){
	$template = array('creative_id' => $_POST['creative_id'], 'name'=> $_POST['name'],'template'=>$_POST['template']);
	$template = new templates($template);
	$id = $template->insert($template->get_template());
	$template->set_id($id);
	$template->upload();
	header("location: displayTemplates.php");
	exit;
}
else if(!empty($_POST['update_template']))
{     
 	$creative_id = $_POST['creative_id'];
  $template_name = $_POST['templates'];
  $template = $_POST['template'];                
  $template = array('creative_id'=>$creative_id, 'name'=>$template_name, 'template'=>$template);
  $template = new templates($template);
  $template->update_template();
  header("location: displayTemplates.php");
  exit;
        
}
else if(!empty($_GET['submit']) && $_GET['submit'] == 'get_templates_creative_ID'){
	$creative_id = $_GET['creative_id'];
	$template = array('creative_id'=>$creative_id, 'name'=>null, 'template'=>null);
	$template = new templates($template);
	$template->get_file_names_by_creative_id($creative_id);
}
else if(!empty($_GET['templ']) && $_GET['templ'] == 'get_template_by_name'){
	$name = $_GET['name'];
	$creative_id = $_GET['creative_id'];
	$template = array('creative_id'=>$creative_id, 'name'=>$name, 'template'=>null);
	$template = new templates($template);
	$template->load_file();
}
else if(!empty($_POST['Test'])){
	$creative_id = $_POST['creative_id'];
	$templates = $_POST['templates'];
	$test_account = $_POST['test_account'];
	$template = array('creative_id'=>$creative_id, 'templates'=>$templates);
	$template = new templates($template);
  $template->test($test_account);
	header("location: displayTestSend.php");
	exit;
}
else if(!empty($_POST['Send'])){
	$creative_id = $_POST['creative_id'];
	$templates = $_POST['templates'];
	$send_account = $_POST['send_account'];
	$template = array('creative_id'=>$creative_id, 'templates'=>$templates);
	$template = new templates($template);
	$domain_select = $_POST['domain_select'];
	$seed = $_POST['seed'];
  $template->send($seed, $send_account, $domain_select);
	header("location: displayTestSend.php");
	exit;
}





?>