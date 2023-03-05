<?php 


include "../db_con.php";


 
$all_chalanges_array = array( ); 

$response = new stdClass();
$category = $_GET["category_name"]; 

$select_all_chalanges= mysqli_query(
    $con , 
    "SELECT * FROM  `chalange_list` WHERE main_category = '$category' "
) ; 



while( $dataRow = mysqli_fetch_object($select_all_chalanges) ) {
    
    $all_chalanges_array [] = $dataRow; 

}
$response->status= true; 
$response->data=$all_chalanges_array;

echo   json_encode( $response); 



?>


