<?php  
  
  include "../db_con.php";
  
  
 $json = file_get_contents('php://input') ; 

 $obj = json_decode( $json, true ) ;
   $phone  =$obj["phone"];
   $tester_name  = $obj["name"]; 
   $tester_login_pass  = $obj["password"];
   $response = new stdClass(); 

   $select_tester = mysqli_query(  
    $con, 
    "SELECT * from `testers` WHERE `tester_phone` = '$phone' "
   ) ;
   if(mysqli_num_rows($select_tester) >  0 ) { 

    $response->status =  "duplicate_phone"  ;
    $response->message=   "عذرا تم اضافة هذا الرقم من قبل" ;
    echo  json_encode($response);

   } else{ 

    $add_tester= mysqli_query(  
        $con, 
        "INSERT INTO `testers` ( `tester_name`, `tester_phone`, `tester_login_password`) VALUES ('$tester_name', '$phone', '$tester_login_pass')"
    ); 

    if(mysqli_insert_id($con)) {  
        $response->status = true;
        $response->message="تم اضافة الشيخ بنجاح"    ;
    
    echo json_encode($response);

    }
    else{ 
    
        $response->status = false;
        $response->message ="حدثت مشكلة بالرجاء اعادة المجاولة"; 
        echo json_encode($response);
     }

    }
   
?> 