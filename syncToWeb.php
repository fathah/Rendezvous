<?php

include 'inc/head.php';
include 'app/syncFunctions.php';




function syncStudents(){
    global $conn;
    $sql = "SELECT * FROM students";
$res = mysqli_query($conn, $sql);
$dataArray = array();
$jsonData = "";
if(mysqli_num_rows($res)>0){
    while($r = mysqli_fetch_assoc($res)){
      
        $stID = $r['id'];
        $sTeam = $r['team'];
        $prSQL = "SELECT programid, rank FROM programlist WHERE studentid = $stID";
        $prRes = mysqli_query($conn, $prSQL);
        $programlistArr = array();
        if(mysqli_num_rows($prRes)>0){
            while($prRow = mysqli_fetch_assoc($prRes)){
                $prId = $prRow['programid'];
                $prNameSQL = "SELECT name, resultDeclared FROM program WHERE id = $prId";
                
                $prNameRes = mysqli_query($conn, $prNameSQL);
                $assoc = mysqli_fetch_assoc($prNameRes);
                $name = $assoc['name'];
                $isDeclared = $assoc['resultDeclared'];
                if($isDeclared==1){
                    array_push($programlistArr, array($name, $prRow['rank']));
                }else{
                    array_push($programlistArr, array($name, "0"));
                }
                
            }
        }
//Team Score
        $teamSQL = "SELECT SUM(point) AS teamPoint FROM programlist WHERE groupId = '$sTeam'";
        $teamRes = mysqli_query($conn, $teamSQL);
        $point = mysqli_fetch_assoc($teamRes)['teamPoint'];
//Individual Score
$isDeclaredSQL = "SELECT * FROM program WHERE resultDeclared = 1 AND type = 's'";
$declRES = mysqli_query($conn, $isDeclaredSQL);
$indPointFinal = 0;
if(mysqli_num_rows($declRES)>0){
while($rw = mysqli_fetch_assoc($declRES)){
    $prId = $rw['id'];
    $indSQL = "SELECT SUM(point) AS indPoint FROM programlist WHERE studentid = $stID AND type='s' AND programid = $prId";
    $indRes = mysqli_query($conn, $indSQL);
    $indPointFinal += mysqli_fetch_assoc($indRes)['indPoint'];
}
}



        $array = array(
            "name" => $r['name'],
            "team" => $r['team'],
            "chest" => $r['chest'],
            "card" => $r['card_no'],
            "section" => $r['section'],
            "campus" => $r['campus'],
            "programList"=> $programlistArr,
            "teamPoint"=>$point,
            "indPoint"=>$indPointFinal

        );

 

        // $dataArray[] = $r;
        $dataArray[] = $array;
    }



    $jsonData = json_encode($dataArray);
//echo $jsonData;




   updateData($jsonData, 'students');
   
}
}

function syncProgramList(){
    global $conn;
     $sql = "SELECT a.*, b.name FROM programlist a, students b WHERE a.studentid = b.id";
 $res = mysqli_query($conn, $sql);
 if($res){
     if(mysqli_num_rows($res)>0){
         $dataArray = array();
         while($r = mysqli_fetch_assoc($res)){
             array_push($dataArray,array(
                 "studentid" => $r['studentid'],
                 "programid" => $r['programid'],
                 "groupId" => $r['groupId'],
                 "point" => $r['point'],
                 "rank" => $r['rank'],
                 "type" => $r['type'],
                 "name" => $r['name']
             ));
           
            
         }
         $jsonData = json_encode($dataArray);
         updateData($jsonData, 'programlist');
        
     }
 }
 
 }

 function syncAllPrograms(){
    global $conn;
     $sql = "SELECT * FROM program";
 $res = mysqli_query($conn, $sql);
 if($res){
     if(mysqli_num_rows($res)>0){
         $dataArray = array();
         while($r = mysqli_fetch_assoc($res)){
             array_push($dataArray,$r);
         }
         $jsonData = json_encode($dataArray);
         updateData($jsonData, 'program');
        
     }
 }
 
 } 


syncStudents();
syncProgramList();
syncAllPrograms();


?>