<?php 

include  "../db_con.php"; 

$tester_id= $_GET["id"]; 
$response = new stdClass( ) ; 


$delete_tester_sql =  mysqli_query(  
    $con  , 
    "DELETE FROM `testers` WHERE `tester_id` = '$tester_id'"
);
if( mysqli_affected_rows($con)  ) { 
    $response->status = true ; 
    $response->message = "تم حذف الشيخ";

    echo  json_encode($response);
}
else  {  

$select_tester = mysqli_query(  
 
    $con, 
    "SELECT * FROM `testers` WHERE `tester_id` = '$tester_id'" 

) ;
if( mysqli_num_rows($select_tester) == 0 ) {

    $response->status = true ; 
    $response->message = "تم حذف الشيخ";

    echo  json_encode($response);

 }
 else{ 

    $response->status = false ; 
    $response->message ="حدثت مشكلة";

    echo  json_encode($response);
 }


}