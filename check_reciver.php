<?php 
include "autoload.php";
$gobj= new Database();

$reciver_email = $_POST['reciver_email'];

$data = $gobj->Isreciver('Reg_userid',$reciver_email);
 if($data == true){
    echo $data;
 }else{
    echo  $data;
 }

?>
