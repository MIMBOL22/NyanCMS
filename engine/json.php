<?php
function json(string $src,$associative = false){
    return json_decode(file_get_contents($src),$associative);
}
$folder = "./jsons";
$jsons = scandir($folder);
unset($jsons[0],$jsons[1]);
foreach ($jsons as $k=>$v){
    $var = pathinfo($folder."/".$v)["filename"];
    $GLOBALS[$var] = json($folder."/".$v);
    $GLOBALS[$var."arr"] = json($folder."/".$v,1);
}
//config
//libs
//routers
//routers_die