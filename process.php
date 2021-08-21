<?php

include_once "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);



if(isset($_POST['btn-submit']))
{
    $fullname = $_POST['fullname'];
    $visitor_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $to = "dimugold@gmail.com";
    $subject = $subject;
    
    $message = "The sender's Email is:{$visitor_email} The message is: ".$message;
   
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        $mail->Username = 'dimugold@gmail.com'; 
        $mail->Password = 'gold2579'; 
    
        $mail->setFrom($visitor_email, $fullname);
       
        $mail->addAddress('dimugold@gmail.com', 'Gold Oluwadimu');
        $mail->addReplyTo($visitor_email, $fullname); 

        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo "Email message sent.";
    } catch (Exception $e) {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }


}
?>