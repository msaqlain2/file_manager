<?php

class file_manager{

	private $user_id;
	private $first_name;
	private $last_name;
	private $user_name;
	private $user_phone;
	private $user_email;
	private $user_password;
	private $user_confirm_password;
	private $user_token;
	private $cretaed_at;
	private $update_at;
	private $flg_delete;
	public $connect;

	public function __construct() {
		require_once 'database.class.php';
		$db_config = new database();
		$this->connect = $db_config->connect();
	}

	public function setUserId($user_id) {
		$this->user_id = $user_id;
	}
	public function getUserId(){
		return $this->user_id;
	}

	public function setFirstName($first_name) {
		$this->first_name = $first_name;
	}
	public function getFirstName(){
		return $this->first_name;
	}

	public function setLastName($last_name) {
		$this->last_name = $last_name;
	}
	public function getLastName(){
		return $this->last_name;
	}

	public function setUserName($user_name) {
		$this->user_name = $user_name;
	}
	public function getUserName(){
		return $this->user_name;
	}

	public function setUserPhone($user_phone) {
		$this->user_phone = $user_phone;
	}
	public function getUserPhone(){
		return $this->user_phone;
	}

	public function setUserEmail($user_email) {
		$this->user_email = $user_email;
	}
	public function getUserEmail(){
		return $this->user_email;
	}

	public function setUserPassword($user_password) {
		$this->user_password = $user_password;
	}
	public function getUserPassword(){
		return $this->user_password;
	}

	public function setUserConfirmPassword($user_confirm_password) {
		$this->user_confirm_password = $user_confirm_password;
	}
	public function getUserConfirmPassword(){
		return $this->user_confirm_password;
	}

	public function setUserToken($user_token) {
		$this->user_token = $user_token;
	}
	public function getUserToken(){
		return $this->user_token;
	}

	public function setCreatedAt($cretaed_at) {
		$this->cretaed_at = $cretaed_at;
	}
	public function getCreatedAt(){
		return $this->cretaed_at;
	}

	public function setUpdatedAt($updated_at) {
		$this->updated_at = $updated_at;
	}
	public function getUpdatedAt(){
		return $this->updated_at;
	}

	public function setFlgDelete($flg_delete) {
		$this->flg_delete = $flg_delete;
	}
	public function getFlgDelete(){
		return $this->flg_delete;
	}


	
	public function createNewAccount() {
		try{
			$query = "INSERT INTO `users`(`first_name`, `last_name`, `user_name`, `phone_number`, `email`, `password`, `token`, `created_at`, `updated_at`, `flg_delete`) 
			VALUES (:first_name, :last_name, :user_name, :phone_number, :email, :password,
				:token, :created_at, :updated_at, :flg_delete)";
			$stmt = $this->connect->prepare($query);
			$stmt->bindParam(':first_name', $this->last_name);
			$stmt->bindParam(':last_name', $this->last_name);
			$stmt->bindParam(':user_name', $this->user_name);
			$stmt->bindParam(':phone_number', $this->phone_number);
			$stmt->bindParam(':email', $this->user_email);
			$stmt->bindParam(':password', $this->user_password);
			$stmt->bindParam(':token', $this->user_token);
			$stmt->bindParam(':created_at', $this->created_at);
			$stmt->bindParam(':updated_at', $this->updated_at);
			$stmt->bindParam(':flg_delete', $this->flg_delete);
			// $stmt->execute();
			echo $stmt->queryString;
			echo $stmt->debugDumpParams();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
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

