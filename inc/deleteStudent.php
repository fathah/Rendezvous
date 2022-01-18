<?php
include 'db.php';

$id = $_GET['id'];
        $delSql = "DELETE FROM students WHERE id = $id";
        $res = mysqli_query($conn, $delSql);
        if($res){
            header('Location:../students.php');
        }
        
        ?>