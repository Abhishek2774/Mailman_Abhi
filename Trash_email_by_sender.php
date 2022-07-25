<?php 
session_start();
include "autoload.php";
$gobj = new Database();
// include "config.php";

$login_user = $_SESSION['login_user_Email'];
$id = $_POST['id'];

$data = ['session_email'=>$login_user,'id'=>$id];

if($gobj->Trash_email_by_sender('All_emails',$data)){

    echo 1;
}else{

    echo 0;
}



?>