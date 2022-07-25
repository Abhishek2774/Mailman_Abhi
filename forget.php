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
    <div class="modelf">
        <h4>MailMan</h4>
        <hr>
        <form action="reset_link.php" method="post" id="resetForm">
        <div class="row">
            <div class="col-sm-8">
                <p>Enter your Registerd Email-id</p>
                <input type="email" class="form-control" id="email" name="email" placeholder="xyx@gmail.com">
                <div class="row">
                <a class="m-2" href="index.php">Back to Login</a>
                <input type="submit" name="submit" class="btn btn-primary m-2">
                </div>
            </div>
            <div class="col-sm-4">
            <img src="image/login.jpeg" alt="not found" style="height:120px", width="120px">
            </div>
        </div>
        </form>
    </div>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("#resetForm").submit(function(e) {
        e.preventDefault();
        var error = 0;
        var email = $("#email").val();
        var data = {
          'reset_link': true,
          'email': email,
        }
        $.post("reset_link.php", data,
          function(data, textStatus, jqXHR) {
            if (!data['response']) {
              $("#" + data['error']).html(data['message'])
            } else {
              alert("sent success")
            }
          },
          "JSON"
        );
      });
    });
  </script>