<?php  

  include "../db_con.php"; 
    $student_of_chalanges_arr = array() ;
    $chalange_id = $_GET["id"] ; 
    $name = $_GET["name"] ;
    $response = new stdClass() ; 
 
$select_from_student   = mysqli_query( 
$con , 
"SELECT `student_scores`.*,student.*  FROM `student_scores`, student WHERE
student_scores.student_id  = student.student_id AND 
student.`chalange_id` = '$chalange_id'
AND student_scores.chalange_id = '$chalange_id' AND `student`.student_name LIKE '%$name%' ORDER BY  `student_age` ASC,  `student_name` ASC 
"
);   
while($row = mysqli_fetch_object($select_from_student  )) {  
   
    $student_of_chalanges_arr [ ]= $row ; 


}

$response->status =true; 
$response->data =   $student_of_chalanges_arr;  
echo json_encode (  
  $response
);
    
  
  



?>