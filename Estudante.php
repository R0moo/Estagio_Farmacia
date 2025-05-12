<?php

require_once("config.php");
require_once("vendor/autoload.php");

$controller = new Controller\EstudanteController();
$controller->IsLogged();
$controller->form();