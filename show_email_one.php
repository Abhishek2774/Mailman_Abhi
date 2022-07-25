<?php 
session_start();
include "autoload.php";
$gobj = new Database();


$trval = $_POST["id"];
$sql = "SELECT * FROM All_emails WHERE id='$trval'";

$result = $gobj->mysqli->query($sql);

// print_r($result);
// die;

if($result->num_rows > 0){

$content = "";
 $row = $result->fetch_all(MYSQLI_ASSOC);

 echo json_encode($row);
 
}else{
    echo json_encode(['msg'=>'0 Result Found', 'status'=> false]);
}
// echo "<pre>";
// print_r($result);


?>
