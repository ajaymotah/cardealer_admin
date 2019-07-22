<?php
include('../includes/db_operations.class.php');
$listing_id=$_POST['listing_id'];
$get_images=$db_operation->get_images($listing_id);
foreach ($get_images as $lst_images) {

}

$sql="";




 ?>
