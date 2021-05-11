<?php
$temps = [];
$temps['head'] = new template("head",['title'=> $config->system->title,"libs"=>$libs_html]);
$temps['nav'] = new template("nav");
$temps['index'] = new template($routersarr[$_GET['page']]);
if(array_search($_GET['page'],$rout_die) !== false) {
    die($temps['index']->template);
}else {
    foreach ($temps as $k => $v) {
        echo $v->template;
    }
}