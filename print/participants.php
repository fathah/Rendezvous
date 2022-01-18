<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendezvous <?php echo $_GET['name']; ?></title>
    <link rel="stylesheet" href="print.css">
</head>

<script>
function printParticipants(){
    window.print();
}
function goBack() {
  window.history.back();
}
function reload(){
    location.reload();
}
</script>
<body onload="printParticipants()">

<?php

include '../inc/db.php';
include '../inc/common.php';


$id = $_GET['id'];
$name = $_GET['name'];
$participantSql = "SELECT * FROM programlist WHERE programid = $id";
$particRes = mysqli_query($conn, $participantSql);
$num_rows = mysqli_num_rows($particRes);

$sectionSQL =  "SELECT section FROM program WHERE id = $id";
$sectionRes = mysqli_query($conn, $sectionSQL);
$sction = mysqli_fetch_assoc($sectionRes)['section'];
//Print View Starts Here

if(mysqli_num_rows($particRes)>0){
    echo'<div class="onlyPrint">';
?>
<br> <br>
<center><img src="../img/head.png" width="60%" alt="">
<hr>
</center><br><br>
<?php echo'<div class="title">'.$name.' ('.getSection($sction).')</div>'; ?>
<br>
<table width="100%">
<tr>
    <th>Name</th>
    <th>Team</th>
    <th>Chest</th>
    <th>Code</th>
    <th>Signature</th>
  </tr>
<?php
    while($row1 = mysqli_fetch_assoc($particRes)){
        $sngleId =  $row1['studentid'];
        $singleSQL = "SELECT name, chest, team FROM students WHERE id=$sngleId";
        $sngleRes = mysqli_query($conn, $singleSQL);
        $r = mysqli_fetch_assoc($sngleRes);
        $finalRowId =  $row1['id'];
       
        echo '

<tr>
<td width="34%">
<div>'.$r['name'].'</div>
</td>
<td width="29%">
'.getGroupName($r['team']).'
</td>
<td width="12%">
<center>'.$r['chest'].'</center>
</td>
<td  width="9%">
</td>
<td>
</td>
</tr>

       
     ';
    }
    echo'</table>
    
    </div>';
    // <center> <div class="ft"><img src="../img/footer.png" width="100%"></div></center>


}else{
    echo'<br><br><center>No Participants</center>';
}



?>
<div class="mainPage onlyScreen">
    <section class="print-preview">
     <span class="preview-span">
     Print Preview
     </span>
    </section>
    <section>
    <div class="print-actions">
<main class="onlyScreen">
<a onClick="goBack()" class="btn">
    Go Back
</a>
<a onClick="printParticipants()" class="btn" style="background: #c0392b; margin-left:10px">
    Print
</a>
</main>
</div>
    </section>
</div>

</body>
</html>