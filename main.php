<?php
deb('routs',$routers);
deb("get",$_GET);
deb("conf",$config);
include 'controllers/'.$routers[$_GET['page']].".php";
echo controller(file_get_contents('templates/'.$routers[$_GET['page']].".nyan"));