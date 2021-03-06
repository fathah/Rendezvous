<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../inc/head.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <title>Rendezvous <?php echo Date('Y') ?></title>
    <style>
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
    
    </style>

</head>

<body>
    <?php include '../inc/nav.php';




    ?>
<section class="px-5">
    <u><i>Manuals</i></u> <br>
    <b style="color:#006266;">Sync Team Info</b>: To update team name and other information. <br>
    <b style="color:#8e44ad;">Sync Group</b>: To update team score. <br>
    <b style="color:#27ae60;">Sync Data</b>: To update individual scores, results & all other data. <br>
    <b style="color:#0D6EFD;">Add Feed</b>: To send notifications to the students. <br>
</section>

<a onclick="syncTeamInfo()">
<div class="floatingLeft" style="background:#006266; bottom:200px; transition:1s ease; cursor:pointer;" id="sncTeam">
<img src="../img/team_sync.svg" style="margin-right: 4px;" width="25px" alt="">
Sync Team Info</div>
</a>

<a onclick="syncGroupData()">
<div class="floatingLeft" style="background:#8e44ad; bottom:140px; transition:1s ease; cursor:pointer;" id="sncGrp">
<img src="../img/syncGroup.svg" style="margin-right: 4px;" width="25px" alt="">
Sync Group Score</div>
</a>


<a href="addFeed.php">
<div class="floatingLeft">
<img src="../img/add_result.png" style="margin-right: 4px;" width="25px" alt="">
 Add Feed
</div>
</a>


<!-- Sync Data -->
<a onclick="syncData()" >
<div class="floatingLeft" style="background:#27ae60; bottom:85px; transition:1s ease;cursor:pointer;" id="snc">
<img src="../img/sync.svg" style="margin-right: 4px;" width="25px" alt="">
 Sync Results
</div>
</a>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

function syncData(){
    var aButton = document.getElementById('snc');
    aButton.innerHTML = '<img src="../img/sync.svg" style="margin-right: 4px;" width="25px" alt="">Syncing Data..';
    aButton.style.background="#c0392b";

  $.get("../syncToWeb.php");
  window.setTimeout(function(){
    aButton.innerHTML = '<img src="../img/sync.svg" style="margin-right: 4px;" width="25px" alt="">Sync Data';
    aButton.style.background="#27ae60";
    }, 3000);

}

function syncGroupData(){
    var aButton = document.getElementById('sncGrp');
        aButton.innerHTML = '<img src="../img/sync.svg" style="margin-right: 4px;" width="25px" alt="">Syncing Data..';
        aButton.style.background="#c0392b";

  $.get("../inc/syncGroup.php");
  window.setTimeout(function(){
        aButton.innerHTML = '<img src="../img/syncGroup.svg" style="margin-right: 4px;" width="25px" alt="">Sync Group';
        aButton.style.background="#8e44ad";
    }, 3000);
}

function syncTeamInfo(){
    var aButton = document.getElementById('sncTeam');
        aButton.innerHTML = '<img src="../img/sync.svg" style="margin-right: 4px;" width="25px" alt="">Syncing Team Info..';
        aButton.style.background="#c0392b";

  $.get("../syncTeam.php");
  window.setTimeout(function(){
        aButton.innerHTML = '<img src="../img/team_sync.svg" style="margin-right: 4px;" width="25px" alt="">Sync Team Info';
        aButton.style.background="#006266";
    }, 3000);
}


</script>




</html>