<?php
//deb('routs',$routers); TODO
//deb("get",$_GET); TODO
//deb("conf",$config); TODO
$index = new template($routers[$_GET['page']]);
echo $index->template;