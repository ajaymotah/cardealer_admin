<?php
include('../includes/db_operations.class.php');

$fields=array(
  "name"=>$_POST['txt_name'],
  "phone"=>$_POST['txt_phone'],
  "pin"=>1234,
  "user_role_id"=>2,
  "user_status_id"=>1
);
if($db_operation->insert_record('tbl_users',$fields)){
  $last_user_id=$db_operation->getLastInserted();
}

$fields1=array(
"user_id"=>$last_user_id,
"model_id"=>$_POST['slt_model'],
"make_id"=>$_POST['slt_make'],
"vehicle_type_id"=>1,
"listing_type_id"=>1,
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
"phone"=>$_POST['txt_phone'],
"views"=>1,
"negotiable"=>"Y",
"date_posted"=>date('d/m/Y'));

$data=$db_operation->insert_record('tbl_listings',$fields);
//
// if($data){
//   $last_id=$db_operation->getLastInserted();
//   $msg="Saved to tbl_listing";
// }


/*

}
//save image link to tbl_listing_images
$img1_field=array("listing_id"=>$last_id,"listing_image_url"=>$_POST['img0']);
$img2_field=array("listing_id"=>$last_id,"listing_image_url"=>$_POST['img1']);
$img3_field=array("listing_id"=>$last_id,"listing_image_url"=>$_POST['img2']);
$img4_field=array("listing_id"=>$last_id,"listing_image_url"=>$_POST['img3']);
$img5_field=array("listing_id"=>$last_id,"listing_image_url"=>$_POST['img4']);

//insert into tbl_listing_images
$db_operation->insert_record('tbl_listing_images',$img1_field);
$db_operation->insert_record('tbl_listing_images',$img2_field);
$db_operation->insert_record('tbl_listing_images',$img3_field);
$db_operation->insert_record('tbl_listing_images',$img4_field);
$db_operation->insert_record('tbl_listing_images',$img5_field);
*/
//print_r($_POST);
echo $data;
?>
