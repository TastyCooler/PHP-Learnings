<?php

//Require_once only includes a file once! This is the Database.class
require_once('accountManager.php');

//This Class is the User
class USER
{

	private $conn;

	//Creates a PDO instance representing a connection to a database
	public function __construct()
	{
		$database = new Database();
		//dbConnection() is from Database.class
		$db = $database->dbConnection();
		$this->conn = $db;
  }

	// Creates a query
	public function runQuery($sql)
	{
		//Prepares a statement for execution and returns a statement object
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	//The Register function of the User
	public function register($uname,$umail,$upass)
	{
		try
		{
			//creates a new password hash using a strong one-way hashing algorithm // PW_DEFAULT=> Uses the bcrypt algorithm
			$new_password = password_hash($upass, PASSWORD_DEFAULT);

			//Prepares the registration statement. // INSERTS the data into DB="users" with the given VALUES
			$stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass)
		                                               VALUES(:uname, :umail, :upass)");

			//Bindparam() => Binds a parameter to the specified variable name
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);

			//Executes the statement
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			//Error Handling
			echo $e->getMessage();
		}
	}

	//Login Function
	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			//Prepares the Statement // GETS the Login Information from DB
			$stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_name=:uname OR user_email=:umail ");
			//Executes the statement
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));

			// Fetches the next row from a result set
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC); // FETCH_ ASSOCH returns an array indexed by column name as returned in your result set

			//rowCount() Returns the number of rows affected by the last SQL statement
			if($stmt->rowCount() == 1)
			{
				//Verifies that a password matches a hash
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	//Logged in Sesssion Checker
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	//Redirection function
	public function redirect($url)
	{
		//Header send a raw HTTP header
		header("Location: $url");
	}

	//Logout Session Function
	public function doLogout()
	{
		//Destroys all data registered to a session
		session_destroy();
		//Deletes the array element
		unset($_SESSION['user_session']);
		return true;
	}
}
?>
