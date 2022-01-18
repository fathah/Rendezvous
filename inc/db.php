<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rendezvous";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    header("Location:utils/connectionError.php");
}
mysqli_set_charset($conn,"utf8");

?>
