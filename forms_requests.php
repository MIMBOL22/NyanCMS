<?php
include 'init.php';
include 'form.php';
$form = json("forms.json")[$_GET['form']];
ini_set('error_reporting', E_ERROR);
deb('form',$form);
$form = new form($_GET['get'] == 1 ? $_GET : $_POST,$form);
if($_GET['json'] == 0)
	var_dump($form->getResponse());
else
	echo json_encode($form->getResponse());
include "end.php";