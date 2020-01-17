<?php
include('../includes/db_operations.class.php');
$phone=$_POST['txtPhone'];
$pin=$_POST['txtPin'];
$data=$db_operation->login($phone,$pin);
echo json_encode($data);

 ?>
