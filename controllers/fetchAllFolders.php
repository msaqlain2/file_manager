<?php
require_once '../models/file_manager.class.php';


$user_object = new file_manager();


$current_date = date('Y-m-d h:i:s');
$user_data = $insertData = $user_object->loadAllFolders();



echo json_encode($user_data);


