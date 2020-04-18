<?php
include('../includes/db_operations.class.php');
$fields=$_POST;
$table=$_POST['table'];
unset($fields['table']);//removes the table key from array
if($db_operation->insert_record($table,$fields)){
  echo 1;
}
?>
