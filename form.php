<?php
/* TODO:
class form{ TODO
	public $form,$error; TODO
	function __construct(array $form,array $inputs){ TODO
		unset($form['get'],$form['form'],$form['json']); TODO
		foreach ($inputs['inputs'] as $k => $v){ TODO
			$i = $form[$k]; TODO
			if($v['bound'] == 1 && $i == ""){ TODO
				$this->error = "Не все поля заполнены!"; TODO
			} TODO
			if($v['bound'] == 1 && $i != $v['expend'] && $v['expend'] != ""){ TODO
				$this->error = "Не все поля заполнены правильно!"; TODO
			} TODO
			$this->form = $form; TODO
		} TODO
	} TODO
	function getResponse(){ TODO
		if($this->error == null) TODO
			return $this->form; TODO
		else TODO
			return $this->error; TODO
	} TODO
} TODO
/*  TODO