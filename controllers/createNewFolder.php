<?php
require_once '../models/file_manager.class.php';

$input = file_get_contents('php://input');

$decode =  json_decode($input);
if ( !is_object($decode) ){
	die("Oops data not found!");
}

$dir_name = $decode->folder_name;


$user_object = new file_manager();


$current_date = date('Y-m-d h:i:s');
$insertData = $user_object->createNewFolder('1', $dir_name, $current_date, '0', '1');

if($insertData){
	echo json_encode(array('insert' => 'success'));
}
else{
	echo json_encode(array('insert' => 'failed'));
}

