<center>
    
<!-- <h1>Rendezvous <?php echo Date('Y') ?></h1><br> -->
    
    <?php
$link = "$_SERVER[REQUEST_URI]";


?>
    <div class="nav">
   
   <?php
if(strpos($link, 'app')!== false){
    echo'<a href="../">Home</a>
    <a href="../students.php">Students</a>
    <a href="../programs.php">Programmes</a>
    <a href="../team.php">Groups</a>
    <a href="../results.php">Results</a>
    <a href="../app">Cloud Sync</a>';
}else{
    echo'<a href="./">Home</a>
    <a href="students.php">Students</a>
    <a href="programs.php">Programmes</a>
    <a href="team.php">Groups</a>
    <a href="results.php">Results</a>
    <a href="app">Cloud Sync</a>';
}

?>
   
   
   

    </div>
    </center>
    <br><br>
<a class="manzil" href="https://manzilmedia.net" target="_blank">Manzil Developers</a>
<br>