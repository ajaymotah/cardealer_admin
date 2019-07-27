<?php
include('../includes/db_operations.class.php');
$message="Saved";
print_r($_POST);
  //get image name and set to unique names to upload
$img1_name="../uploaded_images/".time().$_POST['img1_name'];
$img2_name="../uploaded_images/".time().$_POST['img2_name'];
$img3_name="../uploaded_images/".time().$_POST['img3_name'];
$img4_name="../uploaded_images/".time().$_POST['img4_name'];
$img5_name="../uploaded_images/".time().$_POST['img5_name'];

//get temp location of image files
$temp_img1=$_POST['temp_img1'];
$temp_img2=$_POST['temp_img2'];
$temp_img3=$_POST['temp_img3'];
$temp_img4=$_POST['temp_img4'];
$temp_img5=$_POST['temp_img5'];

//save links to tbl_listing_images
$listing_id=$_POST['listing_id'];
$field1=array(
"listing_id"=>$listing_id,
"listing_image_url"=>$img1_name
);
$field2=array(
"listing_id"=>$listing_id,
"listing_image_url"=>$img2_name
);
$field3=array(
"listing_id"=>$listing_id,
"listing_image_url"=>$img3_name
);
$field4=array(
"listing_id"=>$listing_id,
"listing_image_url"=>$img4_name
);
$field5=array(
"listing_id"=>$listing_id,
"listing_image_url"=>$img5_name
);
//saving to tbl_listing_images
$tbl="tbl_listing_images";
$db_operation->insert_record($tbl,$field1);
$db_operation->insert_record($tbl,$field2);
$db_operation->insert_record($tbl,$field3);
$db_operation->insert_record($tbl,$field4);
$db_operation->insert_record($tbl,$field5);
//$message+="upload to tbl ok";

//upload images to server
move_uploaded_file($temp_img1, $img1_name);
move_uploaded_file($temp_img2, $img2_name);
move_uploaded_file($temp_img3, $img3_name);
move_uploaded_file($temp_img4, $img4_name);
move_uploaded_file($temp_img5, $img5_name);
//$message+="uploaded to folder";
echo $message;
?>
