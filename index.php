<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/omega/omega/sistema");

require_once(ROOT."/util/Logger.php");

Logger::logInfo("Url acessada: " . $_SERVER['REQUEST_URI']);

require_once(ROOT . "/controlador/BaseCtrl.php");

$controller = new BaseCtrl();

$controller->live();


?>