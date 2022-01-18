<?php

include 'app/syncFunctions.php';
include 'inc/head.php';

$teamsSQL = "SELECT * FROM team";
$teamsRes = mysqli_query($conn, $teamsSQL);
if(mysqli_num_rows($teamsRes)>0){
    $teamArray = array();
    while($r = mysqli_fetch_assoc($teamsRes)){
       array_push($teamArray,$r);
    }
    $teamsDataJSON = json_encode($teamArray);
    updateData($teamsDataJSON, 'team');
}


?>