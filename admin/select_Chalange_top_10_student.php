<?php   
 
 include "../db_con.php";
 
 $students_10_top_array = array( ); 
 

 $chalange_id = $_GET["id"];
 $response=new  stdClass( ) ;

  $select_student_10_top =  mysqli_query(   
   $con , 
   "SELECT student_scores.*, student.*, chalange_list.*FROM student_scores , student, chalange_list 

/* 27  */
    WHERE
    student_scores.chalange_id = $chalange_id
/* 4  */

     AND
     chalange_list.chalange_id = student_scores.chalange_id
     AND

     student.student_id = student_scores.student_id
     AND 
     student.accept_student = 1
     AND
     student.block_or_not= 'not'

    ORDER BY  `score_value` DESC, `student_age` ASC ,`student_name` ASC   LIMIT 20
   " 
 );  

 while($row = mysqli_fetch_object($select_student_10_top) ){ 
    $students_10_top_array [] = $row; 
 } 

 $response->staus = true; 
 $response->data = $students_10_top_array; 


 echo json_encode($response); 
?>