<?php

require_once(ROOT."/controlador/ObraCtrl.php");

$ctrl = new ObraCtrl();

$obra = $ctrl->getObra();

echo "ID: ".$obra->getId()."<br />";
echo "Nome: ".$obra->getNomeObra();

?>