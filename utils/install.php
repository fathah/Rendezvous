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
$response = "";
$servername = "localhost";
$username = "root";
$password = "";

// Create connectionection
$connection = new mysqli($servername, $username, $password);
// Check connectionection
if ($connection->connect_error) {
    $response = '<div class="alert alert-danger">Couldnt connectionect to XAMPP server. Please ensure that XAMPP is running & MySQL is started.</div>';
}


if(isset($_POST['submit'])){
   
    
    // Create database
    $sql = "CREATE DATABASE rendezvous";
    if ($connection->query($sql) == TRUE) {
        $conn = new mysqli($servername, $username, $password, "rendezvous");

        $createTableRes = mysqli_multi_query($conn, $createAllTables);
        if($createTableRes){
            $response = '<div class="alert alert-success">Database created successfully<br>
            <button type="button" class="btn btn-dark mt-2" onclick="window.location.href=\'installPrograms.php\'">Import Program List</button>
            </div>';
            
        
        }else{
            $response = '<div class="alert alert-danger">Database created successfully <br>But there is an issue in creating table. <br>'.$conn->error.'</div>';
        }

        
    } else {
        $response = '<div class="alert alert-danger">Error creating database: ' . $connection->error.'</div>';
    }
    
    $connection->close();
}


?>


<body>
    <div class="">
        <br> <br>
        <center><img src="../img/install.png" width="15%" alt="DB Error"></center> <br><br>
   <div style="margin:0 30%;text-align:left;">
   <?php echo $response; ?> <br>
   <h2>Install Rendezvous Software</h2> 
   
    <p>
        Before installing the database please ensure the following 
        <li>No database is created with the name <b><i>rendezvous</i></b>  </li>
        <li>XAMPP server is installed and running.</li>
        <li>MYSQL is started in XAMPP server.</li>
       
    </p>
   
    <br>
   <form action="" method="post">
       <input type="hidden" name="confirm">
   <input type="submit" name="submit" value="Confirm & Install" class="btn btn-success"/>
   </form>
   </div>
    
    </div>
</body>
</html>