<?php
include('../includes/db_operations.class.php');
$table=$_POST['table'];
$where_field=$_POST['where_field'];
$where_value=$_POST['where_value'];
$where=array(
$where_field=>$where_value
);
$set_field=$_POST['set_field'];
$set_value=$_POST['set_value'];
$fields=array(
  $set_field=>$set_value
);
$data=$db_operation->update_records($table, $where,$fields);
echo $data;
?>
