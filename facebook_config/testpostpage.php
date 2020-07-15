<?php
include('fb_init.php');
include('../includes/db_operations.class.php');

/*Token expired by March 2020*/
$pageAccessToken ='EAAExKKM6XLoBAChx1C48iXUIG7rWLwZBrw1lG2FRvILQ3ZBNtDZA0UFXQd1lRI6qqp7dkLIAZBjWxh7izR1c9FgPvw2ShScllYMD6KfEKjKTIcnngoeqjsF98c50B8xQRg8UhezvcdP3CgyGimWZCjxIJAjNgsZASdSzMl80sAlVUUU11peDmQ';
$imageData=[
  'source'=>$fb->fileToUpload('http://cardealer.webdevsolutions.biz/admin/uploaded_images/265.jpg'),
  'message'=>'Testing!!!'

];
//FB post content
 $message = 'Test message from CodexWorld.com website';
 $title = 'Post From Website';
 $link = 'http://cardealer.webdevsolutions.biz';
 $description = 'CodexWorld is a programming blog.';
 $picture = 'http://cardealer.webdevsolutions.biz/admin/uploaded_images/265.jpg';

$attachment = array(
    'message' => $message,
    'name' => $title,
    'link' => $link,
    'description' => $description,
    'picture'=>$picture,
);

try {
  //for feeds only
 // $response = $fb->post('/814270918760767/feed', $linkData, $pageAccessToken);
//-for photos--//
 $response = $fb->post('/me/feed', $attachment, $pageAccessToken);
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
