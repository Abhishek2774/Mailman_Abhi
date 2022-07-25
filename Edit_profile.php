<?php
session_start();
include 'header.php';
include "autoload.php";
$gobj = new Database();

$email = $_SESSION['login_user_Email'];
$profile = $gobj->desh_profile('Reg_userid', $email);
if (isset($_POST['submit'])) {
    $session_pic = $profile['image'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $remail = $_POST['remail'];
    $file_name   = $_FILES['image'];
    // var_dump($file_name);

    $uploaddir = 'image/';
    $name =$_FILES['image']['name'];
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    $folder = move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

    if ($file_name['name']) {
        $query = "UPDATE Reg_userid SET fname = '$fname',lname = '$lname', remail = '$remail', image = '$name'  WHERE email= '$email'";
    } else {
        $query = "UPDATE Reg_userid SET fname = '$fname',lname = '$lname', remail = '$remail', image='$session_pic' WHERE email= '$email'";
    }

    $result = $gobj->mysqli->query($query);
    if ($result) {
        header("Refresh:0");
        // echo   '<script>alert("Update Successfull.");</script>';
    } else {
        echo   '<script>alert("NOT Update.");</script>';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card mt-5">
                    <div class="card-header">
                        Profile<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <a href="dashboard.php"><span aria-hidden="true">&times;</span></a>
                    </div>
                    <div class="card-body">
                        <?php foreach ($result_profile as $item) {
                            echo $item;
                        } ?>
                        <div class="row py-5">
                            <div class="col-sm-8 order-1">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <table class="table border">
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="fname" value="<?php echo $profile['fname']; ?>" placeholder="first name">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="mname" placeholder="Middle name">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="lname" value="<?php echo $profile['lname']; ?>" placeholder="Last name">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="email" class="form-control" name="remail" value="<?php echo $profile['remail']; ?>" placeholder="Recovery Email">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="submit" class="btn btn-primary mt-3"></td>
                                        </tr>
                                    </table>
                            </div>
                            <div class="col-sm-4 order-2">
                                <?php
                                $profile_url = !empty($profile['image']) ? $profile['image'] : 'login.jpeg';
                                ?>
                                <img src="<?php echo  'image/'.$profile_url; ?>" width="150px" height="150px" class="rounded-circle border border-primary" alt="NOT found">
                                <input type="file" name="image"">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>