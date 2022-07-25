<?php   
session_start(); //to ensure you are using same session
session_unset();
session_destroy(); //destroy the session
header("location:http://hestalabs.com/tse/Mailman_Abhi/index.php"); //server
// header("location:http://localhost/Mailman_Abhi/index.php"); // local
exit();
?>
