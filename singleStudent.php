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


    <title>Students Rendezvous </title>
</head>
<body>
   <?php include'inc/nav.php'; 
   $id = mysqli_real_escape_string($conn, $_GET['id']);
   $sql = "SELECT students.name, students.section, students.chest, students.team, students.campus, students.team, 
   SUM(programlist.point) AS point FROM students, programlist WHERE students.id=$id AND programlist.studentid=$id";
   $res = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($res);
   ?>
<div class="card centerCard">
    
<?php
echo '<h3>'.$row['name'].'</h3>'; 
echo '<div>Team: <span class="grName">'.getGroupName($row['team']).'</span></div>'; 
echo '<div>Campus: <span class="grName">'.getCampusName( $row['campus']).'</span></div>'; 
echo '<div>Section: <span class="grName">'.getSection( $row['section']).'</span></div>'; 

echo '<div>Chest No: <span class="grName">'.$row['chest'].'</span></div>'; 
echo '<div>Point: <span class="grName">'.$row['point'].'</span></div>'; 




?>



</div>


<!-- Students SECTION -->
<br>
<div class="card centerCard" id="partis">
<div class="subHeading"><h3 style="color: #0D6EFD;">Programs</h3>

</div>

<?php

$resultSQL = "SELECT  program.name, programlist.programid FROM program, programlist WHERE programlist.programid = program.id AND programlist.studentid=$id";
$resultRes = mysqli_query($conn, $resultSQL);


if(mysqli_num_rows($resultRes)>0){
        while($row2 = mysqli_fetch_assoc($resultRes)){
           
            echo '
            <div class="snRow">
    
            <div class="distance">
            <div style="display:flex;">
            '.$row2['name'].'</div>
            </div>
    
            </div>';
        }
    
 
}else{
    echo'<br><br><center>Results not declared</center>';
}
?>
</div>  


<!-- RESULT SECTION END -->


<a href="editStudent.php?id=<?php echo $id; ?>">
<div class="floating">
<i class="material-icons">create</i>
</div>
</a>

</body>
</html>