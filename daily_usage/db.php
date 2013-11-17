<?php

/**
 * MySQLi database; only one connection is allowed. 
 */
class Database {
  private $_connection;
  // Store the single instance.
  private static $_instance;
  
	protected $table;
  /**
   * Get an instance of the Database.
   * @return Database 
   */
  public static function getInstance() {
    if (!self::$_instance) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }
  
  /**
   * Constructor.
   */
  public function __construct() {
    $this->_connection = new mysqli('localhost', 'root', '', 'data');
    // Error handling.
    if (mysqli_connect_error()) {
      trigger_error('Failed to connect to MySQL: ' . mysqli_connect_error(), E_USER_ERROR);
    }
  }
  
  /**
   * Empty clone magic method to prevent duplication. 
   */
  private function __clone() {}
	
	
	public function display()
	{
		
	}
	
	public function inserting($fields)
	{
		$q = ' insert into '.$this->table.'(';
		
		$cols = '';
		$values = '';
		
		if(!empty($fields)){
			
			foreach($fields as $col => $value){
				$cols .= $col.',';
				$values .= $value.',';
			}
			
			$cols = rtrim($cols, ",");
			$values = rtrim($values, ",");
			
			$q .= $cols .')' .'values('.$values.')';
			
		  $db = self::getInstance();
    	$mysqli = $this->getConnection();

			$mysqli->query($q);
			
			if($mysqli->error){
				echo 'exeuction failed';
				exit;	
			}
			
		}
		
		
	}
  
  /**
   * Get the mysqli connection. 
   */
  public function getConnection() {
    return $this->_connection;
  }
}