<?php 

 
include  "../db_con.php"; 

$challenge_id = $_GET["id"];

$chalange_degree_array    =array( )  ; 


$select_all_degree = mysqli_query(
    $con, 
    "SELECT * FROM `student` " 
);
while ($row  = mysqli_fetch_object($select_all_degree) )   {  


     $select_all_score  = mysqli_query (  
        $con, 
        "SELECT SUM(score_value) AS score_value  FROM `student_scores` WHERE `student_id`= '$row->student_id'"
      ); 
      $fetch = mysqli_fetch_object($select_all_score) ;
      $row->score_value = $fetch->score_value;
      $chalange_degree_array [] = $row   ; 

 } 

echo json_encode($chalange_degree_array); 




//  { 
/*  
 
 row = {  

    "name" :"ziad"

 }  
row -> "name"



*/
// 




?>