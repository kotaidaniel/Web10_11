<!DOCtype html>
<html>
<head>
<meta charset="UTF-8">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}
td{
	font-size: 40px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
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
	function query(){
		$sql = "SELECT * from products";
		$result = $this->conn->query($sql);
		var_dump($result);
		
	}
	function close(){
		$this->conn->close();		
	}
	function kiiratas(){
		$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		mysqli_set_charset($this->conn,"utf8");
		$sql = "SELECT * from products";
		$result = $this->conn->query($sql);
		?>
		<table>
		<tr>
		<th>Megnevezés</th>
		<th>Leírás</th>
		<th>Kép</th>
		<th>Ár</th>
		</tr>
		
		<?php
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				if($row["prod_price"] > 2000){
						echo "<tr><td>".$row["prod_name"]."</td><td>".$row["prod_desc"]."</td><td><img src='".$row["prod_pic"]."' style='width:300px;height:300px;'></td><td bgcolor='#FF0018'>".$row["prod_price"]."</td></tr>";
					}
				else{
						echo "<tr><td>".$row["prod_name"]."</td><td>".$row["prod_desc"]."</td><td><img src='".$row["prod_pic"]."' style='width:300px;height:300px;'></td><td>".$row["prod_price"]."</td></tr>";
				}
			}
		}
		else{
			echo "Nincs pc";
		}
		?>
		
		</table>
		<?php
	}
	function atlag(){
		$ossz = 0;
		$i = 0;
		$atlag = 0;
		$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		mysqli_set_charset($this->conn,"utf8");
		$sql = "SELECT * from products";
		$result = $this->conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ossz += $row["prod_price"];
					$i++;
				}
			}
			$atlag = $ossz / $i;
			echo "Az átlag ára a számítógépeknek: ".$atlag;
			
	}
}

	$dbInstance = new dbManager();
	$dbInstance->connect();
	$dbInstance->query();
	$dbInstance->kiiratas();
	$dbInstance->atlag();
	$dbInstance->close();

?>
</body>
</html>
