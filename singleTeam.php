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


    <title>Team | Rendezvous </title>
</head>
<body>
   <?php include'inc/nav.php'; 

   $code = "";
   $id = mysqli_real_escape_string($conn, $_GET['id']);
   $sql = "SELECT team.name, team.code, SUM(programlist.point) AS point FROM team, programlist WHERE team.id=$id AND programlist.groupId = team.code";
   $res = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($res);
   $code = $row['code'];
   ?>
<div class="card centerCard">
    
<?php
echo '<h3>'.$row['name'].'</h3>'; 
echo '<div>Point: <span class="grName">'.$row['point'].'</span></div>'; 

?>


</div>


<!-- Students SECTION -->
<br>
<div class="card centerCard" id="partis">
<div class="subHeading"><h3 style="color: #0D6EFD;">Team Members</h3>

</div>

<?php

$resultSQL = "SELECT * FROM students WHERE team = '$code'";
$resultRes = mysqli_query($conn, $resultSQL);


if(mysqli_num_rows($resultRes)>0){
        while($row2 = mysqli_fetch_assoc($resultRes)){
           
            echo '<a href="singleStudent.php?id='.$row2['id'].'" style="color:#000;">
            <div class="snRow">
    
            <div class="distance">
            <div style="display:flex;">
            '.$row2['name'].' <span class="chestNum">'.$row2['chest'].'</span></div>
            </div>
    
            </div></a>';
        }
    
 
}else{
    echo'<br><br><center>Results not declared</center>';
}
?>
</div>  


<!-- RESULT SECTION END -->





<a href="editTeam.php?id=<?php echo $id; ?>">
<div class="floating">
<i class="material-icons">create</i>
</div>
</a>

<a onclick="deleteGroup()">
<div class="floatingLeft delete">
<img src="img/delete.png" style="margin-right: 4px;" width="25px" alt="">

<!-- <i class="material-icons" style="margin-right: 4px;">post_add</i>  -->
Delete Group</div>
</a>

<script>
function deleteGroup() {
var url = "inc/deleteTeam.php?id=<?php echo $id; ?>";
  if (confirm("Are you sure do you want to delete the group?")) {
    window.location.replace(url);
  } 
}
</script>

</body>
</html>