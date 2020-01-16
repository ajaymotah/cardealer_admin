<?php
function compressImage($source_image, $compress_image) {
$image_info = getimagesize($source_image);
if ($image_info['mime'] == 'image/jpeg') {
$source_image = imagecreatefromjpeg($source_image);
imagejpeg($source_image, $compress_image, 75);
} elseif ($image_info['mime'] == 'image/gif') {
$source_image = imagecreatefromgif($source_image);
imagegif($source_image, $compress_image, 75);
} elseif ($image_info['mime'] == 'image/png') {
$source_image = imagecreatefrompng($source_image);
imagepng($source_image, $compress_image, 6);
}
return $compress_image;
}

$source="Heavy.jpg";
$compressImage="min-heavy.jpg";
compressImage($source,$compressImage);



 ?>
