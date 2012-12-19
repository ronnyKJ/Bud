<?php
class Database{
	private static $connection = null;
	private static $dbName = '';

	static function connect($host, $name, $password){
		self::$connection = mysql_connect($host, $name, $password);
		if (!self::$connection){
			die('Could not connect: '.mysql_error());
		}
	}

	static function close(){
		mysql_close(self::$connection);
	}

	static function creatDatabase($dbName){
		if (mysql_query("CREATE DATABASE $dbName", self::$connection)){
			self::$dbName = $dbName;
			return true;
		}else{
			//mysql_error();
			return false;
		}	
	}

	static function createTable($name, $colsStr){
		mysql_select_db(self::$dbName, self::$connection);
		$sql = "CREATE TABLE Persons ($colsStr)";
		mysql_query($sql, self::$connection);
	}

	static function selectDatabase($name){
		self::$dbName = $name;
		mysql_select_db($name, self::$connection);
	}

	static function execute($sqlStr){
		$data = array();
		$result = mysql_query($sqlStr, self::$connection);
		while($row = mysql_fetch_array($result)){
			$data[] = $row;
		}
		return $data;		
	}
}
?>