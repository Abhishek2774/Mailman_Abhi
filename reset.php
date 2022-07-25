<?php
include 'header.php';
include "autoload.php";
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
        <form action="#" method="post">
        <div class="modelf">
            <h4>Reset password</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="npass" class="form-control mt-2" placeholder="Enter new password here ">
                        <input type="text" name="npass" class="form-control mt-2" placeholder="Confirm password">
                        <input type="submit" name="submit" class="btn btn-primary mt-2">
                    </div>
                    <div class="col-sm-6">
                        <img src="image/keys.jpeg" alt="not found">
                    </div>
                </div>

        </div>
        </form>
    </div>
</body>
</html>