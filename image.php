<?php

//Set the Content Type
ini_set('memory_limit', '256M');

$output = "img/ct.jpg";

// Create Image From Existing File
$jpg_image = imagecreatefromjpeg('img/certificate.jpg');

// Allocate A Color For The Text
$white = imagecolorallocate($jpg_image, 255, 255, 255);

// Set Path to Font File
$font_path = 'fnt.ttf';

// Set Text to Be Printed On Image
$text = "This is a sunset!";

// Print Text On Image
imagettftext($jpg_image, 25, 0, 75, 300, $white, $font_path, $text);

// Send Image to Browser
imagejpeg($jpg_image, $output);

echo '<img src="'.$output.'"/>';
// Clear Memory
//imagedestroy($jpg_image);
?>