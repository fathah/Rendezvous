<?php

$error = "";
if(isset($_POST['submit'])){
    $pass = $_POST['pass'];

    if($pass=="mncglocal"){
        header('location:upload.php');
    }else{
        $error = '<div class="alert alert-danger" role="alert">
       Passcode dont match!
      </div>';
    }
}

include 'inc.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Add Result</title>
</head>
<style>
body{
    width: 50%;
    margin-left: 25%;
}
@media only screen and(max-width:700px){
    body{
        margin-left: 0%;
        margin:20px;
        width: 100%;
    }
}
</style>
<body>
   
    <br><br><br>
    <?php echo $error ?> <br>
    <h6>Enter Passcode:</h6>
    <form action="" method="post">


    <div class="input-group mb-3">
    <input type="password" name="pass" id="" class="form-control" placeholder="Passcode">
    </div>
    <input type="submit" value="Login" name="submit" class="btn btn-primary">
    </form>
    
    
   
</body>
</html>