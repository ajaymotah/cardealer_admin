<?php
include('../includes/db_operations.class.php');
$get_cars=$db_operation->getAllCars();
$list_cars='
<table id="example2" class="display responsive no-wrap" width="100%">
  <thead>
  <tr>
    <th>Listing ID</th>
    <th>user_id</th>
    <th>Make</th>
    <th>Model</th>
    <th>Image</th>
    <th>Date Posted</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>';
foreach ($get_cars as $car_details) {
  $list_cars.= '<tr>
      <td>'.$car_details['listing_id'].'</td>
      <td>'.$car_details['listing_id'].'</td>
      <td>'.$car_details['listing_id'].'</td>
      <td>'.$car_details['listing_id'].'</td>
      <td>'.$car_details['listing_id'].'</td>
      <td>'.$car_details['listing_id'].'</td>
      <td>'.$car_details['listing_id'].'</td>
      <td>'.$car_details['listing_id'].'</td>
    </tr>';
}
$list_cars.="<tfoot>
<tr>
  <th>Listing ID</th>
  <th>user_id</th>
  <th>Make</th>
  <th>Model</th>
  <th>Image</th>
  <th>Date Posted</th>
  <th>Status</th>
  <th>Action</th>
</tr>
</tfoot>
</table>";
echo $list_cars;



 ?>
