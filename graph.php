<?php

include 'inc/db.php';

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

</head>

<style>
.table{
    width: 50%;
    box-shadow: 3px 4px 15px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    padding: 10px;
}
.singleTeam{
    padding: 10px;
}
.pnt{
    font-size: 20px;
    font-weight: bold;
    color: #2c3e50;
}
table{
    border-bottom: none;
}
tr{
    border: 0px solid rgba(0, 0, 0, 0.0);
}
td:hover{
    box-shadow: 3px 4px 15px rgba(0, 0, 0, 0.2);
    border-radius: 0px;
}
td{
    border-left: 5px solid #ecf0f1;
    
}
td:first-child{
    border-left: 0px solid #ecf0f1;
}
.champs{
    position: fixed;
    bottom: 20px;
    left: 20px;
    background: #0D6EFD;
    user-select: none;
    padding: 10px  20px;
    color: #fff;
    border-radius: 50px;

}
.champs a{
    color: #fff;
}
.snGraph{
    box-shadow: 5px -10px 15px rgba(0, 0, 0, 0.05);
    width:50%; 
    margin:0px 15px;
    padding: 20px;
    border-radius: 15px;
    transition: 0.5s ease;
    background: #fff;
}
.snGraph:hover{
    box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.1);
}
</style>


<body>
    <center>



<?php


$graph1SQL = "SELECT * FROM  team";
$graph1Res = mysqli_query($conn, $graph1SQL);

$team = array();
$point = array();

echo '<div class="table"><table width="100%">';
while($row1=mysqli_fetch_assoc($graph1Res)){
    $gId = $row1['code'];
$snglScoreSQL = "SELECT SUM(point) AS point FROM programlist WHERE groupId = '$gId'";
$snglScoreRES = mysqli_query($conn, $snglScoreSQL);
$r2 = mysqli_fetch_assoc($snglScoreRES);

array_push($team, $row1['name']);
array_push($point, $r2['point']);

echo '<td width="33%" border="0"><div class="singleTeam">'.$row1['name'].'<br><span class="pnt">'.$r2['point'].'</span></div></td>';


}

echo '</table></div>';

$graph5SQL = "SELECT * FROM  team";
$graph5Res = mysqli_query($conn, $graph5SQL);
echo'Synced Scores';
echo '<div class="table"><table width="100%">';
while($row2=mysqli_fetch_assoc($graph5Res)){
    $gId2 = $row2['code'];
echo '<td width="33%" border="0"><div class="singleTeam">'.$row2['name'].'<br><span class="pnt">'.getScore($gId2).'</span></div></td>';


}
echo '</table></div>';






$instaScoreSQL = "SELECT * FROM scores";
$instaScoreRES = mysqli_query($conn, $instaScoreSQL);

$scores = array();

$team1 = array();
$team2 = array();
$team3 = array();

while($row2=mysqli_fetch_assoc($instaScoreRES)){
    array_push($scores, $row2['level']);
    array_push($team1, $row2['team1']);
    array_push($team2, $row2['team2']);
    array_push($team3, $row2['team3']);

}

?>
<br>
<div style="display: flex; justify-content: space-around; margin:20px;">

    <div class="snGraph"><canvas id="myChart"></canvas></div>
    <div class="snGraph"><canvas id="myLineChart"></canvas></div>

    </div>


<script>


var ctx = document.getElementById('myChart').getContext('2d');
var ctx2 = document.getElementById('myLineChart').getContext('2d');

var point =<?php echo json_encode($point );?>;
var team =<?php echo json_encode($team );?>;

var scores =<?php echo json_encode($scores );?>;
var scoresInt = [];
scores.forEach(function(item){scoresInt.push(parseInt(item))});

//TEAM POINTS
var team1 =<?php echo json_encode($team1);?>;
var team1Int = [];
team1.forEach(function(item){team1Int.push(parseInt(item))});

var team2 =<?php echo json_encode($team2);?>;
var team2Int = [];
team2.forEach(function(item){team2Int.push(parseInt(item))});

var team3 =<?php echo json_encode($team3);?>;
var team3Int = [];
team3.forEach(function(item){team3Int.push(parseInt(item))});


//console.log(typeof(scoresN));
    
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [team[0], team[1], team[2]],
            datasets: [
                {
                label: 'Points',
                data: [ parseInt(point[0]), parseInt(point[1]),parseInt(point[2])],
                backgroundColor: [
                    'rgba(192, 57, 43,1.0)',
                    
                    'rgba(39, 174, 96,1.0)',
                    'rgba(41, 128, 185,1.0)',
                  
                ],
                borderColor: [
                    'rgba(192, 57, 43,1.0)',
                   
                    'rgba(39, 174, 96,1.0)',
                    'rgba(41, 128, 185,1.0)',
                  
                ],
                borderWidth: 1
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: scoresInt,
            datasets: [
                {
                label: team[0],
                data: team1Int,
                backgroundColor: 
                    'rgba(192, 57, 43,0.1)',

                  
                
                borderColor: 
                    'rgba(192, 57, 43,1.0)',
                  
                borderWidth: 2
            },
            {
                label: team[1],
                data: team2Int,
                backgroundColor: 
                'rgba(39, 174, 96,0.1)',
                   
                  
                
                borderColor: 
                'rgba(39, 174, 96,1.0)',
                   
                  
                borderWidth: 2
            },
            {
                label: team[2],
                data: team3Int,
                backgroundColor: 
                'rgba(41, 128, 185,0.1)',
                    
                  
                
                borderColor: 
                'rgba(41, 128, 185,1.0)',
                   
                  
                
                borderWidth: 2
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


</script>

<?php





?>


</center>
</body>
</html>


