<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
include('config.php');
class Database
{
	public $con;
/*Remote DB to A2 Hosting Database*/
public $server_link = "";
public $servername = "66.198.240.15";
public $username = "beaumond_cardealer_admin";
public $password = "766935300";
public $dbname = "beaumond_cardealer";



	/*External DB config*/
	/*
	public $server_link = "";
	public $servername = "localhost";
	public $username = "beaumond_cardealer_admin";
	public $password = "766935300";
	public $dbname = "beaumond_cardealer";
	*/

	/*Localhost DB config
	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "beaumond_cardealer";
*/
	//Salt for encryption
	public $salt="car_dealer_app";
 //Session Timeout
	public $session_timeout=7200; // Set to 2 hours
	public function __construct()
	{
		$this->con=mysqli_connect($this->servername,$this->username, $this->password,$this->dbname);
	}
	//get the last id inserted in the table
	public function getLastInserted()
	{
		$lastInserted=$this->con->insert_id;
		return $lastInserted;
	}
}
?>
