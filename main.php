<?php
$routers = json("routers.json");
deb('routs',$routers);
if($routers[$_GET['page']] == ""){
	e404();
}
include 'controllers/'.$routers[$_GET['page']];
echo controller("");