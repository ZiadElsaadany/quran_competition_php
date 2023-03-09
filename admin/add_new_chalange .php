<?php
 include "../db_con.php"; 
 $chalange_name = $_GET["name"] ; 
 $chalange_details=$_GET["details"]; 
 $chalange_availability = $_GET["availability"]; 
 $category_name = $_GET["categoryName"] ; 
 $tester_id = $_GET["testerId"]; 
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