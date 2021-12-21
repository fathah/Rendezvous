<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">


    <title>Programs Rendezvous </title>
</head>
<body>
   <?php include'inc/nav.php'; 
   include'inc/common.php'; 
   
   $sql = "SELECT * FROM program";
   $res = mysqli_query($conn, $sql);
   
   ?>
<div class="card centerCard">
    <h2>Program List</h2>
<?php
if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
        echo'<a href="singleProgram.php?id='.$row['id'].'"><div class="snRow">
        <img src="img/event.svg" width="30px" style="margin-right:10px;margin-bottom:5px;">'.$row['name'].' ('.getSection($row['section']).')
      <a href="editProgram.php?id='.$row['id'].'"><div class="ed"><img src="img/edit.png" width="20px" alt="">
      </div></a>
        </p></div></a>';
    }

}

?>



</div>




<a href="addProgram.php">
<div class="floating">
<img src="img/add.png" width="25px" alt="">
</div>
</a>


</body>
</html>