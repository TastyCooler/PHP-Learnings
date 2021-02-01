<?php

//This Class Initiliazes the Database
class Database
{
    private $host = "localhost";
    private $db_name = "mydb";
    private $username = "root";
    private $password = "";
    public $conn;

    public function dbConnection()
	{
      //$this = this instance // "->" is used to access an object method or property
	    $this->conn = null;

      try
		{
      // PDO = PHP Data Objects for Databases
      // Creating a new PDO Class
      //setting Error Handling Attribute to throw Exceptions
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $exception)
		{
      //If there's an error show the error
      echo "Connection error: " . $exception->getMessage();
    }

    //returns the "Connection"/PDO
    return $this->conn;

    }
}

?>
