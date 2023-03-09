<?php  
include "../db_con.php" ; 


$tester_phone  = $_GET["phone"]; 
$tester_name = $_GET["name"]; 
$tester_id = $_GET["id"] ; 
$arr =array();

$response =  new  stdClass();

$select_testers = mysqli_query( 
    $con , 
    "SELECT * FROM `testers` WHERE `tester_id` = '$tester_id'"
);
$fetch=mysqli_fetch_object($select_testers);


if( $fetch->tester_name == $tester_name  &&  $fetch->tester_phone == $tester_phone  ) 
{ 
    $response->status = true; 
    $response->message = "تم التعديل بنجاح"; 

    echo json_encode( $response ); 
}


else {

    $select_duplicate_phone  = mysqli_query( 
        $con , 
        "SELECT * FROM testers WHERE testers.tester_phone = '$tester_phone' AND tester_id !=$tester_id"
    );

    if(mysqli_num_rows($select_duplicate_phone) ==0 ){  


$update_tester  = mysqli_query (  
    $con ,
    "UPDATE `testers` SET `tester_name` = '$tester_name', `tester_phone`='$tester_phone' WHERE `testers`.`tester_id` = '$tester_id'" 
); 


if(mysqli_affected_rows($con )) { 
    $response->status = true; 
    $response->message = "تم التعديل بنجاح"; 

    echo json_encode( $response ); 
 }else{
    $response->status = false; 
    $response->message =  "حدثت مشكلة لم يتم التعديل"; 

    echo json_encode( $response ); 
 }

}

else{ 

    $response->status = false; 
    $response->message ="يجب ادخال رقم هاتف غير مكرر"; 
    echo json_encode( $response ); 
}
}



?>