<?php
include('includes/db_operations.class.php');
$user_id=$_POST['user_id'];
$result=$db_operation->check_user_limit($user_id);
echo $result;
?>
