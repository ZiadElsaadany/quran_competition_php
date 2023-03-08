<?php

include "../db_con.php" ; 


$title = $_GET["title"]; 
$link = $_GET["link"] ; 

$response = new stdClass();


$add_post = mysqli_query(
    $con, 
    "INSERT INTO `posts` (`post_title`, `post_link`) VALUES ( '$title', '$link')"
);


if(mysqli_affected_rows($con)) {  

    $response->status =true; 
    $response->message ="لقد قمت بالاضافة";
    $response->id = mysqli_insert_id($con);
echo json_encode($response); 
}else{ 
    $response->status = false; 
    $response->message = "حدثت مشكلة" ; 
}



?>