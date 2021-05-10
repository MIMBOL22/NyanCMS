<?php
    ini_set('error_reporting', E_ERROR);
    include "engine/template.php";
    include 'engine/init.php';
    $head = new template("head",['title'=> $config->system->title,"libs"=>$libs_html]);
    echo $head->template;
    $nav = new template("nav");
    echo $nav->template;
    include 'engine/main.php';
    include 'engine/debug.php';
    ?>
</html>