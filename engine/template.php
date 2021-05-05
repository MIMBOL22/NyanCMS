<?php
class template{
    public $template;
    public function __construct($name){
        $file = file_get_contents("./templates/".$name.".nyan");
        include "./controllers/".$name.".php";
        $this->template = $name($file,$this);
    }

    public function reparr(array $array){
        foreach ($array as $k => $v){
            $this->template = str_replace($k, $v, $this->template);
        }
    }
    public function rep(string $search,string $replace){
            $this->template = str_replace($search, $replace, $this->template);
    }
}