<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>DB Connection Error</title>
</head>
<body>
    <div class="">
        <center><img src="../img/db-error.jpg" width="35%" alt="DB Error"></center>
   <div style="margin-left:30%;text-align:left;">
  <span  style="color:red;" >It seems that the database is not installed. Please install the database first.</span>
   <br>
   <button class="btn btn-success mt-2"
    onclick="window.location.replace('install.php');"
    >Install Now</button> <br><br>
   <h2>Troubleshoot</h2> 
    <li>Please check if Database is installed.</li>
    <li>Recheck if XAMPP server is running and MySQL is started.</li>
    <li>If the problem persists, please contact the support team.</li>
   
    <br>
    <button class="btn btn-primary"
    onclick="window.location.replace('/index.php');"
    >Reload</button>
   </div>
    
    </div>
</body>
</html>