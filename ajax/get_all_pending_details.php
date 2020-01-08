<?php
include('../includes/db_operations.class.php');
$listing_id=$_POST['listing_id'];
$get_pending_details=$db_operation->get_car_details($listing_id);
$result='';
$result.="Make: ".$get_pending_details['make']."</br>";
$result.="Model: ".$get_pending_details['model']."</br>";
echo $result;




 ?>
