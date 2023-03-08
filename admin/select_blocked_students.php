<?php

include "../db_con.php" ;

$blocked_students = array();
$response = new stdClass();

$select = mysqli_query(
    $con , 
    "SELECT student.* ,chalange_list.*  FROM `student`,`chalange_list` WHERE `block_or_not` = 'blocked' 
    
    AND student.chalange_id =  chalange_list.chalange_id  ORDER BY `student_age` ASC , `student_name` ASC
    "
);


while($row =  mysqli_fetch_object($select))  { 
    
    $blocked_students = $row ; 
}

$response->status = true; 
$response->data = $blocked_students; 
echo json_encode($response); 




 
  

?>