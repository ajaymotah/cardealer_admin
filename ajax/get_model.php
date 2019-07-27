<?php
include('../includes/db_operations.class.php');
$car_make=$_POST['make_id'];
$opt_make='<select class="form-control" id="slt_model" name="slt_model">';
//<option disabled selected value> -- select Model -- </option>';
$arr_model=$db_operation->get_model($car_make);

foreach ($arr_model as $lst_model) {
  $opt_make.='<option value="'.$lst_model['model_id'].'">'.$lst_model['model'].'</option>';
  }
  $opt_make.='</select>';
echo $opt_make;
//print_r($arr_model);
?>
