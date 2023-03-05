<?php  

  include "../db_con.php"; 
    $student_of_chalanges_arr = array() ;
    $chalange_id = 1 ; 

$select_from_student   = mysqli_query( 
$con , 
"SELECT *  FROM `student` WHERE  `chalange_id` = '$chalange_id'"
);   



while($row = mysqli_fetch_object($select_from_student  )) {  
   
    $student_of_chalanges_arr [ ]= $row ; 


}
echo json_encode (  
  $student_of_chalanges_arr
) ;




  
  



?>