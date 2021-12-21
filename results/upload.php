<?php

$error = "";
if(isset($_POST['upload'])){
    $filename = $_FILES['imagefile']['name'];
    $valid_ext = array('png','jpeg','jpg');
    $location = "images/".$filename;
  
    $file_extension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
  
    // Check extension
    if(in_array($file_extension,$valid_ext)){
      compressImage($_FILES['imagefile']['tmp_name'],$location,60);
      $error = '
      <div class="alert alert-success" role="alert">
   Result Uploaded!
  </div>
      ';
    }else{
        $error = '
        <div class="alert alert-danger" role="alert">
     Invalid File Type!
    </div>
        ';
    }
  }
  
  function compressImage($source, $destination, $quality) {
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') 
      $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/png') 
      $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);

   
  
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

    <title>Upload Result</title>
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
    <h6>Upload Result File:</h6>


    <form method='post' action='' enctype='multipart/form-data'>

    <div class="input-group mb-3">
  <input type="file" class="form-control" id="inputGroupFile01" name="imagefile"> <br> 
  
</div>
<input type='submit' value='Upload' name='upload'  class="btn btn-primary">
</form>


    
    
   
</body>
</html>