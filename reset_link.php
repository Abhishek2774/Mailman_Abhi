<?php
include 'autoload.php';
$gobj = new Database();
include 'mail.php';

if (isset($_POST['reset_link'])){
    $email_add=$_POST['email'];

        $sql = "SELECT remail from Reg_userid where email='{$email_add}'";
        $result = $gobj->mysqli->query($sql);
        // print_r($result);die('sdffd');

        if ($result->num_rows) {
            $data = $result->fetch_assoc();
            $reset_link = md5(time());
            // print_r($data);die('sdffd');
            $unique_id = base64_encode($email);
            $subject = "Reset Link for reseting password";
            $html = "
            <h1>Click on the given link to reset password</h1> 
            <a href='http://localhost/Abhishek_mailman/reset_password_bakend.php?reset=" . $reset_link . "&unique_id=" . $unique_id . "' style='    color: #fff;background-color: #B8FF33;border-color: #198754;padding: 0.5rem 1rem;font-size: 1.25rem;border-radius: 0.3rem;'>Reset Password</a>";
        //    print_r($html);die('sdffd');
            $ob_email = new sendEmail();
            $ob_email->email_send($data['remail'], $subject, $html, 'Hestabit');
            $sql = "UPDATE Reg_userid set reset_link='$reset_link' where email='{$email_add}'";
            $res = $gobj->mysqli->query($sql);
            echo json_encode([
                'response' => true,
            ]);
        } else {
            echo json_encode([
                'response' => false,
                'message' => "invalid email",   
                'error' => "error"
            ]);
        }


}
