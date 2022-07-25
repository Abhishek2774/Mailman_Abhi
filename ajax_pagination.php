<?php 
session_start();
include"config.php";
$limit_per_page = 5;
$login_user = $_SESSION['login_user_Email'];
$page ="";
if(isset($_POST['page_no'])){
    $page = $_POST['page_no'];
}else
{
    $page = 1;
}
    $offset = ($page -1)* $limit_per_page;

    $sql = "SELECT * FROM All_emails LIMIT {$offset},{$limit_per_page}";
    $result = mysqli_query($conn,$sql)or die("Query failed");
    $output = "";
    if(mysqli_num_rows($result) > 0){
        $output.='<table>';

    while($row= mysqli_fetch_assoc($result)){
    
        $output .="<tr><td><input type='checkbox'></td><td>{$row["reciver_email"]}</td><td>{$row["subject"]}</td><td>{$row["datetime"]}</td><td><i class='fa fa-trash fa-lg' id='del' aria-hidden='true'></i></td></tr>";
    }
    $output .="</table>";

    $sql = "SELECT * FROM All_emails";
    $result = mysqli_query($conn,$sql)or die("Query failed");
    $total_record = mysqli_num_rows($result);
    $total_pages = ceil($total_record/$limit_per_page);
   
    // $output.='<div class="row text-xs-center">';
    $output .='<div id="pagination" class="d-flex">';
        for($i=1; $i <= $total_pages; $i++){
            $output.="<a class='page-link' id='{$i}' href='#'>{$i}</a>";
        }
  $output .='</div>';
//   $output.='</div>';
        echo $output;
}else{
    echo "No Record Found";
}




?>
