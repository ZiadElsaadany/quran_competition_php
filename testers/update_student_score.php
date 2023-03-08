<?php  
include "../db_con.php" ; 
 $student_id = $_GET["id"]; 
 $score_value = $_GET["score"] ;
 $response  = new stdClass( )  ;

 $select = mysqli_query ( 
    $con , 
    "SELECT * FROM `student_scores` WHERE `student_id` = '$student_id'"
  ) ; 
  $fetch = mysqli_fetch_object( $select);
  if($fetch->score_value == $score_value) {
    $response->status  = true; 
    $response->message = "تم تعديل الدرجة" ;   
    echo  json_encode($response); 
  } 
  else{ 
  $update_student = mysqli_query( 
$con , 
"UPDATE `student_scores` SET `score_value` = '$score_value' WHERE `student_id` = '$student_id'"
  ) ;
  if(mysqli_affected_rows($con ))  { 
    
    $response->status  = true; 
    $response->message = "تم تعديل الدرجة" ;   
    echo  json_encode($response); 
  }  else { 

    $response->status  = false; 
    $response->message ="حدثت مشكلة" ;   
    echo  json_encode($response);   }
  }

?>