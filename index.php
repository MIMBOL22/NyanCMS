<?php
    //ini_set('error_reporting', E_ERROR);
    include 'engine/init.php';
    include "engine/template.php";
    $head = new template("head");
    echo $head->template;
    $nav = new template("nav");
    echo $nav->template;
    include 'engine/main.php';
    include 'engine/end.php';
    ?>
</html>