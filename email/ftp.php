<?php

class ftp extends Database
{
	private $user;
	
	private $host;
	
	private $password;
	
	private $ftp;
	
	private $conn_id;
	
	public function __construct($ftp)
	{
		$this->user = $ftp['user'];
		
		$this->password = $ftp['password'];
		
		$this->host = $ftp['host'];
		
		$this->ftp = array('user'=>$ftp['user'], 'password'=>$ftp['password'], 'host'=>$ftp['host']);
		
		$this->conn_id = ftp_connect($this->host) or die("Couldn't connect to ".$this->host);
		
		if (!@ftp_login($this->conn_id, $this->user, $this->password)) {
    	echo "Couldn't connect as $ftp_user\n";
			exit;
		}
		
	}
	
	public function get_conn_id()
	{
		return $this->conn_id;
	}
	
	public function upload($dir, $handle, $creative_id)
	{

		if (!ftp_chdir($this->conn_id, "public_html/mailing-server/templates")) {
    		echo "Counld'nt changed directory " . ftp_pwd($conn_id) . "\n";
		}
				
		ftp_pasv($this->conn_id,TRUE);
		
		if (!ftp_chdir($this->conn_id, $creative_id)) {
  			ftp_mkdir($this->conn_id, $creative_id);
			ftp_chdir($this->conn_id, $creative_id);
		} 

		if (!ftp_put($this->conn_id, $dir, 'mailing-server/templates/'.$creative_id.'/'.$dir, FTP_ASCII)) {
    	echo "There was a problem while uploading $file\n";
			exit;
		} 
		exit;
	}
	
	public function upload_links($link_id, $dir)
	{
		if (!ftp_chdir($this->conn_id, "public_html/domain-server/links")) {
    	echo "Counld'nt changed directory " . ftp_pwd($conn_id) . "\n";
		}
		
		ftp_pasv($this->conn_id,TRUE);
		
		if (!ftp_chdir($this->conn_id, $link_id)) {
  			ftp_mkdir($this->conn_id, $link_id);
			ftp_chdir($this->conn_id, $link_id);
		}
		

		
		if (!ftp_put($this->conn_id, $dir, 'domain-server/links/'.$link_id.'/'.$dir, FTP_BINARY)) {
    		echo "There was a problem while uploading $file\n";
			exit;
		} 
	}


	public function transfer($file)
	{
		ftp_pasv($this->conn_id,TRUE);
		if (!ftp_put($this->conn_id, 'public_html/mailing-server/'.$file, $file, FTP_BINARY)) {
    		echo "There was a problem while uploading $file\n";
			exit;
		} 
	}

}


?>