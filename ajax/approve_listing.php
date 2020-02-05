<?php
include('../includes/db_operations.class.php');
$listing_id=$_POST['listing_id'];
$table="tbl_listings";
$where=array(
  "listing_id"=>$listing_id
);
$fields=array(
  "listing_status_id"=>1
);
if($db_operation->update_records($table,$where,$fields)){
//send push notification
$send_notofocation->send_notification($listing_id);
  echo 1;
}

 ?>
