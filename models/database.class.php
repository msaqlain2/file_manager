<?php

class database {
	public function connect() {
		try{
			$connect = new PDO('mysql:host=127.0.0.1;dbname=file_manager', 'root', '');
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $connect;
		}
		catch(PDOException $e) {
			echo " Connection Failed " . $e->getMessage();
		}
	}
}


