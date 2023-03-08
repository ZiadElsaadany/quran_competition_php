<?php 


include "../db_con.php" ; 

$json = file_get_contents('php://input') ; 

$obj = json_decode( $json, true ) ;

$title = $obj["title"]; 
$link = $obj["link"] ; 
$id = $obj["id"]; 

$response = new stdClass();


$update_post = mysqli_query(
    $con, 
    "UPDATE `posts` SET `post_title` = '$title' ,`post_link` ='$link' WHERE `posts`.`post_id` = '$id'"
);
if(mysqli_affected_rows($con)){ 
$response->status = true; 
$response->message = "لقد قمت بالتعديل" ;
echo json_encode($response);
}else{
$response->status= false;
 $response->message = "حدثت مشكلة" ; 
 echo json_encode($response);
 }






?>