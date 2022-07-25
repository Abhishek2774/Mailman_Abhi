<?php 
session_start();
include 'header.php';
include "autoload.php";
$gobj = new Database();

$result = array();
    $email_username = $_POST['email'];
    $pass = $_POST['pass'];

if(isset($_POST['submit'])){
    if(Validate::required($email_username)){
        array_push($result,"Email/username is Required");
    }elseif(Validate::required($pass)){
        array_push($result,"Password must be  Required");
    }else{
            $data =[
                'email'=>$email_username,
                'pass'=>$pass
            ];
        if($gobj->login_user('Reg_userid',$data)){
            $result = $gobj->getResult(); 
              $_SESSION['login_user_Email'] =  $email_username;
            //   header("location:http://localhost/Abhishek_mailman/dashboard.php"); // for local 
              header("location:http://hestalabs.com/tse/Abhishek_mailman/dashboard.php"); // for sever
                
        }else{
            
            $result = $gobj->getResult();
        }
    }
     
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MailMan</title>
   

</head>
<body>
<div class="container">

<form action="" method="POST" enctype="multipart/form-data">
        <div class="modelf">
        <?php  foreach($result as $item){ echo $item."<br>"; } // print You are Login Successfully ?> 
        <div class="row py-5">
             <div class="col-sm-6">
                    <img src="image/login.jpeg" alt="not found" style="height:200px", width="200px">
                </div>
                    <div class="col-sm-6">
                        <div class="block2">
                        <h5>Login to your account here</h5>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control mt-2" placeholder="Email/username">
                            <input type="password" name="pass" class="form-control mt-2" placeholder="password">
                            <a class="mt-2" href="forget.php">forgot password?</a>
                            <span>Dont't have an account yet?</span>
                            <div>
                            <input type="submit" name="submit" value="Login" class="btn btn-primary  float-right">
                            <a class="btn btn-danger" href="reg.php">create One</a>
                            </div>
                        </div>
                    </div>
             </div>
        </div>
     
        </div>
        </form>
        </div>
</body>
</html>