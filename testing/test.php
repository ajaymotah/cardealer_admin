<?php
include("../includes/db_operations.class.php");
$data=$db_operation->send_notification(476);
print_r($data);


 ?>
