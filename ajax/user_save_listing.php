<?php
include('../includes/db_operations.class.php');
//creates new user on the spot
$user_id=$_POST['user_id'];
$get_data=$db_operation->find_by_id('tbl_users','user_id',$user_id);
$phone=$get_data['phone'];
$fields1=array(
"user_id"=>$user_id,
"model_id"=>$_POST['slt_model'],
"make_id"=>$_POST['slt_make'],
"vehicle_type_id"=>1,
"listing_type_id"=>$_POST['slt_listing_type'],
"condition_id"=>$_POST['slt_condition'],
"listing_status_id"=>3,// to save as pending
"transmission_id"=>$_POST['slt_transmission'],
"fuel_id"=>$_POST['slt_fuel'],
"location_id"=>$_POST['slt_location'],
"engine_capacity"=>$_POST['txt_engine'],
"year"=>$_POST['slt_year'],
"mileage"=>$_POST['txt_mileage'],
"regular_price"=>0,
"sale_price"=>$_POST['txt_price'],
"phone"=>$phone,
"views"=>1,
"negotiable"=>"Y",
"date_posted"=>date('d/m/Y'));

$data=$db_operation->insert_record('tbl_listings',$fields1);

$last_id=$db_operation->getLastInserted();

echo $last_id;

?>
