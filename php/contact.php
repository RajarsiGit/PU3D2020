<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "pu3d2020@gmail.com";
    $email_subject = "Query";
    $email_res_subeject = "Query Send Confirmation";
 
    /*function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted.";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        include "fail.html";
        die();
    }*/
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['comments'])) {
        include "fail.html";
        die();
    }
 
     
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // required
    $subject = $_POST['subject']; // not required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

    $phone_exp = "/^[0-9]{10}+$/";
 
  if(!preg_match($phone_exp,$phone)) {
    $error_message .= 'The Phone Number you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    include "fail.html";
    die();
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Subject: ".clean_string($subject)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

    $email_from_message = "Thank you for contacting us. We will get back to you real soon.\nYour details are below\n";
    $email_from_message .= "Name: ".clean_string($name)."\n";
    $email_from_message .= "Email: ".clean_string($email_from)."\n";
    $email_from_message .= "Phone: ".clean_string($phone)."\n";
    $email_from_message .= "Subject: ".clean_string($subject)."\n";
    $email_from_message .= "Comments: ".clean_string($comments)."\n\n\n";
    $email_from_message .= "Team PU 3D 2020\nDepartment of Biochemistry & Molecular Biology\nKalapet\nPuducherry - 605014";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();

$headers_res = 'From: '.$email_to."\r\n".
'Reply-To: '.$email_to."\r\n".
'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);
@mail($email_from, $email_res_subeject, $email_from_message, $headers_res);
include "success.html";
die();
}
?>