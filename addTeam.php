<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Group | Rendezvous </title>
</head>
<body>

   <?php include'inc/nav.php';
   
   
   $error =  "";

   if(isset($_POST['submit'])){
       $name= mysqli_real_escape_string($conn, $_POST['name']);
       $code= strtolower(mysqli_real_escape_string($conn, $_POST['code']));
     

       $mysql = "INSERT INTO team(name, code) VALUES('$name', '$code')";
       if(mysqli_query($conn, $mysql)){
           $error = '<div class="alert alert-success" role="alert">
           Group added successfully!
         </div>';
       }else{
        $error = '<div class="alert alert-danger" role="alert">Failed to add group!
        
       </div>';
           echo mysqli_error($conn);
       }
   }
   
   
   
   ?>

<div class="centerCard card">
    <?php echo $error; ?>
    <form action="" method="post">
        <h3>Fill the group details</h3> <br>
        <!-- Student Name -->
        <div class="input-group mb-3">
<input type="text"  class="form-control"  name="name" id="name" placeholder="Group Name" autocomplete="off" required>
</div>

<div class="input-group mb-3">
<input type="text"  class="form-control"  name="code" id="code" placeholder="Team Code Eg: CC" required>
</div>
<input type="submit" value="Add Group" name="submit"   class="btn btn-primary" style="float: right; margin-right:30px;">


    </form>
</div>

</body>
</html>