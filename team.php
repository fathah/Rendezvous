<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">


    <title>Groups | Rendezvous </title>
</head>
<body>
   <?php include'inc/nav.php'; 
   
   $sql = "SELECT * FROM team";
   $res = mysqli_query($conn, $sql);
   
   ?>
<div class="card centerCard">
    <h2>Groups</h2>
<?php
if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
        echo'<a href="singleTeam.php?id='.$row['id'].'"><div class="snRow">
        <p><img src="img/team.svg" width="30px" style="margin-right:10px;margin-bottom:5px;">'.$row['name'].' 
      <a href="editTeam.php?id='.$row['id'].'"><div class="ed"> <img src="img/edit.png" width="20px" alt="">
      </div></a>
        </p></div></a>';
    }

}

?>

</div>




<a href="addTeam.php">
<div class="floating" alt="Hey">
<img src="img/group_add.svg" width="25px" alt="">
</div>
</a>


</body>
</html>