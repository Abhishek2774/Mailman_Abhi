<?php
session_start();
include "autoload.php";
$gobj = new Database();

$login_Email = $_SESSION['login_user_Email'];

 $oldpass = $_POST['oldpass'];
 $newpass = $_POST['newpass'];
 $cpass  = $_POST['cpass'];

 $sql = "SELECT pass FROM Reg_userid WHERE email='$login_Email' && pass='$oldpass'"; 
$result = $gobj->mysqli->query($sql);
$data = $result->fetch_assoc();


if(!($data['pass'] == $oldpass)){
    echo json_encode(["status"=> false, "message" => "Old password are not match"]); exit;
}


if(Validate::is_valid_password($newpass))
{
    echo json_encode(["status"=> false, "message"=> "password shuld be grater then 6"]);exit;
}else{

        $sql = "UPDATE Reg_userid SET pass='$newpass', cpass='$newpass' WHERE email='$login_Email'";
        $data = $gobj->mysqli->query($sql);
    echo json_encode(["status"=> true, "message" => "Password are successfully update"]); exit;   
}


?>