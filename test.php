<?php
$api_key='AIzaSyC9cNCwPDnxfN4sCdpIJBUceCOyhwCVOY0';
//define( 'API_ACCESS_KEY', 'AIzaSyC9cNCwPDnxfN4sCdpIJBUceCOyhwCVOY0' ); // get API access
include('includes/db_operations.class.php');
//find all device_id
$data=$db_operation->fetch_records('tbl_device_registration');

foreach($data as $device_id){
    $to=array($device_id['device_id']);

    $msg = array
(
    'title'		=> '𝑴𝑰𝑻𝑺𝑼𝑩𝑰𝑺𝑯𝑰 𝑳𝑨𝑵𝑪𝑬𝑹 2008',
	'message' 	=> 'Rs 225,000-Manual-Negociable',
	'body'       =>'test.html',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'image'     =>'https://scontent.fmru3-1.fna.fbcdn.net/v/t1.0-9/55674647_1045478028973387_4643989919159549952_o.jpg?_nc_cat=110&_nc_ht=scontent.fmru3-1.fna&oh=1e0053d91df8b3720d9ec75698a56887&oe=5D0FF5E9'
	//'http://cardealer.webdevsolutions.biz/admin/images/push_icon.jpg'
	//'largeIcon'	=> 'large_icon',
	//'smallIcon'	=> 'small_icon'
);

$fields = array
(
	'registration_ids' 	=> $to,
	'data'			=> $msg
);
$headers = array
(
	'Authorization: key='.$api_key,
	//. API_ACCESS_KEY,
	'Content-Type: application/json'
);
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;
}
?>
