<?php
$libs = json("libs.json");
deb("libs",$libs);
foreach ($libs as $k => $v){
	if($v['type'] == "js"){
		echo "<script src='".$v['link']."'></script>";
	}else if ($v['type'] == "css"){
		echo "<link rel='stylesheet' href='".$v['link']."'>";
	}
}
