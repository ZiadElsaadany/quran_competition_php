<?php 
include "../db_con.php"  ;


$student_id  =$_GET["id"]; 
$response  = new stdClass( ) ; 
$select = mysqli_query(  
    $con  , 
    "SELECT * FROM `student` WHERE student_id = $student_id"
);
$fetch_student = mysqli_fetch_object(  $select);

if($fetch_student->accept_student == 1)  {  

    $response->status= true; 
    $response->message = "تم قبول الطالب في المسابقة" ;  
  
    echo  json_encode($response);
    
}else{
$update_student = mysqli_query(  
    $con  , 
    "UPDATE `student` SET `accept_student` = '1' WHERE `student`.`student_id` = $student_id "
);

if(mysqli_affected_rows($con) ) {  
    $response->status= true; 
    $response->message = "تم قبول الطالب في المسابقة" ;  
  
    echo  json_encode($response);
}else{ 

    $response->status= false; 
    $response->message = "حدثت مشكلة" ;  
  
    echo  json_encode($response);
 } 
}

?>