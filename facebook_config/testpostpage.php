<?php
include('fb_init.php');
include('../includes/db_operations.class.php');

/*Token expired by March 2020*/
$pageAccessToken ='EAAExKKM6XLoBAF1AyEdZB2wtSDU36aTZAQyNL1Fv6oTJGEgLvNID3WTHu7wBCJcCknCvZBeSDgp88BEv1ys5RYFJGFptCSNFH7OCBKSwZAN5CBHWa4XgKOuCLxQ6k6VgiaEOtk1pbmfjz8zLFsZAjfsfj6qaTyQKiGLoV6Lj7KRyu1h60YHHF';
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
