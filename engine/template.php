<?php
class template{
    public $template;
    public function __construct(string $name,array $params = []){
        $this->template = file_get_contents("./templates/".$name.".nyan");
        include "./controllers/".$name.".php";
        $this->template = $name($this,$params);
    }

    public function reparr(array $array){
        foreach ($array as $k => $v){
            $this->template = str_replace("%" . $k . "%", $v, $this->template);
        }
    }
    public function rep(string $search,string $replace){
            $this->template = str_replace("%" . $search . "%", $replace, $this->template);
    }
}