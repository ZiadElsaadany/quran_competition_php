<?php


include  "../db_con.php";

$category_name = $_GET["type"];
$response = new stdClass( ) ; 

$arr = array(); 

$select_all_tables = mysqli_query(  
    $con , 
    "SELECT * FROM `tables_time` WHERE `category_name` = '$category_name' "
);

while($row= mysqli_fetch_object($select_all_tables)) { 
    $arr[] = $row; 
 } 

 $response->status = true; 
 $response-> data = $arr; 

echo json_encode($response);
?>