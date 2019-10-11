<?php
class dbManager{

	var $username = "root";
    var $password = "";
    var $dbname = "webshop";
    var $servername = "localhost";
	var $conn;

	function connect(){		
    $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
	

		if($this->conn->connect_error){
			die("fail".$this->conn->connect_error);
		}
	
	}
	function close(){
		$this->conn->close();		
	}
	function query(){
		$sql = "SELECT * from products";
		$result = $this->conn->query($sql);
		var_dump($result);
		
	}

}

	$dbInstance = new dbManager();
	$dbInstance->connect();
	$dbInstance->query();
	$dbInstance->close();

?>
