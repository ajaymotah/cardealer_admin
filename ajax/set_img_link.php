<?php
include('../includes/db_operations.class.php');
if(isset($_POST['set_temp_link']))
{
$tmp_name = $_FILES["upload_file"]['tmp_name'][0];
$img_location = "../uploaded_images/".time().$_POST['img_name'];
move_uploaded_file($tmp_name,$img_location);
echo $img_location;
}

 ?>
