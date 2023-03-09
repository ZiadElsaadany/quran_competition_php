<?php

include "../db_con.php" ; 


$title = $_GET["title"]; 
$link = $_GET["link"] ; 
$date= $_GET["date"]; 
$response = new stdClass();


$add_post = mysqli_query(
    $con, 
    "INSERT INTO `posts` (`post_title`, `post_link`,`date`) VALUES ( '$title', '$link','$date')"
);


if(mysqli_insert_id($con)) {  

    $response->status =true; 
    $response->message ="لقد قمت بالاضافة";
    $response->id = mysqli_insert_id($con);
echo json_encode($response); 
}else{ 
    $response->status = false; 
    $response->message = "حدثت مشكلة" ; 
}



?>