<?php
$debug = [];
function deb($k,$v){
    $GLOBALS['debug'][$k] = $v;
}
function json(string $src){
    return json_decode(file_get_contents("jsons/".$src),1);
}
function locat($site,$time = 0){
    echo "<meta http-equiv='refresh' content='$time; url=$site'>";
}
function e404(){
    echo "<meta http-equiv='refresh' content='0; url=/404'>";
    die();
}
deb("get",$_GET);
$config = json("config.json");
if($config['system']['offline']){
    include 'pages/offline.php';
    die();
}
deb("conf",$config);
include 'mysql.php';
$mysql = new mysqlo($config['database']);
?>
