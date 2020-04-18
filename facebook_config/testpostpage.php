<?php
include('fb_init.php');
include('../includes/db_operations.class.php');

/*Token expired by March 2020*/
$pageAccessToken ='EAAExKKM6XLoBAHucTBZByvPS9UFVioKxKZBdYW3FYANqFAjYOZBqjvYlvza2acXGUMYhduuaJ0fVlshVAIwBun0bBej1uHR2DiPQrreXn55Kz4PTuDNToWHZAtXZBLZAjelHmvTHv0crx4eq0zv2N0N87PPwqQRcRhuWNEycf0UwO5W0scVtvnXYhSwhSa7BMijiPTTkw6LT5uAtgg5Qb32IMiim61j1ZASaCIpmZBoTkwZDZD';
$imageData=[
  'source'=>$fb->fileToUpload('http://cardealer.webdevsolutions.biz/admin/uploaded_images/15468360683.jpg'),
  'message'=>'Testing!!!'

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
