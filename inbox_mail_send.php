<?php 
session_start();
include "autoload.php";
$gobj = new Database();

    
   $from = $_SESSION['login_user_Email'];

    $Toemail = $_POST['tomaile'];
   $ccemail = $_POST['ccemaile'];
    $bccemail = $_POST['bccmaile'];
    $Subject = $_POST['subject'];
    $msg = $_POST['msg'];

    $message = htmlspecialchars($msg);
    $date = date('Y/m/d h:i:s', time());

    $target_dir = "upload/";
    $file = $_FILES['file']['name'];
    $target_file = $target_dir . basename($_FILES['file']['name']);
    $attechment = move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

    $array_data = [
        'sender_email' => $from,
        'reciver_email' => $Toemail,
        'ccEmail' => $ccemail,
        'bccEmail' => $bccemail,
        'subject' => $Subject,
        'msg' => $message,
        'attechment'=> $file,
        'datetime' => $date,
        'sender_status' => 1,
        'reciver_status' => 1,
        'draft_status'=>1,
        
        
    ];  

    $gobj->all_email_store('All_emails',$array_data);

 



?>