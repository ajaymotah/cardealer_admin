<?php
include('../includes/db_operations.class.php');
//$session='user_id';
//$value='value';


$session=$_POST['user_id'];
$value=$_POST['value'];
$data=$db_operation->SetSession($session,$value);
//print_r($_POST);

 ?>
