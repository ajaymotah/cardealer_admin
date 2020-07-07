<?php
include('fb_init.php');
include('../includes/db_operations.class.php');
$listing_id=$_POST['listing_id'];

//$listing_id=468;
$car_preview=$db_operation->get_car_preview($listing_id);
if($car_preview['sale_price']>100){
  $car_price=number_format($car_preview['sale_price']);
}
else{
  $car_price="Price is Negotiable";
}
/*
$linkData = [
 'link' => 'www.yoururl.com',
 'message' => 'Your message here'
];
*/


/*Token expired by May 2020*/
$pageAccessToken ='EAAExKKM6XLoBALNxrZA0TrxUsWdFpeeMA28ZBDPYZA5BbG7eJzpzdWjG5b4uX5p6IrL7eGCst1vFukDCBG4e2opRIv53z4ZCZAK6ZBB7Rw2HyrlYEjhtrOISziqlDEeqqFKTivobnXMxSatm0ZBRcPnNcXlEh0vLBYakWRQOHHnnQZDZD';
$imageData=[
  'source'=>$fb->fileToUpload('http://cardealer.webdevsolutions.biz/admin/uploaded_images/'.$car_preview['listing_image_url']),
  'message'=>'SALE! '.$car_preview['make'].' | '.$car_preview['model'].' - Rs '.$car_price.' Find more cars on sale on https://play.google.com/store/apps/details?id=com.cardealer.app'

];
try {
  //for feeds only
 // $response = $fb->post('/814270918760767/feed', $linkData, $pageAccessToken);
//-for photos--//
 $response = $fb->post('/me/photos', $imageData, $pageAccessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 echo 'Graph returned an error: '.$e->getMessage();
 exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 echo 'Facebook SDK returned an error: '.$e->getMessage();
 exit;
}
$graphNode = $response->getGraphNode();
 ?>
