<?php
$libs = json("libs.json");
deb("libs",$libs);
$libs_html = "";
foreach ($libs as $k => $v){
	if($v['type'] == "js"){
        $libs_html .= "<script src='".$v['link']."'></script>";
	}else if ($v['type'] == "css"){
        $libs_html .= "<link rel='stylesheet' href='".$v['link']."'>";
	}
}
