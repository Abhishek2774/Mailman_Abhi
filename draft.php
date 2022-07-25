<?php 
session_start();
include "autoload.php";
$gobj = new Database();
$login_user = $_SESSION['login_user_Email'];

if(empty($_POST['ccemaile']) || empty($_POST['bccmaile']) || empty($_POST['subject']) || empty($_POST['msg']) || empty($_POST['file'])){
   

            $reciver_email = $_POST['tomaile'];
            
            $datetime = date('Y/m/d h:i:s', time());
            

        $sql = "INSERT INTO All_emails (sender_email,reciver_email,ccEmail,bccEmail,subject,msg,attechment,datetime,sender_status,reciver_status,draft_status) 
        VALUES('$login_user','$reciver_email',NULL,NULL,NULL,NULL,NULL,'$datetime',0,0,0)";

        if($gobj->mysqli->query($sql)){
            return true;
        }else
        {
            return false;
        }

}

?>