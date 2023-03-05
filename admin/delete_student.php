<?php 

include "../db_con.php"; 
///baseurl/endpoint?

$student_id = $_GET["id"];  /// get 

$response = new stdClass() ; 

$remove_student =mysqli_query(
    $con, 
    "DELETE FROM `student` WHERE `student_id` ='$student_id'"
);
if(  mysqli_affected_rows($con) > 0) 
{  

    $response->status  = true ; 
    $response->message = "تم حذف الطالب بنجاح";

    echo json_encode($response);
}
else
{  
    $check_student = mysqli_query($con,"SELECT * FROM `student`WHERE `student_id` = '$student_id'") ; 
    if(mysqli_num_rows($check_student) ==0 ) { 
        $response->status  = true ; 
        $response->message = "تم حذف الطالب بنجاح";
    
        echo json_encode($response);
    }
     else { 
        $response->status  = false ; 
        $response->message ="حدثت مشكلة بالرجاء اعادة المحاولة" ;
    
        echo json_encode($response);
     }
}
/*
  IN()   -->   DELETE FROM `student` WHERE `student_id` IN(3,5,7)   delete all 
*/
// 
?>