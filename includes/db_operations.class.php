<?php
session_start();
include('database.class.php');
class DataOperation extends Database
{
	public function  url_encode($id)
	{
		$salt=$this->salt;
		$encrypted_id = base64_encode($id.$salt);
		return $encrypted_id;

	}
	public function url_decode($id)
	{
		$salt=$this->salt;
		$decrypted_id_raw = base64_decode($id);
		$decrypted_id = preg_replace(sprintf('/%s/', $salt), '', $decrypted_id_raw);
		return $decrypted_id;
	}


	//find by id
	public function find_by_id($table,$field,$id)
	{
		$sql="SELECT * FROM ".$table." WHERE ".$field." = '".$id."'";
		$array=array();
		$query=mysqli_query($this->con,$sql);
		$row=mysqli_fetch_assoc($query)or die(mysqli_error());
				return $row;
	}
	public function findAll_by_id($table,$field,$id)
	{
		$sql="SELECT * FROM ".$table." WHERE ".$field." = '".$id."'";
		$array=array();
		$query=mysqli_query($this->con,$sql);
		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;

	}
	public function fetchAll($table){
	    $sql="SELECT * FROM ".$table;
	    $array=array();
		//return $sql;
		$query=mysqli_query($this->con,$sql);

		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;

	}
	//function to insert data
	public function insert_record($table,$fields)
	{
		$sql="";
		$sql.="INSERT INTO ".$table;
		$sql.=" (".implode(",",array_keys($fields)).")VALUES";
		$sql.="('".implode("','", array_values($fields))."')";
		$query=mysqli_query($this->con,$sql)or die(mysqli_error());
		return true;
	}
	//function to delete data
	public function delete_records($table,$field,$id)
	{
		$sql = "DELETE FROM ".$table." WHERE ".$field." = '".$id."'";

		if (mysqli_query($this->con,$sql))
		{
   			 return true;
			} else
			{
   			 return "Error deleting record: " . mysqli_error($this->con);
			}
	}

	//function to Update Data
		public function update_records($table,$where,$fields)
	{
		$sql="";
		$condition="";
		foreach($where as $key=>$value){
			$condition.=$key . "=".$value."'AND";
		}
$condition=substr($condition,0,-4);
foreach ($fields as $key => $value) {
	//UPDATE table SET m_name=''
	$sql.=$key."='".$value."', ";
	}
	$sql=substr($sql,0,-2);
	$sql="UPDATE ".$table." SET ".$sql." WHERE ".$condition;
	if (mysqli_query($this->con,$sql))
	{
			 return true;
		} else
		{
			 return false;
			 //"Error Updating Student: " . mysqli_error($this->con);
		}

}


	public function fetch_join_2tables($table1,$table2,$join_id)
	{
		$sql="SELECT a.*,b.* FROM ".$table1." a
		INNER JOIN ".$table2." b ON a.".$join_id."=b.".$join_id;
		$array=array();
		$query=mysqli_query($this->con,$sql);
		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;
	}


	//Is matching course
public function IsMatching($field)
	{
		$sql="SELECT
  c.course_id ,c.course_name,
  s.course_id, s.student_id,
  CASE
    WHEN s.course_id IS NOT NULL THEN 'Yes'
    ELSE c.course_id
  END AS IsMatching
	FROM `tbl_courses`c LEFT JOIN `tbl_studentcourses` s  ON c.course_id = s.course_id
	AND s.student_id ='".$field."'";
	$query=mysqli_query($this->con,$sql);
		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;

	}

	//get amount due
	public function get_payment_due($student_id,$course_id)
	{
		$sql="SELECT MIN(amount_due) AS min_value FROM tbl_payments WHERE student_id = '".$student_id."' AND course_id = '".$course_id."'";
		$query=mysqli_query($this->con,$sql);
		$row=mysqli_fetch_assoc($query)or die(mysqli_error());
		return $row['min_value'];
	}

	public function find_count($table)
	{
		$sql="SELECT * FROM ".$table;
		$result=mysqli_query($this->con,$sql);
		$rowcount=mysqli_num_rows($result);
		 return $rowcount;
	}
		//function encrypte MD5 password
	public function encrypt($password)
		{
			$salt=$this->salt.$password;
			return md5($salt);
		}

#####Session######
public function SetSession($session_id,$value)
{
			$_SESSION[$session_id]=$value;
}



	public function check_session($session)
		{
			if (!isset($session))
	{?>
    <script language="javascript">
    window.location.href = "login.php"
</script>
<?php

	}
		}

	//check session timeout

	public function check_session_time($session_time)
		{

			$now=time();
			if($now>$session_time)
			{
				session_destroy();
				echo "YOUR SESSION HAS EXPRIED, PLEASE LOGIN AGAIN";

			}

		}
		public function session_logout()
		{
			session_destroy();
			return true;
		}
	//////////////////////* Car Dealer App Functions*///////////////////////

	//Get All the makes
	public function get_make()
	{
	    $sql="SELECT * FROM tbl_car_makes ORDER by make ASC";
		$array=array();
		$query=mysqli_query($this->con,$sql);
		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;
	}
	//get all the models ASC order for each make
    public function get_model($make_id)
	{
	    $sql="SELECT * FROM tbl_car_models WHERE make_id = '".$make_id."' ORDER by model ASC";
		$array=array();
		$query=mysqli_query($this->con,$sql);
		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;
	}
	//gets the year - auto updates(for a range of 50 yrs)
	public function GetCarYear()
	{
		$today_year=date(Y);
		$old_year=$today_year-50;
		//$years[];
		for ($i=$old_year; $i <$today_year ; $i++) {
			$years[]=$i;
		}
		$years[]=$today_year;
		rsort($years);
	return $years;
	}
	public function getAllCars(){
	    $sql="SELECT listing_id FROM tbl_listings ORDER BY listing_id DESC";
	    $array=array();
		//return $sql;
		$query=mysqli_query($this->con,$sql);

		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;

	}
	public function searchVehicle($txt_make,$txt_model,$txt_year,$txt_condition,$txt_price)
	{
	    $where='';
    //make
        if($txt_make!=0)
    {
        $where.="WHERE make_id='$txt_make'";
    }
    //model
    if($txt_model!=0)
        {
        if($where!=NULL)
        {
        $where.="AND model_id='$txt_model'";
    }
    else{
        $where.="WHERE model_id='$txt_model'";
        }
    }
    //year
    if($txt_year!=0)
    {
    if($where!=NULL)
        {
        $where.="AND year='$txt_year'";
        }
    else{
        $where.="WHERE year='$txt_year'";
        }
    }
    //condition
    if($txt_condition!=0)
    {
    if($where!=NULL)
        {
         $where.="AND condition_id='$txt_condition'";
         }
  else{
    $where.="WHERE condition_id='$txt_condition'";
        }
    }
    //price
    if($txt_price!=NULL)
    {
     if($where!=NULL)
     {
    $where.="AND sale_price<=$txt_price ORDER BY sale_price DESC";
     }
  else{
    $where.="WHERE sale_price<=$txt_price ORDER BY sale_price ASC";
     }
    }
    $sql="SELECT * FROM tbl_listings ".$where;
    	$array=array();
		//return $sql;
		$query=mysqli_query($this->con,$sql);

		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;
	}

    public function get_car_preview($listing_id){
        $sql="SELECT
tbl_listings.listing_id,tbl_listings.model_id,tbl_listings.listing_status_id,tbl_listings.make_id,tbl_listings.transmission_id,tbl_listings.description,tbl_listings.sale_price,tbl_listings.year,tbl_listings.mileage,tbl_listings.views,
tbl_car_makes.make,tbl_car_models.model,tbl_transmission.transmission,
tbl_listing_images.listing_image_url
FROM
tbl_listings,tbl_car_makes,tbl_car_models,tbl_transmission,tbl_listing_images
WHERE
tbl_listings.listing_id='$listing_id' AND
tbl_listings.model_id=tbl_car_models.model_id AND
tbl_car_makes.make_id=tbl_car_models.make_id AND
tbl_listings.transmission_id=tbl_transmission.transmission_id AND
tbl_listings.listing_id=tbl_listing_images.listing_id AND
tbl_listing_images.default_image=1";
    //$array=array();
    $query=mysqli_query($this->con,$sql);
    $row=mysqli_fetch_assoc($query);
	    return $row;
    }

    public function get_car_details($listing_id){
        $sql="SELECT
tbl_listings.listing_id,tbl_listings.model_id,tbl_listings.make_id,tbl_listings.transmission_id,tbl_listings.description,tbl_listing_status.listing_status,tbl_listings.sale_price,tbl_listings.year,tbl_listings.mileage,tbl_listings.views,tbl_listings.negotiable,tbl_locations.locations,
tbl_car_makes.make,tbl_car_models.model,tbl_transmission.transmission,tbl_vehicle_conditions.vehicle_condition,
tbl_listing_images.listing_image_url,tbl_users.name,tbl_users.phone
FROM
tbl_listings,tbl_listing_status,tbl_locations,tbl_car_makes,tbl_car_models,tbl_transmission,tbl_vehicle_conditions,tbl_listing_images,tbl_users
WHERE
tbl_listings.listing_id='$listing_id' AND
tbl_listings.model_id=tbl_car_models.model_id AND
tbl_car_makes.make_id=tbl_car_models.make_id AND
tbl_listings.transmission_id=tbl_transmission.transmission_id AND
tbl_listings.condition_id=tbl_vehicle_conditions.vehicle_condition_id AND
tbl_listings.listing_id=tbl_listing_images.listing_id AND
tbl_listings.location_id=tbl_locations.location_id AND
tbl_listings.user_id=tbl_users.user_id AND
tbl_listings.listing_status_id=tbl_listing_status.listing_status_id AND
tbl_listing_images.default_image=1";
    //$array=array();
    $query=mysqli_query($this->con,$sql);
    $row=mysqli_fetch_assoc($query);
	    return $row;
    }
    //validate phone number on register
	public function check_phone($phone)
	{
	    $sql="SELECT phone FROM tbl_users WHERE phone ='".$phone."'";
	    $result=mysqli_query($this->con,$sql);
		$rowcount=mysqli_num_rows($result);
		 return $rowcount;
	}

	//increment views for listings
	public function increment_views($listing_id)
	{
	    $sql="SELECT views FROM tbl_listings WHERE listing_id ='".$listing_id."'";
	    $query=mysqli_query($this->con,$sql);
        $row=mysqli_fetch_assoc($query);
        $views=$row['views'];
        $views=$views+1;
        $where=array("listing_id"=>$listing_id);
        $fields=array("views"=>$views);

        $output=$this->update_records('tbl_listings',$where,$fields);
        return $views;
	}
	//get featured cars (max 5 cars)
	public function get_featured_cars()
	{
	    $sql="SELECT
tbl_listings.listing_id,tbl_listings.listing_type_id,tbl_listings.model_id,tbl_listings.make_id,
tbl_listings.sale_price,tbl_listings.year,tbl_listings.mileage,
tbl_car_makes.make,tbl_car_models.model,tbl_transmission.transmission,
tbl_listing_images.listing_image_url
FROM
tbl_listings,tbl_car_makes,tbl_car_models,tbl_transmission,tbl_listing_images
WHERE
tbl_listings.listing_type_id=2 AND
tbl_listings.model_id=tbl_car_models.model_id AND
tbl_car_makes.make_id=tbl_car_models.make_id AND
tbl_listings.transmission_id=tbl_transmission.transmission_id AND
tbl_listings.listing_id=tbl_listing_images.listing_id AND
tbl_listing_images.default_image=1 LIMIT 5";
 //$array=array();
    $query=mysqli_query($this->con,$sql);
    while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;
	}
	//get counts of a table
	public function get_count($table)
	{
	$sql="SELECT * FROM ".$table;
	$query=mysqli_query($this->con,$sql);
	$count=mysqli_num_rows($query);
	return $count;
	}
	// get counts for table per user_id
	public function get_count_tbl($table,$field,$id)
	{
	    $sql="SELECT ".$field." FROM ".$table." WHERE ".$field."='".$id."'";
	    $query=mysqli_query($this->con,$sql);
	    $count=mysqli_num_rows($query);
	    return $count;

	}
	public function get_images($listing_id)
	{
	    $sql="SELECT listing_image_url FROM tbl_listing_images where listing_id='".$listing_id."'";
	     $query=mysqli_query($this->con,$sql);
	     $x=1;
    while($row=mysqli_fetch_assoc($query))
			{
			$array['img'.$x]=$row['listing_image_url'];
			$x++;
			}
			return $array;
	}

	//Login function
	public function login($phone,$pin)
	{
	    $sql="SELECT user_id,pin,phone,user_role_id FROM tbl_users WHERE phone = '".$phone."'";
			$query=mysqli_query($this->con,$sql);
			$count=mysqli_num_rows($query);
			$row=mysqli_fetch_array($query);
			$error=0;
		if($count>0)
			{

				if($row['pin']==$pin)
					{
						$msg=$row['user_id'];

					}
					else {
						$msg="Wrong PIN !!";
						$error=1;
					}
			}
			else
			{
			  $msg="Sorry! Mobile No not Found";
				$error=1;
			}
			$arr_msg=array(
				"user_role_id"=>$row['user_role_id'],
				"msg"=>$msg,
				"error"=>$error
			);
			return $arr_msg;
	}

	//admin
	public function get_user_listings($user_id)
	{
	    $sql="SELECT
tbl_listings.listing_id,tbl_listings.model_id,tbl_listings.make_id,tbl_listings.transmission_id,tbl_listings.listing_status_id,tbl_listings.description,tbl_listings.sale_price,tbl_listings.year,tbl_listings.mileage,tbl_listings.views,
tbl_car_makes.make,tbl_car_models.model,tbl_transmission.transmission,
tbl_listing_images.listing_image_url
FROM
tbl_listings,tbl_car_makes,tbl_car_models,tbl_transmission,tbl_listing_images
WHERE
tbl_listings.user_id='$user_id' AND
tbl_listings.model_id=tbl_car_models.model_id AND
tbl_car_makes.make_id=tbl_car_models.make_id AND
tbl_listings.transmission_id=tbl_transmission.transmission_id AND
tbl_listings.listing_id=tbl_listing_images.listing_id AND
tbl_listing_images.default_image=1";
$query=mysqli_query($this->con,$sql);
    while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;
	}
public function fetch_records($table)
	{
		$sql="SELECT * FROM ".$table;
		$array=array();
		$query=mysqli_query($this->con,$sql);
		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;
	}
public function register_device($device_id)
{
    $sql="SELECT device_id FROM tbl_device_registration WHERE device_id = '".$device_id."'";
		$query=mysqli_query($this->con,$sql);
		$count=mysqli_num_rows($query);
		$msg=$count;
		if($count==0)
			{
				$fields=array("device_id"=>$device_id);
                $this->insert_record('tbl_device_registration',$fields);
                $msg="Inserted";
			}
			return $msg;
}
//update number of view for the app
public function update_app_views($date){
    $sql= $sql="SELECT date FROM tbl_app_views WHERE date = '".$date."'";
    $query=mysqli_query($this->con,$sql);
    $count=mysqli_num_rows($query);
    if($count==0)
    {
        $fields=array("date"=>$date,"views"=>1);
        $this->insert_record('tbl_app_views',$fields);
    }
    else{
        $sql_update="UPDATE tbl_app_views SET views = views + 1 WHERE date = '".$date."'";
        $query1=mysqli_query($this->con,$sql_update);
    }
}

//get only makes that are available on sale
public function get_available_make()
	{
	    $sql="SELECT t2.make_id,t2.make
FROM tbl_listings t1, tbl_car_makes t2
WHERE (t1.make_id = t2.make_id)
GROUP by t1.make_id ORDER by make ASC";
		$array=array();
		$query=mysqli_query($this->con,$sql);
		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;
	}

//get only models that are available on sale
public function get_available_model($make_id)
	{
	    $sql="SELECT t1.make_id,t2.model_id,t2.model
FROM tbl_listings t1, tbl_car_models t2
WHERE (t1.make_id = '$make_id' AND t1.model_id=t2.model_id)
GROUP by t1.model_id ORDER by model ASC";
		$array=array();
		$query=mysqli_query($this->con,$sql);
		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;
	}

//gets only years save in the tbl_listings
public function get_available_year()
	{
	    $sql="SELECT year from tbl_listings GROUP by year ORDER by year ASC";
		$array=array();
		$query=mysqli_query($this->con,$sql);
		while($row=mysqli_fetch_assoc($query))
			{
			$array[]=$row;
			}
			return $array;
	}






//// Web Admin functions /////////

//get all car listings
public function get_all_sales_listings()
{
	$sql="SELECT
tbl_listings.listing_id,tbl_listings.user_id, tbl_listings.make_id,tbl_listings.date_posted,tbl_listing_status.listing_status,tbl_car_makes.make,tbl_listing_images.listing_id,tbl_listing_images.listing_image_url
FROM
tbl_listings,tbl_car_makes,tbl_listing_images,tbl_listing_status
WHERE
tbl_listings.make_id=tbl_car_makes.make_id AND
tbl_listings.listing_id=tbl_listing_images.listing_id AND
tbl_listings.listing_status_id=tbl_listing_status.listing_status_id AND
tbl_listings.listing_status_id=1 AND
tbl_listing_images.default_image=1 ORDER BY tbl_listings.listing_id DESC";
$query=mysqli_query($this->con,$sql);
while($row=mysqli_fetch_assoc($query))
	{
	$array[]=$row;
	}
	return $array;
}

//Get all pending listings
public function get_all_pending_listings($listing_type)
{
	$sql="SELECT
tbl_listings.listing_id,tbl_listing_types.listing_type_id,tbl_listings.user_id,tbl_listings.make_id,tbl_listings.model_id,tbl_listings.date_posted,tbl_listings.sale_price,tbl_listing_status.listing_status,tbl_car_makes.make,tbl_car_models.model,tbl_listing_images.listing_id,tbl_listing_images.listing_image_url
FROM
tbl_listings,tbl_listing_types,tbl_car_makes,tbl_car_models,tbl_listing_images,tbl_listing_status
WHERE
tbl_listings.make_id=tbl_car_makes.make_id AND
tbl_listings.model_id=tbl_car_models.model_id AND
tbl_listings.listing_id=tbl_listing_images.listing_id AND
tbl_listings.listing_status_id=tbl_listing_status.listing_status_id AND
tbl_listing_images.default_image=1 AND
tbl_listing_types.listing_type_id=$listing_type AND
tbl_listings.listing_status_id=3 ORDER BY tbl_listings.listing_id DESC";
$query=mysqli_query($this->con,$sql);
while($row=mysqli_fetch_assoc($query))
	{
	$array[]=$row;
	}
	if(!empty($array))
		return $array;
	else
		return false;

}

//get all active rental listings
public function get_all_rental_listings($status_id)
{
	$sql="SELECT
tbl_listings.listing_id,tbl_listings.user_id, tbl_listings.make_id,tbl_listings.date_posted,
tbl_listing_status.listing_status,tbl_car_makes.make,tbl_listing_images.listing_id,
tbl_listing_images.listing_image_url,tbl_listing_types.listing_type_id
FROM
tbl_listings,tbl_car_makes,tbl_listing_images,tbl_listing_status,tbl_listing_types
WHERE
tbl_listings.make_id=tbl_car_makes.make_id AND
tbl_listings.listing_id=tbl_listing_images.listing_id AND
tbl_listings.listing_status_id=tbl_listing_status.listing_status_id AND
tbl_listings.listing_status_id=1 AND
tbl_listings.listing_type_id=4 AND
tbl_listing_images.default_image=1 ORDER BY tbl_listings.listing_id DESC";
$query=mysqli_query($this->con,$sql);
while($row=mysqli_fetch_assoc($query))
	{
	$array[]=$row;
	}
	if(!empty($array))
		return $array;
	else
		return false;
}



//send push notifications
public function send_notification($listing_id)
{
	$api_key='AIzaSyC9cNCwPDnxfN4sCdpIJBUceCOyhwCVOY0';
	$car_details=$this->get_car_preview($listing_id);

	//find all device_id
	$data=$this->fetch_records('tbl_device_registration');

	foreach($data as $device_id){
	    $to=array($device_id['device_id']);

	    $msg = array
	(
	  'title'		=> 'SALE! '.$car_details['make'].' - '.$car_details['model'],
		'message' 	=> 'Year '.$car_details['year'].' Price - Rs '.$car_details['sale_price'],
		'body'       =>'test.html',
		'subtitle'	=> 'This is a subtitle. subtitle',
		'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
		'vibrate'	=> 1,
		'sound'		=> 1,
		'image'     => "http://cardealer.webdevsolutions.biz/admin/uploaded_images/".$car_details['listing_image_url']
		//'https://scontent.fmru3-1.fna.fbcdn.net/v/t1.0-9/55674647_1045478028973387_4643989919159549952_o.jpg?_nc_cat=110&_nc_ht=scontent.fmru3-1.fna&oh=1e0053d91df8b3720d9ec75698a56887&oe=5D0FF5E9'
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
	//echo $result;
	}
}


public function delete_listing($table,$field,$id)
{
	$sql = "DELETE FROM ".$table." WHERE ".$field." = '".$id."'";

	if (mysqli_query($this->con,$sql))
	{
			 return 1;
		} else
		{
			 return "Error deleting record: " . mysqli_error($this->con);
		}
}

//set Session
	public function set_session($session_id)
	{
	    $_SESSION[".$session_id."] = $session_id;
	    return $_SESSION[".$session_id."];
	}

	//get Session
	public function get_session($session_id)
	{
	    $my_session=$_SESSION[$session_id];
	    return $my_session;
	}
	public function check_admin_session($session,$page)
		{
			if (!isset($session))
	{?>
    <script language="javascript">
    window.location.href = <?php echo $page; ?>
</script>
<?php

	}
		}
public function get_user_details($args)
{
	if($args==0)
	{
		$user_status_id="tbl_user_status.user_status_id";
	}
	else{
		$user_status_id=$args;
	}
	$sql="SELECT
tbl_users.user_id,tbl_users.name,tbl_users.surname,tbl_users.phone,tbl_users.user_role_id,
tbl_users.user_status_id,
tbl_user_roles.user_role_id,tbl_user_roles.role,
tbl_user_status.user_status_id,tbl_user_status.user_status
FROM
tbl_users,tbl_user_roles,tbl_user_status
WHERE
tbl_users.user_role_id=tbl_user_roles.user_role_id AND
tbl_users.user_status_id=tbl_user_status.user_status_id AND
tbl_users.user_status_id=$user_status_id
ORDER BY tbl_users.user_id DESC";
$query=mysqli_query($this->con,$sql);
while($row=mysqli_fetch_assoc($query))
	{
	$array[]=$row;
	}
	if (!empty($array))
	return $array;
	else {
		return false;
	}
}

public function find_user_phone_exists($id)
{
	$sql="SELECT phone FROM tbl_users WHERE phone like '%$id%'";
	$query=mysqli_query($this->con,$sql);
	while($row=mysqli_fetch_assoc($query))
		{
		$array[]=$row;
		}
		if (!empty($array))
		return $array;
		else {
			return false;
		}
}


}//end of class

$db_operation=new DataOperation;


//$data=$db_operation->get_featured_cars();
//print_r($data);
?>
