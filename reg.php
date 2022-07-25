<?php include 'header.php';
include "autoload";
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
    <div class="conatiner">
        <div class="modelf">
            <h4>MailMan</h4>
            <hr>
            
            <form method="post" enctype="maltipart/form-data" id="formdata">
                <div class="row">
                <div class="success"></div>
                    <div class="col-md-8 order-1">
                        <input type="text" name="fname" id="fname" class="form-control mt-2" placeholder="Enter your First Name">
                        <span id='f_error' class="text-danger"></span>
                        <input type="text" name="lname" id="lname" class="form-control mt-2" placeholder="Enter your last Name">
                        <span id='l_error' class="text-danger"></span>
                        <input type="text" name="username" id="username" class="form-control mt-2" placeholder="Enter username">
                        <span id='user_error' class="text-danger"></span>
                        <input type="text" name="email" id="email" class="form-control mt-2" placeholder="abc@mailman.com">
                        <span id='email_error' class="text-danger"></span>
                        <input type="text" name="remail" id="remail" class="form-control mt-2" placeholder="Recovery Email Id">
                        <span id='remail_error' class="text-danger"></span>
                        <input type="password" name="pass" id="pass" class="form-control mt-2" placeholder="Enter your password">
                        <span id='pass_error' class="text-danger"></span>
                        <input type="password" name="cpass" id="cpass" class="form-control mt-2" placeholder="Confirm password">
                        <span id='cpass_error' class="text-danger"></span>
                        <div class="box">
                            <input name="checkbox" id="checkbox" type="checkbox" class="mt-2">
                            <span id='check_error'></span>
                            <label for="error_checkbox"> I agree to these <a href="#">Terms and Conditions</a>.</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="submit" id="regbtn" class="btn btn-primary  m-2">
                            </div>
                            <div class="col-md-6">
                                <div id="spinner" class="text-primary"></div>
                                <a id="cheked" class="btn btn-primary m-2 " href="index.php">Sign-in-Instead</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 order-2">
                        <img src="image/login.jpeg" alt="not found" style="height:120px" , width="120px">
                        <input type="file" id="image" name="image" onchange="readURL(this);">
                        <img id="blah" src="https://via.placeholder.com/150/FFFFFF/FFFFFF/?text=IPaddress.netC/O https://placeholder.com/" alt="your image" / height="120px" width="120px" style="padding:10px;">
                        <span id='imgid' class="text-danger"></span>
                    </div>

                </div>
            </form>
        </div>

    </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


    $(document).ready(function() {
        $("#formdata").on("submit", function(e) {
            e.preventDefault();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var username = $("#username").val();
            var email = $("#email").val();
            var remail = $("#remail").val();
            var pass = $("#pass").val();
            var cpass = $("#cpass").val();
            var checkbox = $("#checkbox").val();

            var form_data = new FormData();
            var image = document.querySelector('#image');

            form_data.append("image", image.files[0]);
            form_data.append("submit", true);
            form_data.append('fname', fname);
            form_data.append('lname', lname);
            form_data.append('username', username);
            form_data.append('email', email);
            form_data.append('remail', remail);
            form_data.append('pass', pass);
            form_data.append('cpass', cpass)
            form_data.append('checkbox', checkbox);

            var isChecked = $("#checkbox").is(':checked');
            console.log(isChecked);
            if(isChecked == false){
                $("#check_error").html('<p class="text-danger">please checked it </p>'); return false;
            }else{
                $("#check_error").html('');

            }

            $.ajax({
                url: "reg_user.php",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                data: form_data,
                type: "post",
                success: function(data) {
                    if (!data.response) {
                        $('.success').html('');

                        $.each(data.arrayvalue, function(index, value) {

                            $("#" + index).html(value);
                        });
                    }else{
                        $("#f_error").html('');
                        $("#l_error").html(''); 
                        $("#user_error").html(''); 
                        $("#email_error").html(''); 
                        $("#blah").attr("src","https://via.placeholder.com/150/FFFFFF/FFFFFF/?text=IPaddress.netC/O https://placeholder.com/");
                        $("#remail_error").html('');
                        $("#pass_error").html('');
                        $("#cpass_error").html('');
                        $('.success').html('<p class="alert alert-success">'+data.message+'</p>');
                        $('#formdata')[0].reset();
                          $("#check_error").html('');

                      
                    }
                    
                   
                }
                
            });

        });

    });
</script>