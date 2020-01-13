<?php
include('../includes/db_operations.class.php');
$listing_id=$_POST['listing_id'];
//$listing_id=272;
$get_images=$db_operation->get_images($listing_id);
//print_r($get_images);
//echo sizeof($get_images);
foreach ($get_images as $key => $value) {
  $del_img=$img_link.$value;
  unlink($del_img);
  //echo $del_img."</br>";
}
$del_listing=$db_operation->delete_listing('tbl_listings','listing_id',$listing_id);
echo $del_listing;




 ?>
