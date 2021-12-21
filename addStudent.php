<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Student | Rendezvous </title>
</head>
<body>

   <?php include'inc/nav.php';
   
   
   $error =  "";

   if(isset($_POST['submit'])){
       $name= mysqli_real_escape_string($conn, $_POST['name']);
       $campus= mysqli_real_escape_string($conn, $_POST['campus']);
       $section= mysqli_real_escape_string($conn, $_POST['section']);
       $team= mysqli_real_escape_string($conn, $_POST['team']);

       $chest = "";
if($section=="jr"){
  $fName = "chest/jr.txt";

  $hits = file($fName);
  if($hits[0]<401){
    $fp = fopen($fName , "w");
  fputs($fp , "401");
  $chest = "401";
  }
 else{
  $hits[0] ++;
  $fp = fopen($fName , "w");
  fputs($fp , "$hits[0]");
  $chest = $hits[0];
 }
  fclose($fp);


}else{
  $fName = "chest/sr.txt";
  $hits = file($fName);
  if($hits[0]<501){
    $fp = fopen($fName , "w");
  fputs($fp , "501");
  $chest = "501";
  }
 else{
  $hits[0] ++;
  $fp = fopen($fName , "w");
  fputs($fp , "$hits[0]");
  $chest = $hits[0];
 }
  fclose($fp);
}

       $mysql = "INSERT INTO students(name, campus, section, team, chest) VALUES('$name', '$campus', '$section', '$team', '$chest')";
       if(mysqli_query($conn, $mysql)){
           $error = '<div class="alert alert-success" role="alert">
           Student added successfully!
         </div>';
       }else{
        $error = '<div class="alert alert-danger" role="alert">Failed to add student!
        
       </div>';
           echo mysqli_error($conn);
       }
   }
   
   
   
   ?>

<div class="centerCard card">
    <?php echo $error; ?>
    <form action="" method="post">
        <h3>Fill the student details</h3> <br>
        <!-- Student Name -->
        <div class="input-group mb-3">
<input type="text"  class="form-control"  name="name" id="name" placeholder="Student Name" autocomplete="off" required>
</div>
<!-- Campus Name -->
<select class="form-select" aria-label="Campus" name="campus" id="campus" required>
  <option selected>Campus</option>
  <option value="mnc">Madeenathunnoor</option>
</select> <br>
<!-- Group Name -->
<select class="form-select" aria-label="Section" name="section" id="section" required>
  <option selected>Section</option>
  <option value="jr">Junior</option>
  <option value="sr">Senior</option>
</select>
<br>
<!-- Section -->
<select class="form-select" aria-label="Group" name="team" id="team" required>
<option disabled selected>Group</option> 
<?php 
$grpSQL = "SELECT * FROM team";
$grpRES = mysqli_query($conn, $grpSQL);
while($r = mysqli_fetch_assoc($grpRES)){
  echo' <option value="'.$r['code'].'">'.$r['name'].'</option> ';
}

?>
</select> <br>



<input type="submit" value="Add Student" name="submit"   class="btn btn-primary" style="float: right; margin-right:30px;">


    </form>
</div>

</body>
</html>