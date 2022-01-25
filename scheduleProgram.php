<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Schedule Programme | Rendezvous </title>
</head>
<body>
   <?php include'inc/nav.php'; 
   
    
   $error =  "";
   $id = mysqli_real_escape_string($conn, $_GET['id']);

   if(isset($_POST['submit'])){
       $schedule= mysqli_real_escape_string($conn, $_POST['schedule']);
    
      
       $mysql = "UPDATE program SET  schedule_time='$schedule' WHERE id = $id";
       if(mysqli_query($conn, $mysql)){
        $error = '<div class="alert alert-success" role="alert">
        Program schedule updated successfully!
       </div>';

       }else{
    
       $error = '<div class="alert alert-danger" role="alert">
          Failed to update the program schedule!
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
        <h3><?php echo $row['name'];?></h3> <br>
        <!-- Student Name -->
        Select the time schedule <br/>
        <div class="input-group mb-3">
           
<input type="time"  class="form-control"  name="schedule" id="schedule" value="<?php echo $row['schedule_time']; ?>" placeholder="Scedhule Time" 
autocomplete="off" required>
</div>


<br>
<input type="submit" value="Update Program" name="submit"   class="btn btn-primary" style="float: right; margin-right:30px;">


    </form>
</div>

</body>
</html>