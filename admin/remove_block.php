<?php 



include "../db_con.php"; 

$student_id =  $_GET["id"]      ;
$response = new stdClass();

$select = mysqli_query( 
    $con , 
    "SELECT * FROM `student` WHERE `student_id` = '$student_id'"
);
$fetch = mysqli_fetch_object(
    $select
);
if($fetch->block_or_not == 'not')
   {
    
    $response->status =true; 
    $response->message="قمت مسح الطالب في القائمة السوداء" ; 
echo json_encode($response) ; 

   }
   else{ 
$blocked_sql = mysqli_query(
    $con, 
    "UPDATE `student` SET `block_or_not` = 'not' WHERE `student`.`student_id` = '$student_id'"
);

if(mysqli_affected_rows($con)) { 
    $response->status = true ; 
    $response->message ="قمت مسح الطالب في القائمة السوداء" ; 
echo json_encode($response) ; 

}else{  
    $response->status = false ; 
    $response->message ="حدثت مشكلة" ; 
echo json_encode($response) ; 

 }
   }




?>