<?php  


include "../db_con.php"; 
$post_id= $_GET["id"]; 

$response = new stdClass( ); 


$select = mysqli_query(
    $con, 
    "SELECT * FROM  `posts` WHERE posts.post_id = '$post_id'"
);

if(mysqli_num_rows($select) == 0 ) {  
    $response->status = true; 
    $response->message ="تم المسح"; 
    echo json_encode($response);
}else{ 


$delete= mysqli_query(
    $con, 
    "DELETE FROM `posts` WHERE `posts`.`post_id` = '$post_id'"
);

if(mysqli_affected_rows($con)) {  
$response->status = true; 
$response->message ="تم المسح"; 
echo json_encode($response);
}else{
    $response->status =false;
    $response->message ="حدثت مشكلة";
echo json_encode($response);

 }
}


?>