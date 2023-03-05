<?php 


include "../db_con.php";


 
$all_studnt_array = array( ); 
$category_name = $_GET["category_name"];
$response = new stdClass( )  ; 
$select_all_student = mysqli_query(

    $con , 
    "SELECT student.*, chalange_list.* FROM  `student`, `chalange_list`
    WHERE student.chalange_id= chalange_list.chalange_id
    AND student.accept_student=1 AND
    chalange_list.main_category = '$category_name'
     ORDER BY `student_name` ASC"
) ; 


while( $dataRow = mysqli_fetch_object($select_all_student) ) {
    
    $all_studnt_array [] = $dataRow; 

}
$response->status = true;  
$response->data  =$all_studnt_array; 

echo   json_encode( $response); 



?>