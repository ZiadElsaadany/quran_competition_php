<?php  

include "../db_con.php";
  
$student_with_final_score_array =array( ) ; 

$chalange_id=$_GET["id"]; 
$response =new stdClass() ;

  $select_student_with_final_score_array =  mysqli_query(   
    $con , 
    "SELECT student_scores.*, student.*, chalange_list.* FROM student_scores , student, chalange_list   WHERE 
    student_scores.`score_value` >= 100

AND student_scores.chalange_id = $chalange_id
  AND student_scores.student_id  = student.student_id

  AND student_scores.chalange_id = chalange_list.chalange_id



    AND student.accept_student=1
    AND 
    student.block_or_not = 'not'

     ORDER BY `student_age` ASC ,`student_name` ASC
    
    " 
  );  


  while($row= mysqli_fetch_object($select_student_with_final_score_array)) {             

    $student_with_final_score_array [] = $row; 

  }
  $response -> status = true; 
  $response->data= $student_with_final_score_array;

  echo json_encode(      $response     ); 

 
  

 

?>