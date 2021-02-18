<?php
$routers = json("routers.json");
deb('routs',$routers);
if($routers[$_GET['page']] == ""){
	e404();
}
include 'controllers/'.$routers[$_GET['page']].".php";
echo controller(file_get_contents('templates/'.$routers[$_GET['page']].".nyan"));