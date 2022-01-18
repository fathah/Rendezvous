<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Rendezvous <?php echo Date('Y') ?></title>
<style>
    body{
        background-image: url('img/bg.gif');
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: center;
    }
</style>

</head>

<body>
    <?php include 'inc/nav.php';

    include 'graph.php';


    function updateInstantScore()
    {
        global $conn;
        $prSQL = "SELECT id FROM program WHERE isCompleted=1";
        $prRes = mysqli_query($conn, $prSQL);
        $num_rows = mysqli_num_rows($prRes);

        $team1 = "";
        $team2  = "";
        $team3 = "";


        //GET Score FROM TEAM
        $team1SQL = "SELECT SUM(programlist.point) as point FROM programlist, team WHERE team.floor=1";
        $team1Res = mysqli_query($conn, $team1SQL);
        $team1 = mysqli_fetch_assoc($team1Res)['point'];
        //TEAM 2
        $team2SQL = "SELECT SUM(programlist.point) as point FROM programlist, team WHERE team.floor=2";
        $team2Res = mysqli_query($conn, $team2SQL);
        $team2 = mysqli_fetch_assoc($team2Res)['point'];

        //TEAM 3
        $team3SQL = "SELECT SUM(programlist.point) as point FROM programlist, team WHERE team.floor=3";
        $team3Res = mysqli_query($conn, $team3SQL);
        $team3 = mysqli_fetch_assoc($team3Res)['point'];


        if ($num_rows % 5 == 0) {
            $scoreSQL = "INSERT INTO scores(level, team1, team2, team3) VALUES($num_rows, $team1, $team2, $team3)";
            mysqli_query($conn, $scoreSQL);
        }
    }

// //CALL THE UPDATE INSTANT SCORE FUNCTION
// updateInstantScore();


    ?>
<a href="champions.php">
<div class="champs">
<img src="img/trophy.svg" style="margin-right: 4px;" width="25px" alt="">
 Individual Scores
</div>
</a>
</body>

</html>