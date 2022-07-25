<?php   
session_start(); //to ensure you are using same session
session_unset();
session_destroy(); //destroy the session
header("location:http://hestalabs.com/tse/Abhishek_mailman/index.php"); //server
// header("location:http://localhost/Abhishek_mailman/index.php"); // local
exit();
?>
