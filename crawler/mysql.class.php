<?php
/**
	application : API Waktu Solat Jakim
	rev : 1.0-0
	filename : dbase.class.php
	date : 07/10/05
	last update : 07/10/05
	author : me@kayrules.com
	description : database class function
*/

class Mysql {

	var $conn;
	var $dbname;
	var $host;
	var $user;
	var $pass;

	function __construct($db,$hst="localhost",$usr="root",$pwd="") {
		$this->dbname = $db;
		$this->host = $hst;
		$this->user = $usr;
		$this->pass = $pwd;
		$this->db_connect();
	}

	function db_connect(){
		$this->conn = mysqli_connect($this->host,$this->user,$this->pass);
		mysqli_select_db($this->conn, $this->dbname) or die(mysqli_error()." : ".mysqli_errno());
	}

	function db_close(){
		mysqli_close($this->conn);
	}

	function db_insert($query){
		mysqli_query($this->conn, $query) or die(mysqli_error()." : ".mysqli_errno());
	}

	function db_update($query){
		mysqli_query($this->conn, $query) or die(mysqli_error()." : ".mysqli_errno());
	}

	function db_drop($query){
		mysqli_query($this->conn, $query) or die(mysqli_error()." : ".mysqli_errno());
	}

	function db_create($query){
		mysqli_query($this->conn, $query) or die(mysqli_error()." : ".mysqli_errno());
	}

	function db_delete($query){
		mysqli_query($this->conn, $query) or die(mysqli_error()." : ".mysqli_errno());
	}

	function db_select($query){
		$result = mysqli_query($this->conn, $query) or die(mysqli_error()." : ".mysqli_errno());
		$rows = mysqli_fetch_array($result);
		mysqli_free_result($result);
		return $rows;
	}

	/** example usage of db_assoc();
	$row = $db->db_assoc("SELECT * FROM multiple_choice WHERE mc_date='$dt'");
	while (list($key, $rw) = @each($row)) { $rw['fieldname']; }
	or
	$row[0]['fieldname'];
	*/
	function db_assoc($query){
		$result = mysqli_query($this->conn, $query) or die(mysqli_error()." : ".mysqli_errno());
		while ($line = mysqli_fetch_assoc($result)){
		 	$value[] = $line;
		}
		return $value;
	}

	function db_result($query){
		$result = mysqli_query($this->conn, $query) or die(mysqli_error()." : ".mysqli_errno());
		return $result;
	}

	function db_num_rows($query){
		$result = mysqli_query($this->conn, $query) or die(mysqli_error()." : ".mysqli_errno());
		$rows = mysqli_num_rows($result);
		return $rows;
	}


}//end class Mysql
?>
