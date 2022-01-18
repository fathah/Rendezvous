<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Install Rendezvous Software</title>
</head>


<?php  

include 'tableQuery.php';
include '../inc/head.php';
$response = "";

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
// Check connection



if(isset($_POST['submit'])){
   
    
    // Create database
    $sql = mysqli_query($conn, $programsSQL);
    if ($sql) {
      
        $response = '<div class="alert alert-success">Programs added successfully</div>';
    } else {
        $response = '<div class="alert alert-danger">Error adding programs: ' . $conn->error.'</div>';
    }
    
    $conn->close();
}


?>


<body>
    <div class="">
        <br> <br>
        <center><img src="../img/install.png" width="15%" alt="DB Error"></center> <br><br>
   <div style="margin:0 30%;text-align:left;">
   <?php echo $response; ?> <br>
   <h2>Import Program List</h2> 
   
    <p>
       
       
    </p>
   
    <br>
   <form action="" method="post">
       <input type="hidden" name="confirm">
   <input type="submit" name="submit" value="Confirm & Import" class="btn btn-success"/>
   </form>
   </div>
    
    </div>
</body>
</html>