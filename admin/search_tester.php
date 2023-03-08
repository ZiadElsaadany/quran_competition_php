<?php  
 

   include "../db_con.php";

    

   $array_testers = array( );
 $response =new stdClass();
 
   $search_name = $_GET["q"]; 

 $select_tester = mysqli_query(  
    $con, 
    "SELECT  tester_id,  tester_name , tester_phone  FROM `testers` WHERE `tester_name` LIKE '%$search_name%'"
 ) ;

while ( $row = mysqli_fetch_object($select_tester))  {  



    $array_testers[ ] = $row ; 

}

$response->status=true;
$response->data= $array_testers;

echo  json_encode($response); 

 


?>