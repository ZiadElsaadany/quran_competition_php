<?php 

include  "../db_con.php";

 // admin insert this data


$phone  = "014578511"; 
$pass = "012560"; 


$select = mysqli_query(  
    $con , 
    "SELECT * FROM `testers` WHERE   tester_phone  = '$phone'  "
);


if( mysqli_num_rows($select) == 0 ) {  
    $map = [ "message"=>"phone_not_found" ];
    echo json_encode($map); 
 }
 else{  

    $select_value  = mysqli_fetch_object($select);
    
    if($pass == $select_value->tester_login_password) {  
        $map  =   [
            'message'=>"success", 
            "tester_id"=>json_decode( $select_value->tester_id),
            "tester_name"=>$select_value->tester_name
        ];

        echo  json_encode($map); 
    }else{  
        $map=  [  
            "message"=>"wrong_password", 
        ];
        echo    json_encode($map)   ;
    }

 }















?>