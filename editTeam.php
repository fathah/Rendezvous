<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Team | Rendezvous </title>
</head>
<body>

   <?php include'inc/nav.php';
   
   
   $error =  "";
$id = mysqli_real_escape_string($conn, $_GET['id']);
   if(isset($_POST['submit'])){
       $name= mysqli_real_escape_string($conn, $_POST['name']);
       $code= mysqli_real_escape_string($conn, $_POST['code']);
     


       $mysql = "UPDATE team SET name='$name', code='$code' WHERE id = $id";
       
       if(mysqli_query($conn, $mysql)){
           $error = '<div class="alert alert-success" role="alert">
           Group details updated successfully!
         </div>';
       }else{
        $error = '<div class="alert alert-danger" role="alert">Failed to update details!
        
       </div>';
           echo mysqli_error($conn);
       }
   }
   
   
   
   ?>

<div class="centerCard card">
    <?php echo $error; 
    $viewSql = "SELECT * FROM team WHERE id = $id";
    $viewRes = mysqli_query($conn, $viewSql);

   $row = mysqli_fetch_assoc($viewRes);
    
    ?>
    
    <form action="" method="post">
        <h3>Fill the group details</h3> <br>
        <!-- Student Name -->
        <div class="input-group mb-3">
<input type="text"  class="form-control"  name="name" id="name" placeholder="Group Name" value="<?php echo $row['name']; ?>" autocomplete="off" required>
</div>

<!-- Code  -->

<div class="input-group mb-3">
<input type="text"  class="form-control" placeholder="Group Code Eg: CC" value="<?php echo $row['code']; ?>" name="code" id="code"  required>
</div>
<input type="submit" value="Update Group" name="submit"   class="btn btn-primary" style="float: right; margin-right:30px;">


    </form>
</div>

</body>
</html>