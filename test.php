<?php

//PHPMail required
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/PHPMailer-master/src/Exception.php';
require '../vendor/PHPMailer-master/src/PHPMailer.php';

include('../../includes/db_operations.class.php');

$student_id=$_POST['student_id'];
//get student email
$student_email=$db_operation->find_by_id('tbl_students','student_id',$student_id);
$student_email=$student_email['email'];
//compute results
$compute_result=$db_operation->end_exam($student_id);
$qu_number=1;
$skipped=0;
$right_answer=0;
$wrong_answer=0;
$unanswered=0;
$result_details="";

//
foreach($compute_result as $row_compute_result)
{
  $result_details.=$qu_number.' '."Question: ".$row_compute_result['question']."\r\n";
  $result_details.="Answer: ".$row_compute_result['question_answer']."\r\n";
  $result_details.="Student's Answer: ".$row_compute_result['exam_answer']."\r\n";
  if ($row_compute_result['question_answer']==$row_compute_result['exam_answer']) {
    $right_answer++;
  }
  if ($row_compute_result['question_answer']!=$row_compute_result['exam_answer'] && $row_compute_result['exam_answer']!='U') {
    $wrong_answer++;
  }
  if ($row_compute_result['exam_answer']=='U') {
    $skipped++;
  }
  $qu_number++;
}
$result_details.='------------------------'."\r\n";
$result_details.='END OF RESULT'."\r\n";
$final_result=array(
  "correct"=>$right_answer,
  "wrong"=>$wrong_answer,
  "skipped"=>$skipped);

//---- NEW PHP Mailer Function----//
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Set who the message is to be sent from
$mail->setFrom('From: Abdoolah Computer Training Center EXAM Result');

//Set who the message is to be sent to
//$to=$tutor_email.','.$student_email;
$mail->addAddress($tutor_email);
$mail->addAddress($student_email);

//Set the subject line
$mail->Subject = 'Abdoolah Exam System - Exam Results';

// Your message
$greetings="Hello \r\n";
$headline="This is the result for Surname: ".$row_compute_result['surname'].' , '.'Name :'.$row_compute_result['name'];
$total_marks = "Right_answer =".$right_answer."\r\n";
$total_marks.="Wrong_answer =".$wrong_answer."\r\n";
$total_marks.="Skipped/Unanswered=".$skipped."\r\n";

//message
$message=$greetings.$headline.$total_marks.$result_details;



//Replace the plain text body with one created manually

$mail->Body = $message;

//send email
$mail->send();

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}




  /*

  //send email
$to=$tutor_email.','.$student_email;
// Your subject
$subject="Exam";
// From
$header="From: Abdoolah Computer Training Center EXAM Result <exam>";
// Your message
$greetings="Hello \r\n";
$headline="This is the result for Surname: ".$row_compute_result['surname'].' , '.'Name :'.$row_compute_result['name'];
$total_marks = "Right_answer =".$right_answer."\r\n";
$total_marks.="Wrong_answer =".$wrong_answer."\r\n";
$total_marks.="Skipped/Unanswered=".$skipped."\r\n";
//message
$message=$greetings.$headline.$total_marks.$result_details;
//send Email
$sentmail = mail($to,$subject,$message,$header);

*/


//delete exam for student_id
$delete_exam=$db_operation->delete_records('tbl_exams','student_id',$student_id);

//delete Session
session_unset();
session_destroy();
//print_r($sentmail);
?>
