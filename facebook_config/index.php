<?php
include('fb_init.php');

$helper = $fb->getRedirectLoginHelper();

$permissions = ['manage_pages','publish_actions','publish_pages'];
$loginUrl = $helper->getLoginUrl('fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
 ?>
