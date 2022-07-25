<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailman</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <div class="header text-danger"></div>
        <div class="row border">
            <div class="col-md-8 py-5">
                <img src="image/keys.jpeg" alt="not found">
            </div>
            <div class="col-md-4 py-5">
                <form action="index.php"  id="newform">
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" id="newpass" name="newpass" class="form-control">
                        <span id="pass_error"> </span>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" id="cpass" name="cpass" class="form-control">
                        <span id="cpass_error"> </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="submit">Reset</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        var reset = "<?php echo $_GET['reset']; ?>"
        var unique_id = "<?php echo base64_decode($_GET['unique_id']); ?>"
        $("#newform").submit(function(e) {
            e.preventDefault();
            var error = 0;
            
            var newPass = $("#newpass").val();
            var cpass = $("#cpass").val();
            var data = {
                'submit': true,
                'NewPassword': newPass,
                'Confpassword': cpass,
                'link_data': reset,
                'user_id': unique_id

            }
            $.post("set_new_password_db.php", data,
                function(data, textStatus, jqXHR) {
                    if (!data['response']) {
                        $("#" + data['error_msg']).html(data['message'])
                    } else {
                        location.href = "index.php"
                    }
                },
                "JSON"
            );
        });
    });
</script>