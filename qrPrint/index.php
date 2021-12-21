<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
@page {
    size: A3;
    margin: 0;
  }
body{
  display: flex;
  flex-wrap: wrap;
  page-break-inside: auto;
}
  @media print {
    html, body {
      width: 297mm;
      height: 420mm;
      page-break-inside: auto;

    }
    img{
      width: 64mm;
height: 92mm;
    border-right: 1px solid #fff;
    border-top: 1px solid #fff;
    page-break-before: auto; /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
    page-break-after: auto; /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
    page-break-inside: avoid; /* or 'auto' */

}
.page-break {
    page-break-after: always;
}
  }
  .page-break {
    page-break-after: always;
}
img{
width: 64mm;
height: 92mm;
}
</style>


<body>
    <?php

use function PHPSTORM_META\type;

$dirname = "chest/";
$images = glob($dirname."*.png");

foreach($images as $key=>$image) {
  
    echo '<img src="'.$image.'" /><br />';
    if(($key+1)%36==0){
      echo $key+1;
      echo '<div class="page-break"></div>';
    }
}



?>
</body>
</html>