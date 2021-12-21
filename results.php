<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Rendezvous <?php echo Date('Y') ?></title>

</head>
<style>
.syncBtn{
    background: #27ae60;
    color: #fff;
    padding: 5px 10px;
    border-radius: 50px;
    height: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.2s ease;
    user-select: none;
}
.syncBtn:hover{
    color: rgba(255, 255, 255, 0.8);
    background: #219251;

}
.fx{
    display: flex;
    justify-content: space-between;
}
</style>
<body>

    <?php include 'inc/nav.php';
    include 'inc/common.php';

$resSQL = "SELECT * FROM  program ORDER BY resultDeclared desc, isCompleted desc";

$res = mysqli_query($conn, $resSQL);

echo '<div class="card centerCard">';
$index = 1;
if(mysqli_num_rows($res)>0){
    while($r = mysqli_fetch_assoc($res)){
        $snId = $r['id'];
        $declared = $r['resultDeclared'];
        echo'<div class="card"  style="padding:10px 15px;">';
        echo '<div class="fx">
        <h5 style="margin-bottom:15px;">'.$index.') '.$r['name'].' ('.getSection($r['section']).')</h5>
        <a id="'.$snId.'" class="syncBtn" 
        style="
        background:';
        if($declared==1){
            echo'#c0392b';
                    }else{
                        echo'#27ae60';
            
                    }
        
        echo'" onClick="markDeclared('.$snId.',';
        if($declared==1){
echo'0';
        }else{
            echo'1';

        }
        echo')">';
       if($declared==1){
        echo'<img src="img/unsync.svg" style="margin-right:2px;" height="18px"> Unsync';
                }else{
                    echo'<img src="img/sync.svg" style="margin-right:2px;" height="18px"> Sync';
        
                }
       
        echo'</a></div>';
        
        $snSQL = "SELECT programlist.studentid, programlist.rank, students.name, students.chest, students.team FROM programlist, students 
        WHERE programlist.programid = $snId AND programlist.rank>0 AND programlist.studentid = students.id ORDER BY programlist.rank";

        $snRes = mysqli_query($conn, $snSQL);
        if(mysqli_num_rows($snRes)>0){
while($r2 = mysqli_fetch_assoc($snRes)){
    echo' <div style="display:flex; margin-bottom:10px;"> <span class="rank">'.$r2['rank'].'</span>';
    echo $r2['name'].'<span class="chestNum">'.$r2['chest'].'</span> ('.strtoupper($r2['team']).')</div>';
}
        }else{
            echo'<center><font color="#95a5a6">Result not declared</font></center>';
        }
        echo'</div><br>';

        $index++;
    }
   
}
echo'</div>';

    ?>



<!-- <a href="addFeed.php">
<div class="floatingLeft">
<img src="img/print.svg" style="margin-right: 4px;" width="25px" alt="">
Print Results
</div>
</a> -->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

function markDeclared(id, result){
    var aButton = document.getElementById(id);
    if(result==1){
        aButton.style.background = "#c0392b";
        aButton.innerHTML = '<img src="img/unsync.svg" style="margin-right:2px;" height="18px"> Unsync';
    }else{
        aButton.style.background = "#27ae60";
        aButton.innerHTML = '<img src="img/sync.svg" style="margin-right:2px;" height="18px"> Sync';
    }

  $.post("inc/declareResult.php",
  {
    id: id,
    result: result
  },
 
  );

}


</script>

</html>