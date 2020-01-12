<?php
include('../includes/db_operations.class.php');
// if(isset($_POST['set_temp_link']))
// {
$result='';
//print_r($_FILES["file"]['tmp_name']);

foreach ($_FILES["file"]['tmp_name'] as $key) {
  $result.=$key;

}
echo $result;
//$tmp_name = $_FILES["file"]['tmp_name'][0];
//echo $tmp_name;
// $img_location = "../uploaded_images/".time().$tmp_name;
// move_uploaded_file($tmp_name,$img_location);
// echo $img_location;



// }







// // if(isset($_POST['set_temp_link']))
// // {
// $tmp_name = $_FILES["upload_file"]['tmp_name'][0];
// $img_location = "../uploaded_images/".time().$_POST['img_name'];
// move_uploaded_file($tmp_name,$img_location);
// echo $img_location;
// // }

 ?>
