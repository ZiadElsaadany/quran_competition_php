<?php  
 

   include "../db_con.php";

    

   $array_students = array( );
   $search_name =$_GET["q"]; 
   $category_name= $_GET["categoryName"] ; 

   $response = new stdClass();
   
 $select_student = mysqli_query(  
    $con, 
    "SELECT student.*, chalange_list.* FROM `student`, `chalange_list` WHERE
     `student_name` LIKE '%$search_name%' AND student.chalange_id = chalange_list.chalange_id
     AND student.main_category='$category_name'
     
     AND student.accept_student = 1
     " 
 ) ;


 
while ( $row = mysqli_fetch_object($select_student))  {  

    $array_students[ ] = $row ; 

}
$response->status =true;
$response->data = $array_students;
echo  json_encode($response); 


?>