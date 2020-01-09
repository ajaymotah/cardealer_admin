<?php
include('fb_init.php');
$linkData = [
 'link' => 'www.yoururl.com',
 'message' => 'Your message here'
];
$pageAccessToken ='EAAExKKM6XLoBADctkTiI2j0Y9az7aPJibaV80V7ZAmrpErEXloqBNtXZA7nPUxmntzR3otPKFK66pMpdiGYYFer1BEVtUMx0ZAI6QcUCMGJCQDq1N3OWuUG7k1bPJw2WTkBYu4RlMIPgtxBx6uZBq30UykTpg1huKg1REMebLQZDZD';
$imageData=[
  'source'=>$fb->fileToUpload('http://cardealer.webdevsolutions.biz/admin/uploaded_images/default_image.png'),
  'message'=>'Test post'
  //'url'=>''
];
try {
  //for feeds only
 //$response = $fb->post('/me/feed', $imageData, $pageAccessToken);
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
