<?php 
include "autoload.php";
$gobj = new Database();
$message_id = $_POST['message_id'];

$sql = "UPDATE All_emails SET receiver_read_status='1' WHERE id IN (".implode(',',$message_id).")";
$gobj->mysqli->query($sql);

// print_r($_POST['message_id'])
