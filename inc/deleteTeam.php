<?php
include 'db.php';

$id = $_GET['id'];
        $delSql = "DELETE FROM team WHERE id = $id";
        mysqli_query($conn, $delSql);
        header('Location:../team.php');
        ?>