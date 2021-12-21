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
  <title>Add Result | Rendezvous </title>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</head>

<body>
  <?php include 'inc/nav.php';

  $id = $_GET['id'];
  $error =  "";

  if (isset($_POST['submit'])) {
    $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
    $programid = mysqli_real_escape_string($conn, $_POST['programid']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $rank = mysqli_real_escape_string($conn, $_POST['rank']);

    //Check if Particiapnt is added
    $checkExistsSQL = "SELECT * from programlist WHERE studentid=$studentid AND programid=$programid";
    $checkExistsRes = mysqli_query($conn, $checkExistsSQL);
    if (mysqli_num_rows($checkExistsRes) > 0) {
      //GEt Program type from Progeram Id
      $prId_SQL = "SELECT type, name FROM program WHERE id = $programid";
      $prID_Res = mysqli_query($conn, $prId_SQL);
      $prId_row = mysqli_fetch_assoc($prID_Res);
      $finalPoint = "";
      $prName = $prId_row['name'];
      $prType = $prId_row['type'];



      //TEAM NAME FETCH END
      if($prType=='g'){
        $finalPoint = getPoint($rank, $grade, true, $prName);
      }else{
        $finalPoint = getPoint($rank, $grade, false, $prName);
      }
        
        $mysql = "UPDATE programlist SET grade='$grade', rank='$rank', point=$finalPoint WHERE studentid=$studentid AND programid=$programid";

      //UPDATE PROGRAM TABLE THAT THE
      //CURRENT PROGRAM IS COMPLETED
      if($rank==3){
        $programUpdateSQL = "UPDATE program SET isCompleted=1 WHERE id = $programid";
      mysqli_query($conn, $programUpdateSQL);
      }
      //PROGRAM UPDATE SQL END

      //CALL THE QUERY
      if (mysqli_query($conn, $mysql)) {
        $error = '<div class="alert alert-success" role="alert">
           Result added successfully! <span onclick="goBack('.$_GET['id'].')" style="margin-left:10px; cursor:pointer;" class="badge rounded-pill bg-success">Go Back</span>
         </div>';
      } else {
        $error = '<div class="alert alert-danger" role="alert">Failed to add result!
        
       </div>';
        echo mysqli_error($conn);
      }
    } else {
      $error = '<div class="alert alert-danger" role="alert">No participant found in the specific program!</div>';
    }
  }


  ?>


  <div class="centerCard card">
    <?php echo $error;
    ?>

    <form action="" method="post">
      <h3>Fill the result details</h3> <br>




      <h4 style="color:#0D6EFD;">Program: <?php
                                          $nmeSQL = "SELECT * FROM program WHERE id=$id";
                                          $nmeres = mysqli_query($conn, $nmeSQL);
                                          $nmerow = mysqli_fetch_assoc($nmeres);



                                          echo $nmerow['name']; ?></h4> <br>
      <input type="hidden" name="programid" value="<?php echo $id; ?>">
      <!-- Student Name -->
      <select class="form-select" id="studentid" name="studentid" required>

        <?php
        //First fetchg from program list
        $sql = "SELECT p.programid, p.studentid, s.id, s.name, s.team,  s.chest 
FROM programlist AS p, students AS s
WHERE p.programid = $id AND p.studentid = s.id";
        $sqlRes = mysqli_query($conn, $sql);


        if (mysqli_num_rows($sqlRes) > 0) {
          echo '<option disabled selected>Student</option>';
          while ($row = mysqli_fetch_assoc($sqlRes)) {
            echo' <option value="'.$row['id'].'">'.$row['chest'].' - '.$row['name'].' ('.strtoupper($row['team']).')'.'</option> ';
          }
        } else {
          echo '<option disabled selected>No Participants</option>';
        }





        ?>

      </select>
      <br> <br>
      <!-- Program Selection -->


      <!-- Campus Name -->
      <select class="form-select" aria-label="Grade" name="grade" id="grade" required>
        <option selected disabled>Grade</option>
        <option value="APLUS">A+ </option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">No Grade</option>


      </select> <br>
      <!-- Group Name -->
      <select class="form-select" aria-label="Rank" name="rank" id="rank" required>
        <option selected>Rank</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">No Rank</option>

      </select>
      <br>



      <script>
        $('#programid').select2();
        $('#studentid').select2();

        

function goBack(id) {
  var url = "singleProgram.php?id="+id;
  window.location.replace(url);
}

      </script>

      <br> <br>


      <input type="submit" value="Add Result" name="submit" class="btn btn-primary" style="float: right; margin-right:30px;">


    </form>
  </div>

</body>

</html>