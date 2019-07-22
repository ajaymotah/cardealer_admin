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

//Student login function
public function student_login($username,$password)
{
$field_username= $this->student_username;
$field_password=$this->student_password;
$table=$this->tbl_student;
$sql="SELECT * FROM ".$table." WHERE ".$field_username." = '".$username."'";
$query=mysqli_query($this->con,$sql);
$count=mysqli_num_rows($query);
//$msg=$sql;

if($count>0)
  {
    $row=mysqli_fetch_array($query);
    if($row[$field_password]==$password)
      {
        //$_SESSION['student_id']=$row['student_id'];
        //delete any previous exam_answer
        //$this->delete_records('tbl_exams','student_id',$row['student_id']);
        //$_SESSION['start']=time();
        //$expire=$this->session_timeout;
        //$_SESSION['expire'] = $_SESSION['start'] + ($expire);
        $msg=1;
      }
      else {
        $msg="Error Logging - Please Check Username/Password";

      }
  }
  //$msg="Error Logging - Please Check Username/Password";
  return $msg;
}
