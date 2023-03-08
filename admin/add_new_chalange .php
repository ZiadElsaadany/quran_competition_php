<?php

 
 
 
 include "../db_con.php"; 



 $json = file_get_contents('php://input') ; 

 $obj = json_decode( $json, true ) ;


 $chalange_name = $obj["name"] ; 
 $chalange_details=$obj["details"]; 
 $chalange_availability = $obj["availability"]; 
 $category_name = $obj["categoryName"] ; 
 $tester_id = $obj["tester_id"]; 
 $response = new stdClass( ); 

 $select_dublicate_chalange = mysqli_query(
$con , 
"SELECT * FROM `chalange_list` WHERE `chalange_name` ='$chalange_name' "
 ) ;

 if(mysqli_num_rows($select_dublicate_chalange) >0){  


    $response->status= true; 
    $response->message= "تم اضافة هذه المسابقة من قبل"; 


    echo json_encode($response);
  }else{ 

  $insert_chalange =  mysqli_query( 
    $con, 
    "INSERT INTO `chalange_list` (`chalange_name`, `chalange_details`, `chalange_availability`,`main_category`,`tester_id`) 
    VALUES ( '$chalange_name', '$chalange_details', '$chalange_availability' ,'$category_name','$tester_id')"
  );
  

 if(mysqli_insert_id($con)){ 

  $select = mysqli_query(  
    $con, 
    "SELECT * FROM `chalange_list` WHERE `chalange_name`= '$chalange_name'"
  );

  $fetch = mysqli_fetch_object( $select) ;

  $response->status = true; 
  $response->message= "تم اضافة المسابقة بنجاح"; 
  $response->data= $fetch; 
 
    echo json_encode($response);
 }else { 

  $response->status = false; 
  $response->message= "حدثت مشكلة";  
    echo json_encode($response);

  }

  }


?>