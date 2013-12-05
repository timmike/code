<?php

/**
 * MySQLi database; only one connection is allowed. 
 */
class Database {
  private $_connection;
  // Store the single instance.
  private static $_instance;
	
	protected static $_table;

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
    $this->_connection = new mysqli('localhost', 'root', '', 'sandbox');
    // Error handling.
    if (mysqli_connect_error()) {
      trigger_error('Failed to connect to MySQL: ' . mysqli_connect_error(), E_USER_ERROR);
    }
  }
  
  /**
   * Empty clone magic method to prevent duplication. 
   */
  private function __clone() {}
  
  /**
   * Get the mysqli connection. 
   */
  public function getConnection() {
    return $this->_connection;
  }
	
	public function getTable()
	{
		return self::$_table;
	}
	
	public static function setTable($the_table)
	{
		self::$_table = $the_table;
	}
	
	public static function display()
	{
		$result = mysqli_query(self::getInstance()->getConnection(), 'select * from '.self::$_table.'');
		$res = array();
		for($i=0; $i<$result->num_rows; $i++){
			$rows = mysqli_fetch_array($result,MYSQL_ASSOC);
			$res[] = $rows;
		}
		return $res;
	}
	

	
	
	public static function insert($fields)
	{
		$q = ' insert into '.strtolower(self::$_table).'(';
		$keys = array_keys($fields);
		foreach($keys as $vv){
			$q .= strtolower($vv).',';
		}
		$q = rtrim($q, ",");
		$q .= ')values(';
		
		$values = array_values($fields);
		foreach($values as $vv){
			$q .= '"'.strtolower($vv).'",';
		}
		$q = rtrim($q, ",");
		$q .= ')';
					
		mysqli_query(self::getInstance()->getConnection(), $q);
		return mysqli_insert_id(self::getInstance()->getConnection());
	}
	
	public static function displayByField($field)
	{
		$key = array_keys($field);
		$value = array_values($field);
		
		$q = 'select * from ' . self::$_table.'
		where '.$key[0].' = '.$value[0].'
		 order by id desc';
		
		$result = mysqli_query(self::getInstance()->getConnection(), $q);
		
		$res = array();
		for($i=0; $i<$result->num_rows; $i++){
			$rows = mysqli_fetch_array($result,MYSQL_ASSOC);
			$res[] = $rows;
		}
		return $res;
	}
	
}