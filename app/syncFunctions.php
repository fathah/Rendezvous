<?php



function updateData($jsonData, $file){
    
    $url = "https://manzilmedia.net/apps/rendezvous/sync.php";
    $api = "06b53047cf294f7207789ff5293ad2dc";
    
    
    $data = array('api' =>$api, 'data' => $jsonData, 'file'=>$file);
    
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

?>