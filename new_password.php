<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailman</title>
</head>
<body>
    <div class="container my-5">
        <div class="header text-danger"></div>
        <div class="row border">
            <div class="col-md-8 py-5">
                <img src="image/keys.jpeg" alt="not found">
            </div>
            <div class="col-md-4 py-5">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="">Old Password</label>
                    <input type="password" id="oldpass" name="oldpass" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" id="newpass" name="newpass" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" id="cpass" name="cpass" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" id="btnsubmit">Reset</button>
                
                </div>
            </form>
            </div>
            
        </div>
    </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#btnsubmit").click(function(e){
            e.preventDefault();
                var oldpass = $("#oldpass").val();
                var newpass = $("#newpass").val();
                var cpass = $("#cpass").val();

                $.ajax({
                        url : "change_pass_db.php",
                        type: "post",
                        dataType: "json",
                        data:{oldpass: oldpass, newpass: newpass, cpass: cpass},
                        success:function(data){
                            if(data.status== false){
                                $(".header").html(data.message);
                            }else{
                                $(".header").html(data.message);

                            }
                        }
                });

        });

    });
</script>