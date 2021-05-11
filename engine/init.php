<?php
include 'json.php';
include 'functions.php';
include 'mysql.php';
include 'libs.php';
$file = "public/".$_GET['page'];
$mysql = new mysqlo((array) $config->database);
if($routersarr[$_GET['page']] == "" && !file_exists($file)){
    locat("/404");
    die();
}else if(file_exists($file) && $_GET['page'] != ""){
    header("Content-type: ".mime_content_type($file));
    die(readfile($file));
}
if($config->system->offline){
    $offline_temp = new template("offline");
    die($offline_temp->template);
}
?>
<!doctype html>
<html lang="en">
