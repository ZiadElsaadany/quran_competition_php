<?php 

include "../db_con.php";
$phone = $_GET["phone"];
$name = $_GET["name"];
$pass = $_GET["password"];
$response = new stdClass( ) ; 
$select_phone = mysqli_query(
    $con, 
    "SELECT * FROM `testers` WHERE `tester_phone` = '$phone'"
);
if(mysqli_num_rows($select_phone)) {
    $response->status =false; 
    $response->message ="رقم الهاتف موجود من قبل" ;
    echo json_encode($response) ;
 }else{ 
    $add_tester = mysqli_query( 
        $con, 
        "INSERT INTO `testers` ( `tester_login_password`, `tester_name`, `tester_phone`) 
        VALUES ( '$pass', '$name', '$phone')"
    );
    if(mysqli_insert_id($con)) { 
        
    $response->status =true; 
    $response->message ="تم اضافة الشيخ بنجاح";
    echo json_encode($response) ;
    } else{
        echo "fحدثت مشكلة";
     }

  } 


?>