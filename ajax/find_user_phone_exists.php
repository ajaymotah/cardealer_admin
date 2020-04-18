<?php
include('../includes/db_operations.class.php');
$txt_phone_num=$_POST['$txt_phone_num'];
$get_user_phone=$db_operation->find_user_phone_exists($txt_phone_num);
echo json_encode( $get_user_phone );
?>
