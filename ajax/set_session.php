<?php
include('../includes/db_operations.class.php');
//$session='user_id';
//$value='value';


//$session=$_POST['user_id'];
$value=$_POST['value'];
$user_role_id=$_POST['user_role_id'];
$data=$db_operation->set_session('user_id',$value,$user_role_id);
//print_r($_POST);

 ?>
