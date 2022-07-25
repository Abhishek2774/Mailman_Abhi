
['user'=>'$uname,'email'=>'abhi@gmail.com','fname'=>'abhi','lname'=>'kumar','pass'=>'abhi123','cpass'=>'abhi@123','dob'=>'2001-07-10','image'=>'aa.jpg','semail'=>'rohit@gamil','t_condition'=>'on']

// registration form 

<div class="container">
    <div class="model">
        <h1>Ragistration Here</h1>
   <form action="#" method="POST">

    <div class="row">
            <div class="col-6">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="uname" required="true">
                    </div>
             </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required="true">
                    </div>
                </div>
</div>
     <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="fname" required="true"> 
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="lname" required="true">
            </div>
        </div>
</div>
  <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" name="pass" required="true">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Confirm password</label>
                <input type="text" class="form-control" name="cpass" required="true">
            </div>
        </div>
</div>
<div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">D.O.B</label>
                <input type="date" class="form-control" name="dob" required="true">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Profile</label>
                <input type="file" class="form-control" name="file" >
            </div>
        </div>
</div>
<div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Secondry Email</label>
                <input type="text" class="form-control" name="semail" required="true">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <div class="box">
                    <input name="checkbox" type="checkbox"/ required="true">
                    <label for="checkbox"> I agree to these <a href="#">Terms and Conditions</a>.</label>
                </div>
        </div>
        </div>
 </div>
 <div class="row">
        <div class="col-6">
            <div class="form-group">
                   <input type="submit" name="submit" class="btn btn-primary" style="float:right">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                  <a href="login.php">Login</a>
            </div>
        </div>
        </div>
    </div>
   </form>
    </div>
    </div>

    // ajax jquery 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    // associate array
    //  $data = [
    //         'fname' => $_POST["fname"],
    //         'lname' => $_POST["lname"],
    //         'username' => $_POST["username"],
    //         'email' => $_POST["email"],
    //         'remail' => $_POST["remail"],
    //         'remail' => $_POST["remail"],
    //         'pass' => $_POST["pass"],
    //         'cpass' => $_files["cpass"],
    //         'checkbox' => $_POST["checkbox"]
            
    //     ];
        

    <div class="topnav">
    <nav class="navbar navbar-expand-sm bg-dark navbar-light py-4 static-top shadow ">
        <h3 style="color:white">MailMan</h3>
        <form class="form-inline mx-auto" id="search" >
        <input class="form-control mr-sm-2 navbar-search" type="text" placeholder="Search">
        </form>
        <div class="profile">
        <p  style="color: white" class="mr-sm-2 mt-3 pr-4 ">Abhi</p>
        </div>
        <img src="image/login.jpeg" alt="not found" width="50" height="50" class="rounded-circle border border-warning">
    </nav>
</div>


    ?>
    echo json_encode(array("msg"=> "data are not fatch", "status"=> false));


    //
    if(isset($_POST['submit'])){

        //check  validation of form 
        
           if(Validate::required($fname)){
                array_push($result, "First name is required");
            }elseif(Validate::is_alphanum($fname)){
                array_push($result, " First name shuld be alphabetic");
            }elseif(Validate::required($lname)){
                array_push($result, "last name is required");
            }elseif(Validate::is_alphanum($lname)){
                array_push($result, " Last name shuld be alphabetic");
            }elseif(Validate::required($username)){
                array_push($result, "username is required");
            }elseif(Validate::is_alphanum($username)){
            array_push($result, " username name shuld be alphabetic");
            } elseif(Validate::required($email)){
                array_push($result, "Email is required ");
            }elseif(Validate::is_email($email)){
                array_push($result,"Invalide Email");
            }elseif(Validate::required($remail)){
            array_push($result, "Email is required ");
            }elseif(Validate::is_email($remail)){
            array_push($result,"Invalide Email");
            }elseif(Validate::is_valid_password($pass)){
                array_push($result, " Password should be at least 8 characters in <br> length and should include at least one upper case letter,<br> one number, and one special character.';");
            }elseif(Validate::ic_conf_pass($pass,$cpass)){
                array_push($result,"Password are not Match");
            }elseif(Validate::is_profile($image)){
                array_push($result, "Only PNG and JPG are allowed. <br> and size shuld not be exceeds 2MB");
            }elseif(Validate::check($checkbox)){
                array_push($result,"Please click on checkBox");
            }else{
                // call here to insert data in database
            }
            
         }


    if(Validate::required($email) || Validate::is_email($email)){
        array_push($result, "Email is required && Invalide Email");
        }else{
        echo $email = $_POST['email'];
        }
        
    if(Validate::required($fname) || Validate::is_alphanum($fname)){
        array_push($result, "name is required & shuld be alphabetic");   
    }else{
        echo $fname = $_POST['fname'];
    }
    if(Validate::required($lname) || Validate::is_alphanum($lname)){
        array_push($result, "last name is required & shuld be alphabetic");
    }else{
        echo $lname = $_POST['lname'];
    }
    if(Validate::is_alphanum($username) || Validate::required($username) || Validate::requiredis_specil_ch($username)){
        array_push($result, " username is required & shuld be alphabetic No specila Charecter allowed");
    }else{
        echo $username = $_POST['username'];
    }


    //
    // $data = [
        //             'fname' => $_POST["fname"],
        //             'lname' => $_POST["lname"],
        //             'username' => $_POST["username"],
        //             'email' => $_POST["email"],
        //             'remail' => $_POST["remail"],
        //             'remail' => $_POST["remail"],
        //             'pass' => $_POST["pass"],
        //             'cpass' => $_files["cpass"],
        //             'checkbox' => $_POST["checkbox"]
                    
        //         ];

                // echo "<pre>";
                // print_r($data);

                // if($gobj->fetch_email('Reg_user',$email)){
                //     $result = $gobj->getResult();
                //     }



                /////////////

                $target_dir = "upload/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $folder = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        
                    $data = [
                        'fname' => $_POST["fname"],
                        'lname' => $_POST["lname"],
                        'username' => $_POST["username"],
                        'email' => $_POST["email"],
                        'remail' => $_POST["remail"],
                        'pass' => $_POST["pass"],
                        'cpass' => $_POST["cpass"],
                        'image' => $target_file,
                        't_condition' => $_POST["checkbox"]
                        
                    ];  
                    
                    if($gobj->insert('Reg_userid',$data)){
                        if($result = $gobj->getResult()){
        
                        }
                
                    }

                    if($gobj->fetch_email('Reg_userid',$email)){
                        $result = $gobj->getResult();
                 }else{
            
                    echo "okk";   
            
                 } 
                

                 /////////
                 include "autoload.php";
$gobj = new Database();
$result_error= array();
if(isset($_POST['submit'])){
     $email = $_POST['email'];
     if(Validate::required($email)){
        echo "<script>
                alert('Email is required');
                window.location.href='http://localhost/mailman/forgat.php';
                </script>";  
     }elseif(Validate::is_email($email)){
        echo "<script>
        alert('Invalid Email');
        window.location.href='http://localhost/mailman/forgat.php';
        </script>";  
     }else{
      echo $email = $_POST['email'];
     }
}

/////////////
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

///////////////////
event.preventDefault();
      var toemail = $("#toemail").val();
      var subject = $("#subject").val();
      var msg = $("#msg").val();

      if(IsEmail(toemail)==false){
                alert("invalid Email");
                return false;
            }

            ?>

............................
fetch data from dbms and show 

// loadtable();

// function loadtable() {
//   $("#load-table").html("");
//   $.ajax({
//     url: "http://localhost/mailman/fetch_data_table.php",
//     type: "GET",
//     success: function(data) {
//       if (data.status == false) {
//         $("#load-table").append("<tr><td><h3>Data Not Found</h3></td></tr>");
//       } else {
//         $.each(data, function(key, value) {
//           $("#load-table").append("<tr><td><input type='checkbox'></td><td>" + value.reciver_email + "</td><td>" + value.subject + "</td><td>" + value.datetime + "</td></tr>");
//         });

//       }
//     }
//   });

// }
......................................
<?php foreach($result as $item){ echo $item; }?>

..........................................................................................

// ajax pagination...............start

// function paginationload(page) {
//   $("#load-table").html("");
//   $.ajax({
//     url: "ajax_pagination.php",
//     type: "POST",
//     data: {
//       page_no: page
//     },
//     success: function(data) {
//       $("#load-table").html(data);
//     }
//   });
// }
// paginationload();
// $(document).on("click", "#pagination a", function(e) {
//   event.preventDefault();
//   var page_id = $(this).attr("id");
//   paginationload(page_id);
// });
//ajax pagination......................End

...................................................  
echo   $fname = $_POST['fname'];
      echo    $lname = $_POST['lname'];
      echo   $remail= $_POST['remail'];
        $image = $_FILES['file'];
print_r($image);

.................................. 
select * from All_emails 
where ((sender_status=0 and reciver_status=1) or (sender_status=1 and reciver_status=0)or (sender_status=0 and reciver_status=0)) and sender_email="abhihesta@mailman.com"

.......................................... 
$(".del").click(function(){
        $.ajax({
            url : "Trash_email_by_reciver.php",
            type:"post",
            data:{id : check_id},
            dataType: "json",
            success:function(data){
              document.location.reload();
            }
        });
    });

    ........................................... 
    <div class="container">
  <h2>Panel Heading</h2>
  <div class="panel panel-default">
    <div class="panel-heading">Panel Heading</div>
    <div class="panel-body">Panel Content</div>
  </div>
</div>
.................................. 
// $("#email").on("blur", function() {
    //         var email_id = $(this).val();
    //         // alert(email_id);
    //         $.ajax({
    //             url : "check_email.php",
    //             dataType: "json",
    //             type : "post",
    //             data : {id: email_id},
    //             success:function(data){
    //                 if(data.status == true){
    //                     $("#email_error").html(data.msg);
    //                 }else{
    //                     $("#email_error").html("");
    //                 }
    //             }
    //         });
    //     });
    ............................................................................  
    / create variable for store data
      // echo   $fname = $_POST['fname'];
      //  echo   $lname = $_POST['lname'];
      //  echo  $username = $_POST['username'];
      //  echo   $email = $_POST['email'];
      //  echo  $remail = $_POST['remail'];
      // echo  $pass= $_POST['pass'];
      //  echo   $cpass = $_POST['cpass'];
      //  echo  $checkbox = $_POST['checkbox'];


      $image = $_FILES['image']['name'];

       var_dump($image);
  
        

        // echo "<pre>";
        // print_r($_FILES['image']);
        // // print_r($image);
        // exit;

        // if(isset($image)){
        //     // $errors= array();
        //     $file_name = $_FILES['image']['name'];
        //     $file_size = $_FILES['image']['size'];
        //     $file_tmp = $_FILES['image']['tmp_name'];
        //     $file_type = $_FILES['image']['type'];
        //     $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        //     echo $file_ext; die;
            
        //     $expensions= array("jpeg","jpg","png");
            
        //     if(in_array($file_ext,$expensions)=== false){
        //         // echo"sjhdghsd";

        //     //    echo json_encode(["extension not allowed, please choose a JPEG or PNG file."]);
        //        exit;
        //     }
            
        //     if($file_size > 2097152) {
        //         echo"sjhdghsd";
        //     //    echo json_encode(["File size must be excately 2 MB"]);
        //        exit;
        //     }
            
           
        //  }

        //  echo json_encode($output);


        // if(empty($_POST["image"])){
        //     $imageError = "";
        //     } else {
        //     $image = check_input($_POST["image"]);
        //     $allowed =  array('jpeg','jpg', "png", "JPEG","JPG", "PNG");
        //     $ext = pathinfo($image, PATHINFO_EXTENSION);
        //     if(!in_array($ext,$allowed) ) {
        //     $imageError = "jpeg only";
        //     echo json_encode(["msg"=> $imageError, "status"=> false]);
        //     }
        //     }
        //     function check_input($data) {
        //         $data = trim($data);
        //         $data = stripslashes($data);
        //         $data = htmlspecialchars($data);
        //         return $data;
        //     }

// if($fname !='' && $lname !='' && $username != '' &&  $email !='' && $remail !='' && $pass !='' && $cpass !='' &&  $checkbox !='' && $image !=''){
  
//     $target_dir = "../upload";
//         $target_file = $target_dir . basename($_FILES["image"]["name"]);
//         $folder = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

//             $data = [
//                 'fname' => $_POST["fname"],
//                 'lname' => $_POST["lname"],
//                 'username' => $_POST["username"],
//                 'email' => $_POST["email"],
//                 'remail' => $_POST["remail"],
//                 'pass' => $_POST["pass"],
//                 'cpass' => $_POST["cpass"],
//                 'image' => $target_file,
//                 't_condition' => $_POST["checkbox"]
                
//             ];  

//             if($gobj->insert('Reg_userid',$data)){
//                 $result = $gobj->getResult(); 
//                 echo json_encode(["status" => true, "type" => "user_registered", "message" => "Your account created successfully."]); exit;
                  
//             }

// }


/////////////////////////////////////////////// Validation uing jquery ////////////////////////


var namereg = /^[A-Za-z]+$/;
            if (fname == '' || fname == null) {
                error++;
                $('#f_error').text('First name is required.');
            } else if (!namereg.test(fname)) {
                error++;
                $('#f_error').text('Only latter are Allowed');
            } else {
                $('#f_error').text('');
            }
            var lnamereg = /^[A-Za-z]+$/;
            if (lname == '' || lname == null) {
                error++;
                $("#l_error").text("Last name is Required");
            } else if (!lnamereg.test(lname)) {
                error++;
                $("#l_error").text("Only latter are Allowed");
            } else {
                $('#l_error').text('');
            }
            if (username == '' || username == null) {
                error++;
                $("#user_error").text("Username is Required");
            } else if (username) {
                $.ajax({
                    url: "check_email_username.php",
                    dataType: "json",
                    type: "post",
                    data: {
                        username: username
                    },
                    success: function(data) {
                        if (data.status == true) {
                            error++;
                            $("#user_error").html(data.msg);
                        } else {
                            $("#user_error").html("");
                        }
                    }
                });
            }

            var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (email == '' || email == null) {
                error++;
                $('#email_error').text('Email is required');
            } else if (!emailRegex.test(email)) {
                error++;
                $('#email_error').text('Enter Valid email id');
            } else if (email) {
                $.ajax({
                    url: "check_email_username.php",
                    dataType: "json",
                    type: "post",
                    data: {
                        id: email
                    },
                    success: function(data) {
                        if (data.status == true) {
                            error++;
                            $("#email_error").html(data.msg);
                        } else {
                            $("#email_error").html("");
                        }
                    }
                });
            }

            var RecoveremailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (remail == '' || remail == null) {
                error++;
                $('#remail_error').text('Recovery Email is required');
            } else if (!RecoveremailRegex.test(email)) {
                error++;
                $('#remail_error').text('Enter Valid  Recover email id');
            } else {
                $('#remail_error').text('');

            }

            var passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{6,}/;
            if (pass == '' || pass == null) {
                error++;
                $('#pass_error').text('Password is required');
            } else if (!passRegex.test(pass)) {
                error++;
                $('#pass_error').text('Invalide Password');
            } else {
                $('#pass_error').text('');

            }

            if (cpass == '' || cpass == null) {
                error++;
                $("#cpass_error").text('Confirmed password are Required');
            } else if (cpass != pass) {
                error++;
                $("#cpass_error").text('Confirmed password are not match');
            } else {
                $("#cpass_error").text('');
            }

            let isChecked = $('#checkbox')[0].checked;
            if (isChecked == false) {
                error++;
                $("#check_error").html('<p class="text-danger">please checked</p>');
            } else {
                $("#check_error").html("");

            }

            if (error > 0) {
                return false;
            } else {

                $.ajax({
                    url: "reg_user.php",
                    type: 'post',
                    dataType: "json",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data.message);

                    }
                });

            }


............................ reg_user.php......................................... 

if ($lname == '' and $lname == null) {
    $result['l_error'] = 'Please Enter Last Name';
  } else if (!preg_match($namepattern, $lname)) {
    $result['l_error'] = 'Only letters allowed';
  } else {

    $result['l_error'] = '';
  }


  if ($username == null) {
    $result['user_error'] = 'Please fill  User Name';
  } else {
    $gobj = new Database();
    $sql = "SELECT username  from Reg_userid where username  = '$username'";
    $result = $gobj->mysqli->query($sql);
    if ($result->num_rows > 0) {
      $result['user_error'] = 'Username already Exist';
    } else {
      $result['user_error'] = '';
    }
  }

 
  if (!preg_match($primary_email, $email)) {
    $email = $_POST['email'] . "@mailman.com";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $result['email_error'] = 'email address not vlaid';
  } else {
    $gobj = new Database();
    $sql = "SELECT email from Reg_userid where email = '$email'";
    $result = $gobj->mysqli->query($sql);
    if ($result->num_rows > 0) {
      $result['email_error'] = 'email address not unique';
    } else {
      $result['email_error'] = '';
    }
  }

  if (!preg_match($recover_pattern, $remail)) {

    $result['remail_error'] = 'Invalid Email';
  } else {

    $result['remail_error'] = '';
  }

  if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,20}$/', ($pass))) {
    $result['pass_error'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
  } else {

    $result['pass_error'] = '';
  }

  if ($pass != $cpass) {
    $result['cpass_error'] = 'Password should be same';
  } else {

    $result['cpass_error'] = '';
  }


  // $path = "upload";
  // $temp_name = $images['tmp_name'];
  // $name = $images['name'];
  // $path = $path . "/" . $name;
  // if ($images != null) {
  //   $allowed =  array('jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG');
  //   $ext = pathinfo($images['name'], PATHINFO_EXTENSION);
  //   if (!in_array($ext, $allowed)) {
  //     $result['imgid'] = 'Please updload valid image';
  //   } else if ($images['name']['size'] > 200000) {
  //     $result['imgid'] = 'size should be less than 2 kb';
  //   } else {
  //     move_uploaded_file($temp_name, $path);
  //     $result['imgid'] = '';
  //   }
  // }


  echo json_encode($result);
  // $count = 0;
  // foreach ($result as $key => $value) {
  //   if ($value != '') {
  //     $count = 1;
  //     break;
  //   }
  // }

  // if ($count == 1) {
  //   echo json_encode(
  //     [
  //       "type" => "form_error",
  //       "arrayvalue" => $result,
  //       "response" => false
  //     ]
  //   );
  // } else {
  //   $w = "INSERT INTO users(First_name, Last_name ,User_name,Picture, Email, Secordary_mail, Password,Confirmpassword) VALUES ('$Fname', '$Lname', '$Uname','$name', '$Ename', '$Altname', '$Pass','$Altpass')";
  //   $obj->insert($w);
  //   echo json_encode(['response' => true]);
  // }

  ....................................... 


  table += '<div class="container">';
              table += '<div class="row">';
              table += '<div class="card w-100">';
              table += '<h5 class="card-header">' + value.subject + '</h5>';
              table += ' <div class="card-body ">';
              table += '<div class="row p-5">';
              table += '<div class="col-sm-4">';
              table += '<p>from:-' + value.sender_email + '</p>';
              table += '<p>To:-' + value.reciver_email + '</p>';
              table += '</div>';
              table += '<div class="col-sm-4"></div>';
              table += '<div class="col-sm-4">' + value.datetime + '</div>';
              table += '</div>';

              table += '<div class="row p-5">';
              table += '<div class="col-sm-4">';
              table += '<h4>' + value.attechment + '</h4>';
              table += '<p>hello.pnj</p>';
              table += '</div>';
              table += '<div class="col-sm-4"></div>';
              table += '<div class="col-sm-4"></div>';
              table += '</div>';

              table += '</div>';
              table += ' </div>';
              table += '</div>';
              table += '</div>';


              /var/www/html/tse/Abhishek_mailman/image'