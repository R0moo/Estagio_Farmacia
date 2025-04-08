<?php

require_once("config.php");
require_once("vendor/autoload.php");

$controller = new Controller\ReceitasController();
$controller->IsLogged();
$controller->form();