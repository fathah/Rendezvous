


<?php

include 'db.php';
include '../syncToWeb.php';

function getScore($team){
    global $conn;

$declaredPrSQL = "SELECT * FROM program WHERE resultDeclared=1";
$res = mysqli_query($conn, $declaredPrSQL);
if(mysqli_num_rows($res)>0){
    $point = 0;
    while($r = mysqli_fetch_assoc($res)){
        $prgId = $r['id'];
        $teamUpdateSQL = "SELECT SUM(point) as point FROM programlist WHERE groupId = '$team' AND programid = $prgId";
        $msRes = mysqli_query($conn, $teamUpdateSQL);
        if(mysqli_num_rows($msRes)>0){
            $point += mysqli_fetch_assoc($msRes)['point'];
        }
    }
    if($point==null){
        return 0;
    }else{
        return $point;
    }
}
    

}

function updateTeamScore(){
    //UPDATE TEAM SCORE
$teamScore = array(
    "ag" => getScore('ag'),
    "cc" => getScore('cc'),
    "ib" => getScore('ib'),

);
$teamJson = json_encode($teamScore);
echo $teamJson;
updateData($teamJson, 'teamScore');
}

updateTeamScore();

?>