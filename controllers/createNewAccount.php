<?php
require_once '../models/file_manager.class.php';
date_default_timezone_set("Asia/Karachi");

$input = file_get_contents('php://input');

$decode =  json_decode($input);
// if ( !is_object($decode) ){
// 	die("Oops data not found!");
// }

$first_name = $decode->first_name;
$last_name = $decode->last_name;
$user_name = $decode->user_name;
$phone_number = $decode->phone_number;
$user_email = $decode->email;
$user_password = $decode->password;
$user_confirm_password = $decode->confirm_password;

//Generate a random string.
$token = openssl_random_pseudo_bytes(16);
//Convert the binary data into hexadecimal representation.
$user_token = bin2hex($token);
//Print it out for example purposes.

$created_at = date('Y-m-d h:i:s');
$updated_at = '0';
$flg_delete = '0';

$user_object = new file_manager();
$user_object->setFirstName($first_name);
$user_object->setLastName($last_name);
$user_object->setUserName($user_name);
$user_object->setUserPhone($phone_number);
$user_object->setUserEmail($user_email);
$user_object->setUserPassword($user_password);
$user_object->setUserConfirmPassword($user_confirm_password);
$user_object->setUserToken($user_token);
$user_object->setCreatedAt($created_at);
$user_object->setUpdatedAt($updated_at);
$user_object->setFlgDelete($flg_delete);

$insertData = $user_object->createNewAccount();

if($insertData){
	echo json_encode("Hurray, Account Successfully Created");
}
else{
	echo json_encode("Oops, Something went wrong");
}

