<?php
include('../includes/db_operations.class.php');
$id=$_POST['id'];
$db_table=$_POST['table'];
$field=$_POST['field'];
$delete_record=$db_operation->delete_records($db_table,$field,$id);
echo $delete_record;




 ?>
