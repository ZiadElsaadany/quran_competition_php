<?php 

include "../db_con.php";

$table_id = $_GET["id"];
$response = new stdClass( ) ;

$select = mysqli_query(
    $con,  
    "SELECT * FROM `tables_time` WHERE `table_id` = '$table_id'"
);

if(mysqli_num_rows($select) == 0)  { 
$response->status = true; 
$response->message = "تم حذف الموعد"; 
echo json_encode($response);
}
else {  
$delete_tabel = mysqli_query(
    $con, 
    "DELETE FROM tables_time WHERE `tables_time`.`table_id` = '$table_id'"
);

if(mysqli_affected_rows($con))  { 
    $response->status = true; 
$response->message = "تم حذف الموعد"; 
echo json_encode($response);

}else{ 
    $response->status = false; 
$response->message = "تم حذف الموعد"; 
echo json_encode($response);
} 

}



?>