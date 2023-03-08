<?php


include "../db_con.php" ; 

$student_id = $_GET["student_id"]   ; 
$tester_id=   $_GET["tester_id"] ;
$score_value  = $_GET["score"] ;
$challenge_id= $_GET["challenge_id"]; 


$response = new stdClass( ) ; 


$insert_score  = mysqli_query   (
    $con, 
    "INSERT INTO `student_scores` (`student_id`, `tester_id`, `score_value`, `chalange_id`) 
                             VALUES ( '$student_id', '$tester_id', '$score_value', '$challenge_id')"
 )  ;



 if( mysqli_insert_id($con) ) {

   $response->status= true; 
   $response->message = "تم اضافة الدرحة"; 
    
    echo json_encode($response); 

 }else{  
   
   $response->status= false; 
   $response->message = "حدثت مشكلة"; 
    
    echo json_encode($response); 

 }

?>