<?php
$url =$_GET['q'];

// Avishkar Patil

$id = end(explode('/', $url));
$apiurl =file_get_contents("https://wapi.voot.com/ws/ott/getMediaInfo.json?platform=Web&pId=2&mediaId=$id");

$voot =json_decode($apiurl, true);

$id =$voot['assets']['MediaID'];
$title =$voot['assets']['MediaName'];
$des =$voot['assets']['Metas'][1]['Value'];
$imgu =$voot['assets']['Pictures'][0]['URL'];
$img = str_replace('https://viacom18-res.cloudinary.com/image/upload/f_auto,q_auto:eco,fl_lossy/kimg', 'https://kimg.voot.com', $imgu); 
$ux =$voot['assets']['EntryId'];
$hls = "https://cdnapisec.kaltura.com/p/1982551/playManifest/pt/https/f/applehttp/t/web/e/".$ux;
$mpd = $voot['assets']['Files'][2]['URL'];


$apii = array("created_by" => "Avishkar Patil", "id" => $id, "title" => $title, "description" => $des, "thumbnail" => $img, "hls" => $hls, "dash" => $mpd);
$api =json_encode($apii, JSON_UNESCAPED_SLASHES);
header("Content-Type: application/json");

$ex= array("error" => "Something went wrong, Check URL" );
$err =json_encode($ex);

if($url ==""){
   header("X-UA-Compatible: IE=edge");
   header("Content-Type: application/json");
   echo $err;
}
else{
  header("X-UA-Compatible: IE=edge");
  header("Content-Type: application/json");

echo $api;
}

// Avishkar Patil
?>


