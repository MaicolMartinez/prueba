<?php 

class Database{
	public static function connect(){
		$db = new mysqli('localhost','root','','biblioteca232');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}

 ?>