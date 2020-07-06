<?php
include('fb_init.php');
include('../includes/db_operations.class.php');

/*Token expired by March 2020*/
$pageAccessToken ='EAAExKKM6XLoBAB0rEugHq2JM9kZBkWT8jjfdO1kGRBZBADkzfJJjgJJ8ileO6ataFyhyZBnW3zwOaZCUp4MDNlUPlmrIAzI3FoAud916TMl9UmRa28XR5hqcqbeoGpBiozO4UueLLwvLQ0TbDpv3OJphZBZABXmRCD62sejw1AWgwVURZBwoRoMJrjNqZCVebnfTpTvZAqcLlMAZDZD';
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
