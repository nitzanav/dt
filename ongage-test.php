<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path.'/Model/Model.php';
require_once $path.'/Controller/Controller.php';
require_once $path.'/View/View.php';

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

$controller->activateModel();
$view->output();
?>