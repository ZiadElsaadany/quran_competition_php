<?php 

include "../db_con.php" ; 
$my_chalange_list = array( );


$tester_id =$_GET["tetser_id"]; 
$response = new stdClass();

$select_chalanges_tester = mysqli_query (  
    $con , 
    "SELECT  * FROM `chalange_testers`  WHERE `tester_id` = '$tester_id'"
); 

while($row  =  mysqli_fetch_object($select_chalanges_tester)     ) { 
    
    $select_chalanges = mysqli_query(  
        $con , 
         "SELECT * FROM `chalange_list` WHERE `chalange_id` = '$row->chalange_id' "
     ) ;
   
 
 $fetch = mysqli_fetch_object(  
    $select_chalanges
 ); 
 
      $my_chalange_list[] = $fetch; 

}
$response->status = true ;
$response->data= $my_chalange_list ;
echo json_encode(  
    $response
 ); 

?>  