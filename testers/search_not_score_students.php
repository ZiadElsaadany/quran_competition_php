<?php 
 
 
 include "../db_con.php";

$not_solved_array = array( )  ;    
 

$chalange_id =  $_GET["id"] ;
$name =  $_GET["name"] ;   

$response =new stdClass() ;
 $select_student  =  mysqli_query (

    $con  , 
    "SELECT * FROM `student` WHERE chalange_id  = $chalange_id AND student.accept_student = 1 AND student.student_name LIKE '%$name%' ORDER BY  `student_age` ASC,  `student_name` ASC 
    
    "

 )  ;
while($row = mysqli_fetch_object($select_student))  {  
    $select_scores =mysqli_query (  
        $con , 
        "SELECT * FROM `student_scores` WHERE `student_id` = '$row->student_id'
      
        "   
     ) ;

     if(mysqli_num_rows($select_scores)  == 0 ) {

        $not_solved_array[] = $row; 
        
     }
     
}
$response->status= true ;
$response->data = $not_solved_array; 

echo json_encode($response) ; 



?>