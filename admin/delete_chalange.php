<?php 

include "../db_con.php"; 


///baseurl/endpoint?

$chalange_id = $_GET["id"];
$response = new stdClass();

$select_= mysqli_query(
    $con,
    "SELECT * FROM `chalange_list` WHERE chalange_id = '$chalange_id'"
);
$fetch = mysqli_fetch_object($select_);

$remove_challange =mysqli_query(
    $con, 
    "DELETE FROM `chalange_list` WHERE `chalange_id` ='$chalange_id'"
);


if(  mysqli_affected_rows($con) > 0) 
{  
    $response->status=true;
    $response->message = "تم حذف المسابقة بنجاح" ;
    $response->data = $fetch;
    echo json_encode($response);
}

else
{  
    $check_chalange = mysqli_query($con,"SELECT * FROM `chalange_list` WHERE `chalange_id` = '$chalange_id'") ; 
    if(mysqli_num_rows($check_chalange) ==0 ) { 
        $response->status=true;
    $response->message = "تم حذف المسابقة بنجاح" ;
    $response->data = $fetch;
    echo json_encode($response);
    }
     else { 
        $response->status=false;
    $response->message = "حدثت مشكلة" ;
    $response->data = $fetch;
    echo json_encode($response);
     }
}
/*
  IN()   -->   DELETE FROM `student` WHERE `student_id` IN(3,5,7)   delete all 



 
    
*/


?>