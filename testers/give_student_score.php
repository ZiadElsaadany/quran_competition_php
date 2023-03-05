<?php


include "../db_con.php" ; 


$student_id = 15   ; 
$tester_id=   1 ;
$score_value  = 400 ;
$chalange_id= 1 ; 


$insert_score  = mysqli_query   (
    $con, 
    "INSERT INTO `student_scores` (`student_id`, `tester_id`, `date`, `score_value`, `chalange_id`) 
                             VALUES ( '$student_id', '$tester_id', current_timestamp(), '$score_value', '$chalange_id')"
 )  ;

 


 if( mysqli_insert_id($con) ) {

   $select = mysqli_query( 
       $con ,
       "SELECT student_scores.*,student.*,chalange_list.*  FROM  `student_scores`, `student` ,`chalange_list` 
       
       
       WHERE
       
       chalange_list.chalange_id = $chalange_id AND
       
        student.`student_id` = '$student_id'  AND student_scores.`student_id`  = '$student_id' "
   );


   $fetch = mysqli_fetch_object($select); 
   // [] --> map
   $map = [
      "status" => "true", 
      "message" => "تم اضافة الدرحة" , 
      "score_value" => $fetch

   ];
    
    echo json_encode($map); 

 }else{  
    echo "no score instered"; 
 }

?>