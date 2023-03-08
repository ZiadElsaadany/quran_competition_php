<?php  


include "../db_con.php";


// all students for each chalange
$subscription_array = array( ); 

$chalange_id=$_GET["id"] ; 
$response = new stdClass( ); 
$select_all_chalange_supscritopn = mysqli_query( 
    $con  , 
    "SELECT chalange_list.* , student.* FROM `chalange_list`, student  
    WHERE student.chalange_id =$chalange_id     AND  
     chalange_list.chalange_id = $chalange_id 
         AND student.accept_student = 1    ORDER BY`student_age` ASC ,`student_name` ASC
    "
);

while($dataRow=mysqli_fetch_object($select_all_chalange_supscritopn) )  { 

    // data row  -->  chalange_id 
    $select_scores  =  mysqli_query( 
        $con , 
        "SELECT SUM(score_value) AS score_value FROM `student_scores` WHERE `student_scores`.student_id = '$dataRow->student_id'"
    ); 
    $fetch = mysqli_fetch_object($select_scores); 
    
    $dataRow->score_value  = $fetch->score_value; 
    $subscription_array[] = $dataRow; 
}

$response->status = true; 
$response->data = $subscription_array; 

echo  json_encode($response);




?> 