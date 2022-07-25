<?php
include "autoload.php";
$gobj = new Database();
if (isset($_POST['submit'])) {
    $gobj = new Database();

     $reset_link = $_POST['link_data'];

     $NewPass = $_POST['NewPassword'];

    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,20}$/', ($NewPass))) {
        echo json_encode([
            'response' => false,
            'message' => "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.",
            'error_msg' => 'pass_error'
        ]);
        die;
    }
    $Confpassword = $_POST['Confpassword'];
    if ($NewPass != $Confpassword) {
        echo json_encode([
            'response' => false,
            'message' => "Password should be same",
            'error_msg' => 'cpass_error'
        ]);
        die;
    }
    $sql = "UPDATE Reg_userid SET `pass`  = '$NewPass' , cpass = '$Confpassword' WHERE reset_link = '$reset_link'";
    $res = $gobj->mysqli->query($sql);
    if (mysqli_affected_rows($gobj->mysqli) > 0) {
        echo json_encode(['response' => true]);
    } else {
        echo json_encode(['resnose' => false, 'message' => "failed to change password"]);
    }
}