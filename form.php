<?php
///*$a = [
//	'a'=>[
//		'bound' => 0,
//		'expend' => ""
//	]
//];*/
class form{
	public $form;
	function __construct(array $form,array $inputs){
		foreach ($inputs as $k => $v){
			$i = $form[$k];
			if($v['bound'] == 1 && $i == ""){
				return "Не все поля заполнены!";
			}
			if($v['bound'] == 1 && $i != $v['expend']){
				return "Не все поля заполнены правильно!";
			}
			$this->form = $form;
		}
	}
}