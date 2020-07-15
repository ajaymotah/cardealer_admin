<?php
include('fb_init.php');
include('../includes/db_operations.class.php');
$listing_id=$_POST['listing_id'];

//$listing_id=468;
$car_preview=$db_operation->get_car_preview($listing_id);
if($car_preview['sale_price']>100){
  $car_price='Rs '.number_format($car_preview['sale_price']);
}
else{
  $car_price="Price is Negotiable";
}
//FB post content
 $message = 'SALE! '.$car_preview['make'].' | '.$car_preview['model'].' - '.$car_price.' Find more cars on sale on https://play.google.com/store/apps/details?id=com.cardealer.app';
 $title = 'Car Dealer Mobile App';
 $link = 'http://cardealer.webdevsolutions.biz';
 $description = 'Car dealership Mobile App in Mauritius';
 $picture = 'http://cardealer.webdevsolutions.biz/admin/uploaded_images/'.$car_preview['listing_image_url'];

 $attachment = array(
     'message' => $message,
     'name' => $title,
     'link' => $link,
     'description' => $description,
     'picture'=>$picture,
 );




/*
$linkData = [
 'link' => 'www.yoururl.com',
 'message' => 'Your message here'
];
*/


/*Token expired by May 2020*/
// $pageAccessToken ='EAAExKKM6XLoBAChx1C48iXUIG7rWLwZBrw1lG2FRvILQ3ZBNtDZA0UFXQd1lRI6qqp7dkLIAZBjWxh7izR1c9FgPvw2ShScllYMD6KfEKjKTIcnngoeqjsF98c50B8xQRg8UhezvcdP3CgyGimWZCjxIJAjNgsZASdSzMl80sAlVUUU11peDmQ';
// $imageData=[
//   'source'=>$fb->fileToUpload('http://cardealer.webdevsolutions.biz/admin/uploaded_images/'.$car_preview['listing_image_url']),
//   'message'=>'SALE! '.$car_preview['make'].' | '.$car_preview['model'].' - Rs '.$car_price.' Find more cars on sale on https://play.google.com/store/apps/details?id=com.cardealer.app'
//
// ];
try {
  //for feeds only
 // $response = $fb->post('/814270918760767/feed', $linkData, $pageAccessToken);
//-for photos--//
 $response = $fb->post('/me/photos', $attachment, $pageAccessToken);
 echo 'The post was published successfully to the Facebook timeline.';
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 echo 'Graph returned an error: '.$e->getMessage();
 exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 echo 'Facebook SDK returned an error: '.$e->getMessage();
 exit;
}
$graphNode = $response->getGraphNode();
 ?>
