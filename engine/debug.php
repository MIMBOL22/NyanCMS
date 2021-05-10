<?php
$config['system']['debug'] = 1;
if($config['system']['debug']){
    echo("<script>console.log('DEBUG-MODE{');</script>");
    foreach($GLOBALS as $k => $v){
        if(is_array($v)){
            echo("<script>console.log('".$k."',".json_encode($v).");</script>");
        }else{
            echo("<script>console.log('".$k."','".$v."');</script>");
        }


    }
    echo("<script>console.log('}');</script>");
}
