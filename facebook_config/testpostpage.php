<?php
include('fb_init.php');
include('../includes/db_operations.class.php');

/*Token expired by March 2020*/
$pageAccessToken ='EAAExKKM6XLoBALNxrZA0TrxUsWdFpeeMA28ZBDPYZA5BbG7eJzpzdWjG5b4uX5p6IrL7eGCst1vFukDCBG4e2opRIv53z4ZCZAK6ZBB7Rw2HyrlYEjhtrOISziqlDEeqqFKTivobnXMxSatm0ZBRcPnNcXlEh0vLBYakWRQOHHnnQZDZD';
$imageData=[
  'source'=>$fb->fileToUpload('http://cardealer.webdevsolutions.biz/admin/uploaded_images/265.jpg'),
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
