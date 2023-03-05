<?php 

include "../db_con.php";

$response = new stdClass( ); 
 
$all_chalanges_array = array( ); 
$category_name = $_GET["category_name"];


$select_all_chalanges= mysqli_query(
    $con , 
    "SELECT * FROM  `chalange_list` WHERE `chalange_availability`  = '1' AND main_category = '$category_name'"
) ; 

     
while( $dataRow = mysqli_fetch_object($select_all_chalanges) ) {
    
    $all_chalanges_array [] = $dataRow; 
    
}

$response->status =true; 
$response-> data = $all_chalanges_array;

echo  json_encode( $response); 



?>