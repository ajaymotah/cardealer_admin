<?php

include('includes/db_operations.class.php');
$result=$db_operation->check_user_limit(419);
echo $result;
?>
