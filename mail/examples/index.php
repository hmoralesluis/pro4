<?php

//include('PHPMailer.php');
//
//$mail = new PHPMailer();
//$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
//$mail->setFrom('hamlethabana84@gmail.com', 'Amit Agarwal');     //Set who the message is to be sent from
//$mail->addReplyTo('hmoralesluis@gmail.com', 'First Last');  //Set an alternative reply-to address
//$mail->addAddress('hmluis@neuro.ciren.cu', 'Josh Adams');  // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->isHTML(true);                                  // Set email format to HTML
//
//$mail->Subject = 'Here is the subject';
//$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
////Read an HTML message body from an external file, convert referenced images to embedded,
////convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//
//if(!$mail->send()) {
//    echo 'Message could not be sent.';
//    echo 'Mailer Error: ' . $mail->ErrorInfo;
//    exit;
//}
//
//echo 'Message has been sent';



/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
//stream_context_set_default(['http'=>['proxy'=>'192.168.1.4:3128']]);

require '../PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "trialconnectorapp@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "tr1alC0nNectoraPP";
//Set who the message is to be sent from
$mail->setFrom('trialconnectorapp@gmail.com', 'Hamlet');
//Set an alternative reply-to address
$mail->addReplyTo('hamlethabana84@gmail.com', 'Hamlet 84');
//Set who the message is to be sent to
$mail->addAddress('hamlethabana84@gmail.com', 'John Doe');
$mail->isHTML(true); // Set email format to HTML
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$name = 'Hamlet Morales Luis';
$cuerpo = " <img src='http://66.165.181.240/patient-registration/web/bundles/app/img/logo.png'><br> <ul style='width: 32%; list-style: none; padding: 0px;'>   <li style='background-color: #6ABD00; float: left; width: 25%; height: 4px;'></li>   <li style='background-color: #F19800; float: left; width: 25%; height: 4px;'></li>   <li style='background-color: #009ACA; float: left; width: 25%; height: 4px;'></li>   <li style='background-color: #CC3298; float: left; width: 25%; height: 4px;'></li> </ul> ";
$cuerpo .= "<p style='clear: both; padding-top: 21px;'>".$name." You have this availables trials</p>";
$mail->Body = $cuerpo;
$mail->AltBody = 'This is a plain-text message body';
//$mail->Body = 'test';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

