<?php  
include "../db_con.php" ; 
$json = file_get_contents('php://input') ; 

$obj = json_decode( $json, true ) ;

$tester_phone  = $obj["tester_phone"]; 
$tester_name = $obj["tester_name"]; 
$tester_id = $obj["id"] ; 


$response =  new  stdClass()          ;

$select_testers = mysqli_query( 
    $con , 
    "SELECT tester_name , tester_phone ,tester_id FROM `testers` WHERE `tester_id` = '$tester_id'"
);


$fetch = mysqli_fetch_object($select_testers); 

if( $fetch->tester_name == $tester_name  &&  $fetch->tester_phone == $tester_phone  ) 
{ 
    $response->status = true; 
    $response->message = "تم التعديل بنجاح"; 
    $response->data = $fetch; 

    echo json_encode( $response ); 
}


else {

    $select_duplicate_phone  = mysqli_query( 
        $con , 
        "SELECT tester_name , tester_phone ,tester_id FROM testers WHERE testers.tester_phone = '$tester_phone' AND tester_id !=$tester_id"
    );

    if(mysqli_num_rows($select_duplicate_phone) ==0 ){  


$update_tester  = mysqli_query (  
    $con ,
    "UPDATE `testers` SET `tester_name` = '$tester_name', `tester_phone`='$tester_phone' WHERE `testers`.`tester_id` = '$tester_id'" 
); 
$select_after_updated = mysqli_query( 
    "SELECT tester_name , tester_phone ,tester_id FROM `testers` WHERE `tester_id` = '$tester_id'"
);


$fetch_ = mysqli_fetch_object($select_after_updated); 


if(mysqli_affected_rows($con )) { 
    $response->status = true; 
    $response->message = "تم التعديل بنجاح"; 
    $response->data = $fetch_; 

    echo json_encode( $response ); 
 }else{
    $response->status = false; 
    $response->message =  "حدثت مشكلة لم يتم التعديل"; 

    $response->data = $fetch; 
    echo json_encode( $response ); 
 }
}

else{ 

    $response->status = false; 
    $response->message ="يجب ادخال رقم هاتف غير مكرر"; 
    $response->data = $fetch; 
    echo json_encode( $response ); 
}
}



?>