<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


class sendEmail{
    
    public function email_send($to_email,$subject,$html,$name){
        // echo $to_email.$subject.$html.$name;

        $link = md5(time());
        $mail = new PHPMailer(true);
    
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'Abhihesta@gmail.com';                    
        $mail->Password   = 'egjxxtrgyhdqvsek';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

    
        $mail->setFrom('Abhishek@gmail.com', $name);

        $mail->addAddress($to_email);             


        $mail->isHTML(true);                                 
        $mail->Subject = $subject;
        $mail->Body    = $html;
        $mail->AltBody = 'Verfication link for reset password';

        return $mail->send();
    }
}