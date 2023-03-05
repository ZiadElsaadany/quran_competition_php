<?php  




include "../db_con.php" ; 




 $student_id = 2; 
 $score_value = 100 ;

 $select = mysqli_query ( 
    $con , 
    "SELECT * FROM `student_scores` WHERE `student_id` = '$student_id'"
  ) ; 


  $fetch = mysqli_fetch_object( $select);
 
  if($fetch->score_value == $score_value) {  
    echo  "uodated"  ;
  } 
  else{ 
  $update_student = mysqli_query( 
$con , 
"UPDATE `student_scores` SET `score_value` = '$score_value' WHERE `student_id` = '$student_id'"
  ) ;
  if(mysqli_affected_rows($con ))  { 
    echo "updated"; 
  }  else { 
    echo "error" ; 
  }
  }

?>