<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../inc/head.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <title>Rendezvous <?php echo Date('Y') ?></title>

</head>

<body>
    <?php include '../inc/nav.php';


$error = "";

function updateFeed($jsonData){
    
    $url = "https://manzilmedia.net/apps/rendezvous/addFeed.php";
    $api = "06b53047cf294f7207789ff5293ad2dc";
    
    
    $data = array('api' =>$api, 'data' => $jsonData);
    
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { 
        echo 'Something Went wrong!';
     }
    }
if(isset($_POST['submit'])){
    $feed = mysqli_real_escape_string($conn, $_POST['feed']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    $feeds = array(
        "feed"=>$feed,
        "type"=>$type
    );
    $jsonFeed = json_encode($feeds);
    updateFeed($jsonFeed);
    $error = '<div class="alert alert-success" role="alert">
           New feed updated! <span onclick="bck()" style="margin-left:10px; cursor:pointer;" class="badge rounded-pill bg-success">Go Back</span>

         </div>';

}



    ?>
<div class="centerCard card">
    <?php echo $error; ?>
    <form action="" method="post">
        <h3>Fill the feed to send</h3> <br>
        <!-- Student Name -->
        <div class="input-group mb-3">
<input type="text"  class="form-control"  name="feed" id="feed" placeholder="Add Feed" autocomplete="off" required>
</div>

<!-- Group Name -->
<select class="form-select" aria-label="type" name="type" id="type" required>
  <option selected>Feed Type</option>
  <option value="Alert">Alert</option>
  <option value="Information">Information</option>
  <option value="Notice">Notice</option>
  <option value="Warning">Warning</option>

</select>
<br>



<input type="submit" value="Add Feed" name="submit"   class="btn btn-primary" style="float: right; margin-right:30px;">

    </form>

<script>
function bck(){
    window.location.replace('index.php')
}

</script>


</body>

</html>