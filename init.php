<?php
$debug = [];
function deb($k,$v){
    $GLOBALS['debug'][$k] = $v;
}
$config = json_decode(file_get_contents("config.json"),1);
if($config['system']['offline']){
    include 'offline.html';
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
deb("query",$mysql->table("SELECT * FROM pages",[]));
