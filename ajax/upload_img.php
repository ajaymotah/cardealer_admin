<?php
include('../includes/db_operations.class.php');
$listing_id=$_GET['id'];

// to insert code to compress or resize images here
//
//
//
foreach ($_FILES["file"]['name'] as $key=>$value) {
  //set image names
  ${'img'.$key}=time().$value;
  //set field names
    ${'field'.$key}=array(
      "listing_id"=>$listing_id,
      "listing_image_url"=>${'img'.$key},
      "default_image"=>0
    );
    //print_r( ${'field'.$key});
    //save image links to DB
      $tbl="tbl_listing_images";
      $sql=$db_operation->insert_record($tbl,${'field'.$key});
      echo $sql;
}

//upload images to server
foreach ($_FILES["file"]['tmp_name'] as $key=>$value) {
move_uploaded_file($value, "../uploaded_images/".${'img'.$key});
}

echo "Listing Saved";
?>
