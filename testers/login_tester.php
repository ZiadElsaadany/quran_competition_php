<?php 

include  "../db_con.php";

 // admin insert this data

 $json = file_get_contents('php://input') ; 

 $obj = json_decode( $json, true ) ;


$phone  = $obj["phone"]; 
$pass = $obj["password"]; 

$response = new stdClass( ) ;

$select = mysqli_query(  
    $con , 
    "SELECT * FROM `testers` WHERE   tester_phone  = '$phone'  "
);

$fetch = mysqli_fetch_object($select); 


if( mysqli_num_rows($select) == 0 ) {  

    $response->status = false; 
    $response->message = "المستخدم غير موجود"; 
    echo json_encode($response); 
 }
 else{  
    
    if($pass == $fetch->tester_login_password) { 
        $response ->status =true ; 
        $response -> message = "تم الدخول بنجاح" ;
        $response->tester_id =$fetch->tester_id      ;
       

        echo  json_encode($response); 
    }else{  
        $response ->status =false ; 
        $response->message ="كلمة السر خاطئة"      ;
       

        echo  json_encode($response); 
    }

 }















?>