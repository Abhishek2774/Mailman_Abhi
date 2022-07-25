<?php
$conn = new mysqli("localhost","root","hestabit","bitmail");
header("Content-type: application/json");
header("Access-control-Allow-Origin: *");
header("Access-control-Allow-methods: GET");
header("Access-control-Allow-Headers: ccess-control-Allow-Headers,Content-type,Access-control-Allow-methods,Authontication,X-Requested-with");


$sql =  "SELECT * FROM All_emails";

        $result_data = mysqli_query($conn,$sql) or die("Query failed");

        if(mysqli_num_rows($result_data) > 0){

            $output = mysqli_fetch_all($result_data,MYSQLI_ASSOC);
            echo json_encode($output);
        }else{
            echo json_encode(array("msg"=> "0 Result found","status"=> false));
        }
        
 
?>