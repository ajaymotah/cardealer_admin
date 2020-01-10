<?php
include('fb_init.php');
$linkData = [
 'link' => 'www.yoururl.com',
 'message' => 'Your message here'
];
$pageAccessToken ='EAAExKKM6XLoBANSqTkpnkTRKl4JsFdMEkHZAY2nAqj2I5AQMJselkUVfkxEMxlqhL5oNvea9vN3wgOFWYPXJXaxoT7E0tWvLrkpVtyyw0NTFymk5hkL5bql4giJQwyxZCOueTV0ZC7lWXjp65YGZAdLogpZB5ZC9BFI6oHixRx77A20NnsKMXB0RmfYXqs6SmZBotHkONv4HDlLOXyZBgjs2OzKtfshEwoGP9NkfMBLsHAZDZD';
$imageData=[
  'source'=>$fb->fileToUpload('http://cardealer.webdevsolutions.biz/admin/uploaded_images/default_image.png'),
  'message'=>'Test post'
  //'url'=>''
];
try {
  //for feeds only
 $response = $fb->post('/814270918760767/feed', $linkData, $pageAccessToken);
//-for photos--//
 //$response = $fb->post('/me/photos', $imageData, $pageAccessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 echo 'Graph returned an error: '.$e->getMessage();
 exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 echo 'Facebook SDK returned an error: '.$e->getMessage();
 exit;
}
$graphNode = $response->getGraphNode();
 ?>
