<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php';
include 'inc/common.php';
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">


    <title>Programs Rendezvous </title>
</head>
<body>
   <?php include'inc/nav.php'; 
   $id = mysqli_real_escape_string($conn, $_GET['id']);
   $sql = "SELECT * FROM program WHERE id=$id";
   $res = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($res);

   $delResult = "";
   $name = "";
if(isset($_GET['deleteId'])){
    $partisId = mysqli_real_escape_string($conn, $_GET['deleteId']);
    $delSQL =  "DELETE FROM programlist WHERE id=$partisId";
    if(mysqli_query($conn, $delSQL)){
        $delResult = '<div class="alert alert-success" role="alert">
        Participant deleted! 
      </div>';
    }else{
     $delResult = '<div class="alert alert-danger" role="alert">Failed to delete Participant!
     
    </div>';
        echo mysqli_error($conn);
    }
}


   ?>
<div class="card centerCard">
    
<?php

$name = $row['name'];
echo '<h3>'.$row['name'].'</h3>'; 
echo '<div>Type: <span class="grName">'.getProgramType($row['type']).'</span></div>'; 
echo '<div>Section: <span class="grName">'.getSection( $row['section']).'</span></div>'; 

$participantSql = "SELECT * FROM programlist WHERE programid = $id";
$particRes = mysqli_query($conn, $participantSql);
$num_rows = mysqli_num_rows($particRes);

echo '<div>Total Participants: <span class="grName">'.$num_rows.'</span></div>'; 


?>
<br>
</div>
<br>
<div class="card centerCard" id="partis">
<div class="subHeading"><h3 style="color: #0D6EFD;">Participants</h3>
<a href="addParticipant.php?id=<?php echo $id;?>&name=<?php echo $row['name']; ?>">
<div class="subBtn">
<img src="img/add_person.png" style="width: 20px; margin-right:5px;" alt="">

Add Participant</div></a>
</div>

<?php
echo  $delResult;

if(mysqli_num_rows($particRes)>0){
    while($row1 = mysqli_fetch_assoc($particRes)){
        $sngleId =  $row1['studentid'];
        $singleSQL = "SELECT name, chest FROM students WHERE id=$sngleId";
        $sngleRes = mysqli_query($conn, $singleSQL);
        $r = mysqli_fetch_assoc($sngleRes);
        $finalRowId =  $row1['id'];
       
        echo '<a href="singleStudent.php?id='.$row1['studentid'].'" style="color:#000;">
        <div class="snRow">

        <div class="distance">
        <div style="display:flex;"> 
        '.$r['name'].' <span class="chestNum">'.$r['chest'].'</span></div>
        <a onClick="deleteParticipant('.$finalRowId.')">
        <div class="dlt"><img src="img/delete.png" width="25px" alt="">
        </div></a>
        </div>

        </div></a>';
    }
}else{
    echo'<br><br><center>No Participants</center>';
}
?>
</div>  
<!-- RESULT SECTION -->
<br>
<div class="card centerCard" id="partis">
<div class="subHeading"><h3 style="color: #0D6EFD;">Result</h3>

</div>

<?php

$resultSQL = "SELECT * FROM programlist WHERE programid = $id AND rank>0 ORDER BY rank ASC";
$resultRes = mysqli_query($conn, $resultSQL);


if(mysqli_num_rows($resultRes)>0){
        while($row2 = mysqli_fetch_assoc($resultRes)){
            $sngleId =  $row2['studentid'];
            $singleSQL = "SELECT name, chest FROM students WHERE id=$sngleId";
            $sngleRes = mysqli_query($conn, $singleSQL);
            $r2 = mysqli_fetch_assoc($sngleRes);
            $finalRowId =  $row2['id'];
           
            echo '<a href="singleStudent.php?id='.$row2['studentid'].'" style="color:#000;">
            <div class="snRow">
    
            <div class="distance">
            <div style="display:flex;">
            <span class="rank">'.$row2['rank'].'</span>
            '.$r2['name'].' <span class="chestNum">'.$r2['chest'].'</span></div>
            </div>
    
            </div></a>';
        }
    
 
}else{
    echo'<br><br><center>Results not declared</center>';
}
?>
</div>  


<!-- RESULT SECTION END -->

<a href="editProgram.php?id=<?php echo $id; ?>">
<div class="floating">
<img src="img/edit.png" width="25px" alt="">
</div>
</a>

<a href="addResult.php?id=<?php echo $id; ?>">
<div class="floatingLeft">
<img src="img/add_result.png" style="margin-right: 4px;" width="25px" alt="">
 Add Result
</div>
</a>

<!-- Print Participants -->

<a href="print/participants.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>">
<div class="floatingLeft" style="background:#8e44ad; bottom:140px;">
<img src="img/print.svg" style="margin-right: 4px;" width="25px" alt="">
 Print Participants
</div>
</a>

<!-- Print Results -->
<a href="print/results.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>">
<div class="floatingLeft" style="background:#27ae60; bottom:85px;">
<img src="img/print.svg" style="margin-right: 4px;" width="25px" alt="">
 Print Results
</div>
</a>


<script>
function deleteParticipant(usId) {
var url = "?deleteId="+usId+"&id=<?php echo $id; ?>#partis";
  if (confirm("Are you sure do you want to delete this participant?")) {
    window.location.replace(url);
  } 
}
</script>

</body>
</html>