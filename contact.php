<?php

/**
 * @author Boomer
 * @copyright 2018
 */
if(isset($_POST['contactbtn'])){
   
   
   
   require 'PHPMailerAutoload.php';
   require 'credential.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;              // Enable verbose debug output
$mail->isSMTP();                  // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;         // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                  // SMTP password
$mail->SMTPSecure = 'tls';      // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;             // TCP port to connect to

$mail->setFrom(EMAIL, 'Mail Send Tutorial');
$mail->addAddress(EMAIL);     // Add a recipient  //For now use your email for testing purpose        
$mail->addReplyTo(EMAIL);         
$mail->isHTML(true);          // Set email format to HTML



/******************My Posted Details******************/
  
   $fname = $_POST['getfname'];
   $lname = $_POST['getlname'];
   $phone = $_POST['getphone'];
   $email = $_POST['getemail'];
   $message = $_POST['getmessage'];
   
//$toadmin_email="brainhr@gmail.com";
  $subject ="You have got a message from $fname  $lname";
  //$webmaster = "Admin <webmaster@brainhr.com>";
  //$headers = "From: $webmaster";
  $details ="Firstname:$fname";
  $details .="Lastname:$lname";
  $details .="Phone : $phone";
  $details .="Email:$email";
  $details .="Message:$message";
/******************My Posted Details******************/


$mail->Subject = $subject;
$mail->Body    = '<div style="border:2px solid red"> This is the HTML message body <b>in bold!</b> </div> ' .$details;
$mail->AltBody = $details;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
   
   
   
   
   
   
   
   
   
 
  
  //echo $details;
   
   
  /* if(mail($toadmin_email,$subject,$details,$headers)){
    echo"Your Message has been sent";
   }
   else
   {
    echo"There was an error sending mail";
      }*/
   
}


?>