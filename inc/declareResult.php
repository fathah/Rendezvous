<?php
include 'db.php';

$id = $_POST['id'];
$result = $_POST['result'];

        $declareSQL = "UPDATE program SET resultDeclared = $result WHERE id = $id";
        mysqli_query($conn, $declareSQL);


        
        ?>