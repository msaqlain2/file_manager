<?php

class file_manager{

	public $connect;

	public function __construct() {
		require_once 'database.class.php';
		$db_config = new database();
		$this->connect = $db_config->connect();
	}

	public function createNewFolder($user_id, $directory_name, $created_at, $updated_at, $flg_delete) {
		try{
			$query = "INSERT INTO `directories` (user_id, directory_name, created_at, updated_at, flg_delete) VALUES 
			(:user_id, :directory_name, :created_at, :updated_at, :flg_delete)";
			$stmt = $this->connect->prepare($query);
			$stmt->bindParam(':user_id', $user_id);
			$stmt->bindParam(':directory_name', $directory_name);
			$stmt->bindParam(':created_at', $created_at);
			$stmt->bindParam(':updated_at', $updated_at);
			$stmt->bindParam(':flg_delete', $flg_delete);
			$stmt->execute();
			return $this->connect->lastInsertId();
			echo $stmt->queryString;
			echo $stmt->debugDumpParams();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}

	}

	public function loadAllFolders() {
		$query = "SELECT directory_name FROM `directories`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $user_data;

	}
}

