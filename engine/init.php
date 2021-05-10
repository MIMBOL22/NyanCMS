<?php
$debug = [];
function deb($k,$v){
    $GLOBALS['debug'][$k] = $v;
}
function json(string $src){
    return json_decode(file_get_contents("./jsons/".$src),1);
}
function locat($site,$time = 0){
    echo "<meta http-equiv='refresh' content='$time; url=$site'>";
}
function e404(){
    echo "<meta http-equiv='refresh' content='0; url=/404'>";
    die();
}
$config = json("config.json");
if($config['system']['offline']){
    include 'pages/offline.php';
    die();
}
$routers = json("routers.json");
$file = "public/".$_GET['page'];
if($routers[$_GET['page']] == "" && !file_exists($file)){
    e404();
}else if(file_exists($file) && $_GET['page'] != ""){
    header("Content-type: image/jpeg");
    die(readfile($file));
}
include 'mysql.php';
$mysql = new mysqlo($config['database']);
include 'libs.php';
?>
<!doctype html>
<html lang="en">
