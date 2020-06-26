<?php
include('../includes/db_operations.class.php');
$response = array( 'valid' => false, 'message' => 'Sorry, Something went wrong!');
$txt_phone_num=57669853;
//$_POST['$txt_phone_num'];
//$get_user_phone=$db_operation->find_user_phone_exists($txt_phone_num);
$get_user_phone=$db_operation->check_phone($txt_phone_num);
echo $get_user_phone;
if($get_user_phone>0){
  $response=array('valid'=>false,'message'=>'This phone number is already registered');
}
else{
  $response=array('valid'=>true);
}
echo json_encode( $response );
?>
