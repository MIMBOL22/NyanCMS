<?php
$debug = [];
function deb($k,$v){
    $GLOBALS['debug'][$k] = $v;
}
function json(string $src){
    return json_decode(file_get_contents($src),1);
}
$config = json("config.json");
if($config['system']['offline']){
    include 'offline.php';
    die();
}
deb("conf",$config);
include 'mysql.php';
$mysql = new mysqlo(
    $config['database']['ip'],
    $config['database']['user'],
    $config['database']['password'],
    $config['database']['dbname']
);
?>
