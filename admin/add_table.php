<?php 

include "../db_con.php"; 

$challenge_name = $_GET["name"]; 
$category_name = $_GET["type"]; 
$date = $_GET["date"]; 
$time = $_GET["time"]; 

$response = new stdClass();

$select = mysqli_query( 
    $con , 
    "SELECT  * FROM `tables_time`  WHERE `chalange_name` = '$challenge_name'"
); 


if(mysqli_num_rows($select)) { 

    $response->status = false; 
    $response->message = "قمت اضافة هذه المسابقة من قبل" ;
    echo json_encode($response);   
    
}
else{ 

$add_table  = mysqli_query(
    $con, 
    "INSERT INTO `tables_time` ( `chalange_name`, `time`, `date`, `category_name`) 
    VALUES ( '$challenge_name', '$time', '$date', '$category_name')
    " 
);


if(mysqli_insert_id($con))   {  
    $response->status = true; 
    $response->message = "قمت باضافة موعد جديد" ;
    echo json_encode($response);
 
}
else {  
    $response->status = false; 
    $response->message = "حدثت مشكلة" ;
    echo json_encode($response);

}


}


?>