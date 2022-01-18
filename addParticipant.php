<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Participant | Rendezvous </title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</head>
<body>
   <?php include'inc/nav.php'; 
   
    
   $error =  "";
   $prId = "";
   if(isset($_POST['submit'])){
     if(isset($_POST['studentid'])){

     
       $studentid= mysqli_real_escape_string($conn, $_POST['studentid']);
       $programid= mysqli_real_escape_string($conn, $_POST['programid']);
       //$grade= mysqli_real_escape_string($conn, $_POST['grade']);
       //$rank= mysqli_real_escape_string($conn, $_POST['rank']);
       $isGroupSQL = "SELECT type FROM program WHERE id = $programid";
      $isGroupRES = mysqli_query($conn, $isGroupSQL);
      $isGroupRow = mysqli_fetch_assoc($isGroupRES);
      $finalGroupType = $isGroupRow['type'];
//Get Group name from particiapnt name
$getTeamNameSQL = "SELECT team FROM students WHERE id=$studentid";
$teamNameRes = mysqli_query($conn, $getTeamNameSQL);
$teamNameRow = mysqli_fetch_assoc($teamNameRes);
$finalTeamName = $teamNameRow['team'];

//CHECK IF ALREADY ADDED
$checkAddedSql = "SELECT studentid, programid FROM programlist 
                  WHERE studentid='$studentid' AND programid = '$programid'";
                  $checkAddedRes = mysqli_query($conn, $checkAddedSql);

                  if(mysqli_num_rows($checkAddedRes)>0){
                    $error = '<div class="alert alert-danger">This student is already added.</div>';
                  }else{
                    $mysql = "INSERT INTO programlist(studentid, programid, groupId, type) VALUES('$studentid', '$programid', '$finalTeamName','$finalGroupType')";

                    if(mysqli_query($conn, $mysql)){
                        $error = '<div class="alert alert-success" role="alert">
                        Participant added successfully! <span onclick="goBack('.$_GET['id'].')" style="margin-left:10px; cursor:pointer;" class="badge rounded-pill bg-success">Go Back</span>
             
                      </div>';
                    }else{
                     $error = '<div class="alert alert-danger" role="alert">Failed to add Participant!
                     
                    </div>';
                        echo mysqli_error($conn);
                    }
                  }

  
      }else{
        $error = '<div class="alert alert-danger">Please select a student.</div>';
      }
   }
   
   
   ?>

<div class="centerCard card">




<?php echo $error; ?>

    <form action="" method="post">
        <h3>Fill the participant details</h3> <br>
 
<?php
if(!isset($_GET['id'])){
  
?>
<br>
<!-- Program Selection -->
<select class="form-select" id="programid" name="programid">
	           <option disabled  selected>Program</option> 
             <?php 
$prgrmSql = "SELECT * FROM program";
$prgrmRes = mysqli_query($conn, $prgrmSql);
while($r = mysqli_fetch_assoc($prgrmRes)){
  echo' <option value="'.$r['id'].'">'.$r['name'].'</option> ';
}

?>
</select>

<br><br>
<?php 
}else{
  echo'Program: <h5 style="color:#0D6EFD;">'.$_GET['name'].'</h5><br>';
  $prId =  mysqli_real_escape_string($conn, $_GET['id']);
 echo' <input type="hidden" name="programid" value="'.$prId.'">';

}
?>
        <!-- Student Name -->
        <select class="form-select" id="studentid" name="studentid">
        <option disabled selected>Student</option> 
<?php 
$stdntSql = "SELECT * FROM students";
$stdntRes = mysqli_query($conn, $stdntSql);
while($r = mysqli_fetch_assoc($stdntRes)){
  echo' <option value="'.$r['id'].'">'.$r['chest'].' - '.$r['name'].' ('.strtoupper($r['team']).')'.'</option> ';
}

?>
</select>
<br>
<script>
    $('#programid').select2();
    $('#studentid').select2();

</script>

<br> <br>


<input type="submit" value="Add Participant" name="submit"   class="btn btn-primary" style="float: right; margin-right:30px;">


</form>

</div>
<script>

function goBack(id) {
  var url = "singleProgram.php?id="+id;
  window.location.replace(url);
}
</script>
</body>
</html>