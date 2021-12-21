<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendezvous</title>
</head>
<style>
*{
    margin: 0;
}
body{
  display: flex;
  flex-wrap: wrap;
  page-break-inside: auto;
}

  .page-break {
    page-break-after: always;
}
img{
width:100%;
}
.bd{
    width: 100%;

}
</style>


<body>
<img src="lg.png" width="100%" alt="" style="margin: 5px 10px;">

<hr>
<br>
    <?php


$dirname = "images/";
$images = glob($dirname."*.jpg");

echo'<div class="bd">';
foreach($images as $key=>$image) {
  
    echo '<img src="'.$image.'" /><br /><br>';
}
echo'</div>';


?>
</body>
</html>