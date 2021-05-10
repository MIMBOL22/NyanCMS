<?php
function offline(Object $obj,array $params = []){
    $a = rand(0,1);
    $obj->reparr([
            "back" => $a ? '/DirtyDependentInganue-size_restricted.gif' : '/CleanUnluckyHoneybadger-size_restricted.gif',
            "go" => $a ? 'бежит' : 'едет',
            "title"=>$params['title']]
    );
    return $obj->template;
}