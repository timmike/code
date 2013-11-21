<?php
/**
 * object-oriented creational design pattern to implement the 
 * concept of factories and deals with the problem of creating objects 
 * (products) without specifying the exact class of object that will be created. 
 * The essence of this pattern is to "Define an interface for creating an object
 */
 
require_once('db.php');
class Factory
{
	/**
 * objects data
 * get_object_var can be used all object data
 */
	private $data;
	
 /**
 * To create an instance of a class, the new keyword must be used
 */
	private $obj;

	
	public function __construct($the_data)
	{
	  /**
     * objects data
     * get_object_var can be used all object data
     */
     		
		if(!empty($the_data)){
			$this->data = $the_data;
			$function = key($this->data);
			
			require_once($function.'.php');
			/**
 			 * To create an instance of a class, the new keyword must be used
 			 */
			$this->obj = new $function($this->data[$function]);
			 /**
 			 * When an exception is thrown, code following the statement will not be executed,
			  *  and PHP will attempt to find the first matching catch block.
			  *  If an exception is not caught, a PHP Fatal Error will be issued with an "Uncaught Exception .
			  *  .." message, 
			  * unless a handler has been defined with
 			 */
			if(!is_object($this->obj)){
				throw new Exception('Object creation failed.');
			}
		}
	}
		
	public function get_obj()
	{
		return $this->obj;
	}
}




?>