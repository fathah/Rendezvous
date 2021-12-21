<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Rendezvous <?php echo Date('Y') ?></title>
</head>
<style>

td{
    text-align: left;
    padding: 10px;
   border: 1px solid #000;
}
th{
    text-align: center;
    padding: 10px;
   border: 1px solid #000;
}
table{
    border-collapse: collapse;

    width: 90%;
    margin-left: 5%;
    font-size: 1em;
    
}
</style>

<body>
   <?php include'inc/nav.php';
   include'inc/common.php';



   function saveIndPoint($id){
   global $conn;
    $getIndPointSQL = "SELECT SUM(point) AS point FROM programlist WHERE studentid = $id AND type='s'";
    $getIndRes = mysqli_query($conn, $getIndPointSQL);
    $point = mysqli_fetch_assoc($getIndRes)['point'];
    $insertSQL = "UPDATE students SET point=$point WHERE id = $id";
    mysqli_query($conn, $insertSQL);
   }
   
  $sql = "SELECT * FROM students ORDER BY section, point DESC";
  $res = mysqli_query($conn, $sql);
echo'<div class="card centerCard" style="width:70%; margin-left:15%;">';
echo'<h2>Individual Score List</h2>';

if(mysqli_num_rows($res)>0){
    ?>

<table width="100%">
<tr>
    <th>Name</th>
    <th>Chest No</th>
    <th>Team</th>
    <th>Section</th>
    <th>Point</th>
  
  </tr>

<?php

    while($r = mysqli_fetch_assoc($res)){
        
        saveIndPoint($r['id']);
        echo'<tr style="background:';
        if($r['section']=='jr'){
            echo'rgba(46, 204, 113,0.2)';
        }else{
            echo'rgba(52, 152, 219,0.2)';
        }
        echo';"><td width="38%">';
        echo $r['name'].'</td>';
        echo'<td width="10%">';
        echo $r['chest'].'</td>';
        echo'<td width="25%">';
        echo getGroupName($r['team']);
        echo'</td>';
        echo'<td width="15%">';
        echo getSection($r['section']);
        echo'</td><td>';
        echo $r['point'];
        echo'</td></tr>';
        
    }
}
  echo'</table></div>';
   ?>

</body>
</html>