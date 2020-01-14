<?php
include('fb_init.php');
$image_source=$_POST['image_source'];
$message=$_POST['message'];
/*
$linkData = [
 'link' => 'www.yoururl.com',
 'message' => 'Your message here'
];
*/

$pageAccessToken ='EAAExKKM6XLoBAIQK7QLlIZATCUcAltaZBbTfHNsPGBnPo3FaIEyUbkDtTJKcsybfV5xvqTz2FrXhXLZAi40GQWAh65SVMbobZCpcZBy4wBWjc6KzPHG3Cxm2eU41jgVhAU9yYZBWsD3oFwaR3U7csVi0lr3Yi6r4xcqfpVXoWvnQZDZD';
$imageData=[
  'source'=>$fb->fileToUpload('http://cardealer.webdevsolutions.biz/admin/uploaded_images/default_image.png'),
  'message'=>'Test post. Find more on http://cardealer.com'

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
