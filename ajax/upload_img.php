<?php
include('../includes/db_operations.class.php');
$listing_id=$_GET['id'];

//Function for watermark
function watermark_image($target, $wtrmrk_file, $newcopy) {
    $watermark = imagecreatefrompng($wtrmrk_file);
    imagealphablending($watermark, false);
    imagesavealpha($watermark, true);
    $img = imagecreatefromjpeg($target);
    $img_w = imagesx($img);
    $img_h = imagesy($img);
    $wtrmrk_w = imagesx($watermark);
    $wtrmrk_h = imagesy($watermark);
    $dst_x = ($img_w / 1) - ($wtrmrk_w ); // For centering the watermark on any image
    $dst_y = ($img_h / 1) - ($wtrmrk_h ); // For centering the watermark on any image
    imagecopy($img, $watermark, $dst_x, $dst_y, 0, 0, $wtrmrk_w, $wtrmrk_h);
    imagejpeg($img, $newcopy, 100);
    imagedestroy($img);
    imagedestroy($watermark);
}

// to insert code to compress or resize images here
//
//
//
foreach ($_FILES["file"]['name'] as $key=>$value) {
  //set image names
  ${'img'.$key}=time().$value;
  //set field names
  //set first image as default image
  if($key==0){
    ${'field'.$key}=array(
      "listing_id"=>$listing_id,
      "listing_image_url"=>"new".${'img'.$key},
      "default_image"=>1
        );
    }
    else{
      ${'field'.$key}=array(
        "listing_id"=>$listing_id,
        "listing_image_url"=>"new".${'img'.$key},
        "default_image"=>0
          );

    }
    //print_r( ${'field'.$key});
    //save image links to DB
      $tbl="tbl_listing_images";
      $sql=$db_operation->insert_record($tbl,${'field'.$key});
    }

//upload images to server
foreach ($_FILES["file"]['tmp_name'] as $key=>$value) {
move_uploaded_file($value, "../uploaded_images/".${'img'.$key});
$target="../uploaded_images/".${'img'.$key};
$wtrmrk_file="../watermark/watermark.png";
$newcopy="../uploaded_images/new".${'img'.$key};
//watermark each uploaded images
watermark_image($target,$wtrmrk_file,$newcopy);
unlink($target);
}

echo "Listing Saved";
?>
