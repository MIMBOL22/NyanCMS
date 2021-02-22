<?php
///*$a = [
//	'a'=>[
//		'bound' => 0,
//		'expend' => ""
//	]
//];*/
class form{
	public $form,$error;
	function __construct(array $form,array $inputs){
		unset($form['get'],$form['form'],$form['json']);
		foreach ($inputs['inputs'] as $k => $v){
			$i = $form[$k];
			if($v['bound'] == 1 && $i == ""){
				$this->error = "Не все поля заполнены!";
			}
			if($v['bound'] == 1 && $i != $v['expend'] && $v['expend'] != ""){
				$this->error = "Не все поля заполнены правильно!";
			}
			$this->form = $form;
		}
	}
	function getResponse(){
		if($this->error == null)
			return $this->form;
		else
			return $this->error;
	}
}