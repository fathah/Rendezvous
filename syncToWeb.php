<?php

include 'inc/head.php';


function updateData($jsonData, $file){
    
    $url = "https://manzilmedia.net/apps/rendezvous/sync.php";
    $api = "06b53047cf294f7207789ff5293ad2dc";
    
    
    $data = array('api' =>$api, 'data' => $jsonData, 'file'=>$file);
    
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { 
        echo 'Something Went wrong!';
     }
    }


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






syncStudents();





?>