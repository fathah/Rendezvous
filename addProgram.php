<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Programme | Rendezvous </title>
</head>
<body>
   <?php include'inc/nav.php'; 
   
    
   $error =  "";

   if(isset($_POST['submit'])){
       $name= mysqli_real_escape_string($conn, $_POST['name']);
       $section= mysqli_real_escape_string($conn, $_POST['section']);


       $mysql = "INSERT INTO program(name, section) VALUES('$name', '$section')";
       if(mysqli_query($conn, $mysql)){
        $error = '<div class="alert alert-success" role="alert">
        Program added successfully!
       </div>';

       }else{
    
       $error = '<div class="alert alert-danger" role="alert">
          Failed to add the program!
         <br>'.mysqli_error($conn).'</div> ';
          
       }
   }
   
   
   
   ?>

<div class="centerCard card">
<?php echo $error; ?>
    <form action="" method="post">
        <h3>Fill the program details</h3> <br>
        <!-- Student Name -->
        <div class="input-group mb-3">
<input type="text"  class="form-control"  name="name" id="name" placeholder="Program Title" autocomplete="off" required>
</div>

<!-- Group Name -->
<select class="form-select" aria-label="Section" name="section" id="section" required>
  <option selected disabled>Section</option>
  <option value="jr">Junior</option>
  <option value="sr">Senior</option>
  <option value="gn">General</option>

</select>
<br>
<!--  Type of Compettiton -->
<select class="form-select" aria-label="Type" name="type" id="type" required>
  <option selected disabled>Program Type</option>
  <option value="s">Individual</option>
  <option value="g">Group</option>
  
</select>
<br>
<input type="submit" value="Add Program" name="submit"   class="btn btn-primary" style="float: right; margin-right:30px;">


    </form>
</div>

</body>
</html>