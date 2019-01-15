<?php
spl_autoload_register();
$uri = $_SERVER["REQUEST_URI"];

$replacedFile = basename(__FILE__);
$self = $_SERVER["PHP_SELF"];
$file = str_replace( $replacedFile, "", $self);
$signInfo = str_replace($file, "", $uri);
$signParts = explode("/", $signInfo);

$controllerName = array_shift($signParts);
$actionName = array_shift($signParts);
$params = $signParts;

$app = new \Core\Application($controllerName, $actionName, $params);
//var_dump($app);
$app->start();
//var_dump($controller);
