<?php  

include "../db_con.php";
$response = new stdClass();
$not_accept_arr =array( );  

$chalange_id=  $_GET["id"]; 
$select_students =  mysqli_query (  
    $con, 
    "SELECT student.* , chalange_list.*  FROM `student`,`chalange_list`
     WHERE  
     student.chalange_id = $chalange_id
     AND
     chalange_list.chalange_id = $chalange_id 
     AND 
    student.accept_student = 0  ORDER By   `student_age` ASC,`student_name` ASC "  
) ;

while($row=mysqli_fetch_object( $select_students) )  {  

    $not_accept_arr[ ]= $row; 

}
$response->status= true; 
$response->data= $not_accept_arr; 

echo json_encode($response);


?>