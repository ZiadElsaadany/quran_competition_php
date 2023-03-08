<?php  

// تعديل ال  ID challenge

include  "../db_con.php"; 
$challenge_id = $_GET["challenge_id"]; 
$student_id = $_GET["student_id"]   ;
$response  = new stdClass(); 
$select_before_update = mysqli_query(
    $con , 
    "SELECT student.chalange_id FROM `student` WHERE student_id = '$student_id'"
);

$fetch_obj = mysqli_fetch_object($select_before_update);

if($fetch_obj == $challenge_id) {   
    $response->status = true; 
    $response->message = "تم الاضافة بنجاح" ;
    echo json_encode($response);
}else{ 

$update_challenge_id =mysqli_query(
    $con, 
    "UPDATE `student` SET `chalange_id` = '$challenge_id' WHERE `student`.`student_id` = '$student_id'"
); 

if(mysqli_affected_rows($con)) {  
$response->status = true; 
$response->message = "تم الاضافة بنجاح" ;
echo json_encode($response);
}
else{ 
    $response->status = false; 
    $response->message = "لم تتم الاضافة " ;
    echo json_encode($response);
  }
}
?>