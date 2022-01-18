<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Programme | Rendezvous </title>
</head>
<body>
   <?php include'inc/nav.php'; 
   
    
   $error =  "";
   $id = mysqli_real_escape_string($conn, $_GET['id']);

   if(isset($_POST['submit'])){
       $name= mysqli_real_escape_string($conn, $_POST['name']);
       $section= mysqli_real_escape_string($conn, $_POST['section']);
       $type = mysqli_real_escape_string($conn, $_POST['type']);

       $mysql = "UPDATE program SET name='$name', section='$section', type='$type' WHERE id = $id";
       if(mysqli_query($conn, $mysql)){
        $error = '<div class="alert alert-success" role="alert">
        Program updated successfully!
       </div>';

       }else{
    
       $error = '<div class="alert alert-danger" role="alert">
          Failed to update the program!
         <br>'.mysqli_error($conn).'</div> ';
          
       }
   }
   
   
   
   ?>

<div class="centerCard card">
<?php echo $error; 
$viewSql = "SELECT * FROM program WHERE id = $id";
$viewRes = mysqli_query($conn, $viewSql);

$row = mysqli_fetch_assoc($viewRes);

?>
    <form action="" method="post">
        <h3>Fill the program details</h3> <br>
        <!-- Student Name -->
        <div class="input-group mb-3">
<input type="text"  class="form-control"  name="name" id="name" value="<?php echo $row['name']; ?>" placeholder="Program Title" autocomplete="off" required>
</div>

<!-- Group Name -->
<select class="form-select" aria-label="Section" name="section" id="section" required>
  <option value=""  <?php if($row['section']==""){echo "selected";}?> disabled>Section</option>
  <option value="pr" <?php if($row['section']=="pr"){echo "selected";}?>>Primary</option>
  <option value="sc" <?php if($row['section']=="sc"){echo "selected";}?>>Secondary</option>
  <option value="sj" <?php if($row['section']=="sj"){echo "selected";}?>>Sub Junior</option>
  <option value="jr" <?php if($row['section']=="jr"){echo "selected";}?>>Junior</option>
  <option value="sr" <?php if($row['section']=="sr"){echo "selected";}?>>Senior</option>
  <option value="gn" <?php if($row['section']=="gn"){echo "selected";}?>>General</option>

</select>
<br>
<!--  Type of Compettiton -->
<select class="form-select" aria-label="Type" name="type" id="type" required>
  <option   value=""  <?php if($row['type']==""){echo "selected";}?> disabled>Program Type</option>
  <option value="s" <?php if($row['type']=="s"){echo "selected";}?>>Individual</option>
  <option value="g" <?php if($row['type']=="g"){echo "selected";}?>>Group</option>
</select>
<br>
<input type="submit" value="Update Program" name="submit"   class="btn btn-primary" style="float: right; margin-right:30px;">


    </form>
</div>

</body>
</html>