<?php
    //function deb($k,$v){ TODO
    //$GLOBALS['debug'][$k] = $v; TODO
    //} TODO
    function json(string $src,$associative = false){
        return json_decode(file_get_contents("./jsons/".$src),$associative);
    }
    function locat($site,$time = 0){
        echo "<meta http-equiv='refresh' content='$time; url=$site'>";
    }