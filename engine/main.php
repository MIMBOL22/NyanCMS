<?php
deb('routs',$routers);
deb("get",$_GET);
deb("conf",$config);
$index = new template($routers[$_GET['page']]);
echo $index->template;