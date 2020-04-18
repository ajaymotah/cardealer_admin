<?php
include('fb_init.php');
include('../includes/db_operations.class.php');

/*Token expired by March 2020*/
$pageAccessToken ='EAAExKKM6XLoBANEK16ZAEf0Bdz60y0eV10yBZByZBXaLyDAIuIGX9wSDKzZC679F2ngSB5ueqLfC4CkI9WhgioVZAvvAhAsnqpzaKklSzJ87qCLSLRZCMjoaVs0pK61HbxPCQZBCbim5JpPdiGl8gZCpJawwi2VwUTSsiPjCHodA9W3Bf10rX1wtyicuLVZAgkWqWyjzDuKiZC7QZDZD';
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
