<?php 
include "autoload.php";
$gobj = new Database();

$username = $_POST["username"];
$trval = $_POST["id"];

if($username == ''){
        $sql = "SELECT email from Reg_userid WHERE email='$trval'";

        $result = $gobj->mysqli->query($sql);

        if($result->num_rows > 0){

        $row = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode(['msg'=> "Email Already Exist", "status"=> true]);
        
        }else{
            echo json_encode(['msg'=>'Email Not Found', 'status'=> false]);
        }

}else{

     $sql = "SELECT username from Reg_userid WHERE  username='$username'";

    $result = $gobj->mysqli->query($sql);

    if($result->num_rows > 0){

    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['msg'=> "Username Already Exist", "status"=> true]);
    
    }else{
        echo json_encode(['msg'=>'Username is not Found', 'status'=> false]);
    }

    
}
