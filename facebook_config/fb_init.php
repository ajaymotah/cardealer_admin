<?php
// start of session - Required
session_start();
//include autoload file from vendor folder
include('vendor/autoload.php');
$fb=new Facebook\Facebook([
  'app_id'=>'335525583674554',
  'app_secret'=>'420900cfdbef73492ffa0dc1502287fe',
  'default_graph_version' => 'v2.9',
]);
?>
