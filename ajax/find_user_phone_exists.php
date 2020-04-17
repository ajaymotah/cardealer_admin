<?php
include('../includes/db_operations.class.php');
$id=$_POST['id'];
$db_table=$_POST['table'];
$field=$_POST['field'];
$get_user_phone=$db_operation->find_user_phone_exists($id);
json_encode( $get_user_phone );
?>
