<?php  

 include "../db_con.php"  ; 
   
  $success_student_arr = array( ) ; 
  
  $chalange_id =$_GET["id"] ; 
  $response  =  new stdClass() ;

  $select_success_student = mysqli_query(   
    $con , 
    "SELECT student_scores.*, student.*, chalange_list.*FROM student_scores , student, chalange_list   WHERE 
    student_scores.`score_value` >= 75 

      AND 
      student_scores.chalange_id = $chalange_id
      AND
      student.student_id = student_scores.student_id
      AND 
        student_scores.chalange_id = chalange_list.chalange_id
      AND
      student.accept_student = 1
    
     ORDER BY  `student_age`  ASC,  `student_name` ASC
    " 
  );  

  while ($row = mysqli_fetch_object($select_success_student)  )  {   

     $success_student_arr[] = $row ; 

  }
  $response->staus = true; 
  $response->data=  $success_student_arr; 

  echo json_encode($response);

    
    ?>
 
